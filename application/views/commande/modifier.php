<form method="post" action="<?=base_url()?>index.php/commande/modifier">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning alert-dismissible" id="alert_produit" style="display:none;">
                <h4><i class="icon fa fa-info-circle"></i> Alerte !</h4>
                La liste des produits à sélectionné est vide.
            </div>
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Modifier Commande</h3>
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
                                    <th class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Quantite</th>
                                    <th class="current-width"><i class="fa fa-fw fa-trash"></i></th>
                                </tr>
                                </thead>
                                <tbody id="tbody_produit">
                                <?php
                                $ids = array();
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
                                        <td class="tr_categorie"><?=$val["categorie"]?></td>
                                        <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                            <td class="tr_sub_categorie"><?=$val["sub_categorie"]?></td>
                                        <?php endif; ?>
                                        <td class="current-width">
                                            <input type="number" step="any" value="<?=$val["quantite"]?>" min="0.1" name="quantite_<?=$val["id_produit"]?>" class="form-control input-sm quantite_total" style="width:100px;" oninput="getTotal()" required>
                                        </td>
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
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Code Commande de Fournisseur :</label>
                                <input type="text" class="form-control" name="code_commande" id="code_commande" placeholder="Code Commande de Fournisseur" required>
                                <span style="color: red; display: none;" id="code_commande_exists"></span>
                                <input type="hidden" name="id_commande" value="<?=$commande->id_commande?>">
                            </div>
                            <div class="form-group">
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Fournisseur :</label>
                                <select class="form-control select2" name="id_fournisseur" id="id_fournisseur" required>
                                    <?php
                                        $fournisseur_exixsts = false;
                                        foreach ($fournisseurs as $val):
                                            if($val["id_fournisseur"] == $commande->id_fournisseur) {
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
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Date de Commande de Fournisseur :</label>
                                <input type="date" class="form-control" name="date_commande" value="<?=date("Y-m-d", strtotime($commande->date_commande))?>" placeholder="Date de Commande de Fournisseur" oninput="getTotal()" required>
                            </div>
                            <div class="form-group">
                                <label>Remarque :</label>
                                <textarea class="form-control" name="remarque" maxlength="200" rows="3" placeholder="Remarque"><?=$commande->remarque?></textarea>
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
                                    <th style="vertical-align: middle; white-space: nowrap; width: 1%;">Catégories </th>
                                    <td><input type="text" value="0" id="commande_total_categories" class="form-control" readonly></td>
                                </tr>
                                <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                    <tr>
                                        <th style="vertical-align: middle; white-space: nowrap; width: 1%;">Sous-Catégories </th>
                                        <td><input type="text" value="0" id="commande_total_sub_categories" class="form-control" readonly></td>
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <th style="vertical-align: middle; white-space: nowrap; width: 1%;">Produits </th>
                                    <td><input type="text" value="0" id="commande_total_produits" class="form-control" readonly></td>
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
            }
        );

        createProduitSearchInput(
            "#id_produit",
            function (option) {
                createProduitRow(option);
            }
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

        $("#id_fournisseur").val('<?=$commande->id_fournisseur?>').trigger("change");

        createCodeChecker(
            "commande",
            "CF",
            "<?=$commande->code_commande?>",
            <?=$commande->id_commande?>
        );

        $("form").on("submit", function (event) {
            event.preventDefault();
            var form = this;
            if($("[name='id_produit[]']").length > 0) {
                $("#alert_produit").hide();
                checkCodeExists("commande", <?=$commande->id_commande?>, function () {
                    $(form).unbind("submit").submit();
                });
            }
            else {
                $("#alert_produit").show();
                $("html, body").animate({ scrollTop: 0 }, "fast");
            }
        });

        getTotal();
    });

    function getTotal()
    {
        var total_produit = 0;
        $(".quantite_total").each(function (i, el) {
            total_produit += parseFloat($(el).val());
        });
        $("#commande_total_produits").val(total_produit);

        var temp_c = [];
        $(".tr_categorie").each(function (i, el) {
            if(!temp_c.includes($(el).html())) {
                temp_c.push($(el).html());
            }
        });
        $("#commande_total_categories").val(temp_c.length);

        <?php if(_ENABLE_SUB_CATEGORIE_): ?>
        var temp_sc = [];
        $(".tr_sub_categorie").each(function (i, el) {
            if(!temp_sc.includes($(el).html())) {
                temp_sc.push($(el).html());
            }
        });
        $("#commande_total_sub_categories").val(temp_sc.length);
        <?php endif; ?>
    }

    function removeRow(random, id) {
        $("#tr_"+random).remove();
        selected_produit.splice(selected_produit.indexOf(id.toString()), 1);
        getTotal();
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
                            <td class="tr_categorie">`+option.data("categorie")+`</td>
                            <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                            <td class="tr_sub_categorie">`+option.data("sub_categorie")+`</td>
                            <?php endif; ?>
                            <td class="current-width">
                                <input type="number" step="any" value="1" min="0.1" name="quantite_`+id+`"  id="quantite_`+id+`"  class="form-control input-sm quantite_total" style="width:100px;" oninput="getTotal()" required>
                            </td>
                            <td class="current-width"><a href="javascript:;" onclick="removeRow(`+random+`, `+id+`)"><i class="fa fa-fw fa-trash"></i></a></td>
                        </tr>
                    `;
            fixTable("tbody_produit", true);
            $("#tbody_produit").append(html);

            getTotal();
            fixPopupProduit();
        }
    }
</script>