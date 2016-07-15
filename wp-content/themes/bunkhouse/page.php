<?php
/* Default template for all secondary page content */

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
				<div class="col-md-6"><?php print the_content(); ?></div>
				<div class="col-md-6">
					<h4>
						Should we put a sidebar in here or something else.  We could remove this column and make the content go full width
					</h4>
					<?php //the_post_thumbnail(); ?>
				</div>
			</div>
		</div> <!-- End Container -->
	</section>

	<!-- ============ CONTENT END ============ -->
<?php endwhile; ?>

<?php get_footer(); ?>