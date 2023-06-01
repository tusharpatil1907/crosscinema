<?php

include 'db.php';
include 'header.php';
include 'ft.php';
?>

<div class="container">
 	<div class="head">
 		
 		<div class="jumbotron">
  <h1 class="display-4">Add a genre</h1>
  <p class="lead">Add Genre and also please mention their Category ID</p>
  <hr class="my-4">
  <form action="addgenre.php" method="post">
  <div class="form-row">


    <div class="col-7">
      <input type="text" name="genrename" class="form-control" placeholder="Genre Name">
    </div>
   
 <!-- <div class="col">
      <input type="text" name="cat_id" class="form-control" placeholder="Category ID ">
    </div> -->


     <div class="col">
      <input type="text" name="genre_id" class="form-control" placeholder="Genre ID ">
    </div>
  </div>
  <br><br>
  <button class="btn btn-primary btn-lg" name="submit">Add Genre</button>
</form>
</div>
 	</div>
 </div>

 <?php 
    if(isset($_POST['submit'])){
        $gename = $_POST['genrename'];
        // $catid = $_POST['cat_id'];
        $genre= $_POST['genre_id'];

       $query=" INSERT INTO `genre`(`genre_name`,`genreid`) VALUES ('$gename',$genre)";


      //  old
      //  $query=" INSERT INTO `genre`(`genre_name`, `category_id`, `genreid`) VALUES ('$gename',$catid,$genre)";


       $run = mysqli_query($con,$query);
       if ($run) {
        echo "<script>alert('genre Successfully Added.. :)');window.location.href='genrelist.php';</script>";
      }
      else{
         echo "<script>alert('There Was A Problem While adding genre'); window.location.href='addgenre.php';</script>";
   
      }

    }



 ?>
