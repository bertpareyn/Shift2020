<?php
/**
 * Template Name: Page of Slides
 *
 * Print posts of a Custom Post Type.
 */

get_header(); ?>
    <div id="container">
        <div id="content">
            <?php
                $args = array (
                    'post_type' => 'slide',
                    'post_status' => 'publish',
                    'posts_per_page' => 10,
                    'ignore_sticky_posts'=> 1
                );
                $wp_query = new WP_Query($args); 
            ?>

            <div class="books-container">
                <?php while ( $wp_query->have_posts() ) : the_post(); ?>

                    <?php $custom_fields = get_post_custom($ID); ?>
                    <?php $title = $custom_fields['slides_title'][0] ?>
                    <?php $edition = $custom_fields['edition'][0] ?>
                    <?php $note = $custom_fields['note'][0] ?>
                    <?php $description = $custom_fields['slides_description'][0] ?>
                    <?php $cover = wp_get_attachment_image_src($custom_fields['slides_cover'][0], 'large')[0] ?>
                    <?php $link = $custom_fields['link'][0] ?>
                    <?php $linkText = $custom_fields['link_text'][0] ?>

                    <?php
                        if ($link && $linkText) {
                            $addLink = true;
                            $linkButton = true;
                        } elseif ($link && !$linkText) {
                            $addLink = true;
                            $linkButton = false;
                        } elseif (!$link) {
                            $addLink = false;
                        }
                    ?>

                    <div class="book-container">
                        <div class="book-image">
                            <?php
                                if ($addLink && !$linkButton) {
                                    echo '<a href="' . $link . '">';
                                }
                            ?>
                            <img src="<?php echo $cover ?>">
                            <?php
                                if ($addLink && !$linkButton) {
                                    echo '</a>';
                                } elseif ($addLink && $linkButton) {
                                    echo '<a href="' . $link . '" title="' . $linkText . '">' . $linkText . '</a>';
                                }
                            ?>
                        </div>
                        <div class="book-meta">
                            <h1><?php echo $title ?></h1>
                            <h2><?php echo $edition ?></h2>
                            <h3><?php echo $note ?></h3>
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