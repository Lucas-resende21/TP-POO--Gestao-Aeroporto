<?php

  include_once("class.Aeroporto,php");
  include_once("class.Aeronave,php");
  
    class Voo {
    protected $duracao;
    protected $horarioPartida;
    protected $horarioChegada;
    protected $codigoDeVoo;
    protected $Origem;
    protected $chegada;
    protected $aeronave;

    public function __construct($_duracao, $_horarioPartida, $_horarioChegada, $_codigoDeVoo, $_Origem, $_Destino)
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

    public function __destruct() {}
  }