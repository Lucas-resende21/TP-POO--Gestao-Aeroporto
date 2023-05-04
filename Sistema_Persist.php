<?php
    require_once('global.php');

    // Instanciando novas companhias
    if ( 1 ) {
      $companhia1 = new Companhia("Latam", "LT", "Latam L.A", "102345678000199", "LT");
      
      //adicionando aeronaves
      $companhia1->adicionaAeronave("Embraer", "E170", "80", "1000", "PP-GUA");
      $companhia1->adicionaAeronave("Embraer", "E170", "80", "1000", "PP-GUB");

      //criando voos
      $companhia1->setVoo("50", "1330", "1420", "LT1234", "CNF", "RJS");
      $companhia1->setVoo("240", "1600", "1730", "LT2234", "CNF", "FPA");
      $companhia1->setVoo("90", "0830", "1000", "LT3234", "CNF", "CGH");
      $companhia1->setVoo("60", "0830", "1000", "AD3234", "SVD", "CNF");

      //apagando um voo
      $voo = new Voo("60", "0830", "1000", "AD3234", "SVD", "CNF");
      $companhia1->removeVoo($voo);
      $companhia1->save();
    }

    if ( 1 ) {
      $companhia2 = new Companhia("Azul", "AD", "Azul L.A", "102345671234198", "AD");
      
      //adicionando aeronaves
      $companhia2->adicionaAeronave("Embraer", "E170", "80", "1000", "PP-GUC");
      $companhia2->adicionaAeronave("Embraer", "E170", "80", "1000", "PP-GUD");
      $companhia2->adicionaAeronave("Embraer", "E170", "80", "1000", "PP-GUE");
      
      //criando voos
      $companhia2->setVoo("80", "1400", "1500", "AD1234", "SVD", "CGH");
      $companhia2->setVoo("320", "1600", "1730", "AD2234", "SVD", "FPA");
      $companhia2->setVoo("60", "0830", "1000", "AD3234", "SVD", "CNF");
      
      $companhia2->save();
    }

    // Carregando registros já persistidos da classe companhia
    if ( 1 ) {
      $companhias = Companhia::getRecords();
      print_r($companhias);
    }
    /*
    print_r("---------------------------------------------------------");
    echo ("\n");

    // Removendo uma aeronave da companhia
    if( 1 ) {
      $aeronave = new Aeronave("Embraer", "E170", "80", "1000", "PP-GUE");
      $companhia2->removeAeronave($aeronave);
      $companhia2->save();
    }

    echo ("\n");

    // Carregando registros já persistidos da classe companhia
    if ( 1 ) {
      $companhias = Companhia::getRecords();
      print_r($companhias);
    }
    */