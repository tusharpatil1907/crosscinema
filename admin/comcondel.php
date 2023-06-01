<?php 
//delete  the marked as completed list 
include 'header.php';
include 'ft.php';
include 'db.php';
if (isset($_GET['id'])) {
	# code...

$id = $_GET['id'];
$query = "DELETE FROM `completecontact` WHERE id = $id";
$run = mysqli_query($con,$query);
if ($run) {
	echo "<script>alert('Request Has Been Deleted!!');window.location.href='contact.php';</script>";
}
else{
	echo "<script>alert('somthing went wrong!!'); window.location.href='contact.php';</script>";
	}
}
else{
	header('location:comlistcon.php');
}

 ?>