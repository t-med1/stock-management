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
                            <th>Fournisseur</th>
                            <th>Achats</th>
                            <th>Paiements</th>
                            <th>Exonération</th>
                            <th>Reste</th>
                            </thead>
                            <tbody>
                            <?php
                            $total_reste = 0;
                            foreach ($fournisseurs as $val):
                                $total_achats = 0;
                                $total_paiements = 0;
                                $total_exoneration = 0;
                                $total_reste_temp = 0;

                                $achats = $this->db->where("id_fournisseur", $val["id_fournisseur"])->get("achat")->result_array();
                                foreach ($achats as $achat)
                                {
                                    $temp = getAchatTotal($achat["id_achat"]);
                                    $total_achats += $temp["total_achat"];
                                    $total_paiements += $temp["total_paiement"];
                                    $total_exoneration += $temp["total_exoneration"];
                                    $total_reste_temp += $temp["total_reste"];
                                }

                                $total_reste += $total_reste_temp;
                                ?>
                                <tr>
                                    <td><a href="<?=base_url()."index.php/fournisseur/details/".$val["id_fournisseur"]?>"><strong><?=$val["code_fournisseur"]?></strong></a></td>
                                    <td><a href="<?=base_url()."index.php/fournisseur/details/".$val["id_fournisseur"]?>"><strong><?=$val["full_name"]?></strong></a></td>
                                    <td data-sort="<?=round($total_achats,2)?>"><strong><?=number_format($total_achats, 2, ".", " ")?></strong> <small>DH</small></td>
                                    <td data-sort="<?=round($total_paiements,2)?>" class="text-success"><strong><?=number_format($total_paiements, 2, ".", " ")?></strong> <small>DH</small></td>
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