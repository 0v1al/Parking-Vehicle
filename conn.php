<?php 
  session_start();

  $server_name = 'localhost';
  $user_name = 'root';
  $password = '';
  $data_base_name = 'parking';

  $login_error_message = array();

  //make the connection to the database
  $conn = mysqli_connect($server_name, $user_name, $password, $data_base_name);

  //handler error that may appear on connection phaze
  if (mysqli_connect_errno()) {
    die ("Connection error: " . mysqli_connect_error());
  } 
 ?>