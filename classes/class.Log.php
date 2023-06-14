<?php
  include_once("class.Sistema.php"); 
  class Log{
    private $registro = array();

    public function __construct(){
    }

    public function escrita($_string){
      $this->registro[] = $_string;
      print_r($_string);
      echo("\n");
    }

    public function getRegistro(){
      return($this->registro);    
    }
  }  