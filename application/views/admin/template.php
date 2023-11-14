<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>:: <?=$this->session->userdata("STE")?> | <?=$title?> ::</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="icon" href="<?=base_url()?>assets/favicon.png">

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/dist/css/datatables.min.css"/>

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/bower_components/select2/dist/css/select2.min.css">

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/bower_components/morris.js/morris.css">

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/dist/css/skins/skin-red.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/google_fonts.css">

    <style rel="stylesheet" type="text/css">

        .content-wrapper .content-header { padding: 8px 8px 0 8px !important; }

        .content-wrapper .content-header h1 { padding: 7px 10px !important; border-radius: 5px !important; background-color: #dadce0 !important; }

        .label { font-size: 80% !important; }

        .current-width { white-space: nowrap; width: 1%; }

        .swal2-modal { font-size: initial !important; }

        .myDataTable tbody td { font-size: 12px !important; vertical-align: middle !important; }

        .table tbody td { vertical-align: middle !important; }

        .tr_gratuit { background: rgb(255, 222, 119) !important; }

        .tr_back { background: #AED6F1 !important; }

        .tr_broken { background: #E6B0AA !important; }

        .select2-container--default .select2-results__option[aria-disabled=true] { display: none; }

        .popover img { width: 55px !important; height: 55px !important; border: 1px solid black; }

        .produitPopup { font-weight: 600; color: #9d5c00; }

        .clientsTable tr td:last-child, .fournisseursTable tr td:last-child, .produitsTable tr td:last-child { white-space: nowrap; width: 1%; }

        @media print {

            a[href]:after {

                content: none !important;

            }

        }

    </style>

    <script type="text/javascript" src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>

</head>

<body class="hold-transition skin-red sidebar-mini">

<div class="wrapper">



    <!-- Main Header -->

    <header class="main-header">



        <!-- Logo -->

        <a href="<?=base_url()?>index.php/accueil" class="logo">

            <span class="logo-mini"><b>A</b>G</span>

            <!-- logo for regular state and mobile devices -->

            <span class="logo-lg"><b>ATLAS </b>GESTION</span>

        </a>



        <!-- Header Navbar -->

        <nav class="navbar navbar-static-top" role="navigation">

            <!-- Sidebar toggle button-->

            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

                <span class="sr-only">Toggle navigation</span>

            </a>

            <!-- Navbar Right Menu -->

            <div class="navbar-custom-menu">

                <ul class="nav navbar-nav">

                    <!-- Notifications -->

                    <!-- User Account Menu -->

                    <li class="dropdown user user-menu">

                        <!-- Menu Toggle Button -->

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                            <!-- The user image in the navbar-->

                            <img src="<?=base_url()?>assets/favicon.png" class="user-image" alt="User Image">

                            <!-- hidden-xs hides the username on small devices so only the image appears. -->

                            <span class="hidden-xs"><?=$this->session->userdata("name_user")?> &nbsp; <i class="fa fa-caret-down" aria-hidden="true"></i></span>

                        </a>

                        <ul class="dropdown-menu">

                            <!-- The user image in the menu -->

                            <li class="user-header">

                                <img src="<?=base_url()?>assets/favicon.png" class="img-circle" alt="User Image">

                                <p style="margin-bottom: 0px;">

                                    <?=$this->session->userdata("name_user")?> <br>

                                    <small><?=$this->session->userdata("role_user")==1 ? "Administrateur" : "Gestionnaire"?></small>

                                </p>

                                <p style="margin-top: 0px; font-size: 10px;">

                                    <small>Connexion : &nbsp; <?=$this->session->userdata("last_login")?></small>

                                </p>

                            </li>

                            <!-- Menu Footer-->

                            <li class="user-footer">

                                <div class="pull-left">

                                    <a href="<?=base_url()?>index.php/user/profile" class="btn btn-default btn-flat"><i class="fa fa-user"></i>&nbsp; Profile</a>

                                </div>

                                <div class="pull-right">

                                    <a href="<?=base_url()?>index.php/user/logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i>&nbsp; Déconnexion</a>

                                </div>

                                <?php if($this->session->userdata("role_user")==1): ?>

                                <br>

                                <div style="margin-top: 25px;width: 100%;">

                                    <a href="<?=base_url()?>index.php/admin/backup/download" class="btn btn-default btn-flat" style="width: 100%;text-align: left;"><i class="fa fa-database"></i>&nbsp; Backup</a>

                                </div>

                                <div style="margin-top: 10px;width: 100%;">

                                    <a href="<?=base_url()?>index.php/admin/historique" class="btn btn-default btn-flat" style="width: 100%;text-align: left;"><i class="fa fa-clock-o"></i>&nbsp; Journal d'activités</a>

                                </div>

                                <div style="margin-top: 10px;width: 100%;">

                                    <a href="<?=base_url()?>index.php/archive" class="btn btn-default btn-flat" style="width: 100%;text-align: left;"><i class="fa fa-archive"></i>&nbsp; Archives</a>

                                </div>

                                <div style="margin-top: 10px;width: 100%;">

                                    <a href="<?=base_url()?>index.php/admin/settings" class="btn btn-default btn-flat" style="width: 100%;text-align: left;"><i class="fa fa-cog"></i>&nbsp; Paramètres</a>

                                </div>

                                <?php endif; ?>

                            </li>

                        </ul>

                    </li>

                </ul>

            </div>

        </nav>

    </header>

    <!-- Left side column. contains the logo and sidebar -->

    <aside class="main-sidebar">



        <!-- sidebar: style can be found in sidebar.less -->

        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->

            <div class="user-panel" style="margin-top: 10px; margin-bottom: 18px;">

                <div class="pull-left image">

                    <img src="<?=base_url()?>assets/favicon.png" class="img-circle" alt="User Image">

                </div>

                <div class="pull-left info">

                    <p><?=$this->session->userdata("name_user")?></p>

                    <!-- Status -->

                    <a href="#"><i class="fa fa-circle text-success"></i> En Ligne</a>

                </div>

            </div>

            <!-- Sidebar Menu -->

            <ul class="sidebar-menu" data-widget="tree" style="margin-top: 5px;">



                <li class="header">MENU</li>

                <li class="<?=$active=="ACC"?"active":""?>"><a href="<?=base_url()?>index.php/accueil"><i class="fa fa-star"></i> <span>Accueil</span></a></li>

                <li class="treeview <?=$active=="CL"||$active=="CL-ADD"?"active":""?>">

                    <a href="#"><i class="fa fa-users"></i> <span>Clients</span>

                        <span class="pull-right-container">

                            <i class="fa fa-angle-left pull-right"></i>

                        </span>

                    </a>

                    <ul class="treeview-menu">

                        <li class="<?=$active=="CL-ADD"?"active":""?>"><a href="<?=base_url()?>index.php/client/ajouter"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Ajouter Client</a></li>

                        <li class="<?=$active=="CL"?"active":""?>"><a href="<?=base_url()?>index.php/client"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Liste de Clients</a></li>

                    </ul>

                </li>

                <li class="treeview <?=$active=="CT"||$active=="CT-ADD"||$active=="SCT"||$active=="SCT-ADD"?"active":""?>">

                    <a href="#"><i class="fa fa-dropbox"></i> <span>Catégories</span>

                        <span class="pull-right-container">

                            <i class="fa fa-angle-left pull-right"></i>

                        </span>

                    </a>

                    <ul class="treeview-menu">

                        <?php if($this->session->userdata("role_user") == 1): ?>

                            <li class="<?=$active=="CT-ADD"?"active":""?>"><a href="<?=base_url()?>index.php/categorie/ajouter"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Ajouter Catégorie</a></li>

                        <?php endif; ?>

                        <li class="<?=$active=="CT"?"active":""?>"><a href="<?=base_url()?>index.php/categorie"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Liste de Catégories</a></li>

                        <?php if(_ENABLE_SUB_CATEGORIE_): ?>

                            <?php if($this->session->userdata("role_user") == 1): ?>

                                <li class="<?=$active=="SCT-ADD"?"active":""?>"><a href="<?=base_url()?>index.php/sub_categorie/ajouter"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Ajouter Sous-Catégorie</a></li>

                            <?php endif; ?>

                            <li class="<?=$active=="SCT"?"active":""?>"><a href="<?=base_url()?>index.php/sub_categorie"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Liste de Sous-Catégories</a></li>

                        <?php endif; ?>

                    </ul>

                </li>

                <li class="treeview <?=$active=="PR"||$active=="PR-ADD"||$active=="PR-END"?"active":""?>">

                    <a href="#"><i class="fa fa-dropbox"></i> <span>Produits</span>

                        <span class="pull-right-container">

                            <i class="fa fa-angle-left pull-right"></i>

                        </span>

                    </a>

                    <ul class="treeview-menu">

                        <?php if($this->session->userdata("role_user") == 1): ?>

                        <li class="<?=$active=="PR-ADD"?"active":""?>"><a href="<?=base_url()?>index.php/produit/ajouter"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Ajouter Produit</a></li>

                        <?php endif; ?>

                        <li class="<?=$active=="PR"?"active":""?>"><a href="<?=base_url()?>index.php/produit"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Liste de Produits</a></li>

                        <li class="<?=$active=="PR-END"?"active":""?>"><a href="<?=base_url()?>index.php/produit/e_liste"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Produits Endommagés</a></li>

                    </ul>

                </li>

                <?php if(_ENABLE_PRODUCTION_): ?>

                <li class="treeview <?=$active=="PRD"||$active=="PRD-NEW"||$active=="PRD-ADD"||$active=="DEM"||$active=="DEM-NEW"?"active":""?>">

                    <a href="#"><i class="fa fa-dropbox"></i> <span>Production</span>

                        <span class="pull-right-container">

                            <i class="fa fa-angle-left pull-right"></i>

                        </span>

                    </a>

                    <ul class="treeview-menu">

                        <?php if($this->session->userdata("role_user") == 1): ?>

                        <li class="<?=$active=="PRD-NEW"?"active":""?>"><a href="<?=base_url()?>index.php/produit/prc_ajouter"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Créer Produit Composé</a></li>

                        <?php endif; ?>

                        <li class="<?=$active=="PRD-ADD"?"active":""?>"><a href="<?=base_url()?>index.php/production/nouvelle"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Nouvelle Production</a></li>

                        <li class="<?=$active=="PRD"?"active":""?>"><a href="<?=base_url()?>index.php/production"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Historique de Production</a></li>

                        <?php if(_ENABLE_DEMONTAGE_): ?>

                        <li class="<?=$active=="DEM-NEW"?"active":""?>"><a href="<?=base_url()?>index.php/demontage/demonter"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Démonter Produit</a></li>

                        <li class="<?=$active=="DEM"?"active":""?>"><a href="<?=base_url()?>index.php/demontage"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Historique de Démontage</a></li>

                        <?php endif; ?>

                    </ul>

                </li>

                <?php endif; ?>

                <?php if(_ENABLE_SERVICE_): ?>

                <li class="treeview <?=$active=="SR"||$active=="SR-ADD"?"active":""?>">

                    <a href="#"><i class="fa fa-tags"></i> <span>Services</span>

                        <span class="pull-right-container">

                            <i class="fa fa-angle-left pull-right"></i>

                        </span>

                    </a>

                    <ul class="treeview-menu">

                        <li class="<?=$active=="SR-ADD"?"active":""?>"><a href="<?=base_url()?>index.php/service/ajouter"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Ajouter Service</a></li>

                        <li class="<?=$active=="SR"?"active":""?>"><a href="<?=base_url()?>index.php/service"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Liste de Services</a></li>

                    </ul>

                </li>

                <?php endif;?>

                <li class="treeview <?=$active=="VT"||$active=="VT-RPD"||$active=="VT-ADD"||$active=="VT-DV"||$active=="VT-CMD"?"active":""?>">

                    <a href="#"><i class="fa fa-list-alt"></i> <span>Ventes</span>

                        <span class="pull-right-container">

                            <i class="fa fa-angle-left pull-right"></i>

                        </span>

                    </a>

                    <ul class="treeview-menu">

                        <li class="<?=$active=="VT-RPD"?"active":""?>"><a href="<?=base_url()?>index.php/vente/rapide"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Vente au Comptoir</a></li>

                        <li class="<?=$active=="VT-ADD"?"active":""?>"><a href="<?=base_url()?>index.php/vente/ajouter"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Vente Client</a></li>

                        <li class="<?=$active=="VT"?"active":""?>"><a href="<?=base_url()?>index.php/vente"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Liste de Ventes</a></li>

                        <li class="<?=$active=="VT-DV"?"active":""?>"><a href="<?=base_url()?>index.php/devis"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Devis / Clients</a></li>

                        <li class="<?=$active=="VT-CMD"?"active":""?>"><a href="<?=base_url()?>index.php/client_cmd"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Commandes / Clients</a></li>

                        <li class="<?=$active=="VT-FACT"?"active":""?>"><a href="<?=base_url()?>index.php/vente/factures"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Liste de Factures</a></li>

                    </ul>

                </li>

                <li class="treeview <?=$active=="AV"||$active=="AV-ADD"?"active":""?>">

                    <a href="#"><i class="fa fa-refresh"></i> <span>Bons d'Avoir</span>

                        <span class="pull-right-container">

                            <i class="fa fa-angle-left pull-right"></i>

                        </span>

                    </a>

                    <ul class="treeview-menu">

                        <li class="<?=$active=="AV-ADD"?"active":""?>"><a href="<?=base_url()?>index.php/avoir/ajouter"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Enregistrer Bon d'Avoir</a></li>

                        <li class="<?=$active=="AV"?"active":""?>"><a href="<?=base_url()?>index.php/avoir"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Liste de Bons d'Avoir</a></li>

                    </ul>

                </li>



                <?php if($this->session->userdata("role_user") == 1): ?>

                <li class="header">ADMINISTRATION</li>

                <li class="treeview <?=$active=="US"||$active=="US-ADD"?"active":""?>">

                    <a href="#"><i class="fa fa-user"></i> <span>Commerciaux</span>

                        <span class="pull-right-container">

                            <i class="fa fa-angle-left pull-right"></i>

                        </span>

                    </a>

                    <ul class="treeview-menu">

                        <li class="<?=$active=="US-ADD"?"active":""?>"><a href="<?=base_url()?>index.php/user/ajouter"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Ajouter Commercial</a></li>

                        <li class="<?=$active=="US"?"active":""?>"><a href="<?=base_url()?>index.php/user/liste"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Liste de Commerciaux</a></li>

                    </ul>

                </li>

                <li class="treeview <?=$active=="TR"||$active=="TR-ADD"?"active":""?>">

                    <a href="#"><i class="fa fa-truck"></i> <span>Transports</span>

                        <span class="pull-right-container">

                        <i class="fa fa-angle-left pull-right"></i>

                    </span>

                    </a>

                    <ul class="treeview-menu">

                        <li class="<?=$active=="TR-ADD"?"active":""?>"><a href="<?=base_url()?>index.php/transport/ajouter"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Ajouter Transport</a></li>

                        <li class="<?=$active=="TR"?"active":""?>"><a href="<?=base_url()?>index.php/transport"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Liste de Transports</a></li>

                    </ul>

                </li>

                <li class="treeview <?=$active=="FS"||$active=="FS-ADD"?"active":""?>">

                    <a href="#"><i class="fa fa-building"></i> <span>Fournisseurs</span>

                        <span class="pull-right-container">

                        <i class="fa fa-angle-left pull-right"></i>

                    </span>

                    </a>

                    <ul class="treeview-menu">

                        <li class="<?=$active=="FS-ADD"?"active":""?>"><a href="<?=base_url()?>index.php/fournisseur/ajouter"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Ajouter Fournisseur</a></li>

                        <li class="<?=$active=="FS"?"active":""?>"><a href="<?=base_url()?>index.php/fournisseur"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Liste de Fournisseurs</a></li>

                    </ul>

                </li>

                <li class="treeview <?=$active=="AC"||$active=="AC-ADD"||$active=="AC-CMD"?"active":""?>">

                    <a href="#"><i class="fa fa-shopping-cart"></i> <span>Achats</span>

                        <span class="pull-right-container">

                        <i class="fa fa-angle-left pull-right"></i>

                    </span>

                    </a>

                    <ul class="treeview-menu">

                        <li class="<?=$active=="AC-ADD"?"active":""?>"><a href="<?=base_url()?>index.php/achat/ajouter"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Enregistrer Achat</a></li>

                        <li class="<?=$active=="AC"?"active":""?>"><a href="<?=base_url()?>index.php/achat"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Liste d'Achats</a></li>

                        <li class="<?=$active=="AC-CMD"?"active":""?>"><a href="<?=base_url()?>index.php/commande"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Commandes / Fournisseurs</a></li>

                    </ul>

                </li>

                <li class="treeview <?=$active=="IV"||$active=="IV-ADD"?"active":""?>">

                    <a href="#"><i class="fa fa-th-large"></i> <span>Inventaire</span>

                        <span class="pull-right-container">

                        <i class="fa fa-angle-left pull-right"></i>

                    </span>

                    </a>

                    <ul class="treeview-menu">

                        <li class="<?=$active=="IV-ADD"?"active":""?>"><a href="<?=base_url()?>index.php/inventaire/nouveau"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Nouveau Inventaire</a></li>

                        <li class="<?=$active=="IV"?"active":""?>"><a href="<?=base_url()?>index.php/inventaire"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Historique</a></li>

                    </ul>

                </li>



                <?php if(_ENABLE_CAISSE_): ?>

                    <li class="<?=$active=="CSE"?"active":""?>"><a href="<?=base_url()?>index.php/caisse"><i class="fa fa-money"></i> <span>Caisse</span></a></li>

                <?php endif; ?>



                <li class="treeview <?=$active=="RP-SA"||$active=="RP-SR"||$active=="RP-PV"||$active=="RP-RGC"||$active=="RP-RGF"||$active=="RP-UD"||$active=="RP-RFB"||$active=="RP-CA"?"active":""?>">

                    <a href="#"><i class="fa fa-book"></i> <span>Rapports</span>

                        <span class="pull-right-container">

                            <i class="fa fa-angle-left pull-right"></i>

                        </span>

                    </a>

                    <ul class="treeview-menu">

                        <li class="<?=$active=="RP-SA"?"active":""?>"><a href="<?=base_url()?>index.php/admin/stock_alert"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Rapport Stock Alert</a></li>

                        <li class="<?=$active=="RP-SR"?"active":""?>"><a href="<?=base_url()?>index.php/admin/stock_reel"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Rapport Stock Réel</a></li>

                        <li class="<?=$active=="RP-PV"?"active":""?>"><a href="<?=base_url()?>index.php/admin/produits_vendus"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Rapport Produits Vendus</a></li>

                        <li class="<?=$active=="AC"?"active":""?>"><a href="<?=base_url()?>index.php/admin/commandes"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Rapport Commandes</a></li>

                        <li class="<?=$active=="RP-RGC"?"active":""?>"><a href="<?=base_url()?>index.php/admin/releve_general_clients"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; R.G de Clients</a></li>

                        <li class="<?=$active=="RP-RGF"?"active":""?>"><a href="<?=base_url()?>index.php/admin/releve_general_fournisseurs"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; R.G de Fournisseurs</a></li>

                        <li class="<?=$active=="RP-UD"?"active":""?>"><a href="<?=base_url()?>index.php/admin/users_details"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Détails de Commerciaux</a></li>

                        <li class="<?=$active=="RP-RFB"?"active":""?>"><a href="<?=base_url()?>index.php/admin/revenu_frais_benefices"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Revenu / Frais / Bénéfices</a></li>

                        <li class="<?=$active=="RP-CA"?"active":""?>"><a href="<?=base_url()?>index.php/admin/chiffre_affaires"><i class="fa fa-fw fa-long-arrow-right"></i>&nbsp; Chiffre d'affaires</a></li>

                    </ul>

                </li>

                <?php endif; ?>



            </ul>

            <!-- /.sidebar-menu -->

        </section>

        <!-- /.sidebar -->

    </aside>



    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">

        <!-- Content Header (Page header) -->

        <section class="content-header">

            <h1> <?=$title?> </h1>

        </section>



        <!-- Main content -->

        <section class="content container-fluid">



            <!--------------------------

              | Your Page Content Here |

              --------------------------->



            <?php

                $flash = $this->session->flashdata("message");

                if(!empty($flash)):

            ?>

                <div class="row">

                    <div class="col-md-12">

                        <div class="alert alert-success alert-dismissible">

                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                            <h4><i class="icon fa fa-check"></i> <?=$flash["title"]?></h4>

                            <?=$flash["message"]?>

                        </div>

                    </div>

                </div>

            <?php endif; ?>

            <?php

                $flash = $this->session->flashdata("warning");

                if(!empty($flash)):

            ?>

                <div class="row">

                    <div class="col-md-12">

                        <div class="alert alert-warning alert-dismissible">

                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                            <h4><i class="icon fa fa-exclamation-circle"></i> <?=$flash["title"]?></h4>

                            <?=$flash["message"]?>

                        </div>

                    </div>

                </div>

            <?php endif; ?>



            <?php $this->load->view($view); ?>



        </section>

        <!-- /.content -->

    </div>

    <!-- /.content-wrapper -->



    <!-- Main Footer -->

    <footer class="main-footer">

        <!-- Default to the left -->

        <strong>2019 - <?=date("Y")?> &copy; <a href="https://www.fes-marketing.net/" target="_blank">Fes Marketing Service</a>.</strong> Tous Droits Réservés.

        <div class="pull-right hidden-xs">

            <b>Version</b> 3.0

        </div>

    </footer>



</div>

<!-- ./wrapper -->



<div id="myModalImage" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title"></h4>

            </div>

            <div class="modal-body" style="text-align: center;">

                <img style="border: 2px solid black; max-width: 100%;" src="" />

            </div>

        </div>



    </div>

</div>



<script type="text/javascript" src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?=base_url()?>assets/dist/js/jquery.maskedinput.min.js"></script>

<script type="text/javascript" src="<?=base_url()?>assets/dist/js/datatables.min.js"></script>

<script type="text/javascript" src="<?=base_url()?>assets/dist/js/jquery-datatable-fr.js"></script>

<script type="text/javascript" src="<?=base_url()?>assets/bower_components/raphael/raphael.min.js"></script>

<script type="text/javascript" src="<?=base_url()?>assets/bower_components/morris.js/morris.min.js"></script>

<script type="text/javascript" src="<?=base_url()?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>

<script type="text/javascript" src="<?=base_url()?>assets/dist/js/sweetalert2.all.min.js"></script>

<script type="text/javascript" src="<?=base_url()?>assets/bower_components/jsbarcode/JsBarcode.all.min.js"></script>

<script type="text/javascript" src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>

<script type="text/javascript">

    // PHP VARS TO JS

    var _base_url_ = '<?=base_url()?>';

    var _refresh_ = <?=_REFRESH_?>;

    var _enable_sub_categorie_ = <?=_ENABLE_SUB_CATEGORIE_ ? "true" : "false"?>;

</script>

<script type="text/javascript" src="<?=base_url()?>assets/functions.js?v=<?=_REFRESH_?>"></script>

<script type="text/javascript">

    $(document).ready(function ()

    {

        $('[data-toggle="tooltip"]').tooltip();

        fixPopupProduit();

    });

</script>

</body>

</html>