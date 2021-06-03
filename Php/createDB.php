
<?php
$dbhost = 'localhost';
$dbuser ='root';
$dbpass = '';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);


$sql ="CREATE DATABASE ShadowDB";

mysqli_close($conn);
?>