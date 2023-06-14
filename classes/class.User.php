<?php

  class User{
    

    private string $login;
    private $senha;
    private $email;

    public function __construct($_login, $_senha, $_email){
      $this->login = $_login;
      $this->senha = $_senha;
      $this->email = $_email;      
    }

    public function getSenha(){
      return($this->senha);
    }

    public function getLogin(){
      return($this->login);
    }

    
  }
   