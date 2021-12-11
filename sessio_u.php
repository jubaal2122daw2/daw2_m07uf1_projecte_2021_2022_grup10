<?php
    include_once("Classes/Usuari.php");
    include_once("Classes/Bibliotecari.php");

    $user_file = "./ficheros/usuaris.csv";
    $fitxer = fopen($user_file,"r") or die ("No s'ha pogut crear fitxer");

    if($fitxer !==FALSE){ //si el archivo existe.
        while (($datos = fgetcsv($fitxer,0,",")) !== FALSE){ //devuelve un array indexado 
            for($i = 0 ; $i < count($datos) ; $i++){
                if($datos[4]==$_POST["usuari"] && $datos[5]==$_POST["ctsnya"]){
                    $lastChar = substr($datos[4], -1);
                    if($lastChar=="U"){
                        session_start();
                        $_SESSION["check_user"]= new Usuari($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],$datos[6],$datos[7],$datos[8]); 
                    }//session es una array que contiene este objeto como un parametro. 
                    if($lastChar=="B"){
                        session_start();
                        $_SESSION["check_biblio"]= new Bibliotecari($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],$datos[6],$datos[7],$datos[8],$datos[9],$datos[10]);
                    }
                    if($lastChar=="C"){
                        session_start();
                        $_SESSION["check_biblioc"]= new Bibliotecari($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],$datos[6],$datos[7],$datos[8],$datos[9],$datos[10]);
                    }
                    break;
                }
            }
        }
    }
    fclose($fitxer);
?>

<html>
    <head>
    </head>
    <body>
        <?php
            if(isset($_SESSION["check_user"])){ //si un usuario es instanciado en la sesion.
                require 'div_lateral.php';
                $aux = "check_user";
                echo div_lateral($aux);
                $in_user = file_get_contents("inusuaris.html");
                echo $in_user;
            }
            if(isset($_SESSION["check_biblio"])){
                require 'div_lateral.php';
                $aux = "check_biblio";
                echo div_lateral($aux);
                $in_biblio = file_get_contents("inbibliotecaris.html");
                echo $in_biblio;
            }
            if(isset($_SESSION["check_biblioc"])){ 
                require 'div_lateral.php';
                $aux = "check_biblioc";
                echo div_lateral($aux);
                $in_biblioc = file_get_contents("inbibliotecariscap.html");
                echo $in_biblioc;
            }
            elseif(!isset($_SESSION["check_user"])&&!isset($_SESSION["check_biblio"])&&!isset($_SESSION["check_biblioc"])){
                echo "Usuari o contrassenya incorrectes";

            }
        ?>
    </body>
</html>