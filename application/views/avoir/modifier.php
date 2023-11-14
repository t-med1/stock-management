<form method="post" action="<?=base_url()?>index.php/avoir/modifier">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Modifier Bon d'Avoir</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <label style="float: right; margin-top: 8px;"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> N° de BA :</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="code_avoir" id="code_avoir" placeholder="N° de BA" required>
                            <span style="color: red; display: none;" id="code_avoir_exists"></span>
                            <input type="hidden" name="id_avoir" value="<?=$avoir->id_avoir?>">
                        </div>
                    </div>
                    <?php if(!empty($avoir->id_vente)): ?>
                        <div class="row" style="margin-top: 15px;">
                            <div class="col-md-1"></div>
                            <div class="col-md-3">
                                <label style="float: right; margin-top: 8px;"><span class="text-blue" data-toggle="tooltip" title="Recommandé">*</span> N° de BL :</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="code_vente" id="code_vente" value="<?=$this->db->where("id_vente", $avoir->id_vente)->get("vente")->row()->code_vente?>" placeholder="N° de BL" readonly>
                                <input type="hidden" name="id_client" value="<?=$avoir->id_client?>">
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <label style="float: right; margin-top: 8px;"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Client :</label>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control select2" name="id_client" id="id_client" required>
                                <?php
                                $client_exists = false;
                                foreach ($clients as $val):
                                    if($val["id_client"] == $avoir->id_client) {
                                        $client_exists = true;
                                    }
                                    ?>
                                    <option value="<?=$val["id_client"]?>"
                                            data-ice="<?=$val["ice"]?>"
                                            data-full_name="<?=$val["full_name"]?>"
                                            data-responsable="<?=$val["responsable"]?>"
                                            data-adresse="<?=$val["adresse"]?>"
                                            data-ville="<?=$val["ville"]?>"
                                            data-pays="<?=$val["pays"]?>"
                                            data-telephone="<?=$val["telephone"]?>"
                                            data-remise="<?=$val["remise"]?>"
                                    >
                                        <?=$val["full_name"]?>
                                    </option>
                                <?php endforeach; ?>
                                <?php if(!$client_exists): ?>
                                    <option value="<?=$client->id_client?>"
                                            data-ice="<?=$client->ice?>"
                                            data-full_name="<?=$client->full_name?>"
                                            data-responsable="<?=$client->responsable?>"
                                            data-adresse="<?=$client->adresse?>"
                                            data-ville="<?=$client->ville?>"
                                            data-pays="<?=$client->pays?>"
                                            data-telephone="<?=$client->telephone?>"
                                            data-remise="<?=$client->remise?>"
                                    >
                                        <?=$client->full_name?>
                                    </option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <label style="float: right; margin-top: 8px;"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Date de Bon d'Avoir :</label>
                        </div>
                        <div class="col-md-6">
                            <input type="date" class="form-control" name="date_avoir" value="<?=date("Y-m-d", strtotime($avoir->date_avoir))?>" placeholder="Date de Bon d'Avoir" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning alert-dismissible" id="alert_produit" style="display:none;">
                <h4><i class="icon fa fa-info-circle"></i> Alerte !</h4>
                La liste des produits à sélectionné est vide.
            </div>
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Produits (ENTREE)</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3" style="margin-top: 10px;">

                            <input type="text" class="form-control" id="code_produit_back" placeholder="Code Produit" style="border: 2px dashed rgb(54, 127, 169);"><br>
                            <input type="text" list="id_produit_back_datalist" class="form-control" id="id_produit_back" placeholder="Nom Produit" style="border: 2px solid rgb(54, 127, 169);">
                            <datalist id="id_produit_back_datalist"></datalist>

                            <br>

                            <input type="text" class="form-control" id="code_produit_broken" placeholder="Code Produit Endommagé" style="border: 2px dashed rgb(231, 76, 60);"><br>
                            <input type="text" list="id_produit_broken_datalist" class="form-control" id="id_produit_broken" placeholder="Nom Produit Endommagé" style="border: 2px solid rgb(231, 76, 60); margin-bottom: 10px;">
                            <datalist id="id_produit_broken_datalist"></datalist>

                        </div>
                        <div class="col-md-9 table-responsive" style="margin-top: 10px; overflow-x: auto;">
                            <table class="table table-bordered table-striped myDataTable">
                                <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Produit</th>
                                    <th>Catégorie</th>
                                    <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                        <th>Sous-Catégorie</th>
                                    <?php endif; ?>
                                    <th class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Quantite</th>
                                    <th class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> P. vente <small>(DH)</small></th>
                                    <th class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Remise <small>(%)</small></th>
                                    <th class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Remise <small>(DH)</small></th>
                                    <th class="current-width">Total</th>
                                    <th class="current-width"><i class="fa fa-fw fa-trash"></i></th>
                                </tr>
                                </thead>
                                <tbody id="tbody_produit_back">
                                <?php
                                    $ids_back = array();
                                    $ids_broken = array();
                                    foreach ($avoir_details_in as $val):
                                        $random = rand(100000000, 999999999);
                                        if($val["etat"] == 1) :
                                            array_push($ids_back, $val["id_produit"]);
                                ?>
                                    <tr id="tr_<?=$random?>" class="tr_back">
                                        <td>
                                            <a href="javascript:;" class="produitPopup" rel="popover" data-img="<?=$val["image"]?>">
                                                <?=$val["code_produit"]?>
                                                <input type="hidden" name="id_produit_back[]" value="<?=$val["id_produit"]?>">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="javascript:;" class="produitPopup" rel="popover" data-img="<?=$val["image"]?>">
                                                <?=$val["produit"]?>
                                            </a>
                                        </td>
                                        <td><?=$val["categorie"]?></td>
                                        <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                            <td><?=$val["sub_categorie"]?></td>
                                        <?php endif; ?>
                                        <td class="current-width">
                                            <input type="number" step="any" value="<?=$val["quantite"]?>" min="0.1" name="quantite_back_<?=$val["id_produit"]?>" id="quantite_back_<?=$val["id_produit"]?>" oninput="getTotalBack(<?=$val["id_produit"]?>);" class="form-control input-sm" style="width:90px;" required>
                                        </td>
                                        <td class="current-width">
                                            <input type="number" value="<?=$val["prix_vente"]?>" min="0" step="any" name="prix_vente_back_<?=$val["id_produit"]?>" id="prix_vente_back_<?=$val["id_produit"]?>" oninput="getTotalBack(<?=$val["id_produit"]?>);" class="form-control input-sm" style="width:90px;" required>
                                        </td>
                                        <td class="current-width">
                                            <input type="number" value="<?=$val["remise"]?>" min="0" step="any" name="remise_back_<?=$val["id_produit"]?>" id="remise_back_<?=$val["id_produit"]?>" oninput="getTotalBack(<?=$val["id_produit"]?>);" class="form-control input-sm" style="width:90px;" required>
                                        </td>
                                        <td class="current-width">
                                            <input type="number" value="<?=$val["remise_dh"]?>" min="0" step="any" name="remise_dh_back_<?=$val["id_produit"]?>" id="remise_dh_back_<?=$val["id_produit"]?>" oninput="getTotalBack(<?=$val["id_produit"]?>);" class="form-control input-sm" style="width:90px;" required>
                                        </td>
                                        <td class="current-width" id="total_back_<?=$val["id_produit"]?>"><span class="span_total_back"><?=number_format(getRowDetailsTotal($val)['total'],2,'.','')?></span> <small>DH</small></td>
                                        <td class="current-width"><a href="javascript:;" onclick="removeRowBack(<?=$random?>, <?=$val["id_produit"]?>)"><i class="fa fa-fw fa-trash"></i></a></td>
                                    </tr>
                                <?php
                                    else:
                                        array_push($ids_broken, $val["id_produit"]);
                                ?>
                                    <tr id="tr_<?=$random?>" class="tr_broken">
                                        <td>
                                            <a href="javascript:;" class="produitPopup" rel="popover" data-img="<?=$val["image"]?>">
                                                <?=$val["code_produit"]?>
                                                <input type="hidden" name="id_produit_broken[]" value="<?=$val["id_produit"]?>">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="javascript:;" class="produitPopup" rel="popover" data-img="<?=$val["image"]?>">
                                                <?=$val["produit"]?>
                                            </a>
                                        </td>
                                        <td><?=$val["categorie"]?></td>
                                        <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                            <td><?=$val["sub_categorie"]?></td>
                                        <?php endif; ?>
                                        <td class="current-width">
                                            <input type="number" step="any" value="<?=$val["quantite"]?>" min="0.1" name="quantite_broken_<?=$val["id_produit"]?>" id="quantite_broken_<?=$val["id_produit"]?>" oninput="getTotalBroken(<?=$val["id_produit"]?>);" class="form-control input-sm" style="width:90px;" required>
                                        </td>
                                        <td class="current-width">
                                            <input type="number" value="<?=$val["prix_vente"]?>" min="0" step="any" name="prix_vente_broken_<?=$val["id_produit"]?>" id="prix_vente_broken_<?=$val["id_produit"]?>" oninput="getTotalBroken(<?=$val["id_produit"]?>);" class="form-control input-sm" style="width:90px;" required>
                                        </td>
                                        <td class="current-width">
                                            <input type="number" value="<?=$val["remise"]?>" min="0" step="any" name="remise_broken_<?=$val["id_produit"]?>" id="remise_broken_<?=$val["id_produit"]?>" oninput="getTotalBroken(<?=$val["id_produit"]?>);" class="form-control input-sm" style="width:90px;" required>
                                        </td>
                                        <td class="current-width">
                                            <input type="number" value="<?=$val["remise_dh"]?>" min="0" step="any" name="remise_dh_broken_<?=$val["id_produit"]?>" id="remise_dh_broken_<?=$val["id_produit"]?>" oninput="getTotalBroken(<?=$val["id_produit"]?>);" class="form-control input-sm" style="width:90px;" required>
                                        </td>
                                        <td class="current-width" id="total_broken_<?=$val["id_produit"]?>"><span class="span_total_broken"><?=number_format(getRowDetailsTotal($val),2,'.','')?></span> <small>DH</small></td>
                                        <td class="current-width"><a href="javascript:;" onclick="removeRowBroken(<?=$random?>, <?=$val["id_produit"]?>)"><i class="fa fa-fw fa-trash"></i></a></td>
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
                    <h3 class="box-title">Produits (SORTIE)</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3" style="margin-top: 10px;">

                            <input type="text" class="form-control" id="code_produit" placeholder="Code Produit" style="border: 2px dashed rgb(54, 127, 169);"><br>
                            <input type="text" list="id_produit_datalist" class="form-control" id="id_produit" placeholder="Nom Produit" style="border: 2px solid rgb(54, 127, 169);">
                            <datalist id="id_produit_datalist"></datalist>

                            <br>

                            <input type="text" class="form-control" id="code_produit_free" placeholder="Code Produit Gratuit" style="border: 2px dashed rgb(243, 156, 18);"><br>
                            <input type="text" list="id_produit_free_datalist" class="form-control" id="id_produit_free" placeholder="Nom Produit Gratuit" style="border: 2px solid rgb(243, 156, 18); margin-bottom: 10px;">
                            <datalist id="id_produit_free_datalist"></datalist>

                        </div>
                        <div class="col-md-9 table-responsive" style="margin-top: 10px; overflow-x: auto;">
                            <table class="table table-bordered myDataTable">
                                <thead>
                                <tr>
                                    <th class="current-width"><i class="fa fa-info-circle"></i></th>
                                    <th>Code</th>
                                    <th>Produit</th>
                                    <th>Catégorie</th>
                                    <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                        <th>Sous-Catégorie</th>
                                    <?php endif; ?>
                                    <th class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Quantite</th>
                                    <th class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> P. vente <small>(DH)</small></th>
                                    <th class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Remise <small>(%)</small></th>
                                    <th class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Remise <small>(DH)</small></th>
                                    <th class="current-width">Total</th>
                                    <th class="current-width"><i class="fa fa-fw fa-trash"></i></th>
                                </tr>
                                </thead>
                                <tbody id="tbody_produit">
                                <?php
                                $ids = array();
                                $ids_free = array();
                                foreach ($avoir_details_out as $val):
                                    $random = rand(100000000, 999999999);
                                    $max = (int)getQuantiteProduit($val["id_produit"])["stock"];
                                    if($val["prix_vente"] != 0) :
                                        array_push($ids, $val["id_produit"]);
                                        ?>
                                        <tr id="tr_<?=$random?>">
                                            <td class="current-width"><?=createDescriptionPopover($val["description"])?></td>
                                            <td>
                                                <a href="javascript:;" class="produitPopup" rel="popover" data-img="<?=$val["image"]?>">
                                                    <?=$val["code_produit"]?>
                                                    <input type="hidden" name="id_produit[]" value="<?=$val["id_produit"]?>">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="javascript:;" class="produitPopup" rel="popover" data-img="<?=$val["image"]?>">
                                                    <?=$val["produit"]?>
                                                </a>
                                            </td>
                                            <td><?=$val["categorie"]?></td>
                                            <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                                <td><?=$val["sub_categorie"]?></td>
                                            <?php endif; ?>
                                            <td class="current-width">
                                                <input type="number" step="any" value="<?=$val["quantite"]?>" min="0.1" max="<?=$max+(int)$val["quantite"]?>" name="quantite_<?=$val["id_produit"]?>" id="quantite_<?=$val["id_produit"]?>" oninput="getTotal(<?=$val["id_produit"]?>);" class="form-control input-sm" style="width:90px;" required>
                                            </td>
                                            <td class="current-width">
                                                <input type="number" value="<?=$val["prix_vente"]?>" min="0" step="any" name="prix_vente_<?=$val["id_produit"]?>" id="prix_vente_<?=$val["id_produit"]?>" oninput="getTotal(<?=$val["id_produit"]?>);" class="form-control input-sm" style="width:90px;" required>
                                            </td>
                                            <td class="current-width">
                                                <input type="number" value="<?=$val["remise"]?>" min="0" step="any" name="remise_<?=$val["id_produit"]?>" id="remise_<?=$val["id_produit"]?>" oninput="getTotal(<?=$val["id_produit"]?>);" class="form-control input-sm" style="width:90px;" required>
                                            </td>
                                            <td class="current-width">
                                                <input type="number" value="<?=$val["remise_dh"]?>" min="0" step="any" name="remise_dh_<?=$val["id_produit"]?>" id="remise_dh_<?=$val["id_produit"]?>" oninput="getTotal(<?=$val["id_produit"]?>);" class="form-control input-sm" style="width:90px;" required>
                                            </td>
                                            <td class="current-width" id="total_<?=$val["id_produit"]?>"><span class="span_total"><?=number_format(getRowDetailsTotal($val)['total'],2,'.','')?></span> <small>DH</small></td>
                                            <td class="current-width"><a href="javascript:;" onclick="removeRow(<?=$random?>, <?=$val["id_produit"]?>)"><i class="fa fa-fw fa-trash"></i></a></td>
                                        </tr>
                                    <?php
                                        /* FREE */
                                        else:
                                            array_push($ids_free, $val["id_produit"]);
                                    ?>
                                        <tr id="tr_<?=$random?>" class="tr_gratuit">
                                            <td class="current-width"><?=createDescriptionPopover($val["description"])?></td>
                                            <td>
                                                <a href="javascript:;" class="produitPopup" rel="popover" data-img="<?=$val["image"]?>">
                                                    <?=$val["code_produit"]?>
                                                    <input type="hidden" name="id_produit_free[]" value="<?=$val["id_produit"]?>">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="javascript:;" class="produitPopup" rel="popover" data-img="<?=$val["image"]?>">
                                                    <?=$val["produit"]?>
                                                </a>
                                            </td>
                                            <td><?=$val["categorie"]?></td>
                                            <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                                <td><?=$val["sub_categorie"]?></td>
                                            <?php endif; ?>
                                            <td class="current-width">
                                                <input type="number" step="any" value="<?=$val["quantite"]?>" max="<?=$max+(int)$val["quantite"]?>" min="0.1" name="quantite_free_<?=$val["id_produit"]?>" class="form-control input-sm" style="width:90px;">
                                            </td>
                                            <td class="current-width">
                                                <input type="number" value="0" class="form-control input-sm" style="width:90px;" readonly>
                                            </td>
                                            <td class="current-width">
                                                <input type="number" value="0" class="form-control input-sm" style="width:90px;" readonly>
                                            </td>
                                            <td class="current-width">
                                                <input type="number" value="0" class="form-control input-sm" style="width:90px;" readonly>
                                            </td>
                                            <td class="current-width">0 <small>DH</small></td>
                                            <td class="current-width"><a href="javascript:;" onclick="removeRowFree(<?=$random?>, <?=$val["id_produit"]?>)"><i class="fa fa-fw fa-trash"></i></a></td>
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
        <div class="col-md-6">
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Détails Client</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Client :</label>
                                <input type="text" id="full_name" name="full_name" class="form-control" readonly>
                                <small class="form-text text-success" id="client_ice"></small>
                            </div>
                            <div class="form-group">
                                <label>Résponsable :</label>
                                <input type="text" id="responsable" name="responsable" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label>Téléphone :</label>
                                <input type="text" id="telephone" name="telephone" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label>Adresse :</label>
                                <input type="text" id="adresse" name="adresse" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Ville :</label>
                                <input type="text" id="ville" name="ville" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Pays :</label>
                                <select class="form-control select2" id="pays" name="pays" required>
                                    <?php foreach (getCountries() as $country): ?>
                                        <option value="<?=$country->name?>">
                                            <?=$country->name?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Remarque :</label>
                                <textarea class="form-control" name="remarque" maxlength="200" rows="3" placeholder="Remarque"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                        <div class="col-md-12">
                            <table class="table table-bordered" style="margin-bottom: 0px;">
                                <thead>
                                <tr>
                                    <th class="current-width"> </th>
                                    <th>ENTREE</th>
                                    <th>SORTIE</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td style="vertical-align: center;" class="current-width"><strong>Total HT</strong> <small>(DH)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                    <td><input type="text" value="0" id="total_ht_in" class="form-control" readonly></td>
                                    <td><input type="text" value="0" id="total_ht_out" class="form-control" readonly></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: center;" class="current-width"><strong><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> TVA</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                    <td colspan="2">
                                        <select name="tva" id="tva" class="form-control" onchange="getAvoirTotal()" required>
                                            <option value="20" <?=$avoir->tva == 20 ? "selected" : ""?>>20 %</option>
                                            <option value="0" <?=$avoir->tva == 0 ? "selected" : ""?>>0 %</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: center;" class="current-width"><strong>Total TTC</strong> <small>(DH)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                    <td><input type="text" value="0" id="total_ttc_in" class="form-control" readonly></td>
                                    <td><input type="text" value="0" id="total_ttc_out" class="form-control" readonly></td>
                                </tr>
                                <tr class="info">
                                    <td style="vertical-align: center;" class="current-width"><strong>Montant de Retour</strong> <small>(DH)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                    <td colspan="2">
                                        <input type="text" value="0" id="total_retour" class="form-control" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="vertical-align: middle;" class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Paiement <small>(DH)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                                    <td colspan="2"><input type="number" step="any" min="0" value="<?=number_format(getAvoirTotal($avoir->id_avoir)["total_paiement"],2,'.','')?>" id="avoir_paiement" name="avoir_paiement" class="form-control" readonly></td>
                                </tr>
                                <tr class="warning">
                                    <th style="vertical-align: middle;" class="current-width">Reste <small>(DH)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                                    <td colspan="2"><input type="text" value="0" id="avoir_reste" class="form-control" readonly></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="box-footer" style="text-align: center;">
                    <button type="submit" style="width: 50%;" class="btn btn-primary">
                        <i class="fa fa-save"></i> &nbsp; Mettre à jour
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    var selected_produit_back = <?=json_encode($ids_back)?>;
    var selected_produit_broken = <?=json_encode($ids_broken)?>;
    var selected_produit = <?=json_encode($ids)?>;
    var selected_produit_free = <?=json_encode($ids_free)?>;
    var remise_client = 0;

    $(document).ready(function ()
    {
        fixTable("tbody_produit");
        fixTable("tbody_produit_back");

        createProduitCodeInput(
            "#code_produit_back",
            function (option) {
                createProduitBackRow(option);
            },
            "OK"
        );

        createProduitCodeInput(
            "#code_produit_broken",
            function (option) {
                createProduitBrokenRow(option);
            },
            "OK"
        );

        createProduitCodeInput(
            "#code_produit",
            function (option) {
                createProduitRow(option);
            },
            "OK"
        );

        createProduitCodeInput(
            "#code_produit_free",
            function (option) {
                createProduitGratuitRow(option);
            },
            "OK"
        );

        createProduitSearchInput(
            "#id_produit_back",
            function (option) {
                createProduitBackRow(option);
            },
            true,
            "OK"
        );

        createProduitSearchInput(
            "#id_produit_broken",
            function (option) {
                createProduitBrokenRow(option);
            },
            true,
            "OK"
        );

        createProduitSearchInput(
            "#id_produit",
            function (option) {
                createProduitRow(option);
            },
            true,
            "OK"
        );

        createProduitSearchInput(
            "#id_produit_free",
            function (option) {
                createProduitGratuitRow(option);
            },
            true,
            "OK"
        );

        $('#pays').select2({ placeholder: "Selectionner un pays" });
        $("#pays").val('').trigger("change");

        $("#id_client").on("change", function () {
            remise_client = $(this).find("option:selected").data("remise");

            $("#client_ice").html( "ICE : &nbsp; "+$(this).find("option:selected").data("ice") );
            $("#full_name").val( $(this).find("option:selected").data("full_name") );
            $("#responsable").val( $(this).find("option:selected").data("responsable") );
            $("#adresse").val( $(this).find("option:selected").data("adresse") );
            $("#ville").val( $(this).find("option:selected").data("ville") );
            $("#pays").val( $(this).find("option:selected").data("pays") ).trigger("change");
            $("#telephone").val( $(this).find("option:selected").data("telephone") );
        });

        createCodeChecker(
            "avoir",
            "BA",
            "<?=$avoir->code_avoir?>",
            <?=$avoir->id_avoir?>
        );

        $("form").on("submit", function (event) {
            event.preventDefault();
            var form = this;
            if($("[name='id_produit_back[]']").length > 0 || $("[name='id_produit_broken[]']").length > 0) {
                $("#alert_produit").hide();
                checkCodeExists("avoir", <?=$avoir->id_avoir?>, function () {
                    $(form).unbind("submit").submit();
                });
            }
            else {
                $("#alert_produit").show();
                $("html, body").animate({ scrollTop: 0 }, "fast");
            }
        });

        $("#id_client").val("<?=$avoir->id_client?>").trigger("change");

        <?php if(!empty($avoir->id_vente)): ?>
        $("#id_client").select2({ disabled:"readonly" });
        <?php else: ?>
        $('#id_client').select2({ placeholder: "Selectionner un client" });
        <?php endif; ?>

        getAvoirTotal();
    });

    function getTotal(id)
    {
        var quantite = $("#quantite_"+id).val();
        var prix = $("#prix_vente_"+id).val();
        var remise = $("#remise_"+id).val();
        var remise_dh = $("#remise_dh_"+id).val();
        var total = (prix-(prix*remise/100)-remise_dh)*quantite;
        $("#total_"+id).html("<span class='span_total'>"+total.toFixed(2)+"</span> <small>DH</small>");

        getAvoirTotal();
    }

    function getTotalBack(id)
    {
        var quantite = $("#quantite_back_"+id).val();
        var prix = $("#prix_vente_back_"+id).val();
        var remise = $("#remise_back_"+id).val();
        var remise_dh = $("#remise_dh_back_"+id).val();
        var total = (prix-(prix*remise/100)-remise_dh)*quantite;
        $("#total_back_"+id).html("<span class='span_total_back'>"+total.toFixed(2)+"</span> <small>DH</small>");

        getAvoirTotal();
    }

    function getTotalBroken(id)
    {
        var quantite = $("#quantite_broken_"+id).val();
        var prix = $("#prix_vente_broken_"+id).val();
        var remise = $("#remise_broken_"+id).val();
        var remise_dh = $("#remise_dh_broken_"+id).val();
        var total = (prix-(prix*remise/100)-remise_dh)*quantite;
        $("#total_broken_"+id).html("<span class='span_total_broken'>"+total.toFixed(2)+"</span> <small>DH</small>");

        getAvoirTotal();
    }

    function getAvoirTotal()
    {
        var avoir_total = 0;
        var avoir_total_back = 0;
        var avoir_total_broken = 0;

        $(".span_total").each(function (i, el) {
            avoir_total += parseFloat($(el).html());
        });
        $(".span_total_back").each(function (i, el) {
            avoir_total_back += parseFloat($(el).html());
        });
        $(".span_total_broken").each(function (i, el) {
            avoir_total_broken += parseFloat($(el).html());
        });

        $("#total_ht_in").val((avoir_total_back+avoir_total_broken).toFixed(2));
        $("#total_ht_out").val(avoir_total.toFixed(2));

        var tva = parseFloat($("#tva").val());

        avoir_total         += avoir_total * tva/100;
        avoir_total_back    += avoir_total_back * tva/100;
        avoir_total_broken  += avoir_total_broken * tva/100;

        $("#total_ttc_in").val((avoir_total_back+avoir_total_broken).toFixed(2));
        $("#total_ttc_out").val(avoir_total.toFixed(2));

        var montant_total = avoir_total-(avoir_total_back+avoir_total_broken);

        $("#total_retour").val(montant_total.toFixed(2));
        $("#avoir_color").addClass(montant_total >= 0 ? "info" : "warning");
        $("#avoir_color").removeClass(montant_total >= 0 ? "warning" : "info");
        $("#avoir_text").html(montant_total >= 0 ? "Montant à payer" : "Montant de Retour");

        var paiement = parseFloat($("#avoir_paiement").val());
        var reste = paiement - Math.abs((avoir_total-(avoir_total_back+avoir_total_broken)));

        $("#avoir_reste").val(Math.abs(reste).toFixed(2));
    }

    function removeRow(random, id)
    {
        $("#tr_"+random).remove();
        selected_produit.splice(selected_produit.indexOf(id.toString()), 1);
        getAvoirTotal();
        fixTable("tbody_produit");
    }
    function removeRowFree(random, id)
    {
        $("#tr_"+random).remove();
        selected_produit_free.splice(selected_produit_free.indexOf(id.toString()), 1);
        getAvoirTotal();
        fixTable("tbody_produit");
    }
    function removeRowBack(random, id)
    {
        $("#tr_"+random).remove();
        selected_produit_back.splice(selected_produit_back.indexOf(id.toString()), 1);
        getAvoirTotal();
        fixTable("tbody_produit_back");
    }
    function removeRowBroken(random, id)
    {
        $("#tr_"+random).remove();
        selected_produit_broken.splice(selected_produit_broken.indexOf(id.toString()), 1);
        getAvoirTotal();
        fixTable("tbody_produit_back");
    }

    function createProduitBackRow(option)
    {
        var id = option.data("id_produit");
        if(id != undefined && id != null && id != "" && !selected_produit_back.includes(id.toString()))
        {
            var random = Math.round(Math.random()*1000000000);
            selected_produit_back.push(id.toString());
            var min = parseFloat(option.data("max")) <= 0 ? 0 : 0.1;

            var html = `
                    <tr id="tr_`+random+`" class="tr_back">
                        <td>
                            <a href="javascript:;" class="produitPopup" rel="popover" data-img="`+option.data("image")+`">
                                `+option.data("code")+`
                                <input type="hidden" name="id_produit_back[]" value="`+id+`">
                            </a>
                        </td>
                        <td>
                            <a href="javascript:;" class="produitPopup" rel="popover" data-img="`+option.data("image")+`">
                                `+option.data("full_name")+`
                            </a>
                        </td>
                        <td>`+option.data("categorie")+`</td>
                        <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                            <td>`+option.data("sub_categorie")+`</td>
                        <?php endif; ?>
                        <td class="current-width">
                            <input type="number" step="any" value="1" min="`+min+`" name="quantite_back_`+id+`" id="quantite_back_`+id+`" data-id="`+id+`" oninput="getTotalBack(`+id+`);" class="form-control input-sm" style="width:90px;" required>
                        </td>
                        <td class="current-width">
                            <input type="number" value="`+option.data("prix_vente")+`" min="0" step="any" name="prix_vente_back_`+id+`" id="prix_vente_back_`+id+`" oninput="getTotalBack(`+id+`);" class="form-control input-sm" style="width:90px;" required>
                        </td>
                        <td class="current-width">
                            <input type="number" value="`+remise_client+`" min="0" step="any" name="remise_back_`+id+`" id="remise_back_`+id+`" oninput="getTotalBack(`+id+`);" class="form-control input-sm" style="width:90px;" required>
                        </td>
                        <td class="current-width">
                            <input type="number" value="0" min="0" step="any" name="remise_dh_back_`+id+`" id="remise_dh_back_`+id+`" oninput="getTotalBack(`+id+`);" class="form-control input-sm" style="width:90px;" required>
                        </td>
                        <td class="current-width" id="total_back_`+id+`">-</td>
                        <td class="current-width"><a href="javascript:;" onclick="removeRowBack(`+random+`, `+id+`)"><i class="fa fa-fw fa-trash"></i></a></td>
                    </tr>
                `;
            fixTable("tbody_produit_back", true);
            $("#tbody_produit_back").append(html);

            getTotalBack(id);
            getAvoirTotal();
            fixPopupProduit();
        }
    }

    function createProduitBrokenRow(option)
    {
        var id = option.data("id_produit");
        if(id != undefined && id != null && id != "" && !selected_produit_broken.includes(id.toString()))
        {
            var random = Math.round(Math.random()*1000000000);
            selected_produit_broken.push(id.toString());
            var html = `
                    <tr id="tr_`+random+`" class="tr_broken">
                        <td>
                            <a href="javascript:;" class="produitPopup" rel="popover" data-img="`+option.data("image")+`">
                                `+option.data("code")+`
                                <input type="hidden" name="id_produit_broken[]" value="`+id+`">
                            </a>
                        </td>
                        <td>
                            <a href="javascript:;" class="produitPopup" rel="popover" data-img="`+option.data("image")+`">
                                `+option.data("full_name")+`
                            </a>
                        </td>
                        <td>`+option.data("categorie")+`</td>
                        <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                            <td>`+option.data("sub_categorie")+`</td>
                        <?php endif; ?>
                        <td class="current-width">
                            <input type="number" step="any" value="1" min="0.1" name="quantite_broken_`+id+`" id="quantite_broken_`+id+`" oninput="getTotalBroken(`+id+`);" class="form-control input-sm" style="width:90px;" required>
                        </td>
                        <td class="current-width">
                            <input type="number" value="`+option.data("prix_vente")+`" min="0" step="any" name="prix_vente_broken_`+id+`" id="prix_vente_broken_`+id+`" oninput="getTotalBroken(`+id+`);" class="form-control input-sm" style="width:90px;" required>
                        </td>
                        <td class="current-width">
                            <input type="number" value="`+remise_client+`" min="0" step="any" name="remise_broken_`+id+`" id="remise_broken_`+id+`" oninput="getTotalBroken(`+id+`);" class="form-control input-sm" style="width:90px;" required>
                        </td>
                        <td class="current-width">
                            <input type="number" value="0" min="0" step="any" name="remise_dh_broken_`+id+`" id="remise_dh_broken_`+id+`" oninput="getTotalBroken(`+id+`);" class="form-control input-sm" style="width:90px;" required>
                        </td>
                        <td class="current-width" id="total_broken_`+id+`">-</td>
                        <td class="current-width"><a href="javascript:;" onclick="removeRowBroken(`+random+`, `+id+`)"><i class="fa fa-fw fa-trash"></i></a></td>
                    </tr>
                `;
            fixTable("tbody_produit_back", true);
            $("#tbody_produit_back").append(html);

            getTotalBroken(id);
            getAvoirTotal();
            fixPopupProduit();
        }
    }

    function createProduitRow(option)
    {
        var id = option.data("id_produit");
        if(id != undefined && id != null && id != "" && !selected_produit.includes(id.toString()))
        {
            var random = Math.round(Math.random()*1000000000);
            selected_produit.push(id.toString());
            var min = parseFloat(option.data("max")) <= 0 ? 0 : 0.1;

            var html = `
                    <tr id="tr_`+random+`">
                        <td class="current-width">`+createDescriptionPopover(option.data("description"))+`</td>
                        <td>
                            <a href="javascript:;" class="produitPopup" rel="popover" data-img="`+option.data("image")+`">
                                `+option.data("code")+`
                                <input type="hidden" name="id_produit[]" value="`+id+`">
                            </a>
                        </td>
                        <td>
                            <a href="javascript:;" class="produitPopup" rel="popover" data-img="`+option.data("image")+`">
                                `+option.data("full_name")+`
                            </a>
                        </td>
                        <td>`+option.data("categorie")+`</td>
                        <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                            <td>`+option.data("sub_categorie")+`</td>
                        <?php endif; ?>
                        <td class="current-width">
                            <input type="number" step="any" value="1" min="`+min+`" max="`+option.data("max")+`" name="quantite_`+id+`" id="quantite_`+id+`" oninput="getTotal(`+id+`);" class="form-control input-sm" style="width:90px;" required>
                        </td>
                        <td class="current-width">
                            <input type="number" value="`+option.data("prix_vente")+`" min="0" step="any" name="prix_vente_`+id+`" id="prix_vente_`+id+`" oninput="getTotal(`+id+`);" class="form-control input-sm" style="width:90px;" required>
                        </td>
                        <td class="current-width">
                            <input type="number" value="`+remise_client+`" min="0" step="any" name="remise_`+id+`" id="remise_`+id+`" oninput="getTotal(`+id+`);" class="form-control input-sm" style="width:90px;" required>
                        </td>
                        <td class="current-width">
                            <input type="number" value="0" min="0" step="any" name="remise_dh_`+id+`" id="remise_dh_`+id+`" oninput="getTotal(`+id+`);" class="form-control input-sm" style="width:90px;" required>
                        </td>
                        <td class="current-width" id="total_`+id+`">-</td>
                        <td class="current-width"><a href="javascript:;" onclick="removeRow(`+random+`, `+id+`)"><i class="fa fa-fw fa-trash"></i></a></td>
                    </tr>
                `;
            fixTable("tbody_produit", true);
            $("#tbody_produit").append(html);

            getTotal(id);
            getAvoirTotal();
            fixPopupProduit();
        }
    }

    function createProduitGratuitRow(option)
    {
        var id = option.data("id_produit");
        if(id != undefined && id != null && id != "" && !selected_produit_free.includes(id.toString()))
        {
            var random = Math.round(Math.random()*1000000000);
            selected_produit_free.push(id.toString());
            var min = parseFloat(option.data("max")) <= 0 ? 0 : 0.1;

            var html = `
                    <tr id="tr_`+random+`" class="tr_gratuit">
                        <td class="current-width">`+createDescriptionPopover(option.data("description"))+`</td>
                        <td>
                            <a href="javascript:;" class="produitPopup" rel="popover" data-img="`+option.data("image")+`">
                                `+option.data("code")+`
                                <input type="hidden" name="id_produit_free[]" value="`+id+`">
                            </a>
                        </td>
                        <td>
                            <a href="javascript:;" class="produitPopup" rel="popover" data-img="`+option.data("image")+`">
                                `+option.data("full_name")+`
                            </a>
                        </td>
                        <td>`+option.data("categorie")+`</td>
                        <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                            <td>`+option.data("sub_categorie")+`</td>
                        <?php endif; ?>
                        <td class="current-width">
                            <input type="number" step="any" value="1" min="`+min+`" max="`+option.data("max")+`" name="quantite_free_`+id+`" class="form-control input-sm" style="width:90px;">
                        </td>
                        <td class="current-width">
                            <input type="number" value="0" class="form-control input-sm" style="width:90px;" readonly>
                        </td>
                        <td class="current-width">
                            <input type="number" value="0" class="form-control input-sm" style="width:90px;" readonly>
                        </td>
                        <td class="current-width">
                            <input type="number" value="0" class="form-control input-sm" style="width:90px;" readonly>
                        </td>
                        <td class="current-width">0 <small>DH</small></td>
                        <td class="current-width"><a href="javascript:;" onclick="removeRowFree(`+random+`, `+id+`)"><i class="fa fa-fw fa-trash"></i></a></td>
                    </tr>
                `;
            fixTable("tbody_produit", true);
            $("#tbody_produit").append(html);

            fixPopupProduit();
        }
    }
</script>