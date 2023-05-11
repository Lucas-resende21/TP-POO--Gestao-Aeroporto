<?php
  include_once("persist.php");

class Pessoa extends persist{
    static $local_filename = "pessoa.txt";
    static public function getFilename() {
    return get_called_class()::$local_filename;
    }

    private $nome;
    private $documento; 