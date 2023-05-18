<?php
include_once("class.Pessoa.php");
include_once("class.Cliente.php");
include_once("class.Passagem.php");
include_once("class.Voo.php");

class Passageiro extends Pessoa
{
    static $local_filename = "passageiro.txt";

    static public function getFilename()
    {
        return get_called_class()::$local_filename;
    }

    private $status;
    private $embarque;
    private $passagem;
    private $histDeVoos = array();

    public function __construct($_nome, $_documento, $_CPF, $_nacionalidade, $_dataDeNascimento, $_email)
    {
        parent::__construct($_nome, $_documento, $_CPF, $_nacionalidade, $_dataDeNascimento, $_email);
        //$this->status = $_status;
    }

    //associar passageiro a uma passagem, talvez seja melhor implementar isso em passagem

    //Deve ser possível acessar o histórico de vôos de um passageiro em ordem cronológica, talvez usando include_once

    public function cancelaPassagem(Passagem $p) //implementar custo de cancelamento caso passageiro comum
    {
        for ($i = 0; i < sizeof($this->_passagens); $i++) {
            if ($this->_passagens[$i] == $p) {
                unset($this->_passagens[$i]);
                print_r("Passagem cancelada.");
                echo ("</p>");
                break;

                return 200;
            }
        }
    }

    // implementar alteração de passagem, sem custo para vip com custo para VIP

    public function validaVIP()
    {
        return false;
    }

    public function check_in(Voo $v) //implementar só poder fazer check-in faltando 48h pro voo até 30 min antes, caso não faça no prazo NO SHOW
    {
        if ($v->getHorarioPartida - 30) {
            $this->status = "Check-in";
        } else {
            $this->status = "NO SHOW";
        }
    }

    public function confirmaEmbarque($embarque)
    {
        if ($embarque) {
            $this->status = "Embarque realizado";
        } else {
            $this->status = "NO SHOW";
        }
        $this->histDeVoos[] = $this->passagem;
    }

    public function atribuiPassagem($_passagem)
    {
        $this->passagem = $_passagem;
    }
}

/*
• Todos os status do passageiro em um vôo deve ser passível de registro. São eles:
o Passagem adquirida --> FALTA
o Passagem cancelada --> FALTA
o Check-in realizado --OK
o Embarque realizado --> OK
o NO SHOW --> OK

removida as validações e colocadas em pessoa
*/
