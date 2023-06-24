<?php
  include_once("persist.php");
  include_once("class.Cliente.php");

  class PassageiroVIP extends Passageiro
  {
    static $local_filename = "passageiroVIP.txt";
    static public function getFilename() {
      return get_called_class()::$local_filename;
    }

    private $numRegistro;
    private $programaDeMilhagem;
    private $categoria;
    private $pontos;

    public function __construct($_nome, $_documento, $_CPF, $_nacionalidade, $_dataDeNascimento, $_email, $_numRegistro, $_programaDeMilhagem){
      parent::__construct($_nome, $_documento, $_CPF, $_nacionalidade, $_dataDeNascimento, $_email);
      $this->numRegistro = $_numRegistro;
      $this->programaDeMilhagem = $_programaDeMilhagem;
    }

    public function cancelaPassagem(Passagem $p)
    {
      
    }

    public function alteraPassagem(Passagem $p, $_bagagens, $_assento, $_origem, $_destino, $_distancia)
    {
      for($i=0; i<sizeof($this->_passagens); $i++)
      {
        if($this->_passagens[$i] == $p)
        {
          _passagens[$i].setAtributos(_bagagens, _assento, _origem, _destino, distancia);
          //istaDeObjetos.get(indice).setAtributoQualquer("Valor Novo");
        }
      }
    }

    public function confirmaEmbarque($embarque)
    {
        if ($embarque) {
            $this->status = "Embarque realizado";
            $this->pontos += 7500;
        } else {
            $this->status = "NO SHOW";
        }
        $this->histDeVoos[] = $this->passagem;
    }

    public function getNumRegistro()
    {
      return $this->numRegistro;
    }
    
    public function getProgramaDeMilhagem()
    {
      return $this->programaDeMilhagem;
    }
    
    public function getCategoria()
    {
      return $this->categoria;
    }
    
    public function getPontos()
    {
      return $this->pontos;
    }

    public function validaVIP()
    {
      return true;
    }
}