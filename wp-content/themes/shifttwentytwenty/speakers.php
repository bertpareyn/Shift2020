<?php
/**
 * Template Name: Page of Speakers
 *
 * Print posts of a Custom Post Type.
 */

get_header(); ?>
    <div id="container">
        <div id="content">
            <?php
                $args = array (
                    'post_type' => 'speaker',
                    'post_status' => 'publish',
                    'posts_per_page' => 10,
                    'ignore_sticky_posts'=> 1
                );
                $wp_query = new WP_Query($args); 
            ?>

            <h1 style="text-align: center;">We span the world, speaking at many major events</h1>

            <div class="box-image-container">
                <?php while ( $wp_query->have_posts() ) : the_post(); ?>

                    <?php $custom_fields = get_post_custom($ID); ?>
                    <?php $imageURL = wp_get_attachment_image_src($custom_fields['image'][0], 'large')[0] ?>
                    <?php $name = $custom_fields['name'][0] ?>
                    <?php $role = $custom_fields['role'][0] ?>
                    <?php $description = $custom_fields['description'][0] ?>

                    <div class="box-image" style="background-image: url('<?php echo $imageURL ?>')">
                        <div class="box-description">
                            <h3><?php echo $name ?></h3>
                            <small><?php echo $role ?></small>
                            <p><?php echo $description ?></p>
                        </div>
                    </div>

                <?php endwhile; ?>
            </div>
        </div><!-- #content -->
    </div><!-- #container -->
    <div class="footer-clear"></div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>