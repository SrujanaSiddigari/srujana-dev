<?php
/*
 Template Name:profile page
*/
get_header();
?>
<html>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</html>
<?php
$current_user=wp_get_current_user();
 echo get_user_meta($current_user->ID,'firstname',true);
 echo get_user_meta($current_user->ID,'lastname',true);
 echo get_user_meta($current_user->ID,'email',true);
 echo get_user_meta($current_user->ID,'pass',true);
 echo get_user_meta($current_user->ID,'city',true);
 echo get_user_meta($current_user->ID,'state',true);
 echo get_user_meta($current_user->ID,'zipcode',true);
?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
get_footer();
?>