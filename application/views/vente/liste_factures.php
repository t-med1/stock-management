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

                <form method="get" action="<?=base_url()."index.php/vente/factures"?>">

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

    <div class="col-md-12">

        <div class="box box-default box-solid">

            <div class="box-header with-border">

                <h3 class="box-title">Liste de Ventes</h3>

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

                            <tr>

                                <th>N° de Facture</th>

                                <th>Date</th>

                                <th>Client</th>

                                <th>Montant</th>

                                <th>Reste à payé</th>

                                <th class="current-width no-export">Options</th>

                            </tr>

                            </thead>
                            <tbody>

                            <?php foreach ($factures as $facture):

                                $total = getFactureTotal($facture["num_facture"]);?>
                                <tr>

                                    <td>

                                        <strong><?=$facture["num_facture"]?></strong>

                                    </td>

                                    <td data-sort="<?=strtotime($facture["date"])?>"><?=date("d/m/Y", strtotime($facture["date"]))?></td>

                                    <td>

                                        <a href="<?=base_url().'index.php/client/details/'.$facture['id_client']?>">

                                           <strong><?=$facture['client']?></strong>

                                        </a>

                                    </td>

                                    <td data-sort="<?=round($total["total_vente"],2)?>"><strong><?=number_format($total["total_vente"],2,'.',' ')?></strong> <small>DH</small></td>

                                    <td data-sort="<?=round($total["total_reste"],2)?>"><strong><?=number_format($total["total_reste"],2,'.',' ')?></strong> <small>DH</small></td>

                                    <td><a href="<?=base_url()?>index.php/vente/facture/<?=$facture['num_facture']?>" target="_blank" class="btn btn-warning btn-xs" style="width: 100%;"><i class="fa fa-print"></i>&nbsp; Imprimer</a></td>

                                </tr>

                            <?php endforeach;?>

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

            [ [ 0, "desc" ], [ 3, "desc" ] ],

            [ [20, 50, 100, -1], [20, 50, 100, "Tous"] ],

            "#export_btns"

        );



    });

</script>