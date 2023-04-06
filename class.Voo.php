<?php

  include_once("class.Aeroporto,php");
  include_once("class.Aeronave,php");
  
  class Voo 
  {
    protected $duracao;
    protected $horarioPartida;
    protected $horarioChegada;
    protected $codigoDeVoo;
    protected $cidadeOrigem;
    protected $cidadeDestino;

    public function __construct($_duracao, $_horarioPartida, $_horarioChegada, $_codigoDeVoo,
                                 $_cidadeOrigem, $_cidadeDestino)
    {
      $this->duracao = $_duracao;
      $this->horarioPartida = $_horarioPartida;
      $this->horarioChegada = $_horarioChegada;
      $this->codigoDeVoo = $_codigoDeVoo;
      $this->cidadeOrigem = $_cidadeOrigem;
      $this->cidadeDestino = $_cidadeDestino;
    }

    public function __destruct() {}
  }