<?php  
  class Aeronave{
    private $fabricante; 
    private $modelo;
    private $capPassageiros;
    private $capCarga;
    private $registro;
    public function __construct(string $_fab, string $_mod, int $_capPassageiros, float $_capCarga, string $_reg){
      if(strlen($_reg)>6){
        print_r("Registro inválido, inserir menor");
        echo ("</p>");
        return("Objeto não foi construido");}
      elseif(strlen($_reg)<6){
        print_r("Registro inválido, inserir maior");
        return("Objeto não foi construido");}
      if($_reg[2]!='-'){
        print_r("Registro inválido, inserir hifen");
        echo ("</p>");
        return("Objeto não foi construido");}
      if($_reg[0]!='P'){
        print_r("Prefixo do registro invalido");
        echo ("</p>");
        return("Objeto não foi construido");
      }
      if($_reg[1]!='T'&&$_reg[1]!='R'&&$_reg[1]!='S'&&$_reg[1]!='P'){
        print_r("Prefixo do registro invalido");
        echo ("</p>");
        return("Objeto não foi construido");
      }
      $ii;
      for($ii=0;$ii<3;$ii++){
        $teste3 = ord($_reg[3+$ii]);
        if($teste3<65 || $teste3>90){
          print_r("Sufixo do registro invalido");
          echo ("</p>");
          return("Objeto não foi construido");
        }  
      }
      $this->fabricante = $_fab;
      $this->modelo = $_mod;
      $this->capPassageiros = $_capPassageiros;
      $this->capCarga = $_capCarga;
      $this->registro = $_reg;
    }
    public function __destruct(){}
  }