<form method="post" action="<?=base_url()?>index.php/demontage/demonter">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Démonter</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <label style="float: right; margin-top: 8px;"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Code Démontage :</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="code_demontage" id="code_demontage" value="<?=$code_demontage?>" placeholder="Code Démontage" readonly required>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <label style="float: right; margin-top: 8px;"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Produit Composé :</label>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-7" style="padding-right: 5px;">
                                    <div class="form-group" style="margin-bottom: 5px;">

                                        <input type="text" list="id_produit_search_datalist" class="form-control" id="id_produit_search" placeholder="Nom Produit" style="border: 2px solid rgb(54, 127, 169);" required>
                                        <datalist id="id_produit_search_datalist"></datalist>

                                    </div>
                                </div>
                                <div class="col-md-5" style="padding-left: 5px;">
                                    <div class="form-group" style="margin-bottom: 5px;">

                                        <input type="text" class="form-control" id="code_produit_search" placeholder="Code Produit" style="border: 2px dashed rgb(54, 127, 169);">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" style="margin-top: 5px; margin-bottom: 5px; border: 1px solid gray; padding: 5px 8px 5px 8px; border-radius: 3px; background: #f5f5f5; display: none;">
                                        <span id="id_produit_search_info" style="color: green;"></span>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id_produit" id="id_produit" value="">
                            <input type="hidden" name="full_name" id="full_name" value="">
                            <input type="hidden" id="stock" value="0">
                        </div>
                        <div class="col-md-2" id="code_demontage_icon">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px; margin-bottom: 10px;">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <label style="float: right; margin-top: 8px;"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Date de démontage :</label>
                        </div>
                        <div class="col-md-6">
                            <input type="date" class="form-control" name="date_demontage" value="<?=date("Y-m-d")?>" placeholder="Date de démontage" required>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px; margin-bottom: 10px;">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <label style="float: right; margin-top: 8px;"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Qunatité :</label>
                        </div>
                        <div class="col-md-6">
                            <input type="number" step="any" min="0.1" max="" class="form-control" name="quantite" id="quantite" value="1" placeholder="Qunatité" required>
                        </div>
                    </div>
                    <div class="row text-danger" style="margin-top: 15px; margin-bottom: 10px;">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <label style="float: right; margin-top: 8px;"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Frais :</label>
                        </div>
                        <div class="col-md-6">
                            <input type="number" step="any" min="0" class="form-control" name="frais" value="0" placeholder="Frais" style="border: 1px solid #a94442" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Composants / Details</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered myDataTable" style="margin-bottom: 0px;">
                                <thead>
                                <tr>
                                    <th>Produit</th>
                                    <th>Catégorie</th>
                                    <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                        <th>Sous-Catégorie</th>
                                    <?php endif; ?>
                                    <th>Quantité <strong class="text-success">(+)</strong></th>
                                </tr>
                                </thead>
                                <tbody id="tbody_produit">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Options</h3>
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
                                <label>Remarque :</label>
                                <textarea name="remarque" class="form-control" maxlength="200" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <button type="submit" id="btnSubmit" style="width: 100%;" class="btn btn-primary" disabled>
                                <i class="fa fa-save"></i> &nbsp; Enregistrer
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function ()
    {
        fixTable("tbody_produit");

        createProduitSearchInput(
            "#id_produit_search",
            function (option) {
                $("#id_produit").val( option.data("id_produit") );
                $("#full_name").val( option.data("full_name") );
                $("#stock").val( option.data("max") );
                $("#quantite").attr("max", option.data("max"));
                $("#id_produit_search_info").html( createDivInfo(option) );
                $("#id_produit_search_info").parent().show(100);

                getProduitComposeDetails();
            },
            false, // don't clean input
            "OK",
            "NO",
            1 // Produit Composé
        );

        createProduitCodeInput(
            "#code_produit_search",
            function (option) {
                $("#id_produit_search").val(option.data("full_name"));

                $("#id_produit").val( option.data("id_produit") );
                $("#full_name").val( option.data("full_name") );
                $("#stock").val( option.data("max") );
                $("#quantite").attr("max", option.data("max"));
                $("#id_produit_search_info").html( createDivInfo(option) );
                $("#id_produit_search_info").parent().show(100);

                getProduitComposeDetails();
            },
            "OK",
            "NO",
            1 // Produit Composé
        );

        $("#quantite").on("input", function () {
            getProduitComposeDetails();
        });

        createCodeChecker(
            "demontage",
            "DM",
            "<?=$code_demontage?>"
        );

        $("form").on("submit", function (event) {
            event.preventDefault();
            var form = this;
            checkCodeExists("demontage", "", function () {
                $(form).unbind("submit").submit();
            });
        });
    });

    function getProduitComposeDetails()
    {
        var id_produit = $("#id_produit").val();
        var quantite = $("#quantite").val();
        var stock = $("#stock").val();

        if(id_produit != undefined && id_produit != null && id_produit != "")
        {
            $("#code_demontage_icon").html('<i class="fa fa-spinner fa-spin" style="font-size: 20px; margin-top: 6px;"></i>');
            $.ajax({
                type: 'POST',
                url: '<?=base_url()?>index.php/demontage/ajax',
                data: { "id_produit": id_produit },
                dataType: "json",
                success: function(data)
                {
                    if(data != undefined && data != null && data != "" && data.length > 0)
                    {
                        var html = ``;
                        var enable_btn = Number(stock) > 0;

                        for (var row of data)
                        {
                            var real_qte = Number(row.quantite * quantite);

                            html += `
                                    <tr>
                                        <td>`+row.produit+`</td>
                                        <td>`+row.categorie+`</td>
                                        <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                        <td>`+row.sub_categorie+`</td>
                                        <?php endif; ?>
                                        <td>`+real_qte+`</td>
                                    </tr>
                                `;
                        }

                        if(enable_btn) {
                            $("#btnSubmit").removeAttr("disabled");
                        } else {
                            $("#btnSubmit").attr("disabled", "disabled");
                        }

                        $("#tbody_produit").html(html);
                        $("#code_demontage_icon").html('<i class="fa fa-check-square-o text-success" style="font-size: 20px; margin-top: 7px;"></i>');
                    }
                }
            });
        }
    }
</script>