<div class="row">
    <div class="col-md-12">
        <div class="box box-default box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Details</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4 style="padding: 0px 0px 0px 8px; font-size: 2.2rem;">Fournisseur : &nbsp; <strong><a href="<?=base_url()."index.php/fournisseur/details/".$fournisseur->id_fournisseur?>"><?=$fournisseur->full_name?></a></strong></h4>
                    </div>
                    <div class="col-md-6">
                        <div id="export_btns" style="float: right;margin: 8px 0px 12px 0px;"></div><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table id="myDataTable" class="table myDataTable table-bordered">
                            <thead>
                            <th>Date d'Opération</th>
                            <th>Type</th>
                            <th>Code / Réglement</th>
                            <th>Débit</th>
                            <th>Crédit</th>
                            <th>Solde</th>
                            </thead>
                            <tbody>
                            <?php foreach ($releve as $val): ?>
                                <tr class="<?=$val["color"]?>">
                                    <td data-sort="<?=$val["sort"]?>"><?=$val["date"]?></td>
                                    <td><?=$val["type"]?></td>
                                    <td><?=$val["code"]?></td>
                                    <td><?=$val["debit_row"]?></td>
                                    <td><?=$val["credit_row"]?></td>
                                    <td><strong><?=number_format($val["solde"], 2, ".", " ")?></strong> <small>DH</small></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="5" style="font-size: 16px !important;"><strong>TOTAL Dû :</strong></td>
                                <td hidden>-</td>
                                <td hidden>-</td>
                                <td hidden>-</td>
                                <td hidden>-</td>
                                <td style="font-size: 18px !important;"><strong><?=number_format($solde,2,'.',' ')?></strong> <small>DH</small></td>
                            </tr>
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

        createDataTable(
            "#myDataTable",
            [ 0, "asc" ],
            null,
            "#export_btns",
            "Relevé de Fournisseur : &nbsp; <?=$fournisseur->full_name?>",
            "R" // relevé
        );
        
    });
</script>
