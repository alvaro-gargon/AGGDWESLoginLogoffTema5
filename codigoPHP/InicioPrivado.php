<?php 
        /* Nombre: Alvaro Garcia Gonzalez
        * Fecha: 20/11/2025
        * Uso:  */ 
        //si le da al boton de vovler se va a la pagina del index
        
        if(isset($_REQUEST['DETALLE'])){
            header('Location: Detalle.php');
        }
        if(isset($_REQUEST['LOGOFF'])){
            header('Location: ../indexLoginLogoffTema5.php');
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
        <h1>INICIO PRIVADO</h1>
        <h2>LOGIN LOGOFF TEMA 5</h2>
        <form method="post">
            <!--  <button class="botonIcono" name="LOGOFF"><img  id="iconoLog" src="../webroot/images/loginlogoff.png"></button>-->
            <button class="botonGenerico botonIcono" name="LOGOFF">LOGOFF</button>
        </form>
        
    </header>
    <?php 
        if($_COOKIE['idioma']=="ingles"){
                echo "<h3>WELCOME TO YOUR PRIVATE AREA OF THE APP</h3>";
        }else{
            if($_COOKIE['idioma']=="italiano"){
                echo "<h3>BENVENUTO NELLA TUA AREA PRIVATA DELL'APP</h3>";
            } 
            if($_COOKIE['idioma']=="español" || empty($_COOKIE['idioma'])){
            echo "<h3>BIENVENIDO A LA ZONA PRIVADA DE TU APLICACION</h3>";
            }
        }
    ?>
    
    <form method="post">
        <button class="botonGenerico" name="DETALLE">DETALLE</button>
    </form>
    <footer>
        <p><a href="https://alvarogargon.ieslossauces.es/">Álvaro García González</a></p>
        <a href="https://github.com/alvaro-gargon/AGGDWESLoginLogoffTema5"><i class="fa fa-github fa-2x"></i></a>
        <p>Última actualización <time datetime="2025-11-20">20/11/2025</time></p>
    </footer>
</body>
</html>