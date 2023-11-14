<div class="row">
    <div class="col-lg-3 col-xs-6">
        <a href="<?=base_url()?>index.php/archive/clients">
            <div class="small-box bg-gray">
                <div class="inner">
                    <h3><?=$nbr_clients?></h3>
                    <p>CLIENTS</p>
                </div>
                <div class="icon">
                    <i class="fa fa-archive"></i>
                </div>
                <span class="small-box-footer">Plus de Détails &nbsp;&nbsp; <i class="fa fa-arrow-circle-right"></i></span>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-xs-6">
        <a href="<?=base_url()?>index.php/archive/fournisseurs">
            <div class="small-box bg-gray">
                <div class="inner">
                    <h3><?=$nbr_fourniseurs?></h3>
                    <p>FOURNISSEURS</p>
                </div>
                <div class="icon">
                    <i class="fa fa-archive"></i>
                </div>
                <span class="small-box-footer">Plus de Détails &nbsp;&nbsp; <i class="fa fa-arrow-circle-right"></i></span>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-xs-6">
        <a href="<?=base_url()?>index.php/archive/produits">
            <div class="small-box bg-gray">
                <div class="inner">
                    <h3><?=$nbr_produits?></h3>
                    <p>PRODUITS</p>
                </div>
                <div class="icon">
                    <i class="fa fa-archive"></i>
                </div>
                <span class="small-box-footer">Plus de Détails &nbsp;&nbsp; <i class="fa fa-arrow-circle-right"></i></span>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-xs-6">
        <a href="<?=base_url()?>index.php/archive/categories">
            <div class="small-box bg-gray">
                <div class="inner">
                    <h3><?=$nbr_categories?></h3>
                    <p>CATEGORIES</p>
                </div>
                <div class="icon">
                    <i class="fa fa-archive"></i>
                </div>
                <span class="small-box-footer">Plus de Détails &nbsp;&nbsp; <i class="fa fa-arrow-circle-right"></i></span>
            </div>
        </a>
    </div>
    <?php if(_ENABLE_SUB_CATEGORIE_): ?>
    <div class="col-lg-3 col-xs-6">
        <a href="<?=base_url()?>index.php/archive/sub_categories">
            <div class="small-box bg-gray">
                <div class="inner">
                    <h3><?=$nbr_sub_categories?></h3>
                    <p>SOUS-CATEGORIES</p>
                </div>
                <div class="icon">
                    <i class="fa fa-archive"></i>
                </div>
                <span class="small-box-footer">Plus de Détails &nbsp;&nbsp; <i class="fa fa-arrow-circle-right"></i></span>
            </div>
        </a>
    </div>
    <?php endif; ?>
    <?php if(_ENABLE_SERVICE_): ?>
    <div class="col-lg-3 col-xs-6">
        <a href="<?=base_url()?>index.php/archive/services">
            <div class="small-box bg-gray">
                <div class="inner">
                    <h3><?=$nbr_services?></h3>
                    <p>SERVICES</p>
                </div>
                <div class="icon">
                    <i class="fa fa-archive"></i>
                </div>
                <span class="small-box-footer">Plus de Détails &nbsp;&nbsp; <i class="fa fa-arrow-circle-right"></i></span>
            </div>
        </a>
    </div>
    <?php endif; ?>
</div>