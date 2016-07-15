<?php

/*
Template Name: Sitemap Page
*/


get_header();

?>

<!-- ============ CONTENT START ============ -->
<?php while ( have_posts() ) : the_post(); ?>

	<div id="bh-hero" class="container-fluid">
		<div class="row">

			<?php
			$postThumbID = get_post_thumbnail_id( get_the_ID() );
			$image_attributes = wp_get_attachment_image_src( $postThumbID, 'full' );
			if ( $image_attributes ) : ?>
				<img class="img-responsive" src="<?php echo $image_attributes[0]; ?>" width="100%" />
			<?php endif; ?>

		</div>
	</div>


	<section id="secondry-content">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">

					<h1><?php echo the_title(); ?></h1>
					<hr>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6"><?php get_template_part('/partials/sitemap'); ?>
				</div>
				<div class="col-md-6">
					<?php if ( ! dynamic_sidebar('sidebar1')) : ?>
					<?php endif; ?>
				</div>
			</div>
		</div> <!-- End Container -->
	</section>

	<!-- ============ CONTENT END ============ -->
<?php endwhile; ?>

<?php get_footer(); ?>
