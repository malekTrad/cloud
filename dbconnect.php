<?php
$localhost = "mysql";
$username = "root";
$password = "secret";
$dbname = "sec";

// create connection 
$connect = new mysqli($localhost, $username, $password, $dbname);
mysqli_set_charset( $connect, 'utf8');

// check connection 
if($connect->connect_error) {
    die("connection failed : " . $connect->connect_error);
}

?>
