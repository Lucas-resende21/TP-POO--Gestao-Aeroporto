<?php
  include_once("class.Voo.php");
  include_once("class.Viagem.php");
  class Dia{
    private $DiaDaSemana;
    private $viagens = array();

    public function __construct($_DiaDaSemana){
      switch ($_DiaDaSemana) {
        case 0:
          $this->DiaDaSemana = "Domingo";
        case 1:
          $this->DiaDaSemana = "Segunda";
        case 2:
          $this->DiaDaSemana = "Terça";
        case 3:
          $this->DiaDaSemana = "Quarta";
        case 4:
          $this->DiaDaSemana = "Quinta";
        case 5:
          $this->DiaDaSemana = "Sexta";
        case 6:
          $this->DiaDaSemana = "Sabado";
      }
    }

    public function setViagem($_Voo){
      $this->viagens[] = $_Voo;
    }

    public function getSem(){
      return($this->DiaDaSemana);
    }     
  }