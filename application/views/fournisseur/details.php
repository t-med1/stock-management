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
                            <?php if($fournisseur->display == 0): ?>
                                <tr>
                                    <th colspan="3" style="text-align: center; font-size: 1.5rem; background-color: #d2d6de;">[ ARCHIVE ]</th>
                                </tr>
                            <?php endif; ?>
                            <tr>
                                <th colspan="3" style="text-align: center; font-size: 2.5rem;"><?=$fournisseur->full_name?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="current-width">Code Fournisseur</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=$fournisseur->code_fournisseur?></strong></td>
                            </tr>
                            <tr>
                                <td class="current-width">ICE</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=$fournisseur->ice?></strong></td>
                            </tr>
                            <tr>
                                <td class="current-width">Résponsable</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=$fournisseur->responsable?></strong></td>
                            </tr>
                            <tr>
                                <td class="current-width">Adresse</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=$fournisseur->adresse?></strong></td>
                            </tr>
                            <tr>
                                <td class="current-width">Ville</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=$fournisseur->ville?></strong></td>
                            </tr>
                            <tr>
                                <td class="current-width">Pays</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=$fournisseur->pays?></strong></td>
                            </tr>
                            <tr>
                                <td class="current-width">Téléphone</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=$fournisseur->telephone?></strong></td>
                            </tr>
                            <tr>
                                <td class="current-width">Email</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=$fournisseur->email?></strong></td>
                            </tr>
                            <tr>
                                <td class="current-width">Relevé</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><a href="<?=base_url()?>index.php/fournisseur/releve/<?=$fournisseur->id_fournisseur?>" class="btn btn-primary btn-xs" style="width: 100%;"><i class="fa fa-eye"></i>&nbsp; Voir Relevé</a></td>
                            </tr>
                            <tr>
                                <td class="current-width">Description</td>
                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=nl2br($fournisseur->description)?></strong></td>
                            </tr>
                            </tbody>
                        </table>
                        <a href="<?=base_url()?>index.php/fournisseur/modifier/<?=$fournisseur->id_fournisseur?>" class="btn btn-success btn-xs" style="width: 100%;"><i class="fa fa-wrench"></i>&nbsp; Modifier</a>
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
                        <h3 class="box-title">Liste d'achats de <?=$fournisseur->full_name?> </h3>
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
                                    <th>Montant</th>
                                    <th>Reste à payé</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($achats as $val):
                                        if(!empty($val["id_achat"])):
                                            $total = getAchatTotal($val["id_achat"]);
                                            ?>
                                            <tr>
                                                <td>
                                                    <a href="<?=base_url()."index.php/achat/details/".$val["id_achat"]?>"><strong><?=$val["code_achat"]?></strong></a>
                                                </td>
                                                <td data-sort="<?=strtotime($val["date_achat"])?>"><?=date("d/m/Y", strtotime($val["date_achat"]))?></td>
                                                <td data-sort="<?=round($total["total_achat"],2)?>"><strong><?=number_format($total["total_achat"], 2, '.', '')?></strong> <small>DH</small></td>
                                                <td data-sort="<?=round($total["total_reste"],2)?>"><strong><?=number_format($total["total_reste"], 2, '.', '')?></strong> <small>DH</small></td>
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
                        <h3 class="box-title">Liste de commandes de <?=$fournisseur->full_name?> </h3>
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
                                    <th>Code</th>
                                    <th>Date</th>
                                    <th>Produits</th>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        foreach ($commandes as $val):
                                            if(!empty($val["id_commande"])):
                                    ?>
                                        <tr>
                                            <td>
                                                <a href="<?=base_url()."index.php/commande/details/".$val["id_commande"]?>"><strong><?=$val["code_commande"]?></strong></a>
                                            </td>
                                            <td data-sort="<?=strtotime($val["date_commande"])?>"><?=date("d/m/Y", strtotime($val["date_commande"]))?></td>
                                            <td data-sort="<?=$val["produits"]?>"><strong><?=$val["produits"]?></strong></td>
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
            "Liste d'achats de <?=$fournisseur->full_name?> :"
        );

        createDataTable(
            "#myDataTable_2",
            [ [ 1, "desc" ], [ 0, "desc" ] ],
            [ [5, 50, 100, -1], [5, 50, 100, "Tous"] ],
            "#export_btns_2",
            "Liste de commandes de <?=$fournisseur->full_name?> :"
        );

    });
</script>