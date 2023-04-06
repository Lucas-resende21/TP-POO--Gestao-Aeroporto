<?php  
  class Aeronave{
    private $fabricante; 
    private $modelo;
    private $capPassageiros;
    private $capCarga;
    private $registro;
    public function __construct(string $_fab, string $_mod, int $_capPassageiros, float $_capCarga, string $_reg){
      $this->fabricante = $_fab;
      $this->modelo = $_mod;
      $this->capPassageiros = $_capPassageiros;
      $this->capCarga = $_capCarga;
      $this->registro = $_reg;
    }
    public function __destruct(){}
  }
  