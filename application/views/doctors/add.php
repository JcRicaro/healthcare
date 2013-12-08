<div class="ui form">
<form id="doctorform">
	<div class="ui segment">
		<h3 class="ui blue label ribbon">Doctor's Profile</h3>
		<br><br/>
		<div class="three fields">
			<div class="field">
				<label><strong>First Name</strong></label>
				<input type="text" name="firstname" placeholder="First Name">
			</div>

			<div class="field">
				<label><strong>Middle Name</strong></label>
				<input type="text" name="middlename" placeholder="Middle Name">
			</div>

			<div class="field">
				<label><strong>Last Name</strong></label>
				<input type="text" name="lastname" placeholder="Last Name">
			</div>
		</div>

		<div class="three fields">
			<div class="field">
				<label><strong>Age</strong></label>
				<input type="text" name="age" placeholder="Age">
			</div>

			<div class="field">
				 <label><strong>Nationality</strong></label>
				 <input type="text" name="nationality" placeholder="Nationality">
			</div>

			<div class="field">
			 	<label><strong>Birthdate</strong></label>
			 	<input type="text" name="birthdate" placeholder="Birthdate">
			</div>
		</div>

			<div class="field">
				<label><strong>Address</strong></label>
				<input type="text" name="address" placeholder="Address">
			</div>

		<div class="three fields">
			<div class="field">
				<label><strong>Phone Number</strong></label>
				<input type="text" name="phone" placeholder="Phone Number">
			</div>
			<div class="field">
				<label><strong>Email Address</strong></label>
				<input type="text" name="email" placeholder="Email Address">
			</div>

			<div class="field">
				<label><strong>Gender</strong></label>
				<div class="ui selection dropdown">
						<input type="hidden" name="gender">
					<div class="default text">Gender</div>
							<i class="dropdown icon"></i>
						<div class="menu">
							<div class="item" data-value="male">Male</div>
						<div class="item" data-value="female">Female</div>
					</div>
				</div>
			</div>
		</div>

		<div class="two fields">
		<div class="field">
			<label><strong>Specialization</strong></label>
			<input type="text" name="specialization"placeholder="Specialization">
		</div>
		<div class="field">
			<label><strong>Consultation Hours</strong></label>
			<input type="text" name="specialization" placeholder="Consultation Hours">
		</div>
		</div>
	</div>
	</form>
	
	<div class="ui segment">
		<div class="ui blue ribbon label">Login Details</div>
		<br/><br/>
		<div class="field">
			<label><strong>Username</strong></label>
			<input type="text" name="username" placeholder="Username">
		</div>
		<div class="two fields">
			<div class="field">
				<label><strong>Password</strong></label>
				<input type="password" name="password" placeholder="Password">
			</div>
			<div class="field">
				<label><strong>Re-type Password</strong></label>
				<input type="password" name="retype_password" placeholder="Retype password">
			</div>
		</div>
	</div>


			<a class="ui blue button" href="#" id="add">Add doctor</a>

	</form>
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
		 				prompt : 'Firstname field cannot be empty'
		 			}
		 		]
		 	},
		 	lastname : {
		 		identifier : 'lastname',
		 		rules : [
		 			{
		 				type : 'empty',
		 				prompt : 'Lastname field cannot be empty'
		 			}
		 		]
		 	}
		 };

		 var settings = {
		 	on : 'blur',
		 	inline : true,
		 	onSuccess : function() {
		 		//post
		 		$.post("<?php echo site_url('doctor/add_post'); ?>", $("#doctorform").serialize(), function() {
		 			alert('test');
		 		}, 'json');
		 	}
		 };

		$(".ui.form").form(rules, settings);

		$("#add").click(function() {
			$('.ui.form').form('validate form');
			return false;
		});
	

	});
</script>