<div class="right_col" role="main">  
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Customer Ledger</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="x_panel" style="width:77em;">
                                <div class="x_content" id="tableBody">
                                    <center><div class="loader"></div>Loading Ledger Entries...</center>
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
    $(document).ready(function(){
        $("#tableBody").load("<?= @base_url('customers/load_Ledger'); ?>");
    });
</script>