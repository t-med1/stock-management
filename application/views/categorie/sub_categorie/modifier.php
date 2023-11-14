<div class="row">
    <div class="col-md-3"></div>
    <form method="post" action="<?=base_url()?>index.php/sub_categorie/modifier">
        <div class="col-md-6">
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Modifier Sous-Catégorie</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <input type="hidden" name="id_sub_categorie" value="<?=$sub_categorie->id_sub_categorie?>">
                    <div class="form-group">
                        <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Catégorie :</label>
                        <select id="id_categorie" name="id_categorie" class="form-control select2" required>
                            <?php foreach ($categories as $val): ?>
                                <option value="<?=$val["id_categorie"]?>"><?=$val["full_name"]?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Nom de Sous-Catégorie :</label>
                        <input type="text" class="form-control" name="full_name" value="<?=$sub_categorie->full_name?>" placeholder="Nom de Sous-Catégorie" required>
                    </div>
                    <div class="form-group">
                        <label>Description :</label>
                        <textarea class="form-control" name="description" placeholder="Description" maxlength="200" rows="3"><?=$sub_categorie->description?></textarea>
                    </div>
                    <?php if($this->session->userdata("role_user") == 1): ?>
                        <div class="checkbox text-danger" style="margin-top: 5px;">
                            <label>
                                <input type="checkbox" id="display" name="display" value="false" <?=$sub_categorie->display == 0 ? "checked" : ""?>> <b>Mettre dans les archives.</b>
                            </label>
                        </div>
                        <input type="checkbox" id="display_hide_updated" class="hidden" name="display_hide_updated" value="true">
                    <?php endif; ?>
                </div>
                <div class="box-footer" style="text-align: center;">
                    <button type="submit" style="width: 50%;" class="btn btn-primary">
                        <i class="fa fa-save"></i> &nbsp; Mettre à jour
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $("#id_categorie").select2({ placeholder: "Selectionner une catégorie" });
        $("#id_categorie").val('<?=$sub_categorie->id_categorie?>').trigger("change");

        <?php if($sub_categorie->display == 0) { echo 'initArchiveCheckbox();'; } ?>
    });
</script>
