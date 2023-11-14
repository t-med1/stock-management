function createCodeChecker(type, char, init, ignoreID = "")

{

    $("#code_"+type).mask(char+"/99/9999");

    $("#code_"+type).val(init);



    $("#code_"+type).on("keyup", function (e) {

        var keyCode = e.keyCode || e.which;

        if (keyCode !== 13) {

            checkCodeExists(type, ignoreID);

        }

    });

    $("#code_"+type).on("keypress", function (e) {

        var keyCode = e.keyCode || e.which;

        if (keyCode === 13) {

            e.preventDefault();

            return false;

        }

    });

}



function createServiceSearchInput(input, func, clean = true)

{



    var field = $(input);

    var field_datalist = $(input+"_datalist");



    field.on('keypress', function(e) {

        var keyCode = e.keyCode || e.which;

        if (keyCode === 13) {

            e.preventDefault();

        }

    });



    field.on('input', function() {

        var recherche = $(this).val();

        if(recherche != undefined && recherche != null && recherche != "" && recherche.trim() != "")

        {

            $.ajax({

                url: _base_url_+"index.php/service/getServices/name",

                method: "POST",

                data: { recherche: recherche.trim() },

                dataType: "json",

                success: function (responce) {

                    if(responce != undefined && responce != null && responce != "")

                    {

                        createDatalistServiceOption(field_datalist, responce);

                        field_datalist.find("option").each(function(i, el) {

                            if ($(el).val().trim().toLowerCase() == recherche.trim().toLowerCase()) {

                                func($(this));

                                if(clean) {

                                    setTimeout(function () {

                                        field.val('');

                                    }, 500);

                                }

                            }

                        });

                    }

                }

            });

        }

        else { field_datalist.html(''); }

    });

}





function createProduitSearchInput(input, func, clean = true, quantite = "NO", cout = "NO", type = "ALL")

{



    var timeout = null;

    var field = $(input);

    var field_datalist = $(input+"_datalist");



    

    field.on('keypress', function(e) {

        var keyCode = e.keyCode || e.which;

        if (keyCode === 13) {

            e.preventDefault();

        }

    });

    field.on('input', function() {

       

        var recherche = $(this).val();

        if(recherche != undefined && recherche != null && recherche != "" && recherche.trim() != "")

        {

            $.ajax({

                url: _base_url_+"index.php/produit/getProduits/name/"+quantite+"/"+cout+"/"+type,

                method: "POST",

                data: { recherche: recherche.trim() },

                dataType: "json",

                success: function (responce) {

                    

                    if(responce != undefined && responce != null && responce != "")

                    {

                        createDatalistOption(field_datalist, responce, quantite, cout);



                        if (timeout !== null) { clearTimeout(timeout); }

                        timeout = setTimeout(function () {

                            field_datalist.find("option").each(function(i, el) {

                                

                                if ($(el).val().trim().toLowerCase() == recherche.trim().toLowerCase()) {

                                    func($(this));

                                    if(clean) {

                                        setTimeout(function () {

                                            field.val('');

                                        }, 500);

                                    }

                                }

                            });

                        }, 500);

                    }

                }

            });

        }

        else { field_datalist.html(''); }

    });

}



function createProduitCodeInput(input, func, quantite = "NO", cout = "NO", type = "ALL") {
    var field = $(input);
    var field_datalist = $(input.replace("code", "id")+"_datalist");

    field.on('keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();

            var recherche = $(this).val();
            if (recherche != undefined && recherche != null && recherche != "" && recherche.trim() != "") {
                $.ajax({
                    url: _base_url_+"index.php/produit/getProduits/code/"+quantite+"/"+cout+"/"+type,
                    method: "POST",
                    data: { recherche: recherche.trim() },
                    dataType: "json",
                    success: function (response) {
                        console.log(response); // Log the response to inspect the data
                        if (response && response.produits) {
                            createDatalistOption(field_datalist, response, quantite, cout);
                            field_datalist.find("option").each(function(i, el) {
                                if ($(el).data("code").toString().trim() == recherche.trim() && field_datalist.find("option").length == 1) {
                                    func($(this));
                                    setTimeout(function () {
                                        field.val('');
                                    }, 500);
                                }
                            });
                        } else {
                            console.error("Invalid or missing data in the server response.");
                        }
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        console.error("AJAX request error:", textStatus, errorThrown);
                    }
                });
            } else {
                field_datalist.html('');
            }
        }
        field.focus();
    });
}





function createDatalistOption(field_datalist, responce, quantite, cout) {
    field_datalist.html('');

    if (responce && responce.produits && Array.isArray(responce.produits)) {
        for (var row of responce.produits) {
            var option = $('<option>', {
                value: row.full_name,
                'data-id_produit': row.id_produit,
                'data-full_name': row.full_name,
                'data-id_categorie': row.id_categorie,
                'data-id_sub_categorie': row.id_sub_categorie,
                'data-categorie': row.categorie,
                'data-sub_categorie': row.sub_categorie,
                'data-code': row.code_produit,
                'data-image': row.image,
                'data-prix_achat': row.prix_achat,
                'data-prix_vente': row.prix_vente,
                'data-description': row.description
            });

            if (quantite === 'OK' && responce.stock && responce.stock[row.id_produit] !== undefined) {
                option.attr('data-max', responce.stock[row.id_produit]);
            }

            if (cout === 'OK' && responce.cout_revient && responce.cout_revient[row.id_produit] !== undefined) {
                option.attr('data-cout_revient', responce.cout_revient[row.id_produit]);
            }

            field_datalist.append(option);
        }
    }
}





function createDatalistServiceOption(field_datalist, responce)

{

    field_datalist.html('');

    for (var row of responce.services) {

        field_datalist.append(

            `<option value="`+row.full_name+`"

                        data-id_service="`+row.id_service+`"

                        data-full_name="`+row.full_name+`"

                        data-id_categorie="`+row.id_categorie+`"

                        data-id_sub_categorie="`+row.id_sub_categorie+`"

                        data-categorie="`+row.categorie+`"

                        data-sub_categorie="`+row.sub_categorie+`"

                        data-description="`+(row.description != null ? row.description : "")+`"

                        data-image="`+row.image+`"

                        data-prix_vente="`+row.prix_vente+`" >`

        );

    }

}



function checkCodeExists(type, ignore = "", func = null)

{

    var code = $("#code_"+type).val().trim();

    if(code != undefined && code != null && code != "")

    {

        var span = $("#code_"+type+"_exists");



        $.ajax({

            url: _base_url_+"index.php/"+type+"/checkCodeExists/"+ignore,

            method: "POST",

            data: { ["code_"+type] : code },

            dataType: "json",

            success: function (responce) {

                if(responce == "EXISTS") {

                    span.html("le Code ( "+code+" ) existe déja.");

                    span.show(100);

                    $("#code_"+type+"").val("");

                    $("html, body").animate({ scrollTop: 0 }, "fast");

                }

                else {

                    if(func == null) {

                        span.html("");

                        span.hide(100);

                    }

                    else {

                        func();

                    }

                }

            }

        });

    }

}



function fixPopupImage()

{

    $('a[rel=popover]').popover({

        html: true,

        container: 'body',

        trigger: 'hover',

        placement: 'top',

        content: function() {

            var img = $(this).data('img');

            if(img != undefined && img != null && img != "") {

                return '<img src="'+_base_url_+'app-config/uploads/'+img+'?v='+_refresh_+'" />';

            }

        }

    });

    $(".imagePopup").on("click", function (e) {

        e.preventDefault();

    });

}



function checkNumFactureExists(ignore = "", func = null)

{

    var numero = $("#num_facture").val().trim();

    if(numero != undefined && numero != null && numero != "")

    {

        var span = $("#num_facture_exists");



        $.ajax({

            url: _base_url_+"index.php/vente/checkNumFactureExists/"+ignore,

            method: "POST",

            data: { "num_facture" : numero },

            dataType: "json",

            success: function (responce) {

                if(responce == "EXISTS") {

                    span.html("le N° de facture ( "+numero+" ) existe déja.");

                    span.show(100);

                    $("#num_facture").val("");

                    $("html, body").animate({ scrollTop: 0 }, "fast");

                }

                else {

                    if(func == null) {

                        span.html("");

                        span.hide(100);

                    }

                    else {

                        func();

                    }

                }

            }

        });

    }

}



function confirmDelete(form)

{

    Swal.fire({

        title: 'Attention !',

        html: "Cette opération supprimera Egalement toutes les données associées.<br>Voulez vous vraiment continuer?",

        type: 'warning',

        showCancelButton: true,

        confirmButtonColor: '#d33',

        cancelButtonColor: '#28a745',

        confirmButtonText: 'Supprimer',

        cancelButtonText: 'Annuler'

    }).then((result) => {

        if (result.value) {

            $("#"+form).submit();

        }

    });

}



function createDataTable(tableSelector, order, lengthMenu , exportBtnsSelector = null, exportTitle = null, tableType = "N", serverUrl = "", serverColumns = [])

{

    if ($(tableSelector).length > 0)

    {

        var myTable = null;

        var myOrder = order[0].constructor === Array ? order : [ order ];



        if(tableType == "R") // Relevé

        {

            myTable = $(tableSelector).DataTable( {

                oLanguage: frenchDataTable,

                order: myOrder,

                bPaginate: false,

                searching: true,

                paging: false,

                info: false,

                sort: false

            });

        }

        else if(tableType == "S" || tableType == "SI") // Server Side

        {

            myTable = $(tableSelector).DataTable( {

                lengthMenu: lengthMenu,

                oSearch: {bSmart: false, bRegex: true},

                oLanguage: frenchDataTable,

                order: myOrder,

                processing: true,

                serverSide: true,

                serverMethod: "post",

                ajax: { url : serverUrl },

                drawCallback: function(a, b) {

                    setTimeout(function () {

                        fixPopupProduit();

                        if(tableType == "SI") { try { checkBtnValider(); } catch (e) { console.log(e.message); } /* 'inventaire-nouveau' view */ }

                        $('[data-toggle="tooltip"]').tooltip();

                        $('[data-toggle="popover"]')[0] && $('[data-toggle="popover"]').popover();

                        $(tableSelector + ' tr td:last-child').addClass("no-export");

                    }, 100);

                },

                columns: serverColumns,

                columnDefs: [

                    { targets: 'no-sort', orderable: false , style:'display:inline'}

                ]

            });

        }

        else // Normale

        {

            myTable = $(tableSelector).DataTable( {

                lengthMenu: lengthMenu,

                oSearch: {bSmart: false, bRegex: true},

                oLanguage: frenchDataTable,

                order: myOrder

            });



        }



        if(exportBtnsSelector != null)

        {

            var title = exportTitle != null ? exportTitle : document.title.replace("::", "").replace("::", "").trim();

            new $.fn.DataTable.Buttons(myTable, {

                buttons : [

                    {

                        extend : 'print', footer: true,

                        text : '<i class="fa fa-print" aria-hidden="true">&nbsp;&nbsp;Imprimer</i>',

                        title : title,

                        pageSize : 'A4',

                        orientation : 'landscape',

                        //orientation : 'portrait',

                        exportOptions: { columns: [':not(.no-export):not(:last-child)'], stripHtml: true }

                    },

                    {

                        extend: "excel", footer: true,

                        text : '<i class="fa fa-table" aria-hidden="true">&nbsp;&nbsp;Excel</i>',

                        title : title,

                        exportOptions: { columns: [':not(.no-export):not(:last-child)'], stripHtml: true }

                    }

                ]

            }).container().appendTo(exportBtnsSelector);

        }

    }

}



function createBarCode(code, canvas)

{

    $(canvas).JsBarcode( code , {

        "format": "CODE128",

        "background": "#FFFFFF",

        "lineColor": "#000000",

        "fontSize": 20,

        "height": 60,

        "width": 2,

        "margin": 10,

        "textMargin": 0,

        "displayValue": true,

        "font": "monospace",

        "fontOptions": "",

        "textAlign": "center"

    });

}



function fixTable(tbody, clean = false)

{

    if(!clean)

    {

        var tr_count = parseInt($("#"+tbody+" tr").length);

        var th_count = parseInt($("#"+tbody).parent().find("th").length);



        if (tr_count == 0)

        {

            $("#" + tbody).parent().find("th").each(function () {

                if ($(this)[0].hasAttribute("colspan")) {

                    th_count += parseInt($(this).attr("colspan"))-1;

                }

            });



            $("#" + tbody).append('<tr class="empty_tr"><td style="text-align: center;" colspan="' + th_count + '"> Aucune donnée disponible dans le tableau </td></tr>');

        }

    }

    else

    {

        var empty_tr_count = parseInt($("#"+tbody+" .empty_tr").length);



        if(empty_tr_count == 1) {

            $("#"+tbody).html("");

        }

    }

}



function initArchiveCheckbox()

{

    if($("#display").length > 0)

    {

        $("#display").on("change", function () {

            $("#display_hide_updated")[0].checked = !this.checked;

        });

    }

}



function confirmFixReste()

{

    Swal.fire({

        title: 'Exonération du reste.',

        html: "Voulez vous vraiment continuer ?",

        type: 'warning',

        showCancelButton: true,

        confirmButtonColor: '#e17e2e',

        cancelButtonColor: '#b9b9b9',

        confirmButtonText: 'Continuer',

        cancelButtonText: 'Annuler'

    }).then((result) => {

        if (result.value) {

            $("#form_exoneration_reste").submit();

        }

    });

}



function fixPopupProduit()

{

    $('a[rel=popover]').popover({

        html: true,

        container: 'body',

        trigger: 'hover',

        placement: 'top',

        content: function() {

            var img = $(this).data('img');

            var description = $(this).data('description');

            if(img != undefined && img != null && img != "") {

                return '<img src="'+_base_url_+'app-config/uploads/'+img+'?v='+_refresh_+'" />';

            }

            else if(description != undefined && description != null && description != "") {

                return nl2br(description);

            }

        }

    });

    $(".produitPopup").on("click", function (e) {

        e.preventDefault();

    });

}



function nl2br(str, is_xhtml)

{

    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br ' + '/>' : '<br>';

    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');

}



function createDescriptionPopover(description)

{

    if(description != undefined && description != null && description != "")

    {

        return `<a href="javascript:;" class="produitPopup" rel="popover" data-description="`+description+`">

                    <i class="fa fa-info-circle"></i>

                </a>`;

    }

    else { return ``; }

}



function showImage(produit, image)

{

    $("#myModalImage .modal-title").html(produit);

    $("#myModalImage img").attr("src", _base_url_+'app-config/uploads/'+image+'?v='+_refresh_);

    $("#myModalImage").modal("show");

}



function openSmallWindow(url)

{

    window.open(url, "popupWindow", "width=650, height=800, scrollbars=yes");

}



function createDivInfo(option)

{

    var sub_cat = ``;

    if(_enable_sub_categorie_) {

        sub_cat = `<tr>

                        <td>Sous-Catégorie</td>

                        <td>&nbsp; : &nbsp;&nbsp;</td>

                        <td><b>`+option.data("sub_categorie")+`<b></td>

                    </tr>`;

    }



    return `<table>

                    <tr>

                        <td>Code</td>

                        <td>&nbsp; : &nbsp;&nbsp;</td>

                        <td><b>`+option.data("code")+`<b></td>

                    </tr>

                    <tr>

                        <td>Catégorie</td>

                        <td>&nbsp; : &nbsp;&nbsp;</td>

                        <td><b>`+option.data("categorie")+`<b></td>

                    </tr>

                    `+sub_cat+`

                    <tr>

                        <td>Stock</td>

                        <td>&nbsp; : &nbsp;&nbsp;</td>

                        <td><b>`+option.data("max")+`<b></td>

                    </tr>

              </table>`;

}

