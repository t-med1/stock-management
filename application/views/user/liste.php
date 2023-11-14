<div class="row">
    <div class="col-md-12">
        <div class="box box-default box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Liste de Commerciaux</h3>
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
                            <th>Commercial</th>
                            <th>Role</th>
                            <th>Identifiant</th>
                            <th style="width: 50%;">Dernière Activité</th>
                            <th class="current-width no-export">Options</th>
                            </thead>
                            <tbody>
                            <?php
                                $current_user = $this->session->userdata("id_user");
                                foreach ($users as $val):

                                    if($val["id_user"] == 1) { continue; } // HIDE FMS ACCESS
                                    $enable_update = $enable_delete = false;

                                    if($val["id_user"] == 2) {
                                        if($current_user == 1 || $current_user == 2) {
                                            $enable_update = true;
                                            $enable_delete = false;
                                        }
                                        else {
                                            $enable_update = $enable_delete = false;
                                        }
                                    }
                                    elseif($val["id_user"] == $current_user) {
                                        $enable_update = true;
                                        $enable_delete = false;
                                    }
                                    else {
                                        $enable_update = $enable_delete = true;
                                    }
                            ?>
                                <tr>
                                    <td><?=$val["full_name"]?></td>
                                    <td>
                                        <?php
                                            $role = "";
                                            switch ($val["role"]) {
                                                case 1 : $role = "Administrateur"; break;
                                                default : $role = "Géstionnaire";
                                            }
                                        ?>
                                        <?=getUserLabel($val["role"], $role)?>
                                    </td>
                                    <td>[ <b><?=$val["username"]?></b> ]</td>
                                    <td style="width: 50%;">
                                        <?php
                                            $historique = $this->db->query("SELECT * FROM user_log WHERE id_user_log = (SELECT MAX(id_user_log) FROM user_log WHERE id_user = ".$val["id_user"].")")->row();
                                            if(!empty($historique)) {
                                                echo date("d/m/Y H:i", strtotime($historique->date_log))."<br>".$historique->text;
                                            }
                                        ?>
                                    </td>
                                    <td class="current-width no-export">
                                        <?php if($enable_update): ?>
                                        <a href="<?=base_url()."index.php/user/modifier/".$val["id_user"];?>" class="btn btn-success rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Modifier">
                                            <i class="fa fa-wrench" aria-hidden="true"></i>
                                        </a>
                                        <?php endif; ?>
                                        <?php if($enable_delete): ?>
                                            <form method="post" action="<?=base_url()."index.php/user/supprimer/"?>" id="form_<?=$val["id_user"]?>" style="display:none;">
                                                <input type="hidden" name="id_user" value="<?=$val["id_user"]?>">
                                            </form>
                                            <a href="#" onclick="confirmDelete('<?="form_".$val["id_user"]?>')" class="btn btn-danger btn-sm rounded" data-toggle="tooltip" data-placement="top" title="Supprimer">
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
            [ 0, "asc" ],
            [ [20, 50, 100, -1], [20, 50, 100, "Tous"] ]
        );

    });
</script>