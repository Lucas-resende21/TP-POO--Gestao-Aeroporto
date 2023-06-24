<?php
  require_once('global.php');

  if( 1 ){
    //Criando sistema e usuario
      $sistema = Sistema::getInstance();
      $sistema->setUser("admin", "0000", "admin@gmail.com");
      $sistema->login("admin", "0000");

    //Criando companhias
      $companhia1 = new Companhia("Latam", "001", "Latam Airlines do Brasil S.A.", "02012862000160", "LA");
      $companhia2 = new Companhia("Azul", "002", "Azul Linhas Aéreas Brasileiras S.A.", "09296295000160", "AD");
      $sistema->criaCompanhia($companhia1);
      $sistema->criaCompanhia($companhia2);
    
    //Cadastrando aeronaves
      try{
        $companhia1->adicionaAeronave("Embraer", "175", "180", "600", "PX-RUZ");  
      }catch (Exception $e){
        echo "Registro da aeronave inválido. Corrigido para PP-RUZ \n";
        $companhia1->adicionaAeronave("Embraer", "175", "180", "600", "PP-RUZ");  
      }
      $companhia2->adicionaAeronave("Embraer", "175", "180", "600", "PS-RUS");

    //Cadastrando os aeroportos
      $confins = new Aeroporto("CNF", "Confins", "MG", "-19.624444,-43.971944");
      $guarulhos = new Aeroporto("GUA", "Guarulhos", "SP", "-23.428825,-46.472708");
      $congonhas = new Aeroporto("CGH", "São Paulo", "SP", "-23.626067,-46.658859");
      $galeao = new Aeroporto("GIG", "Rio de Janeiro", "RJ", "-22.813955,-43.246889");
      $afonsopena = new Aeroporto("CWB", "Curitiba", "PR", "-25.5314095,-49.1739676");
      
      $sistema->criaAeroporto($confins);
      $sistema->criaAeroporto($guarulhos);
      $sistema->criaAeroporto($congonhas);
      $sistema->criaAeroporto($galeao);
      $sistema->criaAeroporto($afonsopena);

    //Criação dos voos
      //confins-guarulhos
      try{
        $voo1 = new Voo("01:50", "07:00", "08:50", "AC1329", $confins->getCidade(), $guarulhos->getCidade(), $companhia2->getSigla(), "diaria");
        $companhia2->setVoo($voo1);
        $voo1->setAeronave($companhia2->getAeronave(0));
      }catch (Exception $e){
        echo "Código de companhia invalido, corrigido para o código da Azul Linhas Aéreas Brasileiras S.A. \n";
        $voo1 = new Voo("01:50", "07:00", "08:50", "AD1329", $confins->getCidade(), $guarulhos->getCidade(), $companhia2->getSigla(), "diaria");
        $voo1->setAeronave($companhia2->getAeronave(0));
        $companhia2->setVoo($voo1);
      }
      $voo2 = new Voo("01:50", "06:00", "07:50", "LA8745", $confins->getCidade(), $guarulhos->getCidade(), $companhia1->getSigla(), "diaria");
      $voo2->setAeronave($companhia1->getAeronave(0));
      
      $companhia1->setVoo($voo2);
      //$sistema->AddVooCalendario($voo2);
      //$sistema->AddVooCalendario($voo1);
      
      //confins-congonhas
      $voo3 = new Voo("01:25", "10:00", "11:25", "AD0515", $confins->getCidade(), $congonhas->getCidade(), $companhia2->getSigla(), "diaria");
      $voo4 = new Voo("01:25", "09:00", "10:25", "LA4124", $confins->getCidade(), $congonhas->getCidade(), $companhia1->getSigla(), "diaria");
      
      $voo4->setAeronave($companhia1->getAeronave(0));
      $voo3->setAeronave($companhia2->getAeronave(0));
      $companhia1->setVoo($voo4);
      $companhia2->setVoo($voo3);
      //$sistema->AddVooCalendario($voo4);
      //$sistema->AddVooCalendario($voo3);

      //guarulhos-galeão
      $voo5 = new Voo("00:55", "13:00", "13:55", "AD9615", $guarulhos->getCidade(), $galeao->getCidade(), $companhia2->getSigla(), "diaria");
      $voo6 = new Voo("00:55", "12:00", "12:55", "LA4756", $guarulhos->getCidade(), $galeao->getCidade(), $companhia1->getSigla(), "diaria");
      
      $voo6->setAeronave($companhia1->getAeronave(0));
      $voo5->setAeronave($companhia2->getAeronave(0));
      $companhia1->setVoo($voo6);
      $companhia2->setVoo($voo5);
      //$sistema->AddVooCalendario($voo6);
      //$sistema->AddVooCalendario($voo5);

      //congonhas-afonso pena
      $voo7 = new Voo("01:00", "15:00", "16:00", "AD4875", $congonhas->getCidade(), $afonsopena->getCidade(), $companhia2->getSigla(), "diaria");
      $voo8 = new Voo("01:00", "14:00", "15:00", "LA5741", $congonhas->getCidade(), $afonsopena->getCidade(), $companhia1->getSigla(), "diaria");
      
      $voo8->setAeronave($companhia1->getAeronave(0));
      $voo7->setAeronave($companhia2->getAeronave(0));
      $companhia1->setVoo($voo8);
      $companhia2->setVoo($voo7);
      //$sistema->AddVooCalendario($voo8);
      //$sistema->AddVooCalendario($voo7);
    
    //criando calendário e registrando viagens
      $sistema->criaCalendario();
      //$sistema->AddVoosCompanhia($companhia1);
      //$sistema->AddVoosCompanhia($companhia2);
      

    //cliente realizando a compra de passagem
      $cliente1 = new Cliente("Neymar Jr", "14546132", "76529069471", "Brasileiro", "05/02/1992", "neymarjr@gmail.com");
      $sistema->criaCliente($cliente1);
      $passageiro1 = new PassageiroVIP("Luiz Gonzaga", "72486349", "15789345789", "Brasileiro", "13/12/1912", "luizgonzaga@gmail.com", "45687", );
      $sistema->criaPassageiro($passageiro1);

      //consulta viagem deve ser usado com os parametros que o cliente quer para comprar a viagem, por conta do erro do calendário é impossivel agora
      //dentro de compraPassagem deve ser chamado o consultaViagem
        $voosLatam = $companhia1->getVoos();
        $voosAzul = $companhia2->getVoos();
        //$distancia = new Rota($confins);
        //$distancia->addEndereço($congonhas->getEndereço());
        //$distancia->addEndereço($afonsopena->getEndereço());
        //distancia->getDistancia não funciona
        $cliente1->compraPassagem($confins->getCidade(), $afonsopena->getCidade(), "1100", "75", "2", $passageiro1, $voosAzul);
        
      $sistema->save();
  }

  if( 1 ){
    $sistemas = Sistema::getRecords();
    //printando os voos das companhias
      /*
      $companhia1 = $sistemas[0]->getCompanhia(0);
      echo "Companhia ", $companhia1->getNome() ,"voos:\n";
      print_r($companhia1->getVoos());
      
      $companhia2 = $sistemas[0]->getCompanhia(1);
      echo "\nCompanhia ", $companhia2->getNome() ,"voos:\n";
      print_r($companhia2->getVoos());
      */

    //printando as passagens dos passageiros
      $passageiros = $sistemas[0]->getPassageiros();
      print_r($passageiros);
  }