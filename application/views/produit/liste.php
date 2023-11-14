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
                        <table id="myDataTable" class="table myDataTable table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
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
                                </tr>
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

<script type="text/javascript">
        $(document).ready(function () {

            createDataTable(
                "#myDataTable",
                [ 2, "asc" ],
                [ [20, 50, 100, -1], [20, 50, 100, "Tous"] ],
                "#export_btns",
                false,
                "S",
                "<?=base_url()?>index.php/produit/getData/<?=!empty($is_archive) ?>",
                [
                    { data: 'image' },
                    { data: 'code_produit' },
                    { data: 'full_name' },
                    { data: 'nom_categorie' },
                    <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                    { data: 'nom_sub_categorie' },
                    <?php endif; ?>
                    { data: 'prix_achat' },
                    { data: 'prix_vente' },
                    //     { data: 'quantite', render: function(data) {
                    // return data.stock; 
                    // }},
                    {data:'quantite'},
                    { data: 'options' }
                ]

            );

            $("#myDataTable_filter input[type='search']").focus();
        });


</script>

