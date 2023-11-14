<div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="alert alert-warning alert-dismissible" id="password_alert" style="display: none;">
                <h4><i class="icon fa fa-info-circle"></i> Alerte !</h4>
                Votre confirmation du mot de passe ne correspond pas.
            </div>
            <div class="box box-default box-solid">
                <form method="post" action="<?=base_url()?>index.php/user/profile">
                <div class="box-header with-border">
                    <h3 class="box-title">Mon Profile</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label>Commercial : </label>
                        <input type="text" class="form-control" value="<?=$user->full_name?>" placeholder="Commercial" readonly>
                    </div>
                    <div class="form-group">
                        <label>Role :</label>
                        <input type="text" class="form-control" value="<?=$user->role == 1 ? "Administrateur" : "Géstionnaire"?>" placeholder="Role" readonly>
                    </div>
                    <div class="form-group">
                        <label><span class="text-red" data-toggle="tooltip" title="Obligatoire">*</span> Identifiant :</label>
                        <input type="text" class="form-control" name="username" value="<?=$user->username?>" placeholder="Identifiant" required>
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
                </form>
            </div>
            <div class="box box-default box-solid">
                <div class="box-header bg-info">
                    <h3 class="box-title">Google Authenticator</h3>
                </div>
                <?php if (!$user->authenticator){ ?>
                    <form method="POST" action="<?= base_url().'index.php/user/authenticator_register' ;?>">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input value="test" class="custom-control-input custom-control-input-success" name="check" id="click1" type="checkbox">
                                    <label for="click1" class="custom-control-label">&nbsp;&nbsp;Activer authentification google</label>
                                </div>
                            </div>
                            <div id="pass1" style="display: none;">
                                <p>Pour utiliser cette option, Télécharger "Google Authenticator" sur votre téléphone et scannez l'image suivante :</p>
                                <center><img src="<?=$qrCodeUrl?>" /></center>
                                <div class="form-group">
                                    <label for="code"> Code </label>
                                    <input type="text" name="code" class="form-control" id="code" placeholder="********">
                                    <input type="hidden" name="secret" value="<?=$secret ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Activer</button>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php } else { ?>
                    <div class="box-body">
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <h4>Votre authentification google est déja activée</h4>
                                <button class="btn btn-danger btn-sm float-right" onclick="Auth_delete()">Désactiver</button>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5 style="text-align: center;"><i class="icon fas fa-check"></i><?= $_SESSION['success']; ?></h5>

                    </div>
                <?php } ?>
                <?php if (isset($_SESSION['danger'])) { ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5 style="text-align: center;"><i class="icon fas fa-check"></i><?= $_SESSION['danger']; ?></h5>

                    </div>
                <?php } ?>
                <?php if (isset($_SESSION['message1'])) { ?>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5 style="text-align: center; font-size: 16px "><?= $_SESSION['message']; ?></h5>

                    </div>
                <?php } ?>
                <!-- /.card-body -->
            </div>
        </div>
</div>

<script type="text/javascript">
    $(document).ready(function ()
    {
        $('#click1').on('click', function(){

            if(this.checked){

                $('#pass1').show(500);

            } else {

                $('#pass1').hide(500);

            }
        })

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
    })

    function Auth_delete() {

        Swal.fire({
            title: 'Vous-étes sure!',
            text: "Désactiver l'authentification google!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Désactiver!',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.value) {
                window.location.href = "<?=base_url()?>index.php/user/auth_desactive";
            }
        })

    }

</script>