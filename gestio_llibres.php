<?php
    include_once("Classes/Llibre.php");
    include_once("Classes/Bibliotecari.php");

    session_start();
    if(!isset($_SESSION["check_biblio"])&&!isset($_SESSION["check_biblioc"])){
        header("Location: login.html");
    }
?>

<html>
<head>
    <link href='style.css'rel='stylesheet' type='text/css'>
</head>
    <body>
        <?php 
            require_once 'div_lateral.php';
            if(isset($_SESSION["check_biblio"])){
                $aux = "check_biblio";
                echo div_lateral($aux,session_id(),$_SESSION["check_biblio"]->getIdUser(),$_SESSION["check_biblio"]->getNomUser());
            }
            if(isset($_SESSION["check_biblioc"])){ 
                $aux = "check_biblioc";
                echo div_lateral($aux,session_id(),$_SESSION["check_biblioc"]->getIdUser(),$_SESSION["check_biblioc"]->getNomUser());
            }
        ?>
        <!-- Boto Enrere -->
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
        <br>
        <form class="pdf" action="./crear_pdf.php" method="GET">
            <input type="hidden" name="file" value="pdf">
            <input type="submit" value="Generar PDF">
        </form>
        </br>
        <!--CREACIÓ-->
        <form class= 'formulari' action="./creacioL.php" method="POST">
        <p>Creació</p>
			Titol:</br><input type="text" name="titol"><br>
			Autor:</br><input type="text" name="autor"><br>
			ISBN: </br><input type="text" name="isbn"><br></br>
			<input type="submit" value="Crea"/>
		</form>
        
        <!--ELIMINACIÓ-->
        <form class= 'formulari' action="./eliminacioL.php" method="POST">
            <input type="hidden" name="metode" value="DELETE" />
        <p>Eliminació</p>
			ISBN: </br><input type="text" name="isbn"><br>
			<input type="submit" value="Elimina"/>
		</form>

        <!--MODIFICACIÓ-->
        <form class= 'formulari' action="./modificacioL.php" method="POST">
            <input type="hidden" name="metode" value="PUT" />
        <p>Modificació</p>
            ISBN: </br><input type="text" name="isbn"><br><br>
            <label>Prestat?</label><br>
            <input type="radio" name="estat_prestat" value="S">
            <label id="S">S</label>
            <input type="radio" name="estat_prestat" value="N"checked>
            <label id="N">N</label><br><br>
            ID: </br><input type="text" name="id"><br><br>
            Data d'Inici: </br><input type="date" name="d_inici"><br><br>
			<input type="submit" value="Modifica"/>
		</form>
    </body>
</html>
