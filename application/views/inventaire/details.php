<div class="row">
    <div class="col-md-4">
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
                    <div class="col-md-12" style="overflow-x: auto;">
                        <table class="table">
                            <thead>
                            <tr>
                                <th colspan="3" style="text-align: center; font-size: 2.5rem;"><?=$inventaire->code_inventaire?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="current-width">Commercial</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><?=getUserLabel($inventaire->role, $inventaire->utilisateur)?></td>
                            </tr>
                            <tr>
                                <td class="current-width">Date d'inventaire</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=date("d/m/Y", strtotime($inventaire->date_inventaire))?></strong></td>
                            </tr>
                            <tr>
                                <td class="current-width">Statut</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td>
                                    <?php if($inventaire->valide == 1): ?>
                                        <span class="label label-success" data-toggle="tooltip" data-placement="top" title="Valide">Validé</span>
                                    <?php else: ?>
                                        <span class="label label-danger" data-toggle="tooltip" data-placement="top" title="En cours ...">En cours ...</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr class="success">
                                <td class="current-width">Total d'entrée</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=number_format($total_entree,2,"."," ")?></strong> <small>DH</small></td>
                            </tr>
                            <tr class="danger">
                                <td class="current-width">Total de Sortie</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=number_format($total_sortie,2,"."," ")?></strong> <small>DH</small></td>
                            </tr>
                            <tr>
                                <td class="current-width">Remarque</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=nl2br($inventaire->remarque)?></strong></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Détails d'inventaire <?=$inventaire->code_inventaire?></h3>
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
                                        <th>Code Produit</th>
                                        <th>Produit</th>
                                        <th>Catégorie</th>
                                        <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                            <th>Sous-Catégorie</th>
                                        <?php endif; ?>
                                        <th class="current-width no-sort">Réglage</th>
                                        <th class="current-width no-sort">Nouveau Stock</th>
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
            "SI",
            "<?=base_url()?>index.php/inventaire/getData/<?=$inventaire->id_inventaire?>",
            [
                { data: 'code_produit' },
                { data: 'produit' },
                { data: 'categorie' },
                <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                { data: 'sub_categorie' },
                <?php endif; ?>
                { data: 'details' },
                {
                    data: 'quantite',
                    createdCell: function(td, cellData, rowData, row, col) {
                        $(td).css("background-color", $(td).find("span").data("color").trim());
                    }
                }
            ]
        );

    });
</script>