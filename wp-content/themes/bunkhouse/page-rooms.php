<?php
/* Template Name: Rooms Portfolio */
 
get_header(); 

?>

<!-- ============ CONTENT START ============ -->

		<section id="rooms-content">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h5>Check out our</h5>
						<h1>Rooms</h1>
						<?php while ( have_posts() ) : the_post(); ?>
            <?php the_content() ?>
            <?php endwhile; // end of the loop. ?><hr>
					</div>
				</div>
				<div class="row">
					<!-- Start Rooms Loop -->
          <?php
	/* 
	Query the post 
	*/
	$args = array( 'post_type' => 'rooms', 'posts_per_page' => -1 );
	$loop = new WP_Query( $args );
	  while ( $loop->have_posts() ) : $loop->the_post(); 
	/* 
	Pull category for each unique post using the ID 
	*/
	$terms = get_the_terms( $post->ID, 'room_categories' );	
     if ( $terms && ! is_wp_error( $terms ) ) : 

			 $links = array();

			 foreach ( $terms as $term ) {
				 $links[] = $term->name;
			 }
			$tax_links = join( " ", str_replace(' ', '-', $links));          
			$tax = strtolower($tax_links);
			
		 else :	
		 $tax = '';					
		 endif;
	$title = get_the_title();
	$room_image = get_post_meta($post->ID, '_bh_rooms_image', true);
	$room_rate = get_post_meta($post->ID, '_bh_rooms_rate', true);
	//$room_beds = get_post_meta($post->ID, '_tree_leaf-image', true);
  $room_bookUrl = get_post_meta($post->ID, '_bh_rooms_url', true);
	$terms = get_the_terms( $post->ID, 'room_categories' );

  $original_image = $room_image; // let's assume this image has the size 100x100px
  $width = 360; // note, how this exceeds the original image size
  $height = 240; // some pixel less than the original
  $crop = true; // if this would be false, You would get a 90x90px image. For users of prior 
                // Aqua Resizer users, You would have get a 100x90 image here with $crop = true
  $new_image = aq_resize($original_image, $width, $height, $crop);

?>
          
					<?php echo '<div class="room col-sm-6 col-md-4">';?>
            <a title="<?=$title?>" href="<?php print  get_permalink($post->ID) ?>">
            <?php echo '<img class="img-responsive" src="'. $new_image. '">'; ?></a><br />
            <h4><?=$title?></h4>
          <?php print get_the_excerpt(); ?><br />
          <ul>
							<li>Beds:<span>2 x King Size</span></li>
							<li>Occupancy:<span>4 persons</span></li>
							<li>Size:<span>82 sqm / 820 sqf</span></li>
							<li>Rates from:<span><?=$room_rate?></span></li>
						</ul>
          <p>
          <a class="btn btn-default" href="<?php print  get_permalink($post->ID) ?>">Details</a>
          <a href="<?=$room_bookUrl?>" class="btn btn-primary pull-right">Book Now</a></p>
			    </div> <!-- End individual room col -->
        	<?php endwhile; ?>
			  </div><!-- End Room Details Row -->

			</div> <!-- End Container -->
		</section>

		<!-- ============ CONTENT END ============ -->

 
<?php get_footer(); ?>