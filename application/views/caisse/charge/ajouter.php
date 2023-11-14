<div class="row">
    <div class="col-md-3"></div>
    <form method="post" action="<?=base_url()?>index.php/charge/ajouter">
        <div class="col-md-6">
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Ajouter Charge</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Date :</label>
                        <input type="date" class="form-control" name="date_charge" value="<?=date("Y-m-d")?>" placeholder="Date Charge" required>
                    </div>
                    <div class="form-group">
                        <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Montant :</label>
                        <input type="number" step="any" min="0.1" class="form-control" name="montant" id="montant" placeholder="Montant" required>
                    </div>
                    <div class="form-group">
                        <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Mode de Paiement :</label>
                        <select class="form-control" name="charge_methode" id="charge_methode" required>
                            <option value="1" selected>Espèce</option>
                            <option value="2">Chèque</option>
                            <option value="3">Effet</option>
                            <option value="4">Virement bancaire</option>
                        </select>
                    </div>
                    <div class="form-group" id="cheque_div" style="display: none;">
                        <table class="table table-bordered table-striped" style="margin-bottom:0px;">
                            <tbody>
                            <tr>
                                <td><input type="number" step="any" min="0.1" id="cheque_montant" name="cheque_montant" class="form-control" placeholder="Montant"></td>
                                <td><input type="text" id="cheque_reference" name="cheque_reference" class="form-control" placeholder="Réference"></td>
                                <td><input type="date" id="cheque_date" name="cheque_date" class="form-control" placeholder="Date"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group">
                        <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Description :</label>
                        <textarea class="form-control" name="description" placeholder="Description" maxlength="200" rows="3" required></textarea>
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
    $(document).ready(function ()
    {
        $("#charge_methode").on("change", function ()
        {
            if($(this).val() != undefined && $(this).val() != null)
            {
                if($(this).val() == 1)
                {
                    initMethode();

                    $("#montant").attr("max", '<?=getCaisseTotal()?>');
                }
                else if($(this).val() == 2 || $(this).val() == 3)
                {
                    var completePlaceHolder = $(this).val() == 2 ? "de chèque" : "d'effet";
                    initMethode();

                    $("#cheque_div").show();
                    $("#cheque_montant, #cheque_date, #cheque_reference").attr("required", "required");
                    $("#montant").attr("readonly", "readonly");

                    $("#cheque_montant").attr("placeholder", "Montant " + completePlaceHolder);
                    $("#cheque_date").attr("placeholder", "Date " + completePlaceHolder);
                    $("#cheque_reference").attr("placeholder", "Réference " + completePlaceHolder);
                }
                else
                { initMethode(); }
            }
            else
            { initMethode(); }
        }).change(); // to get max attr

        $("#cheque_montant").on("input", function ()
        {
            $("#montant").val( $(this).val() );
        });
    });

    function initMethode()
    {
        $("#cheque_div").hide();
        $("#cheque_montant,#cheque_date, #cheque_reference").removeAttr("required");
        $("#montant").removeAttr("readonly");
        $("#montant").removeAttr("max");
    }
</script>