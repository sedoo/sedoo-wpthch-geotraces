<?php
/**
 * ACF gutenberg Block
 */

function sedoo_wpthch_geotraces_register_acf_block_types() {

    // register a testimonial block.
    acf_register_block_type(array(
        'name'              => 'sscmembers',
        'title'             => __('SSC members & Officers'),
        'description'       => __('List SSC members block.'),
        'render_template'   => 'template-parts/blocks/sscmembers/sscmembers.php',
        'category'          => 'widgets',
        'icon'              => 'groups',
        'keywords'          => array( 'ssc', 'user' ),
    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'sedoo_wpthch_geotraces_register_acf_block_types');
}


?>