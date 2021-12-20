<?php
	if( $_POST["metode"] == "PUT" ){
        $llibre_file = "./ficheros/llibres.csv";
            $fitxer = fopen($llibre_file,"r") or die ("No s'ha pogut crear fitxer");
            $llibres = array();
            if($fitxer !==FALSE){
                while (($datos = fgetcsv($fitxer,0,",")) !== FALSE){
                    if($datos[2]==$_POST['isbn']){
                        $array_temp = $datos;
                        if($_POST["estat_prestat"]=='N'){
                            $array_temp[3] = 'N';
                            $array_temp[4] = '0';
                            $array_temp[5] = '0';
                            array_push($llibres,$array_temp);
                        }else{
                            $array_temp[3] = 'S';
                            $array_temp[2] = $_POST["isbn"];
                            $array_temp[4] = $_POST["d_inici"];
                            $array_temp[5] = $_POST["id"];
                            array_push($llibres,$array_temp);
                        }
                    }else{
                        $llibres[] = $datos;
                    }
                }
                fclose($fitxer);
                    $fp = fopen("./ficheros/llibres.csv", 'w');
                    foreach($llibres as $llibre){
                        fputcsv($fp, $llibre);
                    }
                    fclose($fp);
            }
        }
    header('Location: gestio_llibres.php')
?>