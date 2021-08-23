<div class="data-table">
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="card m-b-30">
                <div class="card-body table-responsive">
                    <h5 class="header-title">Lista de Despesas</h5>
                    <div class="table-odd">
                        <table id="datatable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="5%" align="left">Id</th>
                                    <th width="20%" align="left">Despesa</th>
                                    <th width="12%" align="left">Banco</th>
                                    <th width="12%" align="left">Tipo</th>
                                    <th width="12%" align="left">Valor</th>
                                    <th width="12%" align="left">Data</th>
                                    <th width="15%" align="left">Açao</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ((array) $lancamento as $lista) { ?>
                                    <tr>
                                        <td><?php echo $lista->id_lancamento ?></td>
                                        <td><?php echo $lista->despesa ?></td>
                                        <td><?php echo $lista->banco ?></td>
                                        <td><?php echo $lista->tipo ?></td>
                                        <td>R$: <?php echo $lista->valor ?></td>
                                        <td><?php echo databr($lista->data) ?></td>
                                        <td>
                                            <a href="<?php echo URL_BASE . "lancamento/editar/" . $lista->id_lancamento ?>" class="btn btn-outline-verde">Editar</a>
                                            <a href="<?php echo URL_BASE . "lancamento/delete/" . $lista->id_lancamento ?>" class="btn btn-outline-verde">Deletar</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>