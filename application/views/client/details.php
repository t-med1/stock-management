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

                            <?php if($client->display == 0): ?>

                            <tr>

                                <th colspan="3" style="text-align: center; font-size: 1.5rem; background-color: #d2d6de;">[ ARCHIVE ]</th>

                            </tr>

                            <?php endif; ?>

                            <tr>

                                <th colspan="3" style="text-align: center; font-size: 2.5rem;"><?=$client->full_name?></th>

                            </tr>

                            </thead>

                            <tbody>

                            <tr>

                                <td class="current-width">Code Client</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><?=$client->code_client?></strong></td>

                            </tr>

                            <?php if(_ENABLE_CLIENT_USER_): ?>

                                <tr>

                                    <td class="current-width">Commercial</td>

                                    <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                    <td><?=getUserLabel($client->role, $client->utilisateur)?></td>

                                </tr>

                            <?php endif; ?>

                            <tr>

                                <td class="current-width">Résponsable</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><?=$client->responsable?></strong></td>

                            </tr>

                            <tr>

                                <td class="current-width">Adresse</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><?=$client->adresse?></strong></td>

                            </tr>

                            <tr>

                                <td class="current-width">Ville</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><?=$client->ville?></strong></td>

                            </tr>

                            <tr>

                                <td class="current-width">Pays</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><?=$client->pays?></strong></td>

                            </tr>

                            <tr>

                                <td class="current-width">Remise</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><?=$client->remise?> <small>%</small></strong></td>

                            </tr>

                            <tr>

                                <td class="current-width">Téléphone</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><?=$client->telephone?></strong></td>

                            </tr>

                            <tr>

                                <td class="current-width">Email</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><?=$client->email?></strong></td>

                            </tr>

                            <?php if($client->id_client != 1): ?>

                            <tr>

                                <td class="current-width">Relevé</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><a href="<?=base_url()?>index.php/client/releve/<?=$client->id_client?>" class="btn btn-primary btn-xs" style="width: 100%;"><i class="fa fa-eye"></i>&nbsp; Voir Relevé</a></td>

                            </tr>

                            <?php endif; ?>

                            <tr>

                                <td class="current-width">Description</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><?=nl2br($client->description)?></strong></td>

                            </tr>

                            </tbody>

                        </table>



                        <a href="<?=base_url()?>index.php/client/facture/<?=$client->id_client?>" class="btn btn-warning btn-sm" style="width: 100%;"><i class="fa fa-plus"></i>&nbsp; Créer Facture</a>

                        <br><br>

                        <a href="<?=base_url()?>index.php/client/modifier/<?=$client->id_client?>" class="btn btn-success btn-sm" style="width: 100%;"><i class="fa fa-wrench"></i>&nbsp; Modifier</a>

                    </div>

                </div>

            </div>

        </div>

        <?php

            if(_ENABLE_AVANCE_ && $client->id_client != 1):

                $avance = getAvanceTotal($client->id_client);

                if($avance["total_avance"] > 0) :

        ?>

            <div class="row">

                <div class="col-md-12">

                    <div class="box box-warning box-solid">

                        <div class="box-header with-border">

                            <h3 class="box-title">TOTAL AVANCES</h3>

                            <div class="box-tools pull-right">

                                <button type="button" class="btn btn-box-tool" data-widget="collapse">

                                    <i class="fa fa-minus"></i>

                                </button>

                            </div>

                        </div>

                        <div class="box-body">

                            <div class="row">

                                <div class="col-md-12">

                                    <table style="width: 100%;">

                                        <tr>

                                            <td class="current-width"><?=getMethodePaiement(1)?></td>

                                            <td class="current-width">&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;</td>

                                            <td><strong><?=number_format($avance["total_espece"], 2, ".", " ")?></strong> <small>DH</small></td>

                                        </tr>

                                        <tr>

                                            <td class="current-width"><?=getMethodePaiement(2)."/".getMethodePaiement(3)?></td>

                                            <td class="current-width">&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;</td>

                                            <td><strong><?=number_format($avance["total_cheque"], 2, ".", " ")?></strong> <small>DH</small></td>

                                        </tr>

                                        <tr>

                                            <td class="current-width"><?=getMethodePaiement(4)?></td>

                                            <td class="current-width">&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;</td>

                                            <td><strong><?=number_format($avance["total_virement"], 2, ".", " ")?></strong> <small>DH</small></td>

                                        </tr>

                                    </table>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        <?php endif; endif; ?>

    </div>

    <div class="col-md-8">

        <div class="row">

            <div class="col-md-12">

                <div class="box box-default box-solid">

                    <div class="box-header with-border">

                        <h3 class="box-title">Liste de ventes de <?=$client->full_name?> </h3>

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

                                        <th>N° de BL</th>

                                        <th>Date</th>

                                        <th>Montant</th>

                                        <th>Reste à payé</th>

                                    </tr>

                                    </thead>

                                    <tbody>

                                    <?php

                                        foreach ($ventes as $val):

                                            if(!empty($val["id_vente"])):

                                                $total = getVenteTotal($val["id_vente"]);

                                    ?>

                                    <tr>

                                        <td>

                                            <a href="<?=base_url()."index.php/vente/details/".$val["id_vente"]?>"><strong><?=$val["code_vente"]?></strong></a>

                                            <span style="display: none;">(F: <?=$val["num_facture"]?>)</span>

                                        </td>

                                        <td data-sort="<?=strtotime($val["date_vente"])?>"><?=date("d/m/Y", strtotime($val["date_vente"]))?></td>

                                        <td data-sort="<?=round($total["total_vente"],2)?>"><strong><?=number_format($total["total_vente"],2,'.',' ')?></strong> <small>DH</small></td>

                                        <td data-sort="<?=round($total["total_reste"],2)?>"><strong><?=number_format($total["total_reste"],2,'.',' ')?></strong> <small>DH</small></td>

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

                        <h3 class="box-title">Liste de factures de <?=$client->full_name?> </h3>

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

                                        <th>N° de Facture</th>

                                        <th>Date</th>

                                        <th>Montant</th>

                                        <th>Reste à payé</th>

                                        <th class="current-width no-export">Options</th>

                                    </tr>

                                    </thead>
                                    <tbody>
                                    <?php foreach ($ventes as $facture):
    // Vérifier si la clé "num_facture" existe dans $facture avant de l'utiliser
    if (isset($facture["num_facture"])) {
        $total = getFactureTotal($facture["num_facture"]); 
        // Maintenant, vous pouvez afficher les détails de la facture, car "num_facture" est présent.
?>
        <tr>
            <td>
                <strong><?= $facture["num_facture"] ?></strong>
            </td>
            <!-- <td data-sort="<?=strtotime($facture["date"])?>"><?=date("d/m/Y", strtotime($facture["date"]))?></td> -->
            <td data-sort="<?=round($total["total_vente"],2)?>"><strong><?=number_format($total["total_vente"],2,'.',' ')?></strong> <small>DH</small></td>
            <td data-sort="<?=round($total["total_reste"],2)?>"><strong><?=number_format($total["total_reste"],2,'.',' ')?></strong> <small>DH</small></td>
            <td><a href="<?=base_url()?>index.php/vente/facture/<?=$facture['num_facture']?>" target="_blank" class="btn btn-warning btn-xs" style="width: 100%;"><i class="fa fa-print"></i>&nbsp; Imprimer</a></td>
        </tr>
<?php
    } // Fin de la vérification de la clé "num_facture"
endforeach;
?>
                                   

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

                        <h3 class="box-title">Liste de bons d'avoir de <?=$client->full_name?> </h3>

                        <div class="box-tools pull-right">

                            <button type="button" class="btn btn-box-tool" data-widget="collapse">

                                <i class="fa fa-minus"></i>

                            </button>

                        </div>

                    </div>

                    <div class="box-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div id="export_btns_3" style="float: right;margin: 8px 0px 12px 0px;"></div><br>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12 table-responsive">

                                <table id="myDataTable_3" class="table myDataTable table-bordered table-striped">

                                    <thead>

                                    <tr>

                                        <th>N° de BA</th>

                                        <th>Date</th>

                                        <th>Montant</th>

                                        <th>Reste à payé <br>ou Réglement</th>

                                    </tr>

                                    </thead>

                                    <tbody>

                                    <?php

                                        foreach ($avoirs as $val):

                                            if(!empty($val["id_avoir"])):

                                                $total = getAvoirTotal($val["id_avoir"]);

                                    ?>

                                    <tr>

                                        <td>

                                            <a href="<?=base_url()."index.php/avoir/details/".$val["id_avoir"]?>"><strong><?=$val["code_avoir"]?></strong></a>

                                        </td>

                                        <td data-sort="<?=strtotime($val["date_avoir"])?>"><?=date("d/m/Y", strtotime($val["date_avoir"]))?></td>

                                        <td data-sort="<?=round($total["total_avoir"],2)?>"><strong style="font-family: cursive;"><?=number_format($total["total_avoir"],2,'.',' ')?></strong> <small>DH</small></td>

                                        <td data-sort="<?=round($total["total_reste"],2)?>"><strong style="font-family: cursive;"><?=number_format($total["total_reste"],2,'.',' ')?></strong> <small>DH</small></td>

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

                        <h3 class="box-title">Liste de devis de <?=$client->full_name?> </h3>

                        <div class="box-tools pull-right">

                            <button type="button" class="btn btn-box-tool" data-widget="collapse">

                                <i class="fa fa-minus"></i>

                            </button>

                        </div>

                    </div>

                    <div class="box-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div id="export_btns_4" style="float: right;margin: 8px 0px 12px 0px;"></div><br>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12 table-responsive">

                                <table id="myDataTable_4" class="table myDataTable table-bordered table-striped">

                                    <thead>

                                    <tr>

                                        <th>Code</th>

                                        <th>Date</th>

                                        <th>Produits</th>

                                        <th>Vente</th>

                                    </tr>

                                    </thead>

                                    <tbody>

                                    <?php foreach ($devis as $val): ?>

                                        <tr>

                                            <td>

                                                <a href="<?=base_url()."index.php/devis/details/".$val["id_devis"]?>"><strong><?=$val["code_devis"]?></strong></a>

                                            </td>

                                            <td data-sort="<?=strtotime($val["date_devis"])?>"><?=date("d/m/Y", strtotime($val["date_devis"]))?></td>

                                            <td><?=$val["produits"]?></td>

                                            <td>

                                                <?php if(empty($val["id_vente"])): ?>

                                                    <i class="fa fa-times text-warning"></i>

                                                <?php else: ?>

                                                    <a href="<?=base_url()?>index.php/vente/details/<?=$val["id_vente"]?>"><strong><?=$val["code_vente"]?></strong></a>

                                                <?php endif; ?>

                                            </td>

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

        <div class="row">

            <div class="col-md-12">

                <div class="box box-default box-solid">

                    <div class="box-header with-border">

                        <h3 class="box-title">Liste de commandes de <?=$client->full_name?> </h3>

                        <div class="box-tools pull-right">

                            <button type="button" class="btn btn-box-tool" data-widget="collapse">

                                <i class="fa fa-minus"></i>

                            </button>

                        </div>

                    </div>

                    <div class="box-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div id="export_btns_5" style="float: right;margin: 8px 0px 12px 0px;"></div><br>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12 table-responsive">

                                <table id="myDataTable_5" class="table myDataTable table-bordered table-striped">

                                    <thead>

                                    <tr>

                                        <th>Code</th>

                                        <th>Date</th>

                                        <th>Produits</th>

                                        <th>Vente</th>

                                    </tr>

                                    </thead>

                                    <tbody>

                                    <?php foreach ($clients_cmds as $val): ?>

                                        <tr>

                                            <td>

                                                <a href="<?=base_url()."index.php/client_cmd/details/".$val["id_client_cmd"]?>"><strong><?=$val["code_client_cmd"]?></strong></a>

                                            </td>

                                            <td data-sort="<?=strtotime($val["date_client_cmd"])?>"><?=date("d/m/Y", strtotime($val["date_client_cmd"]))?></td>

                                            <td><?=$val["produits"]?></td>

                                            <td>

                                                <?php if(empty($val["id_vente"])): ?>

                                                    <i class="fa fa-times text-warning"></i>

                                                <?php else: ?>

                                                    <a href="<?=base_url()?>index.php/vente/details/<?=$val["id_vente"]?>"><strong><?=$val["code_vente"]?></strong></a>

                                                <?php endif; ?>

                                            </td>

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

    </div>

</div>



<script type="text/javascript">

    $(document).ready(function () {

        createDataTable(
            "#myDataTable_1",
            [ [ 1, "desc" ], [ 0, "desc" ] ],
            [ [5, 50, 100, -1], [5, 50, 100, "Tous"] ],
            "#export_btns_1",
            "Liste de ventes de Client1 :"
        );

        createDataTable(
            "#myDataTable_2",
            [ [ 1, "desc" ], [ 0, "desc" ] ],
            [ [5, 50, 100, -1], [5, 50, 100, "Tous"] ],
            "#export_btns_2",
            "Liste de factures de Client1 :"
        );

        createDataTable(
            "#myDataTable_3",
            [ [ 1, "desc" ], [ 0, "desc" ] ],
            [ [5, 50, 100, -1], [5, 50, 100, "Tous"] ],
            "#export_btns_3",
            "Liste de bons d'avoir de Client1 :"
        );

        createDataTable(
            "#myDataTable_4",
            [ [ 1, "desc" ], [ 0, "desc" ] ],
            [ [5, 50, 100, -1], [5, 50, 100, "Tous"] ],
            "#export_btns_4",
            "Liste de devis de Client1 :"
        );

        createDataTable(
            "#myDataTable_5",
            [ [ 1, "desc" ], [ 0, "desc" ] ],
            [ [5, 50, 100, -1], [5, 50, 100, "Tous"] ],
            "#export_btns_5",
            "Liste de commandes de Client1 :"
        );

    });

</script>