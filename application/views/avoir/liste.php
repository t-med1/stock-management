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
                <form method="get" action="<?=base_url()."index.php/avoir"?>">
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
                <h3 class="box-title">Liste de Bons d'Avoir</h3>
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
                            <th>N° de BA</th>
                            <th>Commercial</th>
                            <th>Client</th>
                            <th>Vente</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Reste</th>
                            <th class="current-width no-export">Options</th>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($avoirs as $val):
                                    $total = getAvoirTotal($val["id_avoir"]);
                            ?>
                                <tr>
                                    <td><?=$val["code_avoir"]?></td>
                                    <td><?=getUserLabel($val["role"], $val["utilisateur"])?></td>
                                    <td><a href="<?=base_url()."index.php/client/details/".$val["id_client"]?>"><strong><?=$val["client"]?></strong></a></td>
                                    <td>
                                        <?php if(!empty($val["id_vente"])): ?>
                                            <a href="<?=base_url()?>index.php/vente/details/<?=$val["id_vente"]?>"><strong><?=$this->db->where("id_vente", $val["id_vente"])->get("vente")->row()->code_vente?></strong></a>
                                        <?php else: ?>
                                            <i class="fa fa-times text-warning"></i>
                                        <?php endif; ?>
                                    </td>
                                    <td data-sort="<?=strtotime($val["date_avoir"])?>"><?=date("d/m/Y", strtotime($val["date_avoir"]))?></td>
                                    <td data-sort="<?=round($total["total_avoir"],2)?>"><strong><?=number_format($total["total_avoir"],2,'.','')?></strong> <small>DH</small></td>
                                    <?php
                                    $color = $total["total_reste"] > 0 ? "text-danger" : "";
                                    ?>
                                    <td data-sort="<?=round($total["total_reste"],2)?>">
                                        <strong class="<?=$color?>"><?=number_format($total["total_reste"],2,'.','')?></strong> <small>DH</small>
                                    </td>
                                    <td class="current-width no-export">
                                        <a href="<?=base_url()."index.php/avoir/details/".$val["id_avoir"]?>" class="btn btn-primary rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Détails">
                                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                                        </a>
                                        <a href="<?=base_url()."index.php/avoir/bon_avoir/".$val["id_avoir"]?>" target="_blank" class="btn btn-warning rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Imprimer">
                                            <i class="fa fa-print" aria-hidden="true"></i>
                                        </a>
                                        <a href="<?=base_url()."index.php/avoir/modifier/".$val["id_avoir"];?>" class="btn btn-success rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Modifier">
                                            <i class="fa fa-wrench" aria-hidden="true"></i>
                                        </a>
                                        <?php if($this->session->userdata("role_user") == 1): ?>
                                            <form method="post" action="<?=base_url()."index.php/avoir/supprimer/"?>" id="form_<?=$val["id_avoir"]?>" style="display:none;">
                                                <input type="hidden" name="id_avoir" value="<?=$val["id_avoir"]?>">
                                            </form>
                                            <a href="#" onclick="confirmDelete('<?="form_".$val["id_avoir"]?>')" class="btn btn-danger btn-sm rounded" data-toggle="tooltip" data-placement="top" title="Supprimer">
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
            [ [ 4, "desc" ], [ 0, "desc" ] ],
            [ [20, 50, 100, -1], [20, 50, 100, "Tous"] ],
            "#export_btns"
        );

    });
</script>