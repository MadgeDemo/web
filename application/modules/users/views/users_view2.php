<div class="right_col" role="main">  
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Registered Users</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="x_panel" style="width:77em;">
                                <div class="x_content">

                                    <table id="dataTable" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                               <th>#</th>
                                                <th>No.</th>
                                                <th>First Name</th>
                                                <th>Middle Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?= @$users; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <script type="text/javascript">
    function alterStatus(id,status){
        data = {
                "id" : id,
                "status" : status
                };

        $.post("<?= @base_url('users/change_status');?>",data,function(data){
            location.reload();
        });
    }
</script>