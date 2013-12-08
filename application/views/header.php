<!DOCTYPE html>
<html>

<head>
<title><?php echo $title; ?></title>
<script type="text/javascript" src="<?php echo base_url('assets/javascript/jquery-1.10.2.min.js'); ?>"></script>
<!--<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/semantic.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">


<script type="text/javascript" src="<?php echo base_url('assets/javascript/semantic.js'); ?>"></script>
</head>		
<body>
<div class="container">
	<div class="logo">
		<img src="<?php echo base_url('assets/images/cover.png'); ?>">
	</div>
	<!-- menu -->
	<div class="ui secondary pointing menu">
		<a class="item<?php echo($page == 'home') ? ' active' : ''; ?>" href="<?php echo site_url(); ?>">
			<i class="home icon"></i> Home
		</a>
		<a class="item<?php echo ($page == 'patients') ? ' active' : ''; ?>" href="<?php echo site_url('patients'); ?>">
	   		<i class="user icon"></i> Patients
	   	</a>
		<a class="item" href="<?php echo site_url('doctors'); ?>">
	   		<i class="doctor icon"></i> Doctors
	   	</a>
		<a class="item">
	   		<i class="info icon"></i> Info
	  	</a>
	  	<div class="right menu">
	 		<div class="item">
				<div class="ui icon input">
	   				<input type="text" placeholder="Search...">
	        		<i class="search link icon"></i>
	      		</div>
	    	</div>
	    	<a class="ui item" href="<?php echo site_url('logout'); ?>">
	      		Logout
	    	</a>
	  	</div>
	</div>

<?php if($this->session->flashdata('info')): ?>
<div class="ui message">
	<?php echo $this->session->flashdata('info'); ?>
</div>
<?php endif; ?>

<?php if($this->session->flashdata('success')): ?>
<div class="ui green message">
	<?php echo $this->session->flashdata('success'); ?>
</div>
<?php endif; ?>

<?php if($this->session->flashdata('error')): ?>
<div class="ui red message">
	<?php echo $this->session->flashdata('error'); ?>
</div>
<?php endif; ?>