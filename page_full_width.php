<?php
/**
 * Template Name: Full width Page
 *
 * This is the template that displays full width
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Medsites
 */

get_header(); ?>

	<div id="primary" class="content-area col-md-12">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer();