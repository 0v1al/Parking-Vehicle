<?php
	require './components/conn.php';

	$msg = '';
	$type = '';
	
	if (isset($_POST['submit_category_update'])) {
		$category_update = $_POST['category_update'];
		$id = $_POST['hidden_value_id'];
		$sql = "UPDATE vehicle_category SET vehicle_category_name='$category_update' WHERE vehicle_id='$id'";
		if (empty($category_update)) {
			$msg = 'The field cannot be blank!';
			$type = 'red';
		} else {
			if (mysqli_query($conn, $sql)) {
				$msg = 'The category name has been updated!';
				$type = 'green';
			} else {
				echo "error: " . mysqli_error($conn);
				$msg = 'Updated failed!';
				$type = 'red';
			}
		}
		header("Location: update_category.php?id=$id&vehicle_category=$category_update&msg=$msg&type=$type");
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
	<link rel="stylesheet" type="text/css" href="css/update_category.css">
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
				<h1 class="dashboard_header">Dashboard<span class="subheader">/Vehicle Category/Update Category</span></h1>
				<div class="add_category">
					<div class="add_category_header">
						<h3>Update Category</h3>
					</div>
						<form class="form_category_update" action="update_category.php" method="POST">
							<div class="form-group row">
								<label class="col-md-2 col-form-label">Category Name</label>
								<div class="col-md-10">
									<input type="text" name="category_update" class="form-control" value="<?php 
										echo $_GET['vehicle_category'];
									 ?>">
										<input class="submit_btn" type="submit" value="Update Category" name="submit_category_update"/>
										<input type="hidden" name="hidden_value_id" value="<?php 
											echo $_GET['id'];
										 ?>">
								</div>
							</div>
							<?php
								if (isset($_GET['msg'])) {
									$msg = $_GET['msg'];
									$type = $_GET['type'];
									echo "<span style=color:$type>$msg</span>";
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