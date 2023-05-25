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

    public function criaEscala($voos, $assento)
    {
      for($i = 0; $i < count($voos); $i++){
        if($voos[$i]->getOrigem() == $this->origem && $voos[$i]->getDestino() == $this->destino){
          $this->voosP[] = $voos[$i];
          $voos[$i]->setAssento($assento);
          return 1;
        }
        elseif($voos[$i]->getOrigem() == $this->origem && $voos[$i]->getDestino() != $this->destino){
          $this->voosP[] = $voos[$i];
          $voos[$i]->setAssento($assento);
          for($i = 0; $i < count($voos); $i++){
            if($voos[$i]->getOrigem() == $this->voosP[0]->getDestino() && $voos[$i]->getDestino() == $this->destino){
              $this->voosP[] = $voos[$i];
              $voos[$i]->setAssento($assento);
              break;
            }else{
              throw new Exception("Rota inexistente.");
            }
          }  
          return 1;
        }
      }
    }

    
    public function calculaPreco(Passageiro $p, $preco, $bagagens, $distancia)
    {
      if($p->validaVIP())
      {
        $this->preco = (($bagagens-1)*(50*0.5)) + ($distancia*0.02);
        if($p->cancelaPassagem())
        {
          $this->preco == 0;
        }
      }
      else
      {
        $this->preco = ($bagagens)*(50) + ($distancia*0.02);
        if($p->cancelaPassagem())
        {
          $this->preco == cancelaPassagem();
        }
      }
    }
      

    public function getPreco($preco)
    {
      return $this->preco;
    }

    static public function getFilename() 
    {
      return get_called_class()::$local_filename;
    }

    public function __destruct(){ }
  }

    
  