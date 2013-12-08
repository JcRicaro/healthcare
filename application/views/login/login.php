<!DOCTYPE html>
<html>
<head>
	<title>Health Care System Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/semantic.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">
	<style type="text/css">
	.container {
		width:400px;
		margin-top:200px;
		margin-left:auto;
		margin-right:auto;
	}
	</style>

	<script type="text/javascript" src="<?php echo base_url('assets/javascript/jquery-1.10.2.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/javascript/semantic.min.js'); ?>"></script>
</head>
<body>


<div class="container">
	<div class="ui blue segment">
		<h2 class="ui header">Login</h2>
		<div class="ui form">
			<form id="loginform">
			<div class="field">
				<label>Username</label>
				<input type="text" placeholder="Username" name="username">
			</div>
			<div class="field">
				<label>Password</label>
				<input type="password" placeholder="Password" name="password">
			</div>
			</form>
			<a href="#" class="ui blue button" id="login">Login</a>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {

		var rules = {
			username : {
				identifier : 'username',
				rules: [
					{
						type : 'empty',
						prompt : 'Username cannot be empty'
					}
				]	
			},
			password : {
				identifier : 'password',
				rules : [
					{
						type : 'empty',
						prompt : 'Password cannot be empty'
					}
				]
			}
		};

		var settings = {
			inline : true,
			on : 'blur',
			onSuccess: function() {
				$.post("<?php echo site_url('login/validate'); ?>", $("#loginform").serialize(), function(data) {
					if(data.status == true) {
						window.location = "<?php echo site_url(); ?>";
					}
					else {
						//username or password is wrong
					}
				}, 'json');
			}
		};

		$(".ui.form").form(rules, settings);

		$("#login").click(function() {
			$(".ui.form").form('validate form');
			return false;
		});
	});
</script>

</body>
</html>