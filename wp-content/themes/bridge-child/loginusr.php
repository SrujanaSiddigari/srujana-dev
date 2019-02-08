<?php
/*
 Template Name:login page
*/
get_header();
?>
<?php
if (isset($_POST['btnname'])) {
    // print_r($_POST);
    // exit;
    $creds = array();
            $creds['user_login'] = $_POST['usracc'];
            $creds['user_password'] = $_POST['pass'];
            
            $user = wp_signon($creds, false);
            //echo $user->get_error_message();
            //exit;
            if (!is_wp_error($user)) {

               wp_redirect(site_url().'/profilepage');
               //header("Location:index.php");
               exit;
             }
            }
?>
<html>
<head>
<meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/signupstyle.css">
</head>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<br>
<br>
<br>
<form method="post" id="reg-form">
<h2>Login here</h2>
<div>
<label>Account</label>
<input type="text" class="form-control" size="40" placeholder="username" name="usracc">
</div>
<div>
<label>Password</label>
<input type="password" class="form-control" size="40" placeholder="password" name="pass">
</div>
<br>
<div>
<button type="submit" name="btnname">Login</button>
</div>
</form>
<br>
<br>
<br>
<br>
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
get_footer();
?>