<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title><?php bloginfo('title');?>|| <?php bloginfo('description');?></title>

		<meta name="description" content="Chaipai - is a Premium HTML Responsive Templeate by CodexCoder Team. You can use this for anykind of organaizations">

		<meta name="keywords" content="Premium HTML Template">

		<meta name="author" content="CodexCoder">

		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<?php wp_head();?>
	</head>

	<body class="advance" <?php body_class();?>>

		<!-- Main Menu -->
		<div id="main-menu"  class="navbar-fixed-top">
			<div  class="main-menu">
				<div class="container">
					<div class="row">
						<div class="navbar navbar-default" role="navigation">
							<div class="container-fluid">
							    <!-- Brand and toggle get grouped for better mobile display -->
							    <div class="navbar-header">
								    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								        <span class="sr-only">Toggle navigation</span>
								        <span class="icon-bar"></span>
								        <span class="icon-bar"></span>
								        <span class="icon-bar"></span>
								    </button><!-- /.navbar-toggle collapsed -->
								    <a class="navbar-brand" href="<?php home_url();?>"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" /></a>
							    </div><!-- /.navbar-header -->

							    <!-- Collect the nav links, forms, and other content for toggling -->
							    <nav class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
								    <?php wp_nav_menu(array(
									"theme_location"=>"header_menu",
									"menu_class"=>"nav navbar-nav sm sm-blue",
									"menu_id"=>"main-nav"
									
									));?>
							    </nav><!-- /.navbar-collapse -->

							</div><!-- /.container-fluid -->
						</div><!-- /.navbar navbar-default -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.full-main-menu -->
		</div><!-- #main-menu -->
		<!-- Main Menu end -->
		<div class="main-menu-container"></div>