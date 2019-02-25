<?php
/**
 * Plugin Name: My First Plugin
 * Plugin URI: http://localhost/coete/myplugin
 * Description: The very first plugin that I have ever created.
 * Version: 1.0
 * Author: Srujana
 * Author URI: http://localhost/coete
 */
?>
<?php
add_action('admin_menu', 'email_plugin_setup_menu');
 
function email_plugin_setup_menu(){
        add_menu_page( 'Email-Plugin page', 'My First Plugin', 'manage_options', 'email-plugin-page', 'upload' );
}
function upload(){
  echo "this is my plugin..";
  include 'connectdb.php';

$result = mysql_query("select 1 from `emails` LIMIT 1");
if($result){
  echo "<table border='1'>
  <tr>
  <th>sno</th>
  <th>NAme</th>
  <th>Phone</th>
  <th>Message</th>
  <th colspan=2>Email status</th>
  </tr>";
  $no=1;
  $status;
  $results = mysql_query("select * from `emails` ");
  while($row = mysql_fetch_array($results))
  {
  echo "<tr>";
  echo "<td>" . $no . "</td>";
  echo "<td>" . $row[1] . "</td>";
  echo "<td>" . $row[2] . "</td>";
  echo "<td>" . $row[3] . "</td>";
  $status = $row[4]  ."</td>";
  if($status == 1){
    echo "<td>" . "email has been received" . "</td>";
  }
  else{
    echo "<td>" . "email sent failed" . "</td>";
  }
  echo "</tr>";
  $no++;
  }
  
  echo "</table>";
}
 else{
   $query="CREATE TABLE emails(rec_id INT AUTO_INCREMENT PRIMARY KEY, rec_name VARCHAR(30), rec_phone BIGINT(10), rec_message VARCHAR(100), emailstatus BOOLEAN)";
   $result= mysql_query($query) or die(mysql_error());
   if($result){
     echo " table created successfully";
   }else{
     echo "table creation failed";
   }
 }
}
wp_register_script( 'js', 'http://localhost/coete/wp-content/plugins/sendemails/js/validate.js');
wp_enqueue_script( 'jquery' );
wp_enqueue_script( 'js' );

 wp_register_script( 'style', 'http://localhost/coete/wp-content/plugins/sendemails/css/style.css');
 wp_enqueue_script( 'style' );

function form_creation(){
  $html = "<form id='formid' method='post'>";
  $html .= "<input type='text' name='nam' size='30' placeholder='enter name'>".'<br>';
  $html .= "<input type='text' maxlength='10' name='phone' size='30' placeholder='enter phone'>".'<br>';
  $html .= "<input type='text' name='msg' size='30' placeholder='enter message'>".'<br>';
  $html .= "<button name='btn' type='submit' class='btn btn-success'>Send";
  $html .="</button>";
  $html .= "</form>";
  return $html;
}
emails();
?>
<?php
  function emails(){
    $to="siddigarisru@gmail.com";
    //echo $to;
  // Always set content-type when sending HTML email
$headers = "From: bhoomi@gkblabs.com" . "\r\n";
 if(isset($_POST['btn'])){
    $name=$_POST['nam']; 
    echo $name;
    $phone=$_POST['phone'];
    echo $phone;
    $usrmsg=$_POST['msg'];
    include 'connectdb.php';

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
    $sql = "INSERT INTO emails(rec_name, rec_phone, rec_message, emailstatus)
    VALUES ('$name', '$phone', '$usrmsg','$status')";
    $sql_exe=mysql_query($sql) or die(mysql_error());
    $txt= $name . "\n" . $phone ."\n". $usrmsg ."\n".$status."\n";
}
  }
add_shortcode("test", "form_creation");
?>