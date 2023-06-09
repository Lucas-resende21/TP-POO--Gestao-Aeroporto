<?php
  include_once("persist.php");
  include_once("class.Companhia.php");
  include_once("class.Aeroporto.php");
  include_once("class.Cliente.php");
  include_once("class.Dia.php");

  class Sistema extends persist{

    static $local_filename = "sistema.txt";
    private $aeroportos = array();
    private $calendario = array();
    private $clientes = array();
    private $passageiros = array();
    private $funcionarios = array();
    private $passagens = array();
    private $companhias = array();

    public function criaCalendário($_1stdia, $_numdias){
    $rotate = $_1stdia;
        for($i = 1; $i <= $_numdias; $i++){
          if($rotate = 7){
            $rotate = 0;
          }
          $this->calendario[$i] = new Dia($rotate);
          $rotate++;
        }
    }

    public function AddVoosCompanhia($_companhia){
      for($i = 0; $i<sizeof($_companhia->getVoos()); $i++){
        $this->AddVooCalendario($_companhia->getVoo());
      }
    }

    public function AddVooCalendario($_voo){
      for($i = 1; $i <= 30; $i++){
        if($_voo->getFrequencia() == $this->calendario[$i]->getSem()){
            $this->calendario[$i]->setViagem($_voo);
        }elseif($_voo->getFrequencia() == "diario"){
          $this->calendario[$i]->setViagem($_voo);
        }
      }
    }

    public function criaCompanhia(Companhia $_companhia){
      $this->companhias[] = $_companhia;
    }

    public function removeCompanhia(Companhia $_companhia){
      for($i = 0; $i < $companhias->count(); $i++){
        if($companhias[$i] == $_companhia){
          unset($companhias[$i]);
        }
      }
    }

    public function printCompanhias(){
      print_r($this->companhias); 
    }

    public function criaAeroporto(Aeroporto $_aeroporto){
      $this->aeroportos[] = $_aeroporto;
    }

    public function removeAeroporto(Aeroporto $_aeroporto){
      for($i = 0; $i < $aeroportos->count(); $i++){
        if($aeroportos[$i] == $_aeroporto){
          unset($aeroportos[$i]);
        }
      }
    }
    
    public function getAeroportos(){
      print_r($this->$aeroportos);
    }
    
    public function criaCliente(Cliente $_cliente){
      $this->clientes[] = $_cliente;
    }

    public function removeCliente(Cliente $_cliente){
      for($i = 0; $i < $clientes->count(); $i++){
        if($clientes[$i] == $_cliente){
          unset($clientes[$i]);
        }
      }
    }

    public function criaPassageiro(Passageiro $_passageiro){
      $this->passageiros[] = $_passageiro;
    }

    public function removePassageiro(Passageiro $_passageiro){
      for($i = 0; $i < $passageiros->count(); $i++){
        if($this->passageiros[$i] == $_passageiro){
          unset($this->passageiros[$i]);
        }
      }
    }
    
    public function getClientes(){
      print_r($this->clientes);
    }

    public function criaPassagem(Passagem $_passagem){
      $this->passagens[] = $_passagem;
    }

    public function removePassagem(Passagem $_passagem){
      for($i = 0; $i < $passagens->count(); $i++){
        if($passagens[$i] == $_passagem){
          unset($passagens[$i]);
        }
      }
    }

    public function getPassagens(){
      print_r($this->passagens);
    }

    public function getCalendario(){
      return($this->calendario);
    }

    public function getViagens($_i){
      return($this->calendario[$_i]->getViagem());
    }

    static public function getFilename() {
      return get_called_class()::$local_filename;
    }
  }
