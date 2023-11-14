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
                                <th colspan="3" style="text-align: center; font-size: 2.5rem;"><?=$achat->code_achat?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="current-width">Commercial</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><?=getUserLabel($achat->role, $achat->utilisateur)?></td>
                            </tr>
                            <tr>
                                <td class="current-width">Commande</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td>
                                    <?php if(!empty($achat->id_commande)): ?>
                                        <a href="<?=base_url()?>index.php/commande/details/<?=$achat->id_commande?>"><strong><?=$achat->code_commande?></strong></a>
                                    <?php else: ?>
                                        <i class="fa fa-times text-warning"></i>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="current-width">N° de Facture <br>Fournisseur</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td>
                                    <?php if(!empty($achat->num_facture)): ?>
                                        <strong><?=$achat->num_facture?></strong>
                                    <?php else: ?>
                                        <i class="fa fa-times text-warning"></i>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="current-width">Facture</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td>
                                    <?php if(!empty($achat->facture)): ?>
                                    <a href="<?=base_url()?>app-config/uploads/<?=$achat->facture?>" target="_blank" class="btn btn-warning btn-xs" style="width: 100%;"><i class="fa fa-print"></i>&nbsp; Facture</a></td>
                                    <?php endif; ?>
                            </tr>
                            <tr>
                                <td class="current-width">Fournisseur</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><a href="<?=base_url()."index.php/fournisseur/details/".$achat->id_fournisseur?>"><?=$achat->fournisseur?></a></strong></td>
                            </tr>
                            <tr>
                                <td class="current-width" style="vertical-align: top !important;">Adresse</td>
                                <td class="current-width" style="vertical-align: top !important;">&nbsp; : &nbsp;&nbsp;</td>
                                <td style="vertical-align: top !important;">
                                    <strong><?=!empty($adresse->adresse)?$adresse->adresse."<br>":""?><?=$adresse->ville.", ".$adresse->pays?></strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="current-width">Date d'achat</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=date("d/m/Y", strtotime($achat->date_achat))?></strong></td>
                            </tr>
                            <tr>
                                <td class="current-width">TVA</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=$achat->tva?></strong> <small>%</small></td>
                            </tr>
                            <?php
                            $total = getAchatTotal($achat->id_achat);
                            $color = $total["total_reste"] > 0 ? "text-danger" : "";
                            ?>
                            <tr>
                                <td class="current-width">Montant</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=number_format($total["total_achat"],2,'.',' ')?></strong> <small>DH</small></td>
                            </tr>
                            <tr>
                                <td class="current-width">Paiements</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=number_format($total["total_paiement"],2,'.',' ')?></strong> <small>DH</small></td>
                            </tr>
                            <?php if($total["total_exoneration"] > 0): ?>
                                <tr class="info">
                                    <td class="current-width">Exonération</td>
                                    <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                    <td><strong><?=number_format($total["total_exoneration"], 2, ".", " ")?></strong> <small>DH</small></td>
                                </tr>
                            <?php endif; ?>
                            <tr>
                                <td class="current-width">Reste à payé</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong class="<?=$color?>"><?=number_format($total["total_reste"],2,'.',' ')?></strong> <small>DH</small></td>
                            </tr>
                            <tr class="<?=$achat->frais>0?"warning":""?>">
                                <td class="current-width">Frais</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong class="<?=$color?>"><?=number_format($achat->frais,2,'.',' ')?></strong> <small>DH</small></td>
                            </tr>
                            <tr>
                                <td class="current-width">N°.Expédition</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=$achat->num_expedition?></strong></td>
                            </tr>
                            <tr>
                                <td class="current-width">N°.Bon avoir</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=$achat->num_bon_avoir?></strong></td>
                            </tr>
                            <tr>
                                <td class="current-width">Bon avoir</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td>
                                    <?php if(!empty($achat->bon_avoir)): ?>
                                        <a href="<?=base_url()?>app-config/uploads/<?=$achat->bon_avoir?>" target="_blank" class="btn btn-warning btn-xs" style="width: 100%;"><i class="fa fa-print"></i>&nbsp; Facture</a>
                                    <?php endif;?>
                                </td>
                            </tr>
                            <tr>
                                <td class="current-width">Bon d'Achat</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><a href="<?=base_url()?>index.php/achat/bon_achat/<?=$achat->id_achat?>" target="_blank" class="btn btn-warning btn-xs" style="width: 100%;"><i class="fa fa-print"></i>&nbsp; Imprimer</a></td>
                            </tr>
                            <tr>
                                <td class="current-width">Remarque</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=nl2br($achat->remarque)?></strong></td>
                            </tr>
                            </tbody>
                        </table>
                        <a href="<?=base_url()?>index.php/achat/paiement/<?=$achat->id_achat?>" class="btn btn-primary btn-sm" style="width: 100%;"><i class="fa fa-money"></i>&nbsp; Paiements</a>
                        <br><br>
                        <a href="<?=base_url()?>index.php/achat/modifier/<?=$achat->id_achat?>" class="btn btn-success btn-xs" style="width: 100%;"><i class="fa fa-wrench"></i>&nbsp; Modifier</a>
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
                        <h3 class="box-title">Détails d'achat <?=$achat->code_achat?> </h3>
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
                                        <th>P.U</th>
                                        <th>Quantite</th>
                                        <th class="info">C.R</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($achat_details as $val): ?>
                                    <tr class="<?=$val["prix_achat"] == 0 ? "tr_gratuit" : ""?>">
                                        <td><a href="<?=base_url()."index.php/produit/details/".$val["id_produit"]?>" rel="popover" data-img="<?=$val["image"]?>"><strong><?=$val["code_produit"]?></strong></a></td>
                                        <td>
                                            <a href="<?=base_url()."index.php/produit/details/".$val["id_produit"]?>" rel="popover" data-img="<?=$val["image"]?>"><strong><?=$val["produit"]?></strong></a>
                                            <?=$val["type"]==1 ? "<br><small class='text-info'><b>[ COMPOSE ]</b></small>" : "";?>
                                        </td>
                                        <td><a href="<?=base_url()."index.php/categorie/details/".$val["id_categorie"]?>"><strong><?=$val["categorie"]?></strong></a></td>
                                        <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                            <td><a href="<?=base_url()."index.php/sub_categorie/details/".$val["id_sub_categorie"]?>"><strong><?=$val["sub_categorie"]?></strong></a></td>
                                        <?php endif; ?>
                                        <td><strong><?=$val["prix_achat"]?></strong> <small>DH</small></td>
                                        <td><?=$val["quantite"]?></td>
                                        <td class="info"><strong><?=$val["prix_achat"] == 0 ? number_format(0,2,"."," ") : number_format(getCoutRevient($val["id_produit"], $achat->id_achat),2,"."," ")?></strong> <small>DH</small></td>
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
            "#myDataTable",
            [ 1, "asc" ],
            [ [20, 50, 100, -1], [20, 50, 100, "Tous"] ],
            "#export_btns",
            "Détails d'achat <?=$achat->code_achat?>"
        );

    });
</script>