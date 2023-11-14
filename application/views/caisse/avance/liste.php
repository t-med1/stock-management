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
                <form method="get" action="<?=base_url()."index.php/avance"?>">
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
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Historique d'avances de clients</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3">
                        <a href="<?=base_url()?>index.php/avance/ajouter" class="btn btn-primary" style="width:100%;">
                            <i class="fa fa-plus"></i> &nbsp; Nouveau Avance
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="<?=base_url()?>index.php/avance/r_ajouter" class="btn btn-info" style="width:100%;">
                            <i class="fa fa-undo"></i> &nbsp; Nouveau Retour
                        </a>
                    </div>
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
                            <th>Client</th>
                            <th>Montant</th>
                            <th>Mode de Paiement</th>
                            <th>Description</th>
                            <th class="current-width no-export">Options</th>
                            </thead>
                            <tbody>
                            <?php foreach ($avances as $val): ?>
                                <tr>
                                    <td data-sort="<?=strtotime($val["date_avance"])?>"><?=date("d/m/Y", strtotime($val["date_avance"]))?></td>
                                    <td><?=getUserLabel($val["role"], $val["utilisateur"])?></td>
                                    <td><a href="<?=base_url()."index.php/client/details/".$val["id_client"]?>"><strong><?=$val["client"]?></strong></a></td>
                                    <td data-sort="<?=round($val["montant"],2)?>">
                                        <strong><?=number_format($val["montant"],2,'.',' ')?></strong> <small>DH</small>
                                        <br> <span class="text-primary">( Avance )</span>
                                    </td>
                                    <td>
                                        <?=getMethodePaiement($val["methode"])?>
                                        <?php
                                        if($val["methode"] == 2 || $val["methode"] == 3):
                                            $cheque = getPaiementDetails($val["id_avance"], "avance");
                                        ?>
                                            <br> [ <?=$cheque->reference." &nbsp-&nbsp ".date("d/m/Y", strtotime($cheque->date_cheque))?> ]
                                            <?=getChequeStatus($cheque->paid)?>
                                        <?php endif; ?>
                                    </td>
                                    <td><?=$val["description"]?></td>
                                    <td class="current-width no-export">
                                        <a href="<?=base_url()."index.php/avance/modifier/".$val["id_avance"];?>" class="btn btn-success rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Modifier">
                                            <i class="fa fa-wrench" aria-hidden="true"></i>
                                        </a>
                                        <?php if($this->session->userdata("role_user") == 1): ?>
                                            <form method="post" action="<?=base_url()."index.php/avance/supprimer/"?>" id="form_<?=$val["id_avance"]?>" style="display:none;">
                                                <input type="hidden" name="id_avance" value="<?=$val["id_avance"]?>">
                                            </form>
                                            <a href="#" onclick="confirmDelete('<?="form_".$val["id_avance"]?>')" class="btn btn-danger btn-sm rounded" data-toggle="tooltip" data-placement="top" title="Supprimer">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php foreach ($avances_retours as $val): ?>
                                <tr>
                                    <td data-sort="<?=strtotime($val["date_retour"])?>"><?=date("d/m/Y", strtotime($val["date_retour"]))?></td>
                                    <td><?=getUserLabel($val["role"], $val["utilisateur"])?></td>
                                    <td><a href="<?=base_url()."index.php/client/details/".$val["id_client"]?>"><strong><?=$val["client"]?></strong></a></td>
                                    <td data-sort="<?=round($val["montant"],2)?>">
                                        <strong><?=number_format($val["montant"],2,'.',' ')?></strong> <small>DH</small>
                                        <br> <span class="text-info">( Retour d'Avance )</span>
                                    </td>
                                    <td>
                                        <?=getMethodePaiement($val["methode"], $val["type_avance"])?>
                                        
                                        <?php
                                        if($val["methode"] == 2 || $val["methode"] == 3):
                                            $cheque = getPaiementDetails($val["id_avance_retour"], "avance_retour");
                                        ?>
                                            <br> [ <?=$cheque->reference." &nbsp-&nbsp ".date("d/m/Y", strtotime($cheque->date_cheque))?> ]
                                        <?php endif; ?>
                                    </td>
                                    <td><?=$val["description"]?></td>
                                    <td class="current-width no-export">
                                        <a href="<?=base_url()."index.php/avance/r_modifier/".$val["id_avance_retour"];?>" class="btn btn-success rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Modifier">
                                            <i class="fa fa-wrench" aria-hidden="true"></i>
                                        </a>
                                        <?php if($this->session->userdata("role_user") == 1): ?>
                                            <form method="post" action="<?=base_url()."index.php/avance/r_supprimer/"?>" id="form_<?=$val["id_avance_retour"]?>" style="display:none;">
                                                <input type="hidden" name="id_avance_retour" value="<?=$val["id_avance_retour"]?>">
                                            </form>
                                            <a href="#" onclick="confirmDelete('<?="form_".$val["id_avance_retour"]?>')" class="btn btn-danger btn-sm rounded" data-toggle="tooltip" data-placement="top" title="Supprimer">
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