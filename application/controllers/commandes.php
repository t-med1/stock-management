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
                <form method="get" action="<?= base_url() ?>index.php/admin/commande">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Entre Le :</label>
                                <input type="date" class="form-control" name="date_debut" value="<?=date("Y-m-d", strtotime($dateDebut))?>"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Et Le :</label>
                                <input type="date" class="form-control" name="date_fin" value="<?=date("Y-m-d", strtotime($dateFin))?>"
                                    required>
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
                <h3 class="box-title">Liste de Commandes En Cours</h3>
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

                                <th>Code</th>

                                <th>Commercial</th>

                                <th>Client</th>

                                <th>Date</th>

                                <th>Produits</th>

                                <th>Vente</th>

                                <th class="current-width no-export">Options</th>

                            </thead>

                            <tbody>

                                <?php foreach ($clients_cmds as $val): ?>

                                    <?php if (empty($val["id_vente"])): ?>
                                        <tr <?php if ($val['annuler'] == 0): ?> class="disabled-row" <?php endif; ?> >

                                            <td>
                                                <?= $val["code_client_cmd"] ?>
                                            </td>

                                            <td>
                                                <?= getUserLabel($val["role"], $val["utilisateur"]) ?>
                                            </td>

                                            <td><a href="<?= base_url() . "index.php/client/details/" . $val["id_client"] ?>"><strong>
                                                        <?= $val["client"] ?>
                                                    </strong></a></td>

                                            <td data-sort="<?= strtotime($val["date_client_cmd"]) ?>"><?= date("d/m/Y", strtotime($val["date_client_cmd"])) ?></td>

                                            <td>
                                                <?= $val["produits"] ?>
                                            </td>

                                            <td>

                                                <?php if (empty($val["id_vente"])): ?>

                                                    <i class="fa fa-times text-warning"></i>

                                                <?php endif; ?>

                                            </td>

                                            <td class="current-width no-export">

                                                <a href="<?= base_url() . "index.php/client_cmd/details/" . $val["id_client_cmd"] ?>"
                                                    class="btn btn-primary rounded btn-sm" data-toggle="tooltip"
                                                    data-placement="top" title="Détails">

                                                    <i class="fa fa-list-alt" aria-hidden="true"></i>

                                                </a>

                                                <a href="<?= base_url() . "index.php/client_cmd/bon_commande/" . $val["id_client_cmd"] ?>"
                                                    target="_blank" class="btn btn-warning rounded btn-sm" data-toggle="tooltip"
                                                    data-placement="top" title="Imprimer">

                                                    <i class="fa fa-print" aria-hidden="true"></i>

                                                </a>

                                                <a href="<?= base_url() . "index.php/client_cmd/modifier/" . $val["id_client_cmd"]; ?>"
                                                    class="btn btn-success rounded btn-sm" data-toggle="tooltip"
                                                    data-placement="top" title="Modifier">

                                                    <i class="fa fa-wrench" aria-hidden="true"></i>

                                                </a>

                                                <?php if ($this->session->userdata("role_user") == 1): ?>

                                                    <a href="<?= base_url() . "index.php/Admin/annuler/" . $val["id_client_cmd"]; ?>"
                                                        class="btn btn-info rounded btn-sm" data-toggle="tooltip"
                                                        data-placement="top" title="Annuler">

                                                        <i class="fa fa-ban" aria-hidden="true"></i>
                                                        
                                                    </a>

                                                <?php endif; ?>

                                            </td>
                                        </tr>
                                    <?php endif; ?>

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
                <h3 class="box-title">Liste de Commandes Validées</h3>
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

                                <th>Code</th>

                                <th>Commercial</th>

                                <th>Client</th>

                                <th>Date</th>

                                <th>Produits</th>

                                <th>Vente</th>

                                <th class="current-width no-export">Options</th>

                            </thead>

                            <tbody>

                                <?php foreach ($clients_cmds as $val): ?>

                                    <?php if (!empty($val["id_vente"])): ?>
                                        <tr>

                                            <td>
                                                <?= $val["code_client_cmd"] ?>
                                            </td>

                                            <td>
                                                <?= getUserLabel($val["role"], $val["utilisateur"]) ?>
                                            </td>

                                            <td><a href="<?= base_url() . "index.php/client/details/" . $val["id_client"] ?>"><strong>
                                                        <?= $val["client"] ?>
                                                    </strong></a></td>

                                            <td data-sort="<?= strtotime($val["date_client_cmd"]) ?>"><?= date("d/m/Y", strtotime($val["date_client_cmd"])) ?></td>

                                            <td>
                                                <?= $val["produits"] ?>
                                            </td>

                                            <td>

                                                <?php if (!empty($val["id_vente"])): ?>

                                                    <a href="<?=base_url()?>index.php/vente/details/<?=$val["id_vente"]?>"><strong><?=$val["code_vente"]?></strong></a>

                                                <?php endif; ?>

                                            </td>

                                            <td class="current-width no-export">

                                        <a href="<?=base_url()."index.php/client_cmd/details/".$val["id_client_cmd"]?>" class="btn btn-primary rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Détails">

                                            <i class="fa fa-list-alt" aria-hidden="true"></i>

                                        </a>

                                        <a href="<?=base_url()."index.php/client_cmd/bon_commande/".$val["id_client_cmd"]?>" target="_blank" class="btn btn-warning rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Imprimer">

                                            <i class="fa fa-print" aria-hidden="true"></i>

                                        </a>

                                        <a href="<?=base_url()."index.php/client_cmd/modifier/".$val["id_client_cmd"];?>" class="btn btn-success rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Modifier">

                                            <i class="fa fa-wrench" aria-hidden="true"></i>

                                        </a>

                                        <?php if($this->session->userdata("role_user") == 1): ?>

                                            <form method="post" action="<?=base_url()."index.php/client_cmd/supprimer/"?>" id="form_<?=$val["id_client_cmd"]?>" style="display:none;">

                                                <input type="hidden" name="id_client_cmd" value="<?=$val["id_client_cmd"]?>">

                                            </form>

                                            <a href="#" onclick="confirmDelete(<?='form_'.$val['id_client_cmd']?>)" class="btn btn-danger btn-sm rounded" data-toggle="tooltip" data-placement="top" title="Supprimer">

                                                <i class="fa fa-trash" aria-hidden="true"></i>

                                            </a>

                                        <?php endif; ?>

                                    </td>
                                        </tr>
                                    <?php endif; ?>

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
                <h3 class="box-title">Liste de Commandes Annuler</h3>
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
                        <table id="myDataTable" class="table myDataTable table-bordered table-striped clientsTable">
                            <thead>
                                <th>#</th>
                                <th>Num Commande</th>
                                <th>Nom Client</th>
                                <th>Nom Produit</th>
                                <th>Prix D'achat</th>
                                <th class="current-width no-export no-sort">Options</th>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-md-6">

        <div class="callout callout-info"
            style="margin-bottom: 0px; background-color: #3d9dcd !important; border-color: #1f6e87; !important;">

            <!-- code 1 -->

            <p>Nombre de Commandes En cours d'Aujourd'hui :</p>

            <h4 style="margin: 10px 0px 5px 0px;">
                <span id="nbr_ventes_today">
                    <!-- code 2 -->
                </span>
                <small style="color: white;">DH</small>
            </h4>


        </div>

    </div>

    <div class="col-md-6">

        <div class="callout callout-info"
            style="margin-bottom: 0px; background-color: #3dbc7b !important; border-color: #318752; !important;">
            <!-- code 3 -->
            <p>Nombre de Commandes Validées d'Aujourd'hui :</p>

            <h4 style="margin: 10px 0px 5px 0px;">
                <span id="ca_ttc_today">
                    <!-- code 4 -->
                </span>
                <small style="color: white;">DH</small>
            </h4>

        </div>

    </div>

</div>