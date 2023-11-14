<div class="row">
    <form method="post" action="<?=base_url()?>index.php/user/modifier">
        <input type="hidden" name="id_user" value="<?=$user->id_user?>">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="alert alert-warning alert-dismissible" id="password_alert" style="display: none;">
                <h4><i class="icon fa fa-info-circle"></i> Alerte !</h4>
                Votre confirmation du mot de passe ne correspond pas.
            </div>
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Modifier Commercial</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Nom de Commercial :</label>
                        <input type="text" class="form-control" name="full_name" value="<?=$user->full_name?>" placeholder="Nom de Commercial" required>
                    </div>
                    <div class="form-group">
                        <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Role :</label>
                        <select class="form-control" name="role" required>
                            <option value="0" <?=$user->role == 0 ? "selected" : ""?>>Géstionnaire</option>
                            <option value="1" <?=$user->role == 1 ? "selected" : ""?>>Administrateur</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Identifiant :</label>
                        <input type="text" class="form-control" name="username" value="<?=$user->username?>" placeholder="Identifiant" >
                    </div>
                    <div class="checkbox" style="margin-bottom: 12px;">
                        <label>
                            <input type="checkbox" id="update_password" value="true"> Mettre à jour le mot de passe.
                        </label>
                    </div>
                    <div id="div_password" style="display: none;">
                        <div class="form-group">
                            <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Mot de passe :</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe">
                        </div>
                        <div class="form-group">
                            <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Mot de passe (Confirmer) :</label>
                            <input type="password" class="form-control" id="password_confirmer" placeholder="Mot de passe (Confirmer)">
                        </div>
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
    $(document).ready(function ()
    {
        $('#update_password').on("change", function() {
            if(this.checked) {
                $("#div_password").show(100);
                $("#password, #password_confirmer").attr("required", "required");
            }
            else {
                $("#div_password").hide(100);
                $("#password, #password_confirmer").removeAttr("required");
            }
        });

        $("form").on("submit", function (event) {
            if($('#update_password')[0].checked)
            {
                event.preventDefault();
                var password = $("#password").val();
                var password_confirmer = $("#password_confirmer").val();
                if(password != undefined && password != null && password != "" && password_confirmer != undefined && password_confirmer != null && password_confirmer != "")
                {
                    if(password == password_confirmer) {
                        $("#password_alert").hide(100);
                        $(this).unbind("submit").submit();
                    }
                    else {
                        $("#password").val("");
                        $("#password_confirmer").val("");
                        $("#password_alert").show(100);
                    }
                }
                else {
                    $("#password").val("");
                    $("#password_confirmer").val("");
                    $("#password_alert").show(100);
                }
            }
        });
    });
</script>