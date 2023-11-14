<html>
<head>
    <title>BON D'ACHAT - <?=$achat->code_achat?></title>
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
            <td style="width: 35%; text-align: center;"><div class="title" style="width: 200px; margin-top: 60px; background-color: #cdcdcd; font-family: Arial, Helvetica, sans-serif;">BON D'ACHAT</div></td>
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
                            <td style="white-space: nowrap; width: 1px;">Code d'Achat</td>
                            <td style="white-space: nowrap; width: 1px;">&nbsp; : &nbsp;</td>
                            <td style="font-weight: 600;"><?=$achat->code_achat?></td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap; width: 1px;">Date achat</td>
                            <td style="white-space: nowrap; width: 1px;">&nbsp; : &nbsp;</td>
                            <td style="font-weight: 600;"><?=date("d/m/Y", strtotime($achat->date_achat))?></td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap; width: 1px;">N° de Facture</td>
                            <td style="white-space: nowrap; width: 1px;">&nbsp; : &nbsp;</td>
                            <td style="font-weight: 600;"><?=$achat->num_facture?></td>
                        </tr>
                    </table>
                </div>
            </td>
            <td style="width: 5% !important;"><br></td>
            <td style="width: 55% !important; vertical-align: top;">
                <div style="width: 100%; border: 2px solid black; padding: 10px; font-size: 14px;">
                    <table style="width: 100%;">
                        <tr>
                            <td style="white-space: nowrap; width: 1px; vertical-align: top;">Fournisseur</td>
                            <td style="white-space: nowrap; width: 1px; vertical-align: top;">&nbsp; : &nbsp;</td>
                            <td style="font-weight: 600; vertical-align: top;"><?=$adresse->full_name?></td>
                        </tr>
                        <?php
                            $fournisseur = $this->db->query("SELECT ice FROM fournisseur WHERE id_fournisseur = ".$achat->id_fournisseur)->row();
                            if(!empty($fournisseur->ice)):
                        ?>
                            <tr>
                                <td style="white-space: nowrap; width: 1px; vertical-align: top;">ICE</td>
                                <td style="white-space: nowrap; width: 1px; vertical-align: top;">&nbsp; : &nbsp;</td>
                                <td style="font-weight: 600; vertical-align: top;"><?=$fournisseur->ice?></td>
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
    <table class="table" style="width: 100%; margin-top: 20px;">
        <tr>
            <th style="width: 5%;">#</th>
            <th style="width: 52%;">Produit</th>
            <th style="width: 15%;">P. Unitaire</th>
            <th style="width: 10%;">Quantité</th>
            <th style="width: 18%;">P. Total</th>
        </tr>
        <?php

        $total_achat = getAchatTotal($achat->id_achat);

        $nbr = 1;
        $prix_total = 0;
        foreach ($achat_details as $val):
            $prix_total += $val["prix_achat"]*$val["quantite"];

            $tr_classe = $nbr < count($achat_details) ? "whiteBB" : "";
            $td_classe = "";
            if($nbr == 1 && $nbr == count($achat_details)) { $td_classe .= " pushFirst "; }
            else
            {
                if($nbr == 1) { $td_classe .= " pushTop "; }
                if($nbr == count($achat_details)) { $td_classe .= " pushBottom "; }
                if($nbr != 1 && $nbr != count($achat_details)) { $td_classe .= " pushNormal "; }
            }
            ?>
            <tr class="<?=$tr_classe?>">
                <td class="<?=$td_classe?>" style="width: 5%;"><?=$nbr++?></td>
                <td class="<?=$td_classe?>" style="width: 52%;"><?=$val["produit"]?></td>
                <?php $prix_achat = $val["prix_achat"] * 1 / (1 + ($achat->tva / 100));?>
                <td class="<?=$td_classe?>" style="width: 15%;"><?=$prix_achat == 0 ? "Gratuit" : number_format($prix_achat,2,'.', ' ')." <span style='font-size: 10px;'>DH</span>"?> </td>
                <td class="<?=$td_classe?>" style="width: 10%;"><?=$val["quantite"]?></td>
                <td class="<?=$td_classe?>" style="width: 18%;"><?=number_format($prix_achat*$val["quantite"],2,'.', ' ')?> <span style="font-size: 10px;">DH</span></td>
            </tr>
        <?php endforeach; ?>
        <tr class="th">
            <td colspan="4"><strong style="font-size: 14px;">Total HT</strong></td>
            <td><strong style="font-size: 14px;"><?=number_format($total_achat['total_achat_ht'],2, '.', ' ')?></strong> <span style="font-size: 10px;">DH</span></td>
        </tr>
        <tr class="th">
            <td colspan="4"><strong style="font-size: 14px;">TVA à <?=$achat->tva?>%</strong> &nbsp; <?=$achat->tva == 0 ? "( Exonération de la TVA )" : ""?></td>
            <td><strong style="font-size: 14px;"><?=number_format($total_achat["total_tva"],2, '.', ' ')?></strong> <span style="font-size: 10px;">DH</span></td>
        </tr>
        <tr class="th" style="background-color: #cdcdcd;">
            <td colspan="4"><strong style="font-size: 14px;">Total TTC</strong></td>
            <td><strong style="font-size: 14px;"><?=number_format($total_achat["total_achat"],2, '.', ' ')?></strong> <span style="font-size: 10px;">DH</span></td>
        </tr>
    </table>
</main>

</body>
</html>