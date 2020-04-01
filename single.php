<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package aeris
 */

get_header(); 
$code_color=labs_by_sedoo_main_color();
$format = get_post_format();
$categories = get_the_category();
$terms=array();
if (is_array($categories) || is_object($categories))
{
  foreach ($categories as $term_slug) {        
     array_push($terms, $term_slug->slug);
  }
}

while ( have_posts() ) : the_post();

$themes = get_the_terms( $post->ID, 'category');  
$themeSlugRewrite = "category";
// foreach ($terms as $term) {
// echo $term;
// }
?>
	<div id="primary" class="content-area <?php echo esc_html( $categories[0]->slug );?>">
        <?php
            if ( has_post_thumbnail() ) {
        ?>
            <header id="cover">
                <?php the_post_thumbnail('cover'); ?>
            </header>
        <?php 
        } else {
            $headerBorder="";
            ?>
            <header id="cover" style="border-top:5px solid <?php echo $code_color;?>;height:auto;">
            </header>
        <?php
        }
        ?>
        <div class="wrapper-layout" <?php if (isset($headerBorder)) {echo "style=\"padding-top:140px\"";}?>>
            <main id="main" class="site-main">
                <article id="post-<?php the_ID();?>">	
                    <header>
                        <h1><?php the_title(); ?></h1>
                        <div>
                            <?php 
                            if( function_exists('sedoo_show_categories') ){
                            sedoo_show_categories($themes, $themeSlugRewrite);
                            }
                            ?>
                            <p class="post-meta"><?php the_date(); ?></p>
                        </div>
                    </header>
                    <section>
                        <?php the_content(); ?>
                    </section>
                    <?php if (get_field("sources")){ ?>
                    <footer class="sources">
                        <h2><?php echo __('Sources', 'sedoo-wpth-labs'); ?> :</h2>
                        <p><?php the_field("sources") ?></p>
                    </footer>
                    <?php } ?>
                </article>
            </main><!-- #main -->
            <aside>
                <?php if (( is_active_sidebar( 'tag_cloud_sidebar' ) )&& (in_array('newsflash', $terms))): ?>
                <aside id="tagcloud-sidebar" class="widget-area" role="complementary">
                    <?php dynamic_sidebar( 'tag_cloud_sidebar' ); ?>
                </aside><!-- #primary-sidebar -->
                <?php endif; ?>
                <?php 
                get_sidebar();
                ?>
            </aside>
        </div>
        
        <?php //get_template_part('template-parts/nav-box'); ?>
	</div><!-- #primary -->
<?php
endwhile; // End of the loop.
 
get_footer();
