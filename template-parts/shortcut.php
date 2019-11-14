<?php
/**
 * The template for displaying the shortcuts
 *
 */
$options_theme = get_field('ajout_options', 'option');
?>

<ul id="shortcuts">
    <?php if( get_field('display_shortcut', 'option') == 'oui' ) { ?>
    <li class="location-btn">
        <button>
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                <g>
                    <path fill="#FFFFFF" d="M15,0C8.72,0,3.63,5.1,3.63,11.37C3.63,17.66,15,29.88,15,29.88s11.37-12.22,11.37-18.51
        C26.37,5.1,21.28,0,15,0z M15,15.91c-2.51,0-4.54-2.03-4.54-4.54c0-2.5,2.03-4.53,4.54-4.53c2.5,0,4.53,2.03,4.53,4.53
        C19.53,13.88,17.5,15.91,15,15.91z" />
                    <rect fill="none" width="30" height="30" class="size"/>
                </g>
            </svg>
            <?php echo __('Location', 'sedoo-wpth-labs'); ?>
        </button>
    </li>
    <?php } ?>
    <?php if( $options_theme && in_array('annuaire', $options_theme) ) { ?>
    <li class="annuaire-btn">
        <button>
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                <g>
                    <rect fill="none" width="30" height="30" class="size"/>
                    <path fill="#FFFFFF" d="M18.28,16.98c1.13-0.94,1.84-2.36,1.84-3.94c0-2.83-2.29-5.13-5.13-5.13c-2.83,0-5.13,2.3-5.13,5.13
        c0,1.58,0.72,3,1.84,3.94c-2.99,1.28-5.08,4.24-5.08,7.69h16.72C23.36,21.21,21.27,18.25,18.28,16.98z" />
                    <path fill="#FFFFFF" d="M9.98,16.68c-0.76-1.05-1.18-2.32-1.18-3.64c0-2.6,1.61-4.82,3.88-5.75c-0.94-1.19-2.37-1.96-4-1.96
        c-2.83,0-5.13,2.29-5.13,5.13c0,1.58,0.72,3,1.84,3.94c-2.99,1.28-5.08,4.24-5.08,7.69h5.62C6.57,19.86,7.99,17.92,9.98,16.68z" />
                    <path fill="#FFFFFF" d="M21.2,13.04c0,1.32-0.42,2.59-1.18,3.64c1.99,1.25,3.41,3.18,4.04,5.41h5.62c0-3.45-2.09-6.41-5.08-7.69
        c1.13-0.94,1.84-2.35,1.84-3.94c0-2.83-2.3-5.13-5.13-5.13c-1.63,0-3.06,0.77-4,1.96C19.59,8.22,21.2,10.44,21.2,13.04z" />
                </g>
            </svg>
            <?php echo __('Annuaire', 'sedoo-wpth-labs'); ?>
        </button>
    </li>
    <?php } ?>
    <?php if( $options_theme && in_array('calendar', $options_theme) ) { ?>
    <li class="calendar-btn">
        <button>
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px"
                 height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
                <rect fill="none" width="20" height="20" class="size"/>
                <g>
                    <rect fill="#FFF" x="2.93" y="7.98" width="4.04" height="4.04"/>
                    <rect fill="#FFF" x="13.02" y="7.98" width="4.04" height="4.04"/>
                    <rect fill="#FFF" x="7.98" y="7.98" width="4.05" height="4.04"/>
                    <rect fill="#FFF" x="7.98" y="13.02" width="4.05" height="4.04"/>
                    <path stroke="#FFF" d="M17.08,2.92H2.92c-1.1,0-2,0.9-2,2v12.15c0,1.1,0.9,2,2,2h14.15c1.1,0,2-0.9,2-2V4.92C19.08,3.82,18.18,2.92,17.08,2.92z
                         M18.07,17.57c0,0.28-0.22,0.5-0.5,0.5H2.43c-0.28,0-0.5-0.22-0.5-0.5V4.43c0-0.28,0.22-0.5,0.5-0.5h15.13
                        c0.28,0,0.5,0.22,0.5,0.5V17.57z"/>
                    <rect fill="#FFF" x="13.02" y="13.02" width="4.04" height="4.04"/>
                    <rect fill="#FFF" x="2.93" y="13.02" width="4.04" height="4.04"/>
                    <rect fill="#FFF" x="1.88" y="3.77" width="16.41" height="3"/>
                </g>
                    <line fill="none" stroke="#FFF" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" x1="4.96" y1="2.02" x2="4.96" y2="5.52"/>

                    <line fill="none" stroke="#FFF" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" x1="15.04" y1="2.02" x2="15.04" y2="5.52"/>
            </svg>
            <?php echo __('Calendar', 'sedoo-wpth-labs'); ?>
        </button>
    </li>
    <?php } ?>
    <li class="search-form-btn">
        <button>
            
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                <g>
                    <path fill="#FFFFFF" d="M18.67,2.08c-5.18,0-9.4,4.21-9.4,9.4c0,1.87,0.55,3.61,1.5,5.07l-7.74,7.74c-0.78,0.78-0.78,2.05,0,2.83
    c0.39,0.39,0.9,0.59,1.41,0.59s1.02-0.2,1.41-0.59l7.74-7.74c1.46,0.94,3.2,1.5,5.07,1.5c5.18,0,9.39-4.21,9.39-9.4
    S23.85,2.08,18.67,2.08z M18.67,16.87c-2.98,0-5.4-2.42-5.4-5.4s2.42-5.4,5.4-5.4c2.97,0,5.39,2.42,5.39,5.4
    S21.65,16.87,18.67,16.87z" />
                    <rect fill="none" width="30" height="30" class="size"/>
                </g>
            </svg>
            <?php echo __('Search', 'sedoo-wpth-labs'); ?>
        </button>
    </li>
    
    <?php 
    ///  SOCIAL SHORTCUT
    while( have_rows('reseaux_sociaux', 'option') ): the_row(); 

        // vars
        $link = get_sub_field('lien_reseau_social', 'option');
        ?>

        <li class="list social-link">

            <?php if( $link ): ?>
                <a target="_blank" href="<?php echo $link; ?>">
                </a>
            <?php endif; ?>

        </li>

    <?php endwhile; ?>
</ul>

<?php


    get_template_part( 'template-parts/search-form', 'page' );
    get_template_part( 'template-parts/location', 'page' );
    get_template_part( 'template-parts/annuaire', 'page' );
    get_template_part( 'template-parts/calendar', 'page' );


?>