<div class="row">
    <div class="col-md-3"></div>
    <form method="post" action="<?=base_url()?>index.php/produit/e_modifier">
        <input type="hidden" name="id_produit_end" value="<?=$produit_end->id_produit_end?>">
        <div class="col-md-6">
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Modifier Produit Endommagé</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Code Produit :</label>
                        <input type="text" class="form-control" value="<?=$produit_end->code_produit?>" style="border: 2px solid rgb(54, 127, 169);" readonly required>
                        <input type="hidden" name="id_produit" value="<?=$produit_end->id_produit?>">
                    </div>
                    <div class="form-group">
                        <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Produit :</label>
                        <input type="text" class="form-control" value="<?=$produit_end->produit?>" style="border: 2px solid rgb(54, 127, 169);" readonly required>
                    </div>
                    <?php $max = getQuantiteProduit($produit_end->id_produit)["stock"]+$produit_end->quantite; ?>
                    <div class="form-group">
                        <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Quantité :</label>
                        <input type="number" step="any" min="0.1" max="<?=$max?>" class="form-control" name="quantite" id="quantite" value="<?=$produit_end->quantite?>" placeholder="Quantité" required>
                    </div>
                    <div class="form-group">
                        <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Date :</label>
                        <input type="date" class="form-control" name="date" placeholder="Date" value="<?=date("Y-m-d", strtotime($produit_end->date))?>" required>
                    </div>
                    <div class="form-group">
                        <label>Description :</label>
                        <textarea class="form-control" name="description" placeholder="Description" maxlength="200" rows="3"><?=$produit_end->description?></textarea>
                    </div>
                </div>
                <div class="box-footer" style="text-align: center;">
                    <button type="submit" style="width: 50%;" class="btn btn-primary">
                        <i class="fa fa-save"></i> &nbsp; Mettre à jour
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>


<script type="text/javascript">
    $(document).ready(function () {

    });
</script>