<?php

  class User{
    

    private $login;
    private $senha;
    private $email;

    public function __construct($_login, $_senha, $_email){
      $this->login = $_login;
      $this->senha = $_senha;
      $this->email = $_email;      
    }

    
  }
   