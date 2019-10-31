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


function sedoo_wpthch_geotraces_postlist_by_term($title, $term, $layout, $limit) {
    global $post;
    $argsListPost = array(
        'posts_per_page'   => $limit,
        'offset'           => 0,
        "tax_query" => array(
            array(
                "taxonomy" => "category",
                "field"    => "slug",
                "terms"    => $term,
            )
        ),
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
    $url= get_term_link($term, 'category');

    if ( $layout == "grid") {
        $listingClass = "post-wrapper";
    } else {
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


?>