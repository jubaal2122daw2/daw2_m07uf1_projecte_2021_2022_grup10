<?php
	/*$nomU = $_POST['nom'];
    $cognomU = $_POST['cognom'];
    $direccioU = $_POST['direccio'];
    $emailU = $_POST['email'];
    $telefonU = $_POST['telefon'];
    $idU = $_POST['id'];
    $ctsnyaU = $_POST['ctsnya'];
    echo $nomU;
    echo $cognomU;
    echo $direccioU;
    echo $emailU;
    echo $telefonU;
    echo $idU;
    echo $ctsnyaU;
    <?php*/
    class Usuari{
        private $nomU;
        private $cognomU;
        private $adrecaU;
        private $emailU;
        private $telefonU;
        private $idU;
        private $passU;
        public $prestat;
        public $isbn_prestat;
        public $data_prestec;
        

    


  // Methods
  function set_name($nomU) {
    $this->nomU = $nomU;
  }
  function get_name() {
    return $this->nomU;
  }
}

$usu1=

$apple = new Fruit();

$apple->set_name($_POST['nom']);


echo $apple->get_name();
echo "<br>";


/* pasamos los datos al fichero usuarios*/
$datosU = fopen("usuarios.txt", "a") or die("Unable to open file!");

fwrite($datosU, $_POST['nom'].PHP_EOL);/* PHP_EOL= END OF LINE*/
fclose($datosU);

?>
