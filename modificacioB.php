<?php

	if( $_POST["metode"] == "PUT" ){
        $biblio_file = "./ficheros/bibliotecaris.csv";
            $fitxer = fopen($biblio_file,"r") or die ("No s'ha pogut crear fitxer");
            $bibliotecaris = array();
            if($fitxer !==FALSE){
                while (($datos = fgetcsv($fitxer,0,",")) !== FALSE){
                    if($datos[4]==$_POST['id']){
                        $array_temp = $datos;
                        $array_temp[8] = $_POST["salari"];
                        $array_temp[9] = $_POST["estat_cap"];
                        array_push($bibliotecaris,$array_temp);
                    }else{
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