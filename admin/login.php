s<?php
// sessions if you are logged in then 
session_start();

// include 'header.php';
// include 'ft.php';
// $con = mysqli_connect("localhost","root","","crosscinema"); 
include 'db.php';
?>


<head>
  <!-- bootstrap cdn link -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</head>


<div class="container">
    <div class="head" style="text-align:center">
        <h1>Admin login</h1>
    </div>



<!-- bootstrap form -->
    <form action="login.php" method="post">
  <div class="form-group">
    <label  for="exampleInputEmail1">Enter username</label>
    <input required type="text" name="uname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input required type="password" name="pwd" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

  <!-- checkbox not need -->
  <!-- <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>


<?php
    // to get the username and password from database
    if (isset($_POST['submit']))
    {
      $user = $_POST['uname'];
      $pwd = $_POST['pwd'];


      $query="select * from admin where uname = '$user'";
      $run = mysqli_query($con,$query);

      //without passs encription 
      // $row = mysqli_num_rows($run);
      // login session logic.
      // if($row == 1) {

      // decrypting the encryped pass while registering and logging in
      if (mysqli_num_rows($run)>0) 
      {
        while ($row = mysqli_fetch_assoc($run)) 
        {
          if(password_verify($pwd,$row['pwd']))
          {
            $_SESSION['loginsuccesfull']=1;
// username will be stored in below session for print name in the admin profile who is using it
            $_SESSION['user']=$user;
            echo "<script>alert('logged in sucessfully'); window.location.href='index.php';</script>";
          }
          
        }
      }      
      else 
      {
        echo "<script> alert('invalid id or password try again'); </script>";
      }
    }
    


?>
