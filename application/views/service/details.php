<div class="row">

    <div class="col-md-4">

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

                    <div class="col-md-12" style="overflow-x: auto;">

                        <table class="table">

                            <thead>

                            <?php if ($service !== null && is_object($service)): ?>
                                <?php if (property_exists($service, 'display') && $service->display == 0): ?>
                                    <tr>
                                        <th colspan="3" style="text-align: center; font-size: 1.5rem; background-color: #d2d6de;">[ ARCHIVE ]</th>
                                    </tr>
                                <?php endif; ?>
                                    <tr>
                                        <th colspan="3" style="text-align: center; font-size: 2.5rem;"><?=$service->full_name?></th>
                                    </tr>
                            <?php else: ?>
                                <tr>
                                    <th colspan="3" style="text-align: center; font-size: 2.5rem;">Service Data Not Available</th>
                                </tr>
                            <?php endif; ?>

                            </thead>

                            <tbody>
                                <?php if ($service !== null && is_object($service)): ?>
                                    <tr>
                                        <td class="current-width">Catégorie</td>
                                        <td class="current-width">&nbsp; : &nbsp;&nbsp;</td>
                                        <td>
                                            <strong>
                                                <?php if (property_exists($service, 'id_categorie')): ?>
                                                    <a href="<?= base_url() . "index.php/categorie/details/" . $service->id_categorie ?>"><?= $service->categorie ?></a>
                                                <?php else: ?>
                                                    N/A
                                                <?php endif; ?>
                                            </strong>
                                        </td>
                                    </tr>
                                    <!-- ... rest of the code ... -->
                                <?php else: ?>
                                    <tr>
                                        <th colspan="3" style="text-align: center; font-size: 2.5rem;">Service Data Not Available</th>
                                    </tr>
                                <?php endif; ?>
                            </tbody>

                        </table>



                        <?php if(!empty($service->image) && file_exists(_UPLOADS_PATH_.$service->image)): ?>

                            <a href="#" class="btn btn-primary btn-xs" onclick='showImage("<?=$service->full_name?>", "<?=$service->image?>")' style="width: 100%; margin-bottom: 10px;"><i class="fa fa-picture-o"></i>&nbsp;&nbsp; Afficher l'Image</a>

                        <?php endif; ?>




                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-md-8">

        <div class="box box-default box-solid">

            <div class="box-header with-border">

                <h3 class="box-title">Historique de ventes</h3>

                <div class="box-tools pull-right">

                    <button type="button" class="btn btn-box-tool" data-widget="collapse">

                        <i class="fa fa-minus"></i>

                    </button>

                </div>

            </div>

            <div class="box-body" style="padding-top: 3px;">

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

                            <th>Vente</th>

                            <th>Client</th>

                            </thead>

                            <tbody>

                            <?php foreach ($ventes as $val): ?>

                                <tr>

                                    <td data-sort="<?=strtotime($val["date_vente"])?>"><?=date("d/m/Y", strtotime($val["date_vente"]))?></td>

                                    <td>

                                        <a href="<?=base_url()?>index.php/vente/details/<?=$val["id_vente"]?>"><strong><?=$val["code_vente"]?></strong></a>

                                        <span style="display: none;">(F: <?=$val["num_facture"]?>)</span>

                                    </td>

                                    <td><a href="<?=base_url()?>index.php/client/details/<?=$val["id_client"]?>"><strong><?=$val["client"]?></strong></a></td>

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



        createDataTable(

            "#myDataTable_1",

            [ 0, "desc" ],

            [ [10, 50, 100, -1], [10, 50, 100, "Tous"] ],

            "#export_btns_1",

            "Historique de ventes de service : <?=$service->full_name?>"

        );



    });

</script>