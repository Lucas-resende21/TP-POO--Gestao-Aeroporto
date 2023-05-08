<?php
  include_once("persist.php");
  include_once("class.Cliente.php");
  include_once("class.Passagem.php");
  include_once("class.Voo.php");

class Passageiro extends persist{
    static $local_filename = "passageiro.txt";
    static public function getFilename() {
      return get_called_class()::$local_filename;
    }

    private $nome;
    private $documento; 
    private $CPF;
    private $nacionalidade;
    private $dataDeNascimento;
    private $email;
    private $status;
    private $embarque;
    private Passagem $passagem;
    private $histDeVoos = array();

    public function construct($_nome, $_documento, $_CPF,       
    $_nacionalidade, $_dataDeNascimento, $_email, $_status)
    {
      $this->nome = $_nome;
      $this->documento = $_documento;
      $this->CPF = $_CPF;
      $this->nacionalidade = $_nacionalidade;
      $this->dataDeNascimento = $_dataDeNascimento;
      $this->email = $_email;
      $this->status = $_status;
    }

    public function validaCPF()
    {
      if(passageiro->$nacionalidade == 'brasileiro')
      {
        // Extrai somente os números
        $CPF = preg_replace('/[^0-9]/is', '', $CPF);
        // Verifica a quantidade de dígitos
        if(strlen($CPF) != 11) 
        {
          throw new Exception("CPF inválido.");
          return false;
        }
        // Verifica se o CPF foi uma sequência monótona
        if(preg_match('/(\d)\1{10}/', $CPF)) 
        {
          throw new Exception("CPF inválido.");
          return false;
        }
        // Cálculo para validar CPF
        for($i = 9; $i < 11; $i++) 
        {
          for($j = 0, $k = 0; $k < $i; $k++) 
          {
            $j += $CPF[$k] * (($i+1)-$k);
          }
          $j = ((10*$j) % 11) % 10;
          
          if($CPF[$k] != $j) 
          {
            return false;
          }
        }
        print_r("CPF validado");
        return true;
      }
      else
        print_r("Passageiro não é brasileiro");
        return true;
    }
  
    public function validaDocumento()
    {
      //Não padronizado.
    }  
    
    public function validaEmail()
    {
      if(filter_var($email, FILTER_VALIDATE_EMAIL)) 
      {
        print_r("email validado.");
        return true;
      } 
      else 
      {
        throw new Exception("email inválido");
      }
    }
  
    public function cancelaPassagem(Passagem $p)
    {
      for($i=0; i<sizeof($this->_passagens); $i++)
      {
        if($this->_passagens[$i] == $p)
        {
          unset($this->_passagens[$i]);
            print_r("Passagem cancelada.");
            echo ("</p>");
          break;
        }       
      }
    }

    public function validaVIP()
    {
      return false;
    }
  
    public function check_in(Voo $v)
    {
      if($v->getHorarioPartida - 30)
      {
        $status = "Check-in";
      }
      else
      {
        $status = "NO SHOW";
      }
    }

    public function confirmaEmbarque($embarque)
    {
      if($embarque)
      {
        $status = "Embarque realizado";
      }
      else
      {
        $status = "NO SHOW";
      }
    }
}
  
  

