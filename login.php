<?php 
  
  require './conn.php';

  // //select data from database table
  // $sql = "SELECT admin_email, admin_password FROM admin";
  // $result = mysqli_query($conn, $sql);
  
  // //insert data into UI
  // if (mysqli_num_rows($result) > 0) {
  //   while ($row = mysqli_fetch_assoc($result)) {
  //     echo "Admin with email: " . $row['admin_email'] . " and password: " . $row['admin_password'] . "<br>";
  //   }
  // }
  
  //handle submit form
  if (isset($_POST['login_submit'])) {
    $admin_email = $admin_password = '';
    if (empty($_POST['login_email'])) {
      array_push($login_error_message, "Email is required!");
    } else {
      $admin_email = test_input($_POST['login_email']);  
      $_SESSION['admin_email'] = $_POST['login_email'];
      if (!filter_var($admin_email, FILTER_VALIDATE_EMAIL)) {
        array_push($login_error_message, "Invalid email format!");
      }
    }
    if (empty($_POST['login_password'])) {
      array_push($login_error_message, "Password is required!");
    } else {
      $admin_password = test_input($_POST['login_password']);  
      // $admin_password = password_hash($admin_password, PASSWORD_DEFAULT);
    }
    $sql = "SELECT admin_email, admin_password FROM admin";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    if ($admin_email == $row['admin_email'] && $admin_password == $row['admin_password']) {
      header("Location: ./index.php");
    } else {
      if (!empty($_POST['login_email']) && !empty($_POST['login_password'])){
        array_push($login_error_message, "Email or password are incorectly!");
      }
    }
  }

  if (empty($login_error_message)) {
    $_SESSION['admin_email'] = '';
  }

  //function to filter input data form submit form
  function test_input ($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/login_style.css">
    <link rel="stylesheet" type="text/css" href="./css/nav_style.css">
    <script src="https://kit.fontawesome.com/99c8254f42.js"></script>

    <title>Hello, world!</title>
  </head>
  <body>

    <?php require './nav.php' ?>

    <main>
      <form action="login.php" method="POST" accept-charset="utf-8">
        <h2 class="login_header">Login Admin</h2>
        <input type="text" name="login_email" placeholder="Email" value="<?php if(isset($_SESSION['admin_email'])){
          echo $_SESSION['admin_email'];
        } ?>">  
        <?php 
          if (in_array("Email is required!", $login_error_message)) echo "<span style=color:red;>Email is required!</span>";
          if (in_array("Invalid email format!", $login_error_message)) echo "<span style=color:red;>Invalid email format!</span>";
         ?>
        <input type="password" name="login_password" placeholder="Password">
        <?php 
          if (in_array("Password is required!", $login_error_message)) echo "<span style=color:red;>Password is required!</span>";
        ?>
        <input type="submit" name="login_submit" value="Login"> 
        <?php 
          if (in_array("Email or password are incorectly!", $login_error_message)) echo "<span style=color:red;>Email or password are incorectly!</span>"
         ?> 
      </form>
    </main>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
  </body>
</html>