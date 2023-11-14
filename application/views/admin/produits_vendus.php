<div class="row">
    <div class="col-md-12">
        <div class="box box-default box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Période</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <form method="get" action="<?=base_url()?>index.php/admin/produits_vendus">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Entre Le :</label>
                                <input type="date" class="form-control" name="date_debut" value="<?=date("Y-m-d", strtotime($date_debut))?>" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Et Le :</label>
                                <input type="date" class="form-control" name="date_fin" value="<?=date("Y-m-d", strtotime($date_fin))?>" required>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <button class="btn btn-primary" style="width:100%">
                                <i class="fa fa-search"></i> &nbsp; Filtrer
                            </button>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
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
                    <div class="col-md-6">
                        <div class="callout callout-success" style="margin-bottom: 5px;">
                            <h5 style="margin: 0px;">Total de Ventes :</h5>
                            <h3 style="margin: 10px 0px 0px 0px;"><span id="span_vente">0.00</span> <span style="font-size: 16px;">DH</span></h3>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="callout callout-info" style="margin-bottom: 5px;">
                            <h5 style="margin: 0px;">Bénéfice :</h5>
                            <h3 style="margin: 10px 0px 0px 0px;"><span id="span_benefice">0.00</span> <span style="font-size: 16px;">DH</span></h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="export_btns" style="float: right;margin: 8px 0px 12px 0px;"></div><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table id="myDataTable" class="table myDataTable table-bordered table-striped">
                            <thead>
                            <th>Code</th>
                            <th>Produit</th>
                            <th>Catégorie</th>
                            <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                <th>Sous-Catégorie</th>
                            <?php endif; ?>
                            <th class="info">Coût de revient</th>
                            <th>Quantité Vendue</th>
                            <th>Total de Ventes</th>
                            </thead>
                            <tbody>
                            <?php
                                $total_ventes = 0;
                                $total_cout_revient = 0;
                                foreach ($produits as $val):
                                    if($val["quantite"] <= 0) { continue; }
                                    $total_ventes += $val["total"];
                                    $total_cout_revient += $val["cout"]*$val["quantite"];
                            ?>
                                <tr>
                                    <td><a href="<?=base_url()."index.php/produit/details/".$val["id_produit"]?>" rel="popover" data-img="<?=$val["image"]?>"><strong><?=$val["code"]?></strong></a></td>
                                    <td>
                                        <a href="<?=base_url()."index.php/produit/details/".$val["id_produit"]?>" rel="popover" data-img="<?=$val["image"]?>"><strong><?=$val["produit"]?></strong></a>
                                        <?=$val["type"]==1 ? "<br><small class='text-info'><b>[ COMPOSE ]</b></small>" : "";?>
                                    </td>
                                    <td><a href="<?=base_url()."index.php/categorie/details/".$val["id_categorie"]?>"><strong><?=$val["categorie"]?></strong></a></td>
                                    <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                        <td><a href="<?=base_url()."index.php/sub_categorie/details/".$val["id_sub_categorie"]?>"><strong><?=$val["sub_categorie"]?></strong></a></td>
                                    <?php endif; ?>
                                    <td class="info"><strong><?=number_format($val["cout"],2,".", " ")?></strong> <small>DH</small></td>
                                    <td><strong><?=$val["quantite"]?></strong></td>
                                    <td data-sort="<?=round($val["total"])?>"><strong><?=number_format($val["total"],2,'.',' ')?></strong> <small>DH</small></td>
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

<script type="text/javascript">
    $(document).ready(function () {
        
        $("#span_vente").html('<?=number_format($total_ventes, 2, ".", " ")?>');
        $("#span_benefice").html('<?=number_format($total_ventes-$total_cout_revient, 2, ".", " ")?>');

        createDataTable(
            "#myDataTable",
            [ 1, "asc" ],
            [ [-1, 20, 50, 100], ["Tous", 20, 50, 100] ],
            "#export_btns"
        );
        
    });
</script>