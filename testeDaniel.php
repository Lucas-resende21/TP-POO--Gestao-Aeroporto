<?php
    require_once('global.php');

    // Criando o Sistema
    if( 0 ){
      $sistema = new Sistema();

      // criando calendário - mês 1
        //$sistema->criaCalendário("1", "30");
      
      // criando aeroportos ("sigla", "cidade", "estado", "coordx", "coordy") coordenada em decimal /*-*-*-*-*-*-*/
        $confins = new Aeroporto("CNF", "Confins", "MG", "-19.624444", "-43.971944");
        $guaruhos = new Aeroporto("GRU", "Guarulhos", "SP", "-23.431944", "-46.469444");
        $congonhas = new Aeroporto("CGH", "São Paulo", "SP", "-23.626111", "-46.656389");
        $galeão = new Aeroporto("GIG", "Rio de Janeiro", "RJ", "-22.81", "-43.250556");
        $afonsoPena = new Aeroporto("CWB", "São José dos Pinhais", "PR", "-25.531667", "-49.176111");
  
        $sistema->criaAeroporto($confins);
        $sistema->criaAeroporto($guaruhos);
        $sistema->criaAeroporto($congonhas);
        $sistema->criaAeroporto($galeão);
        $sistema->criaAeroporto($afonsoPena);
    
      // Instanciando novas companhias e seus complementos ("nome", "codigo", "razao social", "CNPJ", "sigla") /*-*-*-*-*-*-*/
        $companhia1 = new Companhia("Latam", "001", "Latam Airlines do Brasil S.A.", "11222333444455", "LA");
        $companhia2 = new Companhia("Azul", "002", "Azul Linhas Aéreas Brasileiras S.A.", "22111333444455", "AD");
      
      // adicionando aeronaves ("fabricante", "modelo", "capacidade Passageiros", "capacidade Carga", "registro/sigla") /*-*-*-*-*-*-*/
        //$companhia1->adicionaAeronave("Embraer", "E170", "80", "1000", "PP-GUA");
        //$companhia1->adicionaAeronave("Embraer", "E170", "80", "1000", "PP-GUB");
        //$companhia1->adicionaAeronave("Embraer", "E170", "80", "1000", "PP-GUC");
        //$companhia1->adicionaAeronave("Embraer", "E170", "80", "1000", "PP-GUD");
        $companhia1->adicionaAeronave("Embraer", "E170", "80", "1000", "PP-GUE");
        $companhia1->adicionaAeronave("Embraer", "E175", "180", "600", "PX-RUZ"); //o código deve corrigir a sigla para PP-RUZ, é cadastrado PX de propósito, solicitado no PDF de roteiro de teste
        $companhia2->adicionaAeronave("Embraer", "E175", "180", "600", "PP-AUK");

      // criando voos e atrbuindo as aeronaves aos voos ("duracao", "horarioPartida", "horarioChegada", "codigoDeVoo", "Origem", "Destino", "sigla", "freqSem")
        $voo1 = new Voo("50", "1330", "1420", "LT1234", $confins->getSigla(), $rio->getSigla(), $companhia1->getSigla(), "1");
        //$voo2 = new Voo("240", "1600", "1730", "LT2234", "CNF", "FPA");
        //$voo3 = new Voo("90", "0830", "1000", "LT3234", "CNF", "CGH");
        $voo4 = new Voo("60", "0830", "1000", "LT3234", $floripa->getSigla(), $confins->getSigla(), $companhia1->getSigla(), "2");

        $voo5 = new Voo("75", "0600", "0715", "AC1329", $confins->getSigla(), $guarulhos->getSigla(), $companhia2->getSIgla(), ""); /*Cadastre o voo AC1329 da Azul ligando os aeroportos de           Confins e Guarulhos. Seu
          código deve validar o código do voo, tratar a exceção e em seguida alterar o código
            
          para utilizar a sigla correta da companhia aérea.*/
      
      /*Cadastre dois voos diários de ida e volta, sendo um pela manhã e outro pela tarde,
      entre os aeroportos abaixo:
      • Confins – Guarulhos
      • Confins – Congonhas
      • Guarulhos – Galeão
      • Congonhas – Afonso Pena*/

      /*Com base nos voos cadastrados o sistema deve gerar todas as viagens disponíveis para
      compra pelos próximos 30 dias.
      Um cliente deve tentar comprar uma passagem para daqui a 60 dias. O sistema deve
      tratar essa exceção.*/
        
  
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
  
      