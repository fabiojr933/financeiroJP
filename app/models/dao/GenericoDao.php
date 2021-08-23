<?php

namespace app\models\dao;

use app\core\Model;

class GenericoDao extends Model
{
    public function atualizaSaldo($valor, $id_banco)
    {
        $valor = floatval($valor);
        $sql = "UPDATE BANCO SET SALDO = $valor
                WHERE ID_BANCO = $id_banco";

        $qry = $this->db->query($sql);
        $qry->execute();
    }
    public function listaAll()
    {
        $sql = "SELECT LAN.id_lancamento, BAN.id_banco, DES.descricao AS despesa, ban.banco,  DES.id_despesa, LAN.tipo, LAN.data, LAN.valor
                    FROM lancamento LAN
                    JOIN despesa DES ON LAN.id_despesa = DES.id_despesa
                    JOIN banco BAN ON LAN.id_banco = BAN.id_banco";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_OBJ);
    }
    public function EntradaSaidaMes()
    {
        $sql = "SELECT a.tipo, SUM(a.valor) as valor, EXTRACT(YEAR_MONTH FROM a.data) as mes
                    FROM lancamento a
                    WHERE a.data >= LAST_DAY(CURDATE()) + INTERVAL 1 DAY - INTERVAL 13 MONTH
                    AND a.data <  LAST_DAY(CURDATE()) + INTERVAL 1 DAY - INTERVAL 1 MONTH
                    group by 1,3";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_OBJ);
    }
}
