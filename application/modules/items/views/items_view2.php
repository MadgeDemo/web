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
                                    <center><div class="loader"></div>Loading Inventory...</center>
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
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModal2" id="myModal2">
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
            $("#itemLedgerTBody").load("<?= @base_url('items/UniqueLedger');?>/"+item);
        }
    $(document).ready(function(){
        $("#tableBody").load("<?= @base_url('items/load_inventory'); ?>");
    });
</script>