<div class="row">

    <div class="col-lg-3 col-md-6 col-xs-12">

        <a href="<?= base_url() ?>index.php/vente/rapide">

            <div class="small-box bg-green">

                <div class="inner" style="height: 100px; padding-top: 15px; padding-left: 20px;">

                    <span style="font-size: 25px; font-weight: bold;">VENTE AU<br>COMPTOIR</span>

                </div>

                <div class="icon">

                    <i class="fa fa-plus"></i>

                </div>

                <span class="small-box-footer">Ouvrir &nbsp;&nbsp; <i class="fa fa-arrow-circle-right"></i></span>

            </div>

        </a>

    </div>

    <div class="col-lg-3 col-md-6 col-xs-12">

        <a href="<?= base_url() ?>index.php/vente">

            <div class="small-box bg-aqua">

                <div class="inner">

                    <h3>
                        <?= $total_ventes ?>
                    </h3>

                    <p>VENTES</p>

                </div>

                <div class="icon">

                    <i class="fa fa-list-alt"></i>

                </div>

                <span class="small-box-footer">Plus de Détails &nbsp;&nbsp; <i
                        class="fa fa-arrow-circle-right"></i></span>

            </div>

        </a>

    </div>

    <div class="col-lg-3 col-md-6 col-xs-12">

        <a href="<?= base_url() ?>index.php/avoir">

            <div class="small-box bg-aqua">

                <div class="inner">

                    <h3>
                        <?= $total_avoires ?>
                    </h3>

                    <p>BONS D'AVOIR</p>

                </div>

                <div class="icon">

                    <i class="fa fa-refresh"></i>

                </div>

                <span class="small-box-footer">Plus de Détails &nbsp;&nbsp; <i
                        class="fa fa-arrow-circle-right"></i></span>

            </div>

        </a>

    </div>

    <div class="col-lg-3 col-md-6 col-xs-12">

        <div class="info-box" style="height: 128px;border: 2px solid #00c0ef; padding: 2px;">

            <span class="info-box-icon bg-aqua" style="height: 100%; padding-top: 20px;border-radius: 0px;"><i
                    class="fa fa-shopping-basket"></i></span>

            <div class="info-box-content"
                style="padding: <?= $this->session->userdata("role_user") == 1 ? "15" : "40" ?>px 10px; text-align: center;">

                <a href="<?= base_url() ?>index.php/client_cmd"><span class="info-box-text"
                        style="color: #00c0ef; font-weight: bold;">CMD&nbsp; Clients</span></a>

                <a href="<?= base_url() ?>index.php/client_cmd"><span class="info-box-number"
                        style="margin-bottom: 10px;">
                        <?= $total_clients_cmds ?>
                    </span></a>

                <?php if ($this->session->userdata("role_user") == 1): ?>

                    <a href="<?= base_url() ?>index.php/commande"><span class="info-box-text"
                            style="color: #00c0ef; font-weight: bold;">CMD&nbsp; Fournisseurs</span></a>

                    <a href="<?= base_url() ?>index.php/commande"><span class="info-box-number">
                            <?= $total_commandes ?>
                        </span></a>

                <?php endif; ?>

            </div>

        </div>

    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-xs-12">

        <a href="<?= base_url() ?>index.php/vente/rapide" style="color:white">

            <div class="small-box" style="background: linear-gradient(to bottom, #006400, #87ceeb);">
                <div style="display:flex;flex-wrap:wrap;gap:40%">

                    <div class="inner" style="height: 100px; padding-top: 15px; padding-left: 20px;">

                        <span style="font-size: 25px; font-weight: bold;">COMMANDE<br>ANNULER</span>

                    </div>

                    <div class="inner" style="height: 100px; padding-top: 15px; padding-left: 20px;">
                        <h4 style="font-size:30px; font-weight: bold;"><?= $total_cmd_annuler ?></h4>
                    </div>

                    <div class="icon">

                        <i class="fa fa-retweet"></i>
                    </div>
                </div>
                <span class="small-box-footer">Ouvrir &nbsp;&nbsp; <i class="fa fa-arrow-circle-right"></i></span>

            </div>

        </a>

    </div>
    <div class="col-lg-6 col-md-6 col-xs-12">

        <a href="<?= base_url() ?>index.php/vente/rapide" style="color:white">

            <div class="small-box" style="background: linear-gradient(to top, #006400, #87ceeb);">
                <div style="display:flex;flex-wrap:wrap;gap:40%">
                    <div class="inner" style="height: 100px; padding-top: 15px; padding-left: 20px;">

                        <span style="font-size: 25px; font-weight: bold;">COMMANDE EN<br>COURS</span>

                    </div>
                    <div class="inner" style="height: 100px; padding-top: 15px; padding-left: 20px;">
                        <h4 style="font-size:30px; font-weight: bold;"><?= $total_cmd_cours ?></h4>
                    </div>

                    <div class="icon">

                        <i class="fa fa-shopping-cart"></i>

                    </div>

                </div>
                <span class="small-box-footer">Ouvrir &nbsp;&nbsp; <i class="fa fa-arrow-circle-right"></i></span>
            </div>

        </a>

    </div>
</div>


<?php if ($this->session->userdata("role_user") == 1 && $nbr_cheques + $nbr_effets > 0): ?>

    <div class="row">

        <div class="col-md-12">

            <div class="callout callout-warning" style="margin-bottom: 20px;">

                <h4 style="margin: 0px 0px 12px 0px;"><i class="fa fa-exclamation-circle"></i>&nbsp; Alerte !</h4>

                <a href="<?= base_url() ?>index.php/caisse/cheques" style="font-size: 13px;">

                    <h4>

                        <?php

                        $temp = array();

                        if ($nbr_cheques > 0) {
                            array_push($temp, 'Vous avez &nbsp;<b>' . $nbr_cheques . '</b>&nbsp; Chèque' . ($nbr_cheques > 1 ? 's' : '') . ' à encaisser.');
                        }

                        if ($nbr_effets > 0) {
                            array_push($temp, 'Vous avez &nbsp;<b>' . $nbr_effets . '</b>&nbsp; Effet' . ($nbr_effets > 1 ? 's' : '') . ' à encaisser.');
                        }

                        echo join('<br>', $temp);

                        ?>

                    </h4>

                </a>

            </div>

        </div>

    </div>

<?php endif; ?>

<div class="row">

    <div class="col-md-6">

        <div class="box box-default box-solid">

            <div class="box-header with-border">

                <h3 class="box-title">Nombre de Ventes</h3>

                <div class="box-tools pull-right">

                    <button type="button" class="btn btn-box-tool" data-widget="collapse">

                        <i class="fa fa-minus"></i>

                    </button>

                </div>

            </div>

            <div class="box-body">

                <div class="row">

                    <div class="col-md-12 table-responsive">

                        <div class="chart tab-pane active" id="revenue-chart-1"
                            style="position: relative; height: 300px;">

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="box box-default box-solid">

            <div class="box-header with-border">

                <h3 class="box-title">Chiffre d'affaires TTC</h3>

                <div class="box-tools pull-right">

                    <button type="button" class="btn btn-box-tool" data-widget="collapse">

                        <i class="fa fa-minus"></i>

                    </button>

                </div>

            </div>

            <div class="box-body">

                <div class="row">

                    <div class="col-md-12 table-responsive">

                        <div class="chart tab-pane active" id="revenue-chart-2"
                            style="position: relative; height: 300px;">

                        </div>

                    </div>

                </div>

                <!-- <div class="row">

                    <div class="col-md-12">

                        <form action="accueil/upload_file" method="post" enctype="multipart/form-data" >

                            <input type="file" name="file" class="form-control">

                            <button type="submit">sub</button>

                        </form>

                    </div>

                </div> -->

            </div>

        </div>

    </div>

</div>

<div class="row">

    <div class="col-md-6">

        <div class="callout callout-info"
            style="margin-bottom: 0px; background-color: #3d9dcd !important; border-color: #1f6e87; !important;">

            <?php

            $months = getMonthsFR();

            $nbr_ventes_today = $this->db->query("SELECT COUNT(id_vente) AS nbr FROM vente WHERE date_vente = '" . date("Y-m-d") . "'")->row()->nbr;

            ?>

            <p>Nombre de Ventes d'Aujourd'hui :</p>

            <h4 style="margin: 10px 0px 5px 0px;"><span id="nbr_ventes_today">
                    <?= $nbr_ventes_today ?>
                </span></h4>

        </div>

    </div>

    <div class="col-md-6">

        <div class="callout callout-info"
            style="margin-bottom: 0px; background-color: #3dbc7b !important; border-color: #318752; !important;">

            <?php

            $ventes = $this->db->query("SELECT id_vente FROM vente WHERE date_vente = '" . date("Y-m-d") . "'")->result_array();

            $avoirs = $this->db->query("SELECT id_avoir FROM avoir WHERE date_avoir = '" . date("Y-m-d") . "'")->result_array();



            $total = 0;

            foreach ($ventes as $val) {

                $temp = getVenteTotal($val["id_vente"]);

                $total += $temp["total_vente"];

            }

            foreach ($avoirs as $val) {

                $temp = getAvoirTotal($val["id_avoir"]);

                $total += $temp["total_avoir"];

            }

            ?>

            <p>Chiffre d'affaires TTC d'Aujourd'hui :</p>

            <h4 style="margin: 10px 0px 5px 0px;"><span id="ca_ttc_today">
                    <?= number_format($total, 2, ".", " ") ?>
                </span> <small style="color: white;">DH</small></h4>

        </div>

    </div>

</div>



<script type="text/javascript">

    $(document).ready(function () {

        var area_1 = new Morris.Area({

            element: 'revenue-chart-1',

            resize: true,

            parseTime: false,

            xLabelAngle: -50,

            gridIntegers: true,

            data: [

                <?php

                foreach ($months as $m) {

                    $nbr_ventes = $this->db->query("SELECT COUNT(id_vente) AS nbr FROM vente WHERE YEAR(date_vente) = " . date("Y") . " AND MONTH(date_vente) = " . (array_search($m, $months) + 1))->row()->nbr;

                    echo "{ y: '" . $m . "', item_v: " . $nbr_ventes . " },";

                }

                ?>

            ],

            xkey: 'y',

            ykeys: ['item_v'],

            labels: ['Nombre de Ventes'],

            lineColors: ['#3c8dbc'],

            yLabelFormat: function (y) { return y != Math.round(y) ? '' : y; },

            hideHover: 'auto'

        });

        var area_2 = new Morris.Area({

            element: 'revenue-chart-2',

            resize: true,

            parseTime: false,

            xLabelAngle: -50,

            data: [

                <?php

                foreach ($months as $m) {

                    $ventes = $this->db->query("SELECT id_vente FROM vente WHERE YEAR(date_vente) = " . date("Y") . " AND MONTH(date_vente) = " . (array_search($m, $months) + 1))->result_array();

                    $avoirs = $this->db->query("SELECT id_avoir FROM avoir WHERE YEAR(date_avoir) = " . date("Y") . " AND MONTH(date_avoir) = " . (array_search($m, $months) + 1))->result_array();



                    $total = 0;

                    foreach ($ventes as $val) {

                        $temp = getVenteTotal($val["id_vente"]);

                        $total += $temp["total_vente"];

                    }

                    foreach ($avoirs as $val) {

                        $temp = getAvoirTotal($val["id_avoir"]);

                        $total += $temp["total_avoir"];

                    }



                    echo "{ y: '" . $m . "', item: " . number_format($total, 2, ".", "") . " },";

                }

                ?>

            ],

            xkey: 'y',

            ykeys: ['item'],

            labels: ['Total de Ventes (DH)'],

            lineColors: ['#3dbc7b'],

            hideHover: 'auto'

        });

    });

</script>