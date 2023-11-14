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
                <form method="get" action="<?=base_url()."index.php/inventaire"?>">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Entre Le :</label>
                                <input type="date" class="form-control" name="date_debut" value="<?=date("Y-m-d", strtotime($date_debut))?>" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Et Le :</label>
                                <input type="date" class="form-control" name="date_fin" value="<?=date("Y-m-d", strtotime($date_fin))?>" required>
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
                <h3 class="box-title">Historique d'Inventaires</h3>
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
                            <th>Date</th>
                            <th>Remarque</th>
                            <th>Statut</th>
                            <th class="current-width no-export">Options</th>
                            </thead>
                            <tbody>
                            <?php foreach ($inventaires as $val): ?>
                                <tr>
                                    <td><?=$val["code_inventaire"]?></td>
                                    <td><?=getUserLabel($val["role"], $val["utilisateur"])?></td>
                                    <td data-sort="<?=strtotime($val["date_inventaire"])?>"><?=date("d/m/Y", strtotime($val["date_inventaire"]))?></td>
                                    <td><?=$val["remarque"]?></td>
                                    <td>
                                        <?php if($val["valide"] == 1): ?>
                                            <span class="label label-success" data-toggle="tooltip" data-placement="top" title="Valide">Validé</span>
                                        <?php else: ?>
                                            <span class="label label-danger" data-toggle="tooltip" data-placement="top" title="En cours ...">En cours ...</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="current-width no-export">
                                        <?php if($val["valide"] == 1): ?>
                                            <a href="<?=base_url()."index.php/inventaire/details/".$val["id_inventaire"]?>" class="btn btn-primary rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Détails">
                                                <i class="fa fa-list-alt" aria-hidden="true"></i>
                                            </a>
                                        <?php else: ?>
                                            <a href="<?=base_url()."index.php/inventaire/nouveau";?>" class="btn btn-success rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Modifier">
                                                <i class="fa fa-wrench" aria-hidden="true"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if($this->session->userdata("role_user") == 1): ?>
                                            <form method="post" action="<?=base_url()."index.php/inventaire/supprimer/"?>" id="form_<?=$val["id_inventaire"]?>" style="display:none;">
                                                <input type="hidden" name="id_inventaire" value="<?=$val["id_inventaire"]?>">
                                            </form>
                                            <a href="#" onclick="confirmDelete('<?="form_".$val["id_inventaire"]?>')" class="btn btn-danger btn-sm rounded" data-toggle="tooltip" data-placement="top" title="Supprimer">
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

<script type="text/javascript">
    $(document).ready(function () {

        createDataTable(
            "#myDataTable",
            [ [ 2, "desc" ], [ 0, "desc" ] ],
            [ [20, 50, 100, -1], [20, 50, 100, "Tous"] ],
            "#export_btns"
        );
        
    });
</script>