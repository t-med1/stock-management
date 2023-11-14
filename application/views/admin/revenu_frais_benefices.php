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
                <form method="post" action="<?=base_url()?>index.php/admin/revenu_frais_benefices">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Entre Le :</label>
                                <input type="date" class="form-control" name="date_debut" value="<?=date("Y-m-d", strtotime($date_debut))?>" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Et Le :</label>
                                <input type="date" class="form-control" name="date_fin" value="<?=date("Y-m-d", strtotime($date_fin))?>" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Catégorie :</label>
                                <select name="id_categorie" class="form-control" id="id_categorie" required>
                                    <option value="tous">Tous</option>
                                    <?php foreach ($categories as $key): ?>
                                    <option value="<?=$key['id_categorie']?>"><?=$key['full_name']?></option>
                                    <?php endforeach;?>
                                </select>
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
                        <?php
                            $benefice = ($total_ventes+$total_avoirs) - ($total_cout_revient+$total_charges);
                        ?>
                        <div class="callout callout-<?=$benefice>0 ? "success" : "warning"?>" style="margin-bottom: 0px;">
                            <h4 style="margin: 0px;">Bénéfice NET :</h4>
                            <h2 style="margin: 10px 0px 0px 0px;"><span id="span_vente"><?=number_format($benefice, 2, ".", " ")?></span> <span style="font-size: 16px;">DH</span></h2>
                        </div>
                        <br>
                        <table class="table table-bordered table-striped" style="margin-bottom: 0px;">
                            <thead>
                            <th style="font-size: 18px;text-align: center;"><a href="<?=base_url()."index.php/vente"?>">Ventes</a></th>
                            <th style="font-size: 18px;text-align: center;"><a href="<?=base_url()."index.php/produit"?>">Coût de revient</a></th>
                            <th style="font-size: 18px;text-align: center;"><a href="<?=base_url()."index.php/charge"?>">Charges</a></th>
                            </thead>
                            <tbody>
                            <tr>
                                <td style="font-size: 20px;text-align: center;"><strong><?=number_format($total_ventes+$total_avoirs, 2, ".", " ")?></strong> <small>DH</small></td>
                                <td style="font-size: 20px;text-align: center;"><strong><?=number_format($total_cout_revient, 2, ".", " ")?></strong> <small>DH</small></td>
                                <td style="font-size: 20px;text-align: center;"><strong><?=number_format($total_charges, 2, ".", " ")?></strong> <small>DH</small></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function ()
    {
        $('#id_categorie').select2({ placeholder: "Selectionner un catégorie" });
        $("#id_categorie").val('<?=$this->input->post('id_categorie') ? $this->input->post('id_categorie') : "tous"; ?>').trigger("change");
    })

</script>