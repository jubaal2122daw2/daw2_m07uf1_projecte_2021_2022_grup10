<?php
/* pasamos los datos al fichero usuarios*/
$datosU = fopen("ficheros/bibliotecaris.csv", "a") or die("Unable to open file!");
fwrite($datosU, "".PHP_EOL);/* PHP_EOL= END OF LINE*/
fwrite($datosU, $_POST['nom']);
fwrite($datosU, " ");
fwrite($datosU,$_POST['cognom']);
fwrite($datosU, ",");
fwrite($datosU,$_POST['direccio']);
fwrite($datosU, ",");
fwrite($datosU,$_POST['email']);
fwrite($datosU, ",");
fwrite($datosU,$_POST['telefon']);
fwrite($datosU, ",");
fwrite($datosU,$_POST['id']);
fwrite($datosU,"B");
fwrite($datosU, ",");
fwrite($datosU,$_POST['ctsnya']);
fwrite($datosU, ",");
fwrite($datosU,$_POST['social']);
fwrite($datosU, ",");
fwrite($datosU,$_POST['contracte']);
fwrite($datosU, ",");
fwrite($datosU,$_POST['salari']);
fwrite($datosU, ",");
fwrite($datosU, "0");
fclose($datosU);
header('Location: gestio_bibliotecaris.php')
?>
