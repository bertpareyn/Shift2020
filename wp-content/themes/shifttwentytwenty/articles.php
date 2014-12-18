<?php
/**
 * Template Name: Page of Articles
 *
 * Print posts of a Custom Post Type.
 */

get_header(); ?>
    <div id="container">
        <div id="content">
            <?php
                $args = array (
                    'post_type' => 'article',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'ignore_sticky_posts'=> 1
                );
                $wp_query = new WP_Query($args); 
            ?>

            <div class="books-container">
                <?php while ( $wp_query->have_posts() ) : the_post(); ?>

                    <?php

                        $custom_fields = get_post_custom($ID);
                        $title = $custom_fields['article_title'][0];
                        $note = $custom_fields['note'][0];
                        $description = $custom_fields['article_description'][0];
                        $cover = $custom_fields['article_cover'];
                        $cover = $cover[0];
                        $cover = wp_get_attachment_image_src($cover, 'large');
                        $cover = $cover;
                        $link = $custom_fields['link'][0];
                        $linkText = $custom_fields['link_text'][0];

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