<div class="ui form">
<div class="ui segment">
	<h3 class="ui blue label ribbon"> Doctor's Profile</h3>
	<br><br/>
		<form id="doctor">
		<div class="three fields">
			<div class="field">
				<label><strong>Firstname</strong></label>
				<input type="text" value="<?php echo $doctor->firstname; ?>" placeholder="Firstname" name="firstname">
			</div>
			<div class="field">
				<label><strong>Middlename</strong></label>
				<input type="text" value="<?php echo $doctor->lastname; ?>" placeholder="Middelname" name="middlename">
			</div>
			<div class="field">
				<label><strong>Lastname</strong></label>
				<input type="text" value="<?php echo $doctor->middlename; ?>" placeholder="Lastname" name="lastname">
			</div>
		</div>

		<div class="three fields">
			<div class="field">
				<label><strong>Age</strong></label>
				<input type="text" value="<?php echo $doctor->age; ?>" placeholder="Age" name="age">
			</div>
			<div class="field">
				<label><strong>Nationality</strong></label>
				<input type="text" value="<?php echo $doctor->nationality; ?>" placeholder="Nationality" name="nationality">
			</div>
			<div class="field">
				<label><strong>Birthdate</strong></label>
				<input type="text" value="<?php echo $doctor->birthdate; ?>" placeholder="Birthdate" name="birthdate">
			</div> 
		</div>

			<div class="field">
				<label><strong>Address</strong></label>
				<input type="text" value="<?php echo $doctor->address; ?>" placeholder="Address" name="address">
			</div>

		<div class="three fields">
			<div class="field">
				<label><strong>Phone Number</strong></label>
				<input type="text" value="<?php echo $doctor->contact; ?>" placeholder="Phone Number" name="phone">
			</div>
			<div class="field">
				<label><strong>Email Address</strong></label>
				<input type="text" value="<?php echo $doctor->email; ?>" placeholder="Email Address" name="email">
			</div>
			<div class="field">
				<label><strong>Gender</strong></label>
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
				<label><strong>Specialization</strong></label>
				<input type="text" value="<?php echo $doctor->specialization; ?>" placeholder="Specialization" name="specialization">
			</div>
			<div class="field">
				<label><strong>Consultation Hours</strong></label>
				<input type="text" value="<?php echo $doctor->consultation; ?>" placeholder="Consultation Hours" name="consulation">
			</div>
		</div>
		</div>

		<div class="ui segment">
			<div class="ui blue ribbon label">Login Details</div>
			<br><br/>
			<strong>Change Username/Password</strong>
			<br><br/>

			<div class="field">
				<label><strong>Username</strong></label>
				<input type="text" value="<?php echo $doctor->username; ?>" name="username" placeholder="New Username">
			</div>

			<div class="three fields">
				<div class="field">
					<label><strong>Current Password</strong></label>
					<input type="text" name="password" placeholder="Current Password">
				</div>
				<div class="field">
					<label><strong>New Password</strong></label>
					<input type="password" name="password" placeholder="New Password">
				</div>
				<div class="field">
					<label><strong>Re-type New Password</strong></label>
					<input type="password" name="password" placeholder="Re-type New Password">
				</div>
			</div>
		</div>
		</form>
		<a href="#" id="save" class="ui blue button">Save</a>
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
		$('.ui.dropdown'.dropdown();

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