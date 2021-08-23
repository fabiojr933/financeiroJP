<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\DespesaService;
use app\models\service\Service;

class DespesaController extends Controller
{
    private $tabela = "despesa";
    private $campo = "id_despesa";

    public function index()
    {
        $dados["despesa"] = Service::lista($this->tabela);
        $dados["view"] = "cadastro/despesa/index";
        $this->load("template", $dados);
    }
    public function novo()
    {
        $dados["despesa"] = Flash::getForm();
        $dados["view"] = "Cadastro/despesa/novo";
        $this->load("template", $dados);
    }
    public function salvar()
    {
        $despesa = new \stdClass();
        $despesa->id_despesa = $_POST["id_despesa"];
        $despesa->descricao = $_POST["descricao"];
        $despesa->fixo = $_POST["fixo"];
        if ($despesa->fixo) {
            $despesa->fixo = "S";
        } else {
            $despesa->fixo = "N";
        }

        Flash::setForm($despesa);
        if (DespesaService::salvar($despesa, $this->campo, $this->tabela)) {
            sleep(2);
            $this->redirect(URL_BASE . "Despesa");
        } else {
            if (!$despesa->id_banco) {
                $this->redirect(URL_BASE . "despesa/novo");
            } else {
                $this->redirect(URL_BASE . "despesa/edit/" . $despesa->id_despesa);
            }
        }
    }
    public function editar($id)
    {
        $despesa = Service::get($this->tabela, $this->campo, $id);
        if (!$despesa) {
            $this->redirect(URL_BASE . "despesa");
        }
        $dados["despesa"] = $despesa;
        $dados["view"] = "cadastro/despesa/novo";
        $this->load("template", $dados);
    }
    public function delete($id)
    {
        $despesa = Service::get($this->tabela, $this->campo, $id);
        if (!$despesa) {
            $this->redirect(URL_BASE . "despesa");
        } else {
            Service::excluir($this->tabela, $this->campo, $id);
        }
        $dados["view"] = "cadastro/despesa/index";
        $this->redirect(URL_BASE . "despesa");
    }
}
