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
    private $passagem;
    private $histDeVoos = array();

    public function __construct($_nome, $_documento, $_CPF, $_nacionalidade, $_dataDeNascimento, $_email)
    {
        parent::__construct($_nome, $_documento, $_CPF, $_nacionalidade, $_dataDeNascimento, $_email);
        
    }

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


    public function alterarPassagem(Passageiro $passageiro, Voo $voo, $valor)
    {
        $passageiroVIP = $this->verificarStatusVIP($passageiro); // Método da classe separada para validar se o passageiro é VIP

        if ($passageiroVIP) {
            // Implementar a lógica para remarcar ou cancelar a passagem sem cobrar do passageiro

            $this->status = "Passagem alterada (VIP)";
        } else {
            // Implementar a lógica para cobrar o valor da passagem do passageiro

            $this->status = "Passagem alterada (Valor cobrado: " . $valor . ")";
        }
    }

    public function check_in(Voo $v)
    {
        $horarioPartida = new DateTime($v->getHorarioPartida());
        $horarioAtual = new DateTime();
        $limiteCheckin = $horarioPartida->sub(new DateInterval('PT30M')); // Subtrai 30 minutos do horário de partida

        $prazoMinimo = $horarioPartida->sub(new DateInterval('P2D')); // Subtrai 48 horas do horário de partida

        if ($horarioAtual > $prazoMinimo && $horarioAtual < $limiteCheckin) {
            $this->status = "Check-in realizado";
        } elseif ($horarioAtual >= $limiteCheckin) {
            $this->status = "NO SHOW";
        } else {
            // Caso o check-in esteja sendo feito antes das 48 horas do voo
            // Não atualiza o status
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
        $this->status = "Passagem comprada";
    }
}

    //Deve ser possível acessar o histórico de vôos de um passageiro em ordem cronológica, talvez usando include_once

/*
• Todos os status do passageiro em um vôo deve ser passível de registro. São eles:
o Passagem adquirida --> FALTA
o Passagem cancelada --> FALTA
o Check-in realizado --OK
o Embarque realizado --> OK
o NO SHOW --> OK
removida as validações e colocadas em pessoa
*/