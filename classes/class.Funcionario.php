<?php
include_once("class.Pessoa.php");

class Funcionario extends Pessoa {
    private $CHT;
    private $endereço = array();
    private $companhiaAerea;
    private $aeroportoBase;

    public function __construct($_nome, $_documento, $_CPF, $_nacionalidade, $_dataDeNascimento, $_email, $_CHT, $_coordx, $_coordy, $_companhiaAerea, $_aeroportoBase) {
        parent::__construct($_nome, $_documento, $_CPF, $_nacionalidade, $_dataDeNascimento, $_email);
        $this->setCHT($_CHT);
        $this->setEndereco($_coordx, $_coordy);
        $this->companhiaAerea = $_companhiaAerea;
        $this->aeroportoBase = $_aeroportoBase;
    }

    public function getCHT() {
      return $this->CHT;
    }

    public function setCHT($_CHT){
      //implementar validação da CHT
      $this->CHT = $_CHT;
    }
  
    public function getEndereco() {
      return($this->coordx,$this->coordy);
    }

    public function setEndereco($_coordx, $_coordy){
      //implementar validação do endereço
      $this->endereço[0] = $_coordx;
      $this->endereço[1] = $_coordy;
    }

    public function getCompanhiaAerea() {
      return $this->companhiaAerea;
    }

    public function getAeroportoBase() {
      return $this->aeroportoBase;
    }
}
