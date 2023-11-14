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
                                <th colspan="3" style="text-align: center; font-size: 2.5rem;"><?=$client_cmd->code_client_cmd?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="current-width">Commercial</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><?=getUserLabel($client_cmd->role, $client_cmd->utilisateur)?></td>
                            </tr>
                            <tr>
                                <td class="current-width">Client</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><a href="<?=base_url()."index.php/client/details/".$client_cmd->id_client?>"><?=$client_cmd->client?></a></strong></td>
                            </tr>
                            <tr>
                                <td class="current-width" style="vertical-align: top !important;">Adresse</td>
                                <td class="current-width" style="vertical-align: top !important;">&nbsp; : &nbsp;&nbsp;</td>
                                <td style="vertical-align: top !important;">
                                <strong><?=!empty($adresse->adresse)?$adresse->adresse."<br>":""?><?=$adresse->ville.", ".$adresse->pays?></strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="current-width">Date Commande <br>de Client</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=date("d/m/Y", strtotime($client_cmd->date_client_cmd))?></strong></td>
                            </tr>
                            <tr>
                                <td class="current-width">Bon Commande <br>de Client</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><a href="<?=base_url()?>index.php/client_cmd/bon_commande/<?=$client_cmd->id_client_cmd?>" target="_blank" class="btn btn-warning btn-xs" style="width: 100%;"><i class="fa fa-print"></i>&nbsp; Imprimer</a></td>
                            </tr>
                            <tr>
                                <td class="current-width">Vente</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td>
                                    <?php if(empty($vente)): ?>
                                        <a href="<?=base_url()?>index.php/vente/ajouter/cmd/<?=$client_cmd->id_client_cmd?>" class="btn btn-primary btn-xs" style="width: 100%;"><i class="fa fa-shopping-cart"></i>&nbsp; Créer</a>
                                    <?php else: ?>
                                        <a href="<?=base_url()?>index.php/vente/details/<?=$vente->id_vente?>"><strong><?=$vente->code_vente?></strong></a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="current-width">Remarque</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=nl2br($client_cmd->remarque)?></strong></td>
                            </tr>
                            </tbody>
                        </table>
                        <a href="<?=base_url()?>index.php/client_cmd/modifier/<?=$client_cmd->id_client_cmd?>" class="btn btn-success btn-xs" style="width: 100%;"><i class="fa fa-wrench"></i>&nbsp; Modifier</a>
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
                        <h3 class="box-title">Détails de Commande <?=$client_cmd->code_client_cmd?> </h3>
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
                                    <?php foreach ($client_cmd_details as $val): ?>
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
            "Détails de commande client <?=$client_cmd->code_client_cmd?>"
        );
        
    });
</script>