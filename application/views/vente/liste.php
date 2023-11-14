<div class="row">
    <div class="col-md-12">
        <div class="box box-default box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Période</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <form method="get" action="<?= base_url()."index.php/vente" ?>">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Entre Le :</label>
                                <input type="date" class="form-control" name="date_debut" value="<?= $date_debut ?>" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Et Le :</label>
                                <input type="date" class="form-control" name="date_fin" value="<?= $date_fin ?>" required>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <button class="btn btn-primary" style="width:100%">
                                <i class="fa fa-search"></i> &nbsp; Filtrer
                            </button>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box box-default box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Liste de Ventes</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="export_btns" style="float: right;margin: 8px 0px 12px 0px;"></div><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table id="myDataTable" class="table myDataTable table-bordered table-striped">
                            <thead>
                                <th>N° de BL</th>
                                <th>Commercial</th>
                                <th>Client</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Reste à payer</th>
                                <th>Options</th>
                            </thead>
                            <tbody>
                            <?php foreach ($ventes as $vente): ?>
                                <?php
                                   $venteTotals = getVenteTotal($vente['id_vente']);
                                   $total_vente = isset($venteTotals["total_vente"]) ? $venteTotals["total_vente"] : 0;
                                   $total_reste = isset($venteTotals["total_reste"]) ? $venteTotals["total_reste"] : 0;
                                   
                                    $color = $total_reste > 0 ? "text-danger" : "";
                                    $icon = $total_reste < 0 ? ' &nbsp; <i class="fa fa-warning text-red"></i>' : '';
                                    ?>
                                <tr>
                                    <td><?= $vente['code_vente'] ?></td>
                                    <td><?= getUserLabel($vente["role"], $vente["utilisateur"]) ?></td>
                                    <td><a href="<?= base_url()."index.php/client/details/".$vente["id_client"] ?>"><strong><?= $vente["client"] ?></strong></a></td>
                                    <td><?= $vente['date_vente'] ?></td>
                                    <td data-sort="<?= round($total_vente, 2) ?>">
                                        <strong><?= number_format($total_vente, 2, '.', ' ') ?></strong> <small>DH</small>
                                    </td>
                                    <td data-sort="<?= round($total_reste, 2) ?>">
                                        <strong class="<?= $color ?>">
                                            <?= number_format($total_reste, 2, '.', ' ') ?>
                                        </strong>
                                        <small>DH</small>
                                        <?= $icon ?>
                                    </td>
                                    <td class="current-width no-export">
                                        <a href="<?= base_url()."index.php/vente/details/".$vente["id_vente"] ?>" class="btn btn-primary rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Détails">
                                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                                        </a>
                                        
                                        <a href="<?= base_url()."index.php/vente/bon_livraison/".$vente["id_vente"] ?>" target="_blank" class="btn btn-warning rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Imprimer">
                                            <i class="fa fa-print" aria-hidden="true"></i>
                                        </a>
                                        
                                        <a href="<?= base_url()."index.php/vente/modifier/".$vente["id_vente"] ?>" class="btn btn-success rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Modifier">
                                            <i class="fa fa-wrench" aria-hidden="true"></i>
                                        </a>
                                        
                                        <?php if($this->session->userdata("role_user") == 1): ?>
                                            <form method="post" action="<?= base_url()."index.php/vente/supprimer/" ?>" id="form_<?= $vente["id_vente"] ?>" style="display:none;">
                                                <input type="hidden" name="id_vente" value="<?= $vente["id_vente"] ?>">
                                            </form>
                                            <a href="#" onclick="confirmDelete('<?="form_".$vente["id_vente"]?>')" class="btn btn-danger btn-sm rounded" data-toggle="tooltip" data-placement="top" title="Supprimer">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="box box-default box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Liste de Ventes Gratuites</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="export_btns" style="float: right;margin: 8px 0px 12px 0px;"></div><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table id="myDataTable" class="table myDataTable table-bordered table-striped">
                            <thead>
                                <th>N° de BL</th>
                                <th>Commercial</th>
                                <th>Client</th>
                                <th>Date</th>
                                <th>Options</th>
                            </thead>
                            <tbody>
                            <?php foreach ($ventes as $vente): ?>
                                <?php
                                   $venteTotals = getVenteTotal($vente['id_vente']);
                                   $total_vente = isset($venteTotals["total_vente"]) ? $venteTotals["total_vente"] : 0;
                                   $total_reste = isset($venteTotals["total_reste"]) ? $venteTotals["total_reste"] : 0;
                                   
                                    $color = $total_reste > 0 ? "text-danger" : "";
                                    $icon = $total_reste < 0 ? ' &nbsp; <i class="fa fa-warning text-red"></i>' : '';
                                    ?>
                                <?php if( $vente['normal'] == 0 ):?>
                                <tr>
                                    <td><?= $vente['code_vente'] ?></td>
                                    <td><?= getUserLabel($vente["role"], $vente["utilisateur"]) ?></td>
                                    <td><a href="<?= base_url()."index.php/client/details/".$vente["id_client"] ?>"><strong><?= $vente["client"] ?></strong></a></td>
                                    <td><?= $vente['date_vente'] ?></td>
                                   
                                    <td class="current-width no-export">
                                        <a href="<?= base_url()."index.php/vente/details/".$vente["id_vente"] ?>" class="btn btn-primary rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Détails">
                                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                                        </a>
                                        
                                        <a href="<?= base_url()."index.php/vente/bon_livraison/".$vente["id_vente"] ?>" target="_blank" class="btn btn-warning rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Imprimer">
                                            <i class="fa fa-print" aria-hidden="true"></i>
                                        </a>
                                        
                                        <a href="<?= base_url()."index.php/vente/modifier/".$vente["id_vente"] ?>" class="btn btn-success rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Modifier">
                                            <i class="fa fa-wrench" aria-hidden="true"></i>
                                        </a>
                                        
                                        <?php if($this->session->userdata("role_user") == 1): ?>
                                            <form method="post" action="<?= base_url()."index.php/vente/supprimer/" ?>" id="form_<?= $vente["id_vente"] ?>" style="display:none;">
                                                <input type="hidden" name="id_vente" value="<?= $vente["id_vente"] ?>">
                                            </form>
                                            <a href="#" onclick="confirmDelete('<?="form_".$vente["id_vente"]?>')" class="btn btn-danger btn-sm rounded" data-toggle="tooltip" data-placement="top" title="Supprimer">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endif;?>
                            <?php endforeach; ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        createDataTable(
            "#myDataTable",
            [[3, "desc"], [0, "desc"]],
            [[20, 50, 100, -1], [20, 50, 100, "Tous"]],
            "#export_btns"
        );
    });
</script>
