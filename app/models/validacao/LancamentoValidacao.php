<?php

namespace app\models\validacao;

use app\core\Validacao;

class LancamentoValidacao
{
    public static function salvar($lancamento)
    {
        $validacao = new Validacao();
        $validacao->setData("valor", $lancamento->valor);
        $validacao->getData("valor")->isVazio();
        return $validacao;
    }
}
