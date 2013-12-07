<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/semantic.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">
	<script type="text/javascript" src="<?php echo base_url('assets/javascript/jquery-1.10.2.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/semantic.js'); ?>"></script>
</head>
<body>

<div class="container">
	<div class="ui segment">
		<form id="register">
		<div class="ui form">
			<div class="field">
				<label>qwe</label>
				<input type="text">
			</div>

			<a href="#" class="ui button" id="register_patient">Register</a>
		</div>


		</form>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		var rules = {
			
		};

		var settings = {
			inline : true, 
			on : 'blur', 
			onSuccess : function() {
				$.post("<?php echo site_url('login/register'); ?>", $("#register").serialize(), function() {

				}, 'json');
			}
		};

		$("#register").form(rules, settings);

		$('#register_patient').click(function() {
			$("#register").form('validate form');
			return false;
		});
	});
</script>

</body>
</html>