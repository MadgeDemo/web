<table id="myTab"  class="table table-striped">
    <thead ><!-- style="background-color:#FFF;" -->
        <tr>
            <th>Location Code</th>
            <th>Quantity</th>                    
        </tr>
    </thead>
    <tbody style="text-align:center;">
        <?= @$table; ?>
    </tbody>
</table>
<script type="text/javascript">
    $(document).ready(function(){
        $("#myTab").DataTable();
    });
</script>