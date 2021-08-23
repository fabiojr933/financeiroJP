<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\ContaService;
use app\models\service\Service;
use stdClass;

class ContaController extends Controller
{
    private $tabela = "banco";
    private $campo = "id_banco";

    public function index()
    {
        $dados["banco"] = Service::lista($this->tabela);
        $dados["view"] = "Cadastro/banco/index";
        $this->load("template", $dados);
    }
    public function novo()
    {
        $dados["banco"] = Flash::getForm();
        $dados["view"] = "cadastro/banco/novo";
        $this->load("template", $dados);
    }
    public function salvar()
    {
        $banco = new stdClass();
        $banco->id_banco = $_POST["id_banco"];
        $banco->conta = $_POST["conta"];
        $banco->agencia = $_POST["agencia"];
        $banco->saldo = str_replace(".", ",", $_POST["saldo"]);
        $banco->banco = $_POST["banco"];


        Flash::setForm($banco);
        if (ContaService::salvar($banco, $this->campo, $this->tabela)) {
            sleep(2);
            $this->redirect(URL_BASE . "Conta");
        } else {
            if (!$banco->id_banco) {
                $this->redirect(URL_BASE . "conta/novo");
            } else {
                $this->redirect(URL_BASE . "conta/edit/" . $banco->id_banco);
            }
        }
    }
    public function editar($id)
    {
        $banco = Service::get($this->tabela, $this->campo, $id);
        if (!$banco) {
            $this->redirect(URL_BASE . "conta");
        }
        $dados["banco"] = $banco;
        $dados["view"] = "Cadastro/banco/novo";
        $this->load("template", $dados);
    }
    public function delete($id)
    {
        $banco = Service::get($this->tabela, $this->campo, $id);
        if (!$banco) {
            $this->redirect(URL_BASE . "banco");
        } else {
            Service::excluir($this->tabela, $this->campo, $id);
        }
        $dados["view"] = "Cadastro/banco/index";
        $this->redirect(URL_BASE . "conta");
    }
}
