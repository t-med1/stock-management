<form method="post" action="<?= base_url() ?>index.php/vente/<?= !empty($type_vente) && $type_vente == "rapide" ? "rapide" : "ajouter" ?>">

    <div class="row">

        <div class="col-md-12">

            <div class="box box-default box-solid">

                <div class="box-header with-border">

                    <h3 class="box-title">Ajouter Vente <?= !empty($type_vente) && $type_vente == "rapide" ? "au Comptoir" : "" ?></h3>

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

                            <label style="float: right; margin-top: 8px;"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> N° de BL :</label>

                        </div>

                        <div class="col-md-6">

                            <input type="text" class="form-control" name="code_vente" id="code_vente" placeholder="N° de BL" readonly required>

                            <span style="color: red; display: none;" id="code_vente_exists"></span>

                        </div>

                    </div>

                    <div class="row" style="margin-top: 15px;">

                        <div class="col-md-1"></div>

                        <div class="col-md-3">

                            <label style="float: right; margin-top: 8px;"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Client :</label>

                        </div>

                        <div class="col-md-6">

                            <?php if (!empty($type_vente) && $type_vente == "rapide"): ?>

                                    <input type="text" class="form-control" placeholder="Client" value="<?= $client->full_name ?>" readonly>

                                    <input type="hidden" name="id_client" value="<?= $client->id_client ?>">

                            <?php else: ?>

                                    <select class="form-control select2" name="id_client" id="id_client" required>

                                        <?php foreach ($clients as $val): ?>

                                                <option value="<?= $val["id_client"] ?>"

                                                        data-ice="<?= $val["ice"] ?>"

                                                        data-full_name="<?= $val["full_name"] ?>"

                                                        data-responsable="<?= $val["responsable"] ?>"

                                                        data-adresse="<?= $val["adresse"] ?>"

                                                        data-ville="<?= $val["ville"] ?>"

                                                        data-pays="<?= $val["pays"] ?>"

                                                        data-telephone="<?= $val["telephone"] ?>"

                                                        data-remise="<?= $val["remise"] ?>"

                                                       <?php /*  data-avance="<?=htmlspecialchars(json_encode(getAvanceTotal($val["id_client"])))?>"*/?>

                                                >

                                                    <?= $val["full_name"] ?>

                                                </option>

                                        <?php endforeach; ?>

                                    </select>

                            <?php endif; ?>

                        </div>

                    </div>

                    <?php if ($type_vente != "rapide"): ?>

                        <div class="row" style="margin-top: 15px;">

                            <div class="col-md-1"></div>

                            <div class="col-md-3">

                                <label style="float: right; margin-top: 8px;"> Transport :</label>

                            </div>

                            <div class="col-md-6">

                                <select class="form-control select2" name="id_transport" id="id_transport">

                                    <?php foreach ($transports as $val): ?>

                                            <option value="<?= $val["id_transport"] ?>">

        <!--                                            data-code_transport="--><? //=$val["code_transport"]?><!--"-->

        <!--                                            data-telephone="--><? //=$val["telephone"]?><!--"-->

        <!--                                            data-livreur="--><? //=$val["livreur"]?><!--"-->



                                                <?= $val["code_transport"] ?>

                                            </option>

                                    <?php endforeach; ?>

                                </select>

                            </div>

                        </div>

                    <?php endif; ?>

                    <div class="row" style="margin-top: 15px;">

                        <div class="col-md-1"></div>

                        <div class="col-md-3">

                            <label style="float: right; margin-top: 8px;"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Date de Vente :</label>

                        </div>

                        <div class="col-md-6">

                            <input type="date" class="form-control" name="date_vente" value="<?= date("Y-m-d") ?>" placeholder="Date de Vente" required>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <?php if (_ENABLE_SERVICE_): ?>

        <div class="row">

            <div class="col-md-12">

                <div class="alert alert-warning alert-dismissible" id="alert_produit" style="display:none;">

                    <h4><i class="icon fa fa-info-circle"></i> Alerte !</h4>

                    La liste des produits/services à sélectionné est vide.

                </div>

                <div class="box box-default box-solid">

                    <div class="box-header with-border">

                        <h3 class="box-title">Services</h3>

                        <div class="box-tools pull-right">

                            <button type="button" class="btn btn-box-tool" data-widget="collapse">

                                <i class="fa fa-minus"></i>

                            </button>

                        </div>

                    </div>

                    <div class="box-body">

                        <div class="row">

                            <div class="col-md-3" style="margin-top: 10px;">



                                <input type="text" list="id_service_datalist" class="form-control" id="id_service" placeholder="Nom Service" style="border: 2px solid rgb(0, 192, 239); margin-bottom: 10px;">

                                <datalist id="id_service_datalist"></datalist>



                            </div>

                            <div class="col-md-9 table-responsive" style="margin-top: 10px; overflow-x: auto;">

                                <table class="table table-bordered table-striped myDataTable">

                                    <thead>

                                    <tr>

                                        <th>Service</th>

                                        <th>Catégorie</th>

                                        <?php if (_ENABLE_SUB_CATEGORIE_): ?>

                                                <th>Sous-Catégorie</th>

                                        <?php endif; ?>

                                        <!-- <th class="current-width">Description</th> -->

                                        <th class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> P. vente <small>(DH)</small></th>

                                        <th class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Remise <small>(%)</small></th>

                                        <th class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Remise <small>(DH)</small></th>

                                        <th class="current-width">Total HT</th>

                                        <th class="current-width"><i class="fa fa-fw fa-trash"></i></th>

                                    </tr>

                                    </thead>

                                    <tbody id="tbody_service">

                                    <?php

                                    $s_ids = array();

                                    if (!empty($object_details)):

                                        foreach ($object_details as $val):
                                            if (!empty($val["id_service"])):

                                                if (!$val['id_produit']):

                                                    $random = rand(100000000, 999999999);

                                                    array_push($s_ids, $random);



                                                    $prix_vente = $val["prix_vente"];

                                                    $remise = $val["remise"];

                                                    $remise_dh = $val["remise_dh"];

                                                    ?>

                                                            <tr id="tr_<?= $random ?>">

                                                                <td>

                                                                    <a href="javascript:;" class="imagePopup">

                                                                        <?= $val["service"] ?>

                                                                        <input type="hidden" name="id_service[]" value="<?= $random ?>">

                                                                        <input type="hidden" name="service_<?= $random ?>" value="<?= $val["id_service"] ?>" >

                                                                    </a>

                                                                </td>

                                                                <td><?= $val["categorie_s"] ?></td>

                                                                <?php if (_ENABLE_SUB_CATEGORIE_): ?>

                                                                        <td><?= $val["sub_categorie_s"] ?></td>

                                                                <?php endif; ?>

                                                                <!-- <td class="current-width">

                                                <input type="text" maxlength="200" value="<?= $val["description"] ?>" name="description_<?= $random ?>" id="description_<?= $random ?>" class="form-control input-sm" style="width:120px;">

                                            </td> -->

                                                                <td class="current-width">

                                                                    <input type="number" value="<?= $prix_vente ?>" min="0" step="any" name="s_prix_vente_<?= $random ?>" id="s_prix_vente_<?= $random ?>" oninput="getTotal(<?= $random ?>, true);" class="form-control input-sm" style="width:90px;" required>

                                                                </td>

                                                                <td class="current-width">

                                                                    <input type="number" value="<?= $remise ?>" min="0" step="any" name="s_remise_<?= $random ?>" id="s_remise_<?= $random ?>" oninput="getTotal(<?= $random ?>, true);" class="form-control input-sm" style="width:90px;" required>

                                                                </td>

                                                                <td class="current-width">

                                                                    <input type="number" value="<?= $remise_dh ?>" min="0" step="any" name="s_remise_dh_<?= $random ?>" id="s_remise_dh_<?= $random ?>" oninput="getTotal(<?= $random ?>, true);" class="form-control input-sm" style="width:90px;" required>

                                                                </td>

                                                                <td class="current-width" id="s_total_<?= $random ?>"><span class="span_total">...</span> <small>DH</small></td>

                                                                <td class="current-width"><a href="javascript:;" onclick="removeRow(<?= $random ?>, <?= $val["id_service"] ?>, true)"><i class="fa fa-fw fa-trash"></i></a></td>

                                                            </tr>

                                                    <?php endif; endif; endforeach; endif; ?>

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

            <div class="alert alert-warning alert-dismissible" id="alert_produit" style="display:none;">

                <h4><i class="icon fa fa-info-circle"></i> Alerte !</h4>

                La liste des produits à sélectionné est vide.

            </div>

            <div class="box box-default box-solid">

                <div class="box-header with-border">

                    <h3 class="box-title">Produits</h3>

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

                            <datalist id="id_produit_datalist"></datalist>



                            <br>



                            <input type="text" class="form-control" id="code_produit_free" placeholder="Code Produit Gratuit" style="border: 2px dashed rgb(243, 156, 18);"><br>

                            <input type="text" list="id_produit_free_datalist" class="form-control" id="id_produit_free" placeholder="Nom Produit Gratuit" style="border: 2px solid rgb(243, 156, 18); margin-bottom: 10px;">

                            <datalist id="id_produit_free_datalist"></datalist>



                        </div>

                        <div class="col-md-9 table-responsive" style="margin-top: 10px; overflow-x: auto;">

                            <table class="table table-bordered table-striped myDataTable">

                                <thead>

                                <tr>

                                    <th class="current-width"><i class="fa fa-info-circle"></i></th>

                                    <th>Stock</th>

                                    <th>Code</th>

                                    <th>Produit</th>

                                    <th>Catégorie</th>

                                    <?php if (_ENABLE_SUB_CATEGORIE_): ?>

                                            <th>Sous-Catégorie</th>

                                    <?php endif; ?>

                                    <th class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Quantite</th>

                                    <th class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> P. Vente <small>(DH)</small></th>

                                    <th class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Remise <small>(%)</small></th>

                                    <th class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Remise <small>(DH)</small></th>

                                    <th class="current-width">Total HT</th>

                                    <th class="current-width"><i class="fa fa-fw fa-trash"></i></th>

                                </tr>

                                </thead>

                                <tbody id="tbody_produit">

                                <?php

                                $ids = array();

                                $ids_free = array();

                                if (!empty($object_details)):

                                    foreach ($object_details as $val):

                                        if (!$val['id_service']):

                                            $random = rand(100000000, 999999999);

                                            $stock = getQuantiteProduit($val["id_produit"])["stock"];

                                            $min = $stock <= 0 ? 0 : 0.1;

                                            if (!empty($val["prix_vente"]) || $table_name !== 'devis'):

                                                array_push($ids, $val["id_produit"]);

                                                $produit = $this->db->where('id_produit', $val["id_produit"])->get('produit')->row();

                                                ?>

                                                            <tr id="tr_<?= $random ?>">

                                                                <td class="current-width"><?= createDescriptionPopover($val["description"]) ?></td>

                                                                <td><b><?= $stock ?></b></td>

                                                                <td>

                                                                    <a href="javascript:;" class="produitPopup" rel="popover" data-img="<?= $val["image"] ?>">

                                                                        <?= $val["code_produit"] ?>

                                                                        <input type="hidden" name="id_produit[]" value="<?= $val["id_produit"] ?>">

                                                                    </a>

                                                                </td>

                                                                <td>

                                                                    <a href="javascript:;" class="produitPopup" rel="popover" data-img="<?= $val["image"] ?>">

                                                                        <?= $val["produit"] ?>

                                                                    </a>

                                                                </td>

                                                                <td><?= $val["categorie"] ?></td>

                                                                <?php if (_ENABLE_SUB_CATEGORIE_): ?>

                                                                        <td><?= $val["sub_categorie"] ?></td>

                                                                <?php endif; ?>

                                                                <td class="current-width">

                                                                    <input type="number" step="any" value="<?= $val["quantite"] ?>" min="<?= $min ?>" max="<?= $stock ?>" name="quantite_<?= $val["id_produit"] ?>" id="quantite_<?= $val["id_produit"] ?>" oninput="getTotal(<?= $val["id_produit"]; ?>)" class="form-control input-sm" style="width:90px;" required>

                                                                </td>

                                                                <td class="current-width">

                                                                    <input type="number" value="<?= $table_name == 'devis' ? $val["prix_vente"] : $produit->prix_vente ?>" min="0" step="any" name="prix_vente_<?= $val["id_produit"] ?>" id="prix_vente_<?= $val["id_produit"] ?>" oninput="getTotal(<?= $val["id_produit"] ?>);" class="form-control input-sm" style="width:90px;" required>

                                                                </td>

                                                                <td class="current-width">

                                                                    <input type="number" value="<?= $table_name == 'devis' ? $val["remise"] : 0 ?>" min="0" step="any" name="remise_<?= $val["id_produit"] ?>" id="remise_<?= $val["id_produit"] ?>" oninput="getTotal(<?= $val["id_produit"] ?>);" class="form-control input-sm" style="width:90px;" required>

                                                                </td>

                                                                <td class="current-width">

                                                                    <input type="number" value="<?= $table_name == 'devis' ? $val["remise_dh"] : 0 ?>" min="0" step="any" name="remise_dh_<?= $val["id_produit"] ?>" id="remise_dh_<?= $val["id_produit"] ?>" oninput="getTotal(<?= $val["id_produit"] ?>);" class="form-control input-sm" style="width:90px;" required>

                                                                </td>

                                                                <td class="current-width" id="total_<?= $val["id_produit"] ?>"><span class="span_total">...</span> <small>DH</small></td>

                                                                <td class="current-width"><a href="javascript:;" onclick="removeRow(<?= $random ?>, <?= $val["id_produit"] ?>)"><i class="fa fa-fw fa-trash"></i></a></td>

                                                            </tr>

                                                        <?php

                                                /* FREE */

                                            else:

                                                array_push($ids_free, $val["id_produit"]);

                                                ?>

                                                            <tr id="tr_<?= $random ?>" class="tr_gratuit">

                                                                <td class="current-width"><?= createDescriptionPopover($val["description"]) ?></td>

                                                                <td><b><?= $stock ?></b></td>

                                                                <td>

                                                                    <a href="javascript:;" class="produitPopup" rel="popover" data-img="<?= $val["image"] ?>">

                                                                        <?= $val["code_produit"] ?>

                                                                        <input type="hidden" name="id_produit_free[]" value="<?= $val["id_produit"] ?>">

                                                                    </a>

                                                                </td>

                                                                <td>

                                                                    <a href="javascript:;" class="produitPopup" rel="popover" data-img="<?= $val["image"] ?>">

                                                                        <?= $val["produit"] ?>

                                                                    </a>

                                                                </td>

                                                                <td><?= $val["categorie"] ?></td>

                                                                <?php if (_ENABLE_SUB_CATEGORIE_): ?>

                                                                        <td><?= $val["sub_categorie"] ?></td>

                                                                <?php endif; ?>

                                                                <td class="current-width">

                                                                    <input type="number" step="any" value="<?= $val["quantite"] ?>" min="<?= $min ?>" max="<?= $stock + (int) $val["quantite"] ?>" name="quantite_free_<?= $val["id_produit"] ?>" class="form-control input-sm" style="width:90px;">

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

                                                                <td class="current-width"><a href="javascript:;" onclick="removeRowFree(<?= $random ?>, <?= $val["id_produit"] ?>)"><i class="fa fa-fw fa-trash"></i></a></td>

                                                            </tr>

                                                        <?php

                                            endif;

                                        endif;

                                    endforeach;

                                endif;

                                ?>

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

                            <?php if (empty($type_vente) || $type_vente != "rapide"): ?>

                                    <?php if (!empty($object)): ?>

                                            <input type="hidden" name="id_client" value="<?= $object->id_client ?>">

                                            <?php if (!empty($object->id_client_cmd)): ?>

                                                    <input type="hidden" name="id_client_cmd" value="<?= $object->id_client_cmd ?>">

                                            <?php elseif (!empty($object->id_devis)): ?>

                                                    <input type="hidden" name="id_devis" value="<?= $object->id_devis ?>">

                                            <?php endif; ?>

                                            <div class="alert alert-info">

                                                <table>

                                                    <?php if (!empty($object->id_client_cmd)): ?>

                                                            <tr>

                                                                <td><i class="fa fa-check"></i> &nbsp; <strong>Commande de Client</strong></td>

                                                                <td><strong>&nbsp; : &nbsp;&nbsp;&nbsp;</strong></td>

                                                                <td><strong><?= $object->code_client_cmd ?></strong></td>

                                                            </tr>

                                                            <tr>

                                                                <td><i class="fa fa-check"></i> &nbsp; <strong>Date de Commande</strong></td>

                                                                <td><strong>&nbsp; : &nbsp;&nbsp;&nbsp;</strong></td>

                                                                <td><strong><?= date("d/m/Y", strtotime($object->date_client_cmd)) ?></strong></td>

                                                            </tr>

                                                    <?php elseif (!empty($object->id_devis)): ?>

                                                            <tr>

                                                                <td><i class="fa fa-check"></i> &nbsp; <strong>Devis N°</strong></td>

                                                                <td><strong>&nbsp; : &nbsp;&nbsp;&nbsp;</strong></td>

                                                                <td><strong><?= $object->code_devis ?></strong></td>

                                                            </tr>

                                                            <tr>

                                                                <td><i class="fa fa-check"></i> &nbsp; <strong>Date de Devis</strong></td>

                                                                <td><strong>&nbsp; : &nbsp;&nbsp;&nbsp;</strong></td>

                                                                <td><strong><?= date("d/m/Y", strtotime($object->date_devis)) ?></strong></td>

                                                            </tr>

                                                    <?php endif; ?>

                                                </table>

                                            </div>

                                    <?php endif; ?>

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

                            <?php else: ?>

                                    <div class="form-group">

                                        <div class="checkbox" style="margin-top: 5px;">

                                            <label>

                                                <input type="checkbox" name="print" value="true" checked> <b>Imprimer Ticket.</b>

                                            </label>

                                        </div>

                                    </div>

                            <?php endif; ?>

                            <div class="form-group">

                                <label>Adresse :</label>

                                <input type="text" id="adresse" name="adresse" value="<?= !empty($client->adresse) ? $client->adresse : "" ?>" class="form-control">

                            </div>

                            <div class="form-group">

                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Ville :</label>

                                <input type="text" id="ville" name="ville" value="<?= !empty($client->ville) ? $client->ville : "" ?>" class="form-control" <?= empty($type_vente) || $type_vente != "rapide" ? "required" : "" ?>>

                            </div>

                            <div class="form-group">

                                <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Pays :</label>

                                <select class="form-control select2" id="pays" name="pays" <?= empty($type_vente) || $type_vente != "rapide" ? "required" : "" ?>>

                                    <?php foreach (getCountries() as $country): ?>

                                            <option value="<?= $country->name ?>">

                                                <?= $country->name ?>

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

                    <h3 class="box-title">Paiement</h3>

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

                               <tbody>

                               <tr>

                                   <th style="vertical-align: middle;" class="current-width">Total HT <small>(DH)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>

                                   <td><input type="text" value="0" id="vente_total" class="form-control" readonly></td>

                               </tr>

                               <tr>

                                   <th style="vertical-align: middle;" class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> TVA <small>(%)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>

                                   <td>

                                       <select name="tva" id="tva" class="form-control" onchange="getVenteTotal()" required>

                                           <option value="20" selected>20 %</option>

                                           <option value="0">0 %</option>

                                       </select>

                                   </td>

                               </tr>

                               <tr class="success">

                                   <th style="vertical-align: middle;" class="current-width">Total TTC <small>(DH)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>

                                   <td><input type="text" value="0" id="vente_total_ttc" class="form-control" readonly></td>

                               </tr>

                               <tr>

                                   <th style="vertical-align: middle;" class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span>  Billet <small>(DH)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>

                                   <td><input type="number" step="any" min="0" oninput="ChangeBillet()" id="billet" name="billet" class="form-control" ></td>

                               </tr>

                               <tr>

                                   <th style="vertical-align: middle;" class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Change <small>(DH)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>

                                   <td><input type="number" step="any" min="0" value="" id="change" name="change" class="form-control" disabled></td>

                               </tr>

                               <tr>

                                   <th style="vertical-align: middle;" class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Paiement <small>(DH)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>

                                   <td><input type="number" step="any" min="0" value="" id="vente_paiement" name="vente_paiement" class="form-control" required></td>

                               </tr>

                               <tr class="warning">

                                   <th style="vertical-align: middle;" class="current-width">Reste <small>(DH)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>

                                   <td><input type="text" value="0" id="vente_reste" class="form-control" readonly></td>

                               </tr>

                               <tr>

                                   <th style="vertical-align: middle;" class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Mode de Paiement &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>

                                   <td>

                                       <select class="form-control" name="vente_methode" id="vente_methode" required>

                                           <option value>Non payé</option>

                                           <option value="1" selected>Espèce</option>

                                           <option value="2">Chèque</option>

                                           <option value="3">Effet</option>

                                           <option value="4">Virement bancaire</option>

                                           <?php if (_ENABLE_AVANCE_ && (empty($type_vente) || $type_vente != "rapide")): ?>

                                                    <option value="5">À partir d'avance</option>

                                           <?php endif; ?>

                                       </select>

                                   </td>

                               </tr>

                               <tr id="cheque_div" style="display: none;">

                                   <td colspan="2">

                                       <table class="table table-bordered table-striped" style="margin-bottom:0px;">

                                           <tbody>

                                                <tr>

                                                    <td><input type="number" step="any" min="0.1" id="cheque_montant" name="cheque_montant" class="form-control" placeholder="Montant"></td>

                                                    <td><input type="text" id="cheque_reference" name="cheque_reference" class="form-control" placeholder="Réference"></td>

                                                    <td><input type="date" id="cheque_date" name="cheque_date" class="form-control" placeholder="Date"></td>

                                                </tr>

                                               <tr>

                                                   <td colspan="3"><input type="text" maxlength="200" id="cheque_remarque" name="cheque_remarque" class="form-control" placeholder="Remarque"></td>

                                               </tr>

                                           </tbody>

                                       </table>

                                   </td>

                               </tr>

                               <?php if (_ENABLE_AVANCE_ && (empty($type_vente) || $type_vente != "rapide")): ?>

                                   <tr id="avance_div" style="display: none;">

                                       <th style="vertical-align: middle;" class="current-width">Avance de Client &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>

                                       <td>

                                           <table class="table table-bordered" style="margin-bottom: 0px;">

                                               <tr>

                                                   <td class="current-width"><input type="radio" name="type_avance" id="type_avance" value="1"></td>

                                                   <td class="current-width"><?= getMethodePaiement(1) ?></td>

                                                   <td><strong id="total_avance_1">...</strong> <small>DH</small></td>

                                               </tr>

                                               <tr>

                                                   <td class="current-width"><input type="radio" name="type_avance" value="2" disabled></td>

                                                   <td class="current-width"><?= getMethodePaiement(2) . "/" . getMethodePaiement(3) ?></td>

                                                   <td><strong id="total_avance_2">...</strong> <small>DH</small></td>

                                               </tr>

                                               <tr>

                                                   <td class="current-width"><input type="radio" name="type_avance" value="3"></td>

                                                   <td class="current-width"><?= getMethodePaiement(4) ?></td>

                                                   <td><strong id="total_avance_3">...</strong> <small>DH</small></td>

                                               </tr>

                                           </table>

                                       </td>

                                   </tr>

                               <?php endif; ?>

                               </tbody>

                           </table>

                        </div>

                    </div>

                </div>

                <div class="box-footer" style="text-align: center;">

                    <button type="submit" id="subButton" style="width: 50%;" class="btn btn-primary">

                        <i class="fa fa-save"></i> &nbsp; Enregistrer

                    </button>

                </div>

            </div>

        </div>

    </div>

</form>



<script type="text/javascript">

    var selected_produit = <?= json_encode($ids) ?>;

    <?php if (_ENABLE_SERVICE_): ?>

        var selected_service = <?= json_encode($s_ids) ?>;

    <?php endif; ?>

    var selected_produit_free = <?= json_encode($ids_free) ?>;

    var remise_client = 0;

    var submit = 0;



    $(document).ready(function ()

    {

        fixTable("tbody_produit");

        $("#code_produit").focus();



        <?php

        if (!empty($type_vente) && $type_vente == "rapide" && !empty($print)) {

            echo "openSmallWindow('" . base_url() . "index.php/vente/ticket/" . $print . "')";

        }

        ?>



        <?php if (_ENABLE_SERVICE_): ?>

            createServiceSearchInput(

                "#id_service",

                function (option) {

                    createServiceRow(option);

                },

                true

            );

        <?php endif; ?>



        createProduitCodeInput(

            "#code_produit",

            function (option) {

                createProduitRow(option);

            },

            "OK",

            "OK"

        );



        createProduitCodeInput(

            "#code_produit_free",

            function (option) {

                createProduitGratuitRow(option);

            },

            "OK",

            "OK"

        );



        createProduitSearchInput(

            "#id_produit",

            function (option) {

                createProduitRow(option);

            },

            true,

            "OK",

            "OK"

        );



        createProduitSearchInput(

            "#id_produit_free",

            function (option) {

                createProduitGratuitRow(option);

            },

            true,

            "OK",

            "OK"

        );



        $('#pays').select2({ placeholder: "Selectionner un pays" });

        $("#pays").val('<?= !empty($client->pays) ? $client->pays : "" ?>').trigger("change");



        <?php if (empty($type_vente) || $type_vente != "rapide"): ?>



                $('#id_client').select2({ placeholder: "Selectionner un client" });

                $('#id_transport').select2({ placeholder: "Selectionner un transport" });

                $("#id_client").val('').trigger("change");

                $("#id_transport").val('').trigger("change");



                $("#id_client").on("change", function () {

                    remise_client = $(this).find("option:selected").data("remise");



                    var ice = $(this).find("option:selected").data("ice");

                    if(ice != undefined && ice != null && ice != "") {

                        $("#client_ice").html( "ICE : &nbsp; "+ice );

                    }

                    else {

                        $("#client_ice").html("");

                    }



                    $("#full_name").val( $(this).find("option:selected").data("full_name") );

                    $("#responsable").val( $(this).find("option:selected").data("responsable") );

                    $("#adresse").val( $(this).find("option:selected").data("adresse") );

                    $("#ville").val( $(this).find("option:selected").data("ville") );

                    $("#pays").val( $(this).find("option:selected").data("pays") ).trigger("change");

                    $("#telephone").val( $(this).find("option:selected").data("telephone") );



                    <?php if (_ENABLE_AVANCE_): ?>

                        if($("#id_client").val() != 1) {

                            $("#vente_methode option[value=5]").show();

                        }

                        else {

                            $("#vente_methode option[value=5]").hide();

                        }

                        $("#vente_methode").change();

                    <?php endif; ?>

                });



                <?php if (!empty($object)): ?>

                        selected_produit = <?= json_encode($ids) ?>;

                        selected_produit_free = <?= json_encode($ids_free) ?>;

                        $("#id_client").val(<?= $object->id_client ?>).trigger("change");

                        $("#id_client").select2({ disabled:"readonly" });

                        <?php foreach ($ids as $id): ?>

                            getTotal(<?= $id ?>);

                        <?php endforeach; ?>

                        <?php foreach ($s_ids as $id): ?>

                            getTotal(<?= $id ?>, true);

                        <?php endforeach; ?>

                <?php endif; ?>



        <?php endif; ?>



        $("#vente_paiement").on("input", function () {

            if($(this).val() != undefined && $(this).val() != null && $(this).val() > 0) {

                $("#vente_methode").attr("required", "required");

            }

            else  {

                $("#vente_methode").removeAttr("required");

            }

            getVenteTotal();

        });



        $("#vente_methode").on("change", function ()

        {

            if($(this).val() != undefined && $(this).val() != null)

            {

                if($(this).val() == 1 || $(this).val() == 4)

                {

                    initMethode();



                    $("#vente_methode, #vente_paiement").attr("required", "required");

                }

                else if($(this).val() == 2 || $(this).val() == 3)

                {

                    var completePlaceHolder = $(this).val() == 2 ? "de chèque" : "d'effet";

                    initMethode();



                    $("#cheque_div").show();

                    $("#vente_methode, #vente_paiement, #cheque_montant, #cheque_date, #cheque_reference").attr("required", "required");

                    $("#vente_paiement").attr("readonly", "readonly");



                    $("#cheque_montant").attr("placeholder", "Montant " + completePlaceHolder);

                    $("#cheque_date").attr("placeholder", "Date " + completePlaceHolder);

                    $("#cheque_reference").attr("placeholder", "Réference " + completePlaceHolder);

                    $("#cheque_remarque").attr("placeholder", "Remarque " + completePlaceHolder);



                }

                <?php if (_ENABLE_AVANCE_ && (empty($type_vente) || $type_vente != "rapide")): ?>

                        else if($(this).val() == 5)

                        {

                            initMethode();



                            var id =  $("#id_client option:selected").val();



                            $.ajax({

                                    url: _base_url_+"index.php/client/getAvance",

                                    method: "POST",

                                    data: { id },

                                    dataType: "json",

                                    success: function (responce) {



                                        if(responce != undefined && responce != null && responce != "")

                                        {

                                            $("#total_avance_1").html(responce.total_espece.toFixed(2));

                                            $("#total_avance_2").html(responce.total_cheque.toFixed(2));

                                            $("#total_avance_3").html(responce.total_virement.toFixed(2));

                                        }

                                        $("#avance_div").show();

                                        $("#vente_methode, #vente_paiement, #type_avance").attr("required", "required");

                                    }

                                });

                        }

                <?php endif; ?>

                else

                { initMethode(); }

            }

            else

            { initMethode(); }

        }).change(); // to get attrs



        $("#cheque_montant").on("input", function ()

        {

            $("#vente_paiement").val( $(this).val() );

            $("#vente_paiement").trigger("input");

        });



        <?php if (_ENABLE_AVANCE_ && (empty($type_vente) || $type_vente != "rapide")): ?>

            $("input[type=radio][name='type_avance']").on("change", function() {

                var avance =  $("#id_client option:selected").data("avance");

                var max = 0;

                if(avance != undefined && avance != null && avance != "") {

                    switch (this.value.toString()) {

                        case "1" : max = avance.total_espece; break;

                        case "2" : max = avance.total_cheque; break;

                        case "3" : max = avance.total_virement; break;

                        default: max = 0;

                    }

                }

                $("#vente_paiement").attr("max", max);

            });

        <?php endif; ?>



        createCodeChecker(

            "vente",

            "BL",

            "<?= $code_vente ?>"

        );



        $("form").on("submit", function (event) {

            event.preventDefault();

            var form = this;

            if($("[name='id_service[]']").length > 0 || $("[name='id_produit[]']").length > 0 || $("[name='id_produit_free[]']").length > 0) {

                $("#alert_produit").hide();

                // checkCodeExists("vente", "", function () {

                    

                    $("#subButton").attr("disabled", true);

                    if (submit < 1) {

                        $(form).unbind("submit").submit();

                    }

                    submit++;

                // });

            }

            else {

                $("#alert_produit").show();

                $("html, body").animate({ scrollTop: 0 }, "fast");

                $("#subButton").removeAttr("disabled");

            }

        });





        getVenteTotal();

    });

    

    function getTotal(id, service = false)

    {

        

        if(service)

        {

            var prix = $("#s_prix_vente_"+id).val();

            var remise = $("#s_remise_"+id).val();

            var remise_dh = $("#s_remise_dh_"+id).val();



            if (parseFloat(remise)>0){

                $("#s_remise_dh_"+id).prop("disabled", true);

                $("#s_remise_dh_"+id).prop("value", 0);

                remise_dh = 0;

            } else if(parseFloat(remise_dh)>0){

                $("#s_remise_"+id).prop("disabled", true );

                $("#s_remise_"+id).prop("value", 0 );

                remise = 0;

            } else {

                $("#s_remise_dh_"+id).prop("disabled", false );

                $("#s_remise_dh_"+id).prop("value", 0 );

                $("#s_remise_"+id).prop("disabled", false );

                $("#s_remise_"+id).prop("value", 0 );

            }



            var total = prix-(prix*remise/100)-remise_dh;

            $("#s_total_"+id).html("<span class='span_total'>"+total.toFixed(2)+"</span> <small>DH</small>");

        }

        else

        {

            var quantite = $("#quantite_"+id).val();

            var prix = $("#prix_vente_"+id).val();

            var remise = $("#remise_"+id).val();

            var remise_dh = $("#remise_dh_"+id).val();



            if (parseFloat(remise)>0){

                $("#remise_dh_"+id).prop("disabled", true);

                $("#remise_dh_"+id).prop("value", 0);

                remise_dh = 0;

            } else if(parseFloat(remise_dh)>0){

                $("#remise_"+id).prop("disabled", true );

                $("#remise_"+id).prop("value", 0 );

                remise = 0;

            } else {

                $("#remise_dh_"+id).prop("disabled", false );

                $("#remise_dh_"+id).prop("value", 0 );

                $("#remise_"+id).prop("disabled", false );

                $("#remise_"+id).prop("value", 0 );

            }



            var total = (prix-(prix*remise/100)-remise_dh)*quantite;

            $("#total_"+id).html("<span class='span_total'>"+total.toFixed(2)+"</span> <small>DH</small>");



        }



        getVenteTotal();

    }



    function ChangeBillet() {
    let total = parseFloat($('#vente_total_ttc').val());
    let billet = parseFloat($('#billet').val());

    if (!isNaN(total) && !isNaN(billet)) {
        if (billet < total) {
            $('#change').val(0);

            let reste = (total - billet).toFixed(2);
            $('#vente_reste').val(reste);
            $('#vente_paiement').val(billet.toFixed(2));
        } else {
            const change = (billet - total).toFixed(2);
            $('#change').val(change);
            $('#vente_reste').val(0);
            $('#vente_paiement').val(total.toFixed(2));
        }
    } else {



            const change = billet.toFixed(4)-total.toFixed(4)

            $('#change').val(change.toFixed(2));

            $('#vente_reste').val(0);

            $('#vente_paiement').val(total.toFixed(2));

        }

    }



    function getVenteTotal() {
    var vente_total = 0;
    $(".span_total").each(function (i, el) {
        var totalValue = parseFloat($(el).html());
        if (!isNaN(totalValue)) {
            vente_total += totalValue;
        }
    });

    var tva = parseFloat($("#tva").val());
    var vente_total_ttc = vente_total + (vente_total * tva / 100);

    $("#vente_total").val(vente_total.toFixed(2));
    $("#vente_total_ttc").val(vente_total_ttc.toFixed(2));

    var vente_paiement = parseFloat($("#vente_paiement").val()) || 0;
    var vente_reste = (vente_total_ttc - vente_paiement).toFixed(2);
    $("#vente_reste").val(vente_reste);

    ChangeBillet();
}



    function removeRow(random, id, service = false)

    {

        $("#tr_"+random).remove();



        if(service) {

            fixTable("tbody_service");

            selected_service.splice(selected_service.indexOf(id.toString()), 1);

        }

        else {

            selected_produit.splice(selected_produit.indexOf(id.toString()), 1);

            fixTable("tbody_produit");

        }



        getVenteTotal();

    }

    

    function removeRowFree(random, id)

    {

        $("#tr_"+random).remove();

        selected_produit_free.splice(selected_produit_free.indexOf(id.toString()), 1);

        getVenteTotal();

        fixTable("tbody_produit");

    }

    <?php if (_ENABLE_SERVICE_): ?>

        function createServiceRow(option)

        {

            var id = option.data("id_service");

            if(id != undefined && id != null && id != "" && !selected_service.includes(id.toString()))

            {

                var random = Math.round(Math.random()*1000000000);

                selected_service.push(id.toString());



                var html = `

                        <tr id="tr_`+random+`">

                            <td>

                                <a href="javascript:;" class="imagePopup" rel="popover" data-img="`+option.data("image")+`">

                                    `+option.data("full_name")+`

                                </a>

                                <input type="hidden" name="id_service[]" value="`+random+`">

                                <input type="hidden" name="service_`+random+`" value="`+id+`" >

                            </td>

                            <td>`+option.data("categorie")+`</td>

                            <?php if (_ENABLE_SUB_CATEGORIE_): ?>

                                    <td>`+option.data("sub_categorie")+`</td>

                            <?php endif; ?>

                            <td class="current-width">

                                <input type="number" value="`+option.data("prix_vente")+`" min="0" step="any" name="s_prix_vente_`+random+`" id="s_prix_vente_`+random+`" oninput="getTotal(`+random+`, true);" class="form-control input-sm" style="width:90px;" required>

                            </td>

                            <td class="current-width">

                                <input type="number" value="`+remise_client+`" min="0" max="100" step="1" name="s_remise_`+random+`" id="s_remise_`+random+`" oninput="getTotal(`+random+`, true);" class="form-control input-sm" style="width:90px;" required>

                            </td>

                            <td class="current-width">

                                <input type="number" value="0" min="0" step="any" max="`+option.data("prix_vente")+`" name="s_remise_dh_`+random+`" id="s_remise_dh_`+random+`" oninput="getTotal(`+random+`, true);" class="form-control input-sm" style="width:90px;" required>

                            </td>

                            <td class="current-width" id="s_total_`+random+`">-</td>

                            <td class="current-width"><a href="javascript:;" onclick="removeRow(`+random+`, `+random+`, true)"><i class="fa fa-fw fa-trash"></i></a></td>

                        </tr>

                `;



                fixTable("tbody_service", true);

                $("#tbody_service").append(html);



                getTotal(random, true);

                getVenteTotal();

                fixPopupImage();

            }

        }

    <?php endif; ?>



    function createProduitRow(option)

    {

        var id = option.data("id_produit");

        if(id != undefined && id != null && id != "" && !selected_produit.includes(id.toString()))

        {

            var random = Math.round(Math.random()*1000000000);

            selected_produit.push(id.toString());

            var min = parseFloat(option.data("max")) <= 0 ? 0 : 0.1;



            var prix = parseFloat(option.data("prix_vente")) ;



            var remise = ((parseFloat(prix) - parseFloat(option.data("cout_revient"))) / parseFloat(prix)) * 100;

            

            var remise_dh = parseFloat(option.data("prix_vente")) - parseFloat(option.data("cout_revient"));



            var html = `

                    <tr id="tr_`+random+`">

                        <td class="current-width">`+createDescriptionPopover(option.data("description"))+`</td>

                        <td><b>`+option.data("max")+`</b></td>

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

                        <?php if (_ENABLE_SUB_CATEGORIE_): ?>

                                <td>`+option.data("sub_categorie")+`</td>

                        <?php endif; ?>

                        <td class="current-width">

                            <input type="number" step="any" value="1" min="`+min+`" max="`+option.data("max")+`" name="quantite_`+id+`" id="quantite_`+id+`" oninput="getTotal(`+id+`);" class="form-control input-sm" style="width:90px;" required>

                        </td>

                        <td class="current-width">

                            <input type="number" value="`+option.data("prix_vente")+`" min="`+option.data("cout_revient")+`" step="any" name="prix_vente_`+id+`" id="prix_vente_`+id+`" oninput="getTotal(`+id+`);" class="form-control input-sm" style="width:90px;" required>

                        </td>

                        <td class="current-width">

                            <input type="number" value="`+remise_client+`"  min="0" max="`+remise+`" step="1" name="remise_`+id+`" id="remise_`+id+`" oninput="getTotal(`+id+`);" class="form-control input-sm" style="width:90px;" required>

                        </td>

                        <td class="current-width">

                            <input type="number" value="0"  min="0" max="`+remise_dh+`" step="1" name="remise_dh_`+id+`" id="remise_dh_`+id+`" oninput="getTotal(`+id+`);" class="form-control input-sm" style="width:90px;" required>

                        </td>

                        <td class="current-width" id="total_`+id+`">-</td>

                        <td class="current-width"><a href="javascript:;" onclick="removeRow(`+random+`, `+id+`)"><i class="fa fa-fw fa-trash"></i></a></td>

                    </tr>

            `;



            fixTable("tbody_produit", true);

            $("#tbody_produit").append(html);



            getTotal(id);

            getVenteTotal();

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

                        <td><b>`+option.data("max")+`</b></td>

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

                        <?php if (_ENABLE_SUB_CATEGORIE_): ?>

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



    function initMethode()

    {

        $("#cheque_div").hide();

        $("#vente_methode, #vente_paiement, #cheque_montant, #cheque_date, #cheque_reference").removeAttr("required");

        $("#vente_paiement").removeAttr("readonly");



        <?php if (_ENABLE_AVANCE_ && (empty($type_vente) || $type_vente != "rapide")): ?>

                $("#avance_div").hide();

                $("#vente_paiement").removeAttr("max");

                $("#type_avance").removeAttr("required");

                $("input[type=radio][name='type_avance']").each(function (i, el) {

                    el.checked = false;

                });

        <?php endif; ?>

    }

</script>