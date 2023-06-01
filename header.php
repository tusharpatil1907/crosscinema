<?php
include 'db_user.php';
include 'ft.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cross cinema</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- ion icons -->
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

<link rel="stylesheet" href="style.css">
</head>

<!-- body starts here -->
<body  >
<nav class="navbar navbar-expand-lg navbar-light w-100" style="max-width:100%;" >
  <a class="navbar-brand" href="index.php"><img src="img/logo.png" style="height:40px; width:auto; max-width:100%;" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown" style="max-width: 100%;">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"  data-toggle="modal" data-target="#exampleModal">Contact us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php" >About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="disclaimer.php" >Disclamer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="privacy.php" >privacy policy</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown link
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
    </ul>
  </div>
</nav>



<!-- contact us  -->



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Feel free to Contact us</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="valicontact.php" method="post">
          <input required type="text" name="username" placeholder="Enter name" class="form-control"><br>
          
          <input required type="text" name="email" placeholder="Enter your mail" class="form-control"><br>
          <input required type="text" name="msg" placeholder="Enter your message" class="form-control"><br>
          <br>
          <button  name="csub" class="btn btn-primary" 
        >submit </button>
          <button  type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </form>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>


<!-- contact end -->


<!-- 2nd navbar  -->
<div class="topnav" id="myTopnav" style="width:100%">
  <a href="#home" class="active">Categories</a>
  <?php
  $q1 = "SELECT * FROM category";
  $run = mysqli_query($con, $q1);
  if($run){
    while($row=mysqli_fetch_assoc($run)){
      ?>

<!-- id encryption so user can able to acess database directly -->
<?php
  $id=$row['id'];
      
  // personal level encoding by multiplying id bt random number
      $enc1 = (($id * 123456789 * 54321) / 956783);
      // php encorder on encorded id on personal level
    $url = "category.php?id=" . urldecode(base64_encode($enc1));

?>
<!-- encrypt end -->



      <a href="<?php echo $url?>"><?php echo $row['category_name'];?></a> 
      
      
      <?php 
    }
  }
  ?>


  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>


<!-- nw -->

</div>

</div>

<!-- 2nd navbar -->
<!-- marque -->
<br>
<?php

// THIS QUERY WILL COUNT IN DECENDING ORDER TO CALCULATE FEOM LAST AND PRINT IN MARQUE FOE LETEST UPLOAD. DESC IS USED TO COUNT IN DECENDING ORDER
$q2 = "SELECT * FROM movie ORDER BY mv_name DESC LIMIT 1";
$r2 = mysqli_query($con, $q2);
if($r2){
  while($ro=mysqli_fetch_assoc($r2)){
    ?>
<marquee behavior="" direction=""><a href="">lettest post: </a><?php echo $ro['mv_name'];?> </marquee>
<?php
  }
}

?>
<br>
<!-- marque end -->





<!-- 3rd nav -->
<div class="topnav1" id="myTopnav1"style="max-width: 100%;">
  <a href="#home" class="active">Genre</a>
  <?php
  $query = "SELECT * FROM genre";
  $run = mysqli_query($con, $query);
  if($run){
    while($rows=mysqli_fetch_assoc($run)){
      ?>

     <!-- id encryption
      so user can able to acess database directly -->
<?php
  $id=$rows['id'];
      
  // personal level encoding by multiplying id bt random number
      $enc1 = (($id * 123456789 * 54321) / 956783);
      // php encorder on encorded id on personal level
    $url = "genre.php?id=" . urldecode(base64_encode($enc1));

?>
<!-- encrypt end -->
      <a href="<?php echo $url ?>"><?php echo $rows['genre_name'];?></a> 
      
      
      <?php 
    }
  }
  ?>
  <a href="javascript:void(0);" class="icon" onclick="myFunction1()">
    <i class="fa fa-bars"></i>
  </a>
</div>

</div>
<!-- 3rd nav -->
<?php 

?>





<div class="main row">
  <!-- sidebar -->

 




<script src="script.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>