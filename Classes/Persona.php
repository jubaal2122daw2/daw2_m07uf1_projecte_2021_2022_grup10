<?php

abstract class Persona{

    protected $nomCognom;
    protected $adreca;
    protected $email;
    protected $telefon;
    protected $id;
    protected $pass;

    public function getIdUser(){
        return $this-> id;
    }

    public function getNomUser(){
        return $this-> nomCognom;
    }

    //hacer alguna funcion abstracta para que sea interface
}

?>