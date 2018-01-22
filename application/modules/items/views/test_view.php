<div class="right_col" role="main">  
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Inventory</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="x_panel" style="width:74em;">
                                <div class="x_content" id="tableBody">
                                    <center>
                                        <table id="dataTableServer" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Description</th>
                                                    <th>Inventory</th>
                                                    <th>Unit Price</th>
                                                    <th>Reserved Quantity</th>
                                                    <th>Brand</th>
                                                    <th>Rim</th>
                                                    <th>Pattern</th>
                                                    <th>Category</th>
                                                    <th>Item Ledger</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <th>Description</th>
                                                <th>Inventory</th>
                                                <th>Unit Price</th>
                                                <th>Reserved Quantity</th>
                                                <th>Brand</th>
                                                <th>Rim</th>
                                                <th>Pattern</th>
                                                <th>Category</th>
                                                <th>Item Ledger</th>
                                            </tfoot>
                                        </table>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- Modal -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModal2" id="myModal2" style="padding: 1em;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div id="itemLedgerTBody" style="margin: 1em;"><center><div class="loader"></div>Loading...</center></div>
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
    $(document).ready(function() {
        $('#dataTableServer').DataTable( {
            processing: true,
            serverSide: true,
            ajax: "<?= @base_url('items/serversideprocessing');?>",
            search : {
                'smart' : false,
                'delay' : 10000,
                'type' : 'blur'
            }
            // "deferLoading": 100
        });
        $('.modal').on('hidden.bs.modal', function(e){ 
            $(this).removeData();
        });

        $('.load-modal').on('click', function(e){
            e.preventDefault();
            $('#myModal2').modal('show');
        });

    });
</script>