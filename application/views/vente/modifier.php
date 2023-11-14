<form method="post" action="<?=base_url()?>index.php/vente/modifier">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Modifier Vente</h3>
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
                            <input type="text" class="form-control" name="code_vente" id="code_vente" placeholder="N° de BL" required>
                            <span style="color: red; display: none;" id="code_vente_exists"></span>
                            <input type="hidden" name="id_vente" value="<?=$vente->id_vente?>">
                        </div>
                    </div>
                    <?php if(!empty($vente->num_facture)): ?>
                        <div class="row" style="margin-top: 15px;">
                            <div class="col-md-1"></div>
                            <div class="col-md-3">
                                <label style="float: right; margin-top: 8px;">N° de Facture :</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="num_facture" id="num_facture" value="<?=$vente->num_facture?>" placeholder="N° de Facture" readonly>
                                <span style="color: red; display: none;" id="num_facture_exists"></span>
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
                                        if($val["id_client"] == $vente->id_client) {
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
                            <label style="float: right; margin-top: 8px;"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Date de Vente :</label>
                        </div>
                        <div class="col-md-6">
                            <input type="date" class="form-control" name="date_vente" value="<?=date("Y-m-d", strtotime($vente->date_vente))?>" placeholder="Date de Vente" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if(_ENABLE_SERVICE_): ?>
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
                                    <?php if(_ENABLE_SUB_CATEGORIE_): ?>
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
                                $ids_service = array();
                                if(!empty($vente_details)):
                                    foreach ($vente_details as $val): 
                                        if(!$val["id_produit"]) :
                                        $random = rand(100000000, 999999999);
                                        array_push($ids_service, $val["id_service"]);

                                        $prix_vente = $val["prix_vente"];
                                        $description_service = $val["description_service"];
                                        $remise = $val["remise"] ? $val["remise"] : 0;
                                        $remise_dh = $val["remise_dh"] ? $val["remise_dh"] : 0;
                                        ?>
                                        <tr id="tr_<?=$random?>">
                                            <td>
                                                    <?=$val["service"]?>
                                                    <input type="hidden" name="id_service[]" value="<?=$val["id_service"]?>">
                                                    <input type="hidden" name="service_<?=$val["id_service"]?>" value="<?=$val["id_service"]?>" >
                                            </td>
                                            <td><?=$val["categorie_service"]?></td>
                                            <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                                <td><?=$val["sub_categorie_service"]?></td>
                                            <?php endif; ?>
                                            <!-- <td class="current-width">
                                                <input type="text" maxlength="200" value="<?=$val["description_service"];?>" name="description_<?=$val["id_service"]?>" id="description_<?=$val["id_service"]?>" class="form-control input-sm" style="width:120px;">
                                            </td> -->
                                            <td class="current-width">
                                                <input type="number" value="<?=$prix_vente?>" min="0" step="any" name="s_prix_vente_<?=$val["id_service"]?>" id="s_prix_vente_<?=$val["id_service"]?>" oninput="getTotal(<?=$val["id_service"]?>, true);" class="form-control input-sm" style="width:90px;" required>
                                            </td>
                                            <td class="current-width">
                                                <input type="number" value="<?=$remise?>" min="0" step="any" name="s_remise_<?=$val["id_service"]?>" id="s_remise_<?=$val["id_service"]?>" oninput="getTotal(<?=$val["id_service"]?>, true);" class="form-control input-sm" style="width:90px;" required>
                                            </td>
                                            <td class="current-width">
                                                <input type="number" value="<?=$remise_dh?>" min="0" step="any" name="s_remise_dh_<?=$val["id_service"]?>" id="s_remise_dh_<?=$val["id_service"]?>" oninput="getTotal(<?=$val["id_service"]?>, true);" class="form-control input-sm" style="width:90px;" required>
                                            </td>
                                            <td class="current-width" id="s_total_<?=$val["id_service"]?>"><span class="span_total"><?=number_format(getRowDetailsTotal($val)['total'],2,'.','')?></span> <small>DH</small></td>
                                            <td class="current-width"><a href="javascript:;" onclick="removeRow(<?=$random?>, <?=$val["id_service"]?>, true)"><i class="fa fa-fw fa-trash"></i></a></td>
                                        </tr>
                                    <?php endif; endforeach; endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif;?>
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

                            <input type="text" class="form-control" id="code_produit" placeholder="Code Produit" style="border: 2px dashed rgb(54, 127, 169);"><br>
                            <input type="text" list="id_produit_datalist" class="form-control" id="id_produit" placeholder="Nom Produit" style="border: 2px solid rgb(54, 127, 169);">
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
                                    <th>Code</th>
                                    <th>Produit</th>
                                    <th>Catégorie</th>
                                    <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                        <th>Sous-Catégorie</th>
                                    <?php endif; ?>
                                    <th class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Quantite</th>
                                    <th class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> P. Vente  <small>(DH)</small></th>
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
                                        foreach ($vente_details as $val):
                                            if(!$val['id_service']):
                                                $random = rand(100000000, 999999999);
                                                $max = (int)getQuantiteProduit($val["id_produit"])["stock"];
                                                $min = $max <= 0 ? 0 : 0.1;
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
                                                        <?=$val["produit"]?> <?=$val["id_produit"]?>
                                                    </a>
                                                </td>
                                                <td><?=$val["categorie"]?></td>
                                                <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                                    <td><?=$val["sub_categorie"]?></td>
                                                <?php endif; ?>
                                                <td class="current-width">
                                                    <input type="number" step="any" value="<?=$val["quantite"]?>" min="<?=$min?>" max="<?=$max+(int)$val["quantite"]?>" name="quantite_<?=$val["id_produit"]?>" id="quantite_<?=$val["id_produit"]?>" oninput="getTotal(<?=$val["id_produit"]?>);" class="form-control input-sm" style="width:90px;" required>
                                                </td>
                                                <td class="current-width">
                                                    <input type="number" value="<?=$val["prix_vente"]?>" min="0" step="any" name="prix_vente_<?=$val["id_produit"]?>" id="prix_vente_<?=$val["id_produit"]?>" oninput="getTotal(<?=$val["id_produit"]?>);" class="form-control input-sm" style="width:90px;" required>
                                                </td>
                                                <td class="current-width">
                                                    <input type="number" value="<?=$val["remise"] ? $val["remise"] : 0 ;?>" min="0" step="any" name="remise_<?=$val["id_produit"]?>" id="remise_<?=$val["id_produit"]?>" oninput="getTotal(<?=$val["id_produit"]?>);" class="form-control input-sm" style="width:90px;" required>
                                                </td>
                                                <td class="current-width">
                                                    <input type="number" value="<?=$val["remise_dh"] ? $val["remise_dh"] : 0?>" min="0" step="any" name="remise_dh_<?=$val["id_produit"]?>" id="remise_dh_<?=$val["id_produit"]?>" oninput="getTotal(<?=$val["id_produit"]?>);" class="form-control input-sm" style="width:90px;" required>
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
                                                <input type="number" step="any" value="<?=$val["quantite"]?>" min="<?=$min?>" max="<?=$max+(int)$val["quantite"]?>" name="quantite_free_<?=$val["id_produit"]?>" class="form-control input-sm" style="width:90px;">
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
                                    <?php endif; endif; endforeach; ?>
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
                                <tbody>
                                <tr>
                                    <th style="vertical-align: middle;" class="current-width">Total HT <small>(DH)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                                    <td><input type="text" value="0" id="vente_total" class="form-control" readonly></td>
                                </tr>
                                <tr>
                                    <th style="vertical-align: middle;" class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> TVA <small>(%)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                                    <td>
                                        <select name="tva" id="tva" class="form-control" onchange="getVenteTotal()" required>
                                            <option value="20" <?=$vente->tva == 20 ? "selected" : ""?>>20 %</option>
                                            <option value="0" <?=$vente->tva == 0 ? "selected" : ""?>>0 %</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="success">
                                    <th style="vertical-align: middle;" class="current-width">Total TTC <small>(DH)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                                    <td><input type="text" value="0" id="vente_total_ttc" class="form-control" readonly></td>
                                </tr>
                                <tr>
                                    <th style="vertical-align: middle;" class="current-width">Paiement <small>(DH)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                                    <td><input type="text" value="<?=number_format(getVenteTotal($vente->id_vente)["total_paiement"],2,'.','')?>" id="vente_paiement" name="vente_paiement" class="form-control" readonly></td>
                                </tr>
                                <tr class="warning">
                                    <th style="vertical-align: middle;" class="current-width">Reste <small>(DH)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                                    <td><input type="text" value="0" id="vente_reste" class="form-control" readonly></td>
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
    var selected_produit = <?=json_encode($ids)?>;
    var selected_produit_free = <?=json_encode($ids_free)?>;
    <?php if(_ENABLE_SERVICE_): ?>
    var selected_service = <?=json_encode($ids_service)?>;
    <?php endif;?>
    var remise_client = 0;

    $(document).ready(function ()
    {
        fixTable("tbody_produit");

        <?php if(_ENABLE_SERVICE_): ?>
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

        $('#id_client').select2({ placeholder: "Selectionner un client" });

        $('#pays').select2({ placeholder: "Selectionner un pays" });
        $("#pays").val('').trigger("change");

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
        });

        createCodeChecker(
            "vente",
            "BL",
            "<?=$vente->code_vente?>",
            <?=$vente->id_vente?>
        );

        $("#num_facture").mask("99999999");
        <?php if($vente->num_facture): ?>
        $("#num_facture").val("<?=$vente->num_facture?>");
        <?php endif;?>

        $("#num_facture").on("keyup", function (e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode !== 13) {
                checkNumFactureExists(<?=$vente->id_vente?>);
            }
        });
        $("#num_facture").on("keypress", function (e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });

        $("form").on("submit", function (event) {
            event.preventDefault();
            var form = this;
            if($("[name='id_produit[]']").length > 0 || $("[name='id_produit_free[]']").length > 0 || $("[name='id_service[]']").length > 0) {
                $("#alert_produit").hide();
                checkCodeExists("vente", <?=$vente->id_vente?>, function () {
                    var numero = $("#num_facture").val();
                    if(numero != undefined && numero != null && numero != "")
                    {
                        checkNumFactureExists(<?=$vente->id_vente?>, function () {
                            $(form).unbind("submit").submit();
                        });
                    }
                    else {
                        $(form).unbind("submit").submit();
                    }
                });
            }
            else {
                $("#alert_produit").show();
                $("html, body").animate({ scrollTop: 0 }, "fast");
            }
        });

        $("#id_client").val('<?=$vente->id_client?>').trigger("change");
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

    function getVenteTotal()
    {
        var vente_total = 0;
        $(".span_total").each(function (i, el) {
            vente_total += parseFloat($(el).html());
        });
        var tva = parseFloat($("#tva").val());
        var vente_total_ttc = vente_total + (vente_total * tva / 100);

        $("#vente_total").val(vente_total.toFixed(2));
        $("#vente_total_ttc").val(vente_total_ttc.toFixed(2));
        $("#vente_reste").val( (vente_total_ttc - parseFloat( $("#vente_paiement").val() )).toFixed(2) );

    }

    function removeRow(random, id, service = false)
    {
        $("#tr_"+random).remove();
        selected_produit.splice(selected_produit.indexOf(id.toString()), 1);
        getVenteTotal();
        fixTable("tbody_produit");

        $("#tr_"+random).remove();

        if(service) {
            selected_service.splice(selected_service.indexOf(id.toString()), 1);
            fixTable("tbody_service");
        }
        else {
            selected_produit.splice(selected_produit.indexOf(id.toString()), 1);
            fixTable("tbody_produit");
        }
    }
    function removeRowFree(random, id)
    {
        $("#tr_"+random).remove();
        selected_produit_free.splice(selected_produit_free.indexOf(id.toString()), 1);
        getVenteTotal();
        fixTable("tbody_produit");
    }

    <?php if(_ENABLE_SERVICE_): ?>
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
                        <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                            <td>`+option.data("sub_categorie")+`</td>
                        <?php endif; ?>`;
                        /*<td class="current-width">
                            <input type="text" maxlength="200" value="`+option.data("description")+`" name="description_`+random+`" id="description_`+random+`" class="form-control input-sm" style="width:120px;">
                        </td>*/
                html += `<td class="current-width">
                            <input type="number" value="`+option.data("prix_vente")+`" min="0" step="any" name="s_prix_vente_`+random+`" id="s_prix_vente_`+random+`" oninput="getTotal(`+random+`, true);" class="form-control input-sm" style="width:90px;" required>
                        </td>
                        <td class="current-width">
                            <input type="number" value="`+remise_client+`" min="0" max="100" step="1" name="s_remise_`+random+`" id="s_remise_`+random+`" oninput="getTotal(`+random+`, true);" class="form-control input-sm" style="width:90px;" required>
                        </td>
                        <td class="current-width">
                            <input type="number" value="0" min="0" step="any" max="`+option.data("prix_vente")+`" name="s_remise_dh_`+random+`" id="s_remise_dh_`+random+`" oninput="getTotal(`+random+`, true);" class="form-control input-sm" style="width:90px;" required>
                        </td>
                        <td class="current-width" id="s_total_`+random+`"><span class="span_total">-</span> <small>DH</small></td>
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
    <?php endif;?>

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
                        <td class="current-width" id="total_`+id+`"><span class="span_total">-</span> <small>DH</small></td>
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