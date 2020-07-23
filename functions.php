<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

/**
 * REGISTER NAV MENU AREAS
 */
register_nav_menus(array('top-header' => 'Top header navigation'));

 /**
  * REGISTER WIDGET AREAS
  */
function sedoo_wpthch_geotraces_widgets_init() {

    register_sidebar( array(
		'name'          => 'Home top area',
		'id'            => 'home_top_area',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
    ) );

	register_sidebar( array(
		'name'          => 'Home right sidebar',
		'id'            => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
    ) );

    register_sidebar(array(
		'name'          => 'Tag cloud side bar',
		'id'            => 'tag_cloud_sidebar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
		'name'          => 'Footer menu 1',
		'id'            => 'footer_menu_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
    ) );
    
    register_sidebar( array(
		'name'          => 'Footer menu 2',
		'id'            => 'footer_menu_2',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
    ) );
    
    register_sidebar( array(
		'name'          => 'Footer menu 3',
		'id'            => 'footer_menu_3',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'sedoo_wpthch_geotraces_widgets_init' );


function sedoo_wpthch_geotraces_postlist_by_term($title, $term, $layout, $limit, $offset, $buttonLabel, $button) {
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
            if(is_wp_error(get_term_link($term, 'category'))) {
                $url = 'nourl';
            } else {
                $url = get_term_link($term, 'category');
            }
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
    <?php 
    if ($button == 1 && $url != 'nourl') { ?>   
    <a href="<?php echo $url; ?>" class="btn"><?php echo $buttonLabel; ?></a>
    <?php
        }
    ?>
    
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
 $args['smallest'] = '12';
 $args['largest'] = '18';
 
 return $args;
}

/******************************************************************
 * Activate categories to pages 
 */

function sedoo_wpthch_geotraces_categories_to_pages() {
register_taxonomy_for_object_type( 'category', 'page' );
}
add_action( 'init', 'sedoo_wpthch_geotraces_categories_to_pages' );

/* redirect home after login */
function login_redirect( $redirect_to, $request, $user ){
    return home_url();
}
add_filter( 'login_redirect', 'login_redirect', 10, 3 );


/**
 * Include ACF Fields
 */
require 'inc/geotraces-acf-config.php';
require 'inc/geotraces-acf-block.php';
?>