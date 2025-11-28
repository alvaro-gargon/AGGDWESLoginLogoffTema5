<?php
    /* Nombre: Alvaro Garcia Gonzalez
     * Fecha: 20/11/2025
     * Uso:  */
    session_start(); 
    //si le da al boton de vovler se va a la pagina del index
    if (isset($_REQUEST['CANCELAR'])) {
        header('Location: ../indexLoginLogoffTema5.php');
    }


    if (isset($_REQUEST['REGISTRARSE'])) {
        header('Location: Registro.php');
    }
      
    require_once '../core/231018libreriaValidacion.php';
    $entradaOK = true; //variable boolean para enviar el formulario
    //array donde recojo los mensajes de error de cada campo
    $aErrores = [
                'usuario' => null,
                'contraseña' => null
    ];
    $aRespuestas = [
                'usuario' => null,
                'contraseña' => null
    ];

    if (isset($_REQUEST['ENTRAR'])) {
        $usuario = $_REQUEST['usuario'];
        $password = $_REQUEST['contraseña'];
        $aErrores['usuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['usuario'], obligatorio: 1);
        
        foreach ($aErrores as $clave => $valor) {
            if ($valor != null) {
                $entradaOK = false;
            } else {
                if (empty($_REQUEST["$clave"])) {
                    $aRespuestas[$clave] = 'No se ha rellenado';
                }
            }
        }
    } else {
        $entradaOK = false;
    }

    if ($entradaOK == true) {
        //codigo que se ejecuta cuando envias el formulario
        // Comprobamos las credenciales con la base de datos
        // Conectamos a la base de datos
        require_once '../config/ConfDBPDO.php';
        try {
            $miDB = new PDO(DNS, USERNAME, PASSWORD);
            $miDB->exec("use DBAGGDWESProyectoLoginLogoffTema5;");
            $sql = <<<SQL
                            SELECT T01_CodUsuario,
                            T01_Password,
                            T01_DescUsuario,
                            T01_FechaHoraUltimaConexion,
                            T01_NumConexiones
                            FROM T01_Usuario 
                            WHERE T01_CodUsuario= :usuario AND 
                            T01_Password = sha2(:passwd,256)
                            SQL;

            $consulta = $miDB->prepare($sql);
            $consulta->execute([
                ':usuario' => $_REQUEST['usuario'],
                ':passwd' => $_REQUEST['usuario'] . $_REQUEST['contraseña']
            ]);
            
            //si el existe (o es valido), devolvera una fila
            $usuarioBD = $consulta->fetchObject();
            if ($usuarioBD) {
                $fechaActual=new DateTime();
                //iniciamos la sesion sino
                
                $_SESSION['usuarioDAWAGGAppLoginLogoffTema5'] = [
                    'CodUsuario' => $usuarioBD->T01_CodUsuario,
                    'Password' => $usuarioBD->T01_Password,
                    'DescUsuario' => $usuarioBD->T01_DescUsuario,
                    'FechaHoraUltimaConexionAnterior' => $usuarioBD->T01_FechaHoraUltimaConexion,
                    'FechaHoraUltimaConexion' => $fechaActual,
                    'NumConexiones' => $usuarioBD->T01_NumConexiones+1,
                    'Perfil' => $usuarioBD->T01_Perfil
                ];
                //actualizamos la fecha actual
                $consultaActualizacion = <<<SQL
                                UPDATE T01_Usuario SET
                                T01_FechaHoraUltimaConexion = now(),
                                T01_NumConexiones = T01_NumConexiones + 1
                                WHERE T01_CodUsuario = :usuario
                                SQL;
                $consulta2 = $miDB->prepare($consultaActualizacion);
                $consulta2->execute([':usuario' => $_REQUEST['usuario']]);
                
                //vamos al inicio privado
                header('Location: InicioPrivado.php');
                exit;
            }else{
                header('Location: login.php');
                exit;
            }
            
        } catch (PDOException $exception) {
            echo("Error: " . $exception->getMessage());
            echo("Codigo error: " . $exception->getCode());
        }finally{
            unset($miDB);
        }
    }else {
    ?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Álvaro García</title>
            <link rel="stylesheet" href="../webroot/css/estilos.css"/>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        </head>
        <body>
            <header>
                <h1>LOGIN</h1>
                <h2>LOGIN LOGOFF TEMA 5</h2>
            </header>
            <form method="post" id="inicioSesion">
                <p>
                    <label>Introduce nombre de usuario</label><br>
                    <input class="obligatorio" type="text" name="usuario">
                </p>

                <p>
                    <label>Introduce contraseña</label><br>
                    <input class="obligatorio" type="password" name="contraseña">
                </p>
                <button class="botonGenericoFormulario" type="submit" name="ENTRAR">ENTRAR</button>
                <button class="botonGenericoFormulario" name="CANCELAR">CANCELAR</button>
                <p>¿No tienes cuenta todavía? Haz click en: <button class="botonGenericoFormulario" name="REGISTRARSE">REGISTRARSE</button></p>
            </form>
            <footer>
                <p><a href="https://alvarogargon.ieslossauces.es/">Álvaro García González</a></p>
                <a href="https://github.com/alvaro-gargon/AGGDWESLoginLogoffTema5"><i class="fa fa-github fa-2x"></i></a>
                <p>Última actualización <time datetime="2025-11-20">20/11/2025</time></p>
            </footer>
        </body>
    </html>
    <?php
        }
    ?>