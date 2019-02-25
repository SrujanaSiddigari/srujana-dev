<?php
/*
Template Name: Search Page
*/
?>
<?php
 include( get_stylesheet_directory() . '/dash-header.php');
?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

<?php get_search_form(); 
  $posts = get_posts([
  'post_type' => 'post',
  'post_status' => 'publish',
  'numberposts' => -1
   //'order'    => 'ASC'
]);


?>
<?php 
  // echo do_shortcode("[post_grid id='331']");
?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<h2>Your search results are here</h2>

<br>
<br>
<br>
<br>

<?php include( get_stylesheet_directory() . '/dash-footer.php'); ?>
