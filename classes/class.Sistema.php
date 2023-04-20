<?php
  include_once("persist.php");
  include_once("class.Companhia.php");
  include_once("class.Calendario.php");
  include_once("class.Aeroporto.php");
  include_once("class.Cliente.php");

  class Sistema extends persist{
    
    private $companhias = array();
    private $aeroportos = array();
    private $clientes = array();
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

    public function getCompanhias(){
      print_r($this->companhias);
      echo("</p>");
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
    
    public function getAeroportos(){
      print_r($this->$aeroportos);
      echo("</p>");
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

    public function getClientes(){
      print_r($this->clientes);
      echo("</p>");
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

    public function getPassagens(){
      print_r($this->passagens);
      echo("</p>");
    }

    public function calendario(){
      
    }
  }
