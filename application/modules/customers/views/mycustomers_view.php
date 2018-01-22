<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<?= @$thead; ?>
		</tr>
	</thead>
	<tbody>
		<?= @$table; ?>
	</tbody>
</table>
<script type="text/javascript">
	$("table").DataTable();
</script>