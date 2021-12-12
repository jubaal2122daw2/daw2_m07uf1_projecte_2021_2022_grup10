<?php
    include_once("Classes/Llibre.php");
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
            echo div_lateral($aux);
        ?>
        <form action='sessio_u.php' method='GET'>
            <input type='submit' value='Torna enrere'>
        </form>
        <table class='taula'>
            <tr>
                <th>Titol</th>
                <th>Autor</th>
                <th>ISBN</th>
                <th>Prestat(S/N)</th>
                <th>Data Prèstec</th>
                <th>ID usuari</th>
            </tr> 
        
        <?php
            $llibres = array();
            $book_file = "./ficheros/llibres.csv";
            $fitxer = fopen($book_file,"r") or die ("No s'ha pogut crear fitxer");
            if($fitxer !==FALSE){
            while (($datos = fgetcsv($fitxer,0,",")) !== FALSE){
                $libro = new Llibre($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5]);
                echo $libro -> verInfoLibro();
                $llibres[] = $libro;
            }
            fclose($fitxer);
            }
        ?>
        </table>
        
    </body>
</html>