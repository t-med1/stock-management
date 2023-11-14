<div class="row">
    <div class="col-md-3"></div>
    <form method="post" action="<?=base_url()?>index.php/service/ajouter" enctype="multipart/form-data">
        <div class="col-md-6">
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Ajouter Service</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Catégorie :</label>
                        <select class="form-control select2" name="id_categorie" id="id_categorie" required>
                            <?php foreach ($categories as $val): ?>
                                <option value="<?=$val["id_categorie"]?>">
                                    <?=$val["full_name"]?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                        <div class="form-group">
                            <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Sous-Catégorie :</label>
                            <select class="form-control select2" name="id_sub_categorie" id="id_sub_categorie" required>
                                <?php foreach ($sub_categories as $val): ?>
                                    <option value="<?=$val["id_sub_categorie"]?>"
                                            data-id_categorie="<?=$val["id_categorie"]?>"
                                    >
                                        <?=$val["full_name"]?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Nom de Service :</label>
                        <input type="text" class="form-control" name="full_name" placeholder="Nom de Service" required>
                    </div>
                    <div class="form-group">
                        <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Prix de Vente (DH) :</label>
                        <input type="number" step="any" min="0" class="form-control" name="prix_vente" placeholder="Prix de Vente" required>
                    </div>
                    <div class="form-group">
                        <label> Description :</label>
                        <input type="text" maxlength="200" class="form-control" name="description" placeholder="Description">
                    </div>
                    <div class="form-group">
                        <label>Image de Service : </label> &nbsp; <small>( gif | jpg | png | bmp )</small>
                        <input type="file" accept="image/*" class="form-control" name="image" placeholder="Image de Service">
                    </div>
                </div>
                <div class="box-footer" style="text-align: center;">
                    <button type="submit" style="width: 50%;" class="btn btn-primary">
                        <i class="fa fa-save"></i> &nbsp; Enregistrer
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#id_categorie').select2({ placeholder: "Selectionner une catégorie" });
        $('#id_categorie').val('').trigger("change");

        <?php if(_ENABLE_SUB_CATEGORIE_): ?>
        $('#id_sub_categorie').select2({ placeholder: "Selectionner une sous-catégorie" });
        $('#id_sub_categorie').val('').trigger("change");
        <?php endif; ?>

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
        <?php endif; ?>
    });
</script>