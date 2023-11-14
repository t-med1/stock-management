<html lang="fr">
<head>
    <title>:: <?=$info->full_name?> | CODEBARE ::</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style rel="stylesheet" type="text/css">
        @page {
            margin: 0px;
            padding: 0px;
            size: 100mm 50mm;
        }
        html, body { width: 100%; }
        .center { text-align: center; }
        .title { text-align: center;  width: 100%; padding: 5px 12px 5px 12px; }
        .footer { text-align: center;  width: 100%; }
        .title h3 { padding: 0px; }
        .title p { font-size: 12px; }
        .footer p { font-size: 12px; }
        .content { padding: 3px; }
        .small_row { font-size: 11px; }
        .content .myTable { border:1px solid black;border-collapse:collapse; width: 100%; margin: 1px}
        .content .myTable th, .content .myTable td { border:1px solid black; font-size: 12px; padding: 1px; }
        .content .myTable th { text-align: center; }
        .content .simple_tr { font-size: 12px; }
        .content .custom_tr { font-size: 14px; }
        .content .total { text-align: right; }
        p { writing-mode: tb-rl; }
    </style>
    <script type="text/javascript" src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
</head>
<body>
<div class="content">
    <h3 style="text-align: center; margin:1px "><b><?=$info->full_name?></b></h3>
    <img style="margin-top: 15px; margin-left: 40px; margin-bottom: 0px" src="<?=$barcode; ?>" width="300px">
    <div style="text-align: center; font-size: 21px"><strong><?=$produit->full_name?></strong></div>
</div>
<script type="text/javascript" src="<?=base_url()?>assets/JsBareCode.min.js?v=<?=_REFRESH_?>"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $("#code_produit").JsBarcode( "123456789" , {
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
    })
</script>
</body>
</html>