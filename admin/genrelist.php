<?php 

include 'db.php';
include 'header.php';
include 'ft.php';
 ?>

<div class="container">
	<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Genre On Cross Cinema</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
     <ul class="navbar-nav ml-auto">
            <li class="nav-item">
        <a class="btn btn-warning text-light" href="addgenre.php">Add a Genre</a>
      </li>
     </ul>
    <ul class="navbar-nav ml-auto">

     <form class="form-inline" method="post" action="searchgenre.php">
    <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search">
    <button class="btn btn-success" name="submit" type="submit">Search</button>
  </form>
    </ul>
  </div>
</nav>
</div>
	<hr>
	<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Genre Name</th>
      <!-- <th scope="col">Category ID</th> -->
      <th scope="col">Genre ID</th>
      <!-- <th scope="col">No. of Category</th> -->
      <th scope="col">No. of Posts</th>

      <th scope="col">CURD</th>

    </tr>
  </thead>
  <tbody>
  	<?php 

  	$query = "SELECT * FROM genre";
  	$run = mysqli_query($con,$query);
  	if ($run) {
  		while ($row=mysqli_fetch_assoc($run)) {
  			?>

    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <td><?php echo $row['genre_name']; ?></td>
      <!-- <td><?php // echo $row['category_id']; ?></td> -->
      <td><?php echo $row['genreid']; ?></td>
      <?php 
      $id = $row['id'];
      $query1 = "SELECT count(*) as total_category from genre where genre.id=$id";
      // $query1 = "SELECT count(*) as total_category from category,genre where genre.id=category.genre_id and genre.id=$id";
      $run1 = mysqli_query($con,$query1);
      if ($run1) {
              while ($row1 = mysqli_fetch_assoc($run1)) {

?>                
  
      <!-- <td><?php // echo $row1['total_category']; ?></td> -->
<?php
              }
            }
       ?>
<?php 

$query2 = "SELECT count(*) as total_post from movie,genre where genre.id=movie.genre_id and genre.id=$id";
$run2 = mysqli_query($con,$query2);
if ($run2) {
  while ($row2=mysqli_fetch_assoc($run2)) {
    ?>
  
<td><?php echo $row2['total_post']; ?></td>
  <?php
    
  }
}

 ?>
      <!-- <td><a class="btn btn-danger" href="deletegenre.php?id=<?php echo$row['id']; ?>">DELETE</a> <a class="btn btn-outline-info" href="editgenre.php?id=<?php //echo$row['id']; ?>&genrename=<?php echo$row['genre_name']; ?>&catid=<?php // echo$row['category_id']; ?>&genreid=<?php // echo$row['genreid']; ?>">EDIT</a></td> -->

      <!-- made CHANGES  -->
      <td><a class="btn btn-danger" href="deletegenre.php?id=<?php echo$row['id']; ?>">DELETE</a> <a class="btn btn-outline-info" href="editgenre.php?id=<?php echo$row['id'];?>&genrename=<?php echo$row['genre_name']; ?>&genreid=<?php echo$row['genreid']; ?>">EDIT</a></td>
    </tr>
<?php
  		}
  	}

  	 ?>
  </tbody>

</table>
</div>