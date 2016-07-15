<?php
/**
 * The Template for displaying all single rooms post type.
 *
 * @package bunkhouse
 */

get_header();
global $post;
$roomDescription = get_post_meta($post->ID, '_bh_rooms_wysiwyg', true);
$roomRate = get_post_meta($post->ID, '_bh_rooms_rate', true);
$bookurl = get_post_meta($post->ID, '_bh_rooms_url', true);
$name = get_post_meta($post->ID, '_bh_rooms_name', true);
$amenities = get_post_meta($post->ID, '_bh_rooms_multicheckbox', true);
$roomGallery = get_post_meta($post->ID, 'bh_rooms_group', true);

?>

<!-- ============ CONTENT START ============ -->

		<section id="content">
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<h5>Our Rooms</h5>
						<h1><?= $name; ?></h1>
						<!-- Gallery Start -->
						<div class="fotorama" data-nav="thumbs" data-loop="true">
<?php 

		foreach ( (array) $roomGallery as $roomPic ) {
			$roomImg = '';
			
			if ( isset( $roomPic['pic_id'] ) ) {
						$roomImg = wp_get_attachment_image( $roomPic['pic_id'], 'share-pick', null, array(
											    'class' => 'thumb img-responsive',
										  ) );
				} ?>
			<!-- Slide container -->
			<?= $roomImg; ?>
	
								<?php }  ?>
					</div>
					<!-- Gallery End -->
						<p><?= $roomDescription; ?></p>
						<p>
							<a href="<?= $bookurl; ?>" class="btn btn-primary">Book This Room</a>
						</p>
					</div>
					<div class="col-sm-4">
						<h4>Room Amenities</h4>
						<ul class="amenities">
							
								<?php						
						foreach($amenities as $amenity) {
						echo '<li>'. $amenity. '</li>';
						}?>
							
						</ul>
						
					</div>
				</div>
			</div>
		</section>


		<!-- ============ CONTENT END ============ -->
 
<?php get_footer(); ?>