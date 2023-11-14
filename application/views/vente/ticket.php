<html lang="fr">
<head>
    <title>:: <?=$info->full_name?> | TICKET ::</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style rel="stylesheet" type="text/css">
        @page {
            margin: 0px;
            padding: 0px;
            <?php
             $height = 200 + strlen($info->print_message)/40;
             $height += (count($vente_details_produit) + count($vente_details_produit))*24;
             $height += count($paiements)*24;
             $height += count($exonerations_reste)*12;
            ?>
            size: 80mm <?=$height?>mm;
        };
        html, body { width: 100%; }
        .center { text-align: center; }
        .title { text-align: center;  width: 100%; padding: 5px 12px 5px 12px; }
        .footer { text-align: center;  width: 100%; }
        .title h3 { padding: 0px; }
        .title p { font-size: 12px; }
        .footer p { font-size: 12px; }
        .content { padding: 12px; }
        .small_row { font-size: 11px; }
        .content .myTable { border:1px solid black;border-collapse:collapse; width: 100%; }
        .content .myTable th, .content .myTable td { border:1px solid black; font-size: 12px; padding: 5px; }
        .content .myTable th { text-align: center; }
        .content .simple_tr { font-size: 12px; }
        .content .custom_tr { font-size: 14px; }
        .content .total { text-align: right; }
    </style>
</head>
<body>
<div class="title">
    <p>---------------------------------------------------------------------</p>
    <h3><?=$info->full_name?></h3>
    <p>
        <?=$info->adresse?> <br>
        <?=$info->ville.", ".$info->pays?> <br>
        <?=$info->telephone.(!empty($info->fix)?" &nbsp;/&nbsp; ".$info->fix : "")?> <br>
        <?=$info->email?> <br>
        <?=$info->web?> <br>
    </p>
    <p>---------------------------------------------------------------------</p>
</div>
<div class="content">
    <table>
        <tr class="simple_tr">
            <td>Caissier</td>
            <td>&nbsp; : &nbsp;&nbsp;</td>
            <td><strong><?=$vente->utilisateur?></strong></td>
        </tr>
        <tr class="simple_tr">
            <td>Code Vente</td>
            <td>&nbsp; : &nbsp;&nbsp;</td>
            <td><strong><?=$vente->code_vente?></strong></td>
        </tr>
        <tr class="simple_tr">
            <td>Date</td>
            <td>&nbsp; : &nbsp;&nbsp;</td>
            <td><strong><?=date("d/m/Y", strtotime($vente->date_vente))." ".date("H:i", strtotime($vente->date_create))?></strong></td>
        </tr>
    </table>
    <br>
    <table class="myTable">
        <tr>
            <th>ARTICLE</th>
            <th style="width: 20%;">QTE</th>
            <th>TOTAL</th>
        </tr>
        <?php
        $total_vente = getVenteTotal($vente->id_vente);
        foreach ($vente_details_produit as $val):
            $total = getRowDetailsTotal($val, $vente->tva);
            ?>
            <tr>
                <td>
                    <?php
                    if(!empty($val["id_produit"])) {
                        echo "<span style='font-weight: 600;'>".$val["produit"]."</span>";
                    }
                    elseif(!empty($val["id_service"])) {
                        echo "<span style='font-weight: 600;'>".$val["service"]."</span>";
                        if(!empty($val["description"])) {
                            echo "<br>( ".$val["description"]." )";
                        }
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if(!empty($val["id_produit"])) {
                        echo $val["quantite"];
                    }
                    elseif(!empty($val["id_service"])) {
                        echo "-";
                    }
                    ?>
                </td>
                <td><?=$val["prix_vente"] != 0 ? number_format($total['total'],2,'.', ' ').' <span style="font-size: 10px;"> DH</span>' : "Gratuit"?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <?php if(count($vente_details_service)): ?>
    <table class="myTable">
        <tr>
            <th>SERVICE</th>
            <th style="width: 20%;">QTE</th>
            <th>TTC</th>
        </tr>
        <?php
        $total_vente = getVenteTotal($vente->id_vente);
        foreach ($vente_details_service as $val):
            $total = getRowDetailsTotal($val, $vente->tva);
            ?>
            <tr>
                <td>
                    <?php
                    if(!empty($val["id_produit"])) {
                        echo "<span style='font-weight: 600;'>".$val["produit"]."</span>";
                    }
                    elseif(!empty($val["id_service"])) {
                        echo "<span style='font-weight: 600;'>".$val["service"]."</span>";
                        if(!empty($val["description"])) {
                            echo "<br>( ".$val["description"]." )";
                        }
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if(!empty($val["id_produit"])) {
                        echo $val["quantite"];
                    }
                    elseif(!empty($val["id_service"])) {
                        echo "-";
                    }
                    ?>
                </td>
                <td><?=$val["prix_vente"] != 0 ? number_format($total['total'],2,'.', ' ').' <span style="font-size: 10px;"> DH</span>' : "Gratuit"?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <?php endif;?>
    <div class="total">
        <table style="width: 100%;">
            <?php /* if($vente->promotion>0): ?>
                <tr>
                    <td style="width: 40%; font-size: 14px;"><strong>Promotion</strong></td>
                    <td style="width: 5%; font-size: 14px;">:</td>
                    <td style="width: 55%; font-size: 14px;"><strong>-<?=number_format($vente->promotion,2,'.', ' ')?></strong> <span style="font-size: 10px; font-weight: 600;"> DH</span></td>
                </tr>
            <?php endif; */?>
            <tr>
                <td style="width: 40%;"><strong class="total">TOTAL</strong></td>
                <td style="width: 5%;">:</td>
                <td style="width: 55%;"><strong class="total"><?=number_format($total_vente["total_vente"],2,'.', ' ')?></strong> <span style="font-size: 10px; font-weight: 600;"> DH</span></td>
            </tr>
            <?php /* if(_ENABLE_DROITS_TIMBRE_ && round($total_vente["droit_timbre"], 2) > 0): ?>
            <tr>
                <td style="width: 40%; font-size: 11px;">DROIT DE TIMBRE</td>
                <td style="width: 5%; font-size: 11px;">:</td>
                <td style="width: 55%; font-size: 11px;"><?=number_format($total_vente["droit_timbre"],2,'.', ' ')?> <span style="font-size: 10px;"> DH</span></td>
            </tr>
            <?php endif;*/ ?>
            <?php if(!empty($paiements) || !empty($exonerations_reste) > 0): ?>
                <?php
                foreach ($paiements as $val):
                    $cheque = getPaiementDetails($val["id_paiement"]);
            ?>
                <tr>
                    <td style="width: 40%; font-size: 11px;">
                        <?=getMethodePaiement($val["methode"], $val["type_avance"])?>
                            <?php if($val["methode"] == 2 || $val["methode"] == 3): ?>
                                <br> [ <?=$cheque->reference." &nbsp-&nbsp ".date("d/m/Y", strtotime($cheque->date_cheque))?> ]
                            <?php endif; ?>
                    </td>
                    <td style="width: 5%; font-size: 11px;">:</td>
                    <td style="width: 55%; font-size: 11px;"><?=number_format($val["montant"],2,'.',' ')?> <span style="font-size: 10px;"> DH</span></td>
                </tr>
                <?php endforeach; ?>
                <?php /* foreach ($exonerations_reste as $val): ?>
                    <tr>
                        <td style="width: 40%; font-size: 11px;">[ Exonération ]</td>
                        <td style="width: 5%; font-size: 11px;">:</td>
                        <td style="width: 55%; font-size: 11px;"><?=number_format($val["montant"],2,'.',' ')?> <span style="font-size: 10px;"> DH</span></td>
                    </tr>
                <?php endforeach; */?>
            <?php endif;?>
            <?php /* 
            <tr>
                <td style="width: 40%; font-size: 11px;">RESTE</td>
                <td style="width: 5%; font-size: 11px;">:</td>
                <td style="width: 55%; font-size: 11px;"><?=number_format($total_vente["total_reste"],2,'.', ' ')?></td>
            </tr>
            <?php */ ?>
        </table>
    </div>
</div>
<div class="footer">
    <p>---------------------------------------------------------------------</p>
    <p>
        <?php
            if(!empty($info->num_patente)) {
                echo "<br>PATENTE : ".$info->num_patente;
            }
        ?>
        <?php
            if(!empty($info->num_ice)) {
                echo "<br>ICE : ".$info->num_ice;
            }
        ?>
    </p>
    <p>---------------------------------------------------------------------</p>
    <?php if(!empty($info->print_message)): ?>
        <p><?=$info->print_message?></p>
        <p>---------------------------------------------------------------------</p>
    <?php endif; ?>
    <p>MERCI DE VOTRE VISITE</p>
</div>
</body>
</html>