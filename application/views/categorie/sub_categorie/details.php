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

                    <div class="col-md-12">

                        <table class="table">

                            <thead>

                            <?php if($sub_categorie->display == 0): ?>

                                <tr>

                                    <th colspan="3" style="text-align: center; font-size: 1.5rem; background-color: #d2d6de;">[ ARCHIVE ]</th>

                                </tr>

                            <?php endif; ?>

                            <tr>

                                <th colspan="3" style="text-align: center; font-size: 2.5rem;"><?=$sub_categorie->full_name?></th>

                            </tr>

                            </thead>

                            <tbody>

                            <tr>

                                <td class="current-width">Catégorie</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><a href="<?=base_url()."index.php/categorie/details/".$sub_categorie->id_categorie?>"><?=$sub_categorie->categorie?></a></strong></td>

                            </tr>

                            <tr>

                                <td class="current-width">Description</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><?=nl2br($sub_categorie->description)?></strong></td>

                            </tr>

                            </tbody>

                        </table>

                        <a href="<?=base_url()?>index.php/sub_categorie/modifier/<?=$sub_categorie->id_sub_categorie?>" class="btn btn-success btn-xs" style="width: 100%;"><i class="fa fa-wrench"></i>&nbsp; Modifier</a>

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

                        <h3 class="box-title">Liste de produits de <?=$sub_categorie->full_name?> </h3>

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

                                        <th>Code</th>

                                        <th>Produit</th>

                                        <th class="no-sort">Stock</th>

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

        <div class="row">

            <div class="col-md-12">

                <div class="box box-default box-solid">

                    <div class="box-header with-border">

                        <h3 class="box-title">Liste de services de <?=$sub_categorie->full_name?> </h3>

                        <div class="box-tools pull-right">

                            <button type="button" class="btn btn-box-tool" data-widget="collapse">

                                <i class="fa fa-minus"></i>

                            </button>

                        </div>

                    </div>

                    <div class="box-body">

                        <div class="row">

                            <div class="col-md-12">

                                <div id="export_btns_1" style="float: right;margin: 8px 0px 12px 0px;"></div><br>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-12 table-responsive">

                                <table id="myDataTable_1" class="table myDataTable table-bordered table-striped">

                                    <thead>

                                    <tr>

                                        <th>Service</th>

                                        <th>Prix Vente</th>

                                        <th>Déscription</th>

                                    </tr>

                                    </thead>

                                    <tbody>

                                        <?php $services = $this->db->where('display', 1)->where('id_sub_categorie', $sub_categorie->id_sub_categorie)->get('service')->result_array();



                                        foreach ($services as $key): ?>

                                            <tr>

                                                <td><b><a href="<?=base_url().'index.php/service/details/'.$key['id_service']?>"><?=$key['full_name']?></a></b></td>

                                                <td><b><?=$key['prix_vente']?></b></td>

                                                <td><?=$key['description']?></td>

                                            </tr>

                                        <?php endforeach ;?>



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
    [ [10, 50, 100, -1], [10, 50, 100, "Tous"] ],
    "#export_btns",
    "Liste de produits de <?=$sub_categorie->full_name?> :",
    "S",
    "<?=base_url()?>index.php/produit/getData/normale/sub_categorie/<?=$sub_categorie->id_sub_categorie?>/link",
    [
        { data: 'code_produit' },
        { data: 'full_name' },
        {
            data: 'prix_achat',
            createdCell: function(td, cellData, rowData, row, col) {
                var spanElement = $(td).find("span");
                if (spanElement.length > 0) {
                    var color = spanElement.data("color");
                    if (color) {
                        $(td).css("background-color", color.trim());
                    }
                }
            }
        }
    ]
);

createDataTable(
    "#myDataTable_1",
    [ 0, "asc" ],
    [ [20, 50, 100, -1], [20, 50, 100, "Tous"] ],
    "#export_btns_1"
);

});


</script>