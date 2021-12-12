<?php

    include_once("Classes/Usuari.php");
    include_once("Classes/Bibliotecari.php");

    $user_file = "./ficheros/usuaris.csv";
    $biblio_file = "./ficheros/bibliotecaris.csv";

    if(isset($_POST["tipusUser"])){
        if($_POST["tipusUser"]=="Usuari"){
            $fitxer = fopen($user_file,"r") or die ("No s'ha pogut crear fitxer");
            if($fitxer !==FALSE){ 
                while (($datos = fgetcsv($fitxer,0,",")) !== FALSE){
                    if($datos[4]==$_POST["usuari"] && $datos[5]==$_POST["ctsnya"]){
                        session_start();
                        $_SESSION["check_user"]= new Usuari($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],$datos[6],$datos[7],$datos[8]); 
                        break;
                    }           
                }
            }
        }elseif($_POST["tipusUser"]=="Bibliotecari" || $_POST["tipusUser"]=="Admin"){
            $fitxer = fopen($biblio_file,"r") or die ("No s'ha pogut crear fitxer");
            if($fitxer !==FALSE){ 
                while (($datos = fgetcsv($fitxer,0,",")) !== FALSE){
                    if($datos[4]==$_POST["usuari"] && $datos[5]==$_POST["ctsnya"]){
                        session_start();
                        if($datos[9] == '1'){                        
                            $_SESSION["check_biblioc"]= new Bibliotecari($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],$datos[6],$datos[7],$datos[8],$datos[9]);
                        }else{
                            $_SESSION["check_biblio"]= new Bibliotecari($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],$datos[6],$datos[7],$datos[8],$datos[9]);
                        }
                        break;
                    }
                }
            }
        }
        fclose($fitxer);
    }
    else{ //necesario para que funcione el boto tornar enrere.
        session_start();
        if(!isset($_SESSION["check_user"])&&!isset($_SESSION["check_biblio"])&&!isset($_SESSION["check_biblioc"])){
            header("Location: login.html");
        }

    }
    
?>

<html>
    <head>
        <link href='style.css' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <?php
        require_once 'div_lateral.php';
            if(isset($_SESSION["check_user"])){
                $aux = "check_user";
                echo div_lateral($aux,session_id(),$_SESSION["check_user"]->getIdUser(),$_SESSION["check_user"]->getNomUser());
                $in_user = file_get_contents("inusuaris.html");
                echo $in_user;
            }
            if(isset($_SESSION["check_biblio"])){
                $aux = "check_biblio";
                echo div_lateral($aux,session_id(),$_SESSION["check_biblio"]->getIdUser(),$_SESSION["check_biblio"]->getNomUser());
                $in_biblio = file_get_contents("inbibliotecaris.html");
                echo $in_biblio;
            }
            if(isset($_SESSION["check_biblioc"])){ 
                $aux = "check_biblioc";
                echo div_lateral($aux,session_id(),$_SESSION["check_biblioc"]->getIdUser(),$_SESSION["check_biblioc"]->getNomUser());
                $in_biblioc = file_get_contents("inbibliotecariscap.html");
                echo $in_biblioc;
            }
            elseif(!isset($_SESSION["check_user"])&&!isset($_SESSION["check_biblio"])&&!isset($_SESSION["check_biblioc"])){
                echo "Usuari o contrassenya incorrectes";                
            }
        ?>
    </body>
</html>