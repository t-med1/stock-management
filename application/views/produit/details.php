<div class="row">

    <div class="col-md-6">

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

                            <?php if($produit->display == 0): ?>

                                <tr>

                                    <th colspan="3" style="text-align: center; font-size: 1.5rem; background-color: #d2d6de;">[ ARCHIVE ]</th>

                                </tr>

                            <?php endif; ?>

                            <tr>

                                <th colspan="3" style="text-align: center; font-size: 2.5rem;"><?=$produit->full_name?></th>

                            </tr>

                            </thead>

                            <tbody>

                            <?php if($produit->type == 1): ?>

                                <tr class="info">

                                    <td class="current-width">Type</td>

                                    <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                    <td><strong>Produit Composé</strong></td>

                                </tr>

                            <?php endif; ?>

                            <tr>

                                <td class="current-width">Code produit</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><?=$produit->code_produit?></strong></td>

                            </tr>

                            <tr>

                                <td class="current-width">Catégorie</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><a href="<?=base_url()."index.php/categorie/details/".$produit->id_categorie?>"><?=$produit->categorie?></a></strong></td>

                            </tr>

                            <?php if(_ENABLE_SUB_CATEGORIE_): ?>

                            <tr>

                                <td class="current-width">Sous-Catégorie</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><a href="<?=base_url()."index.php/sub_categorie/details/".$produit->id_sub_categorie?>"><?=$produit->sub_categorie?></a></strong></td>

                            </tr>

                            <?php endif; ?>

                            <?php if($this->session->userdata("role_user")==1): ?>

                            <tr>

                                <td class="current-width">Prix d'Achat</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><?=number_format($produit->prix_achat,2,'.',' ')?></strong> <small>DH</small></td>

                            </tr>

                            <!-- <tr class="info">

                                <td class="current-width">Coût de revient</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><?=number_format(getCoutRevient($produit->id_produit),2,"."," ")?></strong> <small>DH</small></td>

                            </tr> -->

                            <?php endif; ?>

                            <tr>

                                <td class="current-width">Prix de Vente</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><?=number_format($produit->prix_vente,2,'.',' ')?></strong> <small>DH</small></td>

                            </tr>

                            <tr>

                                <td class="current-width">Alert de Stock</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><?=$produit->alert?></strong></td>

                            </tr>

                            <tr>

                                <td class="current-width">Dernier Inventaire</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td>

                                    <?php if(!empty($inventaire)): ?>

                                        <a href="<?=base_url()."index.php/inventaire/details/".$inventaire->id_inventaire?>"><strong><?=$inventaire->code_inventaire?></strong> &nbsp; ( <?=date("d/m/Y", strtotime($inventaire->date_inventaire))?> )</a>

                                    <?php else: ?>

                                        <i class="fa fa-times text-warning"></i>

                                    <?php endif; ?>

                                </td>

                            </tr>

                            <tr>

                                <td class="current-width">Description</td>

                                <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><?=nl2br($produit->description)?></strong></td>

                            </tr>

                            </tbody>

                        </table>

                        <?php if($produit->type == 1) : ?>

                            <a href="#" class="btn btn-info btn-xs" id="btnShowComposant" style="width: 100%; margin-bottom: 12px;"><i class="fa fa-list"></i>&nbsp;&nbsp; Afficher les composants</a>

                        <?php endif; ?>



                        <?php if(!empty($produit->image) && file_exists(_UPLOADS_PATH_.$produit->image)): ?>

                            <a href="#" class="btn btn-primary btn-xs" onclick='showImage("<?=$produit->full_name?>", "<?=$produit->image?>")' style="width: 100%; margin-bottom: 10px;"><i class="fa fa-picture-o"></i>&nbsp;&nbsp; Afficher l'Image</a>

                        <?php endif; ?>



                        <?php if($this->session->userdata("role_user")==1): ?>

                        <a href="<?=base_url()?>index.php/produit/<?=($produit->type==1?"prc_modifier/":"modifier/").$produit->id_produit?>" class="btn btn-success btn-xs" style="width: 100%;"><i class="fa fa-wrench"></i>&nbsp;&nbsp; Modifier</a>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="box box-default box-solid">

            <div class="box-header with-border">

                <h3 class="box-title">Stock</h3>

                <div class="box-tools pull-right">

                    <button type="button" class="btn btn-box-tool" data-widget="collapse">

                        <i class="fa fa-minus"></i>

                    </button>

                </div>

            </div>

            <div class="box-body">

                <div class="row">

                    <div class="col-md-12">

                        <table class="table">

                            <thead>

                            <tr>

                                <?php

                                    $color = "";

                                    if($qantite["stock"] > 0 && $qantite["stock"] <= $produit->alert) { $color = "#F8C471"; }

                                    elseif($qantite["stock"] <= 0) { $color = "#F1948A"; }

                                ?>

                                <th colspan="3" style="text-align: center; font-size: 2.5rem; background-color: <?=$color?>;"><?=$qantite["stock"]?></th>

                            </tr>

                            </thead>

                            <tbody>

                            <?php if($produit->type == 1): ?>

                                <tr>

                                    <td class="current-width">Total - [ <strong>Production</strong> ]</td>

                                    <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>

                                    <td><strong><?=$qantite["nbr_production_compose"]?></strong></td>

                                </tr>

                                <?php if(_ENABLE_DEMONTAGE_): ?>

                                <tr>

                                    <td class="current-width">Total - [ <strong>Démontage</strong> ]</td>

                                    <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>

                                    <td><strong><?=$qantite["nbr_demontage_compose"]?></strong></td>

                                </tr>

                                <?php endif; ?>

                            <?php endif; ?>

                            <tr>

                                <td class="current-width">Total - [ <strong>Achats</strong> ]</td>

                                <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><?=$qantite["nbr_achat"]?></strong></td>

                            </tr>

                            <tr>

                                <td class="current-width">Total - [ <strong>Ventes</strong> ]</td>

                                <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><?=$qantite["nbr_vente"]+$qantite["nbr_avoir_out"]?></strong></td>

                            </tr>

                            <tr>

                                <td class="current-width">Total - [ <strong>Bons d'Avoir</strong> ]</td>

                                <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><?=$qantite["nbr_avoir_in_good"]?></strong></td>

                            </tr>

                            <tr>

                                <td class="current-width">Total - [ <strong>Endommagé</strong> ]</td>

                                <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>

                                <td><strong><?=$qantite["nbr_end"]+$qantite["nbr_avoir_in_bad"]?></strong></td>

                            </tr>

                            <?php if(_ENABLE_PRODUCTION_ && $produit->type == 0): ?>

                                <tr>

                                    <td class="current-width">Total - [ <strong>Utilisé / Production</strong> ]</td>

                                    <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>

                                    <td><strong><?=$qantite["nbr_production_details"]?></strong></td>

                                </tr>

                                <?php if(_ENABLE_DEMONTAGE_): ?>

                                <tr>

                                    <td class="current-width">Total - [ <strong>Reprendre / Démontage</strong> ]</td>

                                    <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>

                                    <td><strong><?=$qantite["nbr_demontage_details"]?></strong></td>

                                </tr>

                                <?php endif; ?>

                            <?php endif; ?>

                            </tbody>

                        </table>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12" style="text-align: center;">

                        <canvas id="code_produit"></canvas>

                        <a href="<?=base_url()?>index.php/produit/codeBare/<?=$produit->id_produit?>" target="_blank">print</a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>



<?php if($produit->type == 1): ?>

    <div class="row">

        <div class="col-md-12">

            <div class="box box-default box-solid collapsed-box">

                <div class="box-header with-border">

                    <h3 class="box-title">Historique de production</h3>

                    <div class="box-tools pull-right">

                        <button type="button" class="btn btn-box-tool" data-widget="collapse">

                            <i class="fa fa-plus"></i>

                        </button>

                    </div>

                </div>

                <div class="box-body" style="padding-top: 3px; display: none;">

                    <div class="row">

                        <div class="col-md-12">

                            <div id="export_btns_4" style="float: right;margin: 8px 0px 12px 0px;"></div><br>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-12 table-responsive">

                            <table id="myDataTable_4" class="table myDataTable table-bordered table-striped">

                                <thead>

                                <th>Date</th>

                                <th>Code</th>

                                <th>Quantité</th>

                                </thead>

                                <tbody>

                                <?php foreach ($productions as $val): ?>

                                    <tr>

                                        <td data-sort="<?=strtotime($val["date_production"])?>"><?=date("d/m/Y", strtotime($val["date_production"]))?></td>

                                        <td>

                                            <a href="<?=base_url()."index.php/production/details/".$val["id_production"]?>"><strong><?=$val["code_production"]?></strong></a>

                                        </td>

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

    <?php if(_ENABLE_DEMONTAGE_): ?>

    <div class="row">

        <div class="col-md-12">

            <div class="box box-default box-solid collapsed-box">

                <div class="box-header with-border">

                    <h3 class="box-title">Historique de démontage</h3>

                    <div class="box-tools pull-right">

                        <button type="button" class="btn btn-box-tool" data-widget="collapse">

                            <i class="fa fa-plus"></i>

                        </button>

                    </div>

                </div>

                <div class="box-body" style="padding-top: 3px; display: none;">

                    <div class="row">

                        <div class="col-md-12">

                            <div id="export_btns_5" style="float: right;margin: 8px 0px 12px 0px;"></div><br>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-12 table-responsive">

                            <table id="myDataTable_5" class="table myDataTable table-bordered table-striped">

                                <thead>

                                <th>Date</th>

                                <th>Code</th>

                                <th>Quantité</th>

                                </thead>

                                <tbody>

                                <?php foreach ($demontages as $val): ?>

                                    <tr>

                                        <td data-sort="<?=strtotime($val["date_demontage"])?>"><?=date("d/m/Y", strtotime($val["date_demontage"]))?></td>

                                        <td>

                                            <a href="<?=base_url()."index.php/demontage/details/".$val["id_demontage"]?>"><strong><?=$val["code_demontage"]?></strong></a>

                                        </td>

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

    <?php endif; ?>

<?php endif; ?>

<?php if($this->session->userdata("role_user")==1): ?>

    <div class="row">

        <div class="col-md-12">

            <div class="box box-default box-solid collapsed-box">

                <div class="box-header with-border">

                    <h3 class="box-title">Historique d'achats</h3>

                    <div class="box-tools pull-right">

                        <button type="button" class="btn btn-box-tool" data-widget="collapse">

                            <i class="fa fa-plus"></i>

                        </button>

                    </div>

                </div>

                <div class="box-body" style="padding-top: 3px; display: none;">

                    <div class="row">

                        <div class="col-md-12">

                            <div id="export_btns_1" style="float: right;margin: 8px 0px 12px 0px;"></div><br>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-12 table-responsive">

                            <table id="myDataTable_1" class="table myDataTable table-bordered table-striped">

                                <thead>

                                <th>Date</th>

                                <th>Quantité</th>

                                <?php if($this->session->userdata("role_user")==1): ?>

                                    <th>Prix d'achat</th>

                                <?php endif; ?>

                                <th>Achat</th>

                                <th>Fournisseur</th>

                                </thead>

                                <tbody>

                                <?php foreach ($achats as $val): ?>

                                    <tr>

                                        <td data-sort="<?=strtotime($val["date_achat"])?>"><?=date("d/m/Y", strtotime($val["date_achat"]))?></td>

                                        <td><?=$val["quantite"]?></td>

                                        <?php if($this->session->userdata("role_user")==1): ?>

                                            <td><?=$val["prix_achat"]?> <small>DH</small></td>

                                        <?php endif; ?>

                                        <td>

                                            <a href="<?=base_url()?>index.php/achat/details/<?=$val["id_achat"]?>"><strong><?=$val["code_achat"]?></strong></a>

                                        </td>

                                        <td><a href="<?=base_url()?>index.php/fournisseur/details/<?=$val["id_fournisseur"]?>"><strong><?=$val["fournisseur"]?></strong></a></td>

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

<?php endif; ?>

<div class="row">

    <div class="col-md-12">

        <div class="box box-default box-solid collapsed-box">

            <div class="box-header with-border">

                <h3 class="box-title">Historique de ventes</h3>

                <div class="box-tools pull-right">

                    <button type="button" class="btn btn-box-tool" data-widget="collapse">

                        <i class="fa fa-plus"></i>

                    </button>

                </div>

            </div>

            <div class="box-body" style="padding-top: 3px; display: none;">

                <div class="row">

                    <div class="col-md-12">

                        <div id="export_btns_2" style="float: right;margin: 8px 0px 12px 0px;"></div><br>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 table-responsive">

                        <table id="myDataTable_2" class="table myDataTable table-bordered table-striped">

                            <thead>

                            <th>Date</th>

                            <th>Quantité</th>

                            <th>Vente</th>

                            <th>Client</th>

                            </thead>

                            <tbody>

                            <?php foreach ($ventes as $val): ?>

                                <tr>

                                    <td data-sort="<?=strtotime($val["date_vente"])?>"><?=date("d/m/Y", strtotime($val["date_vente"]))?></td>

                                    <td><?=$val["quantite"]?></td>

                                     <td>

                                        <a href="<?=base_url()?>index.php/vente/details/<?=$val["id_vente"]?>"><strong><?=$val["code_vente"]?></strong></a>

                                        <span style="display: none;">(F: <?=$val["num_facture"]?>)</span>

                                    </td>

                                    <td><a href="<?=base_url()?>index.php/client/details/<?=$val["id_client"]?>"><strong><?=$val["client"]?></strong></a></td>

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

        <div class="box box-default box-solid collapsed-box">

            <div class="box-header with-border">

                <h3 class="box-title">Historique de Bons d'Avoir</h3>

                <div class="box-tools pull-right">

                    <button type="button" class="btn btn-box-tool" data-widget="collapse">

                        <i class="fa fa-plus"></i>

                    </button>

                </div>

            </div>

            <div class="box-body" style="padding-top: 3px; display: none;">

                <div class="row">

                    <div class="col-md-12">

                        <div id="export_btns_3" style="float: right;margin: 8px 0px 12px 0px;"></div><br>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 table-responsive">

                        <table id="myDataTable_3" class="table myDataTable table-bordered table-striped">

                            <thead>

                            <th>Date</th>

                            <th>Quantité</th>

                            <th>Bon d'Avoir</th>

                            <th>Type</th>

                            <th>Client</th>

                            </thead>

                            <tbody>

                            <?php foreach ($avoirs_in as $val): ?>

                                <tr>

                                    <td data-sort="<?=strtotime($val["date_avoir"])?>"><?=date("d/m/Y", strtotime($val["date_avoir"]))?></td>

                                    <td><?=$val["quantite"]?></td>

                                    <td>

                                        <a href="<?=base_url()?>index.php/avoir/details/<?=$val["id_avoir"]?>"><strong><?=$val["code_avoir"]?></strong></a>

                                    </td>

                                    <td>Entrée (<strong><?=($val["etat"]==1?"N":"E")?></strong>)</td>

                                    <td><a href="<?=base_url()?>index.php/client/details/<?=$val["id_client"]?>"><strong><?=$val["client"]?></strong></a></td>

                                </tr>

                            <?php endforeach; ?>

                            <?php foreach ($avoirs_out as $val): ?>

                                <tr>

                                    <td data-sort="<?=strtotime($val["date_avoir"])?>"><?=date("d/m/Y", strtotime($val["date_avoir"]))?></td>

                                    <td><?=$val["quantite"]?></td>

                                    <td>

                                        <a href="<?=base_url()?>index.php/avoir/details/<?=$val["id_avoir"]?>"><strong><?=$val["code_avoir"]?></strong></a>

                                    </td>

                                    <td>Sortie</td>

                                    <td><a href="<?=base_url()?>index.php/client/details/<?=$val["id_client"]?>"><strong><?=$val["client"]?></strong></a></td>

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

        <div class="box box-default box-solid collapsed-box">

            <div class="box-header with-border">

                <h3 class="box-title">Historique / Endommagé</h3>

                <div class="box-tools pull-right">

                    <button type="button" class="btn btn-box-tool" data-widget="collapse">

                        <i class="fa fa-plus"></i>

                    </button>

                </div>

            </div>

            <div class="box-body" style="padding-top: 3px; display: none;">

                <div class="row">

                    <div class="col-md-12">

                        <div id="export_btns_8" style="float: right;margin: 8px 0px 12px 0px;"></div><br>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 table-responsive">

                        <table id="myDataTable_8" class="table myDataTable table-bordered table-striped">

                            <thead>

                            <th>Date</th>

                            <th>Quantité</th>

                            <th>Description</th>

                            </thead>

                            <tbody>

                            <?php foreach ($produits_end as $val): ?>

                                <tr>

                                    <td data-sort="<?=strtotime($val["date"])?>">

                                        <?=date("d/m/Y", strtotime($val["date"]))?>

                                    </td>

                                    <td><?=$val["quantite"]?></td>

                                    <td><?=$val["description"]?></td>

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

<?php if(_ENABLE_PRODUCTION_ && $produit->type == 0): ?>

    <div class="row">

        <div class="col-md-12">

            <div class="box box-default box-solid collapsed-box">

                <div class="box-header with-border">

                    <h3 class="box-title">Historique d'utlisation dans la production</h3>

                    <div class="box-tools pull-right">

                        <button type="button" class="btn btn-box-tool" data-widget="collapse">

                            <i class="fa fa-plus"></i>

                        </button>

                    </div>

                </div>

                <div class="box-body" style="padding-top: 3px; display: none;">

                    <div class="row">

                        <div class="col-md-12">

                            <div id="export_btns_6" style="float: right;margin: 8px 0px 12px 0px;"></div><br>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-12 table-responsive">

                            <table id="myDataTable_6" class="table myDataTable table-bordered table-striped">

                                <thead>

                                <th>Date</th>

                                <th>Production</th>

                                <th>Quantité</th>

                                </thead>

                                <tbody>

                                <?php foreach ($production_details as $val): ?>

                                    <tr>

                                        <td data-sort="<?=strtotime($val["date_production"])?>"><?=date("d/m/Y", strtotime($val["date_production"]))?></td>

                                        <td>

                                            <a href="<?=base_url()."index.php/production/details/".$val["id_production"]?>"><strong><?=$val["code_production"]?></strong></a>

                                        </td>

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

    <?php if(_ENABLE_DEMONTAGE_): ?>

    <div class="row">

        <div class="col-md-12">

            <div class="box box-default box-solid collapsed-box">

                <div class="box-header with-border">

                    <h3 class="box-title">Historique de reprendre de démontage</h3>

                    <div class="box-tools pull-right">

                        <button type="button" class="btn btn-box-tool" data-widget="collapse">

                            <i class="fa fa-plus"></i>

                        </button>

                    </div>

                </div>

                <div class="box-body" style="padding-top: 3px; display: none;">

                    <div class="row">

                        <div class="col-md-12">

                            <div id="export_btns_7" style="float: right;margin: 8px 0px 12px 0px;"></div><br>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-12 table-responsive">

                            <table id="myDataTable_7" class="table myDataTable table-bordered table-striped">

                                <thead>

                                <th>Date</th>

                                <th>Production</th>

                                <th>Quantité</th>

                                </thead>

                                <tbody>

                                <?php foreach ($demontage_details as $val): ?>

                                    <tr>

                                        <td data-sort="<?=strtotime($val["date_demontage"])?>"><?=date("d/m/Y", strtotime($val["date_demontage"]))?></td>

                                        <td>

                                            <a href="<?=base_url()."index.php/demontage/details/".$val["id_demontage"]?>"><strong><?=$val["code_demontage"]?></strong></a>

                                        </td>

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

    <?php endif; ?>

<?php endif; ?>



<?php if($produit->type == 1): ?>

<div id="myModalDetails" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title">Les composants de : &nbsp; <?=$produit->full_name?></h4>

            </div>

            <div class="modal-body">

                <table class="table myDataTable table-bordered table-striped" style="margin-bottom: 0px;">

                    <thead>

                    <tr>

                        <th>Produit</th>

                        <th>Catégorie</th>

                        <?php if(_ENABLE_SUB_CATEGORIE_): ?>

                        <th>Sous-Catégorie</th>

                        <?php endif; ?>

                        <th>Quantite</th>

                    </tr>

                    </thead>

                    <tbody>

                    <?php foreach ($produit_details as $val): ?>

                    <tr>

                        <td><?=$val["produit"]?></td>

                        <td><?=$val["categorie"]?></td>

                        <?php if(_ENABLE_SUB_CATEGORIE_): ?>

                        <td><?=$val["sub_categorie"]?></td>

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

<?php endif; ?>



<script type="text/javascript">

    $(document).ready(function () {



        createBarCode("<?=$produit->code_produit?>", "#code_produit");



        createDataTable(

            "#myDataTable_1",

            [ [ 0, "desc" ], [ 3, "desc" ] ],

            [ [5, 50, 100, -1], [5, 50, 100, "Tous"] ],

            "#export_btns_1",

            "Historique d'achats de produit : <?=$produit->full_name?>"

        );



        createDataTable(

            "#myDataTable_2",

            [ [ 0, "desc" ], [ 2, "desc" ] ],

            [ [5, 50, 100, -1], [5, 50, 100, "Tous"] ],

            "#export_btns_2",

            "Historique de ventes de produit : <?=$produit->full_name?>"

        );



        createDataTable(

            "#myDataTable_3",

            [ [ 0, "desc" ], [ 2, "desc" ] ],

            [ [5, 50, 100, -1], [5, 50, 100, "Tous"] ],

            "#export_btns_3",

            "Historique de Bons d'Avoir de produit : <?=$produit->full_name?>"

        );



        createDataTable(

            "#myDataTable_4",

            [ [ 0, "desc" ], [ 1, "desc" ] ],

            [ [5, 50, 100, -1], [5, 50, 100, "Tous"] ],

            "#export_btns_4",

            "Historique de production : <?=$produit->full_name?>"

        );



        createDataTable(

            "#myDataTable_5",

            [ [ 0, "desc" ], [ 1, "desc" ] ],

            [ [5, 50, 100, -1], [5, 50, 100, "Tous"] ],

            "#export_btns_5",

            "Historique de démontage : <?=$produit->full_name?>"

        );



        createDataTable(

            "#myDataTable_6",

            [ [ 0, "desc" ], [ 1, "desc" ] ],

            [ [5, 50, 100, -1], [5, 50, 100, "Tous"] ],

            "#export_btns_6",

            "Historique d'utlisation dans la production : <?=$produit->full_name?>"

        );



        createDataTable(

            "#myDataTable_7",

            [ [ 0, "desc" ], [ 1, "desc" ] ],

            [ [5, 50, 100, -1], [5, 50, 100, "Tous"] ],

            "#export_btns_7",

            "Historique de reprendre de démontage : <?=$produit->full_name?>"

        );



        createDataTable(

            "#myDataTable_8",

            [ [ 0, "desc" ], [ 1, "desc" ] ],

            [ [5, 50, 100, -1], [5, 50, 100, "Tous"] ],

            "#export_btns_8",

            "Historique - Endommagé : <?=$produit->full_name?>"

        );



        <?php if($produit->type == 1): ?>

        $("#btnShowComposant").on("click", function () {

             $("#myModalDetails").modal("show");

        });

        <?php endif; ?>



    });

</script>