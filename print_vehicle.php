<?php
	require './components/conn.php';

	$vehicle_id = $_GET['id'];
	$sql = "SELECT * FROM vehicle WHERE parking_number='$vehicle_id'";
	$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
	$row = mysqli_fetch_array($res);

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://kit.fontawesome.com/99c8254f42.js" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.60/pdfmake.min.js" integrity="sha256-DgMKT/pyAKjuP9wB3FRJa8IAVMWlWYjUFfd3UgSCtU0=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js" integrity="sha256-c3RzsUWg+y2XljunEQS0LqWdQ04X1D3j22fd/8JCAKw=" crossorigin="anonymous"></script>
		<title></title>
		<link rel="stylesheet" href="css/print_vehicle.css">
</head>
<body>
	<div id="convert_to_pdf" class="container-fluid pt-4 pb-4">
		<h1 class="text-center  mb-5">Vehicle Details</h1>
		<table class="table table-bordered mt-4 table-responsive-sm table-striped">
		  <tbody>
		    <tr>
		      <td scope="col" class=" font-weight-bold">Parking Number</td>
		      <td scope="col" class=""><?php echo $row['parking_number']; ?></td>
		      <td scope="col" class="font-weight-bold">Vehicle Category</td>
		      <td scope="col" class=""><?php echo $row['vehicle_category']; ?></td>
		    </tr>
		    <tr>
		      <td class="font-weight-bold">Vehicle Company</td>
		      <td class=""><?php echo $row['vehicle_company']; ?></td>
		      <td class="font-weight-bold">Registration Number</td>
		      <td class=""><?php echo $row['registration_number']; ?></td>
		    </tr>
		    <tr>
		      <td class="font-weight-bold">Owner Name </td>
		      <td class=""><?php echo $row['owner_name']; ?></td>
		      <td class="font-weight-bold">Owner Contact Number</td>
		      <td class=""><?php echo $row['owner_contact']; ?></td>
		    </tr>
		    <tr>
		      <td class="font-weight-bold">In Time</td>
		      <td class=""><?php echo $row['income_date']; ?></td>
		      <td class="font-weight-bold">Status</td>
		      <td class=""><?php echo $row['vehicle_status']; ?></td>
		    </tr>
		  </tbody>
		</table>
	</div>
		<button class="download_btn"><i class="fas fa-file-download mr-2"></i>Download to PDF</button>

    <script src="./js/convert_to_pdf.js"></script>

</body>
</html>