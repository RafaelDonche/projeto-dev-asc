<?php

namespace App\Services;

class ValidarContatoService
{
    // verifica se há ao menos 1 dado na linha
    public static function verificarNulo($array) {

        // neste if é verificado se todos os campos são vazios ou nulos, se sim então não é valido, retorna false
        if (($array['nome'] == null || $array['nome'] == '') &&
            ($array['sobrenome'] == null || $array['sobrenome'] == '') &&
            ($array['email'] == null || $array['email'] == '') &&
            ($array['telefone'] == null || $array['telefone'] == '') &&
            ($array['endereco'] == null || $array['endereco'] == '') &&
            ($array['cidade'] == null || $array['cidade'] == '') &&
            ($array['cep'] == null || $array['cep'] == '') &&
            ($array['data_nascimento'] == null || $array['data_nascimento'] == '')) {

            return false;
        }else {
            return true;

        }
    }

    // verifica se o telefone é válido, sem validar o DDD
    public static function validarTelefoneSemDDD($telefone) {

        if ($telefone == null || $telefone == '') {
            return false;
        }

        $telefone = preg_replace('/[^0-9]/', '', $telefone);

        if ((strlen($telefone) < 12) || (strlen($telefone) > 13)) {
            return false;
        }

        $codigo_brasil = substr($telefone, 0, 2);

        if ($codigo_brasil != '55') {
            return false;
        }

        return true;
    }

    // verifica se o telefone é válido, validando o DDD
    public static function validarTelefoneComDDD($telefone) {

        if ($telefone == null || $telefone == '') {
            return false;
        }

        $telefone = preg_replace('/[^0-9]/', '', $telefone);

        if ((strlen($telefone) < 12) || (strlen($telefone) > 13)) {
            return false;
        }

        $codigo_brasil = substr($telefone, 0, 2);

        if ($codigo_brasil != '55') {
            return false;
        }

        $ddd_validos = array('11', '12', '13', '14', '15', '16', '17', '18', '19',
                            '21', '22', '24', '27', '28', '31', '32', '33', '34', '35',
                            '37', '38', '41', '42', '43', '44', '45', '46', '47', '48',
                            '49', '51', '53', '54', '55', '61', '62', '63', '64', '65',
                            '66', '67', '68', '69', '71', '73', '74', '75', '77', '79',
                            '81', '82', '83', '84', '85', '86', '87', '88', '89', '91',
                            '92', '93', '94', '95', '96', '97', '98', '99');
        $ddd = substr($telefone, 2, 2);
        if (!in_array($ddd, $ddd_validos)) {
            return false;
        }

        return true;
    }

    public static function formatarData($data) {

        if ($data == null || $data == '') {
            return '';
        }

        $array = explode('/', $data);

        $dia = strlen($array[0]) == 1 ? '0'.$array[0] : $array[0];
        $mes = strlen($array[1]) == 1 ? '0'.$array[1] : $array[1];
        $ano = $array[2];

        return $ano . '-' . $mes . '-' . $dia;

    }
}
