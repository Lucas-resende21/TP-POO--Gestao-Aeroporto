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
      for(int i=0; i<aeronave->capPassageiros; i++)
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

    public function criaPassagens(){
      for(int i=0; i<aeronave->capPassageiros; i++)
        passagens[i] = 1;
    }

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

    public function getPassagens(){
      print_r($this->passagens);
      echo("</p>");

  

    public function __destruct() {}
  }