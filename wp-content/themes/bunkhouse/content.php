<?php
/* Template Name: Secondary Template */
 
get_header(); 

?>



<!-- ============ CONTENT START ============ -->

		<section id="rooms-content">
			<div class="container">
        <?php while ( have_posts() ) : the_post(); ?>
    
				<div class="row">
					<div class="col-sm-12 text-center">
						<h1><?php echo the_title(); ?></h1>
            <hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6"><?php print the_content(); ?></div>
          <div class="col-md-6">
            <?php the_post_thumbnail(); ?>
          </div>	
				</div>
			</div> <!-- End Container -->
		</section>
<?php endwhile; ?>
		<!-- ============ CONTENT END ============ -->

 
<?php get_footer(); ?>