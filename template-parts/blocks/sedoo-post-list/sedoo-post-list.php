<?php

$title = get_field( 'sedoo-block-post-list-title');
$term = get_field( 'sedoo-block-post-list-categories' );
$layout = get_field( 'sedoo-block-post-list-layout' );
$limit = get_field( 'sedoo-block-post-list-limit' );
$offset = get_field( 'sedoo-block-post-list-offset' );
$buttonLabel = get_field( 'sedoo-block-post-list-showmore-button-label' );
$button = get_field( 'sedoo-block-post-list-showmore-button' );

if (empty($term)) {
    $term = "all";
} else {
    $term = $term->slug;
}

if (empty($buttonLabel)) {
    $buttonLabel = "More";
}
// SHOW POST LIST
sedoo_wpthch_geotraces_postlist_by_term($title, $term, $layout, $limit, $offset, $buttonLabel, $button);

?>