<div class="ui segment">

<a class="ui blue button" href="<?php echo site_url('doctor/add'); ?>">Add doctor</a>
<br/><br/>
<table class="ui basic table" id="table">
	<thead>
		<tr>
			<th>Name</th>
			<th>Specialization</th>
			<th>Consultation Hours</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($doctors as $doctor): ?>
		<tr>
			<td><?php echo $doctor->lastname; ?>, <?php echo $doctor->firstname; ?></td>
			<td><?php echo $doctor->specialization; ?></td>
			<td><?php echo $doctor->consultation; ?></td>
			<td>
				<i class="edit link icon" data-id="<?php echo $doctor->id; ?>"></i>
				<i class="delete link icon" data-id="<?php echo $doctor->id; ?>"></i>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
</div>


<script type="text/javascript">
	$(document).ready(function() {
		$(".edit").click(function() {
			window.location = "<?php echo site_url('doctor'); ?>/view/" + $(this).attr('data-id');
		});

		$(".delete").click(function() {
			window.location = "<?php echo site_url('doctor/delete'); ?>/" + $(this).attr('data-id');
		});

		$.fn.dataTableExt.oStdClasses.sFilter = "ui form";

		$("#table").dataTable({
			'sFilter' : "field",
			'bLengthChange' : false,
			'bPaginate' : false,
			'bServerSide' : false
		});
	});
</script>