<?php

namespace app\models\validacao;

use app\core\Validacao;

class ReceitaValidacao
{
    public static function salvar($receita)
    {
        $validacao = new Validacao();
        $validacao->setData("descricao", $receita->descricao);
        $validacao->getData("descricao")->isVazio();
        return $validacao;
    }
}
