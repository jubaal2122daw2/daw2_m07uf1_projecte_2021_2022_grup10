<?php

	if( $_POST["metode"] == "PUT" ){
        $user_file = "./ficheros/usuaris.csv";
            $fitxer = fopen($user_file,"r") or die ("No s'ha pogut crear fitxer");
            $usuaris = array();
            if($fitxer !==FALSE){
                while (($datos = fgetcsv($fitxer,0,",")) !== FALSE){
                    if($datos[4]==$_POST['id']){
                        $array_temp = $datos;
                        if($_POST["estat_prestat"]=='N'){
                            $array_temp[6] = 'N';
                            $array_temp[7] = '0';
                            $array_temp[8] = '0';
                            array_push($usuaris,$array_temp);
                        }else{
                            $array_temp[6] = 'S';
                            $array_temp[7] = $_POST["isbn"];
                            $array_temp[8] = $_POST["d_inici"];
                            array_push($usuaris,$array_temp);
                        }
                    }else{
                        $usuaris[] = $datos;
                    }
                }
                fclose($fitxer);
                    $fp = fopen("./ficheros/usuaris.csv", 'w');
                    foreach($usuaris as $user){
                        fputcsv($fp, $user);
                    }
                    fclose($fp);
            }
        }
    header('Location: gestio_usuaris.php')
?>