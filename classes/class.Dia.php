<?php
  class Dia{
    private $DiaDaSemana;
    private $viagens = array();

    public function __construct($_DiaDaSemana){
      $this->DiaDaSemana = $_DiaDaSemana;
    }

    public function setViagem($_viagem){
      $this->viagens[] = $_viagem;
    }
        
  }