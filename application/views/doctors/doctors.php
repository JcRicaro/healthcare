<div class="ui segment">

<a class="ui blue button" href="<?php echo site_url('doctor/add'); ?>">Add doctor</a>

<table class="ui basic table">
	<thead>
		<tr>
			<th>Name</th>
			<th>Address</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($doctors as $doctor): ?>
		<tr>
			<td><?php echo $doctor->lastname; ?>, <?php echo $doctor->firstname; ?></td>
			<td><?php echo $doctor->address; ?></td>
			<td><i class="edit link icon" data-id="<?php echo $doctor->id; ?>"></i></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
</div>


<script type="text/javascript">
	$(document).ready(function() {
		$(".link").click(function() {
			window.location = "<?php echo site_url('doctor'); ?>/view/" + $(this).attr('data-id');
		});
	});
</script>