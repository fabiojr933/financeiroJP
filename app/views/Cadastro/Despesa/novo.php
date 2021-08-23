<br>
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <h5 class="header-title pb-3">Cadastro de despesas</h5>
                <div class="general-label">
                    <form action="<?php echo URL_BASE . "despesa/salvar" ?>" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nome</label>
                            <input type="text" class="form-control" placeholder="nome da despesa" name="descricao" value="<?php echo isset($despesa->descricao) ? $despesa->descricao : null ?>">
                        </div>
                        <div class="form-group">
                            <label class="cr-styled">
                                <input type="checkbox" name="fixo" <?php echo ($despesa->fixo == "S") ? "checked" : null ?>>
                                <i class="fa"></i>
                                É fixo?
                            </label>
                        </div>
                        <input type="hidden" name="id_despesa" value="<?php echo isset($despesa->id_despesa) ? $despesa->id_despesa : null ?>" />
                        <button type="submit" class="btn btn-primary" id="position">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>