<div class="row">
    <div class="col-md-12">
        <div class="box box-default box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Liste de Sous-Catégories</h3>
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
                            <th>Sous-Catégorie</th>
                            <th>Catégorie</th>
                            <th>Nbr de produits</th>
                            <th>Description</th>
                            <th class="current-width no-export">Options</th>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($sub_categories as $val):
                                    $nbr_produits = $this->db->query("SELECT COALESCE(COUNT(id_produit), 0) AS nbr FROM produit WHERE id_sub_categorie = ".$val["id_sub_categorie"])->row()->nbr;
                            ?>
                                <tr>
                                    <td><?=$val["full_name"]?></td>
                                    <td><strong><a href="<?=base_url()."index.php/categorie/details/".$val["id_categorie"]?>"><?=$val["categorie"]?></a></strong></td>
                                    <td><?=$nbr_produits?></td>
                                    <td><?=$val["description"]?></td>
                                    <td class="current-width no-export">
                                        <a href="<?=base_url()."index.php/sub_categorie/details/".$val["id_sub_categorie"]?>" class="btn btn-primary rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Détails">
                                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                                        </a>
                                        <?php if($val["display"] == 1 && $this->session->userdata("role_user") == 1): ?>
                                            <a href="<?=base_url()."index.php/sub_categorie/modifier/".$val["id_sub_categorie"];?>" class="btn btn-success rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Modifier">
                                                <i class="fa fa-wrench" aria-hidden="true"></i>
                                            </a>
                                            <form method="post" action="<?=base_url()."index.php/sub_categorie/supprimer/"?>" id="form_<?=$val["id_sub_categorie"]?>" style="display:none;">
                                                <input type="hidden" name="id_sub_categorie" value="<?=$val["id_sub_categorie"]?>">
                                            </form>
                                            <a href="#" onclick="confirmDelete('<?="form_".$val["id_sub_categorie"]?>')" class="btn btn-danger btn-sm rounded" data-toggle="tooltip" data-placement="top" title="Supprimer">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        <?php endif; ?>
                                    </td>
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
            "#myDataTable",
            [[ 0, "asc" ], [ 1, "asc" ]],
            [ [20, 50, 100, -1], [20, 50, 100, "Tous"] ],
            "#export_btns"
        );

    });
</script>