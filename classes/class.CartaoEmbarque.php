<?php  

include_once("class.Passageiro.php");
include_once("class.Voo.php");
include_once("class.Passagem.php");
include_once("persist.php");

Class CartaoEmbarque{
  private $nome;
  private $origem;
  private $destino;
  private $assento;
  private $horarioEmbarque;
  private $horarioViagem;

  public function imprimeCartao(){
    echo "Passageiro: ",$this->nome ,"\nOrigem: ", $this->origem, "\nDestino: ", $this->destino, "\nHorario de embarque: ", $this->horarioEmbarque, "\nHorario da Viagem: ", $this->horarioViagem, "\nAssento: ", $this->assento;
  }

  public function __construct($_nome, $_origem, $_destino, $_assento, $_horarioEmbarque, $_horarioViagem){
    $this->nome = $_nome;
    $this->origem = $_origem;
    $this->destino = $_destino;
    $this->assento = $_assento;
    $this->horarioEmbarque = $_horarioEmbarque;
    $this->horarioViagem = $_horarioViagem;
  }
}