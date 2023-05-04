<?php  
  include_once("persist.php");

  class Aeronave extends persist{
    
    static $local_filename = "aeronave.txt";
    private $fabricante; 
    private $modelo;
    private $capPassageiros;
    private $capCarga;
    private $registro;
    public function __construct(string $_fab, string $_mod, int $_capPassageiros,        float $_capCarga, string $_reg){
      if(strlen($_reg)>6){
        throw new Exception("Registro invalido");
      }elseif(strlen($_reg)<6){
        throw new Exception("Registro invalido");
      }if($_reg[2]!='-'){
        throw new Exception("Registro invalido");
      }if($_reg[0]!='P'){
        throw new Exception("Registro invalido");
      }
      if($_reg[1]!='T'&&$_reg[1]!='R'&&$_reg[1]!='S'&&$_reg[1]!='P'){
        throw new Exception("Registro invalido");
      }
      $ii;
      for($ii=0;$ii<3;$ii++){
        $teste3 = ord($_reg[3+$ii]);
        if($teste3<65 || $teste3>90){
          throw new Exception("Registro invalido");
        }  
      }
      $this->fabricante = $_fab;
      $this->modelo = $_mod;
      $this->capPassageiros = $_capPassageiros;
      $this->capCarga = $_capCarga;
      $this->registro = $_reg;
    }

    static public function getFilename() {
      return get_called_class()::$local_filename;
    }

    public function __destruct(){}
  }