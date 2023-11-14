<div class="row">
    <div class="col-md-4">
        <div class="box box-default box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Vente</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12" style="overflow-x: auto;">
                        <?php
                            $total = getVenteTotal($vente->id_vente);
                        ?>
                        <table class="table">
                            <thead>
                            <tr>
                                <th colspan="3" style="text-align: center; font-size: 2.5rem;"><a href="<?=base_url()."index.php/vente/details/".$vente->id_vente?>"><?=$vente->code_vente?></a></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="current-width">Commercial</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><?=getUserLabel($vente->role, $vente->utilisateur)?></td>
                            </tr>
                            <tr>
                                <td class="current-width">Client</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><a href="<?=base_url()."index.php/client/details/".$vente->id_client?>"><?=$vente->client?></a></strong></td>
                            </tr>
                            <?php
                                $avance = 0;
                                if(_ENABLE_AVANCE_ && $vente->id_client != 1):
                                    $avance = getAvanceTotal($vente->id_client);
                                    if($avance > 0):
                            ?>
                            <tr class="warning">
                                <td class="current-width">Avance</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=number_format($avance["total_avance"], 2, ".", " ")?></strong> <small>DH</small></td>
                            </tr>
                            <?php endif; endif; ?>
                            <tr>
                                <td class="current-width">Date Vente</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=date("d/m/Y", strtotime($vente->date_vente))?></strong></td>
                            </tr>
                            <tr>
                                <td class="current-width">Ticket</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><a href="<?=base_url()?>index.php/vente/ticket/<?=$vente->id_vente?>" target="_blank" class="btn btn-warning btn-xs" style="width: 100%;"><i class="fa fa-print"></i>&nbsp; Imprimer</a></strong></td>
                            </tr>
                            <tr>
                                <td class="current-width">Remarque</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=nl2br($vente->remarque)?></strong></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ajouter Paiement </h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <form method="post" action="<?=base_url()."index.php/vente/paiement/".$vente->id_vente?>">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="id_vente" value="<?=$vente->id_vente?>">
                                    <table class="table table-bordered" style="margin-bottom: 0px;">
                                        <tbody>
                                        <tr>
                                            <th class="current-width" style="vertical-align: middle;">Total <small>(DH)</small></th>
                                            <td><input type="number" step="any" value="<?=number_format($total["total_vente"],2,'.','')?>" id="vente_total" class="form-control" readonly></td>
                                        </tr>
                                        <tr>
                                            <th class="current-width" style="vertical-align: middle;">Paiement <small>(DH)</small></th>
                                            <td><input type="number" step="any" value="<?=number_format($total["total_paiement"],2,'.','')?>" id="vente_old_paiement" class="form-control" readonly></td>
                                        </tr>
                                        <tr>
                                            <th class="current-width" style="vertical-align: middle;"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Nouveau Paiement <small>(DH)</small></th>
                                            <td><input type="number" step="any" min="0.1" id="vente_paiement" name="vente_paiement" class="form-control" <?=$total["total_reste"]>0 ? "required" : "disabled"?>></td>
                                        </tr>
                                        <tr>
                                            <th class="current-width" style="vertical-align: middle;">Reste à payé <small>(DH)</small></th>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-10 col-xs-10" style="padding-right: 5px;">
                                                        <input type="number" step="any" value="<?=number_format($total["total_reste"],2,'.','')?>" id="vente_reste" class="form-control" readonly>
                                                    </div>
                                                    <div class="col-md-2 col-xs-2" style="padding-left: 5px;">
                                                        <a href="#" onclick="confirmFixReste()" class="btn btn-warning btn-md rounded <?=$this->session->userdata("role_user")==1 && $total["total_reste"] > 0 ? "" : "disabled"?>" data-toggle="tooltip" data-placement="top" title="Exonération du reste" style="width: 100%;" <?=$this->session->userdata("role_user")==1 && $total["total_reste"] > 0 ? "" : "disabled"?>>
                                                            <i class="fa fa-cog" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="current-width" style="vertical-align: middle;"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Mode de Paiement</th>
                                            <td>
                                                <select class="form-control" name="vente_methode" id="vente_methode" <?=$total["total_reste"] > 0 ? "required" : "disabled"?>>
                                                    <option value="1" selected>Espèce</option>
                                                    <option value="2">Chèque</option>
                                                    <option value="3">Effet</option>
                                                    <option value="4">Virement bancaire</option>
                                                    <?php if(_ENABLE_AVANCE_ && $vente->id_client != 1): ?>
                                                        <option value="5">À partir d'avance</option>
                                                    <?php endif; ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr id="cheque_div" style="display: none;">
                                            <td colspan="2">
                                                <table class="table table-bordered table-striped" style="margin-bottom:0px;">
                                                    <tbody>
                                                        <tr>
                                                            <td><input type="number" step="any" min="1" id="cheque_montant" name="cheque_montant" class="form-control" placeholder="Montant"></td>
                                                            <td><input type="text" id="cheque_reference" name="cheque_reference" class="form-control" placeholder="Réference"></td>
                                                            <td><input type="date" id="cheque_date" name="cheque_date" class="form-control" placeholder="Date"></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3"><input type="text" maxlength="200" id="cheque_remarque" name="cheque_remarque" class="form-control" placeholder="Remarque"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <?php if(_ENABLE_AVANCE_ && $vente->id_client != 1): ?>
                                            <tr id="avance_div" style="display: none;">
                                                <th style="vertical-align: middle;" class="current-width">Avance de Client &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                                                <td>
                                                    <table class="table table-bordered" style="margin-bottom: 0px;">
                                                        <tr>
                                                            <td class="current-width"><input type="radio" name="type_avance" id="type_avance" value="1"></td>
                                                            <td class="current-width"><?=getMethodePaiement(1)?></td>
                                                            <td><strong id="total_avance_1"><?=number_format($avance["total_espece"], 2, ".", " ")?></strong> <small>DH</small></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="current-width"><input type="radio" name="type_avance" value="2" disabled></td>
                                                            <td class="current-width"><?=getMethodePaiement(2)."/".getMethodePaiement(3)?></td>
                                                            <td><strong id="total_avance_2"><?=number_format($avance["total_cheque"], 2, ".", " ")?></strong> <small>DH</small></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="current-width"><input type="radio" name="type_avance" value="3"></td>
                                                            <td class="current-width"><?=getMethodePaiement(4)?></td>
                                                            <td><strong id="total_avance_3"><?=number_format($avance["total_virement"], 2, ".", " ")?></strong> <small>DH</small></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                        <tr>
                                            <th class="current-width" style="vertical-align: middle;"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Date Paiement</th>
                                            <td><input type="date" value="<?=date("Y-m-d")?>" name="date_paiement" class="form-control" <?=$total["total_reste"] > 0 ? "" : "disabled"?> required></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer" style="text-align: center;">
                            <button type="submit" style="width: 50%;" class="btn btn-primary" <?=$total["total_reste"] > 0 ? "" : "disabled"?>>
                                <i class="fa fa-save"></i> &nbsp; Enregistrer
                            </button>
                        </div>
                    </form>
                    <?php if($this->session->userdata("role_user")==1 && $total["total_reste"] > 0): ?>
                    <form method="post" action="<?=base_url()."index.php/vente/fix_reste/"?>" id="form_exoneration_reste" style="display:none;">
                        <input type="hidden" name="id_vente" value="<?=$vente->id_vente?>">
                    </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Historique de paiement de Vente <?=$vente->code_vente?> </h3>
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
                                    <tr>
                                        <th>Commercial</th>
                                        <th>Date Paiement</th>
                                        <th>Montant</th>
                                        <th>Mode de Paiement</th>
                                        <th class="current-width no-export">Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        foreach ($paiements as $val):
                                            $cheque = getPaiementDetails($val["id_paiement"]);
                                    ?>
                                        <tr class="<?=!empty($cheque->paid) && $cheque->paid == 2 ? "danger" : ""?>">
                                            <td><?=getUserLabel($val["role"], $val["utilisateur"])?></td>
                                            <td data-sort="<?=strtotime($val["date_paiement"])?>"><?=date("d/m/Y", strtotime($val["date_paiement"]))?></td>
                                            <td data-sort="<?=round($val["montant"],2)?>"><strong><?=number_format($val["montant"],2,'.',' ')?></strong> <small>DH</small></td>
                                            <td>
                                                <?=getMethodePaiement($val["methode"], $val["type_avance"])?>

                                                <?php if($val["methode"] == 2 || $val["methode"] == 3): ?>
                                                <br> [ <?=$cheque->reference." &nbsp-&nbsp ".date("d/m/Y", strtotime($cheque->date_cheque))?> ]
                                                <?=getChequeStatus($cheque->paid)?>
                                                <?php endif; ?>
                                            </td>
                                            <td class="current-width no-export">
                                                <?php if($this->session->userdata("role_user") == 1): ?>
                                                <form method="post" action="<?=base_url()."index.php/vente/p_supprimer/"?>" id="form_<?=$val["id_paiement"]?>" style="display:none;">
                                                    <input type="hidden" name="id_paiement" value="<?=$val["id_paiement"]?>">
                                                </form>
                                                <a href="#" onclick="confirmDelete('<?="form_".$val["id_paiement"]?>')" class="btn btn-danger btn-sm rounded" data-toggle="tooltip" data-placement="top" title="Supprimer">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <?php foreach ($exonerations_reste as $val): ?>
                                        <tr class="info">
                                            <td><?=getUserLabel($val["role"], $val["utilisateur"])?></td>
                                            <td data-sort="<?=strtotime($val["date_create"])?>"><?=date("d/m/Y", strtotime($val["date_create"]))?></td>
                                            <td data-sort="<?=round($val["montant"],2)?>"><strong><?=number_format($val["montant"],2,'.',' ')?></strong> <small>DH</small></td>
                                            <td>( <strong>Exonération</strong> )</td>
                                            <td class="current-width no-export">
                                                <?php if($this->session->userdata("role_user") == 1): ?>
                                                <form method="post" action="<?=base_url()."index.php/vente/fix_reste_supprimer/"?>" id="form_fix_<?=$val["id_exoneration_reste"]?>" style="display:none;">
                                                    <input type="hidden" name="id_exoneration_reste" value="<?=$val["id_exoneration_reste"]?>">
                                                    <input type="hidden" name="reste" value="<?=number_format($val["montant"],2,'.','')?>">
                                                </form>
                                                <a href="#" onclick="confirmDelete('<?="form_fix_".$val["id_exoneration_reste"]?>')" class="btn btn-danger btn-sm rounded" data-toggle="tooltip" data-placement="top" title="Supprimer">
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
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        createDataTable(
            "#myDataTable",
            [ 1, "desc" ],
            [ [5, 50, 100, -1], [5, 50, 100, "Tous"] ],
            "#export_btns",
            "Paiement de Vente <?=$vente->code_vente?>"
        );

        $("#vente_paiement").on("input", function () {
            var reste = (parseFloat('<?=$total["total_reste"]?>') - parseFloat($(this).val())).toFixed(2);
            $("#vente_reste").val(reste);
        });

        $("#vente_methode").on("change", function ()
        {
            if($(this).val() != undefined && $(this).val() != null)
            {
                if($(this).val() == 1 || $(this).val() == 4)
                {
                    initMethode();

                    $("#vente_methode, #vente_paiement").attr("required", "required");
                }
                else if($(this).val() == 2 || $(this).val() == 3)
                {
                    var completePlaceHolder = $(this).val() == 2 ? "de chèque" : "d'effet";
                    initMethode();

                    $("#cheque_div").show();
                    $("#vente_methode, #vente_paiement, #cheque_montant, #cheque_date, #cheque_reference").attr("required", "required");
                    $("#vente_paiement").attr("readonly", "readonly");

                    $("#cheque_montant").attr("placeholder", "Montant " + completePlaceHolder);
                    $("#cheque_date").attr("placeholder", "Date " + completePlaceHolder);
                    $("#cheque_reference").attr("placeholder", "Réference " + completePlaceHolder);
                    $("#cheque_remarque").attr("placeholder", "Remarque " + completePlaceHolder);

                }
                <?php if(_ENABLE_AVANCE_ && $vente->id_client != 1): ?>
                    else if($(this).val() == 5)
                    {
                        initMethode();

                        $("#avance_div").show();
                        $("#vente_methode, #vente_paiement, #type_avance").attr("required", "required");
                    }
                    <?php endif; ?>
                else
                { initMethode(); }
            }
            else
            { initMethode(); }
        }).change(); // to get attrs

        $("#cheque_montant").on("input", function ()
        {
            $("#vente_paiement").val( $(this).val() );
            $("#vente_paiement").trigger("input");
        });

        <?php if(_ENABLE_AVANCE_ && $vente->id_client != 1): ?>
        $("input[type=radio][name='type_avance']").on("change", function() {
            var avance =  <?=json_encode($avance)?>;
            var max = 0;
            if(avance != undefined && avance != null && avance != "") {
                switch (this.value.toString()) {
                    case "1" : max = avance.total_espece; break;
                    case "2" : max = avance.total_cheque; break;
                    case "3" : max = avance.total_virement; break;
                    default: max = 0;
                }
            }
            $("#vente_paiement").attr("max", max);
        });
        <?php endif; ?>
    });

    function initMethode()
    {
        $("#cheque_div").hide();
        $("#vente_methode, #vente_paiement, #cheque_montant, #cheque_date, #cheque_reference").removeAttr("required");
        $("#vente_paiement").removeAttr("readonly");
        
        <?php if(_ENABLE_AVANCE_ && $vente->id_client != 1): ?>
        $("#avance_div").hide();
        $("#vente_paiement").removeAttr("max");
        $("#type_avance").removeAttr("required");
        $("input[type=radio][name='type_avance']").each(function (i, el) {
            el.checked = false;
        });
        <?php endif; ?>
    }
</script>