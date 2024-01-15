<?php
$servername = "localhost";
$server_user = "id19797999_lf_user";
$server_pass = "@Nkah_123!";
$db_name = "id19797999_lf_db";
// db connection
$connect = new mysqli($servername, $server_user, $server_pass, $db_name);
// check connection
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}
?>
