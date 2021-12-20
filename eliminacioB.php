<?php

	if( $_POST["metode"] == "DELETE" ){
        $biblio_file = "./ficheros/bibliotecaris.csv";
            $fitxer = fopen($biblio_file,"r") or die ("No s'ha pogut crear fitxer");
            $bibliotecaris = array();
            if($fitxer !==FALSE){
                while (($datos = fgetcsv($fitxer,0,",")) !== FALSE){
                    if($datos[4]!==$_POST['id']){
                        $bibliotecaris[] = $datos;
                    }   
                }
                
                fclose($fitxer);
                    $fp = fopen("./ficheros/bibliotecaris.csv", 'w');
                    foreach($bibliotecaris as $biblio){
                        fputcsv($fp, $biblio);
                    }
                    fclose($fp);
            }
        }
    header('Location: gestio_bibliotecaris.php')
?>