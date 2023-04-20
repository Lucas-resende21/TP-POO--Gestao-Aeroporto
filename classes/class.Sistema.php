<?php
  include_once("persist.php");

  class Sistema extends persist{
    
    private $companhias = array();
    private $clientes = array();
    private $aeropostos = array();
    private $calendario //talves seja um array

    public function criaCompanhia(Companhia $_companhia){
      $companhias->push($_companhia);
    }

    public function criaAeroporto(Aeroporto $_aeroporto){
      $aeroportos->push($_aeroporto);
    }

    public function criaCliente(Cliente $_cliente){
      $clientes->push($_cliente);
    }

    public function calendario(){
      
    }
  }