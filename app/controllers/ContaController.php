<?php

namespace app\controllers;

use app\core\Controller;

class ContaController extends Controller
{
    public function index()
    {
    }
    public function novo()
    {
        $dados["view"] = "cadastro/banco/novo";
        $this->load("template", $dados);
    }
}
