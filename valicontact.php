<?php
// include 'db_user.php';
include 'header.php';
include 'ft.php';
// file will save the information writen in form to database dable that will be viwed by admin only
if (isset($_POST['csub'])) {
	$name = $_POST['username'];
	$mail = $_POST['email'];
	$msg = $_POST['msg'];

	$query = "INSERT INTO `contactus`(`uname`, `mail`, `message`) VALUES ('$name','$mail','$msg')";
	$run = mysqli_query($con,$query);
	if ($run) {
		// echo 'submit';
		echo "<script>window.location.href='index.php';
		Swal.fire(
  'Request Submited',
  'We Review Your Request We work on it',
  'success',);

</script>";
	}
	else{
		// echo 'not';
		echo "<script>window.location.href='index.php';
		Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Something went wrong!',
  
});</script>";
	}
}
else{
	// echo 'something wrong';
	header('location:index.php');
}

 ?>
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>