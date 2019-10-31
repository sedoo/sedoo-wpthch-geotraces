<?php 

// $cover = get_field( 'tax_image', $term);

if ( $cover ) {
    $coverStyle = "background-image:url(".$cover.")";
} else {
    $coverStyle = "border-top:5px solid #309fb3;height:auto;";
}
?>

<header id="cover" class="page-header" style="<?php echo $coverStyle;?>">
				
</header><!-- .page-header -->
<h1 class="page-title">
    <?php
    single_cat_title('', true);
    ?>
</h1>
<?php
if (get_the_archive_description()) {
    the_archive_description( '<div class="archive-description">', '</div>' );
}
?>