<br>
<form action="<?php echo URL_BASE . "conta/salvar" ?>" method="POST">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h5 class="header-title pb-3">Cadastro de despesas</h5>
                    <div class="general-label">

                        <div class="row">
                            <div class="col-sm-6">
                                <label for="">Banco</label>
                                <select class="form-control" name="banco">
                                    <option value="Brasil" <?php echo $banco->banco == "Brasil" ? "selected" : null ?>>Brasil</option>
                                    <option value="Bradesco" <?php echo $banco->banco == "Bradesco" ? "selected" : null ?>>Bradesco</option>
                                    <option value="Caixa" <?php echo $banco->banco == "Caixa" ? "selected" : null ?>>Caixa</option>
                                    <option value="Nubank" <?php echo $banco->banco == "Nubank" ? "selected" : null ?>>Nubank</option>
                                    <option value="Sicred" <?php echo $banco->banco == "Sicred" ? "selected" : null ?>>Sicred</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Agencia</label>
                                <input type="text" class="form-control" placeholder="Agencia" name="agencia" value="<?php echo isset($banco->agencia) ? $banco->agencia : null ?>">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <label for="">Conta</label>
                                <input type="text" class="form-control" placeholder="Conta" name="conta" value="<?php echo isset($banco->conta) ? $banco->conta : null ?>">
                            </div>
                            <div class="col">
                                <label for="">Saldo</label>
                                <input type="text" class="form-control" placeholder="Saldo" name="saldo" value="<?php echo isset($banco->saldo) ? $banco->saldo : null ?>">
                            </div>
                        </div><br>
                    </div>
                    <input type="hidden" name="id_banco" value="<?php echo isset($banco->id_banco) ? $banco->id_banco : null ?>" />
                    <button type="submit" class="btn btn-primary" id="position">Salvar</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>


<div class="button-list">
    <button type="button" class="btn btn-primary" id="sa-title">Salvar</button>
</div>