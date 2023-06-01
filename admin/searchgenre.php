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
 
 <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Genre Name</th>
      <th scope="col">Category ID</th>
      <th scope="col">Genre ID</th>
      <th scope="col">No. of Category</th>
      <th scope="col">No. of Posts</th>

      <th scope="col">CURD</th>

    </tr>
  </thead>
 <?php 

if (isset($_POST['submit'])) {
	$search = $_POST['search'];
	$searchpreg =preg_replace("#[^0-9a-z]#i", "", $search);
	$query = "SELECT * FROM genre where category_id LIKE '%$search%' OR genre_name LIKE '%$search%' OR genreid LIKE '%$search%' ";
	$run = mysqli_query($con,$query);
	$count = mysqli_num_rows($run);
	if ($count == 0) {
		echo "<h1>No Genre Found!!</h1>";
	}
	else{
		while ($row=mysqli_fetch_assoc($run)) {
			?>
	
	
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <td><?php echo $row['genre_name']; ?></td>
      <td><?php echo $row['category_id']; ?> 
      </td>
      <td><?php echo $row['genreid']; ?></td>
       <?php 
      $id = $row['id'];
      $query1 = "SELECT count(*) as total_category from category,genre where genre.id=category.genre_id and genre.id=$id";
      $run1 = mysqli_query($con,$query1);
      if ($run1) {
              while ($row1 = mysqli_fetch_assoc($run1)) {

?>                
  
      <td><?php echo $row1['total_category']; ?></td>
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
    <td><a class="btn btn-danger" href="deletegenre.php?id=<?php echo$row['id']; ?>">DELETE</a> <a class="btn btn-outline-info" href="editgenre.php?id=<?php echo$row['id']; ?>&genrename=<?php echo$row['genre_name']; ?>&catid=<?php echo$row['category_id']; ?>&genreid=<?php echo$row['genreid']; ?>">EDIT</a></td>

    </tr>

  </tbody>



			
			<?php
		}
	}
}


  ?></table>
</div>