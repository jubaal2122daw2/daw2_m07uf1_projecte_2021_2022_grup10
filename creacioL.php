<?php
/* pasamos los datos al fichero usuarios*/
$datosU = fopen("ficheros/llibres.csv", "a") or die("Unable to open file!");
fwrite($datosU, $_POST['titol']);
fwrite($datosU, ",");
fwrite($datosU,$_POST['autor']);
fwrite($datosU, ",");
fwrite($datosU,$_POST['isbn']);
fwrite($datosU, ",");
fwrite($datosU, "N");
fwrite($datosU, ",");
fwrite($datosU, "0");
fwrite($datosU, ",");
fwrite($datosU, "0".PHP_EOL);
fclose($datosU);
header('Location: gestio_llibres.php')
?>


