<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="service";
$squery="select * from central";
$conn = mysqli_connect ( $servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$service=$_POST['service'];
if(isset($_POST['problem'])){
	if($_POST['service']=='emergency'){
		$problem=implode(",",$_POST['problem']);
	}
	else
		$problem=$_POST['problem'];
}
else
	echo "please select a problem";
if($_POST['service']=='general'){
if(isset($_POST['health']))
$specific=$_POST['health'];
if(isset($_POST['hygiene']))
$specific=$_POST['hygiene'];
if(isset($_POST['irrigation']))
$specific=$_POST['irrigation'];
if(isset($_POST['water']))
$specific=$_POST['water'];
}
$description=$_POST['description'];
//$location=$_POST['location'];
$location=0;
$date=date("Y/m/d").date("h:i:sa");
 if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=explode('.',$_FILES['image']['name']);
      
      $expensions= array("jpeg","jpg","png");
      
      //if(in_array($file_ext[1],$expensions)== false){
      //   $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      //}
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
//echo $service;
//echo $problem;
//echo $date;
$insert="INSERT INTO central values('$service','$file_name','$location','$problem','submitted','$description','$specific','$date')";
$query=$conn->query($insert);
if($query){
	echo "thank you for imformation";
}
else
	echo "jghkf";
?>
