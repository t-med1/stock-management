 <div class="row">
    <div class="col-md-8">
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
                        <form method="get" action="<?=base_url()."index.php/caisse"?>">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Entre Le :</label>
                                        <input type="date" class="form-control" name="date_debut" value="<?=date("Y-m-d", strtotime($date_debut))?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Et Le :</label>
                                        <input type="date" class="form-control" name="date_fin" value="<?=date("Y-m-d", strtotime($date_fin))?>" required>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <button class="btn btn-primary" style="width:100%">
                                        <i class="fa fa-search"></i> &nbsp; Filtrer
                                    </button>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Historique d'entrée / sortie de caisse</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="export_btns" style="float: right;margin: 8px 0px 12px 0px;"></div><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table id="myDataTable" class="table myDataTable table-bordered table-striped">
                                    <thead>
                                    <th>Date</th>
                                    <th>Commercial</th>
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
                                                if($cheque->paid != 1 || $cheque->caisse != 1) {
                                                    continue;
                                                }
                                            }
                                    ?>
                                        <tr class="success">
                                            <td data-sort="<?=strtotime($val["date_paiement"])?>"><?=date("d/m/Y", strtotime($val["date_paiement"]))?></td>
                                            <td><?=getUserLabel($val["role"], $val["utilisateur"])?></td>
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
                                        <tr class="danger">
                                            <td data-sort="<?=strtotime($val["date_paiement"])?>"><?=date("d/m/Y", strtotime($val["date_paiement"]))?></td>
                                            <td><?=getUserLabel($val["role"], $val["utilisateur"])?></td>
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
                                        <tr class="danger">
                                            <td data-sort="<?=strtotime($val["date_charge"])?>"><?=date("d/m/Y", strtotime($val["date_charge"]))?></td>
                                            <td><?=getUserLabel($val["role"], $val["utilisateur"])?></td>
                                            <td data-sort="<?=round($val["montant"],2)?>"><strong><?=number_format($val["montant"],2,'.',' ')?></strong> <small>DH</small></td>
                                            <td><?=getMethodePaiement($val["methode"])?></td>
                                            <td>( Charge )</td>
                                            <td><?=$val["description"]?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <?php foreach ($caisse_entrees as $val): ?>
                                        <tr class="success">
                                            <td data-sort="<?=strtotime($val["date_entree"])?>"><strong><?=date("d/m/Y", strtotime($val["date_entree"]))?></strong></td>
                                            <td><?=getUserLabel($val["role"], $val["utilisateur"])?></td>
                                            <td data-sort="<?=round($val["montant"],2)?>"><strong><?=number_format($val["montant"],2,'.',' ')?></strong> <small>DH</small></td>
                                            <td><strong><?=getMethodePaiement(1)?></strong></td>
                                            <td>( <strong>Entrée de Caisse</strong> )</td>
                                            <td><strong><?=$val["description"]?></strong></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <?php foreach ($caisse_sorties as $val): ?>
                                        <tr class="danger">
                                            <td data-sort="<?=strtotime($val["date_sortie"])?>"><strong><?=date("d/m/Y", strtotime($val["date_sortie"]))?></strong></td>
                                            <td><?=getUserLabel($val["role"], $val["utilisateur"])?></td>
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
    </div>
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">TOTAL CAISSE</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 style="text-align: center;margin-top: 10px;">
                                    <strong><?=number_format(getCaisseTotal(), 2, ".", " ")?></strong> <small>DH</small>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if(_ENABLE_AVANCE_): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-warning box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">TOTAL AVANCES</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?php $avance = getAvanceTotal(); ?>
                                <table style="width: 100%;">
                                    <tr>
                                        <td class="current-width"><?=getMethodePaiement(1)?></td>
                                        <td class="current-width">&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;</td>
                                        <td><strong><?=number_format($avance["total_espece"], 2, ".", " ")?></strong> <small>DH</small></td>
                                    </tr>
                                    <tr>
                                        <td class="current-width"><?=getMethodePaiement(2)."/".getMethodePaiement(3)?></td>
                                        <td class="current-width">&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;</td>
                                        <td><strong><?=number_format($avance["total_cheque"], 2, ".", " ")?></strong> <small>DH</small></td>
                                    </tr>
                                    <tr>
                                        <td class="current-width"><?=getMethodePaiement(4)?></td>
                                        <td class="current-width">&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;</td>
                                        <td><strong><?=number_format($avance["total_virement"], 2, ".", " ")?></strong> <small>DH</small></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Options</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">

                                <?php if(_ENABLE_AVANCE_): ?>
                                <a href="<?=base_url()?>index.php/avance" class="btn btn-warning btn-md" style="width: 100%; margin-bottom: 5px;"><i class="fa fa-eye"></i>&nbsp; <b>Avances de Clients</b></a>
                                <br>
                                <?php endif; ?>

                                <?php $cheque = $this->db->query("SELECT *,count(id_cheque) AS total FROM cheque WHERE `type` = 1 AND `paid` = 0")->row()->total;?>

                                <a href="<?=base_url()?>index.php/caisse/cheques" class="btn btn-primary btn-md" style="width: 100%; margin-bottom: 5px;"><i class="fa fa-eye"></i>&nbsp; <b>Chèques à encaisser (<?=$cheque?>)</b></a>

                                <?php $cheque_fournisseur = $this->db->query("SELECT *,count(id_cheque) AS total FROM cheque WHERE `type` = 2 AND `paid` = 0")->row()->total;?>

                                <a href="<?=base_url()?>index.php/caisse/cheques_fournisseur" class="btn btn-primary btn-md" style="width: 100%; margin-bottom: 5px;"><i class="fa fa-eye"></i>&nbsp; <b>Chèques Fournisseur (<?=$cheque_fournisseur?>) </b></a>
                                <br>
                                <a href="<?=base_url()?>index.php/charge" class="btn btn-primary btn-md" style="width: 100%; margin-bottom: 5px;"><i class="fa fa-eye"></i>&nbsp; <b>Charges</b></a>
                                <br> <br>
                                <a href="<?=base_url()?>index.php/caisse/entree" class="btn btn-success btn-lg" style="width: 100%; margin-bottom: 5px;"><i class="fa fa-plus-circle"></i>&nbsp; Entrées de Caisse</a>
                                <br>
                                <a href="<?=base_url()?>index.php/caisse/sortie" class="btn btn-danger btn-lg" style="width: 100%;"><i class="fa fa-minus-circle"></i>&nbsp; Sorties de Caisse</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function ()
    {
        createDataTable(
            "#myDataTable",
            [ 0, "desc" ],
            [ [10, 50, 100, -1], [10, 50, 100, "Tous"] ],
            "#export_btns"
        );
    });
</script>