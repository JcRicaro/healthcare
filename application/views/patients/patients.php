
<div class="ui segment">
<a href="<?php echo site_url('patients/add'); ?>" class="ui blue button"><i class="add icon"></i>Register</a>
<?php if($patients): ?>
	<table class="ui basic table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Address</th>
				<th>Last Accessed by</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($patients as $patient): ?>
			<tr>
				<td><?php echo $patient->lastname; ?>, <?php echo $patient->firstname; ?></td>
				<td><?php echo $patient->address; ?></td>
				<td><?php echo $patient->user->get()->lastname; ?>, <?php echo $patient->user->get()->firstname; ?></td>
				<td><i class="edit link icon" title="Edit" data-id="<?php echo $patient->id; ?>"></i> <i class="delete link icon" title="Delete"></i></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$(".edit").click(function() {
			window.location = "<?php echo site_url('patient/view'); ?>/" + $(this).attr('data-id');
		});

		$(".delete").click(function() {
			//todo: confimation modal
		});
	});
</script>