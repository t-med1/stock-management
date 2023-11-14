<div class="row">
    <div class="col-md-12">
        <div class="box box-default box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Détails</h3>
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
                            <th>Code</th>
                            <th>Produit</th>
                            <th>Catégorie</th>
                            <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                <th>Sous-Catégorie</th>
                            <?php endif; ?>
                            <!-- resume code -->
                            <th>Production</th>
                            <th>demontage</th>
                            <th>Achat</th>
                            <th>Ventes</th>
                            <th>Bon d'Avoir(Bon état)</th>
                            <th>Bon d'Avoir(Endommagé)</th>
                            <th>Bon d'Avoir(Change)</th>
                            <th>Endommagé</th>
                            <th>Utilisé (Production)</th>
                            <th>Reprendre (Démontage)</th>
                            <th class="current-width no-sort">Stock</th>
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
            [ 1, "asc" ],
            [ [20, 50, 100, -1], [20, 50, 100, "Tous"] ],
            "#export_btns",
            null,
            "S",
            "<?=base_url()?>index.php/produit/getData/normale/NO/NO/link-details-<?=$options?>",
            [
                { data: 'code_produit' },
                { data: 'full_name' },
                { data: 'categorie' },
                <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                { data: 'sub_categorie' },
                <?php endif; ?>
                // resume code
              
                {data:'production'},
                { data: 'demontage' }, // Display total production for each product
                { data: 'nbr_achat' }, 
                {
                    data: 'prix_vente',
                    createdCell: function(td, cellData, rowData, row, col) {
                    var spanElement = $(td).find("span");
                    if (spanElement.length > 0) {
                        var color = spanElement.data("color");
                        if (color) {
                            $(td).css("background-color", color.trim());
                                   }
                         }
                    }
            
                },
                {data:'bon_avois'},
                {data:'bon_avois'},
                {data:'bon_avois'},
                {data:'bon_avois'},
                {data:'bon_avois'},
                {data:'bon_avois'},
                {data:'stock'},
            ]
        );

    });
</script>