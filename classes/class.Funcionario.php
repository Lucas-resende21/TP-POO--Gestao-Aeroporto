<?php
include_once("class.Pessoa.php");

class Funcionario extends Pessoa {
    private $CHT;
    private $endereco;
    private $companhiaAerea;
    private $aeroportoBase;

    public function __construct($_nome, $_documento, $_CPF, $_nacionalidade, $_dataDeNascimento, $_email, $_CHT, $_endereco, $_companhiaAerea, $_aeroportoBase) {
        parent::__construct($_nome, $_documento, $_CPF, $_nacionalidade, $_dataDeNascimento, $_email);
        $this->setCHT($_CHT);
        $this->setEndereco($_endereco);
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
      return $this->endereco;
    }

    public function setEndereco($_endereco){
      //implementar validação do endereço
      $this->endereco = $_endereco;
    }

    public function getCompanhiaAerea() {
      return $this->companhiaAerea;
    }

    public function getAeroportoBase() {
      return $this->aeroportoBase;
    }
}
