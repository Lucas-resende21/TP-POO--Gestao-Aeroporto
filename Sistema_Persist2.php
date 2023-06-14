<?php
    require_once('global.php');
    if(1){
      $sistema = new Sistema();
      $sistema->setUser("Lucas", "abacate", "lucasaraujoresende21@gmail.com");
      $sistema->login("Lucas", "abacate");
      echo($sistema->getSessao());
      echo("\n");
      echo($sistema->getUser());
      echo("\n");
      $companhia1 = new Companhia("Latam", "001", "Latam Airlines do Brasil S.A.", "11222333444455", "LA");
      $sistema->criaCompanhia($companhia1);
      print_r($sistema->getLogSist());
    }