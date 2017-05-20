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
	<title>e-PAMCO</title>
        <link rel="stylesheet" href="<?php echo base_url();?>/Asset/development-bundle/themes/base/jquery.ui.all.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Muhammad Usman">

	<!-- The styles -->
	<link id="bs-css" href="<?php echo base_url();?>/Asset/css/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
		background-color:midnightblue;
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

        <script src="<?php echo base_url()?>/jquery-1.8.3.min.js" type="text/javascript"></script>
        
         <script src="<?php echo base_url()?>/jquery.easing.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>/jqueryFileTree.js" type="text/javascript"></script>
<link href="<?php echo base_url()?>/jqueryFileTree.css" rel="stylesheet" type="text/css" media="screen" />

<script src="<?php echo base_url()?>Asset/line/jquery-linedtextarea.js"></script>
<link href="<?php echo base_url()?>Asset/line/jquery-linedtextarea.css" type="text/css" rel="stylesheet" />

 <script src="<?php echo base_url()?>Asset/contextmenu/jquery.contextMenu.js" type="text/javascript"></script>
  <script src="<?php echo base_url()?>Asset/contextmenu/jquery.ui.position.js" type="text/javascript"></script>
 <link href="<?php echo base_url()?>Asset/contextmenu/jquery.contextMenu.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>/Asset/development-bundle/ui/jquery.ui.datepicker.js"></script>
 <script type="text/javascript">
			$(function(){

				// Datepicker
				$( "#datepicker" ).datepicker({
                                changeMonth: true,
                                changeYear: true,
                                dateFormat:'dd/mm/yy'
                                
                                });


				//hover states on the static widgets
				$('#dialog_link, ul#icons li').hover(
					function() { $(this).addClass('ui-state-hover'); }, 
					function() { $(this).removeClass('ui-state-hover'); }
				);
				
			});
		</script>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="<?php //echo base_url();?>/Asset/img/e-pamco.png">
        
        
       
        
        
        
		
</head>

<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<h1><a class="navbar" href="index.html"><img src="<?php echo base_url();?>/Asset/img/e-pamco.png" /> <span style="text-decoration: underline"><strong><font size ="20" style="font-family:comic">e-PAMCO</font></strong></span></a></h1>
				
				<!-- theme selector starts -->
				<!-- theme selector ends -->
				
				<!-- user dropdown starts -->
          
		  <div class="btn-group pull-right" >
		  
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#" >
						<i class="icon-user"></i><span class="hidden-phone" style="font-weight: bold"><?php echo $this->session->userdata('name'); ?></span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
                                            
						<li><a href="<?php echo base_url() ?>index.php/Utama/Ubah_Password">Change Password</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo base_url() ?>index.php/Utama/Logout">Logout</a></li>
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
<div class="navbar">
				<div class="navbar-inner">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet"><font size="4" color="white">MENU</li></font>
						<li>
                                                    <a class="ajax-link" href="<?php echo base_url(); ?>index.php/Utama">
                                                        <i class="icon-home"></i>
                                                        <span class="hidden-tablet"> <font size="3"> Home</font>
                                                        </span>
                                                    </a>
                                                </li>
						
						
                                               <li class="nav-header hidden-tablet">|||</li>
						<li>
                                                    <a class="ajax-link" href="<?php echo base_url(); ?>index.php/Utama/Daftar_MC_Number">
                                                        <i class="icon-file"></i>
                                                        <font size="3">Machine Records</font>
                                                    </a>
                                                </li>
						
						
                                                 
												 
												 
						<!--
                                                <li class="nav-header hidden-tablet">Level</li>
						<li>
                                                    <a class="ajax-link" href="<?php //echo base_url(); ?>index.php/Admin/TambahLevel">
                                                        <i class="icon-star"></i>
                                                        <span class="hidden-tablet"> Tambah Level
                                                        </span>
                                                    </a>
                                                </li>
						<li>
                                                    <a class="ajax-link" href="<?php //echo base_url(); ?>index.php/Admin/Daftar_Level">
                                                        <i class="icon-list"></i>
                                                        <span class="hidden-tablet"> Daftar Level
                                                        </span>
                                                    </a>
                                                </li>
                                                -->
					</ul>
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->
			
			<noscript>
	  </noscript>
			<span class="span10"><?php echo $this->load->view($isi);?> </span>
<!--/#content.span10-->
		  </div><!--/fluid-row-->
				
		<hr>
<!--
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
			<p class="pull-left">&copy; <a href="#">Copyright</a> <?php echo date('Y'); ?>		</p>
  </footer>  -->
		
  </div><!--/.fluid-container-->

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->

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
