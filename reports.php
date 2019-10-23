<?php
    require './components/conn.php';
    
    $res = null;
    $submited = false;

    if (isset($_POST['submit_reports'])) {
        if (empty($_POST['from_date']) || empty($_POST['to_date'])) {
            array_push($login_error_message, "Please complete all the fields!");
        } else {
            $from_date = $_POST['from_date'];
            $to_date = $_POST['to_date'];
            $sql = "SELECT * FROM vehicle WHERE income_date > '$from_date' AND income_date < '$to_date'";
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if (mysqli_num_rows($res) > 0) {
                $submited = true;
                array_push($login_error_message, "Vehicle between these dates");
            } else {
                array_push($login_error_message, "There are no vehicle between these dates!");
            }
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Reports</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/left_nav_style.css">
	<link rel="stylesheet" type="text/css" href="css/nav_style.css">
	<link rel="stylesheet" type="text/css" href="css/nav_logout_style.css">
    <link rel="stylesheet" type="text/css" href="css/search_vehicle.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/99c8254f42.js"></script>
</head>
<body>

	<?php require './components/nav.php' ?>
	<?php require './components/nav_logout.php' ?>

	<main class="content row">
		
		<?php require './components/left_nav.php' ?>
		
		<div class="col-md-10">
			<div class="side-right-container">
				<h1 class="dashboard_header">Dashboard<span class="subheader">/Reports</span></h1>
				<div class="add_category">
					<div class="add_category_header">
						<h3>Reports Between Dates</h3>
					</div>
                    <form class="mt-5" action="reports.php" method="POST">
                        <div class="form-group row">
                            <label class="col-2 col-form-label">From Date:</label>
                            <div class="col-10 mb-4">
                                <input class="form-control" name="from_date" type="date">
                            </div>
                            <label class="col-2 col-form-label">To Date:</label>
                            <div class="col-10">
                                <input class="form-control" name="to_date" type="date">
                                <input class="submit_btn" name="submit_reports" type="submit" value="View">
                            </div>
                        </div>
                    </form>
                    <?php 
                        if (in_array("Vehicle between these dates", $login_error_message)) {
                            echo "<p class='text-center mt-5' style='color:green;'>Vehicle between these dates</p>";
                        }
                        if (in_array("There are no vehicle between these dates!", $login_error_message)) {
                            echo "<p class='text-center mt-5' style='color:red;'>There are no vehicle between these dates!</p>";
                        }
                        if (in_array("Please complete all the fields!", $login_error_message)) {
                            echo "<p class='mt-4' style='color:red;'>Please complete all the fields!</p>";
                        }
                    ?>
                    <table class="table table-striped mt-5">
                        <thead>
                            <?php 
                                if ($submited) {
                                    echo "<tr>
                                        <th>Parking Number</th>
                                        <th>Owner Name</th>
                                        <th>Registration Number</th>
                                        <th>Action</th>
                                    </tr>";
                                }
                            ?>
                        </thead>
                        <tbody>
                            <?php
                                if ($submited) {
                                    while ( $row = mysqli_fetch_array($res)) {
                                        $parking_number = $row['parking_number'];
                                        $owner_name = $row['owner_name'];
                                        $registration_number = $row['registration_number'];
                                        echo "<tr>
                                            <td>$parking_number</td>
                                            <td>$owner_name</td>
                                            <td>$registration_number</td>
                                            <td><a href='./view_vehicle.php?id=$parking_number'>View</a></td>
                                        </tr>";
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