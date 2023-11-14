<div class="row">
    <div class="col-md-4">
        <div class="box box-default box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Achat</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12" style="overflow-x: auto;">
                        <table class="table">
                            <thead>
                            <tr>
                                <th colspan="3" style="text-align: center; font-size: 2.5rem;"><a href="<?=base_url()."index.php/achat/details/".$achat->id_achat?>"><?=$achat->code_achat?></a></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="current-width">Commercial</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><?=getUserLabel($achat->role, $achat->utilisateur)?></td>
                            </tr>
                            <tr>
                                <td class="current-width">Fournisseur</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><a href="<?=base_url()."index.php/fournisseur/details/".$achat->id_fournisseur?>"><?=$achat->fournisseur?></a></strong></td>
                            </tr>
                            <tr>
                                <td class="current-width">Date Achat</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=date("d/m/Y", strtotime($achat->date_achat))?></strong></td>
                            </tr>
                            <tr>
                                <td class="current-width">Remarque</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=nl2br($achat->remarque)?></strong></td>
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
                    <form method="post" action="<?=base_url()."index.php/achat/paiement/".$achat->id_achat?>">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    $total = getAchatTotal($achat->id_achat);
                                    ?>
                                    <input type="hidden" name="id_achat" value="<?=$achat->id_achat?>">
                                    <table class="table table-bordered" style="margin-bottom: 0px;">
                                        <tbody>
                                        <tr>
                                            <th class="current-width" style="vertical-align: middle;">Total <small>(DH)</small></th>
                                            <td><input type="number" step="any" value="<?=number_format($total["total_achat"],2,'.','')?>" id="achat_total" class="form-control" readonly></td>
                                        </tr>
                                        <tr>
                                            <th class="current-width" style="vertical-align: middle;">Paiement <small>(DH)</small></th>
                                            <td><input type="number" step="any" value="<?=number_format($total["total_paiement"],2,'.','')?>" id="achat_old_paiement" class="form-control" readonly></td>
                                        </tr>
                                        <tr>
                                            <th class="current-width" style="vertical-align: middle;"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Nouveau Paiement <small>(DH)</small></th>
                                            <td><input type="number" step="any" min="0.1"  id="achat_paiement" name="achat_paiement" class="form-control" <?=$total["total_reste"] > 0 ? "" : "disabled"?> required></td>
                                        </tr>
                                        <tr>
                                            <th class="current-width" style="vertical-align: middle;">Reste à payé <small>(DH)</small></th>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-10 col-xs-10">
                                                        <input type="number" step="any" value="<?=number_format($total["total_reste"],2,'.','')?>" id="achat_reste" class="form-control" readonly>
                                                    </div>
                                                    <div class="col-md-2 col-xs-2">
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
                                                <select class="form-control" name="achat_methode" id="achat_methode" <?=$total["total_reste"] > 0 ? "" : "disabled"?> required>
                                                    <option value="1" selected>Espèce</option>
                                                    <option value="2">Chèque</option>
                                                    <option value="3">Effet</option>
                                                    <option value="4">Virement bancaire</option>
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
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr id="date_paiement_div">
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
                        <form method="post" action="<?=base_url()."index.php/achat/fix_reste/"?>" id="form_exoneration_reste" style="display:none;">
                            <input type="hidden" name="id_achat" value="<?=$achat->id_achat?>">
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Historique de paiement d'Achat <?=$achat->code_achat?> </h3>
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
                                    <?php foreach ($paiements as $val): ?>
                                        <tr>
                                            <td><?=getUserLabel($val["role"], $val["utilisateur"])?></td>
                                            <td data-sort="<?=strtotime($val["date_paiement"])?>"><?=date("d/m/Y", strtotime($val["date_paiement"]))?></td>
                                            <td data-sort="<?=round($val["montant"],2)?>"><strong><?=number_format($val["montant"],2,'.','')?></strong> <small>DH</small></td>
                                            <td>
                                                <?=getMethodePaiement($val["methode"])?>
                                                <?php
                                                if($val["methode"] == 2 || $val["methode"] == 3):
                                                    $cheque = getPaiementDetails($val["id_paiement"]);
                                                    ?>
                                                    <br> [ <?=$cheque->reference." &nbsp-&nbsp ".date("d/m/Y", strtotime($cheque->date_cheque))?> ]
                                                <?php endif; ?>
                                            </td>
                                            <td class="current-width no-export">
                                                <form method="post" action="<?=base_url()."index.php/achat/p_supprimer/"?>" id="form_<?=$val["id_paiement"]?>" style="display:none;">
                                                    <input type="hidden" name="id_paiement" value="<?=$val["id_paiement"]?>">
                                                </form>
                                                <a href="#" onclick="confirmDelete('<?="form_".$val["id_paiement"]?>')" class="btn btn-danger btn-sm rounded" data-toggle="tooltip" data-placement="top" title="Supprimer">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
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
                                                <form method="post" action="<?=base_url()."index.php/achat/fix_reste_supprimer/"?>" id="form_fix_<?=$val["id_exoneration_reste"]?>" style="display:none;">
                                                    <input type="hidden" name="id_exoneration_reste" value="<?=$val["id_exoneration_reste"]?>">
                                                    <input type="hidden" name="reste" value="<?=number_format($val["montant"],2,'.','')?>">
                                                </form>
                                                <a href="#" onclick="confirmDelete('<?="form_fix_".$val["id_exoneration_reste"]?>')" class="btn btn-danger btn-sm rounded" data-toggle="tooltip" data-placement="top" title="Supprimer">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
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
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        createDataTable(
            "#myDataTable",
            [ 1, "desc" ],
            [ [5, 50, 100, -1], [5, 50, 100, "Tous"] ],
            "#export_btns",
            "Paiement d'Achat <?=$achat->code_achat?>"
        );

        $("#achat_paiement").on("input", function () {
            $("#achat_reste").val( (parseFloat('<?=$total["total_reste"]?>') - parseFloat($(this).val())).toFixed(2) );
        });

        $("#achat_methode").on("change", function ()
        {
            if($(this).val() != undefined && $(this).val() != null)
            {
                if($(this).val() == 1)
                {
                    initMethode();

                    $("#achat_paiement").attr("max", '<?=getCaisseTotal()?>');
                    $("#achat_methode, #achat_paiement").attr("required", "required");
                }
                else if($(this).val() == 2 || $(this).val() == 3)
                {
                    var completePlaceHolder = $(this).val() == 2 ? "de chèque" : "d'effet";
                    initMethode();

                    $("#cheque_div").show();
                    $("#achat_methode, #achat_paiement, #cheque_montant, #cheque_date, #cheque_reference").attr("required", "required");
                    $("#achat_paiement").attr("readonly", "readonly");

                    $("#cheque_montant").attr("placeholder", "Montant " + completePlaceHolder);
                    $("#cheque_date").attr("placeholder", "Date " + completePlaceHolder);
                    $("#cheque_reference").attr("placeholder", "Réference " + completePlaceHolder);
                }
                else if($(this).val() == 4)
                {
                    initMethode();

                    $("#achat_methode, #achat_paiement").attr("required", "required");
                }
                else
                { initMethode(); }
            }
            else
            { initMethode(); }
        }).change(); // to get max attr;

        $("#cheque_montant").on("input", function ()
        {
            $("#achat_paiement").val( $(this).val() );
            $("#achat_paiement").trigger("input");
        });
        
    });

    function initMethode()
    {
        $("#cheque_div").hide();
        $("#achat_methode, #achat_paiement, #cheque_montant, #cheque_date, #cheque_reference").removeAttr("required");
        $("#achat_paiement").removeAttr("readonly");

        <?php if(_ENABLE_CAISSE_): ?>
        $("#achat_paiement").removeAttr("max");
        <?php endif; ?>
    }
</script>