<?php
include_once("Classes/Usuari.php");

session_start();

if(!isset($_SESSION["check_user"])){
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
                    <th>Prestat(S/N)</th>
                    <th>ISBN</th>
                    <th>Data Prèstec</th>
                </tr>".
                $_SESSION['check_user']-> verInfoUser();"
            </table>
        </body>
    </html>
";

?>