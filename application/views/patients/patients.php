
<div class="ui segment">
<a href="<?php echo site_url('patients/add'); ?>" class="ui blue button"><i class="add icon"></i>Register</a>
<?php if($patients): ?>
	<table class="ui basic table">
		<thead>
			<tr>
			<br>
				<th>Name</th>
				<th>Address</th>
				<th>Physician</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($patients as $patient): ?>
			<tr>
				<td><?php echo $patient->lastname; ?>, <?php echo $patient->firstname; ?></td>
				<td><?php echo $patient->address; ?></td>
				<td>
					<?php if($patient->user_id): ?>
					<?php echo $patient->user->get()->lastname; ?>, <?php echo $patient->user->get()->firstname; ?>
					<?php endif; ?>
				</td>
				<td><i class="edit link icon" title="Edit" data-id="<?php echo $patient->id; ?>"></i> <i class="delete link icon" title="Delete" data-id="<?php echo $patient->id; ?>"></i></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>
</div>

<div class="ui small modal">
	<div class="header">
	</div>
	<div class="content">
		Are you sure you want to delete this patient?
	</div>
	<div class="actions">
		<a href="#" id="mydelete" class="ui button">Delete</a>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$(".edit").click(function() {
			window.location = "<?php echo site_url('patient/view'); ?>/" + $(this).attr('data-id');
			return false;
		});

		$(".delete").click(function() {
			$("#mydelete").attr('data-id', $(this).attr('data-id'));
			$(".ui.small.modal").modal('show');
			return false;
		});

		$("#mydelete").click(function() {
			window.location = "<?php echo site_url('patient/delete'); ?>/" + $(this).attr('data-id');
			return false;
		});
	});
</script>