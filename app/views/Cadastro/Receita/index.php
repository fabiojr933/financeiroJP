<div class="data-table">
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="card m-b-30">
                <div class="card-body table-responsive">
                    <h5 class="header-title">Lista de receita</h5>
                    <div class="table-odd">
                        <table id="datatable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="5%" align="left">Id</th>
                                    <th width="60%" align="left">Descrição</th>
                                    <th width="15%" align="left">Açao</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ((array) $receita as $lista) { ?>
                                    <tr>
                                        <td><?php echo $lista->id_receita ?></td>
                                        <td><?php echo $lista->descricao ?></td>

                                        <td>
                                            <a href="<?php echo URL_BASE . "receita/editar/" . $lista->id_receita ?>" class="btn btn-outline-verde">Editar</a>
                                            <a href="<?php echo URL_BASE . "receita/delete/" . $lista->id_receita ?>" class="btn btn-outline-verde">Deletar</a>
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