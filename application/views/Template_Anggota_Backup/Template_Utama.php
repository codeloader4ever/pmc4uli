<!DOCTYPE html>
<html lang="en">
<head>
	<!--
		Charisma v1.0.0

		Copyright 2012 Muhammad Usman
		Licensed under the Apache License v2.0
		http://www.apache.org/licenses/LICENSE-2.0

		http://usman.it
		http://twitter.com/halalit_usman
	-->
	<meta charset="utf-8">
	<title>Website Editor</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Muhammad Usman">

	<!-- The styles -->
	<link id="bs-css" href="<?php echo base_url();?>/Asset/css/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	<link href="<?php echo base_url();?>/Asset/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="<?php echo base_url();?>/Asset/css/charisma-app.css" rel="stylesheet">
	<link href="<?php echo base_url();?>/Asset/css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='<?php echo base_url();?>/Asset/css/fullcalendar.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>/Asset/css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='<?php echo base_url();?>/Asset/css/chosen.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>/Asset/css/uniform.default.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>/Asset/css/colorbox.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>/Asset/css/jquery.cleditor.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>/Asset/css/jquery.noty.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>/Asset/css/noty_theme_default.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>/Asset/css/elfinder.min.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>/Asset/css/elfinder.theme.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>/Asset/css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>/Asset/css/opa-icons.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>/Asset/css/uploadify.css' rel='stylesheet'>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="<?php echo base_url();?>/Asset/img/favicon.ico">
		
</head>

<body>
		<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="<?php echo base_url();?>/Asset/index.html"> <img alt="Charisma Logo" src="<?php echo base_url();?>/Asset/img/logo20.png" /> <span> <strong>Website Editor</strong></span></a>
				
				<!-- theme selector starts -->
				<!-- theme selector ends -->
				
				<!-- user dropdown starts -->
          <div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> Setting</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#">Ubah Akun</a></li>
						<li><a href="#">Ubah Password</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo base_url();?>/Asset/login.html">Keluar</a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->
				
				<div class="top-nav nav-collapse"></div><!--/.nav-collapse -->
			</div>
		</div>
	</div>
	<!-- topbar ends -->
<div class="container-fluid">
  <div class="row-fluid">
				
			<!-- left menu starts -->
<div class="span2 main-menu-span">
			  <div class="well nav-collapse sidebar-nav">
				<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">MENU</li>
						<li><a class="ajax-link" href="gallery.html"><i class="icon-picture"></i><span class="hidden-tablet"> Beranda</span></a></li>
						<li><a class="ajax-link" href="calendar.html"><i class="icon-calendar"></i><span class="hidden-tablet"> My Project</span></a></li>
						<li><a class="ajax-link" href="grid.html"><i class="icon-th"></i><span class="hidden-tablet"> File Publikasi</span></a></li>
<li><a class="ajax-link" href="file-manager.html"><i class="icon-folder-open"></i><span class="hidden-tablet"> Artikel</span></a></li></ul></div>
			<!--/.well -->
		  </div><!--/span-->
	  <!-- left menu ends -->
			
			<noscript>
	  </noscript>
			<span class="span10"><?php echo $this->load->view($isi);?> </span>
<!--/#content.span10-->
		  </div><!--/fluid-row-->
				
		<hr>

		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			</div>
  </div>

		<footer>
			<p class="pull-left">&copy; <a href="http://usman.it" target="_blank">Ulfah Athiqoh</a> 417DRI		</p>
  </footer>
		
  </div><!--/.fluid-container-->

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->
	<script src="<?php echo base_url();?>/Asset/js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="<?php echo base_url();?>/Asset/js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="<?php echo base_url();?>/Asset/js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="<?php echo base_url();?>/Asset/js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="<?php echo base_url();?>/Asset/js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="<?php echo base_url();?>/Asset/js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="<?php echo base_url();?>/Asset/js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="<?php echo base_url();?>/Asset/js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="<?php echo base_url();?>/Asset/js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="<?php echo base_url();?>/Asset/js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="<?php echo base_url();?>/Asset/js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="<?php echo base_url();?>/Asset/js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="<?php echo base_url();?>/Asset/js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="<?php echo base_url();?>/Asset/js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="<?php echo base_url();?>/Asset/js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="<?php echo base_url();?>/Asset/js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src='<?php echo base_url();?>/Asset/js/fullcalendar.min.js'></script>
	<!-- data table plugin -->
	<script src='<?php echo base_url();?>/Asset/js/jquery.dataTables.min.js'></script>

	<!-- chart libraries start -->
	<script src="<?php echo base_url();?>/Asset/js/excanvas.js"></script>
	<script src="<?php echo base_url();?>/Asset/js/jquery.flot.min.js"></script>
	<script src="<?php echo base_url();?>/Asset/js/jquery.flot.pie.min.js"></script>
	<script src="<?php echo base_url();?>/Asset/js/jquery.flot.stack.js"></script>
	<script src="<?php echo base_url();?>/Asset/js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="<?php echo base_url();?>/Asset/js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="<?php echo base_url();?>/Asset/js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="<?php echo base_url();?>/Asset/js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="<?php echo base_url();?>/Asset/js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="<?php echo base_url();?>/Asset/js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="<?php echo base_url();?>/Asset/js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="<?php echo base_url();?>/Asset/js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="<?php echo base_url();?>/Asset/js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="<?php echo base_url();?>/Asset/js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="<?php echo base_url();?>/Asset/js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="<?php echo base_url();?>/Asset/js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="<?php //echo base_url();?>/Asset/js/charisma.js"></script>
	
		
</body>
</html>
