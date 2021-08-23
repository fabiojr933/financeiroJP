<?php

namespace app\models\service;

use app\models\validacao\DespesaValidacao;

class DespesaService
{
    public static function salvar($despesa, $campo, $tabela)
    {
        $validacao = DespesaValidacao::salvar($despesa);
        return Service::salvar($despesa, $campo, $validacao->listaErros(), $tabela);
    }
}
