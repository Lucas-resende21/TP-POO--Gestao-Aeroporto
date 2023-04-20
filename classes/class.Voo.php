<?php

  include_once("class.Aeroporto.php");
  include_once("class.Aeronave.php");
  include_once("class.Passagem.php");
  
    class Voo extends persist {
    protected $duracao;
    protected $horarioPartida;
    protected $horarioChegada;
    protected $codigoDeVoo;
    protected $Origem;
    protected $chegada;
    protected $aeronave;
    protected $assentos = array();
    protected $passagens = array();

    public function __construct($_duracao, $_horarioPartida, $_horarioChegada, $_codigoDeVoo, $_Origem,       
                                $_Destino)
    {
      $this->duracao = $_duracao;
      $this->horarioPartida = $_horarioPartida;
      $this->horarioChegada = $_horarioChegada;
      $this->codigoDeVoo = $_codigoDeVoo;
      $this->Origem = $_Origem;
      $this->Destino = $_Destino;
    }
    
    public function setAeronave(Aeronave $_aeronave){
      $this->aeronave = $_aeronave;
    }

    public function criaAssentos(){
      for($i=0; i<aeronave->capPassageiros; i++)
      {
        assentos[i] = 0;
      }
    }

    public function setAssento(int $_assento){
      $this->assentos[$_assento] = 1;
    }

    public function getAssentos(){
      print_r($this->assentos);
      echo("</p>");
    }

    public function __destruct() {}
  }