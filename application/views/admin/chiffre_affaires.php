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
                <form method="get" action="<?=base_url()?>index.php/admin/chiffre_affaires">
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
                <h3 class="box-title">Détails</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <div class="callout callout-default" style="margin-bottom: 10px; background-color: gray !important; color: white; border-left: 5px solid #555555;">
                            <h5 style="margin: 0px;">Nombre de Ventes :</h5>
                            <h3 style="margin: 10px 0px 0px 0px;"><span><?=$nbr_ventes?></span></h3>
                        </div>
                        <div class="callout callout-info" style="margin-bottom: 10px;">
                            <h5 style="margin: 0px;">Chiffre d'affaires HT :</h5>
                            <h3 style="margin: 10px 0px 0px 0px;"><span><?=number_format($chiffre_ht, 2, ".", " ")?></span> <span style="font-size: 16px;">DH</span></h3>
                        </div>
                        <div class="callout callout-success" style="margin-bottom: 10px;">
                            <h4 style="margin: 0px;">Chiffre d'affaires TTC :</h4>
                            <h2 style="margin: 10px 0px 0px 0px;"><span><?=number_format($chiffre_ttc, 2, ".", " ")?></span> <span style="font-size: 16px;">DH</span></h2>
                        </div>
                        <div class="callout callout-default" style="margin-bottom: 10px; background-color: gray !important; color: white; border-left: 5px solid #555555;">
                            <h5 style="margin: 0px;">TVA :</h5>
                            <h3 style="margin: 10px 0px 0px 0px;"><span><?=number_format($total_tva, 2, ".", " ")?></span> <span style="font-size: 16px;">DH</span></h3>
                        </div>
                        <?php if(_ENABLE_DROITS_TIMBRE_): ?>
                            <div class="callout callout-default" style="margin-bottom: 0px; background-color: gray !important; color: white; border-left: 5px solid #555555;">
                                <h5 style="margin: 0px;">Droit de timbre :</h5>
                                <h3 style="margin: 10px 0px 0px 0px;"><span><?=number_format($droit_timbre, 2, ".", " ")?></span> <span style="font-size: 16px;">DH</span></h3>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>