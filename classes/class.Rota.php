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
      // resolver a questão de colocar o endereço do aeroporto na matriz de endereços e adequar dnv os 
      // outros endereços no programa dessa vez p serem um array(coordx, coordy)
    }

    public function addEndereço($_coordx, $_coordy){
      $coords = array($_coordx, $_coordy);
      $this->trajeto[] = $coords();
      $a = count($this->trajeto);
      $this->distancia = $this->distancia + $this->CalculaDistancia($this->trajeto($a)(0),$this->trajeto($a)(1),$_coordx, $_coordy);
    }
    public function CalculaDistancia($_x1, $_y1, $_x2, $_y2){
      return(110.57*sqrt(pow($_x2-$_x1,2)+pow($_y2-$_y1)));
    }
    
    public function CalculaDuração(){
      $this->Duração = $this->distancia/18;
        // A implementar
    }
    public function setHorarioPartida($_Viagem){
      $this->CalculaDuração();
      $this->HorarioPartida = $_Viagem->getHorarioP()-$this->Duração-90;  
    }
  }