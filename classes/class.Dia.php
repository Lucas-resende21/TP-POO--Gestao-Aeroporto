<?php
  include_once("class.Voo.php");
  include_once("class.Viagem.php");
  class Dia{
    private $DiaDaSemana;
    private $viagens = array();
    private $data;

    public function __construct($_data){
      $this->data = $_data;
      $this->DiaDaSemana = date('w', strtotime($_data));
      switch ($this->DiaDaSemana){
        case 0:
          $this->DiaDaSemana = "Domingo";
          break;
        case 1:
          $this->DiaDaSemana = "Segunda";
          break;
        case 2:
          $this->DiaDaSemana = "Terça";
          break;
        case 3:
          $this->DiaDaSemana = "Quarta";
          break;
        case 4:
          $this->DiaDaSemana = "Quinta";
          break;
        case 5:
          $this->DiaDaSemana = "Sexta";
          break;
        case 6:
          $this->DiaDaSemana = "Sabado";
          break;
        default:
          throw new Exception("Dia invalido");
      }
    }

       

    public function getSem(){
      return($this->DiaDaSemana);
    }

    public function getViagem(){
      return($this->viagens);
    }     
  }