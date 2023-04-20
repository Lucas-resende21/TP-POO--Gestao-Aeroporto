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
    private $calendario //talves seja um array

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
      for(int $i = 0; i < $companhias->count(); $i++){
        if($clientes[i] == $_cliente){
          unset($clientes[i]);
        }
      }
    }

    public function calendario(){
      
    }
  }