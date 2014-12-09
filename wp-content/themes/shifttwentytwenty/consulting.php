<?php
/**
 * Template Name: Page of Consulting
 *
 * Print posts of a Custom Post Type.
 */

get_header(); ?>
    <div id="container">
        <div id="content">
            <?php
                $args = array (
                    'post_type' => 'consulting',
                    'post_status' => 'publish',
                    'posts_per_page' => 10,
                    'ignore_sticky_posts'=> 1
                );
                $wp_query = new WP_Query($args); 
            ?>

            <h1 class="page-header-title">Our ambition is to revolutionise the way we all envision the future and the impact of technology</h1>

            <div class="box-image-container">
                <?php while ( $wp_query->have_posts() ) : the_post(); ?>

                    <?php $custom_fields = get_post_custom($ID); ?>
                    <?php $imageURL = wp_get_attachment_image_src($custom_fields['cover_image'][0], 'large')[0] ?>
                    <?php $title = $custom_fields['consulting_title'][0] ?>
                    <?php $link = $custom_fields['link'][0] ?>
                    <?php $link_title = $custom_fields['link_title'][0] ?>
                    <?php $description = $custom_fields['description'][0] ?>
                    <?php $start_date = $custom_fields['start_date'][0] ?>
                    <?php $end_date = $custom_fields['end_date'][0] ?>
                    <?php $note = $custom_fields['note'][0] ?>

                    <?php
                        $date = null;
                        if ($end_date && $start_date) {
                            $date = date('jS', strtotime($start_date)) . ' - ' . date('jS F Y', strtotime($end_date));
                        } elseif ($start_date) {
                            $date = date('jS F Y', strtotime($start_date));
                        }
                    ?>

                    <div class="box-image" style="background-image: url('<?php echo $imageURL ?>')">
                        <div class="box-description">
                            <h3><?php echo $title ?></h3>
                            <p><?php echo $description ?></p>
                            <?php
                                if ($link) {
                                    if ($link_title) {
                                        $title = $link_title;
                                    }

                                    echo '<a href="' . $link . '" title="' . $title . '" style="float: left; margin: 12px 0;">' . $title . '</a>';
                                }
                                if ($date) {
                                    echo '<p class="event-date-time">' . $date . '</p>';
                                }
                                if ($note) {
                                    echo '<small>' . $note . '</small>';
                                }
                            ?>
                        </div>
                    </div>

                <?php endwhile; ?>
            </div>
        </div><!-- #content -->
    </div><!-- #container -->
    <div class="footer-clear"></div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>