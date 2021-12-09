<?php
    include("Classes/Usuari.php");
    include("Classes/Bibliotecari.php");

    $user_file = "./ficheros/usuaris.csv";
    $fitxer = fopen($user_file,"r") or die ("No s'ha pogut crear fitxer");

    if($fitxer !==FALSE){ //si el archivo existe.
        while (($datos = fgetcsv($fitxer,0,",")) !== FALSE){ //devuelve un array indexado 
            for($i = 0 ; $i < count($datos) ; $i++){
                if($datos[5]==$_POST["usuari"] && $datos[6]==$_POST["ctsnya"]){
                    $lastChar = substr($datos[5], -1);
                    if($lastChar=="U"){
                        session_start();
                        $_SESSION["check_user"]= new Usuari($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],$datos[6],$datos[7],$datos[8],$datos[9]); 
                    }//session es una array que contiene este objeto como un parametro. 
                    if($lastChar=="B"){
                        session_start();
                        $_SESSION["check_biblio"]= new Treballador($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],$datos[6],$datos[7],$datos[8],$datos[9],$datos[10],$datos[11]);
                    }
                    if($lastChar=="C"){
                        session_start();
                        $_SESSION["check_biblioc"]= new Cap($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],$datos[6],$datos[7],$datos[8],$datos[9],$datos[10],$datos[11]);
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
        <style>
            .lateral{
                float:right;
                border: 2px solid red;
                background-color: #f5c87a;
                padding: 5px;
                line-height: 1.8;
            }
        </style>
    </head>
    <body>
        <?php
            if(isset($_SESSION["check_user"])){ //si un usuario es instanciado en la sesion.
                echo 
                "<div class='lateral'> 
                <b>ID de sessió:</b> " .session_id()."<br>".
                "<b>ID d'Usuari: </b>".$_SESSION["check_user"] -> getIdUser()."<br>".
                "<a href='logout.php'>Cerrar Sesión</a>".
                "</div>";
                $in_user = file_get_contents("inusuaris.html");
                echo $in_user;
            }
            if(isset($_SESSION["check_biblio"])){ //si un usuario es instanciado en la sesion.
                echo 
                "<div class='lateral'> 
                <b>ID de sessió:</b> " .session_id()."<br>".
                "<b>ID d'Usuari: </b>".$_SESSION["check_biblio"] -> getIdTreb()."<br>".
                "<a href='logout.php'>Cerrar Sesión</a>".
                "</div>";
                $in_biblio = file_get_contents("inbibliotecaris.html");
                echo $in_biblio;
            }
            if(!isset($_SESSION["check_user"])&&!isset($_SESSION["check_biblio"])&&isset($_SESSION["check_biblioc"])){ //si un usuario es instanciado en la sesion.
                echo 
                "<div class='lateral'> 
                <b>ID de sessió:</b> " .session_id()."<br>".
                "<b>ID d'Usuari: </b>".$_SESSION["check_biblioc"] -> getIdCap()."<br>".
                "<a href='logout.php'>Cerrar Sesión</a>".
                "</div>";
                $in_biblioc = file_get_contents("inbibliotecariscap.html");
                echo $in_biblioc;
            }
            elseif(!isset($_SESSION["check_user"])&&!isset($_SESSION["check_biblio"])&&!isset($_SESSION["check_biblioc"])){
                echo "Usuari o contrassenya incorrectes";
            }
        ?>
    </body>
</html>

