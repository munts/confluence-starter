<?php
/*
Template Name: Owl Test Page
*/
/**
 * @author Scott Taylor
 * @package bunkhouse
 * @subpackage Customizations
 */
get_header();
?>

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