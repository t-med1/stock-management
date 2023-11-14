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
                                <th colspan="3" style="text-align: center; font-size: 2.5rem;"><?=$avoir->code_avoir?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="current-width">Commercial</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><?=getUserLabel($avoir->role, $avoir->utilisateur)?></td>
                            </tr>
                            <tr>
                                <td class="current-width">Vente</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td>
                                    <?php
                                        if(!empty($avoir->id_vente)):
                                            $vente = $this->db->where("id_vente", $avoir->id_vente)->get("vente")->row();
                                    ?>
                                        <a href="<?=base_url()?>index.php/vente/details/<?=$avoir->id_vente?>"><strong><?=$vente->code_vente?></strong></a>
                                    <?php else: ?>
                                        <i class="fa fa-times text-warning"></i>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="current-width">Client</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><a href="<?=base_url()."index.php/client/details/".$avoir->id_client?>"><?=$avoir->client?></a></strong></td>
                            </tr>
                            <tr>
                                <td class="current-width" style="vertical-align: top !important;">Adresse</td>
                                <td class="current-width" style="vertical-align: top !important;">&nbsp; : &nbsp;&nbsp;</td>
                                <td style="vertical-align: top !important;">
                                    <strong><?=!empty($adresse->adresse)?$adresse->adresse."<br>":""?><?=$adresse->ville.", ".$adresse->pays?></strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="current-width">Date de Bon d'Avoir</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=date("d/m/Y", strtotime($avoir->date_avoir))?></strong></td>
                            </tr>
                            <tr>
                                <td class="current-width">TVA</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=$avoir->tva?></strong> <small>%</small></td>
                            </tr>
                            <tr>
                                <?php
                                $total = getAvoirTotal($avoir->id_avoir);
                                $text = $total["total_avoir"] > 0 ? "Montant <br>à payer" : "Montant <br>de Retour";
                                $color = $total["total_reste"] > 0 ? "text-danger" : "";
                                ?>
                                <td class="current-width"><?=$text?></td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=number_format($total["total_avoir"],2,'.','')?></strong> <small>DH</small></td>
                            </tr>
                            <tr>
                                <td class="current-width">Paiements</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=number_format($total["total_paiement"],2,'.','')?></strong> <small>DH</small></td>
                            </tr>
                            <tr>
                                <td class="current-width">Reste</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong class="<?=$color?>"><?=number_format($total["total_reste"],2,'.','')?></strong> <small>DH</small></td>
                            </tr>
                            <?php if(_ENABLE_DROITS_TIMBRE_ && round($total["droit_timbre"], 2) > 0): ?>
                                <tr>
                                    <td class="current-width">Droit de timbre</td>
                                    <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                    <td><strong><?=number_format($total["droit_timbre"],2,'.','')?></strong> <small>DH</small></td>
                                </tr>
                            <?php endif; ?>
                            <tr>
                                <td class="current-width">Bon d'Avoir</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><a href="<?=base_url()?>index.php/avoir/bon_avoir/<?=$avoir->id_avoir?>" target="_blank" class="btn btn-warning btn-xs" style="width: 100%;"><i class="fa fa-print"></i>&nbsp; Imprimer</a></td>
                            </tr>
                            <tr>
                                <td class="current-width">Remarque</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=nl2br($avoir->remarque)?></strong></td>
                            </tr>
                            </tbody>
                        </table>
                        <a href="<?=base_url()?>index.php/avoir/paiement/<?=$avoir->id_avoir?>" class="btn btn-primary btn-sm" style="width: 100%;"><i class="fa fa-money"></i>&nbsp; Paiements</a>
                        <br><br>
                        <a href="<?=base_url()?>index.php/avoir/modifier/<?=$avoir->id_avoir?>" class="btn btn-success btn-xs" style="width: 100%;"><i class="fa fa-wrench"></i>&nbsp; Modifier</a>
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
                        <h3 class="box-title">Détails de Bon d'Avoir <?=$avoir->code_avoir?> (ENTREE)</h3>
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
                                    <?php foreach ($avoir_details_in as $val): ?>
                                        <tr class="<?=$val["etat"] == 0 ? "tr_broken" : "tr_back"?>">
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
                                            <td data-sort="<?=round($val["prix_vente"],2)?>"><strong><?=number_format($val["prix_vente"],2,'.','')?></strong> <small>DH</small></td>
                                            <?php
                                                $remise = ($val["prix_vente"]*$val["remise"]/100)+$val["remise_dh"];
                                            ?>
                                            <td data-sort="<?=round($remise,2)?>"><strong><?=number_format($remise,2,'.','')?></strong> <small>DH</small></td>
                                            <td data-sort="<?=round(getRowDetailsTotal($val)['total'],2)?>"><strong><?=number_format(getRowDetailsTotal($val, $avoir->tva)['total'],2,'.','')?></strong> <small>DH</small></td>
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
                        <h3 class="box-title">Détails de Bon d'Avoir <?=$avoir->code_avoir?> (SORTIE)</h3>
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
                                    <?php foreach ($avoir_details_out as $val): ?>
                                        <tr class="<?=$val["prix_vente"]==0 ? "tr_gratuit" : ""?>">
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
                                            <td data-sort="<?=round($val["prix_vente"],2)?>"><strong><?=number_format($val["prix_vente"],2,'.','')?></strong> <small>DH</small></td>
                                            <?php
                                                $remise = ($val["prix_vente"]*$val["remise"]/100)+$val["remise_dh"];
                                            ?>
                                            <td data-sort="<?=round($remise,2)?>"><strong><?=number_format($remise,2,'.','')?></strong> <small>DH</small></td>
                                            <td data-sort="<?=round(getRowDetailsTotal($val)['total'],2)?>"><strong><?=number_format(getRowDetailsTotal($val, $avoir->tva)['total'],2,'.','')?></strong> <small>DH</small></td>
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
            [ 1, "asc" ],
            [ [20, 50, 100, -1], [20, 50, 100, "Tous"] ],
            "#export_btns_1",
            "Détails de Bon d'Avoir <?=$avoir->code_avoir?> (ENTREE)"
        );

        createDataTable(
            "#myDataTable_2",
            [ 1, "asc" ],
            [ [20, 50, 100, -1], [20, 50, 100, "Tous"] ],
            "#export_btns_2",
            "Détails de Bon d'Avoir <?=$avoir->code_avoir?> (SORTIE)"
        );
        
    });
</script>