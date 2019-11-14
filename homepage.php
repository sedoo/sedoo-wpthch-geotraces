<?php
/*
Template Name: Homepage
*/
// Description (slogan)
$description = get_bloginfo( 'description', 'display' );

get_header();
?>
<header id="cover" class="site-branding" style="background-image:url(<?php header_image()?>);">
            <div class="wrapper">
                <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
                <?php
                if ( $description || is_customize_preview() ) { ?>
                <h2 class="site-description"><?php echo $description; ?></h2>
                    <?php
                }
                ?>
            </div>
        </header>
<div id="primary" class="content-area wrapper-layout home-content">
    <main id="main" class="site-main">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
            <?php the_content(); ?>
        </div>
        <?php endwhile; endif; ?>

        <?php
        // SHOW NEWS LIST
        sedoo_wpthch_geotraces_postlist_by_term('News', 'news', 'grid-noimage', '4');
        ?>
        <?php
        // SHOW HIGHLIGHTS LIST
        sedoo_wpthch_geotraces_postlist_by_term('Science highlights', 'newsflash', 'grid', '4');
        ?>
    </main><!-- #main -->

    <?php if ( is_active_sidebar( 'home_right_1' ) ) : ?>
    <aside id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
        <?php dynamic_sidebar( 'home_right_1' ); ?>

        <div class="social-partenaires">
            <?php if( have_rows('reseaux_sociaux', 'option') ): ?>
            <div class="social-list">
                <h2><?php echo __('Follow us', 'sedoo-wpth-labs'); ?></h2>
                <ul class="inline-list">

                <?php while( have_rows('reseaux_sociaux', 'option') ): the_row(); 

                    // vars
                    $link = get_sub_field('lien_reseau_social', 'option');
                    ?>

                    <li class="list">

                        <?php if( $link ): ?>
                            <a href="<?php echo $link; ?>">
                            </a>
                        <?php endif; ?>

                    </li>

                <?php endwhile; ?>

                </ul>
            </div>
            <?php endif; ?>
        </div>
    </div><!-- #primary-sidebar -->
    <?php endif; ?>

</div><!-- #primary -->

<?php
get_footer();