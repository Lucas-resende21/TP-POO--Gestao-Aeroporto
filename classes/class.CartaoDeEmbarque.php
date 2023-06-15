<?php  

include_once("passageiro.php");
include_once("class.Voo.php");
include_once("class.Passagem.php")
include_once("persist.php");

public function setNome($_nome){
  echo $this->_nome;
}

public function setOrigem($origem){
  print ($origem);
}

public function setDestino($destino){
  print ($destino);
}

public function setHorarioEmbarque($embarque){
  print ($embarque)
}

public function setHorarioPartida($_Viagem){  
   print ($_Viagem->getHorarioP());
}

public function setAssento($assento){
  print ($assento);
}