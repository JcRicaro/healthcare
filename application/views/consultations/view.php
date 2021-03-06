<!-- <div class="ui breadcrumb">
	
</div> -->

<div class="ui blue segment">
	<div class="ui blue label ribbon">Patients info</div>
	
	<div class="ui grid">
		<div class="ten wide column">
		<br>
			<div class="ui list">
				<div class="item">
					<div class="header">Name</div>
					<br>
					<?php echo $consultation->patient->get()->lastname; ?>, <?php echo $consultation->patient->get()->firstname; ?>
			</div>
		</div>

		<div class="item">
			<div class="header"><strong>Gender</strong></div>
			<br>
			<?php echo $consultation->patient->get()->gender; ?>
		</div>
	</div>
	</div>

	<br>
	<div class="ui blue label ribbon">Consultation Data</div>

	<div class="ui list">
		<div class="item">
			<div class="header">Observation</div>
			<?php echo $consultation->observation; ?>
		</div>
		<div class="item">
			<div class="header">Examination</div>
			<?php echo $consultation->examination; ?>
		</div>
		<div class="item">
			<div class="header">Prescription</div>
			<?php echo $consultation->prescription; ?>
		</div>
	</div>

</div>