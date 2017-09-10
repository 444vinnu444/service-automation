<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="service";
$conn = mysqli_connect ( $servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//if(!isset($_POST['submit']){
	echo '<html>
	<head>
		<title>HealthPage</title>
		<style>
			h1{
				color:red;
			}
		</style>
	</head>
	<body bgcolor="#E6E6FA">
		<h1 align="center">Health page</h1><br/>
		<form action="" method="POST">
		<table align="center">
		<tr>
		<td>Problem:</td>
		<td><select name="problem">
			<option value="contagiousdisease">contagious disease</option>
			<option value="chronicphysicalillness">chronic physical illness</option>
			<option value="viralfevers">viral fevers</option>
		</select></td></tr>
		<tr><td>Status:</td>
		<td><select name="status">
			<option value="looked">looked</option>
			<option value="attended">attended</option>
			<option value="underexecution">under exection</option>
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
	$fetch="select picture,location,description,status from central where problem='$prob' and status='$status' and sector='health'";
	$result=$conn->query($fetch);
	echo '<table width="100%" align="center"><thead><td>Image</td><td>Location</td><td>Description</td><td>Status</td></thead>';
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			echo '<tr><td><img src="',$row['picture'],'" alt="image"/></td><td>',$row["location"],'</td><td>',$row['description'],'</td><td>',$row['status'],'</td></tr>';
		}
	}
	echo '</table>';
}
?>
</body>
</html>
