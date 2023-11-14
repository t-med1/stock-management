<form method="post" action="<?=base_url()?>index.php/produit/prc_modifier" enctype="multipart/form-data">

    <input type="hidden" name="update_id_produit" value="<?=$produit->id_produit?>">

    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning alert-dismissible" id="alert_produit" style="display:none;">
                <h4><i class="icon fa fa-info-circle"></i> Alerte !</h4>
                La liste des produits à sélectionné est vide.
            </div>
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Mettre à jour Produit</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3" style="margin-top: 10px;">

                            <input type="text" class="form-control" id="code_produit_temp" placeholder="Code Produit" style="border: 2px dashed rgb(54, 127, 169);"><br>
                            <input type="text" list="id_produit_temp_datalist" class="form-control" id="id_produit_temp" placeholder="Nom Produit" style="border: 2px solid rgb(54, 127, 169); margin-bottom: 10px;">
                            <datalist id="id_produit_temp_datalist"></datalist>

                        </div>
                        <div class="col-md-9" style="margin-top: 10px;">
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
                                    foreach ($produit_details as $val):
                                        $random = rand(100000000, 999999999);
                                        $cout_revient = getCoutRevient($val["id_produit"]);
                                        array_push($ids, $val["id_produit"])
                                ?>
                                    <tr id="tr_<?=$random?>">
                                        <td>
                                            <a href="javascript:;" class="produitPopup" rel="popover" data-img="<?=$val["image"]?>">
                                                <?=$val["code_produit"]?>
                                            <input type="hidden" name="id_produit[]" value="<?=$val["id_produit"]?>">
                                            <input type="hidden" id="prix_vente_<?=$val["id_produit"]?>" value="<?=$val["prix_vente"]?>">
                                            <input type="hidden" id="cout_revient_<?=$val["id_produit"]?>" value="<?=number_format($cout_revient, 2, ".", "")?>">
                                            <input type="hidden" id="prix_achat_<?=$val["id_produit"]?>" value="<?=$val["prix_achat"]?>">
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
                                            <input type="number" step="any" value="<?=$val["quantite"]?>" min="0.1" name="quantite_<?=$val["id_produit"]?>"  id="quantite_<?=$val["id_produit"]?>" class="form-control input-sm quantite_total" style="width:100px;" oninput="getTotal()" required>
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
                    <h3 class="box-title">Détails de produit composé</h3>
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
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Catégorie :</label>
                                <select class="form-control select2" name="id_categorie" id="id_categorie" required>
                                    <?php
                                        $cat_exists = false;
                                        foreach ($categories as $val):
                                            if($val["id_categorie"] == $produit->id_categorie) {
                                                $cat_exists = true;
                                            }
                                        ?>
                                        <option value="<?=$val["id_categorie"]?>">
                                            <?=$val["full_name"]?>
                                        </option>
                                    <?php endforeach; ?>
                                    <?php if(!$cat_exists): ?>
                                        <option value="<?=$produit->id_sub_categorie?>"
                                                data-id_categorie="<?=$produit->id_categorie?>"
                                        >
                                            <?=$produit_categorie->full_name?>
                                        </option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                <div class="form-group">
                                    <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Sous-Catégorie :</label>
                                    <select class="form-control select2" name="id_sub_categorie" id="id_sub_categorie" required>
                                        <?php
                                            $sub_cat_exists = false;
                                            foreach ($sub_categories as $val):
                                                if($val["id_sub_categorie"] == $produit->id_sub_categorie) {
                                                    $sub_cat_exists = true;
                                                }
                                            ?>
                                            <option value="<?=$val["id_sub_categorie"]?>"
                                                    data-id_categorie="<?=$val["id_categorie"]?>"
                                            >
                                                <?=$val["full_name"]?>
                                            </option>
                                        <?php endforeach; ?>
                                        <?php if(!$sub_cat_exists): ?>
                                            <option value="<?=$produit->id_sub_categorie?>"
                                                    data-id_categorie="<?=$produit->id_categorie?>"
                                            >
                                                <?=$produit_sub_categorie->full_name?>
                                            </option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Code Produit Composé :</label>
                                <input type="text" class="form-control" name="code_produit" id="code_produit" value="<?=$produit->code_produit?>" placeholder="Code Produit Composé" required>
                                <span style="color: red; display: none;" id="code_produit_exists"></span>
                            </div>
                            <div class="form-group">
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Nom de Produit :</label>
                                <input type="text" class="form-control" name="full_name" value="<?=$produit->full_name?>" placeholder="Nom de Produit" required>
                            </div>
                            <div class="form-group">
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Prix d'achat <small>(DH)</small> :</label>
                                <input type="number" step="any" class="form-control text-info" name="prix_achat" id="prix_achat" value="<?=number_format($produit->prix_achat, 2, ".", "")?>" placeholder="Prix d'achat" readonly required>
                            </div>
                            <div class="form-group">
                                <label class="text-primary">Coût de revient <small>(DH)</small> :</label>
                                <input style="border: 1px solid #337ab7" type="number" step="any" class="form-control text-info" id="cout_revient" placeholder="Coût de revient" readonly required>
                            </div>
                            <div class="form-group">
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Prix de vente <small>(DH)</small> :</label>
                                <input type="number" step="any" min="0" class="form-control" name="prix_vente" id="prix_vente" value="<?=number_format($produit->prix_vente, 2, ".", "")?>" placeholder="Prix de vente" required>
                            </div>
                            <div class="form-group">
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Alert de stock :</label>
                                <input type="number" min="1" class="form-control" name="alert" id="alert" value="<?=$produit->alert?>" placeholder="Alert de stock" required>
                            </div>
                            <div class="form-group">
                                <label>Image de Produit : </label> &nbsp; <small>( gif | jpg | png | bmp )</small>
                                <?php if(!empty($produit->image) && file_exists(_UPLOADS_PATH_.$produit->image)): ?>

                                    <?php if($this->session->userdata("role_user") == 1): ?>
                                        <a href="#" onclick="confirmDelete('form_delete')" class="text-red" style="float: right;">
                                            <strong>&nbsp;&nbsp; [ <i class="fa fa-picture-o"></i> Supprimer ]</strong>
                                        </a>
                                    <?php endif; ?>
                                    <a href="#" onclick='showImage("<?=$produit->full_name?>", "<?=$produit->image?>")' style="float: right;">
                                        <strong>[ <i class="fa fa-picture-o"></i> Afficher ]</strong>
                                    </a>

                                <?php endif; ?>
                                <input type="file" accept="image/*" class="form-control" name="image" placeholder="Image de Produit">
                            </div>
                            <div class="form-group">
                                <label>Description :</label>
                                <textarea name="description" class="form-control" maxlength="200" rows="3" placeholder="Description"><?=$produit->description?></textarea>
                            </div>
                            <?php if($this->session->userdata("role_user") == 1): ?>
                                <div class="form-group">
                                    <div class="checkbox text-danger" style="margin-top: 5px;">
                                        <label>
                                            <input type="checkbox" id="display" name="display" value="false" <?=$produit->display == 0 ? "checked" : ""?>> <b>Mettre dans les archives.</b>
                                        </label>
                                    </div>
                                    <input type="checkbox" id="display_hide_updated" class="hidden" name="display_hide_updated" value="true">
                                </div>
                            <?php endif; ?>
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
                                    <td><input type="text" value="0" id="total_categories" class="form-control" readonly></td>
                                </tr>
                                <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                    <tr>
                                        <th style="vertical-align: middle; white-space: nowrap; width: 1%;">Sous-Catégories </th>
                                        <td><input type="text" value="0" id="total_sub_categories" class="form-control" readonly></td>
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <th style="vertical-align: middle; white-space: nowrap; width: 1%;">Produits </th>
                                    <td><input type="text" value="0" id="total_produits" class="form-control" readonly></td>
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
<?php if($this->session->userdata("role_user") == 1): ?>
    <form method="post" action="<?=base_url()."index.php/produit/supprimer_image/"?>" id="form_delete" style="display:none;">
        <input type="hidden" name="image_id_produit" value="<?=$produit->id_produit?>">
    </form>
<?php endif; ?>

<script type="text/javascript">
    var selected_produit = <?=json_encode($ids)?>;

    $(document).ready(function ()
    {
        $('#id_categorie').select2({ placeholder: "Selectionner une catégorie" });
        $('#id_categorie').val('<?=$produit->id_categorie?>').trigger("change");

        <?php if(_ENABLE_SUB_CATEGORIE_): ?>
        $('#id_sub_categorie').select2({ placeholder: "Selectionner une sous-catégorie" });
        $('#id_sub_categorie').val('<?=$produit->id_sub_categorie?>').trigger("change");
        <?php endif; ?>
        
        fixTable("tbody_produit");

        createProduitCodeInput(
            "#code_produit_temp",
            function (option) {
                createProduitRow(option);
            },
            "NO",
            "OK",
            0 // Without 'Produit Composé'
        );

        createProduitSearchInput(
            "#id_produit_temp",
            function (option) {
                createProduitRow(option);
            },
            true,
            "NO",
            "OK",
            0 // Without 'Produit Composé'
        );

        $("#code_produit").on("keyup", function (e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode !== 13) {
                checkCodeExists("produit", <?=$produit->id_produit?>);
            }
        });
        $("#code_produit").on("keypress", function (e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });

        $("form").on("submit", function (event) {
            event.preventDefault();
            var form = this;
            if($("[name='id_produit[]']").length > 0) {
                $("#alert_produit").hide();
                checkCodeExists("produit", <?=$produit->id_produit?>, function () {
                    $(form).unbind("submit").submit();
                });
            }
            else {
                $("#alert_produit").show();
                $("html, body").animate({ scrollTop: 0 }, "fast");
            }
        });

        getTotal();

        $("#prix_achat").val(<?=number_format($produit->prix_achat, 2, ".", "")?>);
        $("#prix_vente").val(<?=number_format($produit->prix_vente, 2, ".", "")?>);
    });

    function getTotal()
    {
        var prix_vente = 0;
        var cout_revient = 0;
        var prix_achat = 0;
        for (var prc of selected_produit) {
            prix_vente += parseFloat( $("#prix_vente_"+prc).val() ) * parseFloat( $("#quantite_"+prc).val() );
            cout_revient += parseFloat( $("#cout_revient_"+prc).val() ) * parseFloat( $("#quantite_"+prc).val() );
            prix_achat += parseFloat( $("#prix_achat_"+prc).val() ) * parseFloat( $("#quantite_"+prc).val() );
        }
        $("#prix_vente").val(prix_vente.toFixed(2));
        $("#cout_revient").val(cout_revient.toFixed(2));
        $("#prix_achat").val(prix_achat.toFixed(2));

        var total_produit = 0;
        $(".quantite_total").each(function (i, el) {
            total_produit += parseFloat($(el).val());
        });
        $("#total_produits").val(total_produit);

        var temp_c = [];
        $(".tr_categorie").each(function (i, el) {
            if(!temp_c.includes($(el).html())) {
                temp_c.push($(el).html());
            }
        });
        $("#total_categories").val(temp_c.length);

        <?php if(_ENABLE_SUB_CATEGORIE_): ?>
        var temp_sc = [];
        $(".tr_sub_categorie").each(function (i, el) {
            if(!temp_sc.includes($(el).html())) {
                temp_sc.push($(el).html());
            }
        });
        $("#total_sub_categories").val(temp_sc.length);
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
                                    <input type="hidden" id="prix_vente_`+id+`" value="`+option.data("prix_vente")+`">
                                    <input type="hidden" id="cout_revient_`+id+`" value="`+option.data("cout_revient")+`">
                                    <input type="hidden" id="prix_achat_`+id+`" value="`+option.data("prix_achat")+`">
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