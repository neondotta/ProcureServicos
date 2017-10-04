<?php
/**
 * Created by PhpStorm.
 * User: Neon Dotta
 * Date: 30/09/2017
 * Time: 12:46
 */
class ValidForm
{
    public function validCPF($cpf)
    {
        $data = [];

        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            $data = ['status' => false];
            return $data;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            $data = ['status' => false];
            return $data;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;

            if ($cpf{$c} != $d) {
                $data = ['status' => false];
                return $data;
            }
        }
        $data = ['status' => true];
        return $data;
    }

    function validCNPJ($cnpj)
    {
        if($cnpj != "") {
            $cnpj = preg_replace('/[^0-9]/', '', (string)$cnpj);
            // Valida tamanho
            if (strlen($cnpj) != 14) {
                $data = ['status' => false];
                return $data;
            }
            // Valida primeiro dígito verificador
            for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
                $soma += $cnpj{$i} * $j;
                $j = ($j == 2) ? 9 : $j - 1;
            }
            $resto = $soma % 11;
            if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto)) {

            }
            // Valida segundo dígito verificador
            for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
                $soma += $cnpj{$i} * $j;
                $j = ($j == 2) ? 9 : $j - 1;
            }
            $resto = $soma % 11;
             if($cnpj{13} == ($resto < 2 ? 0 : 11 - $resto)) {
                 $data = ['status' => true];
                 return $data;
             }
             $data = ['status' => false];
             return $data;
        }

        return 0;
    }
}