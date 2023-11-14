<div class="row">
    <div class="col-md-3"></div>
    <form method="post" action="<?=base_url()?>index.php/caisse/sortie_ajouter">
        <div class="col-md-6">
            <div class="box box-danger box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Nouveau - Sortie de Caisse</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Date Sortie:</label>
                        <input type="date" class="form-control" name="date_sortie" value="<?=date("Y-m-d")?>" placeholder="Date Sortie" required>
                    </div>
                    <div class="form-group">
                        <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Montant :</label>
                        <input type="number" step="any" min="0.1" max="<?=getCaisseTotal()?>" class="form-control" name="montant" placeholder="Montant" required>
                    </div>
                    <div class="form-group">
                        <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Description :</label>
                        <textarea class="form-control" name="description" placeholder="Description" maxlength="200" rows="3" required></textarea>
                    </div>
                </div>
                <div class="box-footer" style="text-align: center;">
                    <button type="submit" style="width: 50%;" class="btn btn-primary">
                        <i class="fa fa-save"></i> &nbsp; Enregistrer
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>