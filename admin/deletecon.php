<?php 
//delete un solved queries of messages
include 'header.php';
include 'ft.php';
include 'db.php';
if (isset($_GET['id'])) {
	# code...

$id = $_GET['id'];
$query = "DELETE FROM `contactus` WHERE id = $id";
$run = mysqli_query($con,$query);
if ($run) {
	echo "<script>alert('Request Has Been Deleted!!');window.location.href='contact.php';</script>";
}
else{
	echo "<script>alert('somthing went wrong!!'); window.location.href='contact.php';</script>";
	}
}
else{
	header('location:contact.php');
}

 ?>