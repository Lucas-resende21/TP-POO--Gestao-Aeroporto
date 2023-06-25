<?php
  include_once("persist.php");
  include_once("class.Cliente.php");

  class PassageiroVIP extends Passageiro
  {
    static $local_filename = "passageiroVIP.txt";
    private $numRegistro;
    private $programaDeMilhagem;
    private $pontos;
    private $Passagem;

    public function __construct($_nome, $_documento, $_CPF, $_nacionalidade, $_dataDeNascimento, $_email, $_numRegistro, PlanoMilhagem $_programaDeMilhagem){
      parent::__construct($_nome, $_documento, $_CPF, $_nacionalidade, $_dataDeNascimento, $_email);
      $this->numRegistro = $_numRegistro;
      $this->programaDeMilhagem = $_programaDeMilhagem;
      $this->pontos = 0;
    }

    public function cancelaPassagem(Passagem $p, Companhia $c)
    {
      if($this->Passagem == $p)
      {
        print_r("Passagem cancelada.");
        if($this->programaDeMilhagem == $c->getPlanoDeMilhagem())
        {
          print_r("Valor do cancelamento: R$0,00");
          $p->setPrecoCancelamento(0);
          $this->Passagem == NULL;
        }
        else
        {
          $p->setPrecoCancelamento(120); 
          print_r("Valor do cancelamento: R$120,00");
          $this->Passagem == NULL;
        }
        echo ("</p>");
      }
    }

    public function alteraPassagem(Passagem $p, Companhia $c)
    {
      $Passagem = $p;

      if($this->programaDeMilhagem == $c->getPlanoDeMilhagem())
      {
        print_r("Passagem alterada.");
        print_r("Valor do alteração: R$0,00");
        $Passagem->setPrecoAlteracao(0);
      }
      else
      {
        print_r("Passagem alterada.");
        print_r("Valor do alteração: R$25,00");
        $Passagem->setPrecoAlteracao(25);
      }
      echo ("</p>");
    }

    public function getNumRegistro()
    {
      return $this->numRegistro;
    }

    public function getProgramaDeMilhagem()
    {
      return $this->programaDeMilhagem;
    }

    public function getPontos()
    {
      return $this->pontos;
    }

    static public function getFilename() {
      return get_called_class()::$local_filename;
    }
}