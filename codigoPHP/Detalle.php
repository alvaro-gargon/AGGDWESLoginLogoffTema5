<?php 
        /* Nombre: Alvaro Garcia Gonzalez
        * Fecha: 20/11/2025
        * Uso:  */ 
        //si le da al boton de vovler se va a la pagina del index
       
        if(isset($_REQUEST['ACEPTAR'])){
            header('Location: InicioPrivado.php');
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
        <h1>DETALLE</h1>
        <h2>LOGIN LOGOFF TEMA 5</h2>
        <form method="post">
            <!--  <button class="botonIcono" name="LOGOFF"><img  id="iconoLog" src="../webroot/images/loginlogoff.png"></button>-->
            <button class="botonGenerico botonIcono" name="LOGOFF">LOGOFF</button>
        </form>
        
    </header>
    <form method="post">
        <button class="botonGenerico" name="ACEPTAR">ACEPTAR</button>
    </form>
    <?php
        echo '<h3>Contenido de la variable $_SERVER</h3>';
        echo '<table class="principal">';
        echo '<tr><th>Variable</th><th>Valor</th></tr>';
        if (!empty($_SERVER)) {
            foreach ($_SERVER as $variable => $resultado) {
                echo "<tr>";
                echo '<td>$_SERVER[' . $variable . ']</td>';
                echo "<td><pre>" . print_r($resultado, true) . "</pre></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'><em>La variable \$_SERVER está vacía.</em></td></tr>";
        }
        echo "</table>";

        //Contenido de la variable $_SESSION-------------------------------------------------------
        echo '<br><br><h3>Contenido de la variable $_SESSION</h3><br>';
        echo '<table class="principal">';
        echo '<tr><th>Variable</th><th>Valor</th></tr>';
        if (!empty($_SESSION)) {
            foreach ($_SESSION as $variable => $resultado) {
                echo "<tr>";
                echo '<td>$_SESSION[' . $variable . ']</td>';
                echo "<td><pre>" . print_r($resultado, true) . "</pre></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'><em>La variable \$_SESSION está vacía.</em></td></tr>";
        }
        echo "</table>";

        //Contenido de la variable $_COOKIE---------------------------------------------------
        echo '<br><br><h3>Contenido de la variable $_COOKIE</h3><br>';
        echo '<table class="principal">';
        echo '<tr><th>Variable</th><th>Valor</th></tr>';
        if (!empty($_COOKIE)) {
            foreach ($_COOKIE as $variable => $resultado) {
                echo "<tr>";
                echo '<td>$_COOKIE[' . $variable . ']</td>';
                echo "<td><pre>" . $resultado . "</pre></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'><em>La variable \$_COOKIE está vacía.</em></td></tr>";
        }
        echo "</table>";
        
    ?>
    <footer>
        <p><a href="https://alvarogargon.ieslossauces.es/">Álvaro García González</a></p>
        <a href="https://github.com/alvaro-gargon/AGGDWESLoginLogoffTema5"><i class="fa fa-github fa-2x"></i></a>
        <p>Última actualización <time datetime="2025-11-20">20/11/2025</time></p>
    </footer>
</body>
</html>