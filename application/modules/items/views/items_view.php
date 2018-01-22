<div class="wrapper wrapper-content">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Item Catalog</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Description</th>
                                    <th>Inventory</th>
                                    <th>Unit Price</th>
                                    <th>Brand</th>
                                    <th>Rim</th>
                                    <th>Pattern</th>
                                    <th>Category</th>
                                    <th>Item Ledger</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?= @$inventory; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- Modal -->
<div id="myModal2" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <center>
                <h3><span>Item Ledger</span> <span id="itemLegderName"></span></h3>
                <div class="table-responsive">
                    <table id="myTab"  class="table table-striped">
                        <thead ><!-- style="background-color:#FFF;" -->
                            <tr>
                                <th>Location Code</th>
                                <th>Quantity</th>                    
                            </tr>
                        </thead>
                        <tbody id="itemLedgerTBody" style="text-align:center;">

                        </tbody>
                    </table>
                </div>
            </center>
        </div>
    </div>
</div>
<script type="text/javascript">
    function load_leadger(item)
        {
            $("#itemLedgerTBody").html('Loading...');
            $.post("<?= @base_url();?>items/UniqueLedger/",{"item":item},function(data){
                // console.log(data);
                obj = JSON.parse(data);
                $("#itemLedgerTBody").html(obj);
            });
        }
    $(document).ready(function(){
        $("#dataTable").DataTable();
    });
</script>