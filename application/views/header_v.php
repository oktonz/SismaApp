<!DOCTYPE HTML>
<html>
	<head><title>Header</title></head>
	<body>
		<!-- topbar starts -->
	    <div class="navbar navbar-default" role="navigation">

	        <div class="navbar-inner">
	            <button type="button" class="navbar-toggle pull-left animated flip">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	            <a class="navbar-brand" href="<?php echo base_url().'home';?>"> <img alt="Charisma Logo" src="<?php echo base_url();?>assets/img/logo20.png" class="hidden-xs"/>
	                <span>Sistem Manajemen Arsip</span></a>

	            <!-- user dropdown starts -->
	            <div class="btn-group pull-right">
	                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
	                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> <?php echo $username;?></span>
	                    <span class="caret"></span>
	                </button>
	                <ul class="dropdown-menu">
	                    <li><a href="<?php echo base_url().'users/profile/'; echo $id;?>">Profile</a></li>
	                    <li class="divider"></li>
	                    <li><a href="<?php echo base_url().'users/logout';?>">Logout</a></li>
	                </ul>
	            </div>
	            <!-- user dropdown ends -->
	        </div>
	    </div>
	    <!-- topbar ends -->
	</body>
</html>