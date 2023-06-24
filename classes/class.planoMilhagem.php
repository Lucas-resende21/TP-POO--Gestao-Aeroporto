<?php
  include_once("persist.php");
  include_once("class.passageiro.php");

  class PlanoMilhagem extends persist
  {
    static $local_filename = "planoMilhagem.txt";
    static public function getFilename() {
      return get_called_class()::$local_filename;
    }

    public function atualizaCategoria(PassageiroVIP $p)
    {
      if($p->getProgramaDeMilhagem() == 'Tudo Azul')
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

      if($p->getProgramaDeMilhagem() == 'Latam')
      {
        if($p->getPontos() >= 10000)
        {
          $p->setCategoria("Latam Diamante");
          if($p->getPontos() >= 5000)
          {
            $p->setCategoria("Latam Safira");
          }
        }
      }
    }
  }