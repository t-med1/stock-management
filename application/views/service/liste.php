<div class="row">

    <div class="col-md-12">

        <div class="box box-default box-solid">

            <div class="box-header with-border">

                <h3 class="box-title">Liste de Services</h3>

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

                        <table id="myDataTable" class="table myDataTable table-bordered table-striped produitsTable">

                            <thead>

                            <th class="current-width no-export no-sort"><i class="fa fa-picture-o" aria-hidden="true"></i></th>

                            <th>Service</th>

                            <th>Catégorie</th>

                            <?php if(_ENABLE_SUB_CATEGORIE_): ?>

                                <th>Sous-Catégorie</th>

                            <?php endif; ?>

                            <th>P. Vente</th>

                            <th>Description</th>

                            <th class="current-width no-export no-sort">Options</th>

                            </thead>

                            <tbody>



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

            [ 2, "asc" ],

            [ [20, 50, 100, -1], [20, 50, 100, "Tous"] ],

            "#export_btns",

            null,

            "S",

            "<?=base_url()?>index.php/service/getData<?=!empty($is_archive) && $is_archive ? "/archive" : ""?>",

            [

                { data: 'image' },

                { data: 'service' },

                { data: 'categorie' },

                <?php if(_ENABLE_SUB_CATEGORIE_): ?>

                { data: 'sub_categorie' },

                <?php endif; ?>

                { data: 'prix_vente' },

                { data: 'description' },

                { data: 'options' }

            ]

        );



    });

</script>