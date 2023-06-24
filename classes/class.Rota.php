<?php
  include_once("persist.php");
  include_once("class.Funcionario.php");

  class Rota extends persist{
    
    static $local_filename = "Rota.txt";
    static public function getFilename() {
    return get_called_class()::$local_filename;
    }
    private $Duração;
    private $trajeto = array();
    private $distancia;
    private $HorarioPartida;
    private $Aeroporto;
    private $funcionarios = array();

    public function __construct($_aeroporto){
      $this->Aeroporto = $_aeroporto;
      $this->trajeto[] = $_aeroporto->getEndereço();
    }

    public function addFuncionario($_funcionario){
      $this->funcionarios[] = $_funcionario;
      $this->trajeto[] = $_funcionario->getEndereco();
      $this->CalculaDistancia();
    }

    
    public function CalculaDistancia(){
      for($i=0; $i<count($this->trajeto)-1; $i++){
      $url = 'https://maps.googleapis.com/maps/api/directions/json';
      $params = array(
        'origin' => $this->trajeto[$i], // Minha casa
        'destination' => $this->trajeto[$i+1], // Ufmg
        'key' => 'AIzaSyDptEOEPM1XmE6FTdEs3UpiJR-yAaI0krA'
      );
      $url .= '?' . http_build_query($params);
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($curl);
      $valor_float;
      $data = json_decode($response, true);
      if ($data['status'] == 'OK') {
      $distance = $data['routes'][0]['legs'][0]['distance']['text'];
      $valor_float = floatval ($distance);
      } else {
      echo 'Erro na solicitação: ' . $data['status'];
      }
      curl_close($curl);
      $this->distancia = $this->distancia + $valor_float;
      }
    }
    public function CalculaDuracao(){
      $_segundos = ($this->distancia/18)*3600;
      $this->Duração = $this->converterSegundosParaHora($_segundos);
      return($this->Duração);
    }

    public function converterSegundosParaHora($_segundos) {
    $horas = floor($_segundos / 3600);
    $minutos = floor(($_segundos % 3600) / 60);
    $segundos = $_segundos % 60;

    return sprintf("%02d:%02d:%02d", $horas, $minutos, $segundos);
    }

    public function subtrairHoras($_hora1, $_hora2) {
    $data1 = DateTime::createFromFormat('H:i:s', $_hora1);
    $data2 = DateTime::createFromFormat('H:i:s', $_hora2);
    
    $intervalo = $data1->diff($data2);
    
    $resultado = $intervalo->format('%H:%i:%s');
    
    return $resultado;
    }
    
    public function setHorarioPartida($_Viagem){
      $this->HorarioPartida = $this->subtrairHoras($_Viagem->getHorarioP(), $this->CalculaDuracao());
      return $this->HorarioPartida;
    }

    public function getDistancia(){
      return($this->distancia);
    }
  }