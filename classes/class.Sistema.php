<?php
  include_once("persist.php");
  include_once("class.Companhia.php");
  include_once("class.Calendario.php");
  include_once("class.Aeroporto.php");
  include_once("class.Cliente.php");

  class Sistema extends persist{
    
    private $companhias = array();
    private $clientes = array();
    private $aeropostos = array();
    private $passagens = array();
    private $calendario //talvez seja um array

    public function criaCompanhia(Companhia $_companhia){
      $companhias->push($_companhia);
    }

    public function removeCompanhia(Companhia $_companhia){
      for(int $i = 0; i < $companhias->count(); $i++){
        if($companhias[i] == $_companhia){
          unset($companhias[i]);
        }
      }
    }

    public function criaAeroporto(Aeroporto $_aeroporto){
      $aeroportos->push($_aeroporto);
    }

    public function removeAeroporto(Aeroporto $_aeroporto){
      for(int $i = 0; i < $aeroportos->count(); $i++){
        if($aeroportos[i] == $_aeroporto){
          unset($aeroportos[i]);
        }
      }
    }

    public function criaCliente(Cliente $_cliente){
      $clientes->push($_cliente);
    }

    public function removeCliente(Cliente $_cliente){
      for(int $i = 0; i < $clientes->count(); $i++){
        if($clientes[i] == $_cliente){
          unset($clientes[i]);
        }
      }
    }

    public function criaPassagem(Passagem $_passagem){
      $passagens->push($_passagem);
    }

    public function removePassagem(Passagem $_passagem){
      for(int $i = 0; i < $passagens->count(); $i++){
        if($passagens[i] == $_passagem){
          unset($passagens[i]);
        }
      }
    }

    public function calendario(){
      
    }
  }















public function criaPassagens(){
      for($i=0; i<aeronave->capPassageiros; i++)
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
    }