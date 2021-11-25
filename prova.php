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
class Fruit {
  // Properties
  public $nomU;


  // Methods
  function set_name($nomU) {
    $this->nomU = $nomU;
  }
  function get_name() {
    return $this->nomU;
  }
}

$apple = new Fruit();

$apple->set_name($_POST['nom']);


echo $apple->get_name();
echo "<br>";
?>
