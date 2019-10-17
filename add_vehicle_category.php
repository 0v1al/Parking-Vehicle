<?php 
	require './components/conn.php';

  if (isset($_POST['submit_category_name'])) {
  	$category_vehicle_name = $_POST['category_name'];
  	$_SESSION['vehicle_category_name'] = $category_vehicle_name;

  	if (empty($_POST['category_name'])) {
  		array_push($login_error_message, 'Please introduce a vehicle name!');
  	} else if (strlen($category_vehicle_name) <= 2) {
  		array_push($login_error_message, 'The name must be at least 3 characters long!');
  	} else {
  		$sql = "SELECT vehicle_category_name FROM vehicle_category";
  		$res = mysqli_query($conn, $sql);
  		if (mysqli_num_rows($res) > 0) {
	  		while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
	  			if (strtolower($row['vehicle_category_name']) == strtolower($category_vehicle_name)) {
	  				array_push($login_error_message, 'The vehicle category already exist!');
	  			}
	  		}
  		}
  	} 
  	if (empty($login_error_message)) {
  		$category_vehicle_name = mysqli_real_escape_string($conn, $category_vehicle_name);
  		$sql = "INSERT INTO vehicle_category (vehicle_category_name) VALUES('$category_vehicle_name')";
  		$_SESSION['vehicle_category_name'] = '';
  		if (!mysqli_query($conn, $sql)) {
  			die('Error: ' . mysqli_error($conn));
  		}
  		array_push($login_error_message, 'The vehicle category was added!');
  		mysqli_close($conn);
  	}
  }


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Add Vehicle Category</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/left_nav_style.css">
	<link rel="stylesheet" type="text/css" href="css/nav_style.css">
	<link rel="stylesheet" type="text/css" href="css/nav_logout_style.css">
	<link rel="stylesheet" type="text/css" href="css/add_vehicle_category.css">
	<script src="https://kit.fontawesome.com/99c8254f42.js"></script>
</head>
<body>

	<?php require './components/nav.php' ?>
	<?php require './components/nav_logout.php' ?>

	<main class="row">
		
		<?php require './components/left_nav.php' ?>
		
		<div class="col-md-10">
				<div class="side-right-container">
					<h1 class="dashboard_header">Dashboard<span class="subheader">/Add Vehicle Category</span></h1>
					<div class="add_category">
						<div class="add_category_header">
							<h3>Add Category</h3>
						</div>
						<form class="form_category" action="add_vehicle_category.php" method="POST">
							<div class="form-group row">
								<label class="col-md-2 col-form-label">Category Name</label>
								<div class="col-md-10">
									<input type="text" name="category_name" placeholder="Category" class="form-control" value="<?php 
										if (isset($_SESSION['vehicle_category_name'])) {
											echo $_SESSION['vehicle_category_name'];
										}
									 ?>">
									<input class="submit_btn" type="submit" value="Add Category" name="submit_category_name"/>
								</div>
							</div>
							<?php 
								if(in_array('Please introduce a vehicle name!', $login_error_message)) {
									echo '<span style=color:red;>Please introduce a vehicle name!</span>';
								} 
								if(in_array('The name must be at least 3 characters long!', $login_error_message)) {
									echo '<span style=color:red;>The name must be at least 3 characters long!</span>';
								}
								if (in_array('The vehicle category already exist!', $login_error_message)) {
									echo '<span style=color:red;>The vehicle category already exist!</span>';
								}
								if (in_array('The vehicle category was added!', $login_error_message)) {
									echo '<span style=color:green;>The vehicle category was added!</span>';
								}
							?>
						</form>
					</div>
				</div>
		</div>
	</main>

	<script src="./js/admin_menu_toggle.js"></script>

</body>
</html>