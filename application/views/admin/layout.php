<!DOCTYPE html>
<html ng-app="adminJs">
<head lang="en-us">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title ng-bind="header"></title>

<link href="<?php echo base_url()?>app/styles/libs/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url()?>app/styles/libs/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url()?>app/styles/libs/styles.css" rel="stylesheet">
<link href="<?php echo base_url()?>app/styles/style.css" rel="stylesheet">

<!--Icons-->
<script src="<?php echo base_url()?>app/js/libs/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body >
<script>var BASE_URL = "<?php echo base_url(); ?>";</script>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>MedFolio</span>Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $name ?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a ui-sref="profile"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
							<li><a href="<?php echo BASE_URL('login/logout')?>"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li ui-sref-active="active">
			<a ui-sref="dashboard"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a>
			</li>
			<li ui-sref-active="active">
			<a ui-sref="links_management"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Links Management</a>
			</li>
			<li ui-sref-active="active">
			<a ui-sref="link_stats"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Link Stats</a></li>
			<li ui-sref-active="active">
			<a href="#"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> User</a>
			</li>
			
			<li role="presentation" class="divider"></li>
			<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Login Page</a></li>
		</ul>
		
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	<!-- angular view -->
	<ui-view></ui-view>

	</div>	<!--/.main-->
	  

	<script src="<?php echo base_url()?>app/js/libs/jquery.min.js"></script> 
	<script src="<?php echo base_url()?>app/js/libs/angular.min.js"></script>
	<script src="<?php echo base_url()?>app/js/libs/dirPagination.js"></script>
	<script src="<?php echo base_url()?>app/js/libs/angular-ui-router.min.js"></script>
	<script src="<?php echo base_url()?>app/js/libs/angular-resource.min.js"></script>
	<script src="<?php echo base_url()?>app/js/libs/bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>app/js/libs/chart.min.js"></script>
	<script src="<?php echo base_url()?>app/js/chart-data.js"></script>
	<script src="<?php echo base_url()?>app/scripts/app.js"></script>
	<script src="<?php echo base_url()?>app/scripts/custom.js"></script>
	<script src="<?php echo base_url()?>app/scripts/controllers/adminCtrl.js"></script>
	
</body>

</html>