<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="service";
$conn = mysqli_connect ( $servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo'<html>
	<head>
		<title>hygenPage</title>
		<style>
			h1{
				color:red;
			}
		</style>
	</head>
	<body bgcolor="#E6E6FA">
		<h1 align="center">Muncipality Department</h1>
		<form action="" method="POST">
		<table align="center">
		<tr>
		<td>problem:</td>
		<td><select>
			<option value="water">water</option>
			<option value="wastage">wastage</option>
			<option value="hygen">hygen</option>
		</select></td></tr>
		<tr>
		<td>status:</td>
		<td><select>
			<option value="looked">looked</option>
			<option value="attended">attended</option>
			<option value="under execution">under exection</option>
			<option value="solved">solved</option>
		</select></td>
		</tr>
		<tr><td align="center">
			<input type="submit" name="submit" value="results"/></td></tr>
		</table>
		</form>';
if(isset($_POST['submit'])){
	$prob=$_POST["problem"];
	$status=$_POST["status"];
	$fetch="select picture,location,description,status from central where problem='$prob' and status='$status' and sector='hygiene'";
	$result=$conn->query($fetch);
	echo '<table align="center"><th><td>Image</td><td>Location</td><td>Description</td><td>Status</td></th>';
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			echo '<tr><td><img src="',$row['picture'],'" alt="image"/></td><td>',$row["location"],'</td><td>',$row['description'],'</td><td>',$row['status'],'</td></tr>';
		}
	}
}
?>

	</body>
</html>
		
