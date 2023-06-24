<?php

class Aeroporto{
    protected $sigla;
    protected $cidade;
    protected $estado;
    protected $endereço;
//capturar cidades de destino da classe voo (sprint2)

    public function __construct(string $_sigla, string $_cidade, string $_estado, string $_endereço){
      if(strlen($_sigla)>3){
        throw new Exception("Sigla inválida");
      }elseif(strlen($_sigla)<3){
        throw new Exception("Sigla invalido");
      }
      $this->sigla = $_sigla;
      $this->cidade = $_cidade;
      $this->estado = $_estado;
      $this->endereço = $_endereço;
    }

    public function getEndereço(){
      return $this->endereço;
    }
  
    public function getSigla(){
      return $this->sigla;
    }

    public function getCidade(){
      return $this->cidade;
    }

    public function getEstado(){
      return $this->estado;
    }

  
    public function __destruct(){}
  }