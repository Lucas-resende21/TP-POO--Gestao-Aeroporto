<?php
  class Aeroporto{
    protected $sigla;
    protected $cidadeUf;
//capturar cidades de destino da classe voo (sprint2)

    public function __construct(string $_sigla, string $_cidadeUf){
      $this->sigla = $_sigla;
      $this->cidadeUf = $_cidadeUf;
    }
    public function __destruc(){}
  }