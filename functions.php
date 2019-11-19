<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

function sedoo_wpthch_geotraces_widgets_init() {

	register_sidebar( array(
		'name'          => 'Home right sidebar',
		'id'            => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'sedoo_wpthch_geotraces_widgets_init' );


function sedoo_wpthch_geotraces_postlist_by_term($title, $term, $layout, $limit, $offset) {
    global $post;
    
    $argsListPost = array(
        'posts_per_page'   => $limit,
        'offset'           => $offset,
        'orderby'          => 'date',
        'order'            => 'DESC',
        'include'          => '',
        'exclude'          => '',
        'meta_key'         => '',
        'meta_value'       => '',
        'post_type'        => 'post',
        'post_status'      => 'publish',
        'suppress_filters' => true 
    );

    if ($term !== "all") {
        $argsListPost['tax_query'] = array(
                        array(
                            "taxonomy" => "category",
                            "field"    => "slug",
                            "terms"    => $term,
                        )
                        );
        $url = get_term_link($term, 'category');
        } else {
        $url = get_permalink( get_option( 'page_for_posts' ) );
        }

    switch ($layout) {
        case "grid" :
            $listingClass = "post-wrapper";
            break;

        case "grid-noimage" :
            $listingClass = "post-wrapper noimage";
            break;

        default:
            $listingClass = "content-list";
    }    

    $postsList = get_posts ($argsListPost);
    
    if ($postsList){       
    ?>
    <h2><?php echo __($title, 'sedoo-wpth-labs') ?></h2>
    <section role="listNews" class="<?php echo $listingClass;?>">
        
        <?php

        foreach ($postsList as $post) :
          setup_postdata( $post );
            ?>
            <?php
            get_template_part( 'template-parts/content', $layout );
            ?>
            <?php
        endforeach;
        ?>	
    </section>
    <a href="<?php echo $url; ?>" class="btn"><?php echo __('See all '.$title.'', 'sedoo-wpth-labs'); ?></a>
    
    <?php 
    the_posts_navigation();
    wp_reset_postdata();
    }
}

/****
 * DEFAULT IMAGE ATTACHMENT SETTINGS
 */

add_action( 'after_setup_theme', 'sedoo_wpthch_geotraces_default_image_settings' );

function sedoo_wpthch_geotraces_default_image_settings() {
    update_option( 'image_default_align', 'center' );
    update_option( 'image_default_link_type', 'none' );
    update_option( 'image_default_size', 'medium' );
}

/**
 * TAG CLOUD LIMIT HOOK
 */

//Register tag cloud filter callback
add_filter('widget_tag_cloud_args', 'sedoo_wpthch_geotraces_tag_widget_limit');
 
//Limit number of tags inside widget
function sedoo_wpthch_geotraces_tag_widget_limit($args){
 
 //Check if taxonomy option inside widget is set to tags
 if(isset($args['taxonomy']) && $args['taxonomy'] == 'post_tag'){
  $args['number'] = 0; //Limit number of tags
 }
 
 return $args;
}

/**
 * Include ACF Fields
 */
require 'inc/geotraces-acf-config.php';
require 'inc/geotraces-acf-block.php';
?>