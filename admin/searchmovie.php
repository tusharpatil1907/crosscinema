<?php 

include 'db.php';
include 'header.php';
include 'ft.php';
 ?>

 <?php 


	$search1 = $_POST['search'];


  ?>
 <div class="container">
 	<CENTER><h1>Seach Result of "<?php echo $search1; ?>"</h1></CENTER>
 
 <div class="row">

 <?php 
// code to search movie.
if (isset($_POST['submit'])) {
	$search = $_POST['search'];
	$searchpreg =preg_replace("#[^0-9a-z]#i", "", $search);
	// query to search movie like
	$query = "SELECT * FROM movie where mv_name LIKE '%$search%' OR mv_tag LIKE '%$search%' OR lang LIKE '%$search%' OR director LIKE '%$search%' or date LIKE '%$search%' ";
	$run = mysqli_query($con,$query);
	$count = mysqli_num_rows($run);

	// if movie dosnt found then if condition will work if found then else condition will work.
	if ($count == 0) {
		echo "<h1>No Movie Found!!</h1>";
	}
	else{
		while ($row=mysqli_fetch_assoc($run)) {
			?>

			<div class="col">
				<div class="card" style="width:200px;text-align: center;">
			<a href="viewmovie.php?id=<?php echo$row['mv_id']; ?>"><?php echo "<img height='180px' width='auto' src='../thumb/".$row['img']."'>"; ?></a>
			<p><?php echo $row['mv_name']; ?></p>
		</div></div>
			<?php
		}
	}
}

  ?></div>