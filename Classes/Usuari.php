<?php
include_once "Persona.php";
class Usuari extends Persona{
    public $prestat;
    public $isbn_prestat;
    public $data_prestec;

    public function __construct($nomCognom,$adreca,$email,$telefon,$id,$pass,$prestat,$isbn_prestat,$data_prestec){
        $this->nomCognom = $nomCognom;
        $this->adreca = $adreca;
        $this->email = $email;
        $this->telefon = $telefon;
        $this->id = $id;
        $this->pass = $pass;
        $this->prestat = $prestat;
        $this->isbn_prestat = $isbn_prestat;
        $this->data_prestec = $data_prestec;
    }

    public function __destruct()
    {
        error_log("Usuari alliberat amb èxit",0);
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
                    <td>{$this->prestat}</td>
                    <td>{$this->isbn_prestat}</td>
                    <td>{$this->data_prestec}</td>
                </tr>
            ";
        }
    }

    
?>