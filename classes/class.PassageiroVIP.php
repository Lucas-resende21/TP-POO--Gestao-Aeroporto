<?php
  include_once("persist.php");
  include_once("class.cliente.php");

  class Passageiro extends Passageiro
  {
    static $local_filename = "passageiroVIP.txt";
    static public function getFilename() {
      return get_called_class()::$local_filename;
    }

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
        }       
      }
    }

    public function validaVIP()
    {
      return true;
    }
}