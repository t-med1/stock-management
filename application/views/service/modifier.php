<div class="row">

    <div class="col-md-3"></div>

    <form method="post" action="<?=base_url()?>index.php/service/modifier" enctype="multipart/form-data">

        <div class="col-md-6">

            <div class="box box-default box-solid">

                <div class="box-header with-border">

                    <h3 class="box-title">Modifier Service</h3>

                    <div class="box-tools pull-right">

                        <button type="button" class="btn btn-box-tool" data-widget="collapse">

                            <i class="fa fa-minus"></i>

                        </button>

                    </div>

                </div>

                <div class="box-body">

                    <input type="hidden" name="id_service" value="<?=$service->id_service?>">

                    <div class="form-group">

                        <label>Catégorie :</label>

                        <select class="form-control select2" name="id_categorie" id="id_categorie" required>

                            <?php

                            $cat_exists = false;

                            foreach ($categories as $val):

                                if($val["id_categorie"] == $service->id_categorie) {

                                    $cat_exists = true;

                                }

                                ?>

                                <option value="<?=$val["id_categorie"]?>">

                                    <?=$val["full_name"]?>

                                </option>

                            <?php endforeach; ?>

                            <?php if(!$cat_exists): ?>

                                <option value="<?=$service->id_sub_categorie?>"

                                        data-id_categorie="<?=$service->id_categorie?>"

                                >

                                    <?=$service_categorie->full_name?>

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

                                    if($val["id_sub_categorie"] == $service->id_sub_categorie) {

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

                                    <option value="<?=$service->id_sub_categorie?>"

                                            data-id_categorie="<?=$service->id_categorie?>"

                                    >

                                        <?=$service_sub_categorie->full_name?>

                                    </option>

                                <?php endif; ?>

                            </select>

                        </div>

                    <?php endif; ?>

                    <div class="form-group">

                        <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Nom de Service :</label>

                        <input type="text" class="form-control" name="full_name" value="<?=$service->full_name?>" placeholder="Nom de Service" required>

                    </div>

                    <div class="form-group">

                        <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Prix de Vente (DH) :</label>

                        <input type="number" step="any" min="0" class="form-control" name="prix_vente" value="<?=$service->prix_vente?>" placeholder="Prix de Vente" required>

                    </div>

                    <div class="form-group">

                        <label> Description :</label>

                        <input type="text" maxlength="200" class="form-control" name="description" value="<?=$service->description?>" placeholder="Description">

                    </div>

                    <div class="form-group">

                        <label>Image de Service : </label> &nbsp; <small>( gif | jpg | png | bmp )</small>

                        <?php if(!empty($service->image) && file_exists(_UPLOADS_PATH_.$service->image)): ?>



                            <?php if($this->session->userdata("role_user") == 1): ?>

                                <a href="#" onclick="confirmDelete('form_delete')" class="text-red" style="float: right;">

                                    <strong>&nbsp;&nbsp; [ <i class="fa fa-picture-o"></i> Supprimer ]</strong>

                                </a>

                            <?php endif; ?>

                            <a href="#" onclick='showImage("<?=$service->full_name?>", "<?=$service->image?>")' style="float: right;">

                                <strong>[ <i class="fa fa-picture-o"></i> Afficher ]</strong>

                            </a>



                        <?php endif; ?>

                        <input type="file" accept="image/*" class="form-control" name="image" placeholder="Image de Service">

                    </div>

                    <div class="form-group">
    <div class="checkbox text-danger" style="margin-top: 5px;">
        <label>
            <input type="checkbox" id="display" name="display" value="false" <?= isset($service->display) && $service->display == 0 ? "checked" : "" ?>> <b>Mettre dans les archives.</b>
        </label>
    </div>
    <input type="checkbox" id="display_hide_updated" class="hidden" name="display_hide_updated" value="true">
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

        <form method="post" action="<?=base_url()."index.php/service/supprimer_image/"?>" id="form_delete" style="display:none;">

            <input type="hidden" name="image_id_service" value="<?=$service->id_service?>">

        </form>

    <?php endif; ?>

</div>



<script type="text/javascript">

    $(document).ready(function () {

        $('#id_categorie').select2({ placeholder: "Selectionner une catégorie" });

        $('#id_categorie').val('<?=$service->id_categorie?>').trigger("change");



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

        $('#id_sub_categorie').val('<?=$service->id_sub_categorie?>').trigger("change");

        <?php endif; ?>



        <?php if($service->display == 0) { echo 'initArchiveCheckbox();'; } ?>
        <?php
        // Initialize $display variable to 0 if it's not defined in $service
        if (!isset($service->display)) {
            $service->display = 0;
        }
        ?>

        // Initialize the archive checkbox based on $service->display value
        function initArchiveCheckbox() {
            if (<?= $service->display ?> === 0) {
                $('#display').prop('checked', true);
            }
        }

        // Call the function to initialize the checkbox
        initArchiveCheckbox();

    });

</script>