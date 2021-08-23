<br>
<form action="<?php echo URL_BASE . "Lancamento/salvar" ?>" method="POST">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h5 class="header-title pb-3">Novo Lancamento</h5>
                    <div class="general-label">

                        <div class="row">
                            <div class="col-sm-6">
                                <label>Tipo</label>
                                <select class="form-control" name="tipo">
                                    <option value="SAIDA" <?php echo $lancamento->tipo == "SAIDA" ? "selected" : null ?>>Saida</option>
                                    <option value="ENTRADA" <?php echo $lancamento->tipo == "ENTRADA" ? "selected" : null ?>>Entrada</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label>Banco</label>
                                <select class="form-control" name="banco">
                                    <?php foreach ($banco as $listaBanco) { ?>
                                        <option value="<?php echo $listaBanco->id_banco ?>" <?php echo $listaBanco->id_banco == $lancamento->id_banco ? "selected" : null ?>><?php echo $listaBanco->banco ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Despesa</label>
                                <select class="form-control" name="despesa">
                                    <?php foreach ($despesa as $listaDespesa) { ?>
                                        <option value="<?php echo $listaDespesa->id_despesa ?>" <?php echo $listaDespesa->id_despesa == $lancamento->id_despesa ? "selected" : null ?>><?php echo $listaDespesa->descricao ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label>Data</label>
                                <input class="form-control" type="date" id="example-date-input" name="data" value="<?php echo isset($lancamento->data) ? $lancamento->data : null ?>">
                            </div>
                        </div><br>



                        <div class="row">
                            <div class="col-sm-6">
                                <label for="">Valor</label>
                                <input type="hidden" name="tipo_antigo" value="<?php echo isset($lancamento->tipo) ? $lancamento->tipo : null ?>" />
                                <input type="hidden" name="valor_antigo" value="<?php echo isset($lancamento->valor) ? $lancamento->valor : null ?>" />
                                <input type="text" class="form-control" placeholder="Digite o Valor" name="valor" value="<?php echo isset($lancamento->valor) ? $lancamento->valor : null ?>">
                            </div>
                            <div class="col-sm-6">
                                <label for="">Observacao</label>
                                <input type="text" class="form-control" placeholder="Observacao" name="obs" value="<?php echo isset($lancamento->observacao) ? $lancamento->observacao : null ?>">
                            </div>
                        </div><br>


                    </div>
                    <input type="hidden" name="id_lancamento" value="<?php echo isset($lancamento->id_lancamento) ? $lancamento->id_lancamento : null ?>" />
                    <button type="submit" class="btn btn-primary" id="position">Salvar</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>