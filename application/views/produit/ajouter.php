<div class="row">
    <div class="col-md-1"></div>
    <form method="post" action="<?=base_url()?>index.php/produit/ajouter" enctype="multipart/form-data">
        <div class="col-md-10">
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Ajouter Produit</h3>
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
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Code Produit :</label>
                                <input type="text" class="form-control" name="code_produit" id="code_produit" value="<?=!empty($this->session->flashdata("form_data")["code_produit"])?$this->session->flashdata("form_data")["code_produit"]:$code_produit?>" placeholder="Code de Produit" required>
                                <span style="color: red; display: none;" id="code_produit_exists"></span>
                            </div>
                            <div class="form-group">
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Nom de Produit :</label>
                                <input type="text" class="form-control" name="full_name" value="<?=!empty($this->session->flashdata("form_data")["full_name"])?$this->session->flashdata("form_data")["full_name"]:""?>" placeholder="Nom de Produit" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Prix d'Achat (DH) :</label>
                                <input type="number" step="any" min="0" class="form-control" name="prix_achat" value="<?=!empty($this->session->flashdata("form_data")["prix_achat"])?$this->session->flashdata("form_data")["prix_achat"]:""?>" id="prix_achat" placeholder="Prix d'Achat" required>
                            </div>
                            <div class="form-group">
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Prix de Vente (DH) :</label>
                                <input type="number" step="any" min="0" class="form-control" name="prix_vente" value="<?=!empty($this->session->flashdata("form_data")["prix_vente"])?$this->session->flashdata("form_data")["prix_vente"]:""?>" placeholder="Prix de Vente" required>
                            </div>
                            <div class="form-group">
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Alert de stock :</label>
                                <input type="number" min="1" class="form-control" name="alert" value="<?=!empty($this->session->flashdata("form_data")["alert"])?$this->session->flashdata("form_data")["alert"]:""?>" placeholder="Alert de stock" required>
                            </div>
                            <div class="form-group">
                                <label>Image de Produit : </label> &nbsp; <small>( gif | jpg | png | bmp )</small>
                                <input type="file" accept="image/*" class="form-control" name="image" placeholder="Image de Produit">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description :</label>
                                <textarea name="description" class="form-control" maxlength="200" rows="3" placeholder="Description"></textarea>
                            </div>
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
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#id_categorie').select2({ placeholder: "Selectionner une catégorie" });
        $('#id_categorie').val('<?=!empty($this->session->flashdata("form_data")["id_categorie"])?$this->session->flashdata("form_data")["id_categorie"]:""?>').trigger("change");

        <?php if(_ENABLE_SUB_CATEGORIE_): ?>
        $('#id_sub_categorie').select2({ placeholder: "Selectionner une sous-catégorie" });
        $('#id_sub_categorie').val('<?=!empty($this->session->flashdata("form_data")["id_sub_categorie"])?$this->session->flashdata("form_data")["id_sub_categorie"]:""?>').trigger("change");
        <?php endif; ?>

        $("#code_produit").on("keyup", function (e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode !== 13) {
                checkCodeExists("produit");
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
        <?php endif; ?>

        $("form").on("submit", function (event) {
            event.preventDefault();
            var form = this;
            checkCodeExists("produit", "", function () {
                $(form).unbind("submit").submit();
            });
        });
    });
</script>