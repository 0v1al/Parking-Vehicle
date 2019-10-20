<?php
	require './components/conn.php';

	$submited = false;

	function clear ($data) {
		$data = trim($data);
		$data = strip_tags($data);
		$data = stripslashes($data);
		return $data;
	}

	if (isset($_POST['search_btn'])) {
		$submited = true;
		if (empty($_POST['vehicle_parking_number'])) {
			array_push($login_error_message, "Please complete all the fields!");
		} 
		if (!is_numeric($_POST['vehicle_parking_number'])) {
			array_push($login_error_message, "The value must be an number!");
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
	<link rel="stylesheet" type="text/css" href="css/search_vehicle.css">
	<script src="https://kit.fontawesome.com/99c8254f42.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>
<body>

	<?php require './components/nav.php' ?>
	<?php require './components/nav_logout.php' ?>

	<main class="row">
		
		<?php require './components/left_nav.php' ?>
		
		<div class="col-md-10">
			<div class="side-right-container">
				<h1 class="dashboard_header">Dashboard<span class="subheader">/Search Vehicle</span></h1>
				<div class="add_category">
					<div class="add_category_header">
						<h3>Search Vehicle</h3>
					</div>
						<form class="form_search_vehicle mt-5" action="search_vehicle.php" method="POST">
							<div class="form-group row">
								<label class="col-md-3 col-form-label">Vehicle Parking Number:</label>
								<div class="col-md-9">
									<input type="text" name="vehicle_parking_number" class="form-control" placeholder="Parking Number" required="true" value="">
									<input class="submit_btn" type="submit" value="Search" name="search_btn"/>
								</div>
							</div>
								<?php
									if (in_array("The value must be an number!", $login_error_message)) {
										echo "<span style='color:red;'>The value must be an number!</span>";
									}
								?>
						</form>
				<?php
					if (empty($login_error_message) && $submited) {
						$vehicle_parking_number = clear($_POST['vehicle_parking_number']);
						$sql = "SELECT * FROM vehicle WHERE parking_number='$vehicle_parking_number'";
						$res = mysqli_query($conn, $sql) or die('Error: ' . mysqli_error($conn));
						if (mysqli_num_rows($res) === 0) {
							echo "<span style='color:red'>The vehicle could not be found!</span>";
						} else {
							$row = mysqli_fetch_array($res);
							$vehicle_parking_number = $row['parking_number'];
							$owner_name = $row['owner_name'];
							$registration_number = $row['registration_number'];
							echo "<table class='table my-5'>
									<thead>
										<tr>
											<th>Parking Number</th>
											<th>Owner Name</th>
											<th>Registration Number</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>$vehicle_parking_number</td>
											<td>$owner_name</td>
											<td>$registration_number</td>
											<td><a href='view_vehicle.php?id=$vehicle_parking_number'>View</a></td>
										</tr>
									</tbody>
								</table>";
						}
					}
				?>
				</div>

			</div>
		</div>
	</main>
	
	<script src="./js/admin_menu_toggle.js"></script>

</body>
</html>