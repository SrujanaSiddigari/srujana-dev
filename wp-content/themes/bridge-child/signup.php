<?php
/*
 Template Name:Signup page
*/
get_header();
?>
<html>
<head>
<meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/signupstyle.css">
                <script>
                function validate(){
                 // alert("hi");
                 var pswdmsg="";
                 var zpmsg="";
                 var pswd=document.getElementById("pass").value;
                 var zpcode=document.getElementById("zipcode").value;
                 var regexp = /^[0-9]{5}(?:-[0-9]{4})?$/;
                 if(pswd!=regexp){
                 pswdmsg+="sorry your password must contain 6 charcters only";
                 }
                  if(zpcode!=regexp){
                    zpmsg+="sorry your zipcode must contain 6 digits only";
                  }
                  document.getElementById("demo").innerHTML=pswdmsg;
                  document.getElementById("dmo").innerHTML=zpmsg;
                }
                </script>
     </head>
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
<input type="text" name="mepr_companyname" class="form-control" size="40">
</div>

<div>
<label>Email</label>
<input type="email" name="email" class="form-control" size="40">
</div>

<div>
<label>Password</label>
<input type="password" id="pass" name="pass" class="form-control" size="40">
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
<input type="text" class="form-control" name="mepr_primary_administrator_name" size="40">
</div>
<div>
<label>Primary Administration email</label>
<input type="text" class="form-control" name="mepr_primary_administrator_email" size="40">
</div>
<div>
<label>City</label>
<input type="text" name="mepr_cityname" class="form-control" size="40">
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
<input type="text" id="zipcode" name="mepr_zipcode" class="form-control" size="40">
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
</html>
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
  update_user_meta($userid,'mepr_primary_administrator_name',$_POST['mepr_primary_administrator_name']);
  update_user_meta($userid,'mepr_primary_administrator_email',$_POST['mepr_primary_administrator_email']);

 } 
   }
?>
<?php
get_footer();
?>
