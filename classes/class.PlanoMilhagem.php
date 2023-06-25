<?php
  include_once("persist.php");
  include_once("class.Passageiro.php");

  class PlanoMilhagem extends persist
  {
    private $plano;
    private $categoria;
    static $local_filename = "planoMilhagem.txt";
    static public function getFilename() {
      return get_called_class()::$local_filename;
    }

    public function __construct($_plano){
      $this->plano = $_plano;
      $this->categoria = $_plano;
    }

    public function atualizaCategoria(PassageiroVIP $p)
    {
      if($p->getProgramaDeMilhagem()->getPlano() == $this->plano){
        if($p->getPontos() >= 10000){
          $this->categoria = "Tudo Azul Diamante";
          if($p->getPontos() >= 5000)
          {
            $this->categoria = "Tudo Azul Safira";
          }
        }
      }

      if($p->getProgramaDeMilhagem()->getPlano() == $this->plano){
        if($p->getPontos() >= 10000){
          $this->categoria = "Latam Diamante";
          if($p->getPontos() >= 5000)
          {
            $this->categoria = "Latam Safira";
          }
        }
      }
    }

    public function getPlano(){
      return $this->plano;
    }
  }