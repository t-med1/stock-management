<div class="row">
    <div class="col-md-3"></div>
    <form method="post" action="<?=base_url()?>index.php/produit/e_ajouter">
        <div class="col-md-6">
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Ajouter Produit Endommagé</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-7" style="padding-right: 5px;">
                            <div class="form-group" style="margin-bottom: 5px;">

                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Produit :</label>
                                <input type="text" list="id_produit_search_datalist" class="form-control" id="id_produit_search" placeholder="Nom Produit" style="border: 2px solid rgb(54, 127, 169);" required>
                                <datalist id="id_produit_search_datalist"></datalist>

                                <input type="hidden" name="id_produit" id="id_produit">

                            </div>
                        </div>
                        <div class="col-md-5" style="padding-left: 5px;">
                            <div class="form-group" style="margin-bottom: 5px;">

                                <label>&nbsp;</label>
                                <input type="text" class="form-control" id="code_produit_search" placeholder="Code Produit" style="border: 2px dashed rgb(54, 127, 169);">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" style="margin-top: 5px; border: 1px solid gray; padding: 5px 8px 5px 8px; border-radius: 3px; background: #f5f5f5; display: none;">
                                <span id="id_produit_search_info" style="color: green;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Quantité :</label>
                        <input type="number" step="any" min="0.1" max="1" class="form-control" name="quantite" id="quantite" placeholder="Quantité" required>
                    </div>
                    <div class="form-group">
                        <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Date :</label>
                        <input type="date" class="form-control" name="date" placeholder="Date" value="<?=date("Y-m-d")?>" required>
                    </div>
                    <div class="form-group">
                        <label>Description :</label>
                        <textarea class="form-control" name="description" placeholder="Description" maxlength="200" rows="3"></textarea>
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

        createProduitSearchInput(
            "#id_produit_search",
            function (option) {
                $("#id_produit").val( option.data("id_produit") );
                $("#id_produit_search_info").html( createDivInfo(option) );
                $("#id_produit_search_info").parent().show(100);

                $("#quantite").attr("max",  option.data("max") );
            },
            false, // don't clean input
            "OK"
        );

        createProduitCodeInput(
            "#code_produit_search",
            function (option) {
                $("#id_produit_search").val(option.data("full_name"));

                $("#id_produit").val( option.data("id_produit") );
                $("#id_produit_search_info").html( createDivInfo(option) );
                $("#id_produit_search_info").parent().show(100);

                $("#quantite").attr("max",  option.data("max") );
            },
            "OK"
        );

    });
</script>