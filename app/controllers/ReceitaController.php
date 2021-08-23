<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\ReceitaService;
use app\models\service\Service;

class ReceitaController extends Controller
{
    private $tabela = "receita";
    private $campo = "id_receita";

    public function index()
    {
        $dados["receita"] = Service::lista($this->tabela);
        $dados["view"] = "Cadastro/receita/index";
        $this->load("template", $dados);
    }
    public function novo()
    {

        $dados["receita"] = Flash::getForm();
        $dados["view"] = "cadastro/receita/novo";
        $this->load("template", $dados);
    }
    public function salvar()
    {
        $receita = new \stdClass();
        $receita->id_receita = $_POST["id_receita"];
        $receita->descricao = $_POST["descricao"];


        Flash::setForm($receita);
        if (ReceitaService::salvar($receita, $this->campo, $this->tabela)) {
            sleep(2);
            $this->redirect(URL_BASE . "receita");
        } else {
            if (!$receita->id_banco) {
                $this->redirect(URL_BASE . "receita/novo");
            } else {
                $this->redirect(URL_BASE . "receita/edit/" . $receita->id_receita);
            }
        }
    }
    public function editar($id)
    {
        $receita = Service::get($this->tabela, $this->campo, $id);
        if (!$receita) {
            $this->redirect(URL_BASE . "receita");
        }
        $dados["receita"] = $receita;
        $dados["view"] = "cadastro/receita/novo";
        $this->load("template", $dados);
    }
    public function delete($id)
    {
        $receita = Service::get($this->tabela, $this->campo, $id);
        if (!$receita) {
            $this->redirect(URL_BASE . "receita");
        } else {
            Service::excluir($this->tabela, $this->campo, $id);
        }
        $dados["view"] = "cadastro/receita/index";
        $this->redirect(URL_BASE . "receita");
    }
}
