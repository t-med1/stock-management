<div class="row">
    <div class="col-md-12">
        <div class="box box-default box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Période &nbsp; <small>( Appliqué seulement sur l'<b>Historique</b> )</small></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <form method="get" action="<?=base_url()."index.php/caisse/cheques"?>">
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
        <?php
            $c_0 = count($cheques); $notification_0 = $c_0 > 0 ? '<b>('.$c_0.')</b>' : '';
            $c_1 = count($historique); $notification_1 = $c_1 > 0 ? '<b>('.$c_1.')</b>' : '';
        ?>
        <a href="javascript:;" onclick="switchDivs(1);" class="btn btn_switch btn-default" style="margin-bottom: 5px; min-width:160px; border: 2px solid #cbcfd7;" id="btn_switch_1"><i class="fa fa-fw fa-clock-o"></i>&nbsp; À Encaisser &nbsp; <?=$notification_0?> </a> &nbsp;
        <a href="javascript:;" onclick="switchDivs(2);" class="btn btn_switch btn-default" style="margin-bottom: 5px; min-width:160px; border: 2px solid #cbcfd7;" id="btn_switch_2"><i class="fa fa-fw fa-history"></i>&nbsp; Historique &nbsp; <?=$notification_1?> </a> &nbsp;
    </div>
</div>

<div class="row div_switch" id="div_switch_1" style="display: none;">
    <div class="col-md-12">
        <div class="box box-default box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Chèques à encaisser</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="export_btns_1" style="float: right;margin: 8px 0px 12px 0px;"></div><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table id="myDataTable_1" class="table myDataTable table-bordered table-striped">
                            <thead>
                            <th>Type</th>
                            <th>Commercial</th>
                            <th>Réference</th>
                            <th>Montant</th>
                            <th>Date</th>
                            <th>Client</th>
                            <th>Origine</th>
                            <th class="current-width no-export">Options</th>
                            </thead>
                            <tbody>
                            <?php foreach ($cheques as $val): ?>
                                <tr>
                                    <td><?=getMethodePaiement($val["methode"])?></td>
                                    <td>
                                        <?php
                                            if(!empty($val["utilisateur_p"])) {
                                                echo getUserLabel($val["role_p"], $val["utilisateur_p"]);
                                            }
                                            elseif(!empty($val["utilisateur_a"])) {
                                                echo getUserLabel($val["role_a"], $val["utilisateur_a"]);
                                            }
                                        ?>
                                    </td>
                                    <td><?=$val["reference"]?></td>
                                    <td data-sort="<?=round($val["montant"],2)?>"><strong><?=number_format($val["montant"], 2, ".", " ")?></strong> <small>DH</small></td>
                                    <td data-sort="<?=strtotime($val["date_cheque"])?>"><?=date("d/m/Y", strtotime($val["date_cheque"]))?></td>
                                    <td>
                                        <?php if(!empty($val["id_client_v"])): ?>
                                        <a href="<?=base_url()."index.php/client/details/".$val["id_client_v"]?>"><strong><?=$val["client_v"]?></strong></a>
                                        <?php elseif(!empty($val["id_client_a"])): ?>
                                        <a href="<?=base_url()."index.php/client/details/".$val["id_client_a"]?>"><strong><?=$val["client_a"]?></strong></a>
                                        <?php elseif(!empty($val["id_client_av"])): ?>
                                        <a href="<?=base_url()."index.php/client/details/".$val["id_client_av"]?>"><strong><?=$val["client_av"]?></strong></a>
                                        <?php endif; ?>

                                        <?php if(!empty($val["remarque"])): ?>
                                        <br> ( <?=$val["remarque"]?> )
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if(!empty($val["client_v"])): ?>
                                        <a href="<?=base_url()."index.php/vente/details/".$val["id_vente"]?>"><strong><?=$val["code_vente"]?></strong></a> <br>( Vente )
                                        <?php elseif(!empty($val["client_a"])): ?>
                                        <a href="<?=base_url()."index.php/avoir/details/".$val["id_avoir"]?>"><strong><?=$val["code_avoir"]?></strong></a> <br>( Bon d'Avoir )
                                        <?php elseif(!empty($val["client_av"])): ?> ( Avance ) <?php endif; ?>
                                    </td>
                                    <td class="current-width no-export">
                                        <?php if($val["methode"] == 2 || ($val["methode"] == 3 && strtotime($val["date_cheque"]) <= strtotime(date("Y-m-d")))): ?>
                                            <form method="post" action="<?=base_url()."index.php/caisse/cheques"?>" id="form_<?=$val["id_cheque"]?>" style="display:none;">
                                                <input type="hidden" name="id_cheque" value="<?=$val["id_cheque"]?>">
                                                <input type="hidden" name="code_vente" value="<?=$val["code_vente"]?>">
                                                <input type="hidden" name="code_avoir" value="<?=$val["code_avoir"]?>">
                                                <input type="hidden" name="action" id="action_<?=$val["id_cheque"]?>" value="">
                                                <input type="hidden" name="caisse" id="caisse_<?=$val["id_cheque"]?>" value="">
                                            </form>
                                            <a href="#" onclick="openModalPaiement('<?=$val["id_cheque"]?>', '<?=$val["reference"]?>')" class="btn btn-sm btn-primary rounded" data-toggle="tooltip" data-placement="top" title="Prenez Paiement">
                                                <i class="fa fa-check-circle" aria-hidden="true"></i> &nbsp; Prenez Paiement
                                            </a>
                                            <a href="#" onclick="confirmUnPaid('<?=$val["id_cheque"]?>', '<?=$val["reference"]?>')" class="btn btn-sm btn-warning rounded" data-toggle="tooltip" data-placement="top" title="Annuler">
                                                <i class="fa fa-times-circle" aria-hidden="true"></i> &nbsp; Annuler
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
<div class="row div_switch" id="div_switch_2" style="display: none;">
    <div class="col-md-12">
        <div class="box box-default box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Historique de Chèques</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="export_btns_2" style="float: right;margin: 8px 0px 12px 0px;"></div><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table id="myDataTable_2" class="table myDataTable table-bordered table-striped">
                            <thead>
                            <th>Type</th>
                            <th>Commercial</th>
                            <th>Réference</th>
                            <th>Montant</th>
                            <th>Date</th>
                            <th>Client</th>
                            <th>Origine</th>
                            <th>Status</th>
                            <th class="current-width no-export">Options</th>
                            </thead>
                            <tbody>
                            <?php foreach ($historique as $val): ?>
                                <tr>
                                    <td><?=getMethodePaiement($val["methode"])?></td>
                                    <td>
                                        <?php
                                        if(!empty($val["utilisateur_p"])) {
                                            echo getUserLabel($val["role_p"], $val["utilisateur_p"]);
                                        }
                                        elseif(!empty($val["utilisateur_a"])) {
                                            echo getUserLabel($val["role_a"], $val["utilisateur_a"]);
                                        }
                                        ?>
                                    </td>
                                    <td><?=$val["reference"]?></td>
                                    <td data-sort="<?=round($val["montant"],2)?>"><strong><?=number_format($val["montant"], 2, ".", " ")?></strong> <small>DH</small></td>
                                    <td data-sort="<?=strtotime($val["date_cheque"])?>"><?=date("d/m/Y", strtotime($val["date_cheque"]))?></td>
                                    <td>
                                        <?php if(!empty($val["id_client_v"])): ?>
                                            <a href="<?=base_url()."index.php/client/details/".$val["id_client_v"]?>"><strong><?=$val["client_v"]?></strong></a>
                                        <?php elseif(!empty($val["id_client_a"])): ?>
                                            <a href="<?=base_url()."index.php/client/details/".$val["id_client_a"]?>"><strong><?=$val["client_a"]?></strong></a>
                                        <?php elseif(!empty($val["id_client_av"])): ?>
                                            <a href="<?=base_url()."index.php/client/details/".$val["id_client_av"]?>"><strong><?=$val["client_av"]?></strong></a>
                                        <?php endif; ?>

                                        <?php if(!empty($val["remarque"])): ?>
                                            <br> ( <?=$val["remarque"]?> )
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if(!empty($val["client_v"])): ?>
                                            <a href="<?=base_url()."index.php/vente/details/".$val["id_vente"]?>"><strong><?=$val["code_vente"]?></strong></a> <br>( Vente )
                                        <?php elseif(!empty($val["client_a"])): ?>
                                            <a href="<?=base_url()."index.php/avoir/details/".$val["id_avoir"]?>"><strong><?=$val["code_avoir"]?></strong></a> <br>( Bon d'Avoir )
                                        <?php elseif(!empty($val["client_av"])): ?> ( Avance ) <?php endif; ?>
                                    </td>
                                    <td><?=getChequeStatus($val["paid"],$val["caisse"], true)?></td>
                                    <td class="current-width no-export">
                                        <form method="post" action="<?=base_url()."index.php/caisse/cheques"?>" id="form_<?=$val["id_cheque"]?>" style="display:none;">
                                            <input type="hidden" name="id_cheque" value="<?=$val["id_cheque"]?>">
                                            <input type="hidden" name="code_vente" value="<?=$val["code_vente"]?>">
                                            <input type="hidden" name="code_avoir" value="<?=$val["code_avoir"]?>">
                                            <input type="hidden" name="action" id="action_<?=$val["id_cheque"]?>" value="">
                                        </form>
                                        <a href="#" onclick="confirmInit('<?=$val["id_cheque"]?>', '<?=$val["reference"]?>')" class="btn btn-sm btn-warning rounded" data-toggle="tooltip" data-placement="top" title="Initialiser">
                                            <i class="fa fa-refresh" aria-hidden="true"></i> &nbsp; Initialiser
                                        </a>
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

<div id="modalPaiement" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Prenez Paiement</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <button type="button" id="btnBank" class="btn btn-lg btn-info" style="width: 100%;">
                            <i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;
                            <strong>Vers la Banque</strong>
                        </button>
                    </div>
                    <div class="col-md-5">
                        <button type="button" id="btnCaisse" class="btn btn-lg btn-primary" style="width: 100%;">
                            <i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;
                            <strong>Vers la Caisse</strong>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function ()
    {
        switchDivs(1);

        createDataTable(
            "#myDataTable_1",
            [ 4, "asc" ], // must be asc
            [ [20, 50, 100, -1], [20, 50, 100, "Tous"] ],
            "#export_btns_1",
            "Chèques à encaisser"
        );
        createDataTable(
            "#myDataTable_2",
            [ 4, "desc" ],
            [ [20, 50, 100, -1], [20, 50, 100, "Tous"] ],
            "#export_btns_2",
            "Historique de Chèques"
        );

    });

    function openModalPaiement(id, reference)
    {
        $("#btnBank").attr("onclick", "confirmPaid('"+id+"', '"+reference+"', 0)");
        $("#btnCaisse").attr("onclick", "confirmPaid('"+id+"', '"+reference+"', 1)");
        $("#modalPaiement").modal("show");
    }

    function confirmPaid(id, reference, caisse)
    {
        Swal.fire({
            title: 'Prenez Paiement de chèque/Effet: ' + reference + (caisse == 0 ? " vers la banque" : " vers la caisse"),
            html: "Voulez vous vraiment continuer ?",
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: '#318752',
            cancelButtonColor: '#b9b9b9',
            confirmButtonText: 'Continuer',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.value) {
                $("#action_" + id).val("paid");
                $("#caisse_" + id).val(caisse);
                $("#form_" + id).submit();
            }
        });
    }
    function confirmUnPaid(id, reference)
    {
        Swal.fire({
            title: 'Annuler Paiement de chèque/Effet: ' + reference,
            html: "Voulez vous vraiment continuer ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e17e2e',
            cancelButtonColor: '#b9b9b9',
            confirmButtonText: 'Continuer',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.value) {
                $("#action_" + id).val("unpaid");
                $("#form_" + id).submit();
            }
        });
    }
    function confirmInit(id, reference)
    {
        Swal.fire({
            title: 'Initialisation de chèque/Effet: ' + reference,
            html: "Voulez vous vraiment continuer ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e17e2e',
            cancelButtonColor: '#b9b9b9',
            confirmButtonText: 'Continuer',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.value) {
                $("#action_" + id).val("init");
                $("#form_" + id).submit();
            }
        });
    }

    function switchDivs(id)
    {
        $(".btn_switch").not("#btn_switch_"+id).removeClass("btn-info").addClass("btn-default");
        $(".div_switch").not("#div_switch_"+id).hide(100);

        $("#btn_switch_"+id).removeClass("btn-default").addClass("btn-info");
        $("#div_switch_"+id).show(100);
    }
</script>