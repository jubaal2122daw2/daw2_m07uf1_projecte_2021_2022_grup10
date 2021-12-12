<?php
    include_once("Classes/Usuari.php");
    session_start();
    if(!isset($_SESSION["check_user"])){
        header("Location: login.html");
    }
?>

<html>
<head>
    <link href='style.css'rel='stylesheet' type='text/css'>
</head>
    <body>
        <?php 
            require 'div_lateral.php';
            $aux = "check_user";
            echo div_lateral($aux,session_id(),$_SESSION["check_user"]->getIdUser(),$_SESSION["check_user"]->getNomUser());
        ?>
        <form action='sessio_u.php' method='GET'>
            <input type='submit' value='Torna enrere'>
        </form>
        <table class='taula'>
            <tr>
                <th>Nom</th>
                <th>Adreça</th>
                <th>Email</th>
                <th>Telèfon</th>
                <th>ID</th>
                <th>Contrasenya</th>
                <th>Prestat(S/N)</th>
                <th>ISBN</th>
                <th>Data Prèstec</th>
            </tr>
            <?php echo $_SESSION['check_user']-> verInfo(); ?>
        </table>    
    </body>
</html>