<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">playlist_add</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Play Todo</h4>
                <form method="post" action="<?php echo site_url("play/todo/")?>">
                    <div class="form-group label-floating">
                        <label class="control-label">Lets play your magic todo</label>
                        <input type="text" name="object[todo]" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-fill btn-rose">Save</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">playlist_play</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Todo List</h4>
                <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                        <tr>
                            <th>Module</th>
                            <th>Version</th>
                        </tr>
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
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo site_url('play/todo/get_list/')?>",
                "type": "POST"
            },

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