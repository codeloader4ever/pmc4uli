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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Admin">

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

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="<?php //echo base_url();?>/Asset/img/e-pamco.png">
		
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
				<h1><a class="navbar" href="index.html"><img src="<?php echo base_url();?>/Asset/img/e-pamco.png" /> <span style="text-decoration: underline" > <strong><font size ="20" style="font-family:comic" >e-PAMCO</font></strong></span></a></h1>
				
				<!-- theme selector starts -->
				<!-- theme selector ends -->
				
				<!-- user dropdown starts -->
          
                  <!--<span class="hidden-phone"> Masuk</span>-->
		
				<div style='text-align:right'><font size="4"><?php echo date('l, d/m/Y'); ?></font></div>
				
                 
				<!-- user dropdown ends -->
				
				<div class="top-nav nav-collapse"></div><!--/.nav-collapse -->
			</div>
		</div>
	</div>
	<!-- topbar ends -->
		<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- left menu starts --><!--/span-->
			<!-- left menu ends -->
			
			
			<div id="content" class="span12 container">
			<!-- content starts -->
			

			<!--<div>
				<ul class="breadcrumb">
				<div align="center"><strong><h3>SELAMAT DATANG DI WEBSITE EDITOR !!!</h3></strong></div> 
				</ul>
			</div> -->

			<div class="row-fluid sortable">
				<div class="box span7">
					<div class="box-header well" data-original-title>
						<font size="5" style="font-family:courier" color="white">PT UNILEVER INDONESIA TBK </font>
						<div class="box-icon">
							
						</div>
					</div>
					<div class="box-content">
					
                    
    <div id="myCarousel" class="carousel slide">
    <!-- Carousel items -->
    <div class="carousel-inner">
        <div class="active item"><img src="<?php echo base_url();?>/Asset/img/gallery/unilever3.jpg"/></div>
    
    </div>
    <!-- Carousel nav -->
    <!--<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>-->
    </div>
                    
						
					</div>
				</div>
                
                
                <div class="box span4">
					<div class="box-header well" data-original-title style='text-align:center'>
						<font size="4" color="white">LOGIN</font>
						<div class="box-icon">
							<a href="#"></a>
						</div>
					</div>
					<div class="box-content">
                                            
	<!------------------------------------ FORM LOGIN --------------------------> 
 <form class="form-horizontal" method="post" action="<?php echo base_url()?>index.php/Utama/Login">
 <?php
 echo form_error('username');
    echo form_error('pwd');
         
 ?>
 
            <fieldset>
            <div class="control-group">
              <label class="control-label"><font size="3" color="white">Username</font></label>
              <div class="controls">
              <input type="text" id="username" name="username"> 
              </div>
            </div>
            <div class="control-group">
              <label class="control-label"><font size="3" color="white">Password</font></label>
              <div class="controls">
                <input type="password" id="password" name="pwd">
                </div>
                </div>
                <div class="controls">
                <button type="submit" class="btn btn-primary" ><font size="4">Login</font></button> 
              </div>
            

            
          </fieldset>
        </form>
        <!------------------------------------  END FORM PENDAFTARAN ANGGOTA --------------------------> 
					</div>
				</div>
                
                
                
                <!--/span-->
			
			</div><!--/row-->

    
					<!-- content ends -->
			</div><!--/#content.span10-->
		  </div><!--/fluid-row-->
				
		<hr style="height:2px;border:none;color:white;background-color:white;" >
	
		<footer>		
		<p class="pull-left"><font color="white">&copy; </font><a href="#"><font color="white">Copyright</a> <?php echo date('Y'); ?></p></font>
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
	<script src="js/jquery.iphone.toggle.js"></script>
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
