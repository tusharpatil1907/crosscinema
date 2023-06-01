<?php

include 'header.php';
include 'ft.php';
include 'db.php';

?>
<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $genrename = $_GET['genrename'];
  // $catid=$_GET['catid'];
  $genreid = $_GET['genreid'];
  ?>


<div class="container">
  <div class="head">

    <div class="jumbotron">
      <h1 class="display-4">Edit genre</h1>
      <p class="lead">Edit Genre and also please mention their Category ID properly</p>
      <hr class="my-4">
      <form action="#" method="post">
        <div class="form-row">
          <div class="col-7">
            <input type="text" value="<?php echo $genrename; ?>" name="genrename" class="form-control"
              placeholder="Genre Name">
          </div>

          <!-- <div class="col">
      <input type="text" name="cat_id" class="form-control" placeholder="Category ID " value="<?php //echo $catid;?>">
    </div> -->
          <div class="col">
            <input type="text" name="genre_id" required class="form-control" placeholder="Genre ID "
              value="<?php echo $genreid; ?>">
          </div>
        </div>
        <br><br>
        <button class="btn btn-primary btn-lg" name="submit">Edit Genre</button>
      </form>
    </div>
  </div>
</div>
<?php 
  if (isset($_POST['submit'])) {
    $genrename1 = $_POST['genrename'];
    // $cat_id = $_POST['cat_id'];
    $genreid1 = $_POST['genre_id'];

    //  $query="UPDATE `genre` SET `genre_name`='$genrename1',`category_id`=$cat_id,`genreid`='$genreid1' WHERE id=$id";
    $query = "UPDATE `genre` SET `genre_name`='$genrename1',`genreid`='$genreid1' WHERE id=$id";
    $run = mysqli_query($con, $query);
    if ($run) {
      echo "<script>alert('genre Successfully updated.. :)');window.location.href='genrelist.php';</script>";
    } else {
      echo "<script>alert('There Was A Problem While updating genre'); window.location.href='editgenre.php';</script>";

    }

  }
} else {
  header('location:genrelist.php');
}

?>
