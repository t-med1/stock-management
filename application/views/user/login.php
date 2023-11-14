<?php
    $ste_name = $this->session->userdata("STE");
    if(empty($ste_name)) { $ste_name = "FES MARKETING SERVICE"; }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>:: <?=$ste_name?> | Connexion ::</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" href="<?=base_url()?>assets/favicon.png">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/google_fonts.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <img src="<?=base_url()?>assets/logo.png" style="width:85%;">
    </div>
    <div class="login-box-body">
        <p class="login-box-msg"><strong><?=$ste_name?></strong></p>
        <?php
            $flash = $this->session->flashdata("error");
            if(!empty($flash)):
        ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> <?=$flash["title"]?></h4>
            <?=$flash["message"]?>
        </div>
        <?php endif; ?>
        <form action="<?=base_url()?>index.php/user/login" method="post">
            <div class="form-group has-feedback">
                <input type="text" name="username" class="form-control" placeholder="Identifiant" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <span> si vous avez activer authentification google </span>
            <div class="form-group has-feedback">
                <input type="number" id="number" class="form-control" name="code" placeholder="Code authentification google">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fab fa-google"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-danger btn-block btn-flat"><i class="fa fa-sign-in"></i>&nbsp; Connexion</button>
                </div>
            </div>
        </form>
    </div>
    <div style="text-align: center; margin-top: 10px;">
        <span style="font-size: 12px;">2019 - <?=date("Y")?> &copy; <a href="https://www.fes-marketing.net/" target="_blank"><strong>Fes Marketing Service</strong></a>. Tous Droits Réservés.</span>
    </div>

</div>
<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
