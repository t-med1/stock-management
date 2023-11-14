<div class="row">
    <div class="col-md-12">
        <div class="box box-default box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Produits</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <form method="post" id="myForm" action="<?=base_url()?>index.php/inventaire/nouveau">

            <input type="hidden" name="id_inventaire" id="id_inventaire" value="<?=!empty($inventaire) ? $inventaire->id_inventaire : ""?>">

            <div class="box-body" style="padding-bottom: 3px;">
                    <div class="row">
                        <div class="col-md-12" style="overflow-x: auto;">
                            <table id="myDataTable" class="table table-bordered table-striped myDataTable" >
                                <thead>
                                <tr>
                                    <th class="current-width">Code</th>
                                    <th>Produit</th>
                                    <th>Catégorie</th>
                                    <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                        <th>Sous-Catégorie</th>
                                    <?php endif; ?>
                                    <th class="current-width no-sort">Stock Actuel</th>
                                    <th class="current-width no-sort success"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Entrée de Stock</th>
                                    <th class="current-width no-sort"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> P.U d'Entrée <small>(DH)</small></th>
                                    <th class="current-width no-sort danger"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Sortie de Stock</th>
                                    <th class="current-width no-sort"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> P.U de Sortie <small>(DH)</small></th>
                                    <th class="current-width no-sort">Nouveau Stock</th>
                                    <th class="current-width no-sort" style="text-align: center"><i class="fa fa-save"></i></th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Code Inventaire :</label>
                                <input type="text" class="form-control" name="code_inventaire" id="code_inventaire" value="<?=!empty($inventaire) ? $inventaire->code_inventaire : "..."?>" placeholder="Code Inventaire" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Date Inventaire :</label>
                                <input type="date" class="form-control" name="date_inventaire" id="date_inventaire" value="<?=!empty($inventaire) ? date("Y-m-d", strtotime($inventaire->date_inventaire)) : date("Y-m-d")?>" placeholder="Date Inventaire" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Remarque :</label>
                                <textarea class="form-control" name="remarque" maxlength="200" rows="3" placeholder="Remarque"><?=!empty($inventaire) ? $inventaire->remarque : ""?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="box-footer" style="text-align: center;">
                <a href="javascript:;" id="btnValide" style="width: 30%;" class="btn btn-success disabled" onclick="confirmInventaire('myForm')">
                    <i class="fa fa-check-circle"></i> &nbsp; Valider
                </a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        createDataTable(
            "#myDataTable",
            [ 1, "asc" ],
            [ [20, 50, 100, -1], [20, 50, 100, "Tous"] ],
            null,
            null,
            "SI",
            "<?=base_url()?>index.php/inventaire/getProduits",
            [
                {
                    data: 'code_produit',
                    createdCell: function(td, cellData, rowData, row, col) {
                        $(td).parent().addClass($(td).find("span").html().trim());
                    }
                },
                { data: 'produit' },
                { data: 'categorie' },
                <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                { data: 'sub_categorie' },
                <?php endif; ?>
                {
                    data: 'quantite',
                    createdCell: function(td, cellData, rowData, row, col) {
                        $(td).css("background-color", $(td).find("span").data("color").trim());
                    }
                },
                { data: 'entree', className: "success" },
                { data: 'entree_prix', },
                { data: 'sortie', className: "danger" },
                { data: 'sortie_prix' },
                { data: 'new_quantite' },
                { data: 'options' }
            ]
        );

    });

    function checkQuantiteEntree(id)
    {
        var entree = parseFloat($("#entree_"+id).val());

        if(entree > 0)
        {
            $("#sortie_"+id).val(0);
            $("#sortie_"+id).attr("disabled", "disabled");
            $("#sortie_prix_"+id).attr("disabled", "disabled");
            $("#btnSave_"+id).removeClass("disabled");
        }
        else if(entree == 0)
        {
            $("#sortie_"+id).removeAttr("disabled", "disabled");
            $("#sortie_prix_"+id).removeAttr("disabled");
            $("#btnSave_"+id).addClass("disabled");
        }
        $("#btnSave_"+id).data("type", "1");
        $("#btnSave_"+id).closest("tr").removeClass("success");

        getNewStock(id);
    }

    function checkQuantiteSortie(id)
    {
        var sortie = parseFloat($("#sortie_"+id).val());

        if(sortie > 0)
        {
            $("#entree_"+id).val(0);
            $("#entree_"+id).attr("disabled", "disabled");
            $("#entree_prix_"+id).attr("disabled", "disabled");
            $("#btnSave_"+id).removeClass("disabled");
        }
        else if(sortie == 0)
        {
            $("#entree_"+id).removeAttr("disabled", "disabled");
            $("#entree_prix_"+id).removeAttr("disabled");
            $("#btnSave_"+id).addClass("disabled");
        }
        $("#btnSave_"+id).data("type", "2");
        $("#btnSave_"+id).closest("tr").removeClass("success");

        getNewStock(id);
    }

    function saveLine(line)
    {
        var self = $(line);
        var id_produit = $(line).data("id_produit");
        var code_inventaire = $("#code_inventaire").val();
        var id_inventaire = $("#id_inventaire").val();
        var id_inventaire_details = $(line).data("id_inventaire_details");
        var type = $(line).data("type");

        var more = parseInt(type) == 1 ? "entree" : "sortie";
        var quantite = parseFloat($("#"+more+"_"+id_produit).val());
        var prix = parseFloat($("#"+more+"_prix_"+id_produit).val());

        $.ajax({
            type: 'POST',
            url: '<?=base_url()."index.php/inventaire/save"?>',
            data: {
                "id_produit": id_produit,
                "code_inventaire": code_inventaire,
                "id_inventaire": id_inventaire,
                "id_inventaire_details": id_inventaire_details,
                "type": type,
                "quantite": quantite,
                "prix": prix
            },
            dataType: "json",
            success: function(data)
            {
                if(data != undefined && data != null && data != "")
                {
                    self.data("id_produit", data.id_produit);
                    self.data("id_inventaire_details", data.id_inventaire_details);

                    $("#id_inventaire").val(data.id_inventaire);
                    $("#code_inventaire").val(data.code_inventaire);

                    self.parent().parent().addClass("success");
                    self.parent().parent().find("td").removeClass("danger").addClass("success");
                    self.addClass("disabled");

                    checkBtnValider();
                }
            }
        });
    }

    function getNewStock(id)
    {
        var old_stock = parseFloat($("#old_stock_"+id).html());
        var entree = parseFloat($("#entree_"+id).val());
        var sortie = parseFloat($("#sortie_"+id).val());

        $("#new_stock_"+id).html( old_stock + entree - sortie );
        $("#btnSave_"+id).removeClass("disabled");

        checkBtnValider();
    }

    function checkBtnValider()
    {
        if($(".saveLine").not(".disabled").length == 0)
        {
            var id_inventaire = $("#id_inventaire").val();
            $.ajax({
                type: 'GET',
                url: '<?=base_url()."index.php/inventaire/checkStatus/"?>'+id_inventaire,
                dataType: "json",
                success: function(data)
                {
                    if(data != undefined && data != null && data == "valide") {
                        $("#btnValide").removeClass("disabled");
                    }
                    else {
                        $("#btnValide").addClass("disabled");
                    }
                }
            });
        }
        else {
            $("#btnValide").addClass("disabled");
        }
    }

    function confirmInventaire(form)
    {
        var date = new Date($("#date_inventaire").val());
        var code = new $("#code_inventaire").val();

        Swal.fire({
            title: 'Valider l\'inventaire :<br>'+code+'&nbsp; - &nbsp;' + date.getDate()+'/'+date.getMonth()+'/'+date.getFullYear(),
            html: "Voulez vous vraiment continuer ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0d9b46',
            cancelButtonColor: '#b9b9b9',
            confirmButtonText: 'Valider',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.value) {
                $("#"+form).submit();
            }
        });
    }
</script>