<?php

namespace app\models\validacao;

use app\core\Validacao;

class DespesaValidacao
{
    public static function salvar($despesa)
    {
        $validacao = new Validacao();
        $validacao->setData("descricao", $despesa->descricao);
        $validacao->getData("descricao")->isVazio();
        return $validacao;
    }
}
