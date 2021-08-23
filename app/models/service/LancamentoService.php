<?php

namespace app\models\service;

use app\models\validacao\LancamentoValidacao;

class LancamentoService
{
    public static function salvar($lancamento, $campo, $tabela)
    {
        $validacao = LancamentoValidacao::salvar($lancamento);
        return Service::salvar($lancamento, $campo, $validacao->listaErros(), $tabela);
    }
}
