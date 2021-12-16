<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
$fitxer_usuaris="usuari";
$fp=fopen($fitxer_usuaris,"r") or die ("No s'ha pogut validar l'usuari");

if ($fp) {
    $mida_fitxer=filesize($fitxer_usuaris);    
    $usuaris = explode(PHP_EOL, fread($fp,$mida_fitxer));
}
   foreach ($usuaris as $usuari) {
    $logpwd = explode(":",$usuari);
   }
   

?>
</body>
</html>