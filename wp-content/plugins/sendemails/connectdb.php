<?php
// Create connection
$conn = mysql_connect("localhost","root","");
mysql_select_db("coetedb");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>