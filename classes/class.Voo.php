<?php

  include_once("class.Aeroporto.php");
  include_once("class.Aeronave.php");
  include_once("class.Passagem.php");
  
    class Voo{
    protected $duracao;
    protected $horarioPartida;
    protected $horarioChegada;
    protected $codigoDeVoo;
    protected $origem;
    protected $chegada;
    protected $aeronave;
    protected $assentos = array();
    protected $passagens = array();

    public function __construct($_duracao, $_horarioPartida, $_horarioChegada, $_codigoDeVoo, $_Origem, $_Chegada)
    {
      $this->duracao = $_duracao;
      $this->horarioPartida = $_horarioPartida;
      $this->horarioChegada = $_horarioChegada;
      $this->codigoDeVoo = $_codigoDeVoo;
      $this->origem = $_Origem;
      $this->chegada = $_Chegada;
    }

    public function setAeronave(Aeronave $_aeronave){
      $this->aeronave = $_aeronave;
    }

    public function getAssentos(){
      print_r($this->assentos);
      echo("</p>");
    }

    public function setPassagem(int $_assento, int $_bagagens){
      if($_assento>$this->aeronave->getCapacidade()){
        throw new Exception("Assento invalido");
      }elseif($this->assentos[$_assento] == 1){
        throw new Exception("Assento invalido");
      }else{
         $this->assentos[$_assento] = 1;
          $passagem = new Passagem($_assento,$_bagagens);
        return($passagem);
      }
    }
    public function __destruct() {}
  }