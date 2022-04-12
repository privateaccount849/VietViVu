<?php
$hostname = "localhost";
$username = "id18774357_root";
$password = "PSOFpl(SqyS4c~N+";
$db = "id18774357_vietvivu";

$con = mysqli_connect($hostname, $username, $password,$db);
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
echo "Connected successfully";
?>
