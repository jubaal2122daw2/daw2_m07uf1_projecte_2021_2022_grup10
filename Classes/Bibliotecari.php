<?php
include_once "Persona.php";
class Bibliotecari extends Persona{

    private $sSocial;
    public $data_contracte;
    public $salari;
    public $cap;

    public function __construct($nomCognom,$adreca,$email,$telefon,$id,$pass,$sSocial,$data_contracte,$salari,$cap){
        $this->nomCognom = $nomCognom;
        $this->adreca = $adreca;
        $this->email = $email;
        $this->telefon = $telefon;
        $this->id = $id;
        $this->pass = $pass;
        $this->sSocial = $sSocial;
        $this->data_contracte = $data_contracte;
        $this->salari = $salari;
        $this->cap = $cap;
    }

    public function verInfo(){
        return"
            <tr>
                <td>{$this->nomCognom}</td>
                <td>{$this->adreca}</td>
                <td>{$this->email}</td>
                <td>{$this->telefon}</td>
                <td>{$this->id}</td>
                <td>{$this->pass}</td>
                <td>{$this->sSocial}</td>
                <td>{$this->data_contracte}</td>
                <td>{$this->salari}</td>
                <td>{$this->cap}</td>
            </tr>
        ";
    }

}

?>