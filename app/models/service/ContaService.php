<?php

namespace app\models\service;

use app\models\validacao\ContaValidacao;

class ContaService
{
    public static function salvar($banco, $campo, $tabela)
    {
        $validacao = ContaValidacao::salvar($banco);
        return Service::salvar($banco, $campo, $validacao->listaErros(), $tabela);
    }
}
