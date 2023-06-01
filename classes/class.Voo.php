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
    protected $destino;
    protected $aeronave;
    protected $assentos = array();
    protected $passagens = array();
    protected $tripulacao = array();
    protected $freqSem;
    protected $distancia = 100000;
    protected $tarifa;


    public function __construct($_duracao, $_horarioPartida, $_horarioChegada, $_codigoDeVoo, $_Origem, $_Destino, $_sigla, $_freqSem)// tirei a tarifa do construtor
    {  
      
      if(strlen($_codigoDeVoo)>6){
        throw new Exception("Codigo de voo maior do que o permitido");
      }elseif(strlen($_codigoDeVoo)<6){
        throw new Exception("Codigo de voo menor do que o permitido");
      }if($_codigoDeVoo[0] != $_sigla[0]){
        throw new Exception("Codigo não bate com a Sigla[0]");
      }if($_codigoDeVoo[1] != $_sigla[1]){
        throw new Exception("Codigo não bate com a Sigla[1]");
      }
      
      $ii;
      for($ii=0;$ii<2;$ii++){
        $teste3 = ord($_codigoDeVoo[$ii]);
        if($teste3<65 || $teste3>90){
          throw new Exception("Codigo tem que ser letra maiuscula");
        }  
      }
      
      $this->duracao = $_duracao;
      $this->horarioPartida = $_horarioPartida;
      $this->horarioChegada = $_horarioChegada;
      $this->codigoDeVoo = $_codigoDeVoo;
      $this->origem = $_Origem;
      $this->destino = $_Destino;
      $this->freqSem = $_freqSem;
      //$this->tarifa = $_tarifa;
    }

    public function setAeronave(Aeronave $_aeronave){
      $this->aeronave = $_aeronave;
      for($i = 0; $i < $_aeronave->getAssentos(); $i++){
        $this->assentos[] = 0;
      }
    }

    public function setAssento($_assento){
      if($_assento > $this->aeronave->getAssentos()){
        throw new Exception("Assento invalido");
      }elseif($_assento < 0){
        throw new Exception("Assento invalido");
      }elseif($this->assentos[$_assento] != 0){
        //print_r($this->assentos[$_assento]);
        throw new Exception("Assento ocupado");
      }else{
        $this->assentos[$_assento] = 1;
        //$passagem = new Passagem($_bagagens, $_assento, $_origem, $_destino, $_distancia);
        //return($passagem);
      }
    }

    public function adicionaTripulacao($nome, $documento, $CPF, $nacionalidade, $dataDeNascimento, $email,               $CHT, $coordx, $coordy, $companhiaAerea, $aeroportoBase){
      
      $funcionario = new funcionario($nome, $documento, $CPF, $nacionalidade, $dataDeNascimento, $email,                 $CHT, $coordx, $coordy, $companhiaAerea, $aeroportoBase);

      $this->tripulação[] = $funcionario; 
    }

    public function getDuracao(){
      return $this->duracao;
    }
    public function getHorarioP(){
      return $this->horarioPartida;
    }
    public function getHorarioC(){
      return $this->horarioChegada;
    }

    public function getCodigo(){
      return $this->codigoDeVoo;
    } 
    
    public function getOrigem(){
      return $this->origem;
    }

    public function getDestino(){
      return $this->destino;
    }

    public function getSigla(){
      return $this->codigoDeVoo;
    }
    
    public function getFrequencia(){
      return $this->freqSem;
    }

    public function getDistancia(){
      return $this->distancia;
    }

    public function getTarifa(){
      return $this->tarifa;
    }
    
    static public function getFilename() {
      return get_called_class()::$local_filename;
    }
    
    public function __destruct() {}
  }