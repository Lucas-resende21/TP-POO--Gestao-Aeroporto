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
    protected $freqHora;
    protected $freqDiaSem;

    public function __construct($_duracao, $_horarioPartida, $_horarioChegada, $_codigoDeVoo, $_Origem, $_Destino, $_sigla)
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
      //precisa de mudar essa validação
      
      $this->duracao = $_duracao;
      $this->horarioPartida = $_horarioPartida;
      $this->horarioChegada = $_horarioChegada;
      $this->codigoDeVoo = $_codigoDeVoo;
      $this->origem = $_Origem;
      $this->destino = $_Destino;
    }

    public function setAeronave(Aeronave $_aeronave){
      $this->aeronave = $_aeronave;
      for($i = 0; $i < $_aeronave->getAssentos(); $i++){
        $this->assentos[] = 0;
      }
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

    public function getOrigem(){
      return $origem;
    }

    public function getDestino(){
      return $destino;
    }
      
    public function getCodigo(){
      return $codigoDeVoo;
    }  
    
    static public function getFilename() {
      return get_called_class()::$local_filename;
    }
    
    public function __destruct() {}
  }