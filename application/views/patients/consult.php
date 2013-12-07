	<div class="ui grid">
		<div class="sixteen wide column">
			<div class="ui blue segment">
				<div class="ui blue ribbon label">Patient's information</div>
				
				<div class="ui grid">
					<div class="ten wide column">
					<br>
						<div class="ui list">
							<div class="item">
								<div class="header">Name</div>
								<?php echo $patient->firstname; ?> <?php echo $patient->middlename; ?> <?php echo $patient->lastname; ?>
							</div>
							<div class="item">
								<div class="header">Gender</div>
								<?php echo $patient->gender; ?>
							</div>
						</div>
					</div>
					<div class="six wide column">
					<h4 class="ui header"><?php echo date('M d, Y'); ?></h4>
					<div class="ui list">
						<div class="item">
							<div class="header">Height</div>
							<?php echo $patient->height; ?>
						</div>
						<div class="item">
							<div class="header">Weight</div>
							<?php echo $patient->weight; ?>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br/>
	<form id="consultation">
	<div class="ui grid">
		<div class="eight wide column">
			<div class="ui form blue segment">
				<div class="ui blue ribbon label">Observation</div>
				<br/><br/>
				<div class="field">
					<textarea placeholder="Observation" name="observation"></textarea>
				</div>
			</div>
		</div>
		<div class="eight wide column">	
			<div class="ui form blue segment">
				<div class="ui blue ribbon label">Examination</div>
				<br/><br/>
				<div class="field">
					<textarea placeholder="Examination" name="examination"></textarea>
				</div>

				<label>Upload a file</label>
				<input type="file">
			</div>
		</div>
	</div>
	<br/>
	<div class="ui grid">
		<div class="sixteen wide column">
			<div class="ui form segment">
				<div class="ui blue ribbon label">Prescription</div>
				<br/><br/>
				<div class="field">
					<textarea placeholder="Prescription" name="prescription"></textarea>
				</div>
			</div>
		</div>
	</div>

	</form>
	<br/>
	<a class="ui blue button" id="save">Save</a>

	<script type="text/javascript">
		$(document).ready(function() {
			$("#save").click(function() {
				$.post("<?php echo site_url('patient/consult_post/'. $patient->id); ?>", $("#consultation").serialize() + "&patient_id=<?php echo $patient->id; ?>", function() {

				}, 'json');
			});
			
		});
	</script>