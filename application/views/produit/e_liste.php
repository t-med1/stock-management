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
                <form method="get" action="<?=base_url()."index.php/produit/e_liste"?>">
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
                <h3 class="box-title">Produits Endommagés</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3">
                        <a href="<?=base_url()?>index.php/produit/e_ajouter" class="btn btn-primary" style="width:100%;">
                            <i class="fa fa-chain-broken"></i> &nbsp; Nouveau
                        </a>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div id="export_btns" style="float: right;margin: 8px 0px 12px 0px;"></div><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table id="myDataTable" class="table myDataTable table-bordered table-striped">
                            <thead>
                            <th>Date</th>
                            <th>Commercial</th>
                            <th>Code</th>
                            <th>Produit</th>
                            <th>Catégorie</th>
                            <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                <th>Sous-Catégorie</th>
                            <?php endif; ?>
                            <th>Q. Endommagé</th>
                            <th>Description</th>
                            <th class="current-width no-export">Options</th>
                            </thead>
                            <tbody>
                            <?php foreach ($produits_end as $val): ?>
                                <tr>
                                    <td data-sort="<?=strtotime($val["date"])?>"><?=date("d/m/Y", strtotime($val["date"]))?></td>
                                    <td><?=getUserLabel($val["role"], $val["utilisateur"])?></td>
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
                                    <td><?=$val["description"]?></td>
                                    <td class="current-width no-export">
                                        <a href="<?=base_url()."index.php/produit/e_modifier/".$val["id_produit_end"];?>" class="btn btn-success rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Modifier">
                                            <i class="fa fa-wrench" aria-hidden="true"></i>
                                        </a>
                                        <?php if($this->session->userdata("role_user") == 1): ?>
                                            <form method="post" action="<?=base_url()."index.php/produit/e_supprimer/"?>" id="form_<?=$val["id_produit_end"]?>" style="display:none;">
                                                <input type="hidden" name="id_produit_end" value="<?=$val["id_produit_end"]?>">
                                            </form>
                                            <a href="#" onclick="confirmDelete('<?="form_".$val["id_produit_end"]?>')" class="btn btn-danger btn-sm rounded" data-toggle="tooltip" data-placement="top" title="Supprimer">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        <?php endif; ?>
                                    </td>
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

        createDataTable(
            "#myDataTable",
            [ 0, "desc" ],
            [ [20, 50, 100, -1], [20, 50, 100, "Tous"] ],
            "#export_btns"
        );
        
    });
</script>