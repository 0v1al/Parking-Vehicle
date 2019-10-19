<?php
	require './components/conn.php';

	$msg = '';
	$type = '';
	$vehicle_id = '';
	$id = $_GET['id'];
	$sql = "SELECT * FROM vehicle WHERE parking_number='$id'";
	$res = mysqli_query($conn, $sql) or die("Error: " . mysqli_error($conn));
 	$row = mysqli_fetch_array($res);

 	if (isset($_POST['submit_remark'])) {
 		 	echo "<br><br><br><br><br><br>";
 			echo $_POST['remark_message'];
			$vehicle_id = $_POST['hidden_value'];
 		if (empty($_POST['parking_charge']) || empty($_POST['remark_message'])) {
 			$msg = "Please complete all the fields!";
 			$type = 'red';
 		} else {
 			$msg = "The vehicle was updated!";
 			$type = "green";
 			$status = $_POST['select_vehicle_out'];
 			$vehicle_remark = $_POST['remark_message'];
 			$parking_charge = $_POST['parking_charge'];
 			$outcome_date = date("Y-m-d H:i:s");

 			$sql = "UPDATE vehicle SET vehicle_status='$status', vehicle_remark='$vehicle_remark', parking_charge='$parking_charge', outcome_date='$outcome_date' WHERE parking_number='$vehicle_id'";

 			$res = mysqli_query($conn, $sql) or die("Error: " . mysqli_error($conn));
 		}
 		header("Location: view_vehicle.php?id=$vehicle_id&msg=$msg&type=$type");
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
	<link rel="stylesheet" type="text/css" href="css/view_out_vehicle.css">
	<script src="https://kit.fontawesome.com/99c8254f42.js"></script>
</head>
<body>

	<?php require './components/nav.php' ?>
	<?php require './components/nav_logout.php' ?>

	<main class="row">
		
		<?php require './components/left_nav.php' ?>
		
		<div class="col-md-10">
			<div class="side-right-container">
				<h1 class="dashboard_header">Dashboard<span class="subheader">/Manage Vehicle/Manage Out Vehicle/View Out Vehicle</span></h1>
				<div class="add_category">
					<div class="add_category_header">
						<h3>View Out Vehicle</h3>
					</div>
					<div class="vehicle_view mt-5">
						<div class="row">
							<div class="col-md-6 col">
								<h6 class="font-weight-bold">Vehicle Category</h6>
							</div>
							<div class="col-md-6 col">
								<?php
									echo "<h6>" . $row['vehicle_category'] . "</h6>";
								 ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col">
								<h6 class="font-weight-bold">Vehicle Company Name</h6>
							</div>
							<div class="col-md-6 col">
								<?php
									echo "<h6>" . $row['vehicle_company'] . "</h6>";
								 ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col">
								<h6 class="font-weight-bold">Registration Number</h6>
							</div>
							<div class="col-md-6 col">
								<?php
									echo "<h6>" . $row['registration_number'] . "</h6>";
								 ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col">
								<h6 class="font-weight-bold">Owner Name</h6>
							</div>
							<div class="col-md-6 col">
								<?php
									echo "<h6>" . $row['owner_name'] . "</h6>";
								 ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col">
								<h6 class="font-weight-bold">Owner Contact Number</h6>
							</div>
							<div class="col-md-6 col">
								<?php
									echo "<h6>" . $row['owner_contact'] . "</h6>";
								 ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col">
								<h6 class="font-weight-bold">Entry Time</h6>
							</div>
							<div class="col-md-6 col">
								<?php
									echo "<h6>" . $row['income_date'] . "</h6>";
								 ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col">
								<h6 class="font-weight-bold">Out Time</h6>
							</div>
							<div class="col-md-6 col">
								<?php 
									echo "<h6>" . $row['outcome_date'] . "</h6>";
								?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col">
								<h6 class="font-weight-bold">Status</h6>
							</div>
							<div class="col-md-6 col">
								<?php 
									echo "<h6 style='color:red;'>" . $row['vehicle_status'] . "</h6>";
								?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col">
								<h6 class="font-weight-bold">Remark</h6>
							</div>
							<div class="col-md-6 col">
								<?php 
									echo "<h6 style='color:red;'>" . $row['vehicle_remark'] . "</h6>";
								?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col">
								<h6 class="font-weight-bold">Parking Free</h6>
							</div>
							<div class="col-md-6 col">
								<?php 
									echo "<h6 style='color:green;'>" . $row['parking_charge'] . "</h6>";
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	
	<script src="./js/admin_menu_toggle.js"></script>

</body>
</html>