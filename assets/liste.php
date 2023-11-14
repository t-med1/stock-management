<div class="row">

    <div class="col-md-12">

        <div class="box box-default box-solid">

            <div class="box-header with-border">

                <h3 class="box-title">Liste de Produits</h3>

                <div class="box-tools pull-right">

                    <button type="button" class="btn btn-box-tool" data-widget="collapse">

                        <i class="fa fa-minus"></i>

                    </button>

                </div>

            </div>

            <div class="box-body">

                <div class="row">

                    <div class="col-md-12">

                        <div id="export_btns" style="float: right;margin: 8px 0px 12px 0px;"></div><br>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 table-responsive">

                        <table id="myDataTable" class="table myDataTable table-bordered table-striped produitsTable">

                            <thead>

                            <th class="current-width no-export no-sort"><i class="fa fa-picture-o" aria-hidden="true"></i></th>

                            <th>Code</th>

                            <th>Produit</th>

                            <th>Catégorie</th>

                            <?php if(_ENABLE_SUB_CATEGORIE_): ?>

                                <th>Sous-Catégorie</th>

                            <?php endif; ?>

                            <th>P. Achat</th>

                            <th>P. Vente</th>

                            <th class="no-sort">Stock</th>

                            <th class="current-width no-export no-sort">Options</th>

                            </thead>

                            <tbody>
                              
                            

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>



<script>
$(document).ready(function () {

    createDataTable(
    "#myDataTable",
    [ 2, "asc" ],
    [ [20, 50, 100, -1], [20, 50, 100, "Tous"] ],
    "#export_btns",
    null,
    "S",
    "<?=base_url()?>z/getData<?=!empty($is_archive) ?>",
    [
        { data: 'image' },
        { data: 'code_produit' },
        { data: 'full_name' },
        { data: 'categorie' },
        <?php if(_ENABLE_SUB_CATEGORIE_): ?>
           { data: 'sub_categorie' }, // Update to 'sub_categorie'
       <?php endif; ?>
        { data: 'prix_achat' },
        { data: 'prix_vente' },
        { data: 'stock' },
        { data: 'options' }
    ]
);

$("#myDataTable_filter input[type='search']").focus();
});

</script>