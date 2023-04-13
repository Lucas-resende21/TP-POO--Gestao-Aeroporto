<?php
    require_once('global.php');

    // Instanciando um novo objeto da classe companhia
    if ( 1 ) {
        $companhia1 = new Companhia("Azul", "BL01", "Blue", "888777666000108", "BL");
        $companhia1->save();
    }
    if ( 0 ) {
        $companhia2 = new Companhia("Latam", "LT02", "Latim", "999888777000109", "");
        $companhia2->save();
    }

    // Carregando registros já persistidos da classe companhia
    if ( 1 ) {
        $companhias = companhia::getRecords();
        print_r($companhias);
    }

    
    // Adicionando uma aeronave
    if ( 0 ) {
        
        $companhia1->setAeronave("Embraer", "Super-tucano", "2", "500", "PP-GUO");
        $companhia->save();
        //print_r( $pOff );
    }

    // Carregando Aeronaves
    if ( 0 ) {
        $pontos = pontoOffline::getRecords();
        print_r($pontos);
    }

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


