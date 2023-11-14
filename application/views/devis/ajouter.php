<form method="post" action="<?=base_url()?>index.php/devis/ajouter">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Ajouter Devis</h3>
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
                            <label style="float: right; margin-top: 8px;"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> N° de Devis :</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="code_devis" id="code_devis" placeholder="N° de Devis" readonly required>
                            <span style="color: red; display: none;" id="code_devis_exists"></span>
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
                            <label style="float: right; margin-top: 8px;"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Date de Devis :</label>
                        </div>
                        <div class="col-md-6">
                            <input type="date" class="form-control" name="date_devis" value="<?=date("Y-m-d")?>" placeholder="Date de Devis" required>
                        </div>
                        <br><br>
                        <div class="col-md-4">
                            <label style="float: right; margin-top: 8px;"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> De :</label>
                        </div>
                        <div class="col-md-3">
                            <input type="date" class="form-control" name="date_debut" value="<?=date("Y-m-d", strtotime("now"))?>" required>
                        </div>
                        <div class="col-md-1">
                            <label style="float: right; margin-top: 8px;"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> a :</label>
                        </div>
                        <div class="col-md-2">
                            <input type="date" class="form-control" name="date_fin" value="<?=date("Y-m-d", strtotime("+7 day"))?>" required>
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
                                $s_ids = array();
                                if(!empty($object_details)):
                                    foreach ($object_details as $val): if(!empty($val["id_service"])) :
                                        $random = rand(100000000, 999999999);
                                        array_push($s_ids, $val["id_service"]);

                                        $prix_vente = !empty($val["id_devis"]) ? $val["prix_vente"] : $val["prix_vente_s"];
                                        $remise = !empty($val["id_devis"]) ? $val["remise"] : $object->remise_client;
                                        $remise_dh = !empty($val["id_devis"]) ? $val["remise_dh"] : $object->remise_client;
                                        ?>
                                        <tr id="tr_<?=$random?>">
                                            <td>
                                                <a href="javascript:;" class="imagePopup" rel="popover" data-img="<?=$val["image_s"]?>">
                                                    <?=$val["service"]?>
                                                    <input type="hidden" name="id_service[]" value="<?=$val["id_service"]?>">
                                                    <input type="hidden" name="service_<?=$val["id_service"]?>" value="<?=$val["id_service"]?>" >
                                                </a>
                                            </td>
                                            <td><?=$val["categorie_s"]?></td>
                                            <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                                <td><?=$val["sub_categorie_s"]?></td>
                                            <?php endif; ?>
                                            <!-- <td class="current-width">
                                                <input type="text" maxlength="200" value="<?=$val["description"]?>" name="description_<?=$val["id_service"]?>" id="description_<?=$val["id_service"]?>" class="form-control input-sm" style="width:120px;">
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
                                            <td class="current-width" id="s_total_<?=$val["id_service"]?>">-</td>
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
                                    <th class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> P. vente <small>(DH)</small></th>
                                    <th class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Remise <small>(%)</small></th>
                                    <th class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Remise <small>(DH)</small></th>
                                    <th class="current-width">Total HT</th>
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
                    <h3 class="box-title">Total</h3>
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
                                   <td><input type="text" value="0" id="devis_total" class="form-control" readonly></td>
                               </tr>
                               <tr>
                                   <th style="vertical-align: middle;" class="current-width"><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> TVA <small>(%)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                                   <td>
                                       <select name="tva" id="tva" class="form-control" onchange="getDevisTotal()" required>
                                           <option value="20" selected>20 %</option>
                                           <option value="0">0 %</option>
                                       </select>
                                   </td>
                               </tr>
                               <tr class="success">
                                   <th style="vertical-align: middle;" class="current-width">Total TTC <small>(DH)</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                                   <td><input type="text" value="0" id="devis_total_ttc" class="form-control" readonly></td>
                               </tr>
                               <tr>
                                   <th style="vertical-align: middle;" class="current-width">Conditions de règlement : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                                   <td>
                                        <textarea class="form-control" name="condition" maxlength="200" rows="3">50% à la commande 
50 % à la livraison</textarea>
                                    </td>
                               </tr>
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
    var selected_produit = [];
    var selected_service = [];
    var selected_produit_free = [];
    var remise_client = 0;

    $(document).ready(function ()
    {
        fixTable("tbody_produit");
        $("#code_produit").focus();

        <?php if(_ENABLE_SERVICE_): ?>
        createServiceSearchInput(
            "#id_service",
            function (option) {
                createServiceRow(option);
            },
            true
        );
        <?php endif;?>

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

        $('#pays').select2({ placeholder: "Selectionner un pays" });
        $("#pays").val('').trigger("change");

        $('#id_client').select2({ placeholder: "Selectionner un client" });
        $("#id_client").val('').trigger("change");

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
            "devis",
            "D",
            "<?=$code_devis?>"
        );

        $("form").on("submit", function (event) {
            event.preventDefault();
            var form = this;
            if($("[name='id_service[]']").length > 0 || $("[name='id_produit[]']").length > 0 || $("[name='id_produit_free[]']").length > 0) {
                $("#alert_produit").hide();
                checkCodeExists("devis", "", function () {
                    $(form).unbind("submit").submit();
                });
            }
            else {
                $("#alert_produit").show();
                $("html, body").animate({ scrollTop: 0 }, "fast");
            }
        });

        getDevisTotal();
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

        getDevisTotal();
    }

    function getDevisTotal()
    {
        var devis_total = 0;
        $(".span_total").each(function (i, el) {
            devis_total += parseFloat($(el).html());
        });
        var tva = parseFloat($("#tva").val());
        var devis_total_ttc = devis_total + (devis_total * tva / 100);

        $("#devis_total").val(devis_total.toFixed(2));
        $("#devis_total_ttc").val(devis_total_ttc.toFixed(2));
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

        getDevisTotal();
    }

    function removeRowFree(random, id)
    {
        $("#tr_"+random).remove();
        selected_produit_free.splice(selected_produit_free.indexOf(id.toString()), 1);
        getDevisTotal();
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
                        // <td class="current-width">
                        //     <input type="text" maxlength="200" value="`+option.data("description")+`" name="description_`+random+`" id="description_`+random+`" class="form-control input-sm" style="width:120px;">
                        // </td>
                html += `<td class="current-width">
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
                    </tr>`;

            fixTable("tbody_service", true);
            $("#tbody_service").append(html);

            getTotal(random, true);
            getDevisTotal();
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
                            <input type="number" step="any" value="1" min="0.1" name="quantite_`+id+`" id="quantite_`+id+`" oninput="getTotal(`+id+`);" class="form-control input-sm" style="width:90px;" required>
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
            getDevisTotal();
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
                            <input type="number" step="any" value="1" min="0.1" name="quantite_free_`+id+`" class="form-control input-sm" style="width:90px;">
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