<?php
include("loginphp/connection.php");
include("loginphp/functions.php");
session_start();

$id = $_SESSION["user_id"];

$result = mysqli_query($con, "SELECT user_name, user_email FROM users WHERE user_id = $id");

$user_data = array();
$row = mysqli_fetch_object($result);
array_push($user_data,$row);

echo json_encode($user_data);
exit();
