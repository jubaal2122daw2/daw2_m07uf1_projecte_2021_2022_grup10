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
        <a>Creació</a></br>
        <form class= 'formulari' action="./creacioL.php" method="POST">
			Titol<input type="text" name="titol"><br>
			Autor<input type="text" name="autor"><br>
			ISBN <input type="text" name="isbn"><br>
			<input type="submit" value="Crea"/>
		</form>
    </body>
</html>
