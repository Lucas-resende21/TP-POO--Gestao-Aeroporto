<?php

//include_once("persist.php");
include_once("class.Passagem.php");
include_once("class.Pessoa.php");

class Cliente extends Pessoa{
  static $local_filename = "cliente.txt";

  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  private $compraTotal;
  private $passagens = array();

  public function __construct(string $_nome, string $_documento, $_CPF, $_nacionalidade, $_dataDeNascimento, $_email) {
    parent::__construct($_nome, $_documento, $_CPF, $_nacionalidade, $_dataDeNascimento, $_email);
}


  /*
  public function setPassagem(int $_assento, int $_bagagens){
    if($_assento>$this->aeronave->getCapacidade()){
      throw("Assento indisponível");
    }
    elseif($this->assentos[$_assento] == 1){
      throw("Assento indisponível");
    }
    else{
       $this->assentos[$_assento] = 1;
        $passagem = new Passagem($_assento,$_bagagens);
      return($passagem);
    }
  }
  */

  public function compraPassagem(Voo $_voo, int $_assento, int $_bagagens, Passageiro $_viajante)
  {
    $this->passagens[] = $_voo->setPassagem($_bagagens, $_assento, $_voo->getOrigem(), 
                                            $_voo->getDestino(), $_voo->getDistancia());

    $_viajante->atribuiPassagem($_voo->setPassagem($_bagagens, $_assento, $_voo->getOrigem(), 
                                                   $_voo->getDestino(), $_voo->getDistancia()));
  }

  public function totalPassagens($compraTotal)
  {
    for($i=0; $i<sizeof($this->passagens); $i++)
    {
      $compraTotal += $this->passagens[$i]->getPreco();  
    }
    return $compraTotal;
  }

  public function __destruct(){}
}