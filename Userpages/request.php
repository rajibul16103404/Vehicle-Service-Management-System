<?php

$conn=mysqli_connect("localhost","root","","vehicle");
if($conn)
{
	$sql="SELECT * FROM bikebrand" ;
	$qry=mysqli_query($conn,$sql);
	if(mysqli_num_rows($qry)>0)
	{
		?>


<!DOCTYPE html>
<head>
	<title>Request For Service</title>
	<link rel="stylesheet" href="CSS/request.css?v=<?php echo time(); ?>">
</head>
<body>
	<form action="" method="POST">
		<table>
			<tr>
				<td>
					<select name="bikebrand" id="brand">
					<option value="">Bike Brand</option>
					<?php
						while($row=mysqli_fetch_assoc($qry))
						{
							echo "<option value='".$row['brand']."'>".$row['brand']."</option>";
						}
					?>
						
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="bikemodel" placeholder="Enter Bike Model">
				</td>
			</tr>
			<tr>
				<td>
					<select name="bikecc">
						<option value="">Bike CC</option>
						<option value="50">50</option>
						<option value="80">80</option>
						<option value="100">100</option>
						<option value="110">110</option>
						<option value="120">120</option>
						<option value="125">125</option>
						<option value="135">135</option>
						<option value="150">150</option>
						<option value="155">155</option>
						<option value="160">160</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<select name="problemarea">
						<option value="Problem Area">Problem Area</option>
						<option value="Brake">Brake</option>
						<option value="Engine">Engine</option>
						<option value="Tyre">Tyre</option>
						<option value="Hydrolic">Hydrolic</option>
						<option value="Tyre">Tyre</option>
						<option value="Body">Body</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<textarea name="description" id="" cols="30" rows="10" placeholder="Problem Description"></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="submit" value="Place Request">
				</td>
			</tr>
		</table>
	</form>
</body>

	

		<?php
	}
	if(isset($_POST['submit']))
	{
		$date=date('Y-m-d');
		$sql3="insert into userrequest (bikebrand, bikemodel, bikecc, problemarea, description,status,user,requestdate,payment) values ('$_POST[bikebrand]','$_POST[bikemodel]','$_POST[bikecc]','$_POST[problemarea]','$_POST[description]','Pending','$_SESSION[username]','$date','Not Paid')";
		$qry3=mysqli_query($conn,$sql3);
		if($qry3)
		{
			echo "<script>alert('Request Placed Successfully');window.location='menu.php?page=request'</script>";
		}
		else
		{
			echo "<script>alert('Something Went Wrong!');window.location='menu.php?page=request'</script>";
		}
	}
	
}
?>
