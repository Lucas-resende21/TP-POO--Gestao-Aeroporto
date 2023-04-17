<?php
  include_once("persist.php");
  class Passagem extends persist{
      static $local_filename = "passagem.txt";
      static public function getFilename() {
        return get_called_class()::$local_filename;
    }
    private $preço;
    private $bagagens;
    private $assento;

    public function __construct(float $_preço, int $_bagagens, int $_assento){
      $this->preço = $_preço;
      $this->bagagens = $_bagagens;
      $this->assento = $_assento;
    }    
    public function __desctruct(){}
  }