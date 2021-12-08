<?php
    include("Classes/Usuari.php");

    $user_file = "./ficheros/usuaris.csv";
    $fitxer = fopen($user_file,"r") or die ("No s'ha pogut crear fitxer");

    if($fitxer !==FALSE){ //si el archivo existe.
        while (($datos = fgetcsv($fitxer,",")) !== FALSE){ //devuelve un array indexado 
            for($i = 0 ; $i < count($datos) ; $i++){
                if($datos[5]==$_POST["usuari"] && $datos[6]==$_POST["ctsnya"]){
                    session_start();
                    $usuario1 = new Usuari($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],$datos[6],$datos[7],$datos[8],$datos[9]);
                    echo "Has entrat en la sessió";
                    $_SESSION["check_user"]=$usuario1;
                    break;
                }
            }
        }
    }
    fclose($fitxer);
?>

<html>
    <body>
        <?php
            if(isset($_SESSION["check_user"])){
                echo "<div>AQUI VA LO DE LA DERECHA</div>";
                $in_user = file_get_contents("inusuaris.html");
                echo $in_user;
            }
            elseif(!isset($_SESSION["check_user"])){
                echo "Usuari o contrassenya incorrectes";
            }
        ?>
    </body>
</html>

