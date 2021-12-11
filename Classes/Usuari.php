<?php
include_once "Persona.php";
class Usuari extends Persona{
    public $prestat;
    public $isbn_prestat;
    public $data_prestec;

    public function __construct($nomCognom,$adreca,$email,$telefon,$id,$pass,$prestat,$isbn_prestat,$data_prestec){
        $this->nom = $nomCognom;
        $this->adreca = $adreca;
        $this->email = $email;
        $this->telefon = $telefon;
        $this->id = $id;
        $this->pass = $pass;
        $this->prestat = $prestat;
        $this->isbn_prestat = $isbn_prestat;
        $this->data_prestec = $data_prestec;
        }
      
    }

?>