<form method="post" action="<?=base_url()?>index.php/achat/ajouter">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning alert-dismissible" id="alert_produit" style="display:none;">
                <h4><i class="icon fa fa-info-circle"></i> Alerte !</h4>
                La liste des produits à sélectionné est vide.
            </div>
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Ajouter Achat</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3" style="margin-top: 10px;">

                            <input type="text" class="form-control" id="code_produit" placeholder="Code Produit" style="border: 2px dashed rgb(54, 127, 169);"><br>
                            <input type="text" list="id_produit_datalist" class="form-control" id="id_produit" placeholder="Nom Produit" style="border: 2px solid rgb(54, 127, 169); margin-bottom: 10px;">
                            <datalist id="id_produit_datalist"></datalist>

                            <br>

                            <input type="text" class="form-control" id="code_produit_free" placeholder="Code Produit Gratuit" style="border: 2px dashed rgb(243, 156, 18);"><br>
                            <input type="text" list="id_produit_free_datalist" class="form-control" id="id_produit_free" placeholder="Nom Produit Gratuit" style="border: 2px solid rgb(243, 156, 18); margin-bottom: 10px;">
                            <datalist id="id_produit_free_datalist"></datalist>

                        </div>
                        <div class="col-md-9 table-responsive" style="margin-top: 10px;">
                            <table class="table table-bordered table-striped myDataTable">
                                <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Produit</th>
                                    <th>Catégorie</th>
                                    <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                        <th>Sous-Catégorie</th>
                                    <?php endif; ?>
                                    <th class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> P.U d'Achat <small>(DH)</small></th>
                                    <th class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Quantite</th>
                                    <th class="current-width">Total HT</th>
                                    <th class="current-width info">Coût de revient</th>
                                    <th class="current-width"><i class="fa fa-fw fa-trash"></i></th>
                                </tr>
                                </thead>
                                <tbody id="tbody_produit">
                                <?php
                                $ids = array();
                                if(!empty($commande_details)):
                                    foreach ($commande_details as $val):
                                        $random = rand(100000000, 999999999);
                                        array_push($ids, $val["id_produit"]);
                                ?>
                                    <tr id="tr_<?=$random?>">
                                        <td>
                                            <a href="javascript:;" class="produitPopup" rel="popover" data-img="<?=$val["image"]?>">
                                                <?=$val["code_produit"]?>
                                                <input type="hidden" name="id_produit[]" value="<?=$val["id_produit"]?>">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="javascript:;" class="produitPopup" rel="popover" data-img="<?=$val["image"]?>">
                                                <?=$val["produit"]?>
                                            </a>
                                        </td>
                                        <td><?=$val["categorie"]?></td>
                                        <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                            <td><?=$val["sub_categorie"]?></td>
                                        <?php endif; ?>
                                        <td class="current-width">
                                            <input type="number" step="any" value="<?=$val["prix_achat"]?>" min="0" name="prix_achat_<?=$val["id_produit"]?>" id="prix_achat_<?=$val["id_produit"]?>" class="form-control input-sm" style="width:100px;" oninput="getTotal(<?=$val["id_produit"]?>)" required>
                                        </td>
                                        <td class="current-width">
                                            <input type="number" step="any" value="<?=$val["quantite"]?>" min="0.1" name="quantite_<?=$val["id_produit"]?>" id="quantite_<?=$val["id_produit"]?>" class="form-control input-sm" style="width:100px;" oninput="getTotal(<?=$val["id_produit"]?>)" required>
                                        </td>
                                        <td class="current-width" id="total_<?=$val["id_produit"]?>"><span class="span_total"><?=number_format($val["prix_achat"]*$val["quantite"],2,'.','')?></span> <small>DH</small></td>
                                        <td class="current-width info" id="cout_<?=$val["id_produit"]?>"><span><?=number_format($val["prix_achat"],2,'.','')?></span> <small>DH</small></td>
                                        <td class="current-width"><a href="javascript:;" onclick="removeRow(<?=$random?>, <?=$val["id_produit"]?>)"><i class="fa fa-fw fa-trash"></i></a></td>
                                    </tr>
                                <?php
                                    endforeach;
                                endif;
                                ?>
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
        <div class="box box-default box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Fournisseur</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if(!empty($commande)): ?>
                        <input type="hidden" name="id_fournisseur" value="<?=$commande->id_fournisseur?>">
                        <input type="hidden" name="id_commande" value="<?=$commande->id_commande?>">
                        <div class="alert alert-info">
                            <table>
                                <tr>
                                    <td><i class="fa fa-check"></i> &nbsp; <strong>Commande</strong></td>
                                    <td><strong>&nbsp; : &nbsp;&nbsp;&nbsp;</strong></td>
                                    <td><strong><?=$commande->code_commande?></strong></td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-check"></i> &nbsp; <strong>Date</strong></td>
                                    <td><strong>&nbsp; : &nbsp;&nbsp;&nbsp;</strong></td>
                                    <td><strong><?=date("d/m/Y", strtotime($commande->date_commande))?></strong></td>
                                </tr>
                            </table>
                        </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Code Achat :</label>
                            <input type="text" class="form-control" name="code_achat" id="code_achat" placeholder="Code Achat" readonly required>
                            <span style="color: red; display: none;" id="code_achat_exists"></span>
                        </div>
                        <div class="form-group">
                            <label>N° de Facture Fournisseur :</label>
                            <input type="text" class="form-control" name="num_facture" placeholder="N° de Facture Fournisseur">
                        </div>
                        <div class="form-group">
                            <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Fournisseur :</label>
                            <select class="form-control select2" name="id_fournisseur" id="id_fournisseur" required>
                                <?php foreach ($fournisseurs as $val): ?>
                                    <option value="<?=$val["id_fournisseur"]?>"
                                            data-adresse="<?=$val["adresse"]?>"
                                            data-ville="<?=$val["ville"]?>"
                                            data-pays="<?=$val["pays"]?>"
                                    >
                                        <?=$val["full_name"]?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group" style="margin-top: -10px; border: 1px solid gray; padding: 5px 8px 5px 8px; border-radius: 3px; background: #f5f5f5; display: none;">
                            <span id="fournisseur_adresse" style="color: green;"></span>
                        </div>
                        <div class="form-group">
                            <label> Transport :</label>
                            <select class="form-control select2" name="id_transport" id="id_transport">
                                <?php foreach ($transports as $val): ?>
                                    <option value="<?=$val["id_transport"]?>">
                                        <?=$val["code_transport"]?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label> N°.Expédition :</label>
                            <input type="text" class="form-control" name="num_expedition" placeholder="N°.Expédition">
                        </div>
                        <div class="form-group">
                            <label> N°.Bon avoir :</label>
                            <input type="text" class="form-control" name="num_bon_avoir" placeholder="N°.Bon avoir">
                        </div>
                        <div class="form-group">
                            <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Date d'Achat :</label>
                            <input type="date" class="form-control" name="date_achat" value="<?=date("Y-m-d")?>" placeholder="Date d'Achat" required>
                        </div>
                        <div class="form-group">
                            <label>Remarque :</label>
                            <textarea class="form-control" name="remarque" maxlength="200" rows="3" placeholder="Remarque"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-default box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Paiement</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered" style="margin-bottom: 0px;">
                            <tbody>
                            <tr>
                                <th style="vertical-align: middle;" class="current-width">Total HT<small>(DH)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                                <td><input type="text" value="0" id="achat_total" class="form-control" readonly></td>
                            </tr>
                            <tr>
                                <th style="vertical-align: middle;" class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> TVA <small>(%)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                                <td>
                                    <select name="tva" id="tva" class="form-control" onchange="getAchatTotal()" required>
                                        <option value="20" selected>20 %</option>
                                        <option value="0">0 %</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="success">
                                <th style="vertical-align: middle;" class="current-width">Total TTC <small>(DH)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                                <td><input type="text" value="0" id="achat_total_ttc" class="form-control" readonly></td>
                            </tr>
                            <tr>
                                <th style="vertical-align: middle;" class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Paiement <small>(DH)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                                <td><input type="number" step="any" min="0" id="achat_paiement" name="achat_paiement" class="form-control" required></td>
                            </tr>
                            <tr>
                                <th style="vertical-align: middle;" class="current-width">Reste <small>(DH)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                                <td><input type="text" value="0" id="achat_reste" class="form-control" readonly></td>
                            </tr>
                            <tr>
                                <th style="vertical-align: middle;" class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Mode de Paiement &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                                <td>
                                    <select class="form-control" name="achat_methode" id="achat_methode" required>
                                        <option value>Non payé</option>
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
                                            <td><input type="number" step="any" min="0.1" id="cheque_montant" name="cheque_montant" class="form-control" placeholder="Montant"></td>
                                            <td><input type="text" id="cheque_reference" name="cheque_reference" class="form-control" placeholder="Réference"></td>
                                            <td><input type="date" id="cheque_date" name="cheque_date" class="form-control" placeholder="Date"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr class="danger">
                                <th style="vertical-align: middle;" class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Frais <small>(DH)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                                <td><input type="number" step="any" min="0" value="0" name="frais" id="frais" class="form-control" oninput="getCoutRevientAll()"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="box-footer" style="text-align: center;">
                <button type="submit" style="width: 50%;" class="btn btn-primary">
                    <i class="fa fa-save"></i> &nbsp; Enregistrer
                </button>
            </div>
        </div>
    </div>
</div>
</form>

<script type="text/javascript">
    var selected_produit = [];
    var selected_produit_free = [];

    $(document).ready(function ()
    {
        fixTable("tbody_produit");
        $("#code_produit").focus();

        createProduitCodeInput(
            "#code_produit",
            function (option) {
                createProduitRow(option);
            },
            "OK"
        );

        createProduitSearchInput(
            "#id_produit",
            function (option) {
                createProduitRow(option);
            },
            true,
            "OK",
        );

        createProduitCodeInput(
            "#code_produit_free",
            function (option) {
                createProduitGratuitRow(option);
            },
            "OK",
            "OK"
        );

        createProduitSearchInput(
            "#id_produit_free",
            function (option) {
                createProduitGratuitRow(option);
            },
            true,
            "OK",
            "OK"
        );

        $('#id_fournisseur').select2({
            placeholder: "Selectionner un fournisseur",
        });

        $("#id_fournisseur").val('').trigger("change");

        $("#id_fournisseur").on("change", function () {
            if($(this).val() != undefined && $(this).val() != null && $(this).val() != "") {
                var option = $("#id_fournisseur option:selected");
                var adrs = option.data("adresse");
                if(adrs != undefined && adrs != null && adrs != "") { adrs = adrs+`<br>`; }
                $("#fournisseur_adresse").html(adrs+option.data("ville")+`, `+option.data("pays"));
                $("#fournisseur_adresse").parent().show();
            }
            else { $("#fournisseur_adresse").parent().hide(); }
        });

        $("#id_transport").val('').trigger("change");

        $('#id_transport').select2({
            placeholder: "Selectionner un transport",
        });

        <?php if(!empty($commande)): ?>
        selected_produit = <?=json_encode($ids)?>;
        $("#id_fournisseur").val(<?=$commande->id_fournisseur?>).trigger("change");
        $("#id_fournisseur").select2({ disabled:"readonly" });
        <?php endif; ?>

        $("#achat_paiement").on("input", function () {
            if($(this).val() != undefined && $(this).val() != null && $(this).val() > 0) {
                $("#achat_methode").attr("required", "required");
            }
            else  {
                $("#achat_methode").removeAttr("required");
            }
            getAchatTotal();
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

        createCodeChecker(
            "achat",
            "A",
            "<?=$code_achat?>"
        );

        $("form").on("submit", function (event) {
             event.preventDefault();
            var form = this;
             if($("[name='id_produit[]']").length > 0 || $("[name='id_produit_free[]']").length > 0) {
                 $("#alert_produit").hide();
                //  checkCodeExists("achat", "", function () {
                     $(form).unbind("submit").submit();
                //  });
             }
             else {
                $("#alert_produit").show();
                 $("html, body").animate({ scrollTop: 0 }, "fast");
             }
        });

        getAchatTotal();
    });

    function getTotal(id)
    {
        var quantite = $("#quantite_"+id).val();
        var prix = $("#prix_achat_"+id).val();
        var total = prix*quantite;

        var tva = parseFloat($("#tva").val());
        var achat_total_ht = total * 1 / (1 + (tva / 100));

        $("#total_"+id).html("<span class='span_total'>"+achat_total_ht.toFixed(4)+"</span> <small>DH</small>");

        getAchatTotal();
    }

    function getCoutRevientAll()
    {
        for (var sp of selected_produit)
        {
            var frais = parseFloat($("#frais").val());
            var prix_achat = parseFloat($("#prix_achat_"+sp).val());
            var tva = parseFloat($("#tva").val());
            prix_achat = prix_achat;
            var total_produits = 0;
            var total_prix_achat = 0;
            for (var x of selected_produit) {
                total_produits += parseInt($("#quantite_"+x).val());
                var prix_achat1 = parseFloat($("#prix_achat_"+x).val());
                prix_achat1 = prix_achat1 + (prix_achat1*tva/100);
                total_prix_achat += prix_achat1*parseInt($("#quantite_"+x).val());
            }

            var cout_revient = prix_achat + (frais*(prix_achat/total_prix_achat));
            
            $("#cout_"+sp).html("<span class='cout_total'>"+cout_revient.toFixed(2)+"</span> <small>DH</small>");
        }
    }

    function getAchatTotal()
    {
        var achat_total = 0;
        $(".span_total").each(function (i, el) {
            achat_total += parseFloat($(el).html());
        });
        var tva = parseFloat($("#tva").val());
        
        var achat_total_ttc = achat_total + (achat_total * tva / 100);

        $("#achat_total").val(achat_total.toFixed(2));
        $("#achat_total_ttc").val(achat_total_ttc.toFixed(2));
        $("#achat_paiement").attr('max', achat_total_ttc.toFixed(2));
        $("#achat_reste").val( (achat_total_ttc - parseFloat( $("#achat_paiement").val() || 0 )).toFixed(2) );
        getCoutRevientAll();
    }

    function removeRow(random, id)
    {
        $("#tr_"+random).remove();
        selected_produit.splice(selected_produit.indexOf(id.toString()), 1);
        getAchatTotal();
        fixTable("tbody_produit");
    }

    function removeRowFree(random, id)
    {
        $("#tr_"+random).remove();
        selected_produit_free.splice(selected_produit_free.indexOf(id.toString()), 1);
        getAchatTotal();
        fixTable("tbody_produit");
    }

    function createProduitRow(option)
    {
        var id = option.data("id_produit");
        if(id != undefined && id != null && id != "" && !selected_produit.includes(id.toString()))
        {
            var random = Math.round(Math.random()*1000000000);
            selected_produit.push(id.toString());

            var html = `
                        <tr id="tr_`+random+`">
                            <td>
                                <a href="javascript:;" class="produitPopup" rel="popover" data-img="`+option.data("image")+`">
                                    `+option.data("code")+`
                                    <input type="hidden" name="id_produit[]" value="`+id+`">
                                </a>
                            </td>
                            <td>
                                <a href="javascript:;" class="produitPopup" rel="popover" data-img="`+option.data("image")+`">
                                    `+option.data("full_name")+`
                                </a>
                            </td>
                            <td>`+option.data("categorie")+`</td>
                            <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                            <td>`+option.data("sub_categorie")+`</td>
                            <?php endif; ?>
                            <td class="current-width">
                                <input type="number" step="any" value="`+option.data("prix_achat")+`" min="0" name="prix_achat_`+id+`" id="prix_achat_`+id+`" class="form-control input-sm" style="width:100px;" oninput="getTotal(`+id+`)" required>
                            </td>
                            <td class="current-width">
                                <input type="number" step="any" value="1" min="0.1" name="quantite_`+id+`" id="quantite_`+id+`" class="form-control input-sm" style="width:100px;" oninput="getTotal(`+id+`)" required>
                            </td>
                            <td class="current-width" id="total_`+id+`"></td>
                            <td class="current-width info" id="cout_`+id+`"></td>
                            <td class="current-width"><a href="javascript:;" onclick="removeRow(`+random+`, `+id+`)"><i class="fa fa-fw fa-trash"></i></a></td>
                        </tr>
            `;

            fixTable("tbody_produit", true);
            $("#tbody_produit").append(html);

            getTotal(id);
            getAchatTotal();
            fixPopupProduit();
        }
    }

    function createProduitGratuitRow(option)
    {
        var id = option.data("id_produit");
        if(id != undefined && id != null && id != "" && !selected_produit_free.includes(id.toString()))
        {
            var random = Math.round(Math.random()*1000000000);
            selected_produit_free.push(id.toString());

            var html = `
                    <tr id="tr_`+random+`" class="tr_gratuit">
                        <td>
                            <a href="javascript:;" class="produitPopup" rel="popover" data-img="`+option.data("image")+`">
                                `+option.data("code")+`
                                <input type="hidden" name="id_produit_free[]" value="`+id+`">
                            </a>
                        </td>
                        <td>
                            <a href="javascript:;" class="produitPopup" rel="popover" data-img="`+option.data("image")+`">
                                `+option.data("full_name")+`
                            </a>
                        </td>
                        <td>`+option.data("categorie")+`</td>
                        <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                            <td>`+option.data("sub_categorie")+`</td>
                        <?php endif; ?>
                        <td class="current-width">
                            <input type="number" value="0" class="form-control input-sm" style="width:90px;" readonly>
                        </td>
                        <td class="current-width">
                            <input type="number" step="any" value="1" min="1" name="quantite_free_`+id+`" class="form-control input-sm" style="width:90px;">
                        </td>
                        <td class="current-width">
                            <input type="number" value="0" class="form-control input-sm" style="width:90px;" readonly>
                        </td>
                        <td class="current-width">0 <small>DH</small></td>
                        <td class="current-width"><a href="javascript:;" onclick="removeRowFree(`+random+`, `+id+`)"><i class="fa fa-fw fa-trash"></i></a></td>
                    </tr>
                `;
            fixTable("tbody_produit", true);
            $("#tbody_produit").append(html);

            fixPopupProduit();
        }
    }

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