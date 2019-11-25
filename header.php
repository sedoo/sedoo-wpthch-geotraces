<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package labs_by_Sedoo
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Infant:500|Montserrat:700|Poppins:200&display=swap" rel="stylesheet"> 
    
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'labs-by-sedoo' ); ?></a>
	<header id="masthead" class="site-header">
        <div class="wrapper">
            <div class="site-branding">
                <?php the_custom_logo(); ?>
            </div><!-- .site-branding -->
            <div class="nav-container">
                <?php if (has_nav_menu('top-header')) {?>
                <nav id="top-header">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'top-header',
                        'menu_id'        => 'ul-top-header',
                    ) );
                    ?>
                </nav>
                <?php 
                }
                ?>

                <?php if(wp_is_mobile()): ?>
                <nav id="primary-navigation" class="main-navigation">
                    <?php 
                    if (has_nav_menu('burger-menu')){
                        wp_nav_menu( array(
                            'theme_location' => 'burger-menu',
                            'menu_id'        => 'burger-menu',
                        ) );
                    } else{
                        wp_nav_menu( array(
                            'theme_location' => 'primary-menu',
                            'menu_id'        => 'primary-menu',
                        ) );                      
                    }  
                    ?>
                    <button class="burger">
                        <div class="burger-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <label for="burger"><?php echo __('Menu', 'sedoo-wpth-labs'); ?></label>
                    </button>
                </nav>
                <?php else : ?>
                <?php if (has_nav_menu('primary-menu')) { ?>
                <nav id="primary-navigation" class="main-navigation">
                    <?php
                        wp_nav_menu( array(
                            'theme_location' => 'primary-menu',
                            'menu_id'        => 'primary-menu',
                        ) );
                    ?>
                    <button class="burger">
                        <div class="burger-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <label for="burger"><?php echo __('Menu', 'sedoo-wpth-labs'); ?></label>
                    </button>
                </nav>
                <?php } ?>
                <?php if (has_nav_menu('burger-menu')) {?>
<!--
                    <nav id="burger-navigation" class="second-navigation">
                        <button class="burger">
                            <div class="burger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <label for="burger">Menu</label>
                        </button>
                        <div class="overlay">
                            <?php
                            wp_nav_menu( array(
                                'theme_location' => 'burger-menu',
                                'menu_id'        => 'burger-menu',
                            ) );
                            ?>
                        </div>
                    </nav>
-->
                <?php 
                    }
                   endif;
                ?>
            </div>
        </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
