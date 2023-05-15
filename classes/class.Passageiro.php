<?php
  include_once("class.Pessoa.php");
  include_once("class.Cliente.php");
  include_once("class.Passagem.php");
  include_once("class.Voo.php");

  class Passageiro extends persist
  {
    static $local_filename = "passageiro.txt";
    static public function getFilename() {
      return get_called_class()::$local_filename;
  }

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

    public function validaDataDeNascimento() //em construção
  {
    if ($dataDeNasimento < $hoje) //implementar "hoje"
    {
      echo ("Data Inválida");
      return false;
    }
    else
    {
      return true;
    }
  }
  
  
  //associar passageiro a uma passagem

  //Deve ser possível acessar o histórico de vôos de um passageiro em ordem cronológica.
  
    public function cancelaPassagem(Passagem $p) //implementar custo de cancelamento caso passageiro comum
    {
      for($i=0; i<sizeof($this->_passagens); $i++)
      {
        if($this->_passagens[$i] == $p)
        {
          unset($this->_passagens[$i]);
            print_r("Passagem cancelada.");
            echo ("</p>");
          break;

          return 200;
        }       
      }
    }
  //implementar alteração de passagem, sem custo para vip com custo para VIP

    public function validaVIP()
    {
      return false;
    }
  
    public function check_in(Voo $v) //implementar só poder fazer check-in faltando 48h pro voo até 30 min antes, caso não faça no prazo NO SHOW
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

    public function confirmaEmbarque($embarque) //verificar
    {
      if($embarque)
      {
        $status = "Embarque realizado";
      }
      else
      {
        $status = "NO SHOW";
      }
      $histDeVoos[] = $passagem;
    }

}
  
  
/*

• Todos os status do passageiro em um vôo deve ser passível de registro. São eles:
o Passagem adquirida --> FALTA
o Passagem cancelada --> FALTA
o Check-in realizado --OK
o Embarque realizado --> OK
o NO SHOW --> OK

  */