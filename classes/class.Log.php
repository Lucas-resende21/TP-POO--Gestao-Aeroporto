<?php
  include_once("class.Sistema.php"); 
  class Log{
    private $registro = array();

    public function __construct(){
      date_default_timezone_set("America/Sao_Paulo");
    }

    public function escrita($_string){
      $today = date("Y m d H:i:s");  
      $_string = $_string." ".$today;
      $this->registro[] = $_string;
      print_r($_string);
      echo("\n");
    }

    public function getRegistro(){
      return($this->registro);    
    }
  }  