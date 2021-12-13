<?php
    include_once("Classes/Usuari.php");
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
        
        <?php
            $usuaris = array();
            $user_file = "./ficheros/usuaris.csv";
            $fitxer = fopen($user_file,"r") or die ("No s'ha pogut crear fitxer");
            if($fitxer !==FALSE){
            while (($datos = fgetcsv($fitxer,0,",")) !== FALSE){
                $user = new Usuari($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],$datos[6],$datos[7],$datos[8]);
                echo $user -> verInfo();
                $usuaris[] = $user;
            }
            fclose($fitxer);
            }
        ?>
        </table>
        </br>
        <!--CREACIÓ-->
        <form class= 'formulari' action="./creacioU.php" method="POST">
        <p>Creació</p>
			Nom: </br><input type="text" name="nom"><br>
			Cognom:</br> <input type="text" name="cognom"><br>
			Direcció:</br> <input type="text" name="direccio"><br>
			Direcció E-mail:</br> <input type="text" name="email"><br>
			Teléfon: </br><input type="tel" name="telefon"><br>
			ID usuari: </br><input type="text" name="id"><br>
			Contrasenya:</br> <input type="password" name="ctsnya"><br><br>
			<input type="submit" value="Crea"/>
		</form>
        <!--ELIMINACIÓ-->
        <form class= 'formulari' action="./eliminacioU.php" method="POST">
        <p>Eliminació</p>
			ID: </br><input type="text" name="id"><br>
			<input type="submit" value="Crea"/>
		</form>
    </body>
</html>