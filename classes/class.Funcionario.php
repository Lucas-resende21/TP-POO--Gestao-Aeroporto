<?php
include_once("class.Pessoa.php");
include_once("class.Log.php");
include_once("class.Sistema.php");


class Funcionario extends Pessoa {
    private $CHT;
    private $endereço = array();
    private $companhiaAerea;
    private $aeroportoBase;
    private $endereco;

    public function __construct($_nome, $_documento, $_CPF, $_nacionalidade, $_dataDeNascimento, $_email, $_CHT, $_endereco, $_companhiaAerea, $_aeroportoBase) {
        parent::__construct($_nome, $_documento, $_CPF, $_nacionalidade, $_dataDeNascimento, $_email);
        $this->setCHT($_CHT);
        $this->endereco = $_endereco;
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
      return($this->endereco);
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
