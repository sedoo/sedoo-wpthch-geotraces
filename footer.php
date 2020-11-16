<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package labs_by_Sedoo
 */
$options_list_footer = get_field('list_choice', 'option');
$code_color=labs_by_sedoo_main_color();
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" style="background:<?php echo $code_color?>;">
    <style>
        footer[id="colophon"] * {
            color:
            <?php
            if (get_field('footer_text_color', 'option')) {
                the_field('footer_text_color', 'option');            
            } else {
                echo "#222";
            }
            ?>
            ;
        }
        </style>    
        <div class="wrapper-layout">
        <div><!--footer menus-->
                <?php if (has_nav_menu('footer-menu-1')) { 
                ?>
                <nav class="footer-menu" id="footer-menu-1">
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer-menu-1',
                    ) );
                ?>
                </nav>
                <?php
                } ?>

                <?php if (has_nav_menu('footer-menu-2')) { 
                ?>
                <nav class="footer-menu" id="footer-menu-2">
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer-menu-2',
                    ) );
                ?>
                </nav>
                <?php
                } ?>
                
                <?php if (has_nav_menu('footer-menu-3')) { 
                ?>
                <nav class="footer-menu" id="footer-menu-3">
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer-menu-3',
                    ) );
                ?>
                </nav>
                <?php
                } ?>
            </div>
            
            <div class="social-partenaires">
                 <?php if( have_rows('reseaux_sociaux', 'option') ): ?>
                    <div class="social-list">
                        <ul class="inline-list">

                        <?php while( have_rows('reseaux_sociaux', 'option') ): the_row(); 

                            // vars
                            $link = get_sub_field('lien_reseau_social', 'option');
                            ?>

                            <li class="list">

                                <?php if( $link ): ?>
                                    <a href="<?php echo $link; ?>">
                                    </a>
                                <?php endif; ?>

                            </li>

                        <?php endwhile; ?>

                        </ul>
                    </div>
                <?php endif; ?>

            </div>
        </div>
        <div class="copyright">
            <div class="site-info wrapper">
                <?php if (has_nav_menu('mentions-menu')) { 
                    ?>
                    <nav id="mentions-menu">
                    <?php
                        wp_nav_menu( array(
                            'theme_location' => 'mentions-menu',
                            'menu_id'        => 'mentions-menu',
                        ) );
                    ?>
                    </nav>
                <?php
                    }
                ?> 
                <?php if(get_field('lien_intranet', 'option') or get_field('lien_webmail' , 'option')) { ?>
                <ul class="intranet">
                    <?php if(get_field('lien_intranet', 'option')){ ?>
                    <li>
                        <a href="<?php echo wp_login_url(); ?>" target="_blank">
                            <img src="<?php echo get_template_directory_uri() . '/images/key.svg'; ?>" width="60px" alt="" /><?php echo __("Login", 'sedoo-wpth-labs'); ?>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if(get_field('lien_webmail', 'option')){ ?>
                    <li>
                        <a href="<?php the_field('lien_webmail', 'option'); ?>" target="_blank">
                            <img src="<?php echo get_template_directory_uri() . '/images/mail.svg'; ?>" alt="" /><?php echo __("Webmail", 'sedoo-wpth-labs'); ?>
                        </a>
                    </li>
                    <?php } ?>                        
                </ul>
                <?php } ?>  

            </div><!-- .site-info -->
        </div>
        <?php if( have_rows('partenaires', 'option') ): ?>
            <div class="partners-list">
                <ul id="partners-sidebar" class="inline-list wrapper-layout" role="complementary">
                <?php while( have_rows('partenaires', 'option') ): the_row(); 

                    // vars
                    $link = get_sub_field('lien_partenaire', 'option');
                    $logo = get_sub_field('logo_partenaire', 'option');

                    ?>

                    <li class="list">

                        <?php if( $link ): ?>
                            <a href="<?php echo $link; ?>">
                        <?php endif; ?>
                            <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt'] ?>" />
                        <?php if( $link ): ?>
                            </a>
                        <?php endif; ?>

                    </li>

                <?php endwhile; ?>

                </ul>
            </div>
        <?php endif; ?>
	</footer><!-- #colophon -->
    <?php
    if ( wp_is_mobile() ) {
    // end div mp-pusher    
    ?>
    </div> 
    <?php } ?>
</div><!-- #page -->
<?php get_template_part( 'template-parts/shortcut', 'page' ); ?>
<?php wp_footer(); 

if (wp_is_mobile() ) {
    ?>
    <script>
    new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ), {type : 'cover'} );
    </script>
    <?php
    }
    ?>  
<!--<p>© Copyright <?php echo get_theme_mod('labs_by_sedoo_copyright');?></p>-->

</body>
</html>
