<?php
    require_once('global.php');

    // Criando o Sistema
    if( 1 ){
      $sistema = new Sistema();

      // criando calendário - mês 1
        //$sistema->criaCalendário("1", "30");
      
      // criando aeropostos
        $confins = new Aeroporto("CNF", "Confins", "MG", "289466", "2102024");
        $rio = new Aeroporto("SDU", "Rio de Janeiro", "RJ", "35667", "32585");
        $floripa = new Aeroporto("FLN", "Florianópolis", "SC", "12315", "87654");
  
        $sistema->criaAeroporto($confins);
        $sistema->criaAeroporto($rio);
        $sistema->criaAeroporto($floripa);
    
      // Instanciando novas companhias e seus complementos
        $companhia1 = new Companhia("Latam", "LT", "Latam L.A", "102345678000199", "LT");
      
      // adicionando aeronaves
        //$companhia1->adicionaAeronave("Embraer", "E170", "80", "1000", "PP-GUA");
        //$companhia1->adicionaAeronave("Embraer", "E170", "80", "1000", "PP-GUB");
        //$companhia1->adicionaAeronave("Embraer", "E170", "80", "1000", "PP-GUC");
        //$companhia1->adicionaAeronave("Embraer", "E170", "80", "1000", "PP-GUD");
        $companhia1->adicionaAeronave("Embraer", "E170", "80", "1000", "PP-GUE");

      // criando voos e atrbuindo as aeronaves aos voos
        $voo1 = new Voo("50", "1330", "1420", "LT1234", $confins->getSigla(), $rio->getSigla(), $companhia1->getSigla(), "1");
        //$voo2 = new Voo("240", "1600", "1730", "LT2234", "CNF", "FPA");
        //$voo3 = new Voo("90", "0830", "1000", "LT3234", "CNF", "CGH");
        $voo4 = new Voo("60", "0830", "1000", "LT3234", $floripa->getSigla(), $confins->getSigla(), $companhia1->getSigla(), "2");
  
        $voo1->setAeronave($companhia1->getAeronave(0));
        //$voo2->setAeronave($companhia1->getAeronave(1));
        //$voo3->setAeronave($companhia1->getAeronave(2));
        
        $companhia1->setVoo($voo1);
        //$companhia1->setVoo($voo2);
        //$companhia1->setVoo($voo3);
        //$companhia1->setVoo($voo4);

      // adicionando os voos no calendario
        //$sistema->AddVooCalendario($voo1);

      // apagando um voo
        $voo = new Voo("60", "0830", "1000", "LT3234", $floripa->getSigla(), $confins->getSigla(), $companhia1->getSigla(), "2");
        $companhia1->removeVoo($voo);
        //$companhia1->save();

      
      $companhia2 = new Companhia("Azul", "AD", "Azul L.A", "102345671234198", "AD");
      /*
        // adicionando aeronaves
        $companhia2->adicionaAeronave("Embraer", "E170", "80", "1000", "PT-GUC");
        $companhia2->adicionaAeronave("Embraer", "E170", "80", "1000", "PT-GUD");
        $companhia2->adicionaAeronave("Embraer", "E170", "80", "1000", "PT-GUE");
        $companhia2->adicionaAeronave("Embraer", "E170", "80", "1000", "PT-GUF");
        $companhia2->adicionaAeronave("Embraer", "E170", "80", "1000", "PT-GUG");
        
      // criando voos e atrbuindo as aeronaves aos voos
        $voo1 = new Voo("80", "1400", "1500", "AD1234", "SVD", "CGH");
        $voo2 = new Voo("320", "1600", "1730", "AD2234", "SVD", "FPA");
        $voo3 = new Voo("60", "0830", "1000", "AD3234", "SVD", "CNF");
  
        $voo1->setAeronave($companhia2->getAeronave(0));
        $voo2->setAeronave($companhia2->getAeronave(1));
        $voo3->setAeronave($companhia2->getAeronave(2));
        
        
        $companhia2->setVoo($voo1);
        $companhia2->setVoo($voo2);
        $companhia2->setVoo($voo3);
      */
      
      // adicionando as companhias no sistema
        $sistema->criaCompanhia($companhia1);
        //$sistema->criaCompanhia($companhia2);

      // criando clientes e passageiros e passagens
        $cliente1 = new Cliente("Mateus Benicio", "25489765", "04938278111", "Brasileiro", "19/04/2004", "mateus@gmail.com");
        $passageiro1 = new Passageiro("Caio Mourão", "19568789", "31958572163", 
                                      "Brasileiro", "14/12/2002", "caiocomedor@gmail.com");
      
        $sistema->criaCliente($cliente1);
        $sistema->criaPassageiro($passageiro1);
      
      // atribuinda passagem ao passageiro
        $cliente1->compraPassagem($voo1->getOrigem(), $voo1->getDestino(), $voo1->getDistancia(), "40", "2", $passageiro1);
      
      // salvando os dados do sistema
      $sistema->save();
    }


    // Carregando registros já persistidos na classe Sistema
    if ( 1 ){
      $sistemas = Sistema::getRecords();
      print_r($sistemas);
    }

    if(1){ //Testes - Lucas -----------------------------------------------------------------
      //Sprint 1 -
      echo("Opa, tá funcionando");
      $Azul= new Companhia("Azul", "AD", "Azul L.A", "102345671234198", "AD");
      $SuperTucano = new Aeronave("Embraer", "E170", "80", "1000", "PT-GUE");
      //$TestePrefixo = new Aeronave("Embraer", "E170", "80", "1000", "Pc-GUE"); 
      $Azul->AdicionaAeronave("Ferrari", "E171", "81", "1001", "PP-GUE");
      $confins = new Aeroporto("CNF", "Confins", "MG", "289466", "2102024");
      $rio = new Aeroporto("SDU", "Rio de Janeiro", "RJ", "35667", "32585");
      //Voos
      $BHRJ = new Voo("60", "0830", "1000", "LT3234", $confins, $rio, "LT", "Segunda", 200);
      //print_r($BHRJ);
      echo ("\n");
      $calendario = array();
      $rotate = 0;
      for($i=0;$i<31;$i++){
        if($rotate>6)
          $rotate = 0;
        $calendario[$i] = new Dia($rotate);
        $rotate++;
      }
      /*echo(sizeof($calendario));
      echo ("\n");*/
      /*echo($calendario[3]->getSem());
      echo ("\n");*/
      for($i=0;$i<sizeof($calendario);$i++){
        if($calendario[$i]->getSem() == $BHRJ->getFrequencia())
          $calendario[$i]->set
          echo("Entrou no if");
          echo ("\n");
      }
      //print_r($calendario);    
    }
  
      