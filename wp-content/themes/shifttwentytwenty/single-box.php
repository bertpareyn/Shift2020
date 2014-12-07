<?php
/**
 * The template for displaying all single box posts
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php $custom_fields = get_post_custom($ID); ?>

				<div class="box-image" style="background-image: url('<?php echo wp_get_attachment_image_src($custom_fields['image'][0], 'large')[0]; ?>')">
					<div class="box-description">
						<h3><?php echo $custom_fields['name'][0] ?></h3>
						<small><?php echo $custom_fields['role'][0] ?></small>
						<p><?php echo $custom_fields['description'][0] ?></p>
					</div>
				</div>

			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>