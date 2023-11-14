<div class="row">
    <div class="col-md-1"></div>
    <form method="post" action="<?=base_url()?>index.php/client/modifier">
        <div class="col-md-10">
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Modifier Client</h3>
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
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Code Client :</label>
                                <input type="text" class="form-control" name="code_client" id="code_client" placeholder="Code Client" required>
                                <span style="color: red; display: none;" id="code_client_exists"></span>
                                <input type="hidden" name="id_client" value="<?=$client->id_client?>">
                            </div>
                            <div class="form-group">
                                <label>ICE :</label>
                                <input type="text" class="form-control" name="ice" value="<?=$client->ice?>" placeholder="ICE">
                            </div>
                            <div class="form-group">
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span><?php if($client->role_client == "cite"):?> Nom De Cite :<?php else:?>Nom de Client :<?php endif;?></label>
                                <input type="text" class="form-control" name="full_name" value="<?=$client->full_name?>" placeholder="Nom de Client" required>
                            </div>
                            <div class="form-group">
                                <label>Résponsable :</label>
                                <input type="text" class="form-control" name="responsable" value="<?=$client->responsable?>" placeholder="Résponsable" >
                            </div>
                            <?php if($client->role_client !== "cite"):?>
                                <div class="form-group">
                                    <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Remise (%) :</label>
                                    <input type="number" min="0" class="form-control" name="remise" value="<?=$client->remise?>" step="any" placeholder="Remise" <?=$client->id_client!=1 && $this->session->userdata("role_user")==1 ? "required":"disabled"?>>
                                </div>
                            <?php endif;?>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Téléphone :</label>
                                <input type="text" class="form-control" name="telephone" value="<?=$client->telephone?>" placeholder="Téléphone">
                            </div>
                            <div class="form-group">
                                <label>Email :</label>
                                <input type="email" class="form-control" name="email" value="<?=$client->email?>" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Adresse :</label>
                                <input type="text" class="form-control" name="adresse" value="<?=$client->adresse?>" placeholder="Adresse">
                            </div>
                            <input type="hidden" class="form-control" name="role" value="<?=$client->role_client?>">
                            <div class="form-group">
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Ville :</label>
                                <input type="text" class="form-control" name="ville" value="<?=$client->ville?>" placeholder="Ville" required>
                            </div>
                            <div class="form-group">
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Pays :</label>
                                <select class="form-control select2" name="pays" id="pays" required>
                                    <?php foreach (getCountries() as $country): ?>
                                        <option value="<?=$country->name?>">
                                            <?=$country->name?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description :</label>
                                <textarea name="description" class="form-control" maxlength="200" rows="3" placeholder="Description"><?=$client->description?></textarea>
                            </div>
                            <?php if($this->session->userdata("role_user") == 1 && $client->id_client != 1): ?>
                                <?php if($client->display == 1): ?>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="update_all" value="true"> Mettre à jour les Données dans toutes les <b>Commandes</b>/<b>Devis</b>/<b>Ventes</b>/<b>Bons d'Avoirs</b> liées.
                                    </label>
                                </div>
                                <?php endif; ?>
                                    <div class="checkbox text-danger" style="margin-top: 5px;">
                                        <label>
                                            <input type="checkbox" id="display" name="display" value="false" <?=$client->display == 0 ? "checked" : ""?>> <b>Mettre dans les archives.</b>
                                        </label>
                                    </div>
                                <input type="checkbox" id="display_hide_updated" class="hidden" name="display_hide_updated" value="true">
                            <?php endif; ?>
                        </div>
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

        $("#pays").val("<?=$client->pays?>").trigger("change");

        createCodeChecker(
            "client",
            "C",
            "<?=$client->code_client?>",
            <?=$client->id_client?>
        );

        <?php if($client->display == 0) { echo 'initArchiveCheckbox();'; } ?>

        $("form").on("submit", function (event) {
            event.preventDefault();
            var form = this;
            checkCodeExists("client", <?=$client->id_client?>, function () {
                $(form).unbind("submit").submit();
            });
        });
    });
</script>