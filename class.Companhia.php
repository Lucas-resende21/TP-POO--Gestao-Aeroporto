<?php
  include_once("class.Aeronave.php")
  
  class Companhia{
    
    private $_nome;
    private $_codigo;
    private $_razsocial;
    private $_CNPJ;
    private $_sigla;
    private $_aeronaves = array();

    
    public function __construct(string $nome, string $cod, string $razsocial, int $CNPJ, string $sigla) {
      
      $this->_nome = $nome;
      $this->_codigo = $cod;
      $this->_razsocial = $razsocial;
      $this->_CNPJ = $CNPJ;
      $this->_sigla = $sigla;
    }

    public function adicionaAeronave(string $fab, string $mod, int $capPsg, float $capCarg, string $reg) {

      $aeronave = new Aeronave($fab, $mod, $capPsg, $capCarg, $reg);
      $this->_aeronaves[] = $aeronave;
    }

    public function removeAeronave(Aeronave $aeronave){

      for($i = 0; $i < sizeof($aeronaves()); $i++) {
          
          if($aeronaves[$i] == $aeronave)  {
            unset($this->aeronaves[$i]);
          }
      }
    }

    public function getAeronave(int $o){
      print_r($this->_aeronaves[$o]);
      echo ("</p>");
    }

    public function __destruct(){}
  }