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

                                <th colspan="3" style="text-align: center; font-size: 2.5rem;"><?=$vente->code_vente?></th>

                            </tr>

                            </thead>

                            <tbody>

                            <?php if(!empty($vente->num_facture)): ?>

                                <tr>

                                    <td class="current-width">N° de Facture</td>

                                    <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                    <td><strong><?=$vente->num_facture?></strong></td>

                                </tr>

                            <?php endif; ?>

                            <tr>

                                <td class="current-width">Commercial</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><?=getUserLabel($vente->role, $vente->utilisateur)?></td>

                            </tr>

                            <tr>

                                <td class="current-width">Devis</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td>

                                    <?php if(!empty($vente->id_devis)): ?>

                                        <a href="<?=base_url()?>index.php/devis/details/<?=$vente->id_devis?>"><strong><?=$vente->code_devis?></strong></a>

                                    <?php else: ?>

                                        <i class="fa fa-times text-warning"></i>

                                    <?php endif; ?>

                                </td>

                            </tr>

                            <tr>

                                <td class="current-width">Commande <br>de Client</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td>

                                    <?php if(!empty($vente->id_client_cmd)): ?>

                                        <a href="<?=base_url()?>index.php/client_cmd/details/<?=$vente->id_client_cmd?>"><strong><?=$vente->code_client_cmd?></strong></a>

                                    <?php else: ?>

                                        <i class="fa fa-times text-warning"></i>

                                    <?php endif; ?>

                                </td>

                            </tr>

                            <tr>

                                <td class="current-width">Client</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><a href="<?=base_url()."index.php/client/details/".$vente->id_client?>"><?=$vente->client?></a></strong></td>

                            </tr>

                            <tr>

                                <td class="current-width">Transport</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td>

                                    <?php if(!empty($vente->id_transport)): ?>

                                        <strong><a href="<?=base_url()."index.php/transport/details/".$vente->id_transport?>"><?=$vente->transport?></a></strong>

                                    <?php else: ?>

                                        <i class="fa fa-times text-warning"></i>

                                    <?php endif; ?>

                                </td>

                            </tr>

                            <tr>

                                <td class="current-width" style="vertical-align: top !important;">Adresse</td>

                                <td class="current-width" style="vertical-align: top !important;">&nbsp; : &nbsp;&nbsp;</td>

                                <td style="vertical-align: top !important;">

                                    <strong><?=!empty($adresse->adresse)?$adresse->adresse."<br>":""?><?=$adresse->ville.", ".$adresse->pays?></strong>

                                </td>

                            </tr>

                            <tr>

                                <td class="current-width">Date Vente</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><?=date("d/m/Y", strtotime($vente->date_vente))?></strong></td>

                            </tr>

                            <tr>

                                <td class="current-width">TVA</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><?=$vente->tva?></strong> <small>%</small></td>

                            </tr>

                            <tr>

                                <?php

                                    $total = getVenteTotal($vente->id_vente);

                                    $color = $total["total_reste"] > 0 ? "text-danger" : "";

                                ?>

                                <td class="current-width">Montant</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><?=number_format($total["total_vente"],2,'.',' ')?></strong> <small>DH</small></td>

                            </tr>

                            <tr>

                            <?php if($total["total_exoneration"] > 0): ?>

                                <tr class="info">

                                    <td class="current-width">Exonération</td>

                                    <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                    <td><strong><?=number_format($total["total_exoneration"], 2, ".", " ")?></strong> <small>DH</small></td>

                                </tr>

                            <?php endif; ?>

                            <tr>

                                <td class="current-width">Paiements</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong class="<?=$color?>"><?=number_format($total["total_paiement"],2,'.',' ')?></strong> <small>DH</small></td>

                            </tr>

                            <tr>

                                <td class="current-width">Reste à payé</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong class="<?=$color?>"><?=number_format($total["total_reste"],2,'.',' ')?></strong> <small>DH</small></td>

                            </tr>

                            <?php if(_ENABLE_DROITS_TIMBRE_ && round($total["droit_timbre"], 2) > 0): ?>

                                <tr>

                                    <td class="current-width">Droit de timbre</td>

                                    <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                    <td><strong><?=number_format($total["droit_timbre"],2,'.',' ')?></strong> <small>DH</small></td>

                                </tr>

                            <?php endif; ?>

                            <tr>

                                <td class="current-width">Ticket</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><a href="<?=base_url()?>index.php/vente/ticket/<?=$vente->id_vente?>" target="_blank" class="btn btn-warning btn-xs" style="width: 100%;"><i class="fa fa-print"></i>&nbsp; Imprimer</a></strong></td>

                            </tr>

                            <tr>

                                <td class="current-width">B. Livraison</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><a href="<?=base_url()?>index.php/vente/bon_livraison/<?=$vente->id_vente?>" target="_blank" class="btn btn-warning btn-xs" style="width: 100%;"><i class="fa fa-print"></i>&nbsp; Imprimer</a></td>

                            </tr>

                            <?php if($vente->id_client != 1): ?>

                            <tr>

                                <td class="current-width">Facture</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td>

                                    <?php if(!empty($vente->num_facture)): ?>

                                        <a href="<?=base_url()?>index.php/vente/facture/<?=$vente->num_facture?>" target="_blank" class="btn btn-warning btn-xs" style="width: 100%;"><i class="fa fa-print"></i>&nbsp; Imprimer</a>

                                    <?php else: ?>

                                        <form id="form_creer_facture" method="post" action="<?=base_url()?>index.php/vente/creer_facture">

                                            <input type="hidden" name="id_vente" value="<?=$vente->id_vente?>">

                                        </form>

                                        <a href="javascript:;" onclick="confirmAction('form_creer_facture')" class="btn btn-primary btn-xs" style="width: 100%;"><i class="fa fa-plus"></i>&nbsp; Créer</a>

                                    <?php endif; ?>

                                </td>

                            </tr>

                            <?php endif; ?>

                            <tr>

                                <td class="current-width">Remarque</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><?=nl2br($vente->remarque)?></strong></td>

                            </tr>

                            </tbody>

                        </table>

                        <a href="<?=base_url()?>index.php/vente/paiement/<?=$vente->id_vente?>" class="btn btn-primary btn-sm" style="width: 100%;"><i class="fa fa-money"></i>&nbsp; Paiements</a>

                         <br><br>

                        <a href="<?=base_url()?>index.php/vente/modifier/<?=$vente->id_vente?>" class="btn btn-success btn-xs" style="width: 100%;"><i class="fa fa-wrench"></i>&nbsp; Modifier</a>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-md-8">

        <?php if(_ENABLE_SERVICE_): ?>

        <div class="row">

            <div class="col-md-12">

                <div class="box box-default box-solid">

                    <div class="box-header with-border">

                        <h3 class="box-title">Détails de Vente <?=$vente->code_vente?> &nbsp; ( Services ) </h3>

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

                                        <th>Service</th>

                                        <th>Catégorie</th>

                                        <?php if(_ENABLE_SUB_CATEGORIE_): ?>

                                            <th>Sous-Catégorie</th>

                                        <?php endif; ?>

                                        <th>Prix vente</th>

                                        <th>Remise</th>

                                        <th>Total TTC</th>

                                    </tr>

                                    </thead>

                                    <tbody>

                                    <?php

                                    foreach ($vente_details as $val):

                                        if(!empty($val["id_service"])) :

                                            ?>

                                            <tr class="<?=$val["prix_vente"] == 0 ? "tr_gratuit" : ""?>">

                                                <td><a href="<?=base_url()."index.php/service/details/".$val["id_service"]?>" rel="popover" data-img="<?=$val["image_s"]?>"><strong><?=$val["service"]?></strong></a></td>

                                                <td><a href="<?=base_url()."index.php/categorie/details/".$val["id_categorie_s"]?>"><strong><?=$val["categorie_s"]?></strong></a></td>

                                                <?php if(_ENABLE_SUB_CATEGORIE_): ?>

                                                    <td><a href="<?=base_url()."index.php/sub_categorie/details/".$val["id_sub_categorie_s"]?>"><strong><?=$val["sub_categorie_s"]?></strong></a></td>

                                                <?php endif; ?>

                                                <td data-sort="<?=round($val["prix_vente"],2)?>"><strong><?=number_format($val["prix_vente"],2,'.',' ')?></strong> <small>DH</small></td>

                                                <?php

                                                $remise = ($val["prix_vente"]*$val["remise"]/100)+$val["remise_dh"];

                                                ?>

                                                <td data-sort="<?=round($remise,2)?>"><strong><?=number_format($remise,2,'.',' ')?></strong> <small>DH</small></td>

                                                <td data-sort="<?=round(getRowDetailsTotal($val, $vente->tva)['total'],2)?>"><strong><?=number_format(getRowDetailsTotal($val, $vente->tva)['total'],2,'.',' ')?></strong> <small>DH</small></td>

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

        <?php endif;?>

        <div class="row">

            <div class="col-md-12">

                <div class="box box-default box-solid">

                    <div class="box-header with-border">

                        <h3 class="box-title">Détails de Vente <?=$vente->code_vente?> &nbsp; ( Produits )</h3>

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

                                        <th>C. Produit</th>

                                        <th>Produit</th>

                                        <th>Catégorie</th>

                                        <?php if(_ENABLE_SUB_CATEGORIE_): ?>

                                            <th>Sous-Catégorie</th>

                                        <?php endif; ?>

                                        <th>Quantite</th>

                                        <th>Prix vente</th>

                                        <th>Remise</th>

                                        <th>Total TTC</th>

                                    </tr>

                                    </thead>

                                    <tbody>

                                    <?php

                                    foreach ($vente_details as $val):

                                        if(!empty($val["id_produit"])) :

                                            ?>

                                            <tr class="<?=$val["prix_vente"] == 0 ? "tr_gratuit" : ""?>">

                                                <td><a href="<?=base_url()."index.php/produit/details/".$val["id_produit"]?>" rel="popover" data-img="<?=$val["image_p"]?>"><strong><?=$val["code_produit"]?></strong></a></td>

                                                <td>

                                                    <a href="<?=base_url()."index.php/produit/details/".$val["id_produit"]?>" rel="popover" data-img="<?=$val["image_p"]?>"><strong><?=$val["produit"]?></strong></a>

                                                    <?=$val["type"]==1 ? "<br><small class='text-info'><b>[ COMPOSE ]</b></small>" : "";?>

                                                </td>

                                                <td><a href="<?=base_url()."index.php/categorie/details/".$val["id_categorie_p"]?>"><strong><?=$val["categorie_p"]?></strong></a></td>

                                                <?php if(_ENABLE_SUB_CATEGORIE_): ?>

                                                    <td><a href="<?=base_url()."index.php/sub_categorie/details/".$val["id_sub_categorie_p"]?>"><strong><?=$val["sub_categorie_p"]?></strong></a></td>

                                                <?php endif; ?>

                                                <td><?=$val["quantite"]?></td>

                                                <td data-sort="<?=round($val["prix_vente"],2)?>"><strong><?=number_format($val["prix_vente"],2,'.',' ')?></strong> <small>DH</small></td>

                                                <?php

                                                $remise = ($val["prix_vente"]*$val["remise"]/100)+$val["remise_dh"];

                                                ?>

                                                <td data-sort="<?=round($remise,2)?>"><strong><?=number_format($remise,2,'.',' ')?></strong> <small>DH</small></td>

                                                <td data-sort="<?=round(getRowDetailsTotal($val, $vente->tva)['total'],2)?>"><strong><?=number_format(getRowDetailsTotal($val, $vente->tva)['total'],2,'.',' ')?></strong> <small>DH</small></td>

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

        <?php if(!empty($avoirs)): ?>

            <div class="row">

                <div class="col-md-12">

                    <div class="box box-default box-solid">

                        <div class="box-header with-border">

                            <h3 class="box-title">Liste de Bons d'Avoir de Vente <?=$vente->code_vente?> </h3>

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

                                            <th>Reste à payé</th>

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

                                                        <?=CheckArchive("avoir", $val["id_avoir"], true)?>

                                                    </td>

                                                    <td data-sort="<?=strtotime($val["date_avoir"])?>"><?=date("d/m/Y", strtotime($val["date_avoir"]))?></td>

                                                    <td data-sort="<?=round($total["total_avoir"],2)?>"><strong style="font-family: cursive;"><?=number_format($total["total_avoir"],2,'.',' ')?></strong> <small>DH</small></td>

                                                    <td data-sort="<?=round($total["total_reste"],2)?>"><strong style="font-family: cursive;"><?=number_format($total["total_reste"] * (-1),2,'.',' ')?></strong> <small>DH</small></td>

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

        <?php endif; ?>

    </div>

</div>



<script type="text/javascript">

    $(document).ready(function () {



        createDataTable(

            "#myDataTable_1",

            [ 1, "asc" ],

            [ [20, 50, 100, -1], [20, 50, 100, "Tous"] ],

            "#export_btns_1",

            "Détails de Vente <?=$vente->code_vente?>"

        );



        <?php if(!empty($avoirs)): ?>

        createDataTable(

            "#myDataTable_2",

            [ [ 1, "desc" ], [ 0, "desc" ] ],

            [ [20, 50, 100, -1], [20, 50, 100, "Tous"] ],

            "#export_btns_2",

            "Liste de Bons d'Avoir de Vente <?=$vente->code_vente?>"

        );

        <?php endif; ?>



    });



    <?php if($vente->id_client != 1): ?>

    function confirmAction(form)

    {

        Swal.fire({

            title: 'Confirmation!',

            html: "Voulez vous vraiment Créer une Facture?",

            type: 'warning',

            showCancelButton: true,

            confirmButtonColor: '#2a5d7d',

            confirmButtonText: ' &nbsp; Créer &nbsp;',

            cancelButtonText: 'Annuler'

        }).then((result) => {

            if (result.value) {

                $("#"+form).submit();

            }

        });

    }

    <?php endif; ?>

</script>