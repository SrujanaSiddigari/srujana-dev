<?php
/*
 Template Name:Signup page
*/
// if (!is_user_logged_in()) {
//   wp_redirect(site_url() . '/signin');
//   exit;
// }
// $current_user = wp_get_current_user();
 include( get_stylesheet_directory() . '/dash-header.php');
?>
<body>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<form id="reg-form" method="post">
<h2>Signup here</h2>
<div>
<label>Companyname</label>
<input type="text" class="form-control" name="mepr_companyname" size="40">
</div>

<div>
<label>Email</label>
<input type="email" class="form-control" name="email" size="40">
</div>

<div>
<label>Password</label>
<input type="password" class="form-control" id="pass" name="pass" size="40">
</div>
<div id="demo">

</div>
<div>
<label>Country</label>
<select class="form-control" name="mepr_countryname">
<option value="">select</option>
  <option value="australia">Australia</option>
  <option value="usa">Usa</option>
  <option value="china">China</option>
  <option value="south koria">Southkoria</option>
  <option value="italy">Italy</option>
</select>
</div>

<div>
<label>Address1</label>
<input type="text" class="form-control" name="mepr_address1" size="40">
</div>

<div>
<label>Address2</label>
<input type="text" class="form-control" name="mepr_address2" size="40">
</div>
<div>
<label>Primary Administration name</label>
<input type="text" class="form-control" name="mepr_primary_admin_name" size="40">
</div>
<div>
<label>Primary Administration email</label>
<input type="text" class="form-control" name="mepr_primary_admin_email" size="40">
</div>
<div>
<label>City</label>
<input type="text" name="mepr_cityname" class="form-control">
</div>

<div>
<label>State</label>
<select class="form-control" name="mepr_state">
<option value="">select</option>
<option value="alabama">alabama</option>
<option value="alaska">alaska</option>
<option value="arizona">arizona</option>
<option value="california">california</option>
</select>
</div>
<br>
<div>
<label>Zipcode</label>
<input type="text" class="form-control" id="zipcode" name="mepr_zipcode">
</div>
<div id="dmo">

</div>
<br>
<div>
<button name="BtnSubmit" onclick="validate()" type="submit">Signup</button>
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
<br>
<br>
</body>
<?php
   if(isset($_POST['BtnSubmit'])){
    $userName = get_radnom_unique_username();
    $userpass = $_POST['pass'];
    $useremail = $_POST['email'];
    $usernicename = $userName;
   $data = array(
    'user_login' => $userName,
    'user_pass' => $userpass,
    'user_nicename' => $userName,
    'user_email' => $useremail,
    'role' => 'company'
   );
  // print_r($data);
   global $wpdb;
  $userid= wp_insert_user($data);
  //wp_create_user($userName,$userpass,$useremail,$usernicename);
 if(!is_wp_error($userid)){
   update_user_meta($userid,'mepr_companyname',$_POST['mepr_companyname']);
   update_user_meta($userid,'mepr_countryname',$_POST['mepr_countryname']);
   update_user_meta($userid,'mepr_address1',$_POST['mepr_address1']);
   update_user_meta($userid,'mepr_address2',$_POST['mepr_address2']);
   update_user_meta($userid,'mepr_cityname',$_POST['mepr_cityname']);
   update_user_meta($userid,'mepr_state',$_POST['mepr_state']);
  update_user_meta($userid,'mepr_zipcode',$_POST['mepr_zipcode']);
  update_user_meta($userid,'mepr_primary_admin_name',$_POST['mepr_primary_admin_name']);
  update_user_meta($userid,'mepr_primary_admin_email',$_POST['mepr_primary_admin_email']);

 } 
   }
?>
<?php include( get_stylesheet_directory() . '/dash-footer.php'); ?>
