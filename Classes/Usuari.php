<?php

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

        public function __construct($nomU,$cognomU,$adrecaU,$emailU,$telefonU,$idU,$passU,$prestat,$isbn_prestat,$data_prestec){
			$this->nomU = $nomU;
			$this->cognomU = $cognomU;
			$this->adrecaU = $adrecaU;
            $this->emailU = $emailU;
            $this->telefonU = $telefonU;
            $this->idU = $idU;
            $this->passU = $passU;
            $this->prestat = $prestat;
            $this->isbn_prestat = $isbn_prestat;
            $this->data_prestec = $data_prestec;
		}

        public function getIdUser(){
            return $this-> idU;
        }



    }


?>