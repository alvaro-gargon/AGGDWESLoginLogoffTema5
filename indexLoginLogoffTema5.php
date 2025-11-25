<?php
        /* Nombre: Alvaro Garcia Gonzalez
        * Fecha: 20/11/2025
        * Uso:  */ 
        //si le da al boton de login se va a la pagina correspondiente
        if(isset($_REQUEST['LOGIN'])){
            header('Location: codigoPHP/login.php');
            exit;
        }
        
        if(!isset($_COOKIE['idioma'])){
            setcookie("idioma", "español", time()+3600);
            header('Location: ../AGGDWESLoginLogoffTema5/indexLoginLogoffTema5.php');
            exit(); 
        }
        if(isset($_REQUEST['idiomaEspañol'])){
            setcookie("idioma", "español", time()+3600);
        }
        if(isset($_REQUEST['idiomaIngles'])){
            setcookie("idioma", "ingles", time()+3600);
        }
        if(isset($_REQUEST['idiomaItaliano'])){
            setcookie("idioma", "italiano", time()+3600);
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Álvaro García</title>
    <link rel="stylesheet" href="webroot/css/estilos.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <h1>INICIO PUBLICO</h1>
        <h2>LOGIN LOGOFF TEMA 5</h2>
        <form method="post"> 
            <button class="botonGenerico" name="LOGIN">LOGIN</button>
            <button name="idiomaEspañol">Español</button>
            <button name="idiomaIngles">Ingles</button>
            <button name="idiomaItaliano">Italiano</button>
        </form>
        
    </header>
    <h3>BIENVENIDO A LA PARTE PUBLICA DE MI APLICACION</h3>
    <footer>
        <p><a href="https://alvarogargon.ieslossauces.es/">Álvaro García González</a></p>
        <a href="https://github.com/alvaro-gargon/AGGDWESLoginLogoffTema5"><i class="fa fa-github fa-2x"></i></a>
        <p>Última actualización <time datetime="2025-11-20">20/11/2025</time></p>
    </footer>
</body>
</html>