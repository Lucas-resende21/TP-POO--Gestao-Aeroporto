<?php
  include_once("persist.php");
  include_once("class.cliente.php");

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

    public function cancelaPassagem()
    {
      for($i=0; i<sizeof($this->_passagens); $i++)
      {
        if($this->_passagens[$i] == $p)
        {
          unset($this->_passagens[$i]);
            print_r("Passagem cancelada.");
            echo ("</p>");
          break;

          return 0;
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