<?php
    require_once('global.php');
    if(1){
      $sistema = Sistema::getInstance();
      $sistema->setUser("Lucas", "abacate", "lucasaraujoresende21@gmail.com");
      $sistema->login("Lucas", "abacate");
      $companhia1 = new Companhia("Latam", "001", "Latam Airlines do Brasil S.A.", "11222333444455", "LA");
      $sistema->criaCompanhia($companhia1);
      print_r($sistema->getLogSist());
      echo("\n");
      $sistema->criaCalendario();
      print_r($sistema->getCalendario());
      echo("\n");
    }