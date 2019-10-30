<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package labs_by_Sedoo
 */

get_header();

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <?php
            if (get_the_post_thumbnail()) {
            ?>
                <header id="cover">
                    <?php the_post_thumbnail(); ?>
                </header>
            <?php 
            }
            ?>
            <div class="wrapper-content">
                <?php
                while ( have_posts() ) :
                    the_post();

                    get_template_part( 'template-parts/content', 'page' );

                    // If comments are open or we have at least one comment, load up the comment template.
                    // if ( comments_open() || get_comments_number() ) :
                    //     comments_template();
                    // endif;

                endwhile; // End of the loop.
                ?>
            </div>
		</main><!-- #main -->
        <?php // table_content ( value )
        if (get_field( 'table_content' )):
        ?>
        <aside id="stickyMenu" 
               <?php if(wp_is_mobile()){ ?> 
                    class="" 
               <?php } else { ?> 
                    class="open" 
               <?php } ?>>
            <div>
                <div>
                    <p><?php echo __('Sommaire', 'sedoo-wpth-labs'); ?></p>
                    <nav role="sommaire">
                        <ol id="tocList">

                        </ol>
                    </nav>
                </div>
                <button class="bobinette">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                            <rect fill="none" width="30" height="30"/>
                            <polyline points="
                            10.71,2.41 23.29,15 10.71,27.59 	"/>
                    </svg> 
                </button>
            </div>
        </aside>
        <?php endif; ?>
	</div><!-- #primary -->
<?php

get_footer();
