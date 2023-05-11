<?php
  include_once("class.Voo.php");
  include_once("class.Viagem.php");
  class Dia{
    private $DiaDaSemana;
    private $viagens = array();

    public function __construct($_DiaDaSemana){
      $this->DiaDaSemana = $_DiaDaSemana;
    }

    public function setViagem($_Voo){
      $this->viagens[] = $_Voo;
    }

    public function getSem(){
      return($this->DiaDaSemana);
    }
        
  }