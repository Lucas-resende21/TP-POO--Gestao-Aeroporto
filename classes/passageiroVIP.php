<?php
  include_once("persist.php");
  include_once("class.cliente.php");

class Passageiro extends passageiro{
    static $local_filename = "passageiroVIP.txt";
    static public function getFilename() {
      return get_called_class()::$local_filename;
    }

    public function cancelaPassagem()
    {
      
    } 
  
    public function compraFranquia()
    {
      
    }
}