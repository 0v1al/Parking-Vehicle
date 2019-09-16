<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./css/nav_style.css">
	<link rel="stylesheet" type="text/css" href="./css/index_style.css">
	<script src="https://kit.fontawesome.com/99c8254f42.js"></script>
	<title></title>
</head>
<body>
	<?php require './nav.php'; ?>

	<span class="nav_logout">
		<i class="fas fa-user-circle admin_icon"></i>
		<ul class="admin_icon_menu">
			<li><a href="./change_password.php">Change Password</a></li>
			<li><a href="./logout.php">Logout</a></li>
		</ul>
	</span>

	<main class="row">
		<nav class="nav_menu_left container col-md-2">
			<ul>
				<li class="active">
					<i class="fas fa-table"></i>
					<a href="#">Dashboard</a>
				</li>
				<li>
					<i class="fas fa-car-alt"></i>
					<a href="#">Vehicle Category</a>
					<i class="fas fa-chevron-right arrow"></i>
				</li>
				<li>
					<i class="fas fa-plus-square"></i>
					<a href="#">Add Vehicle</a>
				</li>
				<li>
					<i class="fas fa-tasks"></i>
					<a href="#">Manage Vehicle</a>
					<i class="fas fa-chevron-right arrow"></i>
				</li>
				<li>
					<i class="fas fa-exclamation-circle"></i>
					<a href="#">Reports</a><i class="fas fa-chevron-right arrow"></i>
				</li>
				<li>
					<i class="fas fa-search"></i>
					<a href="#">Search Vehicle</a>
				</li>
			</ul>
		</nav>
		<div class="col-md-10">
			
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