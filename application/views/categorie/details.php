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

                            <?php if($categorie->display == 0): ?>

                                <tr>

                                    <th colspan="3" style="text-align: center; font-size: 1.5rem; background-color: #d2d6de;">[ ARCHIVE ]</th>

                                </tr>

                            <?php endif; ?>

                            <tr>

                                <th colspan="3" style="text-align: center; font-size: 2.5rem;"><?=$categorie->full_name?></th>

                            </tr>

                            </thead>

                            <tbody>

                            <tr>

                                <td class="current-width">Description</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><?=nl2br($categorie->description)?></strong></td>

                            </tr>

                            </tbody>

                        </table>

                        <a href="<?=base_url()?>index.php/categorie/modifier/<?=$categorie->id_categorie?>" class="btn btn-success btn-xs" style="width: 100%;"><i class="fa fa-wrench"></i>&nbsp; Modifier</a>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-md-8">

        <?php if(_ENABLE_SUB_CATEGORIE_): ?>

        <div class="row">

            <div class="col-md-12">

                <div class="box box-default box-solid">

                    <div class="box-header with-border">

                        <h3 class="box-title">Liste de sous-catégories de <?=$categorie->full_name?> </h3>

                        <div class="box-tools pull-right">

                            <button type="button" class="btn btn-box-tool" data-widget="collapse">

                                <i class="fa fa-minus"></i>

                            </button>

                        </div>

                    </div>

                    <div class="box-body">

                        <div class="row">

                            <div class="col-md-12">

                                <div id="export_btns_2" style="float: right;margin: 8px 0px 12px 0px;"></div><br>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-12 table-responsive">

                                <table id="myDataTable_2" class="table myDataTable table-bordered table-striped">

                                    <thead>

                                    <tr>

                                        <th>Sous-Catégorie</th>

                                        <th>Nbr de Produits</th>

                                        <th>Description</th>

                                    </tr>

                                    </thead>

                                    <tbody>

                                    <?php

                                        foreach ($sub_categories as $val):

                                            $nbr_produits = $this->db->query("SELECT COALESCE(COUNT(id_produit), 0) AS nbr FROM produit WHERE display = 1 AND id_sub_categorie = ".$val["id_sub_categorie"])->row()->nbr;

                                    ?>

                                    <tr>

                                        <td><strong><a href="<?=base_url()."index.php/sub_categorie/details/".$val["id_sub_categorie"]?>"><?=$val["full_name"]?></a></strong></td>

                                        <td><?=$nbr_produits?></td>

                                        <td><?=$val["description"]?></td>

                                    </tr>

                                    <?php endforeach; ?>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <?php endif; ?>

        <div class="row">

            <div class="col-md-12">

                <div class="box box-default box-solid">

                    <div class="box-header with-border">

                        <h3 class="box-title">Liste de produits de <?=$categorie->full_name?> </h3>

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

                        <h3 class="box-title">Liste de services de <?=$categorie->full_name?> </h3>

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

                                        <th>Service</th>

                                        <th>Prix Vente</th>

                                        <th>Déscription</th>

                                    </tr>

                                    </thead>

                                    <tbody>

                                        <?php $services = $this->db->where('display', 1)->where('id_categorie', $categorie->id_categorie)->get('service')->result_array();



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

            "#myDataTable_1",

            [ 1, "asc" ],

            [ [10, 50, 100, -1], [10, 50, 100, "Tous"] ],

            "#export_btns_1",

            "Liste de produits de <?=$categorie->full_name?> :",

            "S",

            "<?=base_url()?>index.php/produit/getData/normale/categorie/<?=$categorie->id_categorie?>/link",

            [

                { data: 'code_produit' },

                { data: 'full_name' },

                {

                    data: 'quantite',

                    createdCell: function(td, cellData, rowData, row, col) {
                        var $span = $(td).find("span[data-color]");
                        if ($span.length > 0) {
                            var color = $span.data("color").trim();
                            $(td).css("background-color", color);
                        }
                    }


                }

            ]

        );



        <?php if(_ENABLE_SUB_CATEGORIE_): ?>

        createDataTable(

            "#myDataTable_2",

            [ 0, "asc" ],

            [ [20, 50, 100, -1], [20, 50, 100, "Tous"] ],

            "#export_btns_2",

            "Liste de sous-catégories de <?=$categorie->full_name?> :"

        );

        <?php endif; ?>



        createDataTable(

            "#myDataTable",

                [ 0, "asc" ],

            [ [20, 50, 100, -1], [20, 50, 100, "Tous"] ],

            "#export_btns"

        );



    });

</script>