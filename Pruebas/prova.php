<?php
include_once("Classes/Usuari.php");
include_once("Classes/Bibliotecari.php");

	if( $_POST["metode"] == "DELETE" ){
        $user_file = "./ficheros/usuaris.csv";
            $fitxer = fopen($user_file,"r") or die ("No s'ha pogut crear fitxer");
            $usuaris = array();
            if($fitxer !==FALSE){
                while (($datos = fgetcsv($fitxer,0,",")) !== FALSE){
                    $user = new Usuari($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],$datos[6],$datos[7],$datos[8]);
                    $usuaris[] = $user;
				}    
                    $fp = fopen("./ficheros/usuaris.csv", 'w');
                    foreach($usuaris as $user){
                        if($user->getIdUser()!= $_POST["id"]){
                            fputcsv($fp, $user);
                        }
                    }
                    fclose($fp);
                }
                
            fclose($fitxer);
            }
    header('Location: gestio_usuaris.php')
?>