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
                                <th colspan="3" style="text-align: center; font-size: 2.5rem;"><?=$demontage->code_demontage?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="current-width">Commercial</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><?=getUserLabel($demontage->role, $demontage->utilisateur)?></td>
                            </tr>
                            <tr>
                                <td class="current-width">Date Démontage</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=date("d/m/Y", strtotime($demontage->date_demontage))?></strong></td>
                            </tr>
                            <tr>
                                <td class="current-width">Produit</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=$demontage->produit?></strong></td>
                            </tr>
                            <tr>
                                <td class="current-width">Quantité</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=$demontage->quantite?></strong></td>
                            </tr>
                            <tr class="text-danger">
                                <td class="current-width">Frais</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=$demontage->frais?></strong> <small>DH</small></td>
                            </tr>
                            <tr>
                                <td class="current-width">Catégorie</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=$demontage->categorie?></strong></td>
                            </tr>
                            <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                <tr>
                                    <td class="current-width">Sous-Catégorie</td>
                                    <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                    <td><strong><?=$demontage->sub_categorie?></strong></td>
                                </tr>
                            <?php endif; ?>
                            <tr>
                                <td class="current-width">Remarque</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=nl2br($demontage->remarque)?></strong></td>
                            </tr>
                            </tbody>
                        </table>
                        <a href="<?=base_url()?>index.php/demontage/modifier/<?=$demontage->id_demontage?>" class="btn btn-success btn-xs" style="width: 100%;"><i class="fa fa-wrench"></i>&nbsp; Modifier</a>
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
                        <h3 class="box-title">Détails de Démontage <?=$demontage->code_demontage?> </h3>
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
                                    <?php foreach ($demontage_details as $val): ?>
                                        <tr>
                                            <td><a href="<?=base_url()."index.php/produit/details/".$val["id_produit"]?>" rel="popover" data-img="<?=$val["image"]?>"><strong><?=$val["code_produit"]?></strong></a></td>
                                            <td><a href="<?=base_url()."index.php/produit/details/".$val["id_produit"]?>" rel="popover" data-img="<?=$val["image"]?>"><strong><?=$val["produit"]?></strong></a></td>
                                            <td><a href="<?=base_url()."index.php/categorie/details/".$val["id_categorie"]?>"><strong><?=$val["categorie"]?></strong></a></td>
                                            <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                                <td><a href="<?=base_url()."index.php/sub_categorie/details/".$val["id_sub_categorie"]?>"><strong><?=$val["sub_categorie"]?></strong></a></td>
                                            <?php endif; ?>
                                            <td><strong><?=$val["quantite"]?></strong></td>
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
            "Détails de démontage <?=$demontage->code_demontage?>"
        );

    });
</script>