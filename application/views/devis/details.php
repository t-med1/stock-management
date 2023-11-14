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
                                <th colspan="3" style="text-align: center; font-size: 2.5rem;"><?=$devis->code_devis?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="current-width">Commercial</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><?=getUserLabel($devis->role, $devis->utilisateur)?></td>
                            </tr>
                            <tr>
                                <td class="current-width">Client</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><a href="<?=base_url()."index.php/client/details/".$devis->id_client?>"><?=$devis->client?></a></strong></td>
                            </tr>
                            <tr>
                                <td class="current-width" style="vertical-align: top !important;">Adresse</td>
                                <td class="current-width" style="vertical-align: top !important;">&nbsp; : &nbsp;&nbsp;</td>
                                <td style="vertical-align: top !important;">
                                    <strong><?=!empty($adresse->adresse)?$adresse->adresse."<br>":""?><?=$adresse->ville.", ".$adresse->pays?></strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="current-width">Date devis</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=date("d/m/Y", strtotime($devis->date_devis))?></strong></td>
                            </tr>
                            <tr>
                                <td class="current-width">TVA</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=$devis->tva?></strong> <small>%</small></td>
                            </tr>
                            <tr>
                                <?php
                                    $total = getDevisTotal($devis->id_devis);
                                ?>
                                <td class="current-width">Montant</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=number_format($total["total_devis"],2,'.',' ')?></strong> <small>DH</small></td>
                            </tr>
                            <tr>
                            <tr>
                                <td class="current-width">Devis</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><a href="<?=base_url()?>index.php/devis/imprimer/<?=$devis->id_devis?>" target="_blank" class="btn btn-warning btn-xs" style="width: 100%;"><i class="fa fa-print"></i>&nbsp; Imprimer</a></td>
                            </tr>
                            <tr>
                                <td class="current-width">Vente</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td>
                                    <?php if(empty($vente)): ?>
                                        <a href="<?=base_url()?>index.php/vente/ajouter/devis/<?=$devis->id_devis?>" class="btn btn-primary btn-xs" style="width: 100%;"><i class="fa fa-shopping-cart"></i>&nbsp; Créer</a>
                                    <?php else: ?>
                                        <a href="<?=base_url()?>index.php/vente/details/<?=$vente->id_vente?>"><strong><?=$vente->code_vente?></strong></a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="current-width">Remarque</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=nl2br($devis->remarque)?></strong></td>
                            </tr>
                            </tbody>
                        </table>
                        <br><br>
                        <a href="<?=base_url()?>index.php/devis/modifier/<?=$devis->id_devis?>" class="btn btn-success btn-xs" style="width: 100%;"><i class="fa fa-wrench"></i>&nbsp; Modifier</a>
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
                        <h3 class="box-title">Détails de Devis <?=$devis->code_devis?> (Services) </h3>
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
                                    <?php foreach ($devis_details as $val):
                                        if(!$val['id_produit']) : ?>
                                        <tr class="<?=$val["prix_vente"] == 0 ? "tr_gratuit" : ""?>">
                                            <td>
                                                <a href="<?=base_url()."index.php/service/details/".$val["id_produit"]?>"><strong><?=$val["service"]?></strong></a>
                                                <?=$val["type"]==1 ? "<br><small class='text-info'><b>[ COMPOSE ]</b></small>" : "";?>
                                            </td>
                                            <td><a href="<?=base_url()."index.php/categorie/details/".$val["id_categorie_service"]?>"><strong><?=$val["categorie_service"]?></strong></a></td>
                                            <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                                <td><a href="<?=base_url()."index.php/sub_categorie/details/".$val["id_sub_categorie_service"]?>"><strong><?=$val["sub_categorie_service"]?></strong></a></td>
                                            <?php endif; ?>
                                            <td><?=$val["quantite"]?></td>
                                            <td data-sort="<?=round($val["prix_vente"],2)?>"><strong><?=number_format($val["prix_vente"],2,'.',' ')?></strong> <small>DH</small></td>
                                            <?php
                                                $remise = ($val["prix_vente"]*$val["remise"]/100)+$val["remise_dh"];
                                            ?>
                                            <td data-sort="<?=round($remise,2)?>"><strong><?=number_format($remise,2,'.',' ')?></strong> <small>DH</small></td>
                                            <td data-sort="<?=round(getRowDetailsTotal($val, $devis->tva)['total'],2)?>"><strong><?=number_format(getRowDetailsTotal($val, $devis->tva)['total'],2,'.',' ')?></strong> <small>DH</small></td>
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
                        <h3 class="box-title">Détails de Devis <?=$devis->code_devis?> (Produits) </h3>
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
                                    <?php foreach ($devis_details as $val): 
                                        if(!$val['id_service']) : ?>
                                        <tr class="<?=$val["prix_vente"] == 0 ? "tr_gratuit" : ""?>">
                                            <td><a href="<?=base_url()."index.php/produit/details/".$val["id_produit"]?>" rel="popover" data-img="<?=$val["image"]?>"><strong><?=$val["code_produit"]?></strong></a></td>
                                            <td>
                                                <a href="<?=base_url()."index.php/produit/details/".$val["id_produit"]?>" rel="popover" data-img="<?=$val["image"]?>"><strong><?=$val["produit"]?></strong></a>
                                                <?=$val["type"]==1 ? "<br><small class='text-info'><b>[ COMPOSE ]</b></small>" : "";?>
                                            </td>
                                            <td><a href="<?=base_url()."index.php/categorie/details/".$val["id_categorie"]?>"><strong><?=$val["categorie"]?></strong></a></td>
                                            <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                                <td><a href="<?=base_url()."index.php/sub_categorie/details/".$val["id_sub_categorie"]?>"><strong><?=$val["sub_categorie"]?></strong></a></td>
                                            <?php endif; ?>
                                            <td><?=$val["quantite"]?></td>
                                            <td data-sort="<?=round($val["prix_vente"],2)?>"><strong><?=number_format($val["prix_vente"],2,'.',' ')?></strong> <small>DH</small></td>
                                            <?php
                                                $remise = ($val["prix_vente"]*$val["remise"]/100)+$val["remise_dh"];
                                            ?>
                                            <td data-sort="<?=round($remise,2)?>"><strong><?=number_format($remise,2,'.',' ')?></strong> <small>DH</small></td>
                                            <td data-sort="<?=round(getRowDetailsTotal($val, $devis->tva)['total'],2)?>"><strong><?=number_format(getRowDetailsTotal($val, $devis->tva)['total'],2,'.',' ')?></strong> <small>DH</small></td>
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
            [ 1, "asc" ],
            [ [20, 50, 100, -1], [20, 50, 100, "Tous"] ],
            "#export_btns_1",
            "Détails de Devis <?=$devis->code_devis?>"
        );

    });
</script>