<?php 
        /* Nombre: Alvaro Garcia Gonzalez
        * Fecha: 20/11/2025
        * Uso:  */ 
        //si le da al boton de vovler se va a la pagina del index
        if(isset($_REQUEST['CANCELAR'])){
            header('Location: ../indexLoginLogoffTema5.php');
        }
        
        if(isset($_REQUEST['ENTRAR'])){
            header('Location: InicioPrivado.php');
        }
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
        <h1>REGISTRO</h1>
        <h2>LOGIN LOGOFF TEMA 5</h2>
        
    </header>
    <form method="post">
        <button class="botonGenerico" name="ENTRAR">ENTRAR</button>
        <button class="botonGenerico" name="CANCELAR">CANCELAR</button>
    </form>
    <footer>
        <p><a href="https://alvarogargon.ieslossauces.es/">Álvaro García González</a></p>
        <a href="https://github.com/alvaro-gargon/AGGDWESLoginLogoffTema5"><i class="fa fa-github fa-2x"></i></a>
        <p>Última actualización <time datetime="2025-11-20">20/11/2025</time></p>
    </footer>
</body>
</html>