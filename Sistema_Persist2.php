<?php
    require_once('global.php');
    if(1){
      // Parte 1 Calendário
      $sistema = Sistema::getInstance();
      $sistema->setUser("Lucas", "abacate", "lucasaraujoresende21@gmail.com");
      $sistema->login("Lucas", "abacate");
      $companhia1 = new Companhia("Latam", "001", "Latam Airlines do Brasil S.A.", "11222333444455", "LA");
      $sistema->criaCompanhia($companhia1);
      print_r($sistema->getLogSist());
      echo("\n");
      $sistema->criaCalendario();
      echo($sistema->getCalendario());
      $confins = new Aeroporto("CNF", "Confins", "MG", "-19.634130,-43.965400");
      $confins_UFMG = new Rota($confins);
      $BHRJ = new Voo("60", "08:30:00", "10:00:00", "LT3234", $confins, $confins, "LT", "Segunda", 200);
      /*
      $piloto = new Funcionario("Lucas", "09424656602", "09424656602", "Brasileiro", "06/03/2003", "lucasaraujoresende21@gmail.com", "2578465057", "-19.839752,-43.999143", $companhia1, $confins);
      $viagem = new Viagem($BHRJ->getDuracao(), $BHRJ->getHorarioP(), $BHRJ->getHorarioC(), $BHRJ->getCodigo(), $BHRJ->getOrigem(), $BHRJ->getDestino(), $BHRJ->getSigla(), $BHRJ->getFrequencia(), $BHRJ->getTarifa(), "pendente");
      // Parte q faz contato cm a api do google
      $confins_UFMG->addFuncionario($piloto);
      
      echo($confins_UFMG->getDistancia() . "\n");
      echo($confins_UFMG->calculaDuracao() . "\n");
      echo($confins_UFMG->setHorarioPartida($viagem) . "\n");
      */
    }