<?php 
	require './components/conn.php';

	$today_date = date("Y-m-d");
	$sql_todays_vehicle_entries = "SELECT COUNT(*) FROM vehicle WHERE income_date='$today_date'";
	$res_today_vehicle_entries = mysqli_query($conn, $sql_todays_vehicle_entries);
	$today_vehicle_entries_array = mysqli_fetch_array($res_today_vehicle_entries);
	$today_vehicle_entries = $today_vehicle_entries_array[0];

	$yesterday_date = date("Y-m-d", strtotime("-1 days"));
	$sql_yesterday_vehicle_entries = "SELECT COUNT(*) FROM vehicle WHERE income_date='$yesterday_date'";
	$res_yesterday_vehicle_entries = mysqli_query($conn, $sql_yesterday_vehicle_entries);
	$yesterday_vehicle_entries_array = mysqli_fetch_array($res_yesterday_vehicle_entries);
	$yesterday_vehicle_entries = $yesterday_vehicle_entries_array[0];

	$last_week_date = date("Y-m-d", strtotime("-7 days"));
	$sql_last_week_vehicle_entries = "SELECT COUNT(*) FROM vehicle WHERE income_date>'$last_week_date'";
	$res_last_week_vehicle_entries = mysqli_query($conn, $sql_last_week_vehicle_entries);
	$last_week_vehicle_entries_array = mysqli_fetch_array($res_last_week_vehicle_entries);
	$last_week_vehicle_entries = $last_week_vehicle_entries_array[0];

	$sql_total_vehicle_entries = "SELECT COUNT(*) FROM vehicle";
	$res_total_vehicle_entries = mysqli_query($conn, $sql_total_vehicle_entries);
	$total_vehicle_entries_array = mysqli_fetch_array($res_total_vehicle_entries);
	$total_vehicle_entries = $total_vehicle_entries_array[0];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./css/nav_style.css">
	<link rel="stylesheet" type="text/css" href="./css/index_style.css">
	<link rel="stylesheet" type="text/css" href="./css/left_nav_style.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/99c8254f42.js"></script>
	<title></title>
</head>
<body>
	<?php require './components/nav.php'; ?>

	<span class="nav_logout">
		<i class="fas fa-user-circle admin_icon"></i>
		<ul class="admin_icon_menu">
			<li><a href="./change_password.php">Change Password</a></li>
			<li><a href="./logout.php">Logout</a></li>
		</ul>
	</span>

	<main class="content row">
		<?php require './components/left_nav.php' ?>
		<div class="col-md-10 left_side">
			<div class="dashboard">
				<h1 class="dashboard_header">Dashboard</h1>
				<div class="row container cars_info">
					<div class="col-md-3 car_info">
						<div class="row">
							<div class="col-md-6">
								<i class="fas fa-car car_icon blue"></i>
							</div>
							<div class="col-md-6 car_info_right">
								<p class="counter car_info_number" data-value="<?php
									echo $today_vehicle_entries;
								?>">0</p>
								<p>Todays Vehicle Entries</p>
							</div>
						</div>
					</div>
					<div class="col-md-3 car_info">
						<div class="row">
							<div class="col-md-6">
								<i class="fas fa-car car_icon green"></i>
							</div>
							<div class="col-md-4 car_info_right">
								<p class="counter car_info_number" data-value="<?php
									echo $yesterday_vehicle_entries;
								?>">0</p>
								<p>Yesterdays Vehicle Entries</p>
							</div>
						</div>
					</div>
					<div class="col-md-3 car_info">
						<div class="row">
							<div class="col-md-6">
								<i class="fas fa-car car_icon violet"></i>
							</div>
							<div class="col-md-6 car_info_right">
								<p class="counter car_info_number" data-value="<?php
									echo $last_week_vehicle_entries;
								?>">0</p>
								<p>Last 7 Days Vehicle Entries</p>
							</div>
						</div>
					</div>
					<div class="col-md-3 car_info">
						<div class="row">
							<div class="col-md-6">
								<i class="fas fa-car car_icon yellow"></i>
							</div>
							<div class="col-md-6 car_info_right">
								<p class="counter car_info_number" data-value="<?php
									echo $total_vehicle_entries;
								?>">0</p>
								<p>Total Vehicle Entries</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</main>

	<script src="./js/count_up.js"></script>

	<script src="./js/admin_menu_toggle.js"></script>

</body>
</html>