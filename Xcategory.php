<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package labs_by_Sedoo
 */

get_header();

// get the current taxonomy term
$term = get_queried_object();
$code_color=labs_by_sedoo_main_color();
$tax_layout = get_field('tax_layout', $term);
$cover = get_field( 'tax_image', $term);

?>

	<div id="content-area" class="wrapper archives">
		<main id="main" class="site-main">
		<?php
		if ( !empty($cover)) {
				$coverStyle = "background-image:url(".$cover['url'].")";
			} else {
				$coverStyle = "border-top:5px solid ".$code_color.";height:auto;";
			}
			?>
			
			<header id="cover" class="page-header" style="<?php echo $coverStyle;?>">
							
			</header><!-- .page-header -->
			<h1 class="page-title">
				<?php
				single_cat_title('', true);
				?>
			</h1>
			<?php
			if (get_the_archive_description()) {
				the_archive_description( '<div class="archive-description">', '</div>' );
			}
		?>
		<?php
            /**
             * WP_Query pour lister tous les types de posts
             */
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
				'post_type' => array('post', 'page'),
				// 'post_type' 			=> 'sfdsd',
                'post_status'           => array( 'publish' ),
				'posts_per_page'        => 10,            // -1 pour liste sans limite
				'paged'					=> $paged,
                // 'post__not_in'          => array($postID),    //exclu le post courant
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'slug',
                        'terms'    => $term->slug,
                    ),
                ),
            );
            $the_query = new WP_Query( $args );
			// var_dump($the_query);
			// The Loop
        if ( $the_query->have_posts() ) { 
		// if ( have_posts() ) : 	

			if ( $tax_layout == "grid") {
				$listingClass = "post-wrapper";
			} else {
				$listingClass = "content-list";
			}

			if ( $tax_layout == "") {
				$tax_layout = "list";
			}
			?>
            <section role="listNews" class="<?php echo $listingClass;?>">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', $tax_layout );


			endwhile;

			the_posts_navigation();

		} else {

			// get_template_part( 'template-parts/content', 'none' );
			?>
			<p>No opportunities are currently available.</p>
			<?php

		}
		?>
            </section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
