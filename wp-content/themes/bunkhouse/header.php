<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php wp_head(); ?>
	</head>
	<body>
	<div id="header">
		<div class="container">
			<div class="row">
				<div id="logo" class="col-xs-8 col-sm-4">
					 <a class="navbar-brand" href="<?php echo home_url(); ?>">
					<?=the_site_logo()?>
					</a>
				</div>
				<div class="col-xs-4 col-sm-8 text-right" id="hotel-info">
					<ul>
						<li id="hotel-phone"><a href="tel:1234565"><i class="fa fa-phone fa-lg primary-color"></i></a></li>
						<li id="hotel-email"><a href="mailto:reservation@thebunkhouse.com"><i class="fa fa-envelope fa-lg primary-color"></i></a></li>
						<li id="hotel-reservation"><a id="reservation-link" class="btn btn-primary"><i class="fa fa-calendar fa-lg primary-color"></i> <span>Book Now</span></a></li>
					</ul>
				</div>
			</div>
		</div>
		
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
				<?php
					wp_nav_menu( array(
						'menu'              => 'primary',
						'theme_location'    => 'primary',
						'depth'             => 2,
						'container'         => 'div',
						'container_class'   => 'collapse navbar-collapse',
						'container_id'      => 'navbar2',
						'menu_class'        => 'jetmenu blue',
						'echo'            => true,
						'items_wrap'      => '<ul id="%1$s" class="%2$s list">%3$s</ul>',
						'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
						'walker'            => new wp_bootstrap_navwalker())
					);
				?>
		</div>
	</nav>
	</div>