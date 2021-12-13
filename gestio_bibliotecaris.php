<?php
    
    include_once("Classes/Bibliotecari.php");

    session_start();
    if(!isset($_SESSION["check_biblioc"])){
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
            if(isset($_SESSION["check_biblioc"])){ 
                $aux = "check_biblioc";
                echo div_lateral($aux,session_id(),$_SESSION["check_biblioc"]->getIdUser(),$_SESSION["check_biblioc"]->getNomUser());
            }
        ?>
        <!-- Boto Enrere -->
        <form action='sessio_u.php' method='GET'>
            <input type='submit' value='Enrere'>
        </form>
        <table class='taula'>
            <tr>
                <th>Nom</th>
                <th>Adreça</th>
                <th>Email</th>
                <th>Telèfon</th>
                <th>ID</th>
                <th>Contrasenya</th>
                <th>sSocial</th>
                <th>Data de contracte</th>
                <th>Salari</th>
                <th>Cap</th>
            </tr> 
        
        <?php
            $bibliotecaris = array();
            $biblio_file = "./ficheros/bibliotecaris.csv";
            $fitxer = fopen($biblio_file,"r") or die ("No s'ha pogut crear fitxer");
            if($fitxer !==FALSE){
            while (($datos = fgetcsv($fitxer,0,",")) !== FALSE){
                $biblio = new Bibliotecari($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],$datos[6],$datos[7],$datos[8],$datos[9]);
                echo $biblio -> verInfo();
                $bibliotecaris[] = $biblio;
            }
            fclose($fitxer);
            }
        ?>
        </table></br>
        <!--CREACIÓ-->
        <form class= 'formulari' action="./creacioB.php" method="POST">
        <p>Creació</p>
			Nom:</br><input type="text" name="nom"><br>
			Cognom: </br><input type="text" name="cognom"><br>
			Direcció: </br><input type="text" name="direccio"><br>
			Direcció E-mail: </br><input type="text" name="email"><br>
			Teléfon: </br><input type="tel" name="telefon"><br>
			ID: </br><input type="text" name="id"><br>
			Contrasenya: </br><input type="password" name="ctsnya"><br>
            Número seguretat social: </br><input type="text" name="social"><br>
            Data de contracte: </br><input type="date" name="contracte"><br>
            Salari: </br><input type="text" name="salari"><br></br>
			<input type="submit" value="Crea"/>
		</form>
        <!--ELIMINACIÓ-->
        <form class= 'formulari' action="./eliminacioB.php" method="POST">
        <p>Eliminació</p>
			ID: </br><input type="text" name="id"><br>
			<input type="submit" value="Crea"/>
		</form>
        
        
    </body>
</html>