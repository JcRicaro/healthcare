<div class="ui segment">
	<h3 class="ui header">Patient Profile</h3>
	<div class="ui form">
		<form id="patient">
		<div class="three fields">
			<div class="field">
				<label>Firstname</label>
				<input type="text" value="<?php echo $patient->firstname; ?>" placeholder="First Nmae" name="firstname">
			</div>
			<div class="field">
				<label>Middlename</label>
				<input type="text" value="<?php echo $patient->middlename; ?>" placeholder="Middle Name" name="middlename">
			</div>
			<div class="field">
				<label>Lastname</label>
				<input type="text" value="<?php echo $patient->lastname; ?>" placeholder="Last Name" name="lastname">
			</div>
		</div>

		<div class="three fields">
			<div class="field">
				<label>Age</label>
				<input type="text" value="<?php echo $patient->age; ?>" placeholder="Age" name="age">
			</div>
			<div class="field">
				<label>Nationality</label>
				<input type="text" value="<?php echo $patient->nationality; ?>" placeholder="Nationality" name="nationality">
			</div>
			<div class="field">
				<label>Birthdate</label>
				<input type="text" value="<?php echo $patient->birthdate; ?>" placeholder="Birthdate" name="birthdate">
			</div>
		</div>

		<div class="three fields">
			<div class="field">
				<label>Phone Number</label>
				<input type="text" value="<?php echo $patient->contact; ?>" placeholder="Phone Number" name="phone">
			</div>
			<div class="field">
				<label>Email Address</label>
				<input type="text" value="<?php echo $patient->email; ?>" placeholder="Email Address" name="email">
			</div>
			<div class="field">
				<label>Gender</label>
				<div class="ui selection dropdown">
  					<input type="hidden" name="gender" value="<?php echo $patient->gender; ?>">
					<div class="default text">Gender</div>
  					<i class="dropdown icon"></i>
  					<div class="menu">
    					<div class="item" data-value="male">Male</div>
    					<div class="item" data-value="female">Female</div>
  					</div>
				</div>
			</div>
		</div>

		<div class="field">
			<label>Address</label>
			<textarea placeholder="Address" name="address"><?php echo $patient->address; ?></textarea>
		</div>
		

		<div class="three fields">
			<div class="field">
				<label>Weight</label>
				<input type="text" placeholder="Weight" name="weight" value="<?php echo $patient->weight; ?>">
			</div>
			<div class="field">
				<label>Height</label>
				<input type="text" placeholder="Height" name="height" value="<?php echo $patient->height; ?>">
			</div>
			<div class="field">
				<label>Blood Type</label>
				<input type="text" placeholder="Blood Type(Optional)" name="blood_type" value="<?php echo $patient->blood_type; ?>">
			</div>
		</div>
		<a href="#" class="ui blue button" id="save">Save</a>
		</form>
		
	</div>


	<h3 class="ui header">Consultations</h3>
	<a class="ui button" href="<?php echo site_url('patient/consult/'.$patient->id); ?>">New Consultation</a>
	<?php if($patient->consultation->get()->exists()): ?>
	<table class="ui basic table">
		<thead>
			<tr>
				<th>
					Doctor
				</th>
				<th>
					Date/Time
				</th>
				<th>
					Files
				</th>
				<th>
				</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($patient->consultation->get() as $consultation): ?>
			<tr>
				<td><?php echo $consultation->user->get()->lastname; ?>, <?php echo $consultation->user->get()->firstname; ?></td>
				<td><?php echo date('M d, Y / h:i:s a', strtotime($consultation->created_at)); ?></td>
				<td>
					<?php foreach($consultation->file->get() as $file): ?>
					<?php echo $file->filename; ?> ( <a href="<?php echo base_url('uploads/'.$file->storagename); ?>">download</a> )
					<?php endforeach; ?>
				</td>
				<td><i class="edit link icon" data-id="<?php echo $consultation->id; ?>"></i></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php endif; ?>
</div>


<div class="ui small modal">
	<div class="header">
	Patient's Profile
	</div>
	<div class="content">
	Data has been saved! <i class="info icon"></i>
	</div>

	<div class="actions">
		<div class="button">
			<a href="#" class="ui button">Close</a>
		</div>
	</div>

</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('.ui.dropdown').dropdown();

		var rules = {
			firstname : {
				identifier : 'firstname',
				rules : [
					{
						type : 'empty',
						prompt : 'Please input First Name'
					}
				]
			},
			lastname : {
				identifier : 'lastname',
				rules : [
					{
						type : 'empty',
						prompt : 'Please input Last Name'
					}
				]
			},
			age : {
				identifier : 'age',
				rules : [
					{
						type : 'empty',
						prompt : 'Please input age'
					}
				]
			},
			birthday : {
				identifier : 'birthday',
				rules : [
					{
						type : 'empty',
						prompt : 'Please input birthday'
					}
				]
			},
			address : {
				identifier : 'address',
				rules : [
					{
						type : 'empty',
						prompt : 'Please input address'
					}
				]
			},
			gender : {
				identifier : 'gender',
				rules : [
					{
						type : 'empty',
						prompt : 'Please select gender'
					}
				]
			}
		};

		var settings = {
			inline : true,
			on : 'blur',
			onSuccess : function() {
				//post data
				$.post("<?php echo site_url('patients/save_post/'. $patient->id); ?>", $("#patient").serialize(), function(data) {
					if(data.status == true) {
						//data saved modal
						$('.ui.small.modal').modal('show');
					}
					else {
						//data  not saved modal
					}
				}, 'json');
			}
		};

		$('.ui.form').form(rules, settings);

		$("#save").click(function() {
			$('.ui.form').form('validate form');
			return false;
		});

		$(".link").click(function() {
			window.location = "<?php echo site_url('consultation/'); ?>/" + $(this).attr('data-id');
		});
	});
</script>