<?php
include_once("class.Pessoa.php");

class Funcionario extends Pessoa {
    private $CHT;
    private $endereco;
    private $companhiaAerea;
    private $aeroportoBase;

    public function __construct($_nome, $_documento, $_CPF, $_nacionalidade, $_dataDeNascimento, $_email, $_CHT, $_endereco, $_companhiaAerea, $_aeroportoBase) {
        parent::__construct($_nome, $_documento, $_CPF, $_nacionalidade, $_dataDeNascimento, $_email);
        $this->setCHT($_CHT);
        $this->endereco = $this->setCoordenada($_endereco);
        $this->companhiaAerea = $_companhiaAerea;
        $this->aeroportoBase = $_aeroportoBase;
    }

    public function setCoordenada($_endereco){
      $endereco = urlencode($_endereco);
      $chave_api = 'AIzaSyDptEOEPM1XmE6FTdEs3UpiJR-yAaI0krA';
      $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$endereco}&key={$chave_api}";
      $resposta = file_get_contents($url);
      $resposta_json = json_decode($resposta);
      if ($resposta_json->status === 'OK') {
        $latitude = $resposta_json->results[0]->geometry->location->lat;
        $longitude = $resposta_json->results[0]->geometry->location->lng;
        $endereço = $latitude.",".$longitude;
        return($endereço);
      } else {
        echo "Erro: {$resposta_json->status}<br>";
      }
    }

    public function getCHT() {
      return $this->CHT;
    }

    public function setCHT($_CHT){
      //implementar validação da CHT
      $this->CHT = $_CHT;
    }
  
    public function getEndereco() {
      return($this->endereco);
    }

    public function getCompanhiaAerea() {
      return $this->companhiaAerea;
    }

    public function getAeroportoBase() {
      return $this->aeroportoBase;
    }
}

