<?php 

  require './components/conn.php';

  $admin_current_password = $admin_new_password = $admin_confirm_new_password = '';
  $change_password_error = array();
  $submited = false;

  if (isset($_POST['admin_change_password_submit'])) {
   
    $submited = true;

    $admin_current_password = trim($_POST["admin_current_password"]);
    $admin_current_password = strip_tags($admin_current_password);

    $admin_new_password = trim($_POST["admin_new_password"]);
    $admin_new_password = strip_tags($admin_new_password);

    $admin_confirm_new_password = trim($_POST["admin_confirm_new_password"]);
    $admin_confirm_new_password = strip_tags($admin_confirm_new_password);

    // echo "<br><br><br><br><br><br><br><br><br><br>" . $admin_current_password;
    // echo "<br>" . $admin_new_password;
    // echo "<br>" . $admin_confirm_new_password;

    $sql = "SELECT * FROM admin;";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
      $row = mysqli_fetch_array($result);
      // echo "<br><br><br><br><br><br><br><br><br><br>" . $row['admin_password'];
      if (!empty($_POST['admin_current_password']) && !empty($_POST['admin_new_password']) && !empty($_POST['admin_confirm_new_password'])) {
        if ($row['admin_password'] == $admin_current_password) {
          if ($admin_new_password == $admin_confirm_new_password) { 
            $sql = "UPDATE admin SET admin_password='$admin_new_password' WHERE admin_password='$admin_current_password';";
            $result = mysqli_query($conn, $sql);
            if($result) {
              echo "update";
            } else {
              echo mysqli_error($conn); 
            }
            // echo "<br><br><br><br><br><br><br><br><br><br>" . "your new password is " . $admin_new_password;
          } else {
            array_push($change_password_error, "The passwords doesn't match!");
          }
        } else {
          array_push($change_password_error, "Your current password is incorectly!");
        }
      } else {
        array_push($change_password_error, "You need to complete all the fields!");
      }
    } 
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Change Password</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/nav_style.css">
  <link rel="stylesheet" type="text/css" href="./css/change_password.css">
  <script src="https://kit.fontawesome.com/99c8254f42.js"></script>
</head>
<body>


  <?php require './components/nav.php' ?>

  <span class="nav_logout">
		<i class="fas fa-user-circle admin_icon"></i>
		<ul class="admin_icon_menu">
			<li><a href="./index.php">Home</a></li>
			<li><a href="./logout.php">Logout</a></li>
		</ul>
	</span>

  <main>
    <form action="change_password.php" method="POST">
      <h2 class="login_header">Change Password</h2>
      <input type="password" name="admin_current_password" placeholder="Current Password">
      <input type="password" name="admin_new_password" placeholder="New Password">
      <input type="password" name="admin_confirm_new_password" placeholder="Confirm The New Password">
      <input type="submit" name="admin_change_password_submit" value="Change Password">
      <?php 
        if (in_array("The passwords doesn't match!", $change_password_error)) {
          echo "<span style='color:red;'>The passwords doesn't match!</span>";
        }
        if (in_array("Your current password is incorectly!", $change_password_error)) {
          echo "<span style='color:red;'>Your current password is incorectly!</span>";
        }
        if (in_array("You need to complete all the fields!", $change_password_error)) {
          echo "<span style='color:red;'>You need to complete all the fields!</span>";
        }
        if (empty($change_password_error) && $submited != false) {
          echo "<span style='color:green;'>Your new password is " . $admin_new_password . "</span>";
        }
      ?>
    </form>
  </main>
  
  <script src="./js/admin_menu_toggle.js"></script>

</body>
</html>
