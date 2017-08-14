<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="purple">
                        <i class="material-icons">extension</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Modules</h4>
                        <div class="toolbar">
                            <?php //Here you can write extra buttons/actions for the toolbar ?>
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Module</th>
                                    <th>Version</th>
                                    <th>Description</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Module</th>
                                    <th>Version</th>
                                    <th>Description</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php foreach($modules as $module => $enabled): ?>
                                <tr>
                                    <td><?php echo packages($module, "name") ?></td>
                                    <td><?php echo packages($module, "version") ?></td>
                                    <td><?php echo packages($module, "description") ?></td>
                                    <td class="text-right">
                                        <?php if($enabled): ?>
                                            <a href="<?php echo site_url('/packages/settings/'.$module); ?>"><button class="btn btn-warning btn-xs">setting</button></a>
                                            <a href="<?php echo site_url('/packages/uninstall/'.$module); ?>"><button class="btn btn-danger btn-xs">uninstall</button></a>
                                        <?php else: ?>
                                            <a href="<?php echo site_url('/packages/install/'.$module); ?>"><button class="btn btn-info btn-xs">install</button></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        <?php if(($this->session->flashdata('success'))) : ?>
        $.notify({
            icon: "notifications",
            message: "<?php echo $this->session->flashdata('success'); ?>"

        },{
            type: "success",
            timer: 3000,
            placement: {
                from: "top",
                align: "right"
            }
        });
        <?php endif; ?>

        <?php if(($this->session->flashdata('warning'))) : ?>
        $.notify({
            icon: "notifications",
            message: "<?php echo $this->session->flashdata('warning'); ?>"

        },{
            type: "waring",
            timer: 3000,
            placement: {
                from: "top",
                align: "right"
            }
        });
        <?php endif; ?>

        <?php if(($this->session->flashdata('error'))) : ?>
        $.notify({
            icon: "notifications",
            message: "<?php echo $this->session->flashdata('error'); ?>"

        },{
            type: "danger",
            timer: 3000,
            placement: {
                from: "top",
                align: "right"
            }
        });
        <?php endif; ?>

        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });


        var table = $('#datatables').DataTable();

        // Edit record
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');

            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function(e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });

        //Like record
        table.on('click', '.like', function() {
            alert('You clicked on Like button');
        });

        $('.card .material-datatables label').addClass('form-group');
    });
</script>
