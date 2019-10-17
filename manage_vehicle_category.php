<?php
	require './components/conn.php';

	$sql = "SELECT * FROM vehicle_category";
	$res = mysqli_query($conn, $sql);
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
	<link rel="stylesheet" type="text/css" href="css/manage_vehicle_category.css">
	<script src="https://kit.fontawesome.com/99c8254f42.js"></script>
</head>
<body>

	<?php require './components/nav.php' ?>
	<?php require './components/nav_logout.php' ?>

	<main class="row">
		
		<?php require './components/left_nav.php' ?>
		
		<div class="col-md-10">
			<div class="side-right-container">
				<h1 class="dashboard_header">Dashboard<span class="subheader">/Manage Vehicle Category</span></h1>
				<div class="add_category">
					<div class="add_category_header">
						<h3>Manage Category</h3>
					</div>
					<table class="table table-striped table-hover">
					  <thead>
					    <tr>
					      <th scope="col">NO</th>
					      <th scope="col">Car Category</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>
							<?php
								if (mysqli_num_rows($res) > 0) {
									$arr = array();
									while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
										$vehicle_id = $row['vehicle_id'];
										$vehicle_category = $row['vehicle_category_name'];
										echo "<tr>" .
												"<td>" . $row['vehicle_id'] . "</td>" .
												"<td>" . $row['vehicle_category_name'] . "</td>" .
												"<td><a href='./update_category.php?id=$vehicle_id&vehicle_category=$vehicle_category'>Edit Details<a/></td>" .
											 "</tr>";
									}
								}
							 ?>
					  </tbody>
					</table>
				</div>
			</div>
		</div>
	</main>

	<script src="./js/admin_menu_toggle.js"></script>
	
</body>
</html>