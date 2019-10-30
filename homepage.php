<?php
/*
Template Name: Homepage
*/
// Description (slogan)
$description = get_bloginfo( 'description', 'display' );

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
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
        <div class="wrapper-layout home-content">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
                <?php the_content(); ?>
            </div>
            <?php endwhile; endif; ?>
            <?php
                global $post;
                $argsListPost = array(
                    'posts_per_page'   => 4,
                    'offset'           => 0,
                    'category'         => '',
                    'category_name'    => '',
                    'orderby'          => 'date',
                    'order'            => 'DESC',
                    'include'          => '',
                    'exclude'          => '',
                    'meta_key'         => '',
                    'meta_value'       => '',
                    'post_type'        => 'post',
                    'post_mime_type'   => '',
                    'post_parent'      => '',
                    'author'		   => '',
                    'author_name'	   => '',
                    'post_status'      => 'publish',
                    'suppress_filters' => true 
                );

                $postsList = get_posts ($argsListPost);
            
                if ($postsList){
                    
                
            ?>
            <h2><?php echo __('Les dernières actualités', 'sedoo-wpth-labs') ?></h2>
            <section role="listNews" class="post-wrapper">
                
                <?php

                foreach ($postsList as $post) :
                  setup_postdata( $post );
                    ?>
                    <?php
                    get_template_part( 'template-parts/content', get_post_format() );
                    ?>
                    <?php
                endforeach;
                ?>	
            </section>
            <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="btn"><?php echo __('Voir toutes les actualités', 'sedoo-wpth-labs'); ?></a>
            
            <?php 
                }
                the_posts_navigation();
                wp_reset_postdata();
            ?>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();