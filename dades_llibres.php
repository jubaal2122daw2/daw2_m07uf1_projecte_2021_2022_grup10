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
            echo div_lateral($aux,session_id(),$_SESSION["check_user"]->getIdUser(),$_SESSION["check_user"]->getNomUser());
        ?>
        <form action='sessio_u.php' method='GET'>
            <input type='submit' value='Enrere'>
        </form>
        
        <?php
            $dompdf_tmp = "
            <table class='taula'>
            <tr>
                <th>Titol</th>
                <th>Autor</th>
                <th>ISBN</th>
                <th>Prestat(S/N)</th>
                <th>Data Prèstec</th>
                <th>ID usuari</th>
            </tr> 
            ";

            $llibres = array();
            $book_file = "./ficheros/llibres.csv";
            $fitxer = fopen($book_file,"r") or die ("No s'ha pogut crear fitxer");
            if($fitxer !==FALSE){
            while (($datos = fgetcsv($fitxer,0,",")) !== FALSE){
                $libro = new Llibre($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5]);
                $dompdf_tmp .= $libro -> verInfoLibro(); //$dompdf_tmp = $dompdf_tmp . $libro -----
                $llibres[] = $libro;
            }
            fclose($fitxer);
            }
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