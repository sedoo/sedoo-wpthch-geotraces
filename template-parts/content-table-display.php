<?php
/**
 * Template part for displaying posts - simple list
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package labs_by_Sedoo
 */


?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php //the_permalink(); ?>
	<header class="entry-header">
        <?php     
        // $categories = get_the_category();
        // if ( ! empty( $categories ) ) {
        // echo esc_html( $categories[0]->name );   
        // }; 
        ?>
        <h2><?php the_title(); ?></h2>
	</header><!-- .entry-header -->
    <div class="group-content">
        <div class="entry-content">
            
            <?php the_content(); ?>
            <p><?php the_date('j / M / Y') ?></p>
        </div><!-- .entry-content -->
        <footer class="entry-footer">
            <?php
            if ( 'post' === get_post_type() ) :
                ?>
               
            <?php endif; ?>
        </footer><!-- .entry-footer -->
    </div>
</article><!-- #post-->
