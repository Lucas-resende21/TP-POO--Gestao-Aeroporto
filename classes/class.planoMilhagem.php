<?php
  include_once("persist.php");
  include_once("class.passageiro.php");

  class PlanoMilhagem extends persist
  {
    static $local_filename = "planoMilhagem.txt";
    static public function getFilename() {
      return get_called_class()::$local_filename;
  }

  public function atualizaCategoria(Passageiro $p)
  {
    if($p->getPlanoDeMilhagem() == 'Tudo Azul')
    {
      if($p->getPontos() >= 10000)
      {
        $p->getCategoria() == 'Tudo Azul Diamante';
        if($p->getPontos() >= 5000)
        {
          $p->getCategoria() == 'Tudo Azul Safira';
        }
      }
    }
    
    if($p->getPlanoDeMilhagem() == 'Latam')
    {
      if($p->getPontos() >= 10000)
      {
        $p->getCategoria() == 'Latam Diamante';
        if($p->getPontos() >= 5000)
        {
          $p->getCategoria() == 'Latam Safira';
        }
      }
    }
  }