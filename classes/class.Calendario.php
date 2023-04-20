<?php

class Calendario{
    protected $voos;
    protected $segunda;
    protected $terca;
    protected $quarta;
    protected $quinta;
    protected $sexta;
    protected $sabado;
    protected $domingo;

    public function __construct(array $_voos){
        $this->voos = $_voos;
        $this->segunda = date('d-m-Y', strtotime('next Monday'));
        $this->terca = date('d-m-Y', strtotime('next Tuesday'));
        $this->quarta = date('d-m-Y', strtotime('next Wednesday'));
        $this->quinta = date('d-m-Y', strtotime('next Thursday'));
        $this->sexta = date('d-m-Y', strtotime('next Friday'));
        $this->sabado = date('d-m-Y', strtotime('next Saturday'));
        $this->domingo = date('d-m-Y', strtotime('next Sunday'));
    }

    public function __destruct(){}

    public function exibirTabela(){
        echo "<table>";
        echo "<tr><th>Voo</th><th>Segunda</th><th>Terça</th><th>Quarta</th><th>Quinta</th><th>Sexta</th><th>Sábado</th><th>Domingo</th></tr>";
        foreach($this->voos as $voo){
           echo "<tr><td>".$voo[0]."</td><td>".$voo[1]." ".$this->segunda."</td><td>".$voo[2]." ".$this->terca."</td><td>".$voo[3]." ".$this->quarta."</td><td>".$voo[4]." ".$this->quinta."</td><td>".$voo[5]." ".$this->sexta."</td><td>".$voo[6]." ".$this->sabado."</td><td>".$voo[7]." ".$this->domingo."</td></tr>";
        }
        echo "</table>";
    }
}

$voos = array(
   array("Voo 1", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado", "Domingo"),
   array("Voo 2", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado", "Domingo"),
   // adicione quantas linhas você precisar
);

$calendario = new Calendario($voos);
$calendario->exibirTabela();