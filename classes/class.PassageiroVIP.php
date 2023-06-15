<?php
  include_once("persist.php");
  include_once("class.Cliente.php");

  class PassageiroVIP extends Passageiro
  {
    static $local_filename = "passageiroVIP.txt";
    static public function getFilename() {
      return get_called_class()::$local_filename;
    }

    private $numRegistro;
    private $programaDeMilhagem;
    private $categoria;
    private $pontos;

    public function cancelaPassagem(Passagem $p)
    {
      for($i=0; i<sizeof($this->_passagens); $i++)
      {
        if($this->_passagens[$i] == $p)
        {
          unset($this->_passagens[$i]);
            print_r("Passagem cancelada.");
            //print_r("Valor do cancelamento: R$0,00");
            /*if(programaDeMilhagem == )
            {
              setPreco(120); 
              print_r("Passagem cancelada.");
              print_r("Valor do cancelamento: R$120,00");
            }    
            else
            {
              setPreco(0);
              print_r("Passagem cancelada.");
              print_r("Valor do cancelamento: R$120,00");
            }
          echo ("</p>");
          break;*/
        }
      }
    }

    public function alteraPassagem(Passagem $p, $_bagagens, $_assento, $_origem, $_destino, $_distancia)
    {
      for($i=0; i<sizeof($this->_passagens); $i++)
      {
        if($this->_passagens[$i] == $p)
        {
          _passagens[$i].setAtributos(_bagagens, _assento, _origem, _destino, distancia);
          //istaDeObjetos.get(indice).setAtributoQualquer("Valor Novo");
        }
      }
    }

    public function getNumRegistro()
    {
      return $this->numRegistro;
    }
    
    public function getProgramaDeMilhagem()
    {
      return $this->programaDeMilhagem;
    }
    
    public function getCategoria()
    {
      return $this->categoria;
    }
    
    public function getPontos()
    {
      return $this->pontos;
    }

    public function validaVIP()
    {
      return true;
    }
}