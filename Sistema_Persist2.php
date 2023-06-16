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
      $confins = new Aeroporto("CNF", "Confins", "MG", "-19.839752,-43.999143");
      $confins_UFMG = new Rota($confins);
      $confins_UFMG->addEndereço("-19.862691,-43.958353");
      $confins_UFMG->addEndereço("-19.956720,-44.008786");
      echo($confins_UFMG->getDistancia());
      echo("\n");
      echo($confins_UFMG->calculaDuracao());
      echo("\n");
    }