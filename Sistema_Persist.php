<?php
    require_once('global.php');

    // Instanciando novos objetos
    if ( 1 ) {
      $companhia1 = new Companhia("Latam", "LT", "Latam L.A", "102345678000199", "LTA");
      $companhia1->save();
    }

    if ( 1 ) {
      $companhia2 = new Companhia("Azul", "AZ", "Azul L.A", "102345671234198", "AZU");
      $companhia2->save();
    }

    // Carregando registros já persistidos da classe companhia
    if ( 1 ) {
      $companhias = Companhia::getRecords();
      //print_r($companhias);
    }
    
    // Criando aeronaves
    if ( 1 ) {
        
        $Aeronave1 = new Aeronave("Embraer", "Super-tucano", "2", "500", "PP-GUO");
        $Aeronave1->save();
        //print_r( $ );
    }

    // Carregando Aeronaves
    if ( 1 ) {
        $aeronaves = Aeronave::getRecords();
        print_r($aeronaves);
    }

    /*
    // Criando um ponto online
    if ( 0 ) {
        $dataAgora = new DateTime("now");   
        $pOn = new pontoOnline( $dataAgora );
        $pOn->save();
        //print_r($pOn);
    }

    // Carregando registros já persistidos da classe ponto online
    if ( 0 ) {
        $pontos = pontoOnline::getRecords();
        print_r($pontos);
    }

    // Procurando pelo funcionário Bill Gates e adicionando pontos
    if ( 0 ) {
        $funcionarios = funcionario::getRecordsByField( 'nome', 'Bill Gates' );
        //print_r($funcionarios);
        $funcBill = $funcionarios[0];
        $funcBill->addPonto($pOff);        
        $funcBill->addPonto($pOn);
        $funcBill->save();
    }
  */