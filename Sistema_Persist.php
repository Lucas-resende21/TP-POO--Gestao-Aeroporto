<?php
    require_once('global.php');
    if(0){
      $sistema = new Sistema();
      $sistema->setUser("Lucas", "abacate", "lucasaraujoresende21@gmail.com");
      $sistema->login("Lucas", "abacate");
    }
    // Criando o Sistema
    if(0){
      $sistema = new Sistema();
      $sistema->setUser("Lucas", "abacate", "lucasaraujoresende21@gmail.com");
      $sistema->login("Lucas", "abacate");

      // criando calendário - mês 1
        //$sistema->criaCalendário("1", "30");
      
      // criando aeroportos
        $confins = new Aeroporto("CNF", "Confins", "MG", "289466", "2102024");
        $guarulhos = new Aeroporto("GRU", "Guarulhos", "SP", "35667", "32585");
        $congonhas = new Aeroporto("CGH", "São Paulo", "SP", "12315", "87654");
        $galeao = new Aeroporto("GIG", "Rio de Janeiro", "RJ", "316542", "645219");
        $afonsopena = new Aeroporto("CWB", "São José dos Pinhais", "PR", "367168", "145219")
  
        $sistema->criaAeroporto($confins);
        $sistema->criaAeroporto($guarulhos);
        $sistema->criaAeroporto($congonhas);
        $sistema->criaAeroporto($galeao);
        $sistema->criaAeroporto($afonsopena);
    
      // Instanciando novas companhias e seus complementos
        $companhia1 = new Companhia("Latam", "001", "Latam Airlines do Brasil S.A.", "102345678000199", "LA");
      
      // adicionando aeronaves
        $companhia1->adicionaAeronave("Embraer", "175", "180", "600", "PX-RUZ");
        //$companhia1->adicionaAeronave("Embraer", "E170", "80", "1000", "PP-GUB");
        //$companhia1->adicionaAeronave("Embraer", "E170", "80", "1000", "PP-GUC");
        //$companhia1->adicionaAeronave("Embraer", "E170", "80", "1000", "PP-GUD");
        //$companhia1->adicionaAeronave("Embraer", "E170", "80", "1000", "PP-GUE");

      // criando voos e atrbuindo as aeronaves aos voos
        $voo1 = new Voo("50", "1330", "1420", "LT1234", $confins->getSigla(), $rio->getSigla(), $companhia1->getSigla(), "1");
        $voo2 = new Voo("240", "1600", "1730", "LT2234", $rio->getSigla(), $floripa->getSigla(), $companhia1->getSigla(), "1");
        //$voo3 = new Voo("90", "0830", "1000", "LT3234", "CNF", "CGH");
        $voo4 = new Voo("60", "0830", "1000", "LT3234", $floripa->getSigla(), $confins->getSigla(), $companhia1->getSigla(), "2");
  
        $voo1->setAeronave($companhia1->getAeronave(0));
        $voo2->setAeronave($companhia1->getAeronave(1));
        //$voo3->setAeronave($companhia1->getAeronave(2));
        
        $companhia1->setVoo($voo1);
        $companhia1->setVoo($voo2);
        //$companhia1->setVoo($voo3);
        //$companhia1->setVoo($voo4);

      // adicionando os voos no calendario
        //$sistema->AddVooCalendario($voo1);

      // apagando um voo
        $voo = new Voo("60", "0830", "1000", "LT3234", $floripa->getSigla(), $confins->getSigla(), $companhia1->getSigla(), "2");
        $companhia1->removeVoo($voo);
        //$companhia1->save();

      
      $companhia2 = new Companhia("Azul", "002", "Azul Linhas Aéreas Brasileiras S.A.", "102345671234198", "AD");
      
        // adicionando aeronaves
        $companhia2->adicionaAeronave("Embraer", "E170", "80", "1000", "PT-GUC");
        //$companhia2->adicionaAeronave("Embraer", "E170", "80", "1000", "PT-GUD");
        //$companhia2->adicionaAeronave("Embraer", "E170", "80", "1000", "PT-GUE");
        //$companhia2->adicionaAeronave("Embraer", "E170", "80", "1000", "PT-GUF");
        //$companhia2->adicionaAeronave("Embraer", "E170", "80", "1000", "PT-GUG");
        
      // criando voos e atrbuindo as aeronaves aos voos
        $vooazul1 = new Voo("80", "1400", "1500", "AC1329", $confins->getSigla(), $guarulhos->getSigla(), "1");
        //$voo2 = new Voo("320", "1600", "1730", "AD2234", "SVD", "FPA");
        // $voo3 = new Voo("60", "0830", "1000", "AD3234", "SVD", "CNF");
  
        $voo1->setAeronave($companhia2->getAeronave(0));
        //$voo2->setAeronave($companhia2->getAeronave(1));
        //$voo3->setAeronave($companhia2->getAeronave(2));
        
        
        $companhia2->setVoo($vooazul1);
        //$companhia2->setVoo($voo2);
        //$companhia2->setVoo($voo3);
      
      // adicionando as companhias no sistema
        $sistema->criaCompanhia($companhia1);
        $sistema->criaCompanhia($companhia2);

      // criando clientes e passageiros e passagens
        $cliente1 = new Cliente("Mateus Benicio", "25489765", "04938278111", "Brasileiro", "19/04/2004", "mateus@gmail.com");
        $passageiro1 = new Passageiro("Caio Mourão", "19568789", "31958572163", "Brasileiro", "14/12/2002", "caiocomedor@gmail.com");

        $cliente2 = new Cliente("Luiz Gonzaga", "78946523", "78932145689", "Brasileiro", "02/08/1989", "luizgonzaga@gmail.com");
        $passageiro2 = new Passageiro("Mbappe lottin", "78932145", "75395148621", "Francês", "20/12/1998", "mbappe@gmail.com");
      
        $sistema->criaCliente($cliente1);
        $sistema->criaPassageiro($passageiro1);
        
        $sistema->criaCliente($cliente2);
        $sistema->criaPassageiro($passageiro2);
      
      // Criando um vetor com todos os voos disponiveis
        $voos = array();
        $voos = $companhia1->getVoos();
      
      // atribuindo passagem ao passageiro
        $cliente1->compraPassagem($voo1->getOrigem(), $voo1->getDestino(), "700", "40", "2", $passageiro1, $voos);
        $cliente2->compraPassagem($voo1->getOrigem(), $voo2->getDestino(), "1600", "41", "2", $passageiro2, $voos);
      
      // salvando os dados do sistema
        $sistema->save();
    }


    // Carregando registros já persistidos na classe Sistema
    if ( 0 ){
      $sistemas = Sistema::getRecords();
      print_r($sistemas);
    }

    if(1){ //Testes - Lucas -----------------------------------------------------------------
      //Sprint 1 -
      echo("Opa, tá funcionando");
      $Azul= new Companhia("Azul", "AD", "Azul L.A", "102345671234198", "AD");
      $SuperTucano = new Aeronave("Embraer", "E170", "80", "1000", "PT-GUE");
      try{
      $TestePrefixo = new Aeronave("Embraer", "E170", "80", "1000", "Pc-GUE");
      }catch(Exception $e){
        echo 'Exceção capturada: ', $e->getMessage(), "\n";
      }
      $Azul->AdicionaAeronave("Ferrari", "E171", "81", "1001", "PP-GUE");
      $confins = new Aeroporto("CNF", "Confins", "MG", "289466", "2102024");
      $rio = new Aeroporto("SDU", "Rio de Janeiro", "RJ", "35667", "32585");
      $BHRJ = new Voo("60", "0830", "1000", "LT3234", $confins, $rio, "LT", "Segunda", 200);
      echo ("\n");
      $calendario = array();
      $rotate = 0;
      for($i=0;$i<31;$i++){
        if($rotate>6)
          $rotate = 0;
        $calendario[$i] = new Dia($rotate);
        $rotate++;
      }
      $ferias = new Viagem("60", "0830", "1000", "LT3234", $confins, $rio, "LT", "Segunda", 200, "Pendente");
      //Sprint 2 (Criação de passagem e compra de passagem, Calendario e Escala)
      $calendario[2]->setViagem($BHRJ); 
      for($i=0;$i<sizeof($calendario);$i++){
        if($calendario[$i]->getSem() == $BHRJ->getFrequencia())
          $calendario[$i]->setViagem($BHRJ);
      }
      $cliente1 = new Cliente("Mateus Benicio", "25489765", "04938278111", "Brasileiro", "19/04/2004", "mateus@gmail.com");
      // Testar instanciar um cliente e a compra de passagens de um cliente.
    }

   

      