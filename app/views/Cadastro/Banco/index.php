<div class="data-table">
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="card m-b-30">
                <div class="card-body table-responsive">
                    <h5 class="header-title">DEFAULT EXAMPLE</h5>
                    <div class="table-odd">
                        <table id="datatable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="5%" align="left">Id</th>
                                    <th width="35%" align="left">Banco</th>
                                    <th width="12%" align="left">Agencia</th>
                                    <th width="12%" align="left">Conta</th>
                                    <th width="12%" align="left">Saldo</th>
                                    <th width="15%" align="left">Açao</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ((array) $banco as $lista) { ?>
                                    <tr>
                                        <td><?php echo $lista->id_banco ?></td>
                                        <td><?php echo $lista->banco ?></td>
                                        <td><?php echo $lista->agencia ?></td>
                                        <td><?php echo $lista->conta ?></td>
                                        <td> R$: <?php echo $lista->saldo ?></td>

                                        <td>
                                            <a href="<?php echo URL_BASE . "conta/editar/" . $lista->id_banco ?>" class="btn btn-outline-verde">Editar</a>
                                            <a href="<?php echo URL_BASE . "conta/delete/" . $lista->id_banco ?>" class="btn btn-outline-verde">Deletar</a>
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
    <!--end row-->
</div>