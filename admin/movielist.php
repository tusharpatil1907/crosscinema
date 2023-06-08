<?php 

include 'db.php';
include 'header.php';
include 'ft.php';
 ?>

<div class="container">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Movies On Cross Cinema</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
  	 <ul class="navbar-nav ml-auto">
  	 	      <li class="nav-item">
        <a class="btn btn-warning text-light" href="addmovie.php">Add a Movie</a>
      </li>
  	 </ul>
    <ul class="navbar-nav ml-auto">
    <!-- while searching movie it will redirect to search movie file where you get the movie if found on site. -->
 		 <form class="form-inline" method="post" action="searchmovie.php">
    <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search">
    <button class="btn btn-success" name="submit" type="submit">Search</button>
  </form>
    </ul>
  </div>
</nav>
</div>
<hr>
	<br><br>  
	
		
<!-- <div class="container"> -->
  

<div class="row m-3">
<?php 

$query = "SELECT * FROM movie";
$run = mysqli_query($con,$query);

if ($run) {
	while ($row = mysqli_fetch_assoc($run)) {
		?>
  <div class="col-md-3">

    <div class="card shadow p-3 mb-5 bg-white rounded " >
    	<p>Movie ID: <?php echo $row['mv_id']; ?></p>
   <?php  //imp
    echo "<img height='300px'vwidth='300px' src='../thumb/".$row['img']."'>";
     ?>
      <div class="card-body">
        <h5 class="card-title"><?php echo $row['mv_name']; ?></h5>
        <p class="card-text"><?php echo $row['meta_description']; ?></p>
        
        <div style="" class="btn-sm-2">

          <a href="viewmovie.php?id=<?php echo$row['mv_id']; ?>" 
          class="btn btn-success btn-sm">View Details</a>
          <!-- <br> -->
          
          <a href="deletemovie.php?id=<?php echo$row['mv_id'] ?>" class="btn btn-danger btn-sm">DELETE</a>
          <!-- <a href="editmovie.php?id=<?php //echo$row['mv_id'] ?>" class="btn btn-info  btn-sm">Edit</a> -->
        </div>
</div>

    </div>
  </div>
  <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
<?php		
	}
}

?>
</div>
	</div>