<div class="row">
    <div class="col-md-1"></div>
    <form method="post" action="<?=base_url()?>index.php/client/ajouter">
        <div class="col-md-10">
        <div class="box box-default box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Ajouter Client</h3>
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
                            <label id="code_client_label"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Code Client :</label>
                            <input type="text" class="form-control" name="code_client" id="code_client" placeholder="Code Client" readonly required>
                            <span style="color: red; display: none;" id="code_client_exists"></span>
                        </div>
                        <div class="form-group">
                            <label>ICE :</label>
                            <input type="text" class="form-control" name="ice" placeholder="ICE">
                        </div>
                        <div class="form-group">
                            <label id="full_name_label"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Nom de Client :</label>
                            <input type="text" class="form-control" name="full_name" placeholder="Nom de Client" id="full_name" required>
                        </div>
                        <div class="form-group">
                            <label>Résponsable :</label>
                            <input type="text" class="form-control" name="responsable" placeholder="Résponsable" >
                        </div>
                        <div class="form-group" id="remise_group">
                            <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Remise (%) :</label>
                            <input type="number" min="0" class="form-control" name="remise" value="0" step="any" placeholder="Remise" <?=$this->session->userdata("role_user")==1?"required":"disabled"?>>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Téléphone :</label>
                            <input type="text" class="form-control" name="telephone" placeholder="Téléphone">
                        </div>
                        <div class="form-group">
                            <label>Email :</label>
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Adresse :</label>
                            <input type="text" class="form-control" name="adresse" placeholder="Adresse">
                        </div>
                        <div class="form-group">
                            <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Ville :</label>
                            <input type="text" class="form-control" name="ville" placeholder="Ville" required>
                        </div>
                        <input type="hidden" class="form-control" name="role" id="role">
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
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Description :</label>
                            <textarea name="description" class="form-control" maxlength="200" rows="3" placeholder="Description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="switch" class="text-danger">Ajouter Cite ?</label>
                    <input type="checkbox" id="switch">
                </div>
            </div>

            <div class="box-footer" style="text-align: center;">
                <button type="submit" style="width: 40%;" class="btn btn-primary">
                    <i class="fa fa-save"></i> &nbsp; Enregistrer
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

        $("#pays").val("Maroc").trigger("change");

        createCodeChecker(
            "client",
            "C",
            "<?=$code_client?>"
        );

        $("form").on("submit", function (event) {
            event.preventDefault();
            var form = this;
            checkCodeExists("client", "", function () {
                $(form).unbind("submit").submit();
            });
        });

        $("#switch").on("change", function () {
            if ($(this).is(":checked")) {
                $("#code_client").attr("placeholder", "Code Cite");
                $("#code_client_label").text("Code Cite").css({'color':'black'});
                $("#full_name").attr("placeholder", "Nom Cite");
                $("#full_name_label").text("Nom Cite").css({'color':'black'});
                $("#remise_group").hide();
                $("#remise").val(0);
                $("#role").val('cite');
            } else {
                $("#code_client").attr("placeholder", "Code Client");
                $("#code_client_label").text("Code Client").css({'color':'black'});
                $("#full_name").attr("placeholder", "Nom de Client");
                $("#full_name_label").text("Nom de Client").css({'color':'black'});
                $("#role").val('none');
                $("#remise_group").show();

            }
        });

    });
</script>