<form method="post" action="<?=base_url()?>index.php/achat/modifier" enctype="multipart/form-data" >
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning alert-dismissible" id="alert_produit" style="display:none;">
                <h4><i class="icon fa fa-info-circle"></i> Alerte !</h4>
                La liste des produits à sélectionné est vide.
            </div>
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Modifier Achat</h3>
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
                                    <th class="current-width">Total</th>
                                    <th class="current-width info">Coût de revient</th>
                                    <th class="current-width"><i class="fa fa-fw fa-trash"></i></th>
                                </tr>
                                </thead>
                                <tbody id="tbody_produit">
                                    <?php
                                        $ids = array();
                                        foreach ($achat_details as $val):
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
                                            <td class="current-width info" id="cout_<?=$val["id_produit"]?>"><span class="cout_total"><?=number_format(getCoutRevient($val["id_produit"], $achat->id_achat),2,'.','')?></span> <small>DH</small></td>
                                            <td class="current-width"><a href="javascript:;" onclick="removeRow(<?=$random?>, <?=$val["id_produit"]?>)"><i class="fa fa-fw fa-trash"></i></a></td>
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
                            <div class="form-group">
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Code Achat :</label>
                                <input type="text" class="form-control" name="code_achat" id="code_achat" placeholder="Code Achat" required>
                                <span style="color: red; display: none;" id="code_achat_exists"></span>
                                <input type="hidden" name="id_achat" value="<?=$achat->id_achat?>">
                            </div>
                            <div class="form-group">
                                <label>N° de Facture Fournisseur :</label>
                                <input type="text" class="form-control" name="num_facture" value="<?=$achat->num_facture?>" placeholder="N° de Facture Fournisseur">
                            </div>
                            <div class="form-group">
                                <label>Facture Fournisseur :</label>
                                <input type="file" name="facture" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Fournisseur :</label>
                                <select class="form-control select2" name="id_fournisseur" id="id_fournisseur" required>
                                    <?php
                                        $fournisseur_exixsts = false;
                                        foreach ($fournisseurs as $val):
                                            if($val["id_fournisseur"] == $achat->id_fournisseur) {
                                                $fournisseur_exixsts = true;
                                            }
                                    ?>
                                        <option value="<?=$val["id_fournisseur"]?>"
                                                data-adresse="<?=$val["adresse"]?>"
                                                data-ville="<?=$val["ville"]?>"
                                                data-pays="<?=$val["pays"]?>"
                                        >
                                            <?=$val["full_name"]?>
                                        </option>
                                    <?php endforeach; ?>
                                    <?php if(!$fournisseur_exixsts): ?>
                                        <option value="<?=$fournisseur->id_fournisseur?>"
                                                data-adresse="<?=$fournisseur->adresse?>"
                                                data-ville="<?=$fournisseur->ville?>"
                                                data-pays="<?=$fournisseur->pays?>"
                                        >
                                            <?=$fournisseur->full_name?>
                                        </option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="form-group" style="margin-top: -10px; border: 1px solid gray; padding: 5px 8px 5px 8px; border-radius: 3px; background: #f5f5f5; display: none;">
                                <span id="fournisseur_adresse" style="color: green;"></span>
                            </div>
                            <div class="form-group">
                                <label> Transport :</label>
                                <select class="form-control select2" name="id_transport" id="id_transport">
                                    <?php foreach ($transports as $val): ?>
                                        <option value="<?=$val["id_transport"]?>  <?=$achat->id_transport == $val["id_transport"] ? 'selected' : ''?>">
                                            <?=$val["code_transport"]?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label> N°.Expédition :</label>
                                <input type="text" class="form-control" value="<?=$achat->num_expedition?>" name="num_expedition" placeholder="N°.Expédition">
                            </div>
                            <div class="form-group">
                                <label> N°.Bon avoir :</label>
                                <input type="text" class="form-control" value="<?=$achat->num_bon_avoir?>" name="num_bon_avoir" placeholder="N°.Bon avoir">
                            </div>
                            <div class="form-group">
                                <label> Bon avoir :</label>
                                <input type="file" name="bon_avoir" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Date d'Achat :</label>
                                <input type="date" class="form-control" name="date_achat" value="<?=date("Y-m-d", strtotime($achat->date_achat))?>" placeholder="Date d'Achat" required>
                            </div>
                            <div class="form-group">
                                <label>Remarque :</label>
                                <textarea class="form-control" name="remarque" maxlength="200" rows="3" placeholder="Remarque"><?=$achat->remarque?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Détails</h3>
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
                                            <option value="20" <?=$achat->tva == 20 ? "selected" : ""?>>20 %</option>
                                            <option value="0" <?=$achat->tva == 0 ? "selected" : ""?>>0 %</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="success">
                                    <th style="vertical-align: middle;" class="current-width">Total TTC <small>(DH)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                                    <td><input type="text" value="0" id="achat_total_ttc" class="form-control" readonly></td>
                                </tr>
                                <tr>
                                    <th style="vertical-align: middle;" class="current-width">Paiement <small>(DH)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                                    <td><input type="text" value="<?=number_format(getAchatTotal($achat->id_achat)["total_paiement"],2,'.','')?>" id="achat_paiement" name="achat_paiement" class="form-control" readonly></td>
                                </tr>
                                <tr>
                                    <th style="vertical-align: middle;" class="current-width">Reste <small>(DH)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                                    <td><input type="text" value="0" id="achat_reste" class="form-control" readonly></td>
                                </tr>
                                <tr class="danger">
                                    <th style="vertical-align: middle;" class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Frais <small>(DH)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                                    <td><input type="number" step="any" min="0" value="<?=$achat->frais?>" name="frais" id="frais" class="form-control" oninput="getCoutRevientAll()"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="box-footer" style="text-align: center;">
                    <button type="submit" style="width: 50%;" class="btn btn-primary">
                        <i class="fa fa-save"></i> &nbsp; Mettre à jour
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    var selected_produit = <?=json_encode($ids)?>;

    $(document).ready(function ()
    {
        fixTable("tbody_produit");

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
            "OK"
        );

        $('#id_fournisseur').select2({
            placeholder: "Selectionner un fournisseur",
        });

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

        // $("#id_transport").val('').trigger("change");

        $('#id_transport').select2({
            placeholder: "Selectionner un transport",
        });

        $("#id_fournisseur").val('<?=$achat->id_fournisseur?>').trigger("change");

        createCodeChecker(
            "achat",
            "A",
            "<?=$achat->code_achat?>",
            <?=$achat->id_achat?>
        );

        $("form").on("submit", function (event) {
            event.preventDefault();
            var form = this;
            if($("[name='id_produit[]']").length > 0) {
                $("#alert_produit").hide();
                checkCodeExists("achat", <?=$achat->id_achat?>, function () {
                    $(form).unbind("submit").submit();
                });
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
        $("#total_"+id).html("<span class='span_total'>"+total.toFixed(2)+"</span> <small>DH</small>");

        getAchatTotal();
    }

    function getCoutRevientAll()
    {
        for (var sp of selected_produit)
        {
            var frais = parseFloat($("#frais").val());
            var prix_achat = parseFloat($("#prix_achat_"+sp).val());
            var tva = parseFloat($("#tva").val());
            prix_achat = prix_achat + (prix_achat*tva/100);
            var total_produits = 0;
            for (var x of selected_produit) {
                total_produits += parseInt($("#quantite_"+x).val());
            }

            var cout_revient = prix_achat + (frais/total_produits);
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
        $("#achat_reste").val( (achat_total_ttc - parseFloat( $("#achat_paiement").val() )).toFixed(2) );
        getCoutRevientAll();
    }

    function removeRow(random, id) {
        $("#tr_"+random).remove();
        selected_produit.splice(selected_produit.indexOf(id.toString()), 1);
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
                                <input type="number" step="any" value="`+option.data("prix_achat")+`" min="0" id="prix_achat_`+id+`" name="prix_achat_`+id+`" class="form-control input-sm" style="width:100px;" oninput="getTotal(`+id+`)" required>
                            </td>
                            <td class="current-width">
                                <input type="number" step="any" value="1" min="0.1" name="quantite_`+id+`" id="quantite_`+id+`" class="form-control input-sm" style="width:100px;" oninput="getTotal(`+id+`)" required>
                            </td>
                            <td class="current-width " id="total_`+id+`"></td>
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
</script>