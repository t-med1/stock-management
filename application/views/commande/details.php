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
                                <th colspan="3" style="text-align: center; font-size: 2.5rem;"><?=$commande->code_commande?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="current-width">Commercial</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><?=getUserLabel($commande->role, $commande->utilisateur)?></td>
                            </tr>
                            <tr>
                                <td class="current-width">Fournisseur</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><a href="<?=base_url()."index.php/fournisseur/details/".$commande->id_fournisseur?>"><?=$commande->fournisseur?></a></strong></td>
                            </tr>
                            <tr>
                                <td class="current-width" style="vertical-align: top !important;">Adresse</td>
                                <td class="current-width" style="vertical-align: top !important;">&nbsp; : &nbsp;&nbsp;</td>
                                <td style="vertical-align: top !important;">
                                    <strong><?=!empty($adresse->adresse)?$adresse->adresse."<br>":""?><?=$adresse->ville.", ".$adresse->pays?></strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="current-width">Date Commande</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=date("d/m/Y", strtotime($commande->date_commande))?></strong></td>
                            </tr>
                            <tr>
                                <td class="current-width">Bon Commande</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><a href="<?=base_url()?>index.php/commande/bon_commande/<?=$commande->id_commande?>" target="_blank" class="btn btn-warning btn-xs" style="width: 100%;"><i class="fa fa-print"></i>&nbsp; Imprimer</a></td>
                            </tr>
                            <tr>
                                <td class="current-width">Achat</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td>
                                    <?php if(empty($achat)): ?>
                                        <a href="<?=base_url()?>index.php/achat/ajouter/<?=$commande->id_commande?>" class="btn btn-primary btn-xs" style="width: 100%;"><i class="fa fa-shopping-cart"></i>&nbsp; Créer</a>
                                    <?php else: ?>
                                        <a href="<?=base_url()?>index.php/achat/details/<?=$achat->id_achat?>"><strong><?=$achat->code_achat?></strong></a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="current-width">Remarque</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=nl2br($commande->remarque)?></strong></td>
                            </tr>
                            </tbody>
                        </table>
                        <a href="<?=base_url()?>index.php/commande/modifier/<?=$commande->id_commande?>" class="btn btn-success btn-xs" style="width: 100%;"><i class="fa fa-wrench"></i>&nbsp; Modifier</a>
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
                        <h3 class="box-title">Détails de Commande <?=$commande->code_commande?> </h3>
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
                                        <th>Quantite</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($commande_details as $val): ?>
                                        <tr>
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
            "Détails de commande <?=$commande->code_commande?>"
        );

    });
</script>