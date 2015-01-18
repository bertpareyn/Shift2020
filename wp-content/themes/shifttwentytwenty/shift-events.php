<?php
/**
 * Template Name: Page of Shift2020 Events
 *
 * Print posts of a Custom Post Type.
 */

get_header(); ?>
    <div id="container">
        <div id="content">
            <?php
                $args = array (
                    'post_type' => 'event',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'ignore_sticky_posts'=> 1,
                    'meta_key' => 'event_start_date',
                    'orderby' => 'meta_value_num',
                    'order' => 'DESC',
                    'meta_query' => array(
                        'relation' => 'AND',
                        array(
                            'key' => 'event_start_date',
                            'value' => date('Ymd'),
                            'compare' => '>'
                        ),
                        array(
                            'key' => 'shift2020_event',
                            'value' => 1,
                            'compare' => '='
                        )
                    )
                );
                $wp_query = new WP_Query($args); 
            ?>

            <?php if ($wp_query->have_posts()) { ?>
                <h1 style="text-align: center;">Shift2020's <strong>upcoming</strong> appearances</h1>

                <div class="box-image-container">
                    <?php while ( $wp_query->have_posts() ) : the_post(); ?>

                        <?php
                            $custom_fields = get_post_custom($ID);
                            $event_title = $custom_fields['event_title'][0];
                            $event_description = $custom_fields['event_description'][0];
                            $event_start_date = $custom_fields['event_start_date'][0];
                            $event_end_date = $custom_fields['event_end_date'][0];
                            $event_location = $custom_fields['event_location'][0];
                            $cover = $custom_fields['event_cover_image'];
                            $cover = $cover[0];
                            $cover = wp_get_attachment_image_src($cover, 'large');
                            $cover = $cover[0];
                            $shift2020_event = $custom_fields['shift2020_event'][0];

                            if ($event_end_date) {
                                $date = date('jS', strtotime($event_start_date)) . ' - ' . date('jS F Y', strtotime($event_end_date));
                            } else {
                                $date = date('jS F Y', strtotime($event_start_date));
                            }
                        ?>

                        <div class="box-image" style="background-image: url('<?php echo $cover ?>')">
                            <div class="box-description">
                                <h3><?php echo $event_title ?></h3>
                                <p><?php echo $event_description ?></p>
                                <p class="event-date-time"><?php echo $date ?></p>
                                <p class="event-location"><?php echo $event_location ?></p>
                            </div>
                        </div>

                    <?php endwhile; ?>
                </div>
            <?php } ?>



            <?php
                $args = array (
                    'post_type' => 'event',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'ignore_sticky_posts'=> 1,
                    'meta_key' => 'event_start_date',
                    'orderby' => 'meta_value_num',
                    'order' => 'DESC',
                    'meta_query' => array(
                        'relation' => 'AND',
                        array(
                            'key' => 'event_start_date',
                            'value' => date('Ymd'),
                            'compare' => '<'
                        ),
                        array(
                            'key' => 'shift2020_event',
                            'value' => 1,
                            'compare' => '='
                        )
                    )
                );
                $wp_query = new WP_Query($args); 
            ?>

            <?php if ($wp_query->have_posts()) { ?>
                <h1 style="text-align: center;">Shift2020's <strong>previous</strong> appearances</h1>

                <div class="box-image-container">
                    <?php while ( $wp_query->have_posts() ) : the_post(); ?>

                        <?php

                            $custom_fields = get_post_custom($ID);
                            $event_title = $custom_fields['event_title'][0];
                            $event_description = $custom_fields['event_description'][0];
                            $event_start_date = $custom_fields['event_start_date'][0];
                            $event_end_date = $custom_fields['event_end_date'][0];
                            $event_location = $custom_fields['event_location'][0];
                            $cover = $custom_fields['event_cover_image'];
                            $cover = $cover[0];
                            $cover = wp_get_attachment_image_src($cover, 'large');
                            $cover = $cover[0];
                            $shift2020_event = $custom_fields['shift2020_event'][0];

                            if ($event_end_date) {
                                $date = date('jS', strtotime($event_start_date)) . ' - ' . date('jS F Y', strtotime($event_end_date));
                            } else {
                                $date = date('jS F Y', strtotime($event_start_date));
                            }
                        ?>

                        <div class="box-image" style="background-image: url('<?php echo $cover ?>')">
                            <div class="box-description">
                                <h3><?php echo $event_title ?></h3>
                                <p><?php echo $event_description ?></p>
                                <p class="event-date-time"><?php echo $date ?></p>
                                <p class="event-location"><?php echo $event_location ?></p>
                            </div>
                        </div>

                    <?php endwhile; ?>
                </div>
            <?php } ?>

        </div><!-- #content -->
    </div><!-- #container -->
    <div class="footer-clear"></div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>