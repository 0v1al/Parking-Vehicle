<?php
	require './components/conn.php';
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
</head>
<body>

	<?php require './components/nav.php' ?>
	<?php require './components/nav_logout.php' ?>

	<main class="row">
		
		<?php require './components/left_nav.php' ?>
		
		<div class="col-md-10">
			<div class="side-right-container">
				<h1 class="dashboard_header">Dashboard<span class="subheader">/Manage Vehicle/Manage Out Vehicle</span></h1>
				<div class="add_category">
					<div class="add_category_header">
						<h3>Manage Out Vehicle</h3>
					</div>
					<table class="table table-striped my-5">
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
								<?php 
									$sql = "SELECT * FROM vehicle WHERE vehicle_status='Outgoing Vehicle'";
									$res = mysqli_query($conn, $sql);
									if (mysqli_num_rows($res) > 0) {
										while ($row = mysqli_fetch_array($res)) {
											$parking_number = $row['parking_number'];
											$owner_name = $row['owner_name'];
											$registration_number = $row['registration_number'];
											echo "<td>$parking_number</td>
													<td>$owner_name</td>
													<td>$registration_number</td>
													<td><a href='./view_out_vehicle.php?id=$parking_number'>View<a/> | <a href='./print_out_vehicle.php?id=$parking_number'>Print</a></td>";
										}
									} else {

									}
								 ?>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</main>
	
	<script src="./js/admin_menu_toggle.js"></script>

</body>
</html>