<div class="row">
    <div class="col-md-12">
        <div class="box box-default box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Période</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <form method="get" action="<?=base_url()."index.php/admin/users_details"?>">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Entre Le :</label>
                                <input type="date" class="form-control" name="date_debut" value="<?=date("Y-m-d", strtotime($date_debut))?>" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Et Le :</label>
                                <input type="date" class="form-control" name="date_fin" value="<?=date("Y-m-d", strtotime($date_fin))?>" required>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Commercial :</label>
                                <select class="form-control select2" name="user" id="user" required>
                                    <?php foreach ($users as $val): ?>
                                        <option value="<?=$val["id_user"]?>">
                                            <?=$val["full_name"]?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <button class="btn btn-primary" style="width:100%">
                                <i class="fa fa-search"></i> &nbsp; Filtrer
                            </button>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="callout callout-success">
            <h5 style="margin: 0px;">Nombre de Ventes :</h5>
            <?php $count_ventes = count($ventes); ?>
            <h3 style="margin: 10px 0px 0px 0px;"><?=!empty($user) ? $count_ventes : "..."?></h3>
            <br>
            <h5 style="margin: 0px;">Total de Ventes :</h5>
            <h2 id="total_ventes" style="margin: 10px 0px 0px 0px;"><?=!empty($user) ? "" : "..."?></h2>
        </div>
    </div>
    <div class="col-md-6">
        <div class="callout callout-warning">
            <h5 style="margin: 0px;">Nombre de Bons d'Avoir :</h5>
            <?php $count_avoirs = count($avoirs); ?>
            <h3 style="margin: 10px 0px 0px 0px;"><?=!empty($user) ? $count_avoirs : "..."?></h3>
            <br>
            <h5 style="margin: 0px;">Total de Bons d'Avoir :</h5>
            <h2 id="total_avoirs" style="margin: 10px 0px 0px 0px;"><?=!empty($user) ? "" : "..."?></h2>
        </div>
    </div>
</div>
<?php
    $count = count($paiements_clients)+count($paiements_achats_reglements)+count($charges)+count($c_entrees)+count($c_sorties);
    if($count > 0):
?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default box-solid collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Historique de Paiements et Réglements (<b><?=$count?></b>)</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body" style="padding-top: 3px; display: none;">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="export_btns_1" style="float: right;margin: 8px 0px 12px 0px;"></div><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table id="myDataTable_1" class="table myDataTable table-bordered table-striped">
                                <thead>
                                <th>Date</th>
                                <th>Montant</th>
                                <th>Mode de Paiement</th>
                                <th>Origine</th>
                                <th>Détails</th>
                                </thead>
                                <tbody>
                                <?php
                                    foreach ($paiements_clients as $val):
                                        $cheque = null;
                                        if($val["methode"] == 2 || $val["methode"] == 3) {
                                            $cheque = getPaiementDetails($val["id_paiement"]);
                                        }
                                ?>
                                    <tr>
                                        <td data-sort="<?=strtotime($val["date_paiement"])?>"><?=date("d/m/Y", strtotime($val["date_paiement"]))?></td>
                                        <td data-sort="<?=round($val["montant"],2)?>"><strong><?=number_format($val["montant"],2,'.',' ')?></strong> <small>DH</small></td>
                                        <td>
                                            <?=getMethodePaiement($val["methode"], $val["type_avance"])?>
                                            
                                            <?php if($val["methode"] == 2 || $val["methode"] == 3): ?>
                                                <br> [ <?=$cheque->reference." &nbsp-&nbsp ".date("d/m/Y", strtotime($cheque->date_cheque))?> ]
                                                <?=$cheque->type == 1 ? getChequeStatus($cheque->paid) : ""?>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if(!empty($val["id_vente"])): ?>
                                                <a href="<?=base_url()."index.php/vente/details/".$val["id_vente"]?>"><strong><?=$val["code_vente"]?></strong></a> <br>( Vente )
                                            <?php elseif(!empty($val["id_avoir"])): ?>
                                                <a href="<?=base_url()."index.php/avoir/details/".$val["id_avoir"]?>"><strong><?=$val["code_avoir"]?></strong></a> <br>( Bon d'Avoir )
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if(!empty($val["id_client_vente"])): ?>
                                                <a href="<?=base_url()."index.php/client/details/".$val["id_client_vente"]?>"><strong><?=$val["client_vente"]?></strong></a>
                                            <?php elseif(!empty($val["id_client_avoir"])): ?>
                                                <a href="<?=base_url()."index.php/client/details/".$val["id_client_avoir"]?>"><strong><?=$val["client_avoir"]?></strong></a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php foreach ($paiements_achats_reglements as $val): ?>
                                    <tr>
                                        <td data-sort="<?=strtotime($val["date_paiement"])?>"><?=date("d/m/Y", strtotime($val["date_paiement"]))?></td>
                                        <td data-sort="<?=round($val["montant"],2)?>"><strong><?=number_format($val["montant"],2,'.',' ')?></strong> <small>DH</small></td>
                                        <td><?=getMethodePaiement($val["methode"])?></td>
                                        <td>
                                            <?php if(!empty($val["id_achat"])): ?>
                                                <a href="<?=base_url()."index.php/achat/details/".$val["id_achat"]?>"><strong><?=$val["code_achat"]?></strong></a> <br>( Achat )
                                            <?php elseif(!empty($val["id_avoir"])): ?>
                                                <a href="<?=base_url()."index.php/avoir/details/".$val["id_avoir"]?>"><strong><?=$val["code_avoir"]?></strong></a> <br>( Bon d'Avoir )
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if(!empty($val["id_fournisseur"])): ?>
                                                <a href="<?=base_url()."index.php/fournisseur/details/".$val["id_fournisseur"]?>"><strong><?=$val["fournisseur"]?></strong></a>
                                            <?php elseif(!empty($val["id_client_avoir"])): ?>
                                                <a href="<?=base_url()."index.php/client/details/".$val["id_client_avoir"]?>"><strong><?=$val["client_avoir"]?></strong></a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php foreach ($charges as $val): ?>
                                    <tr>
                                        <td data-sort="<?=strtotime($val["date_charge"])?>"><?=date("d/m/Y", strtotime($val["date_charge"]))?></td>
                                        <td data-sort="<?=round($val["montant"],2)?>"><strong><?=number_format($val["montant"],2,'.',' ')?></strong> <small>DH</small></td>
                                        <td><?=getMethodePaiement($val["methode"])?></td>
                                        <td>( Charge )</td>
                                        <td><?=$val["description"]?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php foreach ($c_entrees as $val): ?>
                                    <tr>
                                        <td data-sort="<?=strtotime($val["date_entree"])?>"><strong><?=date("d/m/Y", strtotime($val["date_entree"]))?></strong></td>
                                        <td data-sort="<?=round($val["montant"],2)?>"><strong><?=number_format($val["montant"],2,'.',' ')?></strong> <small>DH</small></td>
                                        <td><strong><?=getMethodePaiement(1)?></strong></td>
                                        <td>( <strong>Entrée de Caisse</strong> )</td>
                                        <td><strong><?=$val["description"]?></strong></td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php foreach ($c_sorties as $val): ?>
                                    <tr>
                                        <td data-sort="<?=strtotime($val["date_sortie"])?>"><strong><?=date("d/m/Y", strtotime($val["date_sortie"]))?></strong></td>
                                        <td data-sort="<?=round($val["montant"],2)?>"><strong><?=number_format($val["montant"],2,'.',' ')?></strong> <small>DH</small></td>
                                        <td><strong><?=getMethodePaiement(1)?></strong></td>
                                        <td>( <strong>Sortie de Caisse</strong> )</td>
                                        <td><strong><?=$val["description"]?></strong></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php
    $count = count($avances) + count($avances_r);
    if($count > 0):
?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default box-solid collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Historique d'Avances (<b><?=$count?></b>)</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body" style="padding-top: 3px; display: none;">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="export_btns_4" style="float: right;margin: 8px 0px 12px 0px;"></div><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table id="myDataTable_4" class="table myDataTable table-bordered table-striped">
                                <thead>
                                <th>Date</th>
                                <th>Client</th>
                                <th>Montant</th>
                                <th>Mode de Paiement</th>
                                <th>Description</th>
                                </thead>
                                <tbody>
                                <?php foreach ($avances as $val): ?>
                                    <tr>
                                        <td data-sort="<?=strtotime($val["date_avance"])?>"><?=date("d/m/Y", strtotime($val["date_avance"]))?></td>
                                        <td><a href="<?=base_url()."index.php/client/details/".$val["id_client"]?>"><strong><?=$val["client"]?></strong></a></td>
                                        <td data-sort="<?=round($val["montant"],2)?>">
                                            <strong><?=number_format($val["montant"],2,'.',' ')?></strong> <small>DH</small>
                                            <br> <span class="text-primary">( Avance )</span>
                                        </td>
                                        <td>
                                            <?=getMethodePaiement($val["methode"])?>
                                            <?php
                                            if($val["methode"] == 2 || $val["methode"] == 3):
                                                $cheque = getPaiementDetails($val["id_avance"], "avance");
                                                ?>
                                                <br> [ <?=$cheque->reference." &nbsp-&nbsp ".date("d/m/Y", strtotime($cheque->date_cheque))?> ]
                                                <?=getChequeStatus($cheque->paid)?>
                                            <?php endif; ?>
                                        </td>
                                        <td><?=$val["description"]?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php foreach ($avances_r as $val): ?>
                                    <tr>
                                        <td data-sort="<?=strtotime($val["date_retour"])?>"><?=date("d/m/Y", strtotime($val["date_retour"]))?></td>
                                        <td><a href="<?=base_url()."index.php/client/details/".$val["id_client"]?>"><strong><?=$val["client"]?></strong></a></td>
                                        <td data-sort="<?=round($val["montant"],2)?>">
                                            <strong><?=number_format($val["montant"],2,'.',' ')?></strong> <small>DH</small>
                                            <br> <span class="text-primary">( Retour d'Avance )</span>
                                        </td>
                                        <td>
                                            <?=getMethodePaiement($val["methode"], $val["type_avance"])?>
                                            <?php
                                            if($val["methode"] == 2 || $val["methode"] == 3):
                                                $cheque = getPaiementDetails($val["id_avance"], "avance");
                                                ?>
                                                <br> [ <?=$cheque->reference." &nbsp-&nbsp ".date("d/m/Y", strtotime($cheque->date_cheque))?> ]
                                            <?php endif; ?>
                                        </td>
                                        <td><?=$val["description"]?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php
    $total_ventes = 0;
    if($count_ventes > 0):
?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default box-solid collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Historique de Ventes (<b><?=$count_ventes?></b>)</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body" style="padding-top: 3px; display: none;">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="export_btns_6" style="float: right;margin: 8px 0px 12px 0px;"></div><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table id="myDataTable_6" class="table myDataTable table-bordered table-striped">
                                <thead>
                                <th>N° de BL</th>
                                <th>Client</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Reste à payé</th>
                                </thead>
                                <tbody>
                                <?php
                                    foreach ($ventes as $val):
                                        $total = getVenteTotal($val["id_vente"]);
                                        $total_ventes += $total["total_vente"];
                                ?>
                                    <tr>
                                        <td><a href="<?=base_url()."index.php/vente/details/".$val["id_vente"]?>"><strong><?=$val["code_vente"]?></strong></a></td>
                                        <td><a href="<?=base_url()."index.php/client/details/".$val["id_client"]?>"><strong><?=$val["client"]?></strong></a></td>
                                        <td data-sort="<?=strtotime($val["date_vente"])?>"><?=date("d/m/Y", strtotime($val["date_vente"]))?></td>
                                        <td data-sort="<?=round($total["total_vente"],2)?>"><strong><?=number_format($total["total_vente"],2,'.',' ')?></strong> <small>DH</small></td>
                                        <?php
                                            $color = $total["total_reste"] > 0 ? "text-danger" : "";
                                            $icon = $total["total_reste"] < 0 ? ' &nbsp; <i class="fa fa-warning text-red"></i>' : '';
                                        ?>
                                        <td data-sort="<?=round($total["total_reste"],2)?>">
                                            <strong class="<?=$color?>"><?=number_format($total["total_reste"],2,'.',' ')?></strong> <small>DH</small> <?=$icon?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php
    $total_avoirs = 0;
    if($count_avoirs > 0):
?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default box-solid collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Historique de Bons d'Avoir (<b><?=$count_avoirs?></b>)</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body" style="padding-top: 3px; display: none;">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="export_btns_7" style="float: right;margin: 8px 0px 12px 0px;"></div><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table id="myDataTable_7" class="table myDataTable table-bordered table-striped">
                                <thead>
                                <th>N° de BA</th>
                                <th>Client</th>
                                <th>Vente</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Reste</th>
                                </thead>
                                <tbody>
                                <?php
                                    foreach ($avoirs as $val):
                                        $total = getAvoirTotal($val["id_avoir"]);
                                        $total_avoirs += $total["total_avoir"];
                                ?>
                                    <tr>
                                        <td><a href="<?=base_url()."index.php/avoir/details/".$val["id_avoir"]?>"><strong><?=$val["code_avoir"]?></strong></a></td>
                                        <td><a href="<?=base_url()."index.php/client/details/".$val["id_client"]?>"><strong><?=$val["client"]?></strong></a></td>
                                        <td>
                                            <?php if(!empty($val["id_vente"])): ?>
                                                <a href="<?=base_url()?>index.php/vente/details/<?=$val["id_vente"]?>"><strong><?=$this->db->where("id_vente", $val["id_vente"])->get("vente")->row()->code_vente?></strong></a>
                                            <?php else: ?>
                                                <i class="fa fa-times text-warning"></i>
                                            <?php endif; ?>
                                        </td>
                                        <td data-sort="<?=strtotime($val["date_avoir"])?>"><?=date("d/m/Y", strtotime($val["date_avoir"]))?></td>
                                        <td data-sort="<?=round($total["total_avoir"],2)?>"><strong><?=number_format($total["total_avoir"],2,'.',' ')?></strong> <small>DH</small></td>
                                        <?php
                                        $color = $total["total_reste"] > 0 ? "text-danger" : "";
                                        ?>
                                        <td data-sort="<?=round($total["total_reste"],2)?>">
                                            <strong class="<?=$color?>"><?=number_format($total["total_reste"],2,'.',' ')?></strong> <small>DH</small>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php
    $count = count($achats);
    if($count > 0):
?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default box-solid collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Historique d'Achats (<b><?=$count?></b>)</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body" style="padding-top: 3px; display: none;">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="export_btns_8" style="float: right;margin: 8px 0px 12px 0px;"></div><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table id="myDataTable_8" class="table myDataTable table-bordered table-striped">
                                <thead>
                                <th>Code</th>
                                <th>Fournisseur</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Reste à payé</th>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($achats as $val):
                                    $total = getAchatTotal($val["id_achat"]);
                                    ?>
                                    <tr>
                                        <td><a href="<?=base_url()."index.php/achat/details/".$val["id_achat"]?>"><strong><?=$val["code_achat"]?></strong></a></td>
                                        <td><a href="<?=base_url()."index.php/fournisseur/details/".$val["id_fournisseur"]?>"><strong><?=$val["fournisseur"]?></strong></a></td>
                                        <td data-sort="<?=strtotime($val["date_achat"])?>"><?=date("d/m/Y", strtotime($val["date_achat"]))?></td>
                                        <td data-sort="<?=round($total["total_achat"],2)?>"><strong><?=number_format($total["total_achat"],2,'.',' ')?></strong> <small>DH</small></td>
                                        <?php
                                        $color = $total["total_reste"] > 0 ? "text-danger" : "";
                                        $icon = $total["total_reste"] < 0 ? ' &nbsp; <i class="fa fa-warning text-red"></i>' : '';
                                        ?>
                                        <td data-sort="<?=round($total["total_reste"],2)?>">
                                            <strong class="<?=$color?>"><?=number_format($total["total_reste"],2,'.',' ')?></strong> <small>DH</small> <?=$icon?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php
    $count = count($productions);
    if($count > 0):
?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default box-solid collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Historique de Productions (<b><?=$count?></b>)</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body" style="padding-top: 3px; display: none;">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="export_btns_9" style="float: right;margin: 8px 0px 12px 0px;"></div><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table id="myDataTable_9" class="table myDataTable table-bordered table-striped">
                                <thead>
                                <th>Code</th>
                                <th>Date</th>
                                <th>Produit</th>
                                <th>Catégorie</th>
                                <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                    <th>Sous-Catégorie</th>
                                <?php endif; ?>
                                <th>Quantite</th>
                                </thead>
                                <tbody>
                                <?php foreach ($productions as $val): ?>
                                    <tr>
                                        <td><?=$val["code_production"]?></td>
                                        <td data-sort="<?=strtotime($val["date_production"])?>"><?=date("d/m/Y", strtotime($val["date_production"]))?></td>
                                        <td><?=$val["produit"]?></td>
                                        <td><?=$val["categorie"]?></td>
                                        <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                            <td><?=$val["sub_categorie"]?></td>
                                        <?php endif; ?>
                                        <td><strong><?=$val["quantite"]?></strong></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php
    $count = count($demontages);
    if($count > 0):
?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default box-solid collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Historique de Démontages (<b><?=$count?></b>)</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body" style="padding-top: 3px; display: none;">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="export_btns_10" style="float: right;margin: 8px 0px 12px 0px;"></div><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table id="myDataTable_10" class="table myDataTable table-bordered table-striped">
                                <thead>
                                <th>Code</th>
                                <th>Date</th>
                                <th>Produit</th>
                                <th>Catégorie</th>
                                <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                    <th>Sous-Catégorie</th>
                                <?php endif; ?>
                                <th>Quantite</th>
                                </thead>
                                <tbody>
                                <?php foreach ($demontages as $val): ?>
                                    <tr>
                                        <td><?=$val["code_demontage"]?></td>
                                        <td data-sort="<?=strtotime($val["date_demontage"])?>"><?=date("d/m/Y", strtotime($val["date_demontage"]))?></td>
                                        <td><?=$val["produit"]?></td>
                                        <td><?=$val["categorie"]?></td>
                                        <?php if(_ENABLE_SUB_CATEGORIE_): ?>
                                            <td><?=$val["sub_categorie"]?></td>
                                        <?php endif; ?>
                                        <td><strong><?=$val["quantite"]?></strong></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php
    $count = count($clients_cmds);
    if($count > 0):
?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default box-solid collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Historique de Commandes de clients (<b><?=$count?></b>)</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body" style="padding-top: 3px; display: none;">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="export_btns_11" style="float: right;margin: 8px 0px 12px 0px;"></div><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table id="myDataTable_11" class="table myDataTable table-bordered table-striped">
                                <thead>
                                <th>Code</th>
                                <th>Client</th>
                                <th>Date</th>
                                <th>Produits</th>
                                <th>Vente</th>
                                </thead>
                                <tbody>
                                <?php foreach ($clients_cmds as $val): ?>
                                    <tr>
                                        <td><?=$val["code_client_cmd"]?></td>
                                        <td><a href="<?=base_url()."index.php/client/details/".$val["id_client"]?>"><strong><?=$val["client"]?></strong></a></td>
                                        <td data-sort="<?=strtotime($val["date_client_cmd"])?>"><?=date("d/m/Y", strtotime($val["date_client_cmd"]))?></td>
                                        <td><?=$val["produits"]?></td>
                                        <td>
                                            <?php if(empty($val["id_vente"])): ?>
                                                <i class="fa fa-times text-warning"></i>
                                            <?php else: ?>
                                                <a href="<?=base_url()?>index.php/vente/details/<?=$val["id_vente"]?>"><strong><?=$val["code_vente"]?></strong></a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php
    $count = count($commandes);
    if($count > 0):
?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default box-solid collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Historique de Commandes de Fournisseurs (<b><?=$count?></b>)</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body" style="padding-top: 3px; display: none;">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="export_btns_12" style="float: right;margin: 8px 0px 12px 0px;"></div><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table id="myDataTable_12" class="table myDataTable table-bordered table-striped">
                                <thead>
                                <th>Code</th>
                                <th>Fournisseur</th>
                                <th>Date</th>
                                <th>Produits</th>
                                <th>Achat</th>
                                </thead>
                                <tbody>
                                <?php foreach ($commandes as $val): ?>
                                    <tr>
                                        <td><?=$val["code_commande"]?></td>
                                        <td><a href="<?=base_url()."index.php/fournisseur/details/".$val["id_fournisseur"]?>"><strong><?=$val["fournisseur"]?></strong></a></td>
                                        <td data-sort="<?=strtotime($val["date_commande"])?>"><?=date("d/m/Y", strtotime($val["date_commande"]))?></td>
                                        <td><?=$val["produits"]?></td>
                                        <td>
                                            <?php if(empty($val["id_achat"])): ?>
                                                <i class="fa fa-times text-warning"></i>
                                            <?php else: ?>
                                                <a href="<?=base_url()?>index.php/achat/details/<?=$val["id_achat"]?>"><strong><?=$val["code_achat"]?></strong></a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php
    $count = count($produits_end);
    if($count > 0):
?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default box-solid collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Historique de Produits Endommagés (<b><?=$count?></b>)</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body" style="padding-top: 3px; display: none;">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="export_btns_13" style="float: right;margin: 8px 0px 12px 0px;"></div><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table id="myDataTable_13" class="table myDataTable table-bordered table-striped">
                                <thead>
                                <th>Date</th>
                                <th>Code</th>
                                <th>Produit</th>
                                <th>Catégorie</th>
                                <th>Q. Endommagé</th>
                                <th>Description</th>
                                </thead>
                                <tbody>
                                <?php foreach ($produits_end as $val): ?>
                                    <tr>
                                        <td data-sort="<?=strtotime($val["date"])?>"><?=date("d/m/Y", strtotime($val["date"]))?></td>
                                        <td><a href="<?=base_url()."index.php/produit/details/".$val["id_produit"]?>" rel="popover" data-img="<?=$val["image"]?>"><strong><?=$val["code_produit"]?></strong></a></td>
                                        <td>
                                            <a href="<?=base_url()."index.php/produit/details/".$val["id_produit"]?>" rel="popover" data-img="<?=$val["image"]?>"><strong><?=$val["produit"]?></strong></a>
                                            <?=$val["type"]==1 ? "<br><small class='text-info'><b>[ COMPOSE ]</b></small>" : "";?>
                                        </td>
                                        <td><a href="<?=base_url()."index.php/categorie/details/".$val["id_categorie"]?>"><strong><?=$val["categorie"]?></strong></a></td>
                                        <td><?=$val["quantite"]?></td>
                                        <td><?=$val["description"]?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php
    $count = count($inventaires);
    if($count > 0):
?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default box-solid collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Historique d'Inventaires (<b><?=$count?></b>)</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body" style="padding-top: 3px; display: none;">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="export_btns_14" style="float: right;margin: 8px 0px 12px 0px;"></div><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table id="myDataTable_14" class="table myDataTable table-bordered table-striped">
                                <thead>
                                <th>Code</th>
                                <th>Date</th>
                                <th>Remarque</th>
                                <th>Statut</th>
                                </thead>
                                <tbody>
                                <?php foreach ($inventaires as $val): ?>
                                    <tr>
                                        <td><?=$val["code_inventaire"]?></td>
                                        <td data-sort="<?=strtotime($val["date_inventaire"])?>"><?=date("d/m/Y", strtotime($val["date_inventaire"]))?></td>
                                        <td><?=$val["remarque"]?></td>
                                        <td>
                                            <?php if($val["valide"] == 1): ?>
                                                <span class="label label-success" data-toggle="tooltip" data-placement="top" title="Valide">Validé</span>
                                            <?php else: ?>
                                                <span class="label label-danger" data-toggle="tooltip" data-placement="top" title="En cours ...">En cours ...</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<script type="text/javascript">
    $(document).ready(function () {

        <?php if(!empty($user)): ?>
        $("#total_ventes").html('<?=number_format($total_ventes, 2, '.', ' ')?> <small style="color: white;">DH</small>');
        $("#total_avoirs").html('<?=number_format($total_avoirs, 2, '.', ' ')?> <small style="color: white;">DH</small>');
        <?php endif; ?>

        $('#user').select2({
            placeholder: "Selectionner un Commercial",
        });
        $('#user').val('<?=$user?>').trigger("change");
        $("[aria-labelledby='select2-user-container']").css("border", "2px solid #367fa9");

        <?php if(!empty($paiements_clients) || !empty($paiements_achats_reglements) || !empty($charges) || !empty($c_entrees) || !empty($c_sorties)): ?>
        createDataTable(
            "#myDataTable_1",
            [ 0, "desc" ],
            [ [10, 50, 100, -1], [10, 50, 100, "Tous"] ],
            "#export_btns_1"
        );
        <?php endif; ?>

        <?php if(!empty($c_entrees)): ?>
        createDataTable(
            "#myDataTable_2",
            [ 0, "desc" ],
            [ [10, 50, 100, -1], [10, 50, 100, "Tous"] ],
            "#export_btns_2"
        );
        <?php endif; ?>

        <?php if(!empty($c_sorties)): ?>
        createDataTable(
            "#myDataTable_3",
            [ 0, "desc" ],
            [ [10, 50, 100, -1], [10, 50, 100, "Tous"] ],
            "#export_btns_3"
        );
        <?php endif; ?>

        <?php if(!empty($avances)): ?>
        createDataTable(
            "#myDataTable_4",
            [ 0, "desc" ],
            [ [10, 50, 100, -1], [10, 50, 100, "Tous"] ],
            "#export_btns_4"
        );
        <?php endif; ?>

        <?php if(!empty($charges)): ?>
        createDataTable(
            "#myDataTable_5",
            [ 0, "desc" ],
            [ [10, 50, 100, -1], [10, 50, 100, "Tous"] ],
            "#export_btns_5"
        );
        <?php endif; ?>

        <?php if(!empty($ventes)): ?>
        createDataTable(
            "#myDataTable_6",
            [ [ 3, "desc" ], [ 0, "desc" ] ],
            [ [10, 50, 100, -1], [10, 50, 100, "Tous"] ],
            "#export_btns_6"
        );
        <?php endif; ?>

        <?php if(!empty($avoirs)): ?>
        createDataTable(
            "#myDataTable_7",
            [ [ 3, "desc" ], [ 0, "desc" ] ],
            [ [10, 50, 100, -1], [10, 50, 100, "Tous"] ],
            "#export_btns_7"
        );
        <?php endif; ?>

        <?php if(!empty($achats)): ?>
        createDataTable(
            "#myDataTable_8",
            [ [ 3, "desc" ], [ 0, "desc" ] ],
            [ [10, 50, 100, -1], [10, 50, 100, "Tous"] ],
            "#export_btns_8"
        );
        <?php endif; ?>

        <?php if(!empty($productions)): ?>
        createDataTable(
            "#myDataTable_9",
            [ 0, "desc" ],
            [ [10, 50, 100, -1], [10, 50, 100, "Tous"] ],
            "#export_btns_9"
        );
        <?php endif; ?>

        <?php if(!empty($demontages)): ?>
        createDataTable(
            "#myDataTable_10",
            [ 0, "desc" ],
            [ [10, 50, 100, -1], [10, 50, 100, "Tous"] ],
            "#export_btns_10"
        );
        <?php endif; ?>

        <?php if(!empty($clients_cmds)): ?>
        createDataTable(
            "#myDataTable_11",
            [ 0, "desc" ],
            [ [10, 50, 100, -1], [10, 50, 100, "Tous"] ],
            "#export_btns_11"
        );
        <?php endif; ?>

        <?php if(!empty($commandes)): ?>
        createDataTable(
            "#myDataTable_12",
            [ 0, "desc" ],
            [ [10, 50, 100, -1], [10, 50, 100, "Tous"] ],
            "#export_btns_12"
        );
        <?php endif; ?>

        <?php if(!empty($produits_end)): ?>
        createDataTable(
            "#myDataTable_13",
            [ 0, "desc" ],
            [ [10, 50, 100, -1], [10, 50, 100, "Tous"] ],
            "#export_btns_13"
        );
        <?php endif; ?>

        <?php if(!empty($inventaires)): ?>
        createDataTable(
            "#myDataTable_14",
            [ [ 1, "desc" ], [ 0, "desc" ] ],
            [ [10, 50, 100, -1], [10, 50, 100, "Tous"] ],
            "#export_btns_14"
        );
        <?php endif; ?>

    });
</script>