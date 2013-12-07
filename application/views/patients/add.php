
<div class="ui breadcrumbs">
	<a href="<?php echo site_url('patients'); ?>">Patients</a> /Add Patient
	
</div>

<div class="ui blue segment">
	<h3 class="ui blue label ribbon">Patient's Info</h3>
	<br><br/>
	<div class="ui form">
		<form class="registration_form">
		<div class="three fields">		
			<div class="field">
				<label><strong>First Name</strong></label>
				<input type="text" name="firstname" placeholder="First Name">
			</div>

			<div class="field">
				<label><strong>Last Name</strong></label>
				<input type="text" name="lastname" placeholder="Last Name">
			</div>
	
			<div class="field">
				<label><strong>Middle Initial</strong></label>
				<input type="text" name="middlename" placeholder="Middle Initial">
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
				<input type="text" name="birthday" placeholder="Birthdate">
			</div>

		</div>

			<div class="field">
				<label><strong>Address</strong></label>
				<textarea name="address" placeholder="Address"></textarea>
			</div>
	

		<div class="four fields">
			<div class="field">
				<label><strong>Weight</strong></label>
				<input type="text" name="weight" placeholder="Weight">
			</div>

			<div class="field">
				<label><strong>Height</strong></label>
				<input type="text" name="height" placeholder="Height">
			</div>

			<div class="field">
				<label><strong>Civil Status</strong></label>
			<div class="grouped inline fields">

	    	<div class="field">
      		<div class="ui radio checkbox">
        		<input type="radio" name="status" checked="checked">
       			<label>Single</label>
       		</div>
    		</div>

    		<div class="field">
      		<div class="ui radio checkbox">
       			 <input type="radio" name="status">
        		<label>Married</label>
        	</div>
       	 	</div>

			<div class="field">
     	    <div class="ui radio checkbox">
        		<input type="radio" name="status">
        		<label>Widowed</label>
        	</div>
    		</div>
			</div>
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
			</div>
		</div>

		<a href="#" id="register" class="ui blue button">Register</a>
		</form>
	</div>
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

		$('.ui.checkbox').checkbox();

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
				$.post("<?php echo site_url('patients/add_post'); ?>", $(".registration_form").serialize(), function() {
					window.location = "<?php echo site_url('patients'); ?>";
				}, 'json');
			}
		};

		$('.ui.form').form(rules, settings);

		$("#register").click(function() {
			$('.ui.form').form('validate form');
			return false;
		});
	});
</script>