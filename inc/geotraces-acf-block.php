<?php
/**
 * ACF gutenberg Block
 */

function sedoo_wpthch_geotraces_register_acf_block_types() {

    // register a list of members block (geotraces).
    acf_register_block_type(array(
        'name'              => 'sscmembers',
        'title'             => __('SSC members & Officers'),
        'description'       => __('List SSC members block.'),
        'render_template'   => 'template-parts/blocks/sscmembers/sscmembers.php',
        'category'          => 'widgets',
        'icon'              => 'groups',
        'keywords'          => array( 'ssc', 'user' ),
    ));

    // register a post list block.
    acf_register_block_type(array(
        'name'              => 'postlist',
        'title'             => __('Sedoo Post list block'),
        'description'       => __('List post by categories and choose layout.'),
        'render_template'   => 'template-parts/blocks/sedoo-post-list/sedoo-post-list.php',
        'category'          => 'widgets',
        'icon'              => 'grid-view',
        'keywords'          => array( 'post', 'grid', 'categories' ),
    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'sedoo_wpthch_geotraces_register_acf_block_types');
}


?>