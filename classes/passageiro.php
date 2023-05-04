<?php
  include_once("persist.php");
  include_once("class.cliente.php");

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
    private $histDeVoos = array();

    public function construct($_nome, $_documento, $_CPF, $_nacionalidade, 
                              $_dataDeNascimento, $_email, $_status)
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
      //internet
    }
  
    public function validaDocumento()
    {
      //internet
    }  
    
    public function validaEmail()
    {
      //internet
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
  
    public function check-in()
    {
  
    }
  
    public function compraFranquia()
    {
      
    }

    public function confirmaEmbarque()
    {
      
    }
  
}
  
  

