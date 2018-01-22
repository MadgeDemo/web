<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>#</th>
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
	<tbody>
		<?= @$table; ?>
	</tbody>
</table>
<script type="text/javascript">
	$("table").DataTable();
</script>