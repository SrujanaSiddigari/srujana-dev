<?php
/*
Template Name: Search Page
*/
?>
<?php
get_header();?>
<!-- <head>
<meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/searchstyle.css">
</head> -->
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

<?php get_footer();?>