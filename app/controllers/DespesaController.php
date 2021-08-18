<?php

namespace app\controllers;

use app\core\Controller;

class DespesaController extends Controller
{
    public function index()
    {
        $dados["view"] = "cadastro/despesa/index";
        $this->load("template", $dados);
    }
    public function novo()
    {
        $dados["view"] = "Cadastro/despesa/novo";
        $this->load("template", $dados);
    }
}
