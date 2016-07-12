<?php

namespace App\Helpers;

class Utils {

    public static function moeda_para_bd($get_valor) {

        $source = array('.', ',');
        $replace = array('', '.');
        $valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto
        return $valor; //retorna o valor formatado para gravar no banco
    }

    public static function data_to_br($data) {
        if (empty($data)) {

            return $data;
        }
        $data = explode(" ", $data);
        $data = explode("-", $data[0]);


        return "{$data[2]}/{$data[1]}/{$data[0]}";
    }

    public static function data_to_bd($data) {
        if (empty($data) || $data == "") {
            return null;
        }
        $dados = explode("/", $data);
        $data_mysql = "{$dados[2]}-{$dados[1]}-{$dados[0]}";
        return $data_mysql;
    }

    private static function replace($string) {
        return $string = str_replace("/", "", str_replace("-", "", str_replace(".", "", $string)));
    }

    private static function check_fake($string, $length) {
        for ($i = 0; $i <= 9; $i++) {
            $fake = str_pad("", $length, $i);
            if ($string === $fake)
                return(1);
        }
    }

    public static function valida_cpf($cpf = null) {
        if (empty($cpf)) {
            return false;
        }
        //Etapa 1: Cria um array com apenas os digitos numéricos, isso permite receber o cpf em diferentes formatos como "000.000.000-00", "00000000000", "000 000 000 00" etc...
        $j = 0;
        for ($i = 0; $i < (strlen($cpf)); $i++) {
            if (is_numeric($cpf[$i])) {
                $num[$j] = $cpf[$i];
                $j++;
            }
        }
        //Etapa 2: Conta os dígitos, um cpf válido possui 11 dígitos numéricos.
        if (count($num) != 11) {
            $isCpfValid = false;
        }
        //Etapa 3: Combinações como 00000000000 e 22222222222 embora não sejam cpfs reais resultariam em cpfs válidos após o calculo dos dígitos verificares e por isso precisam ser filtradas nesta parte.
        else {
            for ($i = 0; $i < 10; $i++) {
                if ($num[0] == $i && $num[1] == $i && $num[2] == $i && $num[3] == $i && $num[4] == $i && $num[5] == $i && $num[6] == $i && $num[7] == $i && $num[8] == $i) {
                    $isCpfValid = false;
                    break;
                }
            }
        }
        //Etapa 4: Calcula e compara o primeiro dígito verificador.
        if (!isset($isCpfValid)) {
            $j = 10;
            for ($i = 0; $i < 9; $i++) {
                $multiplica[$i] = $num[$i] * $j;
                $j--;
            }
            $soma = array_sum($multiplica);
            $resto = $soma % 11;
            if ($resto < 2) {
                $dg = 0;
            } else {
                $dg = 11 - $resto;
            }
            if ($dg != $num[9]) {
                $isCpfValid = false;
            }
        }
        //Etapa 5: Calcula e compara o segundo dígito verificador.
        if (!isset($isCpfValid)) {
            $j = 11;
            for ($i = 0; $i < 10; $i++) {
                $multiplica[$i] = $num[$i] * $j;
                $j--;
            }
            $soma = array_sum($multiplica);
            $resto = $soma % 11;
            if ($resto < 2) {
                $dg = 0;
            } else {
                $dg = 11 - $resto;
            }
            if ($dg != $num[10]) {
                $isCpfValid = false;
            } else {
                $isCpfValid = true;
            }
        }
        //Trecho usado para depurar erros.
        /*
          if($isCpfValid==true)
          {
          echo "<font color="GREEN">Cpf é Válido</font>";
          }
          if($isCpfValid==false)
          {
          echo "<font color="RED">Cpf Inválido</font>";
          }
         */
        //Etapa 6: Retorna o Resultado em um valor booleano.
        return $isCpfValid;
    }

    public static function valida_cnpj($cnpj) {
        // Deixa o CNPJ com apenas números
        $cnpj = preg_replace('/[^0-9]/', '', $cnpj);

        // Garante que o CNPJ é uma string
        $cnpj = (string) $cnpj;

        // O valor original
        $cnpj_original = $cnpj;

        // Captura os primeiros 12 números do CNPJ
        $primeiros_numeros_cnpj = substr($cnpj, 0, 12);

        /**
         * Multiplicação do CNPJ
         *
         * @param string $cnpj Os digitos do CNPJ
         * @param int $posicoes A posição que vai iniciar a regressão
         * @return int O
         *
         */
        if (!function_exists('multiplica_cnpj')) {

            function multiplica_cnpj($cnpj, $posicao = 5) {
                // Variável para o cálculo
                $calculo = 0;

                // Laço para percorrer os item do cnpj
                for ($i = 0; $i < strlen($cnpj); $i++) {
                    // Cálculo mais posição do CNPJ * a posição
                    $calculo = $calculo + ( $cnpj[$i] * $posicao );

                    // Decrementa a posição a cada volta do laço
                    $posicao--;

                    // Se a posição for menor que 2, ela se torna 9
                    if ($posicao < 2) {
                        $posicao = 9;
                    }
                }
                // Retorna o cálculo
                return $calculo;
            }

        }

        // Faz o primeiro cálculo
        $primeiro_calculo = multiplica_cnpj($primeiros_numeros_cnpj);

        // Se o resto da divisão entre o primeiro cálculo e 11 for menor que 2, o primeiro
        // Dígito é zero (0), caso contrário é 11 - o resto da divisão entre o cálculo e 11
        $primeiro_digito = ( $primeiro_calculo % 11 ) < 2 ? 0 : 11 - ( $primeiro_calculo % 11 );

        // Concatena o primeiro dígito nos 12 primeiros números do CNPJ
        // Agora temos 13 números aqui
        $primeiros_numeros_cnpj .= $primeiro_digito;

        // O segundo cálculo é a mesma coisa do primeiro, porém, começa na posição 6
        $segundo_calculo = multiplica_cnpj($primeiros_numeros_cnpj, 6);
        $segundo_digito = ( $segundo_calculo % 11 ) < 2 ? 0 : 11 - ( $segundo_calculo % 11 );

        // Concatena o segundo dígito ao CNPJ
        $cnpj = $primeiros_numeros_cnpj . $segundo_digito;

        // Verifica se o CNPJ gerado é idêntico ao enviado
        if ($cnpj === $cnpj_original) {
            return true;
        }
    }

}
