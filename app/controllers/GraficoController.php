<?php

namespace app\controllers;

use app\core\Controller;
use app\models\dao\GenericoDao;

class GraficoController extends Controller
{

    public function grafico01()
    {
        $dados["view"] = "grafico/grafico01";
        $this->load("template", $dados);
    }
    public function entradaSaidaMes()
    {
        $dao = new GenericoDao();
        echo json_encode($dao->EntradaSaidaMes());
    }
}
