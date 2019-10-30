<header id="cover" class="page-header" style="background-image:url(<?php header_image()?>);">
				
</header><!-- .page-header -->
<h1 class="page-title">
    <?php
    single_cat_title('', true);
    ?>
</h1>
<?php
the_archive_description( '<div class="archive-description">', '</div>' );
?>