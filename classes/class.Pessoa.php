  <?php
  /*alterado 17/05 para colocar CPF, nacionalidade, data de nascimento e email*/
include_once("persist.php");

class Pessoa extends persist {
  static $local_filename = "pessoa.txt";

  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  private $nome;
  private $documento;
  protected $CPF;
  protected $nacionalidade;
  protected $dataDeNascimento;
  protected $email;

  public function __construct($_nome, $_documento, $_CPF, $_nacionalidade, $_dataDeNascimento, $_email) {
    $this->nome = $_nome;
    $this->documento = $_documento;
    $this->CPF = $_CPF;
    $this->nacionalidade = $_nacionalidade;
    $this->dataDeNascimento = $_dataDeNascimento;
    $this->email = $_email;
  }
}