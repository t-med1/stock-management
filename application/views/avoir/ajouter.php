<form method="post" action="<?=base_url()?>index.php/avoir/ajouter">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Ajouter Bon d'Avoir</h3>
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
                            <input type="text" class="form-control" name="code_avoir" id="code_avoir" placeholder="N° de BA" readonly required>
                            <span style="color: red; display: none;" id="code_avoir_exists"></span>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <label style="float: right; margin-top: 8px;"><span class="text-blue" data-toggle="tooltip" title="Recommandé">*</span> N° de BL :</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" list="liste_codes_ventes" name="code_vente" id="code_vente" placeholder="N° de BL">
                            <datalist id="liste_codes_ventes">
                            </datalist>
                            <input type="hidden" name="id_vente" id="id_vente">
                        </div>
                        <div class="col-md-2" id="code_vente_icon">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <label style="float: right; margin-top: 8px;"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Client :</label>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control select2" name="id_client" id="id_client" required>
                                <?php foreach ($clients as $val): ?>
                                    <option value="<?=$val["id_client"]?>"
                                            data-ice="<?=$val["ice"]?>"
                                            data-full_name="<?=$val["full_name"]?>"
                                            data-responsable="<?=$val["responsable"]?>"
                                            data-adresse="<?=$val["adresse"]?>"
                                            data-ville="<?=$val["ville"]?>"
                                            data-pays="<?=$val["pays"]?>"
                                            data-telephone="<?=$val["telephone"]?>"
                                            data-remise="<?=$val["remise"]?>"
                                            data-avance="<?=htmlspecialchars(json_encode(getAvanceTotal($val["id_client"])))?>"
                                    >
                                        <?=$val["full_name"]?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <label style="float: right; margin-top: 8px;"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Date de Bon d'Avoir :</label>
                        </div>
                        <div class="col-md-6">
                            <input type="date" class="form-control" name="date_avoir" value="<?=date("Y-m-d")?>" placeholder="Date de Bon d'Avoir" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="avoir_alert" style="display: none;">
        <div class="col-md-12">
            <div class="callout callout-warning">
                <h3 style="margin: 0px 0px 10px 0px;">Instructions :</h3>
                Gardez uniquement les produits et leur [ quantité / prix / remise ] retourné dans la liste.
                <p id="avoirs_linked"></p>
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
                                            <option value="20" selected>20 %</option>
                                            <option value="0">0 %</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: center;" class="current-width"><strong>Total TTC</strong> <small>(DH)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                    <td><input type="text" value="0" id="total_ttc_in" class="form-control" readonly></td>
                                    <td><input type="text" value="0" id="total_ttc_out" class="form-control" readonly></td>
                                </tr>
                                <tr class="info" id="avoir_color">
                                    <td style="vertical-align: center;" class="current-width"><strong id="avoir_text">Montant de Retour</strong> <small>(DH)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                    <td colspan="2">
                                        <input type="text" value="0" id="total_retour" name="total_retour" class="form-control" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="vertical-align: middle;" class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Paiement <small>(DH)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                                    <td colspan="2"><input type="number" step="any" min="0" id="avoir_paiement" name="avoir_paiement" class="form-control" required></td>
                                </tr>
                                <tr class="warning">
                                    <th style="vertical-align: middle;" class="current-width">Reste <small>(DH)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                                    <td colspan="2"><input type="text" value="0" id="avoir_reste" class="form-control" readonly></td>
                                </tr>
                                <tr>
                                    <th style="vertical-align: middle;" class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Mode de Paiement &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                                    <td colspan="2">
                                        <select class="form-control" name="avoir_methode" id="avoir_methode" required>
                                            <option value>Non payé</option>
                                            <option value="1" selected>Espèce</option>
                                            <option value="2">Chèque</option>
                                            <option value="3">Effet</option>
                                            <option value="4">Virement bancaire</option>
                                            <?php if(_ENABLE_AVANCE_): ?>
                                                <option value="5">À partir d'avance</option>
                                            <?php endif; ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr id="cheque_div" style="display: none;">
                                    <td colspan="3">
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
                                <?php if(_ENABLE_AVANCE_): ?>
                                    <tr id="avance_div" style="display: none;">
                                        <th style="vertical-align: middle;" class="current-width">Avance de Client &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                                        <td colspan="2">
                                            <table class="table table-bordered" style="margin-bottom: 0px;">
                                                <tr>
                                                    <td class="current-width"><input type="radio" name="type_avance" id="type_avance" value="1"></td>
                                                    <td class="current-width"><?=getMethodePaiement(1)?></td>
                                                    <td><strong id="total_avance_1">...</strong> <small>DH</small></td>
                                                </tr>
                                                <tr>
                                                    <td class="current-width"><input type="radio" name="type_avance" value="2" disabled></td>
                                                    <td class="current-width"><?=getMethodePaiement(2)."/".getMethodePaiement(3)?></td>
                                                    <td><strong id="total_avance_2">...</strong> <small>DH</small></td>
                                                </tr>
                                                <tr>
                                                    <td class="current-width"><input type="radio" name="type_avance" value="3"></td>
                                                    <td class="current-width"><?=getMethodePaiement(4)?></td>
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
                    <button type="submit" style="width: 50%;" class="btn btn-primary">
                        <i class="fa fa-save"></i> &nbsp; Enregistrer
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    var selected_produit_back = [];
    var selected_produit_broken = [];
    var selected_produit = [];
    var selected_produit_free = [];
    var remise_client = 0;

    $(document).ready(function ()
    {
        fixTable("tbody_produit");
        fixTable("tbody_produit_back");
        $("#code_produit_back").focus();

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

        $('#id_client').select2({ placeholder: "Selectionner un client" });
        $("#id_client").val('').trigger("change");

        $('#pays').select2({ placeholder: "Selectionner un pays" });
        $("#pays").val('').trigger("change");

        $("#code_vente").on("input", function () {
            var code_vente = $(this).val().trim();
            if(code_vente != undefined && code_vente != null && code_vente != "")
            {
                $("#code_vente_icon").html('<i class="fa fa-spinner fa-spin" style="font-size: 20px; margin-top: 6px;"></i>');
                $.ajax({
                    type: 'POST',
                    url: '<?=base_url()?>index.php/vente/ajax',
                    data: { "code_vente": code_vente },
                    dataType: "json",
                    success: function(data)
                    {
                        if(data != undefined && data != null && data != "")
                        {
                            if(data.vente_details.length > 0) {
                                $("#code_vente_icon").html('<i class="fa fa-check-square-o text-success" style="font-size: 20px; margin-top: 7px;"></i>');
                                $("#id_vente").val(data.vente.id_vente);
                                $("#id_client").val(data.vente.id_client).trigger("change");
                                $("#id_client").select2({ disabled:"readonly" });
                                $("#avoir_alert").show(100);
                                $("#tva").val(data.vente.tva).trigger("change");
                                $("#adresse").val(data.adresse.adresse);
                                $("#ville").val(data.adresse.ville);
                                $("#pays").val(data.adresse.pays).trigger("change");

                                for (var val of data.vente_details) {
                                    var random = Math.round(Math.random()*1000000000);
                                    var id = val.id_produit;
                                    selected_produit_back.push(id.toString());

                                    var temp_qte = 0;
                                    for (var row of data.avoirs_details) {
                                        if(row.id_produit == id) {
                                            temp_qte += parseInt(row.quantite);
                                        }
                                    }
                                    if(val.quantite-temp_qte <= 0) { continue; }
                                    var min = parseFloat(val.quantite-temp_qte) <= 0 ? 0 : 0.1;

                                    var html = `
                                        <tr id="tr_`+random+`" class="tr_back">
                                            <td>
                                                <a href="javascript:;" class="produitPopup" rel="popover" data-img="`+val.image+`">
                                                    `+val.code_produit+`
                                                    <input type="hidden" name="id_produit_back[]" value="`+random+`">
                                                    <input type="hidden" name="id_produit_back_`+random+`" value="`+id+`">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="javascript:;" class="produitPopup" rel="popover" data-img="`+val.image+`">
                                                `+val.produit+`
                                                </a>
                                            </td>
                                            <td>`+val.categorie+`</td>
                                            <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                                <td>`+val.sub_categorie+`</td>
                                            <?php endif; ?>
                                            <td class="current-width">
                                                <input type="number" step="any" value="`+(val.quantite-temp_qte)+`" min="`+min+`" max="`+(val.quantite-temp_qte)+`" name="quantite_back_`+random+`" id="quantite_back_`+random+`" data-id="`+id+`" oninput="getTotalBack(`+random+`);" class="form-control input-sm" style="width:90px;" required>
                                            </td>
                                            <td class="current-width">
                                                <input type="number" value="`+val.prix_vente+`" min="0" step="any" name="prix_vente_back_`+random+`" id="prix_vente_back_`+random+`" oninput="getTotalBack(`+random+`);" class="form-control input-sm" style="width:90px;" required>
                                            </td>
                                            <td class="current-width">
                                                <input type="number" value="`+val.remise+`" min="0" step="any" name="remise_back_`+random+`" id="remise_back_`+random+`" oninput="getTotalBack(`+random+`);" class="form-control input-sm" style="width:90px;" required>
                                            </td>
                                            <td class="current-width">
                                                <input type="number" value="`+val.remise_dh+`" min="0" step="any" name="remise_dh_back_`+random+`" id="remise_dh_back_`+random+`" oninput="getTotalBack(`+random+`);" class="form-control input-sm" style="width:90px;" required>
                                            </td>
                                            <td class="current-width" id="total_back_`+random+`">-</td>
                                            <td class="current-width"><a href="javascript:;" onclick="removeRowBack(`+random+`, `+id+`)"><i class="fa fa-fw fa-trash"></i></a></td>
                                        </tr>
                                    `;
                                    fixTable("tbody_produit_back", true);
                                    $("#tbody_produit_back").append(html);

                                    getTotalBack(random);
                                    getAvoirTotal();
                                    fixPopupProduit();
                                }
                            }
                            else {
                                $("#code_vente_icon").html('<i class="fa fa-times text-danger" style="font-size: 20px; margin-top: 6px;"></i>');
                                $('#id_client').select2({ placeholder: "Selectionner un client" });
                                $("#id_client").val('').trigger("change");
                                $("#avoir_alert").hide(100);
                                $("#tbody_produit_back").html('');
                                selected_produit_back = [];
                                fixTable("tbody_produit_back");
                                getAvoirTotal();
                            }
                            if(data.codes_ventes.length > 0 && data.vente_details.length <= 0) {
                                var options = ``;
                                for (var val of data.codes_ventes) {
                                    options += `<option value="`+val.code_vente+`">`;
                                }
                                $("#liste_codes_ventes").html(options);
                            }
                            if(data.avoirs.length > 0) {
                                var avoirs = [];
                                for (var val of data.avoirs) {
                                    avoirs.push(`<strong><a style="font-size: 16px;color: #3c8dbc !important;" href="<?=base_url()?>index.php/avoir/details/`+val.id_avoir+`">`+val.code_avoir+`</a></strong>`);
                                }
                                $("#avoirs_linked").html("Bons d'Avoir liés avec cette vente : &nbsp "+avoirs.join(" / "));
                                $("#avoirs_linked").show(100);
                            }
                            else { $("#avoirs_linked").hide(100); }
                        }
                    }
                });
            }
            else  {
                $("#code_vente_icon").html('');
                $('#id_client').select2({ placeholder: "Selectionner un client" });
                $("#id_client").val('').trigger("change");
                $("#avoir_alert").hide(100);
                $("#tbody_produit_back").html('');
                selected_produit_back = [];
                fixTable("tbody_produit_back");
                getAvoirTotal();
            }
        });

        $("#id_client").on("change", function () {
            remise_client = $(this).find("option:selected").data("remise");

            $("#client_ice").html( "ICE : &nbsp; "+$(this).find("option:selected").data("ice") );
            $("#full_name").val( $(this).find("option:selected").data("full_name") );
            $("#responsable").val( $(this).find("option:selected").data("responsable") );
            $("#adresse").val( $(this).find("option:selected").data("adresse") );
            $("#ville").val( $(this).find("option:selected").data("ville") );
            $("#pays").val( $(this).find("option:selected").data("pays") ).trigger("change");
            $("#telephone").val( $(this).find("option:selected").data("telephone") );

            $("#avoir_methode").trigger("change");
        });

        $("#avoir_paiement").on("input", function () {
            if($(this).val() != undefined && $(this).val() != null && $(this).val() > 0) {
                $("#avoir_methode").attr("required", "required");
            }
            else  {
                $("#avoir_methode").removeAttr("required");
            }
            getAvoirTotal();
        });

        $("#avoir_methode").on("change", function ()
        {
            if($(this).val() != undefined && $(this).val() != null)
            {
                if($(this).val() == 1)
                {
                    initMethode();

                    $("#avoir_methode, #avoir_paiement").attr("required", "required");
                    <?php if(_ENABLE_CAISSE_): ?>
                    if (parseFloat($("#total_retour").val() || 0) < 0) {
                        $("#avoir_paiement").attr("max", '<?=getCaisseTotal()?>');
                    }
                    <?php endif; ?>
                }
                else if($(this).val() == 2 || $(this).val() == 3)
                {
                    var completePlaceHolder = $(this).val() == 2 ? "de chèque" : "d'effet";
                    initMethode();

                    $("#cheque_div").show();
                    $("#avoir_methode, #avoir_paiement, #cheque_montant, #cheque_date, #cheque_reference").attr("required", "required");
                    $("#avoir_paiement").attr("readonly", "readonly");

                    $("#cheque_montant").attr("placeholder", "Montant " + completePlaceHolder);
                    $("#cheque_date").attr("placeholder", "Date " + completePlaceHolder);
                    $("#cheque_reference").attr("placeholder", "Réference " + completePlaceHolder);
                    $("#cheque_remarque").attr("placeholder", "Remarque " + completePlaceHolder);
                }
                else if($(this).val() == 4)
                {
                    initMethode();

                    $("#avoir_methode, #avoir_paiement").attr("required", "required");
                }
                <?php if(_ENABLE_AVANCE_): ?>
                else if($(this).val() == 5)
                {
                    initMethode();
                    if (parseFloat($("#total_retour").val() || 0) >= 0)
                    {
                        var avance =  $("#id_client option:selected").data("avance");
                        if(avance != undefined && avance != null && avance != "")
                        {
                            $("#total_avance_1").html(avance.total_espece.toFixed(2));
                            $("#total_avance_2").html(avance.total_cheque.toFixed(2));
                            $("#total_avance_3").html(avance.total_virement.toFixed(2));
                        }

                        $("#avance_div").show();
                        $("#avoir_methode, #avoir_paiement, #type_avance").attr("required", "required");
                    }
                }
                <?php endif; ?>
                else
                { initMethode(); }
            }
            else
            { initMethode(); }
        }).change(); // to get max attr;

        $("#cheque_montant").on("input", function ()
        {
            $("#avoir_paiement").val( $(this).val() );
            $("#avoir_paiement").trigger("input");
        });

        <?php if(_ENABLE_AVANCE_): ?>
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
            $("#avoir_paiement").attr("max", max);
        });
        <?php endif; ?>

        createCodeChecker(
            "avoir",
            "BA",
            "<?=$code_avoir?>"
        );

        $("form").on("submit", function (event) {
            event.preventDefault();
            var form = this;
            if($("[name='id_produit_back[]']").length > 0 || $("[name='id_produit_broken[]']").length > 0) {
                $("#alert_produit").hide();
                checkCodeExists("avoir", "", function () {
                    $(form).unbind("submit").submit();
                });
            }
            else {
                $("#alert_produit").show();
                $("html, body").animate({ scrollTop: 0 }, "fast");
            }
        });
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

        var paiement = parseFloat( $("#avoir_paiement").val() || 0 );
        var reste = paiement - Math.abs((avoir_total-(avoir_total_back+avoir_total_broken)));

        $("#avoir_reste").val(Math.abs(reste).toFixed(2));

        /* ----------------------------------------------------------------------- */
        <?php if(_ENABLE_AVANCE_): ?>
        if($("#id_client").val() != 1 && montant_total >= 0) { $("#avoir_methode option[value=5]").show(); }
        else { $("#avoir_methode option[value=5]").hide(); }
        <?php endif; ?>

        var id_methode = $("#avoir_methode").val();
        if(montant_total >= 0) { $("#cheque_remarque").show(100); }
        else { $("#cheque_remarque").hide(100); id_methode = id_methode == 5 ? 1 : id_methode; }

        $("#avoir_methode").val(id_methode).trigger("change");
        /* ----------------------------------------------------------------------- */
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

    function initMethode()
    {
        $("#cheque_div").hide();
        $("#avoir_methode, #avoir_paiement, #cheque_montant,#cheque_date, #cheque_reference").removeAttr("required");
        $("#avoir_paiement").removeAttr("readonly");

        <?php if(_ENABLE_CAISSE_): ?>
            $("#avoir_paiement").removeAttr("max");
            <?php if(_ENABLE_AVANCE_): ?>
                $("#avance_div").hide();
                $("#type_avance").removeAttr("required");
                $("input[type=radio][name='type_avance']").each(function (i, el) {
                    el.checked = false;
                });
            <?php endif; ?>
        <?php endif; ?>
    }
</script>