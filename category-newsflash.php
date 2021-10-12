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

	<div id="content-area" class="wrapper archives newsflash">
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
		<div class="wrapper-layout-newsflash">
			<main id="main" class="site-main">
			<?php
            /**
             * WP_Query pour lister tous les types de posts
             */
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            /* sedoo_wpth_labs_get_queried_content_arguments(post_types, taxonomy, slug, display, paged) */
			sedoo_wpth_labs_get_queried_content_arguments(array('post', 'page'), 'category', $term->slug, $tax_layout, $paged);
			?>			

			</main><!-- #main -->
			<aside id="tagcloud-sidebar" class="widget-area" role="complementary">
                <h2>Filter by keyword</h2>
				<?php //dynamic_sidebar( 'tag_cloud_sidebar' ); 
				wp_tag_cloud( array(
					'smallest' => 12, // size of least used tag
					'largest'  => 25, // size of most used tag
					'unit'     => 'px', // unit for sizing the tags
					'number'   => 0, // displays at most 45 tags
					'orderby'  => 'name', // order tags alphabetically
					'order'    => 'ASC', // order tags by ascending order
					'taxonomy' => 'post_tag' // you can even make tags for custom taxonomies
				 ) );
				?>

			</aside><!-- #primary-sidebar -->
		</div>
	</div><!-- #primary -->

<?php
get_footer();
