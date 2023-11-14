<div class="row">
    <div class="col-md-1"></div>
    <form method="post" action="<?=base_url()?>index.php/fournisseur/modifier">
        <div class="col-md-10">
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Modifier Fournisseur</h3>
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
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Code Fournisseur : </label>
                                <input type="text" class="form-control" name="code_fournisseur" id="code_fournisseur" placeholder="Code Fournisseur" required>
                                <span style="color: red; display: none;" id="code_fournisseur_exists"></span>
                                <input type="hidden" name="id_fournisseur" value="<?=$fournisseur->id_fournisseur?>">
                            </div>
                            <div class="form-group">
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Nom de Fournisseur :</label>
                                <input type="text" class="form-control" name="full_name" value="<?=$fournisseur->full_name?>" placeholder="Nom de Fournisseur" required>
                            </div>
                            <div class="form-group">
                                <label>ICE :</label>
                                <input type="text" class="form-control" name="ice" value="<?=$fournisseur->ice?>" placeholder="ICE">
                            </div>
                            <div class="form-group">
                                <label>Résponsable :</label>
                                <input type="text" class="form-control" name="responsable" value="<?=$fournisseur->responsable?>" placeholder="Résponsable" >
                            </div>
                            <div class="form-group">
                                <label>Description :</label>
                                <textarea name="description" class="form-control" maxlength="200" rows="3" placeholder="Description"><?=$fournisseur->description?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Téléphone :</label>
                                <input type="text" class="form-control" name="telephone" value="<?=$fournisseur->telephone?>" placeholder="Téléphone">
                            </div>
                            <div class="form-group">
                                <label>Email :</label>
                                <input type="email" class="form-control" name="email" value="<?=$fournisseur->email?>" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Adresse :</label>
                                <input type="text" class="form-control" name="adresse" value="<?=$fournisseur->adresse?>" placeholder="Adresse">
                            </div>
                            <div class="form-group">
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Ville :</label>
                                <input type="text" class="form-control" name="ville" value="<?=$fournisseur->ville?>" placeholder="Ville" required>
                            </div>
                            <div class="form-group">
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Pays :</label>
                                <select class="form-control select2" id="pays" name="pays" required>
                                    <?php foreach (getCountries() as $country): ?>
                                        <option value="<?=$country->name?>">
                                            <?=$country->name?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <?php if($this->session->userdata("role_user") == 1): ?>
                        <div class="col-md-12">
                                <?php if($fournisseur->display == 1): ?>
                                <div class="checkbox" style="margin-top: 0px;">
                                    <label>
                                        <input type="checkbox" name="update_all" value="true"> Mettre à jour les Données dans toutes les <b>Commandes</b>/<b>Achats</b> liées.
                                    </label>
                                </div>
                                <?php endif; ?>
                                <div class="checkbox text-danger" style="margin-top: 5px;">
                                    <label>
                                        <input type="checkbox" id="display" name="display" value="false" <?=$fournisseur->display == 0 ? "checked" : ""?>> <b>Mettre dans les archives.</b>
                                    </label>
                                </div>
                                <input type="checkbox" id="display_hide_updated" class="hidden" name="display_hide_updated" value="true">
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="box-footer" style="text-align: center;">
                    <button type="submit" style="width: 40%;" class="btn btn-primary">
                        <i class="fa fa-save"></i> &nbsp; Mettre à jour
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function ()
    {
        $('.select2').select2({
            placeholder: "Selectionner un pays",
        });

        $("#pays").val("<?=$fournisseur->pays?>").trigger("change");

        createCodeChecker(
            "fournisseur",
            "F",
            "<?=$fournisseur->code_fournisseur?>",
            <?=$fournisseur->id_fournisseur?>
        );

        <?php if($fournisseur->display == 0) { echo 'initArchiveCheckbox();'; } ?>

        $("form").on("submit", function (event) {
            event.preventDefault();
            var form = this;
            checkCodeExists("fournisseur", <?=$fournisseur->id_fournisseur?>, function () {
                $(form).unbind("submit").submit();
            });
        });
    });
</script>