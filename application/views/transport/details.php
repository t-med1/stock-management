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

                            <?php if(isset($transport->display) && $transport->display == 0): ?>
    <tr>
        <th colspan="3" style="text-align: center; font-size: 1.5rem; background-color: #d2d6de;">[ ARCHIVE ]</th>
    </tr>
<?php endif; ?>
                            <tr>

                                <th colspan="3" style="text-align: center; font-size: 2.5rem;"><?=$transport->code_transport?></th>

                            </tr>

                            </thead>

                            <tbody>

                            <tr>

                                <td class="current-width">Livreur</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><?=$transport->livreur?></strong></td>

                            </tr>

                            <tr>

                                <td class="current-width">Matricule</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><?=$transport->matricule?></strong></td>

                            </tr>

                            <tr>

                                <td class="current-width">Téléphone</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><?=$transport->telephone?></strong></td>

                            </tr>

                            <tr>

                                <td class="current-width">Description</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><?=nl2br($transport->description)?></strong></td>

                            </tr>

                            </tbody>

                        </table>

                        <a href="<?=base_url()?>index.php/transport/modifier/<?=$transport->id_transport?>" class="btn btn-success btn-xs" style="width: 100%;"><i class="fa fa-wrench"></i>&nbsp; Modifier</a>

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

                        <h3 class="box-title">Liste d'achats de <?=$transport->code_transport?> </h3>

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

                                    <th>Code</th>

                                    <th>Date</th>

                                    </thead>

                                    <tbody>

                                    <?php

                                    foreach ($achats as $val):

                                        if(!empty($val["id_achat"])):

                                            // $total = getAchatTotal($val["id_achat"]);

                                            ?>

                                            <tr>

                                                <td>

                                                    <a href="<?=base_url()."index.php/achat/details/".$val["id_achat"]?>"><strong><?=$val["code_achat"]?></strong></a>

                                                </td>

                                                <td data-sort="<?=strtotime($val["date_achat"])?>"><?=date("d/m/Y", strtotime($val["date_achat"]))?></td>

                                                <!-- <td data-sort="<?=round($total["total_achat"],2)?>"><strong><?=number_format($total["total_achat"], 2, '.', '')?></strong> <small>DH</small></td>

                                                <td data-sort="<?=round($total["total_reste"],2)?>"><strong><?=number_format($total["total_reste"], 2, '.', '')?></strong> <small>DH</small></td> -->

                                            </tr>

                                        <?php endif; endforeach; ?>

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

                        <h3 class="box-title">Liste de ventes de <?=$transport->code_transport?> </h3>

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

                                        <th>N° de BL</th>

                                        <th>Date</th>

                                        <!-- <th>Montant</th>

                                        <th>Reste à payé</th> -->

                                    </tr>

                                    </thead>

                                    <tbody>

                                    <?php

                                    foreach ($ventes as $val):

                                        if(!empty($val["id_vente"])):

                                            // $total = getVenteTotal($val["id_vente"]);

                                            ?>

                                            <tr>

                                                <td>

                                                    <a href="<?=base_url()."index.php/vente/details/".$val["id_vente"]?>"><strong><?=$val["code_vente"]?></strong></a>

                                                    <span style="display: none;">(F: <?=$val["num_facture"]?>)</span>

                                                </td>

                                                <td data-sort="<?=strtotime($val["date_vente"])?>"><?=date("d/m/Y", strtotime($val["date_vente"]))?></td>

                                                <!-- <td data-sort="<?=round($total["total_vente"],2)?>"><strong><?=number_format($total["total_vente"],2,'.',' ')?></strong> <small>DH</small></td>

                                                <td data-sort="<?=round($total["total_reste"],2)?>"><strong><?=number_format($total["total_reste"],2,'.',' ')?></strong> <small>DH</small></td> -->

                                            </tr>

                                        <?php endif; endforeach; ?>

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

            [ [ 1, "desc" ], [ 0, "desc" ] ],

            [ [5, 50, 100, -1], [5, 50, 100, "Tous"] ],

            "#export_btns_1",

            "Liste d'achats de <?=$transport->code_transport?> :"

        );



        createDataTable(

            "#myDataTable_2",

            [ [ 1, "desc" ], [ 0, "desc" ] ],

            [ [5, 50, 100, -1], [5, 50, 100, "Tous"] ],

            "#export_btns_2",

            "Liste de ventes de <?=$transport->code_transport?> :"

        );



    });

</script>