<div class="row">
    <div class="col-md-12">
        <div class="box box-default box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Détails</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="callout callout-warning" style="margin-bottom: 5px;">
                            <h4>RESTE TOTAL :</h4>
                            <strong style="font-size: 20px;" id="total_reste">...</strong> <small>DH</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="export_btns" style="float: right;margin: 8px 0px 12px 0px;"></div><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table id="myDataTable" class="table myDataTable table-bordered table-striped">
                            <thead>
                            <th>Code</th>
                            <th>Client</th>
                            <th>Ventes</th>
                            <?php if(_ENABLE_AVANCE_): ?>
                            <th>Avance</th>
                            <?php endif; ?>
                            <th>Paiements</th>
                            <th>Bons d'Avoir</th>
                            <th>Réglement</th>
                            <th>Exonération</th>
                            <th>Reste</th>
                            </thead>
                            <tbody>
                            <?php
                                $total_reste = 0;
                                foreach ($clients as $val):
                                    $total_ventes = 0;
                                    $total_paiements = 0;
                                    $total_avoirs = 0;
                                    $total_reglement = 0;
                                    $total_exoneration = 0;
                                    $total_reste_temp = 0;

                                    $ventes = $this->db->where("id_client", $val["id_client"])->get("vente")->result_array();
                                    foreach ($ventes as $vente)
                                    {
                                        $temp = getVenteTotal($vente["id_vente"]);
                                        $total_ventes += $temp["total_vente"];
                                        $total_paiements += $temp["total_paiement"];
                                        $total_exoneration += $temp["total_exoneration"];
                                        $total_reste_temp += $temp["total_reste"];
                                    }

                                    $avoirs = $this->db->where("id_client", $val["id_client"])->get("avoir")->result_array();
                                    foreach ($avoirs as $avoir)
                                    {
                                        $temp = getAvoirTotal($avoir["id_avoir"]);
                                        $total_avoirs += abs($temp["total_avoir"]);
                                        $total_reglement += $temp["total_paiement"];
                                        $total_reste_temp += $temp["total_reste"];
                                    }

                                    $total_reste += $total_reste_temp;

                                    if(_ENABLE_AVANCE_) {
                                        $avance = getAvanceTotal($val["id_client"])["total_avance"];
                                    }
                            ?>
                                <tr class="<?=$val["id_client"]==1?"warning":""?>">
                                    <td><a href="<?=base_url()."index.php/client/details/".$val["id_client"]?>"><strong><?=$val["code_client"]?></strong></a></td>
                                    <td><a href="<?=base_url()."index.php/client/details/".$val["id_client"]?>"><strong><?=$val["full_name"]?></strong></a></td>
                                    <td data-sort="<?=round($total_ventes,2)?>"><strong><?=number_format($total_ventes, 2, ".", " ")?></strong> <small>DH</small></td>
                                    <?php if(_ENABLE_AVANCE_): ?>
                                    <td data-sort="<?=round($avance,2)?>">
                                        <?php if ($val["id_client"] != 1 ): ?>
                                        <strong class="text-warning"><?=number_format($avance, 2, ".", " ")?></strong> <small>DH</small>
                                        <?php else: ?>
                                        <strong class="text-danger"><i class="fa fa-times"></i></strong>
                                        <?php endif; ?>
                                    </td>
                                    <?php endif; ?>
                                    <td data-sort="<?=round($total_paiements,2)?>" class="text-success"><strong><?=number_format($total_paiements, 2, ".", " ")?></strong> <small>DH</small></td>
                                    <td data-sort="<?=round($total_avoirs,2)?>"><strong><?=number_format($total_avoirs, 2, ".", " ")?></strong> <small>DH</small></td>
                                    <td data-sort="<?=round($total_reglement,2)?>"><strong><?=number_format($total_reglement, 2, ".", " ")?></strong> <small>DH</small></td>
                                    <td data-sort="<?=round($total_exoneration,2)?>" class="text-info"><strong><?=number_format($total_exoneration, 2, ".", " ")?></strong> <small>DH</small></td>
                                    <td data-sort="<?=round($total_reste_temp,2)?>" class="text-danger"><strong><?=number_format($total_reste_temp, 2, ".", " ")?></strong> <small>DH</small></td>
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

<script type="text/javascript">
    $(document).ready(function () {

        $("#total_reste").html('<?=number_format($total_reste, 2, ".", " ")?>');

        createDataTable(
            "#myDataTable",
            [ 1, "asc" ],
            [ [-1, 20, 50, 100], ["Tous", 20, 50, 100] ],
            "#export_btns"
        );
        
    });
</script>