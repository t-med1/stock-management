<div class="row">
    <div class="col-md-3"></div>
    <form method="post" action="<?=base_url()?>index.php/user/ajouter">
        <div class="col-md-6">
            <div class="alert alert-warning alert-dismissible" id="password_alert" style="display: none;">
                <h4><i class="icon fa fa-info-circle"></i> Alerte !</h4>
                Votre confirmation du mot de passe ne correspond pas.
            </div>
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Ajouter Commercial</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Nom de Commercial :</label>
                        <input type="text" class="form-control" name="full_name" placeholder="Nom de Commercial" required>
                    </div>
                    <div class="form-group">
                        <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Role :</label>
                        <select class="form-control" name="role" required>
                            <option value="0">Géstionnaire</option>
                            <option value="1">Administrateur</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Identifiant :</label>
                        <input type="text" class="form-control" name="username" placeholder="Identifiant" >
                    </div>
                    <div class="form-group">
                        <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Mot de passe :</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" required>
                    </div>
                    <div class="form-group">
                        <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Mot de passe (Confirmer) :</label>
                        <input type="password" class="form-control" id="password_confirmer" placeholder="Mot de passe (Confirmer)" required>
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

<script type="text/javascript">
    $(document).ready(function () {
        $("form").on("submit", function (event) {
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
        });
    });
</script>