<?php

	if( $_POST["metode"] == "PUT" ){
        $biblio_file = "./ficheros/bibliotecaris.csv";
        $temporal = tempnam(".", "tmp");
            $fitxer = fopen($biblio_file,"r") or die ("No s'ha pogut crear fitxer");
            $f_temp = fopen($temporal ,"w") or die ("No s'ha pogut modificar fitxer");
            $bibliotecaris = array();
            if($fitxer !==FALSE){
                while (($datos = fgetcsv($fitxer,0,",")) !== FALSE){
                    if($datos[4]==$_POST['id']){
                        $datos[8] == $_POST["salari"];
                        // $datos[9] == $_POST[];
                    }
                    fputcsv($f_temp,$datos);
                }
            }
                fclose($fitxer);
                fclose($f_temp);

                unlink($biblio_file);
                rename($temporal,$biblio_file);
        }
    header('Location: gestio_bibliotecaris.php')
?>