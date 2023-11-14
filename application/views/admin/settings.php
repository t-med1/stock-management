<div class="row">
    <form method="post" action="<?=base_url()?>index.php/admin/settings">
        <div class="col-md-12">
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Informations Générales</h3>
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
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> STE : </label>
                                <input type="text" class="form-control" name="full_name" value="<?=!empty($information->full_name) ? $information->full_name : ""?>" placeholder="STE" required>
                            </div>
                            <div class="form-group">
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Adresse :</label>
                                <input type="text" class="form-control" name="adresse" value="<?=!empty($information->adresse) ? $information->adresse : ""?>" placeholder="Adresse" required>
                            </div>
                            <div class="form-group">
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Ville :</label>
                                <input type="text" class="form-control" name="ville" value="<?=!empty($information->ville) ? $information->ville : ""?>" placeholder="Ville" required>
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
                            <div class="form-group">
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Téléphone :</label>
                                <input type="text" class="form-control" name="telephone" value="<?=!empty($information->telephone) ? $information->telephone : ""?>" placeholder="Téléphone" required>
                            </div>
                            <div class="form-group">
                                <label>Fix :</label>
                                <input type="text" class="form-control" name="fix" value="<?=!empty($information->fix) ? $information->fix : ""?>" placeholder="Fix">
                            </div>
                            <div class="form-group">
                                <label>Email :</label>
                                <input type="email" class="form-control" name="email" value="<?=!empty($information->email) ? $information->email : ""?>" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Site Web :</label>
                                <input type="text" class="form-control" name="web" value="<?=!empty($information->web) ? $information->web : ""?>" placeholder="Site Web">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Bank :</label>
                                <input type="text" class="form-control" name="bank" value="<?=!empty($information->bank) ? $information->bank : ""?>" placeholder="Bank">
                            </div>
                            <div class="form-group">
                                <label>RIB :</label>
                                <input type="text" class="form-control" name="num_rib" value="<?=!empty($information->num_rib) ? $information->num_rib : ""?>" placeholder="RIB">
                            </div>
                            <div class="form-group">
                                <label>RC : </label>
                                <input type="text" class="form-control" name="num_rc" value="<?=!empty($information->num_rc) ? $information->num_rc : ""?>" placeholder="RC">
                            </div>
                            <div class="form-group">
                                <label>Patente :</label>
                                <input type="text" class="form-control" name="num_patente" value="<?=!empty($information->num_patente) ? $information->num_patente : ""?>" placeholder="Patente">
                            </div>
                            <div class="form-group">
                                <label>IF :</label>
                                <input type="text" class="form-control" name="num_if" value="<?=!empty($information->num_if) ? $information->num_if : ""?>" placeholder="IF">
                            </div>
                            <div class="form-group">
                                <label>ICE :</label>
                                <input type="text" class="form-control" name="num_ice" value="<?=!empty($information->num_ice) ? $information->num_ice : ""?>" placeholder="ICE">
                            </div>
                            <div class="form-group">
                                <label>CNSS :</label>
                                <input type="text" class="form-control" name="num_cnss" value="<?=!empty($information->num_cnss) ? $information->num_cnss : ""?>" placeholder="CNSS">
                            </div>
                            <div class="form-group">
                                <label>Message d'impression :</label>
                                <input class="form-control" name="print_message" placeholder="Message d'impression" maxlength="200" value="<?=!empty($information->print_message) ? $information->print_message : ""?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div style="width: 100%; text-align: center; margin-top: 20px;">
                <button type="submit" style="width: 40%;" class="btn btn-primary">
                    <i class="fa fa-save"></i> &nbsp; Mettre à jour
                </button>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#pays").select2({ placeholder: "Selectionner un Pays" });
        $("#pays").val('<?=!empty($information->pays) ? $information->pays : "Maroc"?>').trigger("change");
    });
</script>