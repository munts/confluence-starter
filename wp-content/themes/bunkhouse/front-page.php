<?php
/*
Template Name: Front Page
*/
/**
 * @author Scott Taylor
 * @package bunkhouse
 * @subpackage Customizations
 */
get_header();

global $post;
$intro = get_post_meta($post->ID, '_bh_frontpage_welcome_intro', true);
$welcome = get_post_meta($post->ID, '_bh_frontpage_welcome_title', true);
$welcome_copy = get_post_meta($post->ID, '_bh_frontpage_welcome_wysiwyg', true);
$welcome_image = get_post_meta($post->ID, '_bh_frontpage_welcome_image', true);
$rooms_intro = get_post_meta($post->ID, '_bh_frontpage_rooms_intro', true);
$rooms_title = get_post_meta($post->ID, '_bh_frontpage_rooms_title', true);
$rooms_copy = get_post_meta($post->ID, '_bh_frontpage_rooms_wysiwyg', true);
$rooms_image = get_post_meta($post->ID, '_bh_frontpage_rooms_image', true);
$rooms_video = esc_url( get_post_meta( get_the_ID(), '_bh_frontpage_rooms_embed', 1 ) );
$extra_intro = get_post_meta($post->ID, '_bh_frontpage_rooms_intro', true);
$extra_title = get_post_meta($post->ID, '_bh_frontpage_rooms_title', true);
$extra_copy = get_post_meta($post->ID, '_bh_frontpage_rooms_wysiwyg', true);
$extra_image = get_post_meta($post->ID, '_bh_frontpage_rooms_image', true);
$offer_id = get_post_meta($post->ID, '_bh_frontpage_offer_id', true);
$review_id = get_post_meta($post->ID, '_bh_frontpage_review_id', true);
$slider_id = get_post_meta($post->ID, '_bh_frontpage_slider_id', true);
?>

	<div id="loader">
		<i class="fa fa-cog fa-4x fa-spin primary-color"></i>
	</div>
	<div id="slider">
		<ul class="slides-container">
			<?php $hpSlider = get_post_meta( $slider_id, 'bh_slides_group', true );
			foreach ( (array) $hpSlider as $slide ) {
				$img = $title = $secondaryTitle = $cta = $ctaUrl = '';
				if ( isset( $slide['message'] ) )
					$title = esc_html( $slide['message'] );
				if ( isset( $slide['secondary-message'] ) )
					$secondaryTitle = esc_html( $slide['secondary-message'] );
				if ( isset( $slide['cta'] ) )
					$cta = esc_html( $slide['cta'] );
				if ( isset( $slide['cta-url'] ) )
					$ctaUrl = esc_html( $slide['cta-url'] );
				if ( isset( $slide['image_id'] ) ) {
					$img = wp_get_attachment_image( $slide['image_id'], 'share-pick', null, array(
						'class' => 'thumb img-responsive',
					) );
				} ?>
				<!-- Slide container -->
				<li>
					<?= $img; ?>
					<div class="tint">
						<div class="content text-center">
							<h1>	<?= $title; ?> </h1>
							<h5><?= $secondaryTitle; ?></h5>
							<p><a href="<?= $ctaUrl; ?>" class="btn btn-primary"><?= $cta; ?></a></p>
						</div>
					</div>
				</li>
			<?php }  ?>
		</ul>
		<nav class="slides-navigation" style="z-index:10000;margin:-100px 0 0 10px;position:relative;">
			<a href="#" class="prev"><i class="fa fa-angle-left fa-2x"></i></a>
			<a href="#" class="next"><i class="fa fa-angle-right fa-2x"></i></a>
		</nav>
	</div>

	<!-- ============ WELCOME START ============ -->

	<section id="welcome" class="row color2 home-section">
		<div class="col-sm-7 col-md-6 col-lg-5 text">
			<div class="padding">

				<?php
				echo '<h5>'. $intro. '</h5>';
				echo '<h1>'. $welcome. '</h1>';
				echo '<p>'. $welcome_copy. '</p>';
				?>

			</div>
		</div>
		<?php echo '<div class="col-sm-5 col-md-6 col-lg-7 photo" style="background-image:url('. $welcome_image. ')"></div>'; ?>
		<!--<div class="col-sm-5 col-md-6 col-lg-7 photo"></div>-->
	</section>

	<!-- ============ WELCOME END ============ -->

	<!-- ============ ROOMS START ============ -->

	<section id="rooms" class="row color3 home-section">
		<?php //echo '<div class="col-sm-5 col-md-6 col-lg-7 photo" style="background-image:url('. $rooms_image. ')"></div>'; ?>
		<div class="col-sm-5 col-md-6 col-lg-7 video-container">
			<?php echo wp_oembed_get( $rooms_video ); ?>
		</div>

		<div class="col-sm-7 col-md-6 col-lg-5 text">
			<div class="padding">
				<?php
				echo '<h5>'. $rooms_intro. '</h5>';
				echo '<h1>'. $rooms_title. '</h1>';
				echo '<p>'. $rooms_copy. '</p>';
				?>

			</div>
		</div>
	</section>

	<!-- ============ ROOMS END ============ -->

	<!-- ============ SPECIAL OFFERS START ============ -->

	<section id="specials">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h5>Check Out our latest</h5>
					<h1>Special Offers</h1>
					<div class="owl-carousel">

						<?php $offers2 = get_post_meta( $offer_id, 'bh_offers_group', true );

						foreach ( (array) $offers2 as $offer ) {
							$img = $title = $rate = '';
							if ( isset( $offer['name'] ) )
								$title = esc_html( $offer['name'] );
							if ( isset( $offer['rate'] ) )
								$rate = esc_html( $offer['rate'] );

							if ( isset( $offer['image_id'] ) ) {
								$img = wp_get_attachment_image( $offer['image_id'], 'share-pick', null, array(
									'class' => 'thumb img-responsive',
								) );
							} ?>
							<!-- Special Offer wrap -->
							<div class="special-offer" style="background-color:#fff;">
								<?= $img; ?>
								<h4><?= $title; ?></h4>
								<p><a href="specials.html" class="btn btn-primary">Book Now</a></p>
								<div class="price">
									from <span class="primary-color"><?= $rate; ?></span> pps
								</div>
							</div>
						<?php }  ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ============ SPECIAL OFFERS END ============ -->
	<!-- ============ REVIEWS START ============ -->
	<?php
		$reviews2 = get_post_meta( $review_id, 'bh_reviews_group', true );
		$firstReview = (is_array($reviews2) && is_array(current($reviews2))) ? current($reviews2) : array();
		if( count($reviews2) > 1 || is_array($firstReview) && array_key_exists('testimonial', $firstReview) && !empty($firstReview['testimonial']) ||
			array_key_exists('customer', $firstReview) && !empty($firstReview['customer']) ||
			array_key_exists('review-title', $firstReview) && !empty($firstReview['review-title']) ) { ?>
	<section id="home-reviews" class="primary-background">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h5>Our latest</h5>
					<h1>Guest Reviews</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="owl-carousel">
						<?php

						foreach( (array) $reviews2 as $review ){

							// Default all variables incase they are not defined in the dataset.
							$testimonial = '';
							$customer = '';
							$reviewTitle = '';
							$img = '';

							// If $review => 'testimonial' key exists and is not empty assign it to the $testimonial var.
							if( array_key_exists('testimonial', $review) && !empty($review['testimonial']) ){
								$testimonial = esc_html($review['testimonial']);
							}

							// If $review => 'customer' key exists and is not empty assign it to the $customer var.
							if( array_key_exists('customer', $review) && !empty($review['customer']) ){
								$customer = esc_html($review['customer']);
							}

							// If $review => 'review-title' key exists and is not empty assign it to the $reviewTitle var.
							if( array_key_exists('review-title', $review) && !empty($review['review-title']) ){
								$reviewTitle = esc_html($review['review-title']);
							}

							// If $review => 'image_id' key exists and is not empty assign it to the $img var.
							if( array_key_exists('image_id', $review) && !empty($review['image_id']) ){
								$img = wp_get_attachment_image($review['image_id'], 'share-pick', null, array(
									'class' => 'thumb img-responsive',
								));
							}

							// Render out the html for each iteration of the $review2 array
							?>

							<!-- Latest Review -->
							<div class="latest-review">
								<div class="text-center">
									<h3>
										<?= $reviewTitle; ?>
									</h3>
								</div>
								<blockquote><?= $testimonial; ?><small><?= $customer; ?></small></blockquote>
							</div>
						<?php } // END foreach ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 text-center">
					<a href="reviews.html" class="btn color3">Read All Reviews</a>
				</div>
			</div>
		</div>
	</section>
	<?php } //End if for the reviews ?>
	<!-- ============ REVIEWS END ============ -->

	<!-- ============ BLOG START ============ -->

	<section id="blog">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h5>Recent posts</h5>
					<h1>Blog</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="owl-carousel">
						<!-- Latest Post 1 -->
						<?php $loop = new WP_Query(array('post_type' => 'post', 'posts_per_page' => -1, 'orderby'=> 'ASC')); ?>
						<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
							<div class="latest-post">
								<?php
								$postTitle = get_the_title();
								$post_image = the_post_thumbnail();

								$source_image = $post_image; // let's assume this image has the size 100x100px
								$width = 600; // note, how this exceeds the original image size
								$height = 400; // some pixel less than the original
								$crop = true; // if this would be false, You would get a 90x90px image. For users of prior
								// Aqua Resizer users, You would have get a 100x90 image here with $crop = true
								$resized_image = aq_resize($source_image, $width, $height, $crop);
								?>

								<a title="<?= $postTitle; ?>" href="<?php print  get_permalink($post->ID) ?>">
									<?= $resized_image; ?></a>
								<h4><?= $postTitle; ?></h4>
								<?php print the_excerpt(); ?>
								<p><a class="btn btn-default" href="<?php print  get_permalink($post->ID) ?>">More</a></p>
							</div>
						<?php endwhile; ?>


					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 text-center">
						<a href="blog.html" class="btn btn-primary">Read All Posts</a>
					</div>
				</div>
			</div>
	</section>

	<!-- ============ BLOG END ============ -->

<?php get_footer(); ?>