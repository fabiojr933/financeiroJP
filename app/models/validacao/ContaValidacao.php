<?php

namespace app\models\validacao;

use app\core\Validacao;

class ContaValidacao
{
    public static function salvar($banco)
    {
        $validacao = new Validacao();
        $validacao->setData("agencia", $banco->agencia);
        $validacao->setData("saldo", $banco->saldo);
        $validacao->setData("banco", $banco->banco);

        $validacao->getData("agencia")->isVazio();
        $validacao->getData("saldo")->isVazio();
        $validacao->getData("banco")->isVazio();

        return $validacao;
    }
}
