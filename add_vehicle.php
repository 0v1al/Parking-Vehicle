<?php
	
	require './components/conn.php';
	// require './components/Vehicle.php';

	date_default_timezone_set("Europe/Bucharest");

	$sql_category = "SELECT * FROM vehicle_category";
	$res_category = mysqli_query($conn, $sql_category) or die(mysqli_error($conn));

	const MIN_VALUE = 100000;
	const MAX_VALUE = 900000;

	function clear ($data) {
		$data = trim($data);
		$data = strip_tags($data);
		$data = stripslashes($data);
		return $data;
	}

	function uniqueRandomNumbers ($min, $max, $from) {
		$numbers = range($min, $max);
		shuffle($numbers);
		return array_slice($numbers, $from, 1);
	}

	$rand = uniqueRandomNumbers(MIN_VALUE, MAX_VALUE, 2);

	if (isset($_POST['submit_vehicle'])) {
		$vehicle_category = explode('|', $_POST['categories']);
		$vehicle_company = ucwords(clear($_POST['vehicle_company']));
		$registration_number = clear($_POST['registration_number']);
		$owner_name = ucwords(clear($_POST['owner_name']));
		$owner_contact = clear($_POST['owner_contact']);
		$income_date = date("Y-m-d");
	
		if (!is_numeric($registration_number) || !is_numeric($owner_contact)) {
			array_push($login_error_message, "Please introduce the data corectly!");
		}
		if (is_numeric($vehicle_company) || is_numeric($owner_name)) {
			array_push($login_error_message, "Please introduce the data corectly!");
		}

		if (empty($login_error_message)) {
			array_push($login_error_message, "The vehicle was added!");
			
			$sql = "INSERT INTO vehicle VALUES(null, '$owner_name', '$registration_number', '$owner_contact', '$vehicle_category[1]', '$vehicle_company', '$income_date', DEFAULT, '', 0, 0)";

			if (!mysqli_query($conn, $sql)) echo "Error: " . $sql . mysqli_error($conn);
	
		}
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./css/left_nav_style.css">
	<link rel="stylesheet" type="text/css" href="css/nav_style.css">
	<link rel="stylesheet" type="text/css" href="css/nav_logout_style.css">
	<link rel="stylesheet" type="text/css" href="css/add_vehicle.css">
	<script src="https://kit.fontawesome.com/99c8254f42.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<title>Add Vehicle</title>

</head>
<body>

	<?php require './components/nav.php' ?>
	<?php require './components/nav_logout.php' ?>

	<main class="row content">
		
		<?php require './components/left_nav.php' ?>
		
		<div class="col-md-10">
			<div class="side-right-container">
				<h1 class="dashboard_header">Dashboard<span class="subheader">/Add Vehicle</span></h1>
				<div class="add_category">
					<div class="add_category_header">
						<h3>Add Vehicle</h3>
					</div>
						<form class="form_add_vehicle" action="add_vehicle.php" method="POST">
							<div class="form-group row">
								<label class="col-md-3 col-form-label">Select:</label>
								<div class="col-md-9">
									<select name="categories" class="browser-default custom-select">
										<option selected>Select Category</option>
										<?php 
											while ($row = mysqli_fetch_array($res_category)) {
												echo "<option value=".$row['vehicle_id'].'|'.$row['vehicle_category_name'].">".$row['vehicle_category_name']."</option>";
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 col-form-label">Vehicle Company:</label>
								<div class="col-md-9">
									<input type="text" name="vehicle_company" class="form-control" placeholder="Vehicle Company" required="true" value="">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 col-form-label">Registration Number:</label>
								<div class="col-md-9">
									<input type="text" name="registration_number" class="form-control" placeholder="Registration Number" required="true" value="">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 col-form-label">Owner Name:</label>
								<div class="col-md-9">
									<input type="text" name="owner_name" class="form-control" placeholder="Owner Name" required="true" value="">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 col-form-label">Owner Contact:</label>
								<div class="col-md-9">
									<input type="text" name="owner_contact" class="form-control" placeholder="Owner Contact" required="true" value="">
									<input class="submit_btn" type="submit" value="Add Vehicle" name="submit_vehicle"/>
								</div>
							</div>
							<?php
								if (in_array("Please introduce the data corectly!", $login_error_message)) {
									echo "<span style='color:red'>Please introduce the data corectly!</span>";
								}
								if (in_array("The vehicle was added!", $login_error_message)) {
									echo "<span style='color:green'>The vehicle was added with success!</span>";
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