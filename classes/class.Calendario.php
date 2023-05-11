<?php

class Calendario
{
    private $eventos = [];

    public function cadastrarEvento()
    {
        echo "Digite o tipo de evento (cadastro_voo ou execucao_voo): ";
        $tipoEvento = readline();

        if ($tipoEvento === "cadastro_voo") {
            $this->cadastrarVoo();
        } elseif ($tipoEvento === "execucao_voo") {
            $this->executarVoo();
        } else {
            echo "Tipo de evento inválido.\n";
        }
    }

    private function cadastrarVoo()
    {
        echo "Digite o código da companhia aérea (duas letras): ";
        $codigoCompanhia = readline();

        echo "Digite o prefixo do avião: ";
        $prefixoAviao = readline();

        echo "Digite a sigla do aeroporto de origem (três letras): ";
        $siglaOrigem = readline();

        echo "Digite a sigla do aeroporto de destino (três letras): ";
        $siglaDestino = readline();

        echo "Digite o horário de partida (formato HH:MM): ";
        $horarioPartida = readline();

        echo "Digite a duração do voo (em minutos): ";
        $duracaoVoo = readline();

        echo "Digite a frequência do voo (dias da semana separados por vírgula): ";
        $frequenciaVoo = explode(',', readline());

        // Gerar o código do voo
        $codigoVoo = $this->gerarCodigoVoo($codigoCompanhia);

        // Armazenar o evento
        $evento = [
            'tipo' => 'cadastro_voo',
            'codigo_companhia' => $codigoCompanhia,
            'prefixo_aviao' => $prefixoAviao,
            'sigla_origem' => $siglaOrigem,
            'sigla_destino' => $siglaDestino,
            'horario_partida' => $horarioPartida,
            'duracao_voo' => $duracaoVoo,
            'frequencia_voo' => $frequenciaVoo,
            'codigo_voo' => $codigoVoo
        ];

        $this->eventos[] = $evento;

        echo "Voo cadastrado com sucesso.\n";
    }

    private function executarVoo()
    {
        echo "Digite o código do voo: ";
        $codigoVoo = readline();

        // Procurar o voo pelo código
        $voo = $this->buscarVooPorCodigo($codigoVoo);

        if ($voo === null) {
            echo "Voo não encontrado.\n";
            return;
        }

        echo "Digite o horário efetivo de partida (formato HH:MM): ";
        $horarioPartidaEfetivo = readline();

        echo "Digite o horário efetivo de chegada (formato HH:MM): ";
        $horarioChegadaEfetivo = readline();

        echo "Digite o status do voo (atrasado, ocorreu, cancelado): ";
        $statusVoo = readline();

        echo "Digite o código do avião que fez o voo: ";
        $codigoAviao = readline();

        // Calcular a duração do voo com base nos horários efetivos de partida e chegada
        $duracaoVoo = $this->calcularDuracaoVoo($voo['horario_partida'], $horarioPartidaEfetivo);

        // Armazenar as informações do voo executado
        $eventoExecutado = [
            'tipo' => 'execucao_voo',
            'codigo_companhia' => $voo['codigo_companhia'],
            'prefixo_aviao' => $voo['prefixo_aviao'],
            'sigla_origem' => $voo['sigla_origem'],
            'sigla_destino' => $voo['sigla_destino'],
            'horario_partida' => $voo['horario_partida'],
            'horario_chegada' => $voo['horario_chegada'],
            'horario_partida_efetivo' => $horarioPartidaEfetivo,
            'horario_chegada_efetivo' => $horarioChegadaEfetivo,
            'status_voo' => $statusVoo,
            'codigo_aviao' => $codigoAviao,
            'codigo_voo' => $codigoVoo,
            'duracao_voo' => $duracaoVoo
        ];

        $this->eventos[] = $eventoExecutado;

        echo "Voo executado cadastrado com sucesso.\n";
    }

    private function gerarCodigoVoo($codigoCompanhia)
    {
        // Encontrar um número de voo não utilizado
        $numeroVoo = 1;
        $codigoVoo = $codigoCompanhia . str_pad($numeroVoo, 4, '0', STR_PAD_LEFT);

        foreach ($this->eventos as $evento) {
            if ($evento['tipo'] === 'cadastro_voo' && $evento['codigo_voo'] === $codigoVoo) {
                $numeroVoo++;
                $codigoVoo = $codigoCompanhia . str_pad($numeroVoo, 4, '0', STR_PAD_LEFT);
            }
        }

        return $codigoVoo;
    }

    private function buscarVooPorCodigo($codigoVoo)
    {
        foreach ($this->eventos as $evento) {
            if ($evento['tipo'] === 'cadastro_voo' && $evento['codigo_voo'] === $codigoVoo) {
                return $evento;
            }
        }

        return null;
    }

    private function calcularDuracaoVoo($horarioPartida, $horarioChegada)
    {
        $partida = new DateTime($horarioPartida);
        $chegada = new DateTime($horarioChegada);
        $duracao = $partida->diff($chegada);

        return $duracao->format('%H:%I');
    }
cadastrarVoo(); // Função para cadastrar um voo
executarVoo(); // Função para executar um voo

    //...
}
