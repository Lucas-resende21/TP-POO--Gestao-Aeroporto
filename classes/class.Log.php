<?php
  include_once("class.Sistema.php"); 
  class Log{
    private $registro = array();

    public function __construct(){
    }

    public function escrita($_string){
      $today = date("F j, Y, g:i a");  
      $_string = $_string." ".$today;
      $this->registro[] = $_string;
      print_r($_string);
      echo("\n");
    }

    public function getRegistro(){
      return($this->registro);    
    }
  }  