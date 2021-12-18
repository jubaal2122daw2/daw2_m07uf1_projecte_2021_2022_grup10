<?php

class Llibre{
    public $titol;
    public $autor;
    public $ISBN;
    public $prestat_L;
    public $data_prestecL;
    private $id_usuari;

    public function __construct($titol,$autor,$ISBN,$prestat_L,$data_prestecL,$id_usuari){
        $this->titol = $titol;
        $this->autor = $autor;
        $this->ISBN = $ISBN;
        $this->prestat_L = $prestat_L;
        $this->data_prestecL = $data_prestecL;
        $this->id_usuari = $id_usuari;
    }
    public function __destruct()
    {
        error_log("Llibre alliberat amb èxit",0);
    }

    public function verInfoLibro(){
        return"
            <tr>
                <td>{$this->titol}</td>
                <td>{$this->autor}</td>
                <td>{$this->ISBN}</td>
                <td>{$this->prestat_L}</td>
                <td>{$this->data_prestecL}</td>
                <td>{$this->id_usuari}</td>
            </tr>
        ";
    }
    
}

?>