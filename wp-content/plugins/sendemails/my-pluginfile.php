
<?php
/**
 * Plugin Name: My First Plugin
 * Plugin URI: http://localhost/coete/myplugin
 * Description: The very first plugin that I have ever created.
 * Version: 1.0
 * Author: Srujana
 * Author URI: http://localhost/coete
 */
error_reporting(0);
?>

<?php
add_action('admin_menu', 'email_plugin_setup_menu');
 
function email_plugin_setup_menu(){
        add_menu_page( 'Email-Plugin page', 'My First Plugin', 'manage_options', 'email-plugin-page', 'uploading' );
}

function uploading(){
  global $wpdb;
  $charset_collate = $wpdb->get_charset_collate();
  $table_name = 'emails';
  $sql= "CREATE TABLE IF NOT EXISTS $table_name(
		rec_id INT(11) NOT NULL AUTO_INCREMENT,
		rec_name VARCHAR(30) NOT NULL,
		rec_phone BIGINT(10) NOT NULL,
    rec_message VARCHAR(100),
    emailstatus BOOLEAN,
		PRIMARY KEY  (rec_id)
  )$charset_collate;";
 
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
$creationtbl= dbDelta( $sql );
if(!empty($creationtbl)){
  echo "table created";
}
else{
  echo "table creation failed";
}


 
// require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
  echo "this is my plugin..";
// $result = $wpdb->get_results("select 1 from `emails` LIMIT 1");
// if($result){
  echo "<table id='tbl' border='1' cellpadding='10' cellspacing='0'  class='table table-striped table-bordered' style='width:100%'>";
  echo "<thead>";
  echo "<tr>";
  echo "<th>sno</th>";
  echo "<th>NAme</th>";
  echo "<th>Phone</th>";
  echo "<th>Message</th>";
  echo "<th colspan=2>Email status</th>";
 echo "</tr>";
 echo "</thead>";
  $no=1;
  $status;
  $results = $wpdb->get_results("select * from `emails`");
  // print_r($results);
  foreach($results as $row){
  echo "<tbody>";
  echo "<tr>";
  echo "<td>" . $row->rec_id. "</td>";
  echo "<td>" . $row->rec_name . "</td>";
  echo "<td>" . $row->rec_phone . "</td>";
  echo "<td>" . $row->rec_message. "</td>";
  // echo "<td>" . $row->emailstatus ."</td>";
  $status = $row->emailstatus ."</td>";
  if($status == 1){
    echo "<td>" . "email has been received" . "</td>";
  }
  else{
    echo "<td>" . "email sent failed" . "</td>";
  }
  echo "</tr>";
  $no++;

  }
  echo "</tbody>";
  echo "</table>";
}
add_action('wp_enqueue_scripts', 'qg_enqueue');
function qg_enqueue() {
  wp_register_script( 
    'datatbl', 'https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'
   );
  wp_enqueue_script( 
    'datatbl'
    );
   wp_register_style(
     'data','https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css'
   );
   wp_enqueue_style(
     'data'
   );
    wp_register_script(
      'qgjs',
      plugin_dir_url(__FILE__).'js/validate.js'
  );
  wp_enqueue_script(
    'qgjs'
);
  wp_register_style(
    'tmrs',
    plugin_dir_url(__FILE__).'css/style.css'
  );
  wp_enqueue_style(
    'tmrs'
  );
}


function form_creation(){
  $html = "<form id='formid' method='post'>";
  $html .= "<input type='text' name='nam' size='30' placeholder='enter name'>".'<br>';
  $html .= "<input type='text' maxlength='10' name='phone' size='30' placeholder='enter phone'>".'<br>';
  $html .= "<textarea name='msg' placeholder='enter message'>";
  $html .= "</textarea>".'<br>';
  $html .= "<button name='btn' type='submit'>Send";
  $html .="</button>";
  $html .= "</form>".'<br>';
  return $html;
}
emails();
?>
<?php
  function emails(){
    global $wpdb;
    $to="siddigarisru@gmail.com";
    //echo $to;
  // Always set content-type when sending HTML email
$headers = "From: bhoomi@gkblabs.com" . "\r\n";
 if(isset($_POST['btn'])){
  $name = $_POST['nam']; 
  //echo $name;
  $phone = $_POST['phone'];
  //echo $phone;
  $usrmsg = $_POST['msg'];
  $txt = $name ."\n". $phone ."\n". $usrmsg ."\n" .$status;
  if(mail($to,"some subject",$txt,$headers))
  {
  echo "mail sent";
  $status=1;
  }
else
{
  echo "mail failed";
   $status=0;
}
echo $status;
 // echo $txt;
 $table_name = "emails";
$data= array(
  'rec_name'=> $name,
  'rec_phone'=> $phone,
  'rec_message'=> $usrmsg,
  'emailstatus'=> $status
);
//echo $data;

print_r($data);
$res= $wpdb->insert($table_name,$data);
$wpdb->print_error();
if($wpdb ->insert_id !=""){
  echo "row inserted";
}else{
  echo "row not inserted";
}
}
  }
add_shortcode("test", "form_creation");
?>

