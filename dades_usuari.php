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
        <!-- Botó Enrere -->
        <form action='sessio_u.php' method='GET'>
            <input type='submit' value='Enrere'>
        </form>
        <?php
        $dompdf_tmp = "
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
            ";
            $dompdf_tmp .= $_SESSION['check_user']-> verInfo(); 
            $dompdf_tmp .= "</table>";
            $_SESSION["dompdf"] = $dompdf_tmp;
            echo $dompdf_tmp;
        ?>
        <br><br>
        <form class="pdf" action="./crear_pdf.php" method="GET">
            <input type="hidden" name="file" value="pdf">
            <input type="submit" value="Generar PDF">
        </form>   
    </body>
</html>