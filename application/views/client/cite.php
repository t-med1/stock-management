<div class="row">
    <div class="col-md-12">
        <div class="box box-default box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Liste de Cites</h3>
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
                        <table id="myDataTable" class="table myDataTable table-bordered table-striped clientsTable">
                            <thead>
                            <th>Code</th>
                            <th>Commercial</th>
                            <th>Client</th>
                            <th>Résponsable</th>
                            <th>Adresse</th>
                            <th>Ville</th>
                            <th>Pays</th>
                            <th>Telephone</th>
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

    <script type="text/javascript">
        $(document).ready(function () {

            createDataTable(
                "#myDataTable",
                [ 0, "desc" ],
                [ [20, 50, 100, -1], [20, 50, 100, "Tous"] ],
                "#export_btns",
                null,
                "S",
                "<?php echo base_url('index.php/client/getDataForCite'); ?>", // Use base_url() here
                [
                    { data: 'code_client' },
                    { data: 'utilisateur' },
                    { data: 'full_name' },
                    { data: 'responsable' },
                    { data: 'adresse' },
                    { data: 'ville' },
                    { data: 'pays' },
                    { data: 'telephone' },
                    { data: 'options' }
                ]
            );

        });
    </script>

