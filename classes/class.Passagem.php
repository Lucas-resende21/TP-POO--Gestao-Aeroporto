<?php
  include_once("persist.php");
  include_once("class.Aeroporto.php");
  include_once("class.Voo.php");
  include_once("class.Passageiro.php");

  class Passagem extends persist{
    
    static $local_filename = "passagem.txt";  
    private $preco;
    private $bagagens;
    private $assento;
    private $voosP = array();
    private $origem;
    private $destino;
    private $distancia;
    private $Passageiro;

    public function __construct($_bagagens, $_assento, $_origem, $_destino, $_distancia){
      
      //$this->Passageiro = $_Passageiro;
      //$this->preco = $_preco;
      $this->assento = $_assento;
      $this->bagagens = $_bagagens;
      $this->origem = $_origem;
      $this->destino = $_destino;
      $this->distancia = $_distancia;
      // E depois uma segunda function pra verificar se os assentos escolhidos estao disponiveis
    }    

    public function criaEscala($voos, $assento){
      //voo unico
      for($i = 0; $i < count($voos); $i++){
        if($this->origem == $voos[$i]->getOrigem() && $this->destino == $voos[$i]->getDestino()){
          $this->voosP[] = $voos[$i];
          $voos[$i]->setAssento($assento);
          return 1;
        }
      }
      //caso for escala
      for($i = 0; $i < count($voos); $i++){
        for($ii = 0; $ii < count($voos); $ii++){
          if($this->origem == $voos[$i]->getOrigem() && $voos[$i]->getDestino() == $voos[$ii]->getOrigem() && $voos[$ii]->getDestino() == $this->destino){
            array_push($this->voosP, $voos[$i]);
            array_push($this->voosP, $voos[$ii]);
            $this->voosP[0]->setAssento($assento);
            $this->voosP[1]->setAssento($assento);
            return 1;
          }
        }
      }
      throw new Exception("Rota inexistente.");
    }

    
    public function calculaPreco(Passageiro $p, Voo $v, $preco, $bagagens)
    {
      if($p->validaVIP())
      {
        $this->preco = (($bagagens-1)*(50*0.5)) + (($v->getDistancia())*0.02);
      }
      else
      {
        $this->preco = ($bagagens)*(50) + (($v->getDistancia())*0.02);
      }
    }

    public function getPreco($preco)
    {
      return $this->preco;
    }

    public function setPrecoCancelamento($_preco)
    {
      $this->preco == $_preco;
    }

    public function setPrecoAlteracao($_preco)
    {
      $this->preco += $_preco;
    }

    public function setPreco($_preco)
    {
      $this->preco == $_preco;
    }

    static public function getFilename() 
    {
      return get_called_class()::$local_filename;
    }

    public function getOrigem(){
      return $this->origem;
    }

    public function getDestino(){
      return $this->destino;
    }

    public function getVoo($i){
      return $this->voosP[$i];
    }

    public function __destruct(){ }
  }

    
  