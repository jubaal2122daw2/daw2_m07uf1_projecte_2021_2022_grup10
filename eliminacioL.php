<?php

	if( $_POST["metode"] == "DELETE" ){
        $llibre_file = "./ficheros/llibres.csv";
            $fitxer = fopen($llibre_file,"r") or die ("No s'ha pogut crear fitxer");
            $llibres = array();
            if($fitxer !==FALSE){
                while (($datos = fgetcsv($fitxer,0,",")) !== FALSE){
                    if($datos[2]!==$_POST['isbn']){
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