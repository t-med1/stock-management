<html>
<head>
    <title>BON DE COMMANDE DE CLIENT - <?=$client_cmd->code_client_cmd?></title>
    <style>
        @page { margin: 200px 25px; }
        header { position: fixed; top: -200px; left: 0px; right: 0px; height: 50px; }
        header .title { font-size: 1.1rem; font-weight: 600; border: 2px solid black; border-radius: 3px; margin-left: 15px; padding: 10px; }
        footer { position: fixed; bottom: -160px; left: 0px; right: 0px; height: 100px; }
        footer img { width: 100%; height: 100%; }
        .table { border-collapse: collapse; }
        .table, .table th, .table td { border: 1px solid black; }
        .table th { font-size: 14px; background-color: #cdcdcd; padding: 10px; }
        .table td { font-size: 12px; }
        .table .th td { font-size: 13px; padding: 5px 10px 5px 10px; }
        .table .whiteBB td { border-bottom-color: white;}
        .pushFirst { padding: 10px 10px 10px 10px; }
        .pushTop { padding: 10px 10px 2px 10px; }
        .pushBottom { padding: 2px 10px 10px 10px; }
        .pushNormal { padding: 2px 10px 2px 10px; }
    </style>
</head>
<body>
<!-- Define header and footer blocks before your content -->
<header>
    <table style="width: 100%;">
        <tr>
            <td style="width: 45%;"><img src="<?=_STE_LOGO_?>" style="height: 200px; width: 280px;"></td>
            <td style="width: 20%; text-align: center;"></td>
            <td style="width: 35%; text-align: center;"><div class="title" style="width: 200px; margin-top: 60px; background-color: #cdcdcd; font-family: Arial, Helvetica, sans-serif;">BON DE COMMANDE <span style="font-size: 12px;">DE CLIENT</span></div></td>
        </tr>
    </table>
</header>

<footer>
    <div style="width: 100%; border: 2px solid black; border-radius: 2px; padding: 5px; margin: 0px 15px 0px 18px ; text-align: left;">
        <table style="width: 100%;">
            <tr>
                <td style="width: 100%;">
                    <p style="font-weight: 600; font-size: 11px; margin: 5px;"><?=$info->adresse?></p>
                    <p style="font-weight: 600; font-size: 11px; margin: 5px;"><?=$info->ville.", ".$info->pays?></p>
                    <p style="font-weight: 600; font-size: 11px; margin: 5px;"><?=$info->telephone.(!empty($info->fix)?" &nbsp;/&nbsp; ".$info->fix : "")?></p>
                    <p style="font-weight: 600; font-size: 11px; margin: 5px;"><?=$info->email?></p>
                    <p style="font-weight: 600; font-size: 11px; margin: 5px;"><?=$info->web?></p>
                </td>
            </tr>
        </table>
    </div>
</footer>

<!-- Wrap the content of your PDF inside a main tag -->
<main style="margin-right: 20px; margin-left: 20px;">
    <table style="width: 100%;">
        <tr>
            <td style="width: 40% !important; vertical-align: top;">
                <div style="width: 100%; border: 2px solid black; padding: 10px; font-size: 14px;">
                    <table style="width: 100%;">
                        <tr>
                            <td style="white-space: nowrap; width: 1px;">Code Commande</td>
                            <td style="white-space: nowrap; width: 1px;">&nbsp; : &nbsp;</td>
                            <td style="font-weight: 600;"><?=$client_cmd->code_client_cmd?></td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap; width: 1px;">Date Commande</td>
                            <td style="white-space: nowrap; width: 1px;">&nbsp; : &nbsp;</td>
                            <td style="font-weight: 600;"><?=date("d/m/Y", strtotime($client_cmd->date_client_cmd))?></td>
                        </tr>
                    </table>
                </div>
            </td>
            <td style="width: 5% !important;"><br></td>
            <td style="width: 55% !important; vertical-align: top;">
                <div style="width: 100%; border: 2px solid black; padding: 10px; font-size: 14px;">
                    <table style="width: 100%;">
                        <tr>
                            <td style="white-space: nowrap; width: 1px; vertical-align: top;">Client</td>
                            <td style="white-space: nowrap; width: 1px; vertical-align: top;">&nbsp; : &nbsp;</td>
                            <td style="font-weight: 600; vertical-align: top;"><?=$adresse->full_name?></td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap; width: 1px; vertical-align: top;">Adresse</td>
                            <td style="white-space: nowrap; width: 1px; vertical-align: top;">&nbsp; : &nbsp;</td>
                            <td style="font-weight: 600; vertical-align: top;"><?=!empty($adresse->adresse)?$adresse->adresse."<br>":""?><?=!empty($adresse->ville)?$adresse->ville:""?><?=!empty($adresse->pays)?", ".$adresse->pays:""?></td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
    <table class="table" style="width: 100%; margin-top: 20px;">
        <?php
            $colwidth_1 = 5;
            $colwidth_2 = 40;
            $colwidth_3 = 35;
            $colwidth_4 = 0;
            $colwidth_5 = 20;
            $colspanwidth = 3;
            if(_ENABLE_SUB_CATEGORIE_) {
                $colwidth_1 = 5;
                $colwidth_2 = 30;
                $colwidth_3 = 25;
                $colwidth_4 = 25;
                $colwidth_5 = 15;
                $colspanwidth = 4;
            }
        ?>
        <tr>
            <th style="width: <?=$colwidth_1?>%;">#</th>
            <th style="width: <?=$colwidth_2?>%;">Produit</th>
            <th style="width: <?=$colwidth_3?>%;">Catégorie</th>
            <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                <th style="width: <?=$colwidth_4?>%;">Sous-Catégorie</th>
            <?php endif; ?>
            <th style="width: <?=$colwidth_5?>%;">Quantité</th>
        </tr>
        <?php
        $nbr = 1;
        $quantite_total = 0;
        foreach ($client_cmd_details as $val):
            $quantite_total += $val["quantite"];

            $tr_classe = $nbr < count($client_cmd_details) ? "whiteBB" : "";
            $td_classe = "";
            if($nbr == 1 && $nbr == count($client_cmd_details)) { $td_classe .= " pushFirst "; }
            else
            {
                if($nbr == 1) { $td_classe .= " pushTop "; }
                if($nbr == count($client_cmd_details)) { $td_classe .= " pushBottom "; }
                if($nbr != 1 && $nbr != count($client_cmd_details)) { $td_classe .= " pushNormal "; }
            }
            ?>
            <tr class="<?=$tr_classe?>">
                <td class="<?=$td_classe?>" style="width: <?=$colwidth_1?>%;"><?=$nbr++?></td>
                <td class="<?=$td_classe?>" style="width: <?=$colwidth_2?>%;"><?=$val["produit"]?></td>
                <td class="<?=$td_classe?>" style="width: <?=$colwidth_3?>%;"><?=$val["categorie"]?></td>
                <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                    <td class="<?=$td_classe?>" style="width: <?=$colwidth_4?>%;"><?=$val["sub_categorie"]?></td>
                <?php endif; ?>
                <td class="<?=$td_classe?>" style="width: <?=$colwidth_5?>%;"><?=$val["quantite"]?></td>
            </tr>
        <?php endforeach; ?>
        <tr class="th" style="background-color: #cdcdcd;">
            <td colspan="<?=$colspanwidth?>"><strong style="font-size: 14px;">TOTAL</strong></td>
            <td><strong style="font-size: 14px;"><?=$quantite_total?></strong></td>
        </tr>
    </table>
</main>

</body>
</html>