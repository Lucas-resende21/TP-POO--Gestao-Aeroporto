<?php
  include_once("class.Aeronave.php");
  include_once("class.Voo.php");
  include_once("class.Passagem.php");
  include_once("persist.php");
  include_once("class.Sistema.php");
  include_once("class.Aeroporto.php");
  
  class Companhia extends persist{
    
    private $_nome;
    private $_codigo;
    private $_razsocial;
    private $_CNPJ;
    private $_sigla;
    private $_planoDeMilhagem;
    private $_aeronaves = array();
    private $_voos = array();
    private $_passagens = array(); 
    private $_funcionarios = array();
    static $local_filename = "companhia.txt";
    private $sistema;

    
    public function __construct(string $nome, string $cod, string $razsocial, int $CNPJ, string $sigla) {
      if(strlen($sigla)>2){
        throw new Exception("Código invalido, maior");
      }elseif(strlen($sigla)<2){
        throw new Exception("Código invalido, menor");
      }
      for($ii=0;$ii<2;$ii++){
        $teste3 = ord($sigla[$ii]);
        if($teste3<65 || $teste3>90){
          throw new Exception("Registro invalido");
        }  
      }
      $this->_nome = $nome;
      $this->_codigo = $cod;
      $this->_razsocial = $razsocial;
      $this->_CNPJ = $CNPJ;
      $this->_sigla = $sigla;
    }

    

    public function adicionaAeronave(string $fab, string $mod, int $capPsg, float $capCarg, string $reg) {
      if(Sistema::getInstance()->getSessao() == 'NULL'){
        throw new Exception("Não há um usuário Logado");
      }
      $aeronave = new Aeronave($fab, $mod, $capPsg, $capCarg, $reg);
      $this->_aeronaves[] = $aeronave;
      $usuario = Sistema::getInstance()->getUser();
      Sistema::getInstance()->logSist->escrita("Aeronave $reg criada pelo usuario $usuario");
    }

    public function removeAeronave(Aeronave $aeronave){

      for($i = 0; $i < sizeof($this->_aeronaves); $i++) {
          
          if($this->_aeronaves[$i] == $aeronave)  {
            unset($this->_aeronaves[$i]);
            print_r("Removeu a Aeronave.");
            echo ("\n");
          }
      }
    }
    
    public function getAeronaves(){
      print_r($this->_aeronaves);
      echo ("\n");
    }
    
    public function getAeronave(int $o){
      return($this->_aeronaves[$o]);
    }
    
    public function setVoo($voo){
      if(Sistema::getInstance()->getSessao() == 'NULL'){
        throw new Exception("Não há um usuário Logado");
      }
      $usuario = Sistema::getInstance()->getUser();
      $frase1 = $voo->getOrigem();
      $frase2 = $voo->getDestino();
      $frase = $frase1." ".$frase2;
      Sistema::getInstance()->logSist->escrita("Voo $frase criado pelo usuario $usuario");
      $this->_voos[] = $voo;
    }
    
    public function getVoo(int $o){
      return($this->_voos[$o]);
    }
    
    public function getVoos(){
      return $this->_voos;
    }
    
    public function removeVoo(Voo $_voo){
      for($i = 0; $i < sizeof($this->_voos); $i++) {
          if($this->_voos[$i] == $_voo) {
            unset($this->_voos[$i]);
            print_r("Removeu o Voo.");
            echo ("\n");
          }
      }
    }
    public function setPlanoDeMilhagem(PlanoMilhagem $_planoMilhagem){
      $this->_planoDeMilhagem = $_planoMilhagem;
    }

    public function getPlanoDeMilhagem(){
      return $this->_planoDeMilhagem;
    }

    public function getSigla(){
      return $this->_sigla;
    }

    public function getNome(){
      return $this->_nome;
    }
    
    static public function getFilename() {
      return get_called_class()::$local_filename;
    }
    
    public function __destruct(){}
  }