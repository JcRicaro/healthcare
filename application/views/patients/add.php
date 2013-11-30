
<div class="ui breadcrumbs">
	<a href="<?php echo site_url('patients'); ?>">Patients</a> / Add Patient
</div>

<div class="ui blue segment">
	<div class="ui form">
		<form class="registration_form">
		<div class="three fields">		
			<div class="field">
				<label>First Name</label>
				<input type="text" name="firstname" placeholder="First Name">
			</div>

			<div class="field">
				<label>Last Name</label>
				<input type="text" name="lastname" placeholder="Last Name">
			</div>
	
			<div class="field">
				<label>Middle Initial</label>
				<input type="text" name="middleinitial" placeholder="Middle Initial">
			</div>

		</div>

		<div class="three fields">

			<div class="field">
				<label>Age</label>
				<input type="text" name="age" placeholder="Age">
			</div>

			<div class="field">
				<label>Nationality</label>
				<input type="text" name="nationality" placeholder="Nationality">
			</div>

			<div class="field">
				<label>Birthday</label>
				<input type="text" name="birthday" placeholder="Birthday">
			</div>

		</div>

		<div class="two	fields">
			<div class="field">
				<label>Address</label>
				<textarea name="address" placeholder="Address"></textarea>
			</div>
			<div class="field">

		<div class="two fields">
			<div class="field">
				<label>Civil Status</label>
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
		<label>Gender</label>
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
					alert('saved');
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