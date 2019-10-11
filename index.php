<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./css/nav_style.css">
	<link rel="stylesheet" type="text/css" href="./css/index_style.css">
	<link rel="stylesheet" type="text/css" href="./css/left_nav_style.css">
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

	<main class="row">
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
								<p class="car_info_number">1</p>
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
								<p class="car_info_number">2</p>
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
								<p class="car_info_number">3</p>
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
								<p class="car_info_number">4</p>
								<p>Total Vehicle Entries</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</main>

	<script>
		;(function() {
			let nav_logout = document.querySelector('.nav_logout');
			let admin_icon = document.querySelector('.admin_icon');
			let admin_icon_menu = document.querySelector('.admin_icon_menu');
			admin_icon.addEventListener('click', () => {	
				admin_icon_menu.classList.toggle('show');
			});
			window.addEventListener('click', (e) => {
				if (!nav_logout.contains(e.target) && admin_icon_menu.classList.contains("show")) {
					admin_icon_menu.classList.toggle('show');
				} 
			});
		})();
	</script>

</body>
</html>