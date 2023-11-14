<div class="row">

    <div class="col-md-2"></div>

    <div class="col-md-8">

        <div class="row">

            <div class="col-md-12">

                <form method="post" action="<?=base_url()?>index.php/client/facture/<?=$client->id_client?>/ajouter">

                    <div class="box box-default box-solid">

                        <div class="box-header with-border">

                            <h3 class="box-title">Liste de ventes de <?=$client->full_name?> </h3>

                            <div class="box-tools pull-right">

                                <button type="button" class="btn btn-box-tool" data-widget="collapse">

                                    <i class="fa fa-minus"></i>

                                </button>

                            </div>

                        </div>

                        <div class="box-body">

                            <div class="row">

                                <div class="col-md-12">

                                    <div id="export_btns_1" style="float: right;margin: 8px 0px 12px 0px;"></div><br>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-12 table-responsive">

                                    <table id="myDataTable_1" class="table myDataTable table-bordered table-striped">

                                        <thead>

                                        <tr>

                                            <th class="current-width"><i class="fa fa-check"></i></th>

                                            <th>N° de BL</th>

                                            <th>Date</th>

                                            <th>Montant</th>

                                            <th>Reste à payé</th>

                                        </tr>

                                        </thead>

                                        <tbody>

                                        <?php

                                        foreach ($ventes as $val):

                                            if(!empty($val["id_vente"]) && empty($val["num_facture"])):

                                                $total = getVenteTotal($val["id_vente"]);

                                                $facture = $this->db->where('num_facture', $val['num_facture'])->get('facture')->row();

                                                ?>

                                                <tr>

                                                    <td class="current-width">

                                                        <input type="checkbox" name="ventes[]" value="<?=$val["id_vente"]?>" class="cmd_checkbox" style="height: 16px; width: 16px;" onchange="selectCheckBox(this)">

                                                    </td>

                                                    <td>

                                                        <a href="<?=base_url()."index.php/vente/details/".$val["id_vente"]?>"><strong><?=$val["code_vente"]?></strong></a>

                                                        <span style="display: none;">(F: <?=$facture->num_facture?>)</span>

                                                    </td>

                                                    <td data-sort="<?=strtotime($val["date_vente"])?>"><?=date("d/m/Y", strtotime($val["date_vente"]))?></td>

                                                    <td data-sort="<?=round($total["total_vente"],2)?>"><strong><?=number_format($total["total_vente"],2,'.',' ')?></strong> <small>DH</small></td>

                                                    <td data-sort="<?=round($total["total_reste"],2)?>"><strong><?=number_format($total["total_reste"],2,'.',' ')?></strong> <small>DH</small></td>

                                                </tr>

                                            <?php endif; endforeach; ?>

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="box">

                        <div class="box-body" style="padding-top: 30px;">

                            <div class="form-row">

                                <div class="form-group col-md-12">

                                    <label for="date">Date</label>

                                    <input type="date" id="date" class="form-control" value="<?=date('Y-m-d')?>" name="date">

                                    <input type="hidden" name="ventes" id="ventes" value="">

                                </div>

                                                               <!-- <div class="form-group col-md-6">

                                                                   <label for="test">test</label>

                                                                   <input type="text" name="" class="form-control" id="test" >

                                                               </div> -->

                            </div>

                            <div class="row">

                                <div class="col-md-3"></div>

                                <div class="col-md-6"><button type="submit" class="btn btn-primary btn-sm" style="width:100%;margin-top: 10px;margin-bottom: 10px;">Créer Facture</button></div>

                            </div>



                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>





<script type="text/javascript">

    selected_cmd = [];

    $(document).ready(function () {



        createDataTable(

            "#myDataTable_1",

            [ 1, "desc" ],

            [ [5, 50, 100, -1], [5, 50, 100, "Tous"] ],

            "#export_btns_1",

            "Liste de ventes de <?=$client->full_name?> :"

        );



    });



    function selectCheckBox(self)

    {

        var id_cmd = self.value;

        if(self.checked) {

            selected_cmd.push(id_cmd);

        }

        else {

            selected_cmd = $.grep(selected_cmd, function(val) {

                return val != id_cmd;

            });

        }



        $("#ventes").val(selected_cmd.join("~~"));

    }

</script>