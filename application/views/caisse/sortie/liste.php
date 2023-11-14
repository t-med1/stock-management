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
                <form method="get" action="<?=base_url()."index.php/caisse/sortie"?>">
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
        <div class="box box-danger box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Historique de sorties de caisse</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3">
                        <a href="<?=base_url()?>index.php/caisse/sortie_ajouter" class="btn btn-primary" style="width:100%;">
                            <i class="fa fa-plus"></i> &nbsp; Nouveau
                        </a>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div id="export_btns" style="float: right;margin: 8px 0px 12px 0px;"></div><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table id="myDataTable" class="table myDataTable table-bordered table-striped">
                            <thead>
                            <th>Date</th>
                            <th>Commercial</th>
                            <th>Description</th>
                            <th>Montant</th>
                            <th class="current-width no-export">Options</th>
                            </thead>
                            <tbody>
                            <?php foreach ($sorties as $val): ?>
                                <tr>
                                    <td data-sort="<?=strtotime($val["date_sortie"])?>"><?=date("d/m/Y", strtotime($val["date_sortie"]))?></td>
                                    <td><?=getUserLabel($val["role"], $val["utilisateur"])?></td>
                                    <td><?=$val["description"]?></td>
                                    <td data-sort="<?=round($val["montant"],2)?>"><strong><?=number_format($val["montant"],2,'.','')?></strong> <small>DH</small></td>
                                    <td class="current-width no-export">
                                        <a href="<?=base_url()."index.php/caisse/sortie_modifier/".$val["id_caisse_sortie"];?>" class="btn btn-success rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Modifier">
                                            <i class="fa fa-wrench" aria-hidden="true"></i>
                                        </a>
                                        <?php if($this->session->userdata("role_user") == 1): ?>
                                            <form method="post" action="<?=base_url()."index.php/caisse/sortie_supprimer/"?>" id="form_<?=$val["id_caisse_sortie"]?>" style="display:none;">
                                                <input type="hidden" name="id_caisse_sortie" value="<?=$val["id_caisse_sortie"]?>">
                                            </form>
                                            <a href="#" onclick="confirmDelete('<?="form_".$val["id_caisse_sortie"]?>')" class="btn btn-danger btn-sm rounded" data-toggle="tooltip" data-placement="top" title="Supprimer">
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
            [ 0, "desc" ],
            [ [20, 50, 100, -1], [20, 50, 100, "Tous"] ],
            "#export_btns"
        );

    });
</script>