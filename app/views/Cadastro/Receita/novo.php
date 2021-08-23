<br>
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <h5 class="header-title pb-3">Cadastro de receita</h5>
                <div class="general-label">
                    <form action="<?php echo URL_BASE . "receita/salvar" ?>" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nome</label>
                            <input type="text" class="form-control" placeholder="nome da despesa" name="descricao" value="<?php echo isset($receita->descricao) ? $receita->descricao : null ?>">
                        </div>
                        <input type="hidden" name="id_receita" value="<?php echo isset($receita->id_receita) ? $receita->id_receita : null ?>" />
                        <button type="submit" class="btn btn-primary" id="position">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>