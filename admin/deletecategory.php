
<?php 
include 'db.php';
include 'header.php';
include 'ft.php';



$id = $_GET['deleteid'];

$query = "DELETE FROM `category` WHERE id =$id";

$run = mysqli_query($con,$query);

if ($run) {
	header('location:categorylist.php');
}
else{
	echo "<script>alert('somthing went wrong!!'); window.location.href='categorylist.php';</script>";
}

 ?>