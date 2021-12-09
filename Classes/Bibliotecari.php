<?php

class Bibliotecari{

    private $nomB;
    private $cognomB;
    private $adrecaB;
    private $emailB;
    private $telefonB;
    private $idB;
    private $passB;
    private $sSocial;
    public $data_contracte;
    public $salari;
    public $cap;

    public function __construct($nomB,$cognomB,$adrecaB,$emailB,$telefonB,$idB,$passB,$sSocial,$data_contracte,$salari,$cap){
        $this->nomB = $nomB;
        $this->cognomB = $cognomB;
        $this->adrecaB = $adrecaB;
        $this->emailB = $emailB;
        $this->telefonB = $telefonB;
        $this->idB = $idB;
        $this->passB = $passB;
        $this->sSocial = $sSocial;
        $this->data_contracte = $data_contracte;
        $this->salari = $salari;
        $this->cap = $cap;
    }

}

class Cap extends Bibliotecari{

    function __construct($nomB,$cognomB,$adrecaB,$emailB,$telefonB,$idB,$passB,$sSocial,$data_contracte,$salari,$cap) {
        parent::__construct($nomB,$cognomB,$adrecaB,$emailB,$telefonB,$idB,$passB,$sSocial,$data_contracte,$salari,$cap);
    }

    public function getIdCap(){
        return $this-> idU;
    }

    public function getNomCap(){
        return $this-> nomU;
    }
}

class Treballador extends Bibliotecari{
    function __construct($nomB,$cognomB,$adrecaB,$emailB,$telefonB,$idB,$passB,$sSocial,$data_contracte,$salari,$cap) {
        parent::__construct($nomB,$cognomB,$adrecaB,$emailB,$telefonB,$idB,$passB,$sSocial,$data_contracte,$salari,$cap);
    }

    public function getIdTreb(){
        return $this-> idB;
    }

    public function getNomTreb(){
        return $this-> nomB;
    }
}

?>