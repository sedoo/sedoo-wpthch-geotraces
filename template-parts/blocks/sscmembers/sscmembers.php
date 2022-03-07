<?php

?>

<?php if ( get_field( 'geotraces_ssc_block_display_title' ) == 1 ) { 
?>
<h2>
<?php the_field( 'geotraces_ssc_block_title' ); ?>
</h2>
<?php
}
?>

<?php // geotraces_ssc_block_member_type ( array )
$geotraces_ssc_block_member_type_array = get_field( 'geotraces_ssc_block_member_type' );
$meta_query = array('relation' => 'OR');

if ( $geotraces_ssc_block_member_type_array ):
	foreach ( $geotraces_ssc_block_member_type_array as $geotraces_ssc_block_member_type_item ):
        //  echo $geotraces_ssc_block_member_type_item;
         $meta_query[] = array(
            'key'     => 'geotraces_user_group',
            'value'   => $geotraces_ssc_block_member_type_item,
            'compare' => 'LIKE',
        );
	endforeach;
endif; ?>
<?php 
$args = array(
	'blog_id'      => $GLOBALS['blog_id'],
	'role'         => '',
	'role__in'     => array(),
	'role__not_in' => array(),
	'meta_key'     => 'last_name',
	'meta_value'   => '',
	'meta_compare' => '',
	'meta_query'   => $meta_query,
	'date_query'   => array(),        
	'include'      => array(),
	'exclude'      => array(),
	'orderby'      => 'meta_value',
	'order'        => 'ASC',
	'offset'       => '',
	'search'       => '',
	'number'       => '',
	'count_total'  => false,
	'fields'       => 'all',
	'who'          => '',
 ); 
 $sscUsers = get_users( $args );
?>

<section data-role="listSscMembers">
<?php
$i=rand();
$firstletter="";
$count=count($sscUsers);
foreach ( $sscUsers as $user ) {
    $user_id = $user->ID;
    $user_meta_geotraces_user_last_name = get_user_meta($user_id, 'last_name', true);
    $user_meta_geotraces_user_first_name = get_user_meta($user_id, 'first_name', true);
    $user_meta_geotraces_user_position = get_user_meta($user_id, 'poste', true);
    $user_meta_geotraces_user_address = get_user_meta($user_id, 'geotraces_user_address', true);
    $user_meta_geotraces_user_group = get_user_meta($user_id, 'geotraces_user_group', true);
    $user_meta_geotraces_user_country = get_user_meta($user_id, 'geotraces_user_country', true);
    $user_meta_geotraces_user_phone = get_user_meta($user_id, 'geotraces_user_phone', true);

    $user_meta_geotraces_user_last_name_firstLetter = strtoupper(substr($user_meta_geotraces_user_last_name, 0, 1));

    ?>
 
    <article class="fl-<?php echo $user_meta_geotraces_user_last_name_firstLetter;?>">
    <?php 
    // if ($count>4) {
        if (($firstletter == "") || (($firstletter !== "") && ( $firstletter!==$user_meta_geotraces_user_last_name_firstLetter) ) ){
            $firstletter= $user_meta_geotraces_user_last_name_firstLetter;
            echo "<div class=\"firstletterList\">".$firstletter."</div>";
        } else {
            $firstletter= $user_meta_geotraces_user_last_name_firstLetter;
        }
    // }
    ?>
        <input type="radio" name="radioDeploy[]" id="deploy<?php echo $i;?>">
        <label for="deploy<?php echo $i;?>"><span></span></label>
        <header>
            <p><?php echo $user_meta_geotraces_user_last_name;?>, <?php echo $user_meta_geotraces_user_first_name;?> - <span class="uppercase"><?php echo $user_meta_geotraces_user_country;?></span>
                <br><em><?php echo $user_meta_geotraces_user_position;?></em>
            </p>
        </header>
        
        <div>
            <p><?php 
            $mail=explode("@", $user->user_email);
            echo $mail[0]."<i style=\"display:none;\">WE DON'T LIKE SPAM</i>@<i style=\"display:none;\">WE DON'T LIKE SPAM</i>".$mail[1]."";
            ?>
            </p>
            <address><?php echo $user_meta_geotraces_user_address;?> - <?php echo $user_meta_geotraces_user_country;?></address>
            <p>Tel:<?php echo $user_meta_geotraces_user_phone;?></p>
        </div>
    </article>
<?php
$i++;
}
?>
</section>