<?php
  include_once("persist.php");

  class Rota extends persist{
    
    static $local_filename = "Rota.txt";
    static public function getFilename() {
    return get_called_class()::$local_filename;
    }
    private $Duração;
    private $trajeto = array();
    private $distancia;
    private $HorarioPartida;
    private $Aeroporto;

    public function __construct($_endereço, $_aeroporto){
      $this->Aeroporto = $_aeroporto;
      $this->trajeto[] = $_endereço;
    }

    public function addEndereço($_funcionario){
      $this->trajeto[] =$_funcionario->getEndereço();
    }
    public function CalculaDistancia(){
      // A implementar. Os endereços ( de funcionário e Aeroporto tem que ser adequados para 2 Coordenadas)
    }
    
    public function CalculaDuração(){
      // A implementar
    }
    public function setHorarioPartida($_Viagem){
      $this->CalculaDuração();
      $this->HorarioPartida = $_Viagem->getHorarioP() - $this->Duração;  
    }

    
  }