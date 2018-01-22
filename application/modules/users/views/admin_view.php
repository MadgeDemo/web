<div class="wrapper wrapper-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Administrators</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No.</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Created By</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?= $admins; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Employees</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped">
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
                                    <?= $employees; ?>
                                </tbody>
                            </table>
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

    function upgradeStatus(id,role) {
        data = {
                "id" : id,
                "role" : role
                };

        $.post("<?= @base_url('users/upgrade_status');?>",data,function(data){
            location.reload();
        });
    }
</script>