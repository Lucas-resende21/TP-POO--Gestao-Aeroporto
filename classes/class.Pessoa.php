 <?php
/*alterado 17/05 para colocar CPF, nacionalidade, data de nascimento e email*/
include_once("persist.php");
use Exception;

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
    $this->setNome($_nome);
    $this->setDocumento($_documento);
    $this->setCPF($_CPF);
    $this->nacionalidade = $_nacionalidade;
    $this->setDataDeNascimento($_dataDeNascimento);
    $this->setEmail($_email);
  }

  // Getters e Setters
  
  public function getNome() {
    return $this->nome;
  }

  public function setNome($_nome){
    //implementar validação do nome
    $this->nome = $_nome;
  }

  public function getDocumento() {
    return $this->documento;
  }

  public function setDocumento($_documento){
    //implementar validação do documento
    $this->documento = $_documento;
  }

  public function getCPF() {
    return $this->CPF;
  }

  public function setCPF($_CPF) {
    if ($this->nacionalidade == 'brasileiro') {
      // Extrai somente os números
      $CPF = preg_replace('/[^0-9]/is', '', $_CPF);
      // Verifica a quantidade de dígitos
      if (strlen($CPF) != 11) {
        throw new Exception("CPF inválido.");
      }
      // Verifica se o CPF é uma sequência monótona
      if (preg_match('/(\d)\1{10}/', $CPF)) {
        throw new Exception("CPF inválido.");
      }
      // Cálculo para validar CPF
      for ($i = 9; $i < 11; $i++) {
        for ($j = 0, $k = 0; $k < $i; $k++) {
          $j += $CPF[$k] * (($i + 1) - $k);
        }
        $j = ((10 * $j) % 11) % 10;

        if ($CPF[$k] != $j) {
          throw new Exception("CPF inválido.");
        }
      }
      $this->CPF = $_CPF;
    } else {
      $this->CPF = $_CPF;
    }
  }

  public function getNacionalidade() {
    return $this->nacionalidade;
  }

  public function setNacionalidade($_nacionalidade) {
    $this->nacionalidade = $_nacionalidade;
  }

  public function getDataDeNascimento() {
    return $this->dataDeNascimento;
  }

  public function setDataDeNascimento($_dataDeNascimento) {
    // Obtém a data atual
    $dataAtual = new DateTime();

    // Converte a data de nascimento para o formato DateTime
    $dataFormatada = DateTime::createFromFormat('d/m/Y', $_dataDeNascimento);

    // Verifica se a data de nascimento foi fornecida em um formato válido
    if (!$dataFormatada) {
      throw new Exception("Data de nascimento inválida");
    }

    // Obtém o dia, mês e ano da data de nascimento
    $dia = $dataFormatada->format('d');
    $mes = $dataFormatada->format('m');
    $ano = $dataFormatada->format('Y');

    // Verifica se a data de nascimento é uma data válida
    if (!checkdate($mes, $dia, $ano)) {
      throw new Exception("Data de nascimento inválida");
    }

    // Cria um objeto DateTime para a data de nascimento
    $dataDeNascimentoObj = DateTime::createFromFormat('d/m/Y', $_dataDeNascimento);

    // Verifica se a data de nascimento é posterior à data atual
    if ($dataDeNascimentoObj > $dataAtual) {
      throw new Exception("Data de nascimento inválida");
    }

    $this->dataDeNascimento = $_dataDeNascimento;
  }

  public function getEmail() {
    return $this->email;
  }

  public function setEmail($_email) {
    if (filter_var($_email, FILTER_VALIDATE_EMAIL)) {
      $this->email = $_email;
    } else {
      throw new Exception("Email inválido.");
    }
  }
}