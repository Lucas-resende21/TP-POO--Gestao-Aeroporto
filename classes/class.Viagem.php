<?php

  include_once("class.Voo.php");
    
   class Viagem extends Voo
  {
    private $status;

    public function __construct($_duracao, $_horarioPartida, $_horarioChegada, $_codigoDeVoo, $_Origem, $_Destino, $_sigla, $_freqSem, $_tarifa, $_status)
    {
      parent::__construct($_duracao, $_horarioPartida, $_horarioChegada, $_codigoDeVoo, $_Origem, $_Destino, $_sigla, $_freqSem, $_tarifa);
      $this->status = $_status;
    }
    private function calculaDuracao($_duracao, $_horarioPartida, $horarioChegada)
    {
      $_duracao = $_horarioChegada - $_horarioPartida;
    }

    public function __destruct() {}

    // Adequar o construtor de viagem aos novos atributos de Voo pra usar ele em Dia
    
  }