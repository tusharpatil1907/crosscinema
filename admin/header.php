<?php
// login authentication code
// encrypt admin and register admin page so no one can acess without login.

// used in header coz header and footer will be added in each and every file of admin.
session_start();
if (isset($_SESSION['loginsuccesfull'])) {}
    else{
        echo "<script>alert('you are not logged in'); window.location.href='login.php';</script>";
        // header('location:login.php'); 

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - cross cinema</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- sidebar stylesheet -->
<link rel="stylesheet" href="sidebar_style.css">
</head>
<body>
    <!-- navbar section -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light row fixed-top" >
      <!-- bellow session is used for session created to get the name here after login from login.php about line no 80 -->
      <div class="col " >
        <div class="col " >

         <img src="img/logo.png" class="col w-25"  alt="">
          <a class="navbar-brand nav-sm " href="#">Hello, <?php echo $_SESSION['user']; ?> 
          </a>
        </div>

      </div>
      <button class="navbar-toggler mr-4" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon "></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="registeradmin.php">Register Admin</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="adminlist.php">Admin list</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="movielist.php">Movies</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="categorylist.php">category</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="genrelist.php">genre</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">customer Requests</a>
      </li>
      <li class="nav-item">
        <a class="btn btn-outline-danger " href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
<br><br><br>
    <!-- navbar end -->

<!-- sidebar code  -->
<!-- <div class="sidebar">
  <a class="active" href="#home">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
</div> -->


</body>
</html>