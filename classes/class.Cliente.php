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
  private $histCompras = array();

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

  public function compraPassagem($_origem, $_destino ,$_distancia, $_assento, $_bagagens, Passageiro $_viajante, $_voos)
  {
    $passagem = new Passagem($_bagagens, $_assento, $_origem, $_destino, $_distancia);
    if($passagem->criaEscala($_voos, $_assento) == 1){
      $this->histCompras[] = $passagem;
      $_viajante->atribuiPassagem($passagem);
    }
    //set passagem tem que mudar de local, porque não faz sentido criar uma passagem baseando em um voo, então para mudar a compra e se basear em uma origem e um destino tem q mudar isso para checar se o assento tá ocupado ou não.
  }

  public function totalPassagens($compraTotal)
  {
    for($i=0; $i<sizeof($this->histCompras); $i++)
    {
      $compraTotal += $this->histCompras[$i]->getPreco();  
    }
    return $compraTotal;
  }

  public function getPassagem(){
    return $this->histCompras[count($this->histCompras)];
  }

  public function __destruct(){}
}