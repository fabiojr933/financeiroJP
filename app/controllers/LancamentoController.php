<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\dao\Dao;
use app\models\dao\GenericoDao;
use app\models\service\LancamentoService;
use app\models\service\Service;

class LancamentoController extends Controller
{
    private $tabela = "lancamento";
    private $campo = "id_lancamento";

    public function index()
    {
        $dao = new GenericoDao();
        $dados["lancamento"] = $dao->listaAll();
        $dados["view"] = "Lancamento/index";
        $this->load("template", $dados);
    }
    public function novo()
    {
        $dados["lancamento"] = Flash::getForm();
        $dados["banco"] = Service::lista("banco");
        $dados["despesa"] = Service::lista("despesa");
        $dados["view"] = "Lancamento/novo";
        $this->load("template", $dados);
    }
    public function salvar()
    {
        $lancamento = new \stdClass();
        $lancamento->id_lancamento = $_POST["id_lancamento"];
        $lancamento->id_banco = $_POST["banco"];
        $lancamento->tipo = $_POST["tipo"];
        $lancamento->id_despesa = $_POST["despesa"];
        $lancamento->data = $_POST["data"];
        $lancamento->valor = $_POST["valor"];
        $lancamento->observacao = $_POST["obs"];
        $valor_antigo = $_POST["valor_antigo"];
        $tipo_antigo = $_POST["tipo_antigo"];

        Flash::setForm($lancamento);

        //insert
        if (!$lancamento->id_lancamento) {
            if ($lancamento->tipo == "SAIDA") {
                if (LancamentoService::salvar($lancamento, $this->campo, $this->tabela)) {
                    /**
                     * Atualizando o saldo do banco
                     */
                    $id_banco = $lancamento->id_banco;
                    $saldo = Service::getSoma("banco", "saldo", "id_banco", $lancamento->id_banco);
                    $saldo = ($saldo - $lancamento->valor);
                    $dao = new GenericoDao();
                    $dao->atualizaSaldo($saldo, $id_banco);
                }
            }
            if ($lancamento->tipo == "ENTRADA") {
                if (LancamentoService::salvar($lancamento, $this->campo, $this->tabela)) {
                    /**
                     * Atualizando o saldo do banco
                     */
                    $id_banco = $lancamento->id_banco;
                    $saldo = Service::getSoma("banco", "saldo", "id_banco", $lancamento->id_banco);
                    $saldo = ($saldo + $lancamento->valor);
                    $dao = new GenericoDao();
                    $dao->atualizaSaldo($saldo, $id_banco);
                }
            }
        }

        // Verifica se o usuario mudou o tipo
        if ($lancamento->tipo <> $tipo_antigo) {
            echo "<script>";
            echo "alert('Atenção você mudou o tipo, Excluir esse lancamento e faz novamente')";
            echo "</script>";
            exit();
        } else {
            /**
             * Update
             */
            if ($lancamento->id_lancamento) {
                if ($lancamento->tipo == "SAIDA") {
                    if ($valor_antigo) {

                        $id_banco = $lancamento->id_banco;
                        $saldo = Service::getSoma("banco", "saldo", "id_banco", $lancamento->id_banco);
                        $saldo = $saldo + $valor_antigo;
                        $dao = new GenericoDao();
                        $dao->atualizaSaldo($saldo, $id_banco);
                    }
                    if (LancamentoService::salvar($lancamento, $this->campo, $this->tabela)) {

                        /**
                         * Atualizando o saldo do banco
                         */
                        $id_banco = $lancamento->id_banco;
                        $saldo = Service::getSoma("banco", "saldo", "id_banco", $lancamento->id_banco);
                        $saldo = $saldo - $lancamento->valor;

                        $dao = new GenericoDao();
                        $dao->atualizaSaldo($saldo, $id_banco);
                    }
                }
                if ($lancamento->tipo == "ENTRADA") {
                    /**
                     * Volta o valor
                     */
                    if ($valor_antigo) {
                        $id_banco = $lancamento->id_banco;
                        $saldo = Service::getSoma("banco", "saldo", "id_banco", $lancamento->id_banco);
                        $saldo = $saldo - $valor_antigo;
                        $dao = new GenericoDao();
                        $dao->atualizaSaldo($saldo, $id_banco);
                    }
                    if (LancamentoService::salvar($lancamento, $this->campo, $this->tabela)) {
                        /**
                         * Atualizando o saldo do banco
                         */
                        $id_banco = $lancamento->id_banco;
                        $saldo = Service::getSoma("banco", "saldo", "id_banco", $lancamento->id_banco);
                        $saldo = $saldo + $lancamento->valor;
                        $saldo = floatval($saldo);
                        $dao = new GenericoDao();
                        $dao->atualizaSaldo($saldo, $id_banco);
                    }
                }
            }
        }
        sleep(3);
        $this->redirect(URL_BASE . "lancamento/index");
    }
    public function editar($id)
    {
        $lancamento = Service::get($this->tabela, $this->campo, $id);
        if (!$lancamento) {
            $this->redirect(URL_BASE . "lancamento");
        }
        $dados["banco"] = Service::lista("banco");
        $dados["despesa"] = Service::lista("despesa");
        $dados["lancamento"] = $lancamento;
        $dados["view"] = "lancamento/novo";
        $this->load("template", $dados);
    }
    public function delete($id)
    {
        $lancamento = Service::get($this->tabela, $this->campo, $id);
        $valor = $lancamento->valor;
        $id_banco = $lancamento->id_banco;
        $saldo = Service::getSoma("banco", "saldo", "id_banco", $id_banco);
        if ($lancamento) {
            if ($lancamento->tipo == "ENTRADA") {
                $saldo = $saldo - $valor;
                $dao = new GenericoDao();
                $dao->atualizaSaldo($saldo, $id_banco);
            }
            if ($lancamento->tipo == "SAIDA") {
                $saldo = $saldo + $valor;
                $dao = new GenericoDao();
                $dao->atualizaSaldo($saldo, $id_banco);
            }
            Service::excluir($this->tabela, $this->campo, $id);
            $this->redirect(URL_BASE . "lancamento/index");
        } else {
            $this->redirect(URL_BASE . "lancamento/index");
        }
    }
}
