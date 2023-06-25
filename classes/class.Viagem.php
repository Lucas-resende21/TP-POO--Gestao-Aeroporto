<?php

  include_once("class.Voo.php");
  include_once("class.Rota.php");

   class Viagem extends Voo
  {
    private $status;
    private $data;

    public function __construct($_duracao, $_horarioPartida, $_horarioChegada, $_codigoDeVoo, $_Origem, $_Destino, $_sigla, $_freqSem, $_tarifa, $_status)
    {
      parent::__construct($_duracao, $_horarioPartida, $_horarioChegada, $_codigoDeVoo, $_Origem, $_Destino, $_sigla, $_freqSem, $_tarifa);
      $this->status = $_status;
    }
    private function calculaDuracao($_horarioPartida, $_horarioChegada)
    {
      $_duracao = $_horarioChegada - $_horarioPartida;
      return $_duracao;
    }

    public function setData($_data){
      $this->data = $_data;
    }

    public function getData(){
      return $this->data;
    }
    
    public function __destruct() {}

    // Adequar o construtor de viagem aos novos atributos de Voo pra usar ele em Dia
    
  }