<?php
class Aeroporto{
    protected $sigla;
    protected $cidade;
    protected $estado;
//capturar cidades de destino da classe voo (sprint2)

    public function __construct(string $_sigla, string $_cidade, string $_estado){
      if(strlen($_sigla)>3){
        print_r("Sigla inválida, inserir menor");
        echo ("</p>");
        return("Objeto não foi construido");}
      elseif(strlen($_sigla)<3){
        print_r("Sigla inválida, inserir maior");
        echo ("</p>");
        return("Objeto não foi construido");}
      $this->sigla = $_sigla;
      $this->cidade = $_cidade;
      $this->estado = $_estado;
    }
    public function __destruct(){}
  }