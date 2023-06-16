<?php
  require_once('global.php');
    if( 1 ){
      $sistema = Sistema::getInstance();
      $sistema->setUser("Lucas", "abacate", "lucasaraujoresende21@gmail.com");
      $sistema->login("Lucas", "abacate");

      $companhia1 = new Companhia("Latam", "001", "Latam Airlines do Brasil S.A.", "11222333444455", "LA");
      $companhia2 = new Companhia("Azul", "002", "Azul Linhas Aéreas Brasileiras S.A.", "22111333444455", "AD");
      echo("Companhias criados ok");
      echo("\n");

      //$companhia1->adicionaAeronave("Embraer", "E175", "180", "600", "PX-RUZ");
      $companhia1->adicionaAeronave("Embraer", "E175", "180", "600", "PP-RUZ");
      $companhia2->adicionaAeronave("Embraer", "E175", "180", "600", "PP-AUK");  
      
      $confins = new Aeroporto("CNF", "Confins", "MG", "-19.624444", "-43.971944");
      $guarulhos = new Aeroporto("GRU", "Guarulhos", "SP", "-23.431944", "-46.469444");
      $congonhas = new Aeroporto("CGH", "São Paulo", "SP", "-23.626111", "-46.656389");
      $galeão = new Aeroporto("GIG", "Rio de Janeiro", "RJ", "-22.81", "-43.250556");
      $afonsoPena = new Aeroporto("CWB", "São José dos Pinhais", "PR", "-25.531667", "-49.176111");
      echo("Aeroportos criados ok");
      echo("\n");
      try{
        $vooExc = new Voo("75", "0600", "0715", "AC1329", $confins->getSigla(), $guarulhos->getSigla(), $companhia2->getSigla(), "diario");
      }catch (Exception $e){
        echo 'Exceção capturada', $e->getMessage(), "\n";
      }
      $vooExc = new Voo("75", "0600", "0715", "AD1329", $confins->getSigla(), $guarulhos->getSigla(), $companhia2->getSigla(), "diario");
      $voo1_2 = new Voo("75", "1800", "1915", "AD1330", $guarulhos->getSigla(), $confins->getSigla(), $companhia2->getSigla(), "diario");

      $voo2_1 = new Voo("75", "0600", "0715", "AD1331", $confins->getSigla(), $congonhas->getSigla(), $companhia2->getSigla(), "diario");
      $voo2_2 = new Voo("75", "1800", "1915", "AD1332", $congonhas->getSigla(), $confins->getSigla(), $companhia2->getSigla(), "diario");

      $voo3_1 = new Voo("75", "0600", "0715", "LA1333", $guarulhos->getSigla(), $galeão->getSigla(), $companhia1->getSigla(), "diario");
      $voo3_2 = new Voo("75", "1800", "1915", "LA1334", $galeão->getSigla(), $guarulhos->getSigla(), $companhia1->getSigla(), "diario");

      $voo4_1 = new Voo("75", "0600", "0715", "LA1335", $confins->getSigla(), $guarulhos->getSigla(), $companhia1->getSigla(), "diario");
      $voo4_2 = new Voo("75", "1800", "1915", "LA1336", $guarulhos->getSigla(), $confins->getSigla(), $companhia1->getSigla(), "diario");

      echo("Voos criados ok");
      echo("\n");

      $sistema->criaCalendario();

      echo("Calendario criado");
      echo("\n");

      //$sistema->AddVoosCompanhia($companhia1);
      //$sistema->AddVoosCompanhia($companhia2);
      // A função AddVoosCompanhia não está funcionando
      $sistema->AddVooCalendario($vooExc);
      $sistema->AddVooCalendario($voo1_2);
      $sistema->AddVooCalendario($voo2_1);
      $sistema->AddVooCalendario($voo2_2);
      $sistema->AddVooCalendario($voo3_1);
      $sistema->AddVooCalendario($voo3_2);
      $sistema->AddVooCalendario($voo4_1);
      $sistema->AddVooCalendario($voo4_2);
      
      
      for($i = 1; $i<31; $i++){
        print_r($sistema->getViagens($i));
      }
      echo("\n");

      $cliente1 = new Cliente("Mateus Benicio", "25489765", "04938278111", "Brasileiro", "19/04/2004", "mateus@gmail.com");
      $passageiro1 = new PassageiroVIP("Caio Mourão", "19568789", "31958572163", "Brasileiro", "14/12/2002", "caiocomedor@gmail.com");
      $sistema->criaCliente($cliente1);
      $sistema->criaPassageiro($passageiro1);

      $cliente1->compraPassagem($voo1_2->getOrigem(), $voo1_2->getDestino(), $voo1_2->getDistancia(), "40", "2", $passageiro1, $voo1_2);
      // Ta dando erro
      
    }


    // Carregando registros já persistidos na classe Sistema
    if ( 0 ){
      $sistemas = Sistema::getRecords();
      print_r($sistemas);
    }
