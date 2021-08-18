<?php

namespace app\controllers;

use app\core\Controller;

class ReceitaController extends Controller
{
    public function index()
    {
    }
    public function novo()
    {
        $dados["view"] = "cadastro/receita/novo";
        $this->load("template", $dados);
    }
}
