<div class="row">

    <div class="col-md-12">

        <div class="box box-default box-solid">

            <div class="box-header with-border">

                <h3 class="box-title">Liste de Transports</h3>

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

                        <table id="myDataTable" class="table myDataTable table-bordered table-striped fournisseursTable">

                            <thead>

                            <th>Code</th>

                            <th>Livreur</th>

                            <th>Matricule</th>

                            <th>Téléphone</th>

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

            [ 0, "desc" ],

            [ [20, 50, 100, -1], [20, 50, 100, "Tous"] ],

            "#export_btns",

            null,

            "S",

            "<?=base_url()?>index.php/transport/getData<?=!empty($is_archive) && $is_archive ? "/archive" : ""?>",

            [

                { data: 'code_transport' },

                { data: 'livreur' },

                { data: 'matricule' },

                { data: 'telephone' },

                { data: 'options' }

            ]

        );



    });

</script>