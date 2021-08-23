<?php

namespace app\models\service;

use app\models\validacao\DespesaValidacao;

class ReceitaService
{
    public static function salvar($receita, $campo, $tabela)
    {
        $validacao = DespesaValidacao::salvar($receita);
        return Service::salvar($receita, $campo, $validacao->listaErros(), $tabela);
    }
}
