<?php

session_start();

include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$execute = mysqli_query($connect, $query);
$row = mysqli_num_rows($execute);

if($row > 0){
  
$data = mysqli_fetch_assoc($execute);

if($data['level'] == "Admin"){
  $_SESSION['username'] = $username;
  $_SESSION['level'] = "Admin";

  header('Location: admin/adminDashboard.php');
}elseif($data['level'] == "User"){
  $_SESSION['username'] = $username;
  $_SESSION['level'] = "User";

  header('Location: users/userDashboard.php');
}
}
 ?>