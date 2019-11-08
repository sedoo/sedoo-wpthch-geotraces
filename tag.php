<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package labs_by_Sedoo
 */

get_header();
?>

	<div id="content-area" class="wrapper archives">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>
			<?php
			get_template_part( 'template-parts/header-category', '' );
			?>
            
            <section role="listNews" class="content-list">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content-list', get_post_type() );


			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
            </section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
