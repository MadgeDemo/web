<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!-- about this site -->
		<meta name="description" content="A web portal for employees and customers to view products" />
		<meta name="keywords" content="Silverstone, Customer Portal, Tyres" />
		<meta name="author" content="Joshua Bakasa">
		<meta name="Resource-type" content="Document">
		<?php      	
			$this->load->view('utils/dynamicLoads');
		?>
		<link href="<?= @base_url();?>assets/plugins/css/bootstrap.min.css" rel="stylesheet">
	    <link href="<?= @base_url();?>assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet">
	    <link href="<?= @base_url();?>assets/plugins/css/animate.css" rel="stylesheet">
	    <link href="<?= @base_url();?>assets/plugins/css/style.css" rel="stylesheet">

    <!-- Mainly scripts -->
    <script src="<?= @base_url();?>assets/plugins/js/jquery-2.1.1.js"></script>
		<link rel=icon href="<?php echo base_url('');?>" type="image/png" />
		<title>
			Silverstone
		</title>
		<style type="text/css">
			
			.navbar-inverse {
				border-radius: 0px;
			}
			.navbar .container-fluid .navbar-header .navbar-collapse .collapse .navbar-responsive-collapse .nav .navbar-nav {
				border-radius: 0px;
			}
			.panel {
				border-radius: 0px;
			}
			.panel-primary {
				border-radius: 0px;
			}
			.panel-heading {
				border-radius: 0px;
			}
			.btn {
				margin: 0px;
			}
			.alert {
				margin-bottom: 0px;
				padding: 8px;
			}
			.filter {
				margin: 2px 20px;
			}
			#filter {
				background-color: white;
				margin-bottom: 1.2em;
				margin-right: 0.1em;
				margin-left: 0.1em;
				padding-top: 0.5em;
				padding-bottom: 0.5em;
			}
			#year-month-filter {
				font-size: 12px;
			}
			.nav {
				color: black;
			}
		</style>
	</head>
	<body class="gray-bg">
	<?php if ($menu != FALSE) { ?>
		<!-- Begining of Navigation Bar -->
		<div class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="javascript:void(0)"><img src="<?php echo base_url();?>assets/img/nascop_pepfar_logo.jpg" /></a>
				</div>
				<div class="navbar-collapse collapse navbar-responsive-collapse">
					<ul class="nav navbar-nav">
						
					</ul>
					<!-- <form class="navbar-form navbar-left" id="1267192336">
						<div class="form-group">
							<input type="text" class="form-control col-md-8" placeholder="Search">
						</div>
					</form> -->
					<ul class="nav navbar-nav navbar-right">
						<!-- <li><a href="<?php echo base_url();?>">Summary</a></li>
						<li><a href="<?php echo base_url();?>trends">Trends</a></li>
						<li><a href="<?php echo base_url();?>regimen">Regimen</a></li>
						<li><a href="<?php echo base_url();?>age">Age</a></li>
						<li class="dropdown">
							<a href="bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown">County/Sub-County
							<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url();?>county">County</a></li>
								<li><a href="<?php echo base_url();?>county/subCounty">Sub-County</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Partners
							<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url();?>partner">Summary</a></li>
								<li><a href="<?php echo base_url();?>partner/trends">Trends</a></li>
								<li><a href="<?php echo base_url();?>partner/sites">Partner Facilities</a></li>
								<li><a href="<?php echo base_url();?>partner/age">Partner Age</a></li>
								<li><a href="<?php echo base_url();?>partner/regimen">Partner Regimen</a></li>
								<li><a href="<?php echo base_url();?>partner/counties">Partner Counties</a></li>
							</ul>
						</li>
						<li><a href="<?php echo base_url();?>labs">Lab Performance</a></li>
						<li><a href="<?php echo base_url();?>sites">Facilities</a></li>
						<li><a href="<?php echo base_url();?>suppression/nosuppression">Non-Suppression</a></li>
						<li><a href="<?php echo base_url();?>live">Live Data</a></li>
						<li><a href="<?php echo base_url();?>contacts">Contact Us</a></li> -->
						<!-- <li><a href="<?php echo base_url();?>county">County View</a></li> -->
						<!-- <li><a href="http://eid.nascop.org/login.php">Login</a></li>
						<li><a href="http://eid.nascop.org">EID View</a></li> -->
						<!-- <li><a href="javascript:void(0)">Link</a></li> -->
						<li class="dropdown">
							<!-- <a href="bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown
							<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="javascript:void(0)">Action</a></li>
								<li><a href="javascript:void(0)">Another action</a></li>
								<li><a href="javascript:void(0)">Something else here</a></li>
								<li class="divider"></li>
								<li><a href="javascript:void(0)">Separated link</a></li>
							</ul> -->
						</li>
					</ul>
				</div>
			</div>
		</div>
		<?php } ?>
		<!-- End of Navigation Bar -->