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

    </main><!-- #main -->

    <?php if ( is_active_sidebar( 'home_right_1' ) ) : ?>
    <aside id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
        <?php dynamic_sidebar( 'home_right_1' ); ?>


    </div><!-- #primary-sidebar -->
    <?php endif; ?>

</div><!-- #primary -->

<?php
get_footer();