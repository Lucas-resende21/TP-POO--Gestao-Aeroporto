<?php
  include_once("persist.php");
  include_once("class.Passagem.php");
  
  class Cliente extends persist{
    static $local_filename = "cliente.txt";
    static public function getFilename() {
      return get_called_class()::$local_filename;
    }
    private $nome;
    private $sobenome;
    private $documento;
    private $compraTotal;
    private $passagens = array();

    public function __construct(string $_nome, string $_sobrenome, string $_documento){
      $this->nome = $_nome;
      $this->sobrenome = $_sobrenome;
      $this->documento = $_documento;
    }

    /*
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
    */
    
    public function compraPassagem(Voo $_voo, int $_assento, int   
    $_bagagens)
    {
      $this->passagens[] = $_voo->setPassagem($_assento, $_bagagens);
    }

    public function totalPassagens($compraTotal)
    {
      for($i=0; $i<sizeof($passagens); $i++)
      {
        $compraTotal += $passagens[$i]->getPreco();  
      }
      return $compraTotal;
    }
    
    public function __desctruct(){}
  }