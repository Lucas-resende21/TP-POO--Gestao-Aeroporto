<?php
  require_once('global.php');

  if( 1 ){
    //Criando sistema e usuario
      $sistema = Sistema::getInstance();
      $sistema->setUser("admin", "0000", "admin@gmail.com");

      try{
        $companhia1 = new Companhia("Latam", "001", "Latam Airlines do Brasil S.A.", "02012862000160", "LA");
        $companhia2 = new Companhia("Azul", "002", "Azul Linhas Aéreas Brasileiras S.A.", "09296295000160", "AD");
        $sistema->criaCompanhia($companhia1);
        $sistema->criaCompanhia($companhia2);
      }catch (Exception $e){
        echo "Não há um usuário Logado\n";
      }

      $sistema->login("admin", "0000");

    //Criando companhias
      $companhia1 = new Companhia("Latam", "001", "Latam Airlines do Brasil S.A.", "02012862000160", "LA");
      $companhia2 = new Companhia("Azul", "002", "Azul Linhas Aéreas Brasileiras S.A.", "09296295000160", "AD");
      $sistema->criaCompanhia($companhia1);
      $sistema->criaCompanhia($companhia2);
    //criando o programa de milhagem das companhias
      $planoLatam = new PlanoMilhagem("LatamPass");
      $planoAzul = new PlanoMilhagem("Tudo Azul");

      $companhia1->setPlanoDeMilhagem($planoLatam);
      $companhia2->setPlanoDeMilhagem($planoAzul);

    //Cadastrando aeronaves
      try{
        $companhia1->adicionaAeronave("Embraer", "175", "180", "600", "PX-RUZ");  
      }catch (Exception $e){
        echo "Registro da aeronave inválido. Corrigido para PP-RUZ \n";
        $companhia1->adicionaAeronave("Embraer", "175", "180", "600", "PP-RUZ");  
      }
      $companhia2->adicionaAeronave("Embraer", "175", "180", "600", "PS-RUS");

    //Cadastrando os aeroportos
      $confins = new Aeroporto("CNF", "Confins", "MG", "-19.634130,-43.965400");
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
        $voo1 = new Voo("01:50", "07:00:00", "08:50:00", "AC1329", $confins->getCidade(), $guarulhos->getCidade(), $companhia2->getSigla(), "diario");
        $companhia2->setVoo($voo1);
        $voo1->setAeronave($companhia2->getAeronave(0));
      }catch (Exception $e){
        echo "Código de companhia invalido, corrigido para o código da Azul Linhas Aéreas Brasileiras S.A. \n";
        $voo1 = new Voo("01:50", "07:00:00", "08:50:00", "AD1329", $confins->getCidade(), $guarulhos->getCidade(), $companhia2->getSigla(), "diario");
        $voo1->setAeronave($companhia2->getAeronave(0));
        $companhia2->setVoo($voo1);
      }
      $voo1_2 = new Voo("01:50", "00:00:00", "01:50:00", "AD2568", $guarulhos->getCidade(), $confins->getCidade(), $companhia2->getSigla(), "diario");
      $voo2 = new Voo("01:50", "06:00:00", "07:50:00", "LA8745", $confins->getCidade(), $guarulhos->getCidade(), $companhia1->getSigla(), "diario");
      $voo2_2 = new Voo("01:50", "00:00:00", "01:50:00", "LA4336", $guarulhos->getCidade(), $confins->getCidade(), $companhia1->getSigla(), "diario");
      
      $voo1_2->setAeronave($companhia2->getAeronave(0));
      $voo2->setAeronave($companhia1->getAeronave(0));
      $voo2_2->setAeronave($companhia1->getAeronave(0));
      
      $companhia1->setVoo($voo2);
      $companhia1->setVoo($voo2_2);
      $companhia2->setVoo($voo1_2);
      
      //confins-congonhas
      $voo3 = new Voo("01:25", "10:00:00", "11::00", "AD0515", $confins->getCidade(), $congonhas->getCidade(), $companhia2->getSigla(), "diario");
      $voo3_2 = new Voo("01:25", "04:00:00", "05:25:00", "AD7156", $congonhas->getCidade(), $confins->getCidade(), $companhia2->getSigla(), "diario");

      $voo4 = new Voo("01:25", "09:00:00", "10:25:00", "LA4124", $confins->getCidade(), $congonhas->getCidade(), $companhia1->getSigla(), "diario");
      $voo4_2 = new Voo("01:25", "02:00:00", "03:25:00", "LA6745", $congonhas->getCidade(), $confins->getCidade(), $companhia1->getSigla(), "diario");
      
      $voo4->setAeronave($companhia1->getAeronave(0));
      $voo4_2->setAeronave($companhia1->getAeronave(0));
      $voo3->setAeronave($companhia2->getAeronave(0));
      $voo3_2->setAeronave($companhia2->getAeronave(0));

      $companhia1->setVoo($voo4);
      $companhia1->setVoo($voo4_2);
      $companhia2->setVoo($voo3);
      $companhia2->setVoo($voo3_2);

      //guarulhos-galeão
      $voo5 = new Voo("00:55", "13:00:00", "13:55:00", "AD9615", $guarulhos->getCidade(), $galeao->getCidade(), $companhia2->getSigla(), "diario");
      $voo5_2 = new Voo("00:55", "22:00:00", "22:55:00", "AD4526", $galeao->getCidade(), $guarulhos->getCidade(), $companhia2->getSigla(), "diario");

      $voo6 = new Voo("00:55", "12:00:00", "12:55:00", "LA4756", $guarulhos->getCidade(), $galeao->getCidade(), $companhia1->getSigla(), "diario");
      $voo6_2 = new Voo("00:55", "19:00:00", "19:55:00", "LA6476", $galeao->getCidade(), $guarulhos->getCidade(), $companhia1->getSigla(), "diario");

      $voo6->setAeronave($companhia1->getAeronave(0));
      $voo6_2->setAeronave($companhia1->getAeronave(0));
      $voo5->setAeronave($companhia2->getAeronave(0));
      $voo5_2->setAeronave($companhia2->getAeronave(0));
      
      $companhia1->setVoo($voo6);
      $companhia1->setVoo($voo6_2);
      $companhia2->setVoo($voo5);
      $companhia2->setVoo($voo5_2);

      //congonhas-afonso pena
      $voo7 = new Voo("01:00", "15:00:00", "16:00:00", "AD4875", $congonhas->getCidade(), $afonsopena->getCidade(), $companhia2->getSigla(), "diario");
      $voo7_2 = new Voo("01:00", "17:00:00", "18:00:00", "AD7486", $afonsopena->getCidade(), $congonhas->getCidade(), $companhia2->getSigla(), "diario");

      $voo8 = new Voo("01:00", "14:00:00", "15:00:00", "LA5741", $congonhas->getCidade(), $afonsopena->getCidade(), $companhia1->getSigla(), "diario");
      $voo8_2 = new Voo("01:00", "16:00:00", "17:00:00", "LA8475", $afonsopena->getCidade(), $congonhas->getCidade(), $companhia1->getSigla(), "diario");

      $voo8->setAeronave($companhia1->getAeronave(0));
      $voo8_2->setAeronave($companhia1->getAeronave(0));
      $voo7->setAeronave($companhia2->getAeronave(0));
      $voo7_2->setAeronave($companhia2->getAeronave(0));
      
      $companhia1->setVoo($voo8);
      $companhia1->setVoo($voo8_2);
      $companhia2->setVoo($voo7);
      $companhia2->setVoo($voo7_2);

    //criando calendário e registrando viagens
      $sistema->criaCalendario();
      $sistema->AddVooCalendario($voo1);
      $sistema->AddVooCalendario($voo1_2);
      $sistema->AddVooCalendario($voo2);
      $sistema->AddVooCalendario($voo2_2);
      $sistema->AddVooCalendario($voo3);
      $sistema->AddVooCalendario($voo3_2);
      $sistema->AddVooCalendario($voo4);
      $sistema->AddVooCalendario($voo4_2);
      $sistema->AddVooCalendario($voo5);
      $sistema->AddVooCalendario($voo5_2);
      $sistema->AddVooCalendario($voo6);
      $sistema->AddVooCalendario($voo6_2);
      $sistema->AddVooCalendario($voo7);
      $sistema->AddVooCalendario($voo7_2);
      $sistema->AddVooCalendario($voo8);
      $sistema->AddVooCalendario($voo8_2);
      

    //cliente realizando a compra de passagem
      $cliente1 = new Cliente("Neymar Jr", "14546132", "76529069471", "Brasileiro", "05/02/1992", "neymarjr@gmail.com");
      $sistema->criaCliente($cliente1);
      $passageiro1 = new PassageiroVIP("Luiz Gonzaga", "72486349", "15789345789", "Brasileiro", "13/12/1912", "luizgonzaga@gmail.com", "45687", $companhia2->getPlanoDeMilhagem());
      $sistema->criaPassageiro($passageiro1);


    //consulta viagem deve ser usado com os parametros que o cliente quer para comprar a viagem, por conta do erro do calendário é impossivel agora
      //dentro de compraPassagem deve ser chamado o consultaViagem
        $voosLatam = $companhia1->getVoos();
        $voosAzul = $companhia2->getVoos();
        $cliente1->compraPassagem($confins->getCidade(), $afonsopena->getCidade(), "1100", "75", "2", $passageiro1, $voosAzul);
    
    //realizando o CHECK-IN e imprimindo cartão de embarque
      $passageiro1->check_in(0);
      $passageiro1->imprimeCartao();
      $passageiro1->confirmaEmbarque(True);

    //realizando a compra da viagem de volta pela Latam
      $cliente1->compraPassagem($afonsopena->getCidade(), $confins->getCidade(), "1100", "39", "2", $passageiro1, $voosLatam);
      $passageiro1->check_in(0);
      $passageiro1->imprimeCartao();
      $passageiro1->confirmaEmbarque(True);

      //Implementando Rota 
      $confins_UFMG = new Rota($confins);
      $piloto = new Funcionario("Lucas", "09424656633", "09424656633", "Brasileiro", "06/03/2003", "lucasaraujoresende21@gmail.com", "2578465057", "Rua Professor Kálman Sibalszky, 194 - Garças, Belo Horizonte - MG", $companhia1, $confins);
      $confins_UFMG->addFuncionario($piloto);
      echo("O Funcionário será pego pela van às ");
      echo($confins_UFMG->setHorarioPartida($sistema->getViagemDia(0,0)));
      echo("\n");
      // Salvando o log em um arquivo txt
      $array = $sistema->getLogSist();
      $nomeArquivo = "log.txt";
      $arquivo = fopen($nomeArquivo, 'w');
      if ($arquivo) {
    // Percorre o array e grava cada elemento no arquivo
        foreach ($array as $elemento) {
        fwrite($arquivo, $elemento . "\n");
        }
        fclose($arquivo);
        echo "O Log foi gravado com sucesso no arquivo $nomeArquivo.";
      } else {
          echo "Erro ao abrir o arquivo $nomeArquivo para escrita.";  
      }
      $sistema->save();

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
      

    //printando as viagens
      /*$calendario = $sistemas[0]->getCalendario();
      echo "Viagens nos próximos 30 dias:\n";
      for($i = 0; $i < count($calendario); $i++){
        $viagem = $sistemas[0]->getViagens($i);
        print_r($viagem);
      }
      echo "\n";*/


    //seguindo o roteiro de testes
      
  }
}