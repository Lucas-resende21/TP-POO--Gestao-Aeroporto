<?php
  class Aeroporto{
    protected sigla;
    protected cidadeUf;
    public function __construct(string $_sigla, string $_cidadeUf){
      $this->sigla = $_sigla;
      $this->cidadeUf = $_cidadeUf;
    }
    public function __destruc(){}
  }