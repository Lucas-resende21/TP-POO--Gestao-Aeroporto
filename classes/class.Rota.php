<?php
  include_once("persist.php");

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

    public function __construct($_aeroporto){
      $this->Aeroporto = $_aeroporto;
      $this->addEndereço($_aeroporto->getEndereço());
      $this->distancia = 0;
    }

    public function addEndereço($_endereço){
      $this->trajeto[] = $_endereço;
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
      $this->Duração = $this->distancia/18;
      return($this->Duração);
    }
    public function setHorarioPartida($_Viagem){
      $this->CalculaDuracao();
      $this->HorarioPartida = $_Viagem->getHorarioP()-$this->Duração-90;  
    }

    public function getDistancia(){
      return($this->distancia);
    }
  }