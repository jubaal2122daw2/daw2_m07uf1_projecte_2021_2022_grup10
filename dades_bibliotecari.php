<?php
include_once("Classes/Bibliotecari.php");

session_start();

if(!isset($_SESSION["check_biblio"])){
    header("Location: login.html");
}
echo"
    <html>
        <head>
            <link href='style.css'rel='stylesheet' type='text/css'>
        </head>
        <body>
            <table class='taula'>
                <tr>
                    <th>Nom</th>
                    <th>Adreça</th>
                    <th>Email</th>
                    <th>Telèfon</th>
                    <th>ID</th>
                    <th>Contrasenya</th>
                    <th>S.Social</th>
                    <th>Data Contracte</th>
                    <th>Salari</th>
                    <th>Cap (S/N)</th>
                </tr>".
                $_SESSION['check_biblio']-> verInfo();"
            </table>
        </body>
    </html>
";

?>