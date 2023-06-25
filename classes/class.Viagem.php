<?php

  include_once("class.Voo.php");
  include_once("class.Rota.php");

   class Viagem extends Voo
  {
    private $status;

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

    public function assentosDisponiveis(Voo $v){
      $_count = 0;
      for($i=0; $i < $v->getAeronave()->getAssentos(); $i++)
      {  
        if($v->getAssento($i) == 0)
        {
          $_count++;
        }
      }
      return $_count;
    }

    public function __destruct() {}

    // Adequar o construtor de viagem aos novos atributos de Voo pra usar ele em Dia
    
  }