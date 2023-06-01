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
      <th scope="col">Category ID <small>Foriegn Key</small></th>
      <th scope="col">Category Name</th>
      <th scope="col">No. of Post</th>
      <th scope="col">CURD</th>
      <th scope="col">View Post</th>


    </tr>
  </thead>
 <?php 

if (isset($_POST['submit'])) {
	$search = $_POST['search'];

  // Searches subject for matches to pattern and replaces them with replacement
	$searchpreg =preg_replace("#[^0-9a-z]#i", "", $search);

  // updated query for category search
	$query = "SELECT * FROM category where category_id LIKE '%$search%' OR category_name LIKE '%$search%' OR genre_id LIKE '%$search%' ";
	$run = mysqli_query($con,$query);

  // returns the number of rows in a result set
	$count = mysqli_num_rows($run);
	if ($count == 0) {
		echo "<h1>No Category Found!!</h1>";
	}
	else{
		while ($row=mysqli_fetch_assoc($run)) {
			?>
	
	
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <td><?php echo $row['category_id']; ?></td>
      <td><?php echo $row['category_name']; ?> 
      </td>
      <?php 
      $id = $row['id'];
      $query1 = "SELECT count(*) as total from movie,category where category.id=movie.cat_id and category.id=$id ";
      $run1 = mysqli_query($con,$query1);
      if ($run1) {
       while ($row1 = mysqli_fetch_assoc($run1)) {
               
                  ?>
                   <td><?php echo $row1['total']; ?></td>
                  <?php
                }
      }
       ?>
     

      <td>
      	<a href="deletecategory.php?deleteid=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
       <a class="btn btn-outline-secondary" href="editcategory.php?id=<?php echo $row['id']; ?>&forkey=<?php echo$row['category_id']; ?>&catname=<?php echo$row['category_name']; ?>">Edit</a></td>
       <td><a href="viewpost.php?id=<?php echo$row['id'] ?>" class="btn btn-outline-info">View Posts</a></td>

    </tr>

  </tbody>



			
			<?php
		}
	}
}


  ?></table>
</div>