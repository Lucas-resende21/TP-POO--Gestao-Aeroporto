<?php
  include_once("persist.php");
  include_once("class.Aeroporto.php");
  include_once("class.Viagem.php");
  //include_once()
  class Passagem extends persist{
    
    static $local_filename = "passagem.txt";  
    private $preço;
    private $bagagens;
    private $assento;
    private $voosP = array();
    private $origem;
    private $destino;

    public function __construct(float $_preço, int $_bagagens, Aeroporto $_destino, int $_assento, $voos){
      $this->preço = $_preço;
      $this->bagagens = $_bagagens;
      $this->destino = $_destino;
      // E depois uma segunda function pra verificar se os assentos escolhidos estao disponiveis
    }    

    public function criaEscala($voos)
    {
      for($i = 0; $i < $voos->count(); $i++){
        if($voos[i]->getOrigem() == $origem && $voos[i]->getDestino() == $destino){
          $voosP[] = $voos[i];
          break;
        }
        elseif($voos[i]->getOrigem() == $origem && $voos[i]->getDestino() != $destino){
            $voosP[] = $voos[i];
            for($i = 0; $i < $voos->count(); $i++){
              if($voos[i]->getOrigem() == $voosP[0]->getDestino() && $voos[i]->getDestino() == $destino){
                $voosP[] = $voos[i];
              }
            }
            break;
          }
        }
      }
    }

    static public function getFilename() {
        return get_called_class()::$local_filename;
    }

    public function __destruct(){ }
  }