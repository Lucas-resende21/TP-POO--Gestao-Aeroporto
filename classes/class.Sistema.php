<?php
  include_once("persist.php");
  include_once("class.Companhia.php");
  include_once("class.Aeroporto.php");
  include_once("class.Cliente.php");
  include_once("class.Dia.php");
  include_once("class.User.php");
  include_once("class.Log.php");

  class Sistema extends persist{

    static $local_filename = "sistema.txt";
    private $aeroportos = array();
    private $calendario = array();
    private $clientes = array();
    private $passageiros = array();
    private $funcionarios = array();
    private $passagens = array();
    private $companhias = array();
    private $usuarios = array();
    private $voos = array();
    private $sessao;
    public Log $logSist;
    public static $instance;
    public static $API_KEY = "Sua Key Aqui!!!!";
    


    private function __construct(){
      $this->logSist = new Log();
      $this->sessao = 'NULL';
    }

    public static function getInstance(){
      if(!isset(self::$instance)){
        self::$instance = new Sistema();
      }
      return self::$instance;
    }

    public static function getKey(){
      return self::$API_KEY;
    }
    
    public function criaCalendario(){
    if($this->sessao == 'NULL'){
        throw new Exception("Não há um usuário Logado");
      }
    $usuario = $this->getUser();
    $this->logSist->escrita("Calendário criado pelo usuario $usuario");
    $_numdias = 30;
    date_default_timezone_set("America/Sao_Paulo");
    $Dia = date("Y/m/d"); 
        for($i = 0; $i <=$_numdias; $i++){
          $resultado = date('Y/m/d', strtotime("+{$i} days",strtotime($Dia)));
          $dia = new Dia($resultado);
          $this->calendario[$i] = $dia;
        }
    }

    public function AddVoosCompanhia($_companhia){
      for($i = 0; $i < sizeof($_companhia->getVoos()); $i++){
        $this->AddVooCalendario($_companhia->getVoo($i));
      }
    }

    public function AddVooCalendario(Voo $_voo){
      if(Sistema::getInstance()->getSessao() == 'NULL'){
        throw new Exception("Não há um usuário Logado");
      }
      for($i = 0; $i <= 30; $i++){
        if($_voo->getFrequencia() == $this->calendario[$i]->getSem()){
            $this->calendario[$i]->setViagem($_voo);
        }elseif($_voo->getFrequencia() == "diario"){
            $this->calendario[$i]->setViagem($_voo);
        }elseif($_voo->getFrequencia() != "diario" && $_voo->getFrequencia() < 0 && $_voo->getFrequencia() > 6){
          throw new Exception("Frequência errada");
        }
      }
      $voos[] = $_voo;
    }

    public function criaCompanhia(Companhia $_companhia){
      if($this->sessao == 'NULL'){
        throw new Exception("Não há um usuário Logado");
      }
      $nome = $_companhia->getNome();
      $this->companhias[] = $_companhia;
      $usuario = $this->getUser();
      $this->logSist->escrita("Companhia $nome criada pelo usuario $usuario");
    }

    public function removeCompanhia(Companhia $_companhia){
      for($i = 0; $i < count($this->companhias); $i++){
        if($this->companhias[$i] == $_companhia){
          unset($companhias[$i]);
        }
      }
    }

    public function printCompanhias(){
      print_r($this->companhias); 
    }

    public function getCompanhia($i){
      return $this->companhias[$i];
    }

    public function criaAeroporto(Aeroporto $_aeroporto){
      if($this->sessao == 'NULL'){
        throw new Exception("Não há um usuário Logado");
      }
      $nome = $_aeroporto->getCidade();
      $usuario = $this->getUser();
      $this->logSist->escrita("Aeroporto $nome criado pelo usuario $usuario");
      $this->aeroportos[] = $_aeroporto;
    }

    public function removeAeroporto(Aeroporto $_aeroporto){
      for($i = 0; $i < count($this->aeroportos); $i++){
        if($this->aeroportos[$i] == $_aeroporto){
          unset($aeroportos[$i]);
        }
      }
    }
    
    public function getAeroportos(){
      return $this->aeroportos;
    }
    
    public function criaCliente(Cliente $_cliente){
      $this->clientes[] = $_cliente;
    }

    public function removeCliente(Cliente $_cliente){
      for($i = 0; $i < count($this->clientes); $i++){
        if($this->clientes[$i] == $_cliente){
          unset($clientes[$i]);
        }
      }
    }

    public function criaPassageiro(Passageiro $_passageiro){
      $this->passageiros[] = $_passageiro;
    }

    public function removePassageiro(Passageiro $_passageiro){
      for($i = 0; $i < count($this->passageiros); $i++){
        if($this->passageiros[$i] == $_passageiro){
          unset($this->passageiros[$i]);
        }
      }
    }

    public function getPassageiros(){
      return $this->passageiros;
    }
    
    public function getClientes(){
      return $this->clientes;
    }

    public function criaPassagem(Passagem $_passagem){
      $this->passagens[] = $_passagem;
    }

    public function removePassagem(Passagem $_passagem){
      for($i = 0; $i < count($this->passagens); $i++){
        if($this->passagens[$i] == $_passagem){
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

    public function getViagemDia($_dia, $_viagem){
      return($this->calendario[$_dia]->getViagemUnica($_viagem));
    }


    /* Deve ser fornecido um método para realizar uma consulta/pesquisa por viagens tendo 
    os parâmetros a seguir:
    • Aeroporto de origem e destino
    • Data da viagem
    • Número de passageiros
    Essa consulta deve retornar uma lista de possíveis viagens, inclusive com conexões, para 
    atender o deslocamento total. O valor total de uma opção de trajeto deverá ser exibido, 
    além dos horários de embarque das viagens. A disponibilidade de assentos deve ser 
    validada. */
    public function consultaViagens($_origem, $_destino, $_data, $_numPassageiros, Voo $v){
      $viagensCorrespondentes = array();
      foreach($this->calendario as $Dia){
        for($i = 0; $i < count($Dia->getViagens()); $i++){
          if($Dia->getViagem($i)->getOrigem() == $_origem
          && $Dia->getViagem($i)->getDestino() == $_destino
          && /*$Dia->getViagem($i)->assentosDisponiveis($v) >= $_numPassageiros*/
          $Dia->getData() == $_data)
          {
            $viagensCorrespondentes[] = $Dia->getViagem($i);
          }
        }
      }
      return $viagensCorrespondentes;
    }
    

    public function setUser($_login, $_senha, $_email){
      $this->usuarios[] = new User($_login, $_senha, $_email);
      $this->logSist->escrita("Usuario $_login criado");
    }

    public function getUsers(){
      return($this->usuarios);
    }

    public function getUser(){
      return($this->usuarios[$this->getSessao()]->getLogin());
    }

    public function getSessao(){
      return($this->sessao);
    }
    public function login($_login, $_senha){
      for($i=0; $i<sizeof($this->usuarios); $i++){
        if($_login == $this->usuarios[$i]->getLogin() && $_senha == $this->usuarios[$i]->getSenha()){
          $this->sessao = $i;
          $this->logSist->escrita("Usuario $_login logado");
        }else{
          return("Senha ou login inválidos");
        }
      }
    }

    public function getLogSist(){
      return($this->logSist->getRegistro());
    }

    static public function getFilename() {
      return get_called_class()::$local_filename;
    }
  }
