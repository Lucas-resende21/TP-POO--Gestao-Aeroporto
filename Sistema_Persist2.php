<?php
    require_once('global.php');
    if(1){
      $sistema = new Sistema();
      $sistema->setUser("Lucas", "abacate", "lucasaraujoresende21@gmail.com");
      $sistema->login("Lucas", "abacate");
      print_r($sistema->getLogSist());
    }