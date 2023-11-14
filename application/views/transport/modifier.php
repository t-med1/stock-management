<div class="row">
    <div class="col-md-3"></div>
    <form method="post" action="<?=base_url()?>index.php/transport/modifier">
        <div class="col-md-6">
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Modifier Transport</h3>
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
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Code Transport : </label>
                                <input type="text" class="form-control" name="code_transport" id="code_transport" value="<?=$transport->code_transport?>" readonly required>
                                <span style="color: red; display: none;" id="code_transport_exists"></span>
                                <input type="hidden" name="id_transport" value="<?=$transport->id_transport?>">
                            </div>
                            <div class="form-group">
                                <label>Nom de Livreur :</label>
                                <input type="text" class="form-control" name="livreur" value="<?=$transport->livreur?>" placeholder="Nom de Livreur">
                            </div>
                            <div class="form-group">
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Matricule :</label>
                                <input type="text" class="form-control" name="matricule" value="<?=$transport->matricule?>" placeholder="Matricule" required>
                            </div>
                            <div class="form-group">
                                <label>Téléphone :</label>
                                <input type="text" class="form-control" name="telephone" value="<?=$transport->telephone?>" placeholder="Téléphone">
                            </div>
                            <div class="form-group">
                                <label>Description :</label>
                                <textarea name="description" class="form-control" maxlength="200" rows="3" placeholder="Description"><?=$transport->description?></textarea>
                            </div>
                        </div>
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
            "transport",
            "TR",
            "<?=$code_transport?>"
        );

        $("form").on("submit", function (event) {
            event.preventDefault();
            var form = this;
            checkCodeExists("transport", <?=$transport->id_transport?>, function () {
                $(form).unbind("submit").submit();
            });
        });
    });
</script>