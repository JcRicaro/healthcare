<div class="ui blue segment">
	<h3 class="ui blue label ribbon"> Doctor's Profile</h3>
	<br><br/>
	<div class="ui form">
		<form id="doctor">
		<div class="three fields">
			<div class="field">
				<label>Firstname</label>
				<input type="text" value="<?php echo $doctor->firstname; ?>" placeholder="Firstname" name="firstname">
			</div>
			<div class="field">
				<label>Middlename</label>
				<input type="text" value="<?php echo $doctor->lastname; ?>" placeholder="Middelname" name="middlename">
			</div>
			<div class="field">
				<label>Lastname</label>
				<input type="text" value="<?php echo $doctor->middlename; ?>" placeholder="Lastname" name="lastname">
			</div>
		</div>

		<div class="three fields">
			<div class="field">
				<label>Age</label>
				<input type="text" value="<?php echo $doctor->age; ?>" placeholder="Age" name="age">
			</div>
			<div class="field">
				<label>Nationality</label>
				<input type="text" value="<?php echo $doctor->nationality; ?>" placeholder="Nationality" name="nationality">
			</div>
			<div class="field">
				<label>Birthdate</label>
				<input type="text" value="<?php echo $doctor->birthdate; ?>" placeholder="Birthdate" name="birthdate">
			</div> 
		</div>

		<div class="three fields">
			<div class="field">
				<label>Phone Number</label>
				<input type="text" value="<?php echo $doctor->contact; ?>" placeholder="Phone Number" name="phone">
			</div>
			<div class="field">
				<label>Email Address</label>
				<input type="text" value="<?php echo $doctor->email; ?>" placeholder="Email Address" name="email">
			</div>
			<div class="field">
				<label>Gender</label>
				<div class="ui selection dropdown">
						<input type="hidden" name="gender">
					<div class="default text">Gender</div>
						<i class="dropdown icon"></i>
						<div class="menu">
						<div class="item" data-value="male">Male</div>
						<div class="item" data-value="male">Female</div>
						</div>
					</div>
					</div>
		</div>

		<div class="two fields">
			<div class="field">
				<label>Specialization</label>
				<input type="text" value="<?php echo $doctor->specialization; ?>" placeholder="Specialization" name="specialization">
			</div>
			<div class="field">
				<label>Consultation Hours</label>
				<input type="text" value="<?php echo $doctor->consultation; ?>" placeholder="Consultation Hours" name="consulation">
			</div>
		</div>
	

		<div class="ui segment">
			<div class="ui blue ribbon label">Login Details</div>
			<br><br/>
			Change Username/Password
			<br><br/>
			<div class="field">
				<label>Username</label>
				<input type="text" value="<?php echo $doctor->username; ?>" name="username" placeholder="New Username">
			</div>
			<div class="three fields">
				<div class="field">
					<label>Current Password</label>
					<input type="text" name="password" placeholder="Current Password">
				</div>
				<div class="field">
					<label>New Password</label>
					<input type="password" name="password" placeholder="New Password">
				</div>
				<div class="field">
					<label>Re-type Password</label>
					<input type="password" name="password" placeholder="Re-type Password">
				</div>
			</div>
		</div>

		<a href="#" id="save" class="ui green button">JC pogi</a>
		</div>



		</form>
	</div>


<div class="ui small modal">
	<div class="header">
		Doctor's Profile
	</div>
	<div class="content">
		Information updated! <i class="info icon"></i>
	</div>
	<div class="actions">
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		var rules = {
			firstname : {
				identifier : 'firstname',
				rules : [
					{
						type : 'empty',
						prompt : 'yolooo'
					}
				]
			},
			lastname : {
				identifier : 'lastname',
				rules : [
					{
						type : 'empty',
						prompt : 'yolooo'
					}
				]
			}
		};

		var settings = {
			inline : true,
			on : 'blur',
			onSuccess : function() {
				$(".ui.small.modal").modal('show');
			}
		};

		$("#doctor").form(rules, settings);

		$("#save").click(function() {
			$("#doctor").form('form validate');
			return false;
		});
	});
</script>