<?php  

include_once("passageiro.php");
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

  public function __construct(Passageiro $p){
    $this->nome = $p->getNome();
    $this->origem = $p->getPassagem()->getOrigem();
    $this->destino = $p->getPassagem()->getDestino();
  }
}