<html>
<head>
    <title>BON D'AVOIR - <?=$avoir->code_avoir?></title>
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
            <td style="width: 35%; text-align: center;"><div class="title" style="width: 200px; margin-top: 60px; background-color: #cdcdcd; font-family: Arial, Helvetica, sans-serif;">BON D'AVOIR</div></td>
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
            <td style="width: 40% !important;vertical-align: top;">
                <div style="width: 100%; border: 2px solid black; padding: 10px; font-size: 14px;">
                    <table style="width: 100%;">
                        <tr>
                            <td style="white-space: nowrap; width: 1px;">N° de BA</td>
                            <td style="white-space: nowrap; width: 1px;">&nbsp; : &nbsp;</td>
                            <td style="font-weight: 600;"><?=$avoir->code_avoir?></td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap; width: 1px;">Date de BA</td>
                            <td style="white-space: nowrap; width: 1px;">&nbsp; : &nbsp;</td>
                            <td style="font-weight: 600;"><?=date("d/m/Y", strtotime($avoir->date_avoir))?></td>
                        </tr>
                        <?php if(!empty($avoir->id_vente)): ?>
                            <tr>
                                <td style="white-space: nowrap; width: 1px;">N° de BL</td>
                                <td style="white-space: nowrap; width: 1px;">&nbsp; : &nbsp;</td>
                                <td style="font-weight: 600;"><?=$this->db->where("id_vente", $avoir->id_vente)->get("vente")->row()->code_vente?></td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
            </td>
            <td style="width: 5% !important;"><br></td>
            <td style="width: 55% !important; vertical-align: top;">
                <div style="width: 100%; border: 2px solid black; padding: 10px; font-size: 14px;">
                    <table style="width: 100%;">
                        <tr>
                            <td style="white-space: nowrap; width: 1px;">Client</td>
                            <td style="white-space: nowrap; width: 1px;">&nbsp; : &nbsp;</td>
                            <td style="font-weight: 600;"><?=$adresse->full_name?></td>
                        </tr>
                        <?php if(!empty($adresse->ice)):?>
                            <tr>
                                <td style="white-space: nowrap; width: 1px; vertical-align: top;">ICE</td>
                                <td style="white-space: nowrap; width: 1px; vertical-align: top;">&nbsp; : &nbsp;</td>
                                <td style="font-weight: 600; vertical-align: top;"><?=$adresse->ice?></td>
                            </tr>
                        <?php endif; ?>
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

    <p style="margin-bottom: 2px; margin-top: 5px; font-size: 12px; font-weight: 600;">ENTREE :</p>
    <table class="table" style="width: 100%;">
        <tr>
            <th style="width: 5%;">#</th>
            <th style="width: 30%;">Produit</th>
            <th style="width: 5%;">Etat</th>
            <th style="width: 10%;">Quantité</th>
            <th style="width: 12%;">P. Unitaire</th>
            <th style="width: 10%;">Remise</th>
            <th style="width: 18%;">P. Total</th>
        </tr>
        <?php
        $total_avoir = getAvoirTotal($avoir->id_avoir);

        $montant_total_in = 0;
        $montant_total_out = 0;

        $nbr = 1;
        foreach ($avoir_details_in as $val):
            $total = getRowDetailsTotal($val);
            $montant_total_in += $total['total'];

            $tr_classe = $nbr < count($avoir_details_in) ? "whiteBB" : "";
            $td_classe = "";
            if($nbr == 1 && $nbr == count($avoir_details_in)) { $td_classe .= " pushFirst "; }
            else
            {
                if($nbr == 1) { $td_classe .= " pushTop "; }
                if($nbr == count($avoir_details_in)) { $td_classe .= " pushBottom "; }
                if($nbr != 1 && $nbr != count($avoir_details_in)) { $td_classe .= " pushNormal "; }
            }
            ?>
            <tr class="<?=$tr_classe?>">
                <td class="<?=$td_classe?>" style="width: 5%;"><?=$nbr++?></td>
                <td class="<?=$td_classe?>" style="width: 30%;"><?=$val["produit"]?></td>
                <td class="<?=$td_classe?>" style="width: 5%;"><?=$val["etat"] == 1 ? "N" : "E"?></td>
                <td class="<?=$td_classe?>" style="width: 10%;"><?=$val["quantite"]?></td>
                <td class="<?=$td_classe?>" style="width: 12%;"><?=$val["prix_vente"] != 0 ? number_format($val["prix_vente"],2,'.', '').' <span style="font-size: 10px;">DH</span>' : "Gratuit"?></td>
                <td class="<?=$td_classe?>" style="width: 10%;"><?=$val["prix_vente"] != 0 ? number_format(($val["prix_vente"]*$val["remise"]/100)+$val["remise_dh"],2,'.', '').' <span style="font-size: 10px;">DH</span>' : "Gratuit"?></td>
                <td class="<?=$td_classe?>" style="width: 18%;"><?=$val["prix_vente"] != 0 ? number_format($total['total'],2,'.', '').' <span style="font-size: 10px;">DH</span>' : "Gratuit"?></td>
            </tr>
        <?php endforeach; ?>
        <tr class="th">
            <td colspan="6"><strong style="font-size: 14px;">Total HT</strong></td>
            <td><strong style="font-size: 14px;"><?=number_format($montant_total_in,2, '.', ' ')?></strong> <span style="font-size: 10px;"> DH</span></td>
        </tr>
        <tr class="th">
            <td colspan="6"><strong style="font-size: 14px;">TVA à <?=$avoir->tva?>%</strong></td>
            <td><strong style="font-size: 14px;"><?=number_format($montant_total_in*$avoir->tva/100,2, '.', ' ')?></strong> <span style="font-size: 10px;"> DH</span></td>
        </tr>
        <tr class="th">
            <td colspan="6"><strong style="font-size: 14px;">Total TTC</strong></td>
            <td><strong style="font-size: 14px;"><?=number_format($montant_total_in+($montant_total_in*$avoir->tva/100),2, '.', ' ')?></strong> <span style="font-size: 10px;"> DH</span></td>
        </tr>
    </table>
    <?php if(!empty($avoir_details_out)): ?>
    <p style="margin-bottom: 2px; margin-top: 20px; font-size: 12px; font-weight: 600;">SORTIE :</p>
    <table class="table" style="width: 100%;">
        <tr>
            <th style="width: 5%;">#</th>
            <th style="width: 35%;">Produit</th>
            <th style="width: 15%;">Quantité</th>
            <th style="width: 15%;">P. Unitaire</th>
            <th style="width: 10%;">Remise</th>
            <th style="width: 20%;">P. Total</th>
        </tr>
        <?php
        $nbr = 1;
        foreach ($avoir_details_out as $val):
            $total = getRowDetailsTotal($val);
            $montant_total_out += $total['total'];

            $tr_classe = $nbr < count($avoir_details_out) ? "whiteBB" : "";
            $td_classe = "";
            if($nbr == 1 && $nbr == count($avoir_details_out)) { $td_classe .= " pushFirst "; }
            else
            {
                if($nbr == 1) { $td_classe .= " pushTop "; }
                if($nbr == count($avoir_details_out)) { $td_classe .= " pushBottom "; }
                if($nbr != 1 && $nbr != count($avoir_details_out)) { $td_classe .= " pushNormal "; }
            }
            ?>
            <tr class="<?=$tr_classe?>">
                <td class="<?=$td_classe?>" style="width: 5%."><?=$nbr++?></td>
                <td class="<?=$td_classe?>" style="width: 35%."><?=$val["produit"]?></td>
                <td class="<?=$td_classe?>" style="width: 15%."><?=$val["quantite"]?></td>
                <td class="<?=$td_classe?>" style="width: 15%."><?=$val["prix_vente"] != 0 ? number_format($val["prix_vente"],2,'.', '').'<span style="font-size: 10px;"> DH</span>' : "Gratuit"?></td>
                <td class="<?=$td_classe?>" style="width: 10%."><?=$val["prix_vente"] != 0 ? number_format(($val["prix_vente"]*$val["remise"]/100)+$val["remise_dh"],2,'.', '').'<span style="font-size: 10px;"> DH</span>' : "Gratuit"?></td>
                <td class="<?=$td_classe?>" style="width: 20%."><?=$val["prix_vente"] != 0 ? number_format($total['total'],2,'.', '').'<span style="font-size: 10px;"> DH</span>' : "Gratuit"?></td>
            </tr>
        <?php endforeach; ?>
        <tr class="th">
            <td colspan="5"><strong style="font-size: 14px;">Total HT</strong></td>
            <td><strong style="font-size: 14px;"><?=number_format($montant_total_out,2, '.', ' ')?></strong> DH</td>
        </tr>
        <tr class="th">
            <td colspan="5"><strong style="font-size: 14px;">TVA à <?=$avoir->tva?>%</strong></td>
            <td><strong style="font-size: 14px;"><?=number_format($montant_total_out*$avoir->tva/100,2, '.', ' ')?></strong> DH</td>
        </tr>
        <tr class="th">
            <td colspan="5"><strong style="font-size: 14px;">Total TTC</strong></td>
            <td><strong style="font-size: 14px;"><?=number_format($montant_total_out+($montant_total_out*$avoir->tva/100),2, '.', ' ')?></strong> DH</td>
        </tr>
    </table>
    <?php endif; ?>
    <table class="table" style="width: 100%; margin-top: 20px;">
        <tr class="th" style="background-color: #cdcdcd;">
            <?php
            $regelement = ($montant_total_out+($montant_total_out*$avoir->tva/100)) - ($montant_total_in+($montant_total_in*$avoir->tva/100));
            ?>
            <td style="width: 50%;"><strong style="font-size: 14px;"><?=$regelement >= 0 ? "Montant à payé" : "Réglement"?></strong></td>
            <td><strong style="font-size: 14px;"><?=number_format($regelement,2, '.', ' ')?></strong> DH</td>
        </tr>
    </table>
    <?php if($regelement > 0): ?>
        <table style="width: 100%; margin-top: 15px;">
            <tr>
                <td style="width: 50%;"></td>
                <td style="width: 50%;">
                    <div style="width: 100%; border: 1px solid black; font-size: 14px; padding: 8px; background-color: #cdcdcd;">
                        <table style="width: 100%;">
                            <tr>
                                <td style="white-space: nowrap; width: 1px; vertical-align: top;"> &nbsp; Paiement</td>
                                <td style="white-space: nowrap; width: 1px; vertical-align: top;">&nbsp; : &nbsp;&nbsp;</td>
                                <td>
                                    <?php
                                        if(!empty($paiements)):
                                            foreach ($paiements as $val) {
                                                echo '<strong>'.number_format($val["montant"], 2, ".", " ").'</strong>'
                                                    . ' <span style="font-size: 10px;">DH</span>'
                                                    . ' &nbsp; <span style="font-size: 12px;">( '.getMethodePaiement($val["methode"]).' )</span><br>';
                                            }
                                    ?>
                                    <?php else: ?>
                                        <strong>0.00</strong> <span style="font-size: 10px;">DH</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="white-space: nowrap; width: 1px;"> &nbsp; Reste</td>
                                <td style="white-space: nowrap; width: 1px;">&nbsp; : &nbsp;&nbsp;</td>
                                <td><strong><?=number_format($total_avoir["total_reste"], 2, ".", " ")?></strong> <span style="font-size: 10px;">DH</span></td>
                            </tr>
                            <?php if(_ENABLE_DROITS_TIMBRE_ && round($total_avoir["droit_timbre"], 2) > 0): ?>
                                <tr>
                                    <td colspan="3" style="padding-top: 5px;">
                                        &nbsp; <span style="font-size: 10px;">( Droit de timbre : <b><?=number_format($total_avoir["droit_timbre"],2, '.', ' ')?></b> <span style="font-size: 9px;">DH</span> )</span>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
    <?php endif; ?>
    <?php if(!empty($info->print_message)): ?>
        <div style="width: 100%; border: 1px solid black; margin-top: 30px; padding: 8px; background-color: #cdcdcd;">
            <span style="font-size: 12px;"><?=$info->print_message?></span>
        </div>
    <?php endif; ?>
</main>

</body>
</html>