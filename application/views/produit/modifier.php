<div class="row">

    <div class="col-md-1"></div>

    <form method="post" action="<?=base_url()?>index.php/produit/modifier" enctype="multipart/form-data">



        <input type="hidden" name="id_produit" value="<?=$produit->id_produit?>">



        <div class="col-md-10">

            <div class="box box-default box-solid">

                <div class="box-header with-border">

                    <h3 class="box-title">Modifier Produit</h3>

                    <div class="box-tools pull-right">

                        <button type="button" class="btn btn-box-tool" data-widget="collapse">

                            <i class="fa fa-minus"></i>

                        </button>

                    </div>

                </div>

                <div class="box-body">

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Catégorie :</label>

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

                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Code Produit :</label>

                                <input type="text" class="form-control" name="code_produit" id="code_produit" value="<?=!empty($this->session->flashdata("form_data")["code_produit"])?$this->session->flashdata("form_data")["code_produit"]:$produit->code_produit?>" placeholder="code Produit" required>

                                <span style="color: red; display: none;" id="code_produit_exists"></span>

                            </div>

                            <div class="form-group">

                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Nom de Produit :</label>

                                <input type="text" class="form-control" name="full_name" value="<?=!empty($this->session->flashdata("form_data")["full_name"])?$this->session->flashdata("form_data")["full_name"]:$produit->full_name?>" placeholder="Nom de Produit" required>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Prix d'Achat (DH) :</label>

                                <input type="number" step="any" min="0" class="form-control" name="prix_achat" value="<?=!empty($this->session->flashdata("form_data")["prix_achat"])?$this->session->flashdata("form_data")["prix_achat"]:$produit->prix_achat?>" placeholder="Prix d'Achat" required>

                            </div>

                            <!-- <div class="form-group">

                                <label class="text-primary">Coût de revient (DH) :</label>

                                <input type="text" class="form-control" style="border: 1px solid #337ab7" value="<?=number_format(getCoutRevient($produit->id_produit),2,".","")?>" placeholder="Coût de revient" readonly>

                            </div> -->

                            <div class="form-group">

                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Prix de Vente (DH) :</label>

                                <input type="number" step="any" min="0" class="form-control" name="prix_vente" value="<?=!empty($this->session->flashdata("form_data")["prix_vente"])?$this->session->flashdata("form_data")["prix_vente"]:$produit->prix_vente?>" placeholder="Prix de Vente" required>

                            </div>

                            <div class="form-group">

                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Alert de stock :</label>

                                <input type="number" min="1" class="form-control" name="alert" value="<?=!empty($this->session->flashdata("form_data")["alert"])?$this->session->flashdata("form_data")["alert"]:$produit->alert?>" placeholder="Alert de stock" required>

                            </div>

                        </div>

                        <div class="col-md-12">

                            <div class="form-group">

                                <label>Image de Produit : </label> &nbsp; <small>( gif | jpg | png | bmp )</small>

                                <?php if(!empty($produit->image) && file_exists(_UPLOADS_PATH_.$produit->image)): ?>



                                    <?php if($this->session->userdata("role_user") == 1): ?>

                                        <a href="#" onclick="confirmDelete('form_delete')" class="text-red" style="float: right;">

                                            <strong>&nbsp;&nbsp; [ <i class="fa fa-picture-o"></i> Supprimer ]</strong>

                                        </a>

                                    <?php endif; ?>

                                    <a href="#" onclick='showImage("<?=!empty($this->session->flashdata("form_data")["full_name"])?$this->session->flashdata("form_data")["full_name"]:$produit->full_name?>", "<?=$produit->image?>")' style="float: right;">

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

                <div class="box-footer" style="text-align: center;">

                    <button type="submit" style="width: 50%;" class="btn btn-primary">

                        <i class="fa fa-save"></i> &nbsp; Mettre à jour

                    </button>

                </div>

            </div>

        </div>

    </form>

    <?php if($this->session->userdata("role_user") == 1): ?>

        <form method="post" action="<?=base_url()."index.php/produit/supprimer_image/"?>" id="form_delete" style="display:none;">

            <input type="hidden" name="image_id_produit" value="<?=$produit->id_produit?>">

        </form>

    <?php endif; ?>

</div>



<script type="text/javascript">

    $(document).ready(function () {

        $('#id_categorie').select2({ placeholder: "Selectionner une catégorie" });

        $('#id_categorie').val('<?=!empty($this->session->flashdata("form_data")["id_categorie"])?$this->session->flashdata("form_data")["id_categorie"]:$produit->id_categorie?>').trigger("change");



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



        <?php if(_ENABLE_SUB_CATEGORIE_): ?>

        // Filter Sub Categories

        $("#id_categorie").on("change", function ()

        {

            if($(this).val() != undefined && $(this).val() != null && $(this).val() != "")

            {

                var categorie = $(this).val();



                $("#id_sub_categorie > option").each(function() {

                    if($(this).data("id_categorie") == categorie) {

                        $(this).removeAttr("disabled");

                    }

                    else {

                        $(this).attr("disabled", "disabled");

                    }

                });

            }

            else

            {

                $("#id_sub_categorie > option").each(function() {

                    $(this).removeAttr("disabled");

                });

            }



            $('#id_sub_categorie').select2({

                placeholder: "Selectionner une sous-catégorie",

            });

            $("#id_sub_categorie").val('').trigger("change");

        });



        $("#id_categorie").trigger("change");



        $('#id_sub_categorie').select2({ placeholder: "Selectionner une sous-catégorie" });

        $('#id_sub_categorie').val('<?=!empty($this->session->flashdata("form_data")["id_sub_categorie"])?$this->session->flashdata("form_data")["id_sub_categorie"]:$produit->id_sub_categorie?>').trigger("change");

        <?php endif; ?>



        <?php if($produit->display == 0) { echo 'initArchiveCheckbox();'; } ?>



        $("form").on("submit", function (event) {

            event.preventDefault();

            var form = this;

            checkCodeExists("produit", <?=$produit->id_produit?>, function () {

                $(form).unbind("submit").submit();

            });

        });

    });

</script>