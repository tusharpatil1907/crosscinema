<?php 

include 'header.php';
include'ft.php';
include 'sidebar.php';
 ?>
<div class="content">
    <div class="row">
        
    
 <?php 

if (isset($_POST['submit'])) {
	$input = $_POST['search'];
	$search = preg_replace("#[^0-9a-z]#i","", $input);
	$query = "SELECT * FROM movie where mv_name LIKE '%$search%' OR mv_tag LIKE '%$search%' OR lang LIKE '%$search%' OR director LIKE '%$search%' OR meta_description LIKE '%$search%'";
	$run = mysqli_query($con,$query);
	$count = mysqli_num_rows($run);
	
	if($count>0){
		while($row = mysqli_fetch_assoc($run)){


			?>

<div class="col">
    <div class="card" style="width: 18rem;text-align: center;">
  <img class="card-img-top" height="300px" width="100px" src="thumb/<?php echo$row['img']; ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo$row['mv_name']; ?></h5>
    <p class="card-text"><?php echo$row['director']."<br>".$row['date']; ?></p>
    <?php 

    $id = $row['id'];
    $cal = (($id*123456789*54321)/956783);
    $url = "download.php?id=".urlencode(base64_encode($cal));
     ?>
    <a href="<?php echo$url; ?>" class="btn btn-" style="background-color:#726297; color: #fff;">Download</a>
  </div>
</div>
</div>
			<?php
		}
	}
	// else{
	// 	 echo "<div ><h1 style='text-align:center;'>No movie found </h1></div>";
	// }
}
else{
	echo"
	<div style='text-align:center;'>
	<h1>No Movie Searched </h1> <p>(Please Search Some Keyword)</p>

</div>
	";
}


// ---category

if (isset($_POST['submit'])) {
	$input1 = $_POST['search'];
	$search1 = preg_replace("#[^0-9a-z]#i","", $input1);
$query1 = "SELECT * FROM category where category_name LIKE '%$search%'";


	$run1 = mysqli_query($con,$query1);
	$count1 = mysqli_num_rows($run1);
	if ($count1>0){
		while($row1 = mysqli_fetch_assoc($run1)){


			?>

			<div class="card" style="width: 18rem; margin-top: 20px; text-align: center; border: none;">
  <div class="card-body">
	<h3>Result:</h3>
    <h3 class="card-title"><?php echo$row1['category_name']; ?></h3>
    
    <?php 
$id = $row1['id'];
    $cal = (($id*123456789*54321)/956783);
    $url = "catbypost.php?id=".urlencode(base64_encode($cal));

     ?>
    <a href="<?php echo$url; ?>" class="card-link btn btn-primary">View List</a>
    
  </div>
</div>
			<?php
		}
	}
}
if (isset($_POST['submit'])) {
	$input2 = $_POST['search'];
	$search2 = preg_replace("#[^0-9a-z]#i","", $input2);
$q2 = "SELECT * FROM genre where genre_name LIKE '%$search2%'";

	$run2 = mysqli_query($con,$q2);
	$count2 = mysqli_num_rows($run2);
	if ($count2>0){
		while($row2 = mysqli_fetch_assoc($run2)){


			?>
	<div class="card" style="width: 18rem; margin-top: 20px; text-align: center; border: none;">
  <div class="card-body row">
	  <h3>Results:</h3>
	  
    <h3 class="card-title"><?php echo$row2['genre_name']; ?></h3>
  
  <?php 

$id2 = $row2['id'];
    $cal2 = (($id2*123456789*54321)/956783);
    $url2 = "genbypost.php?id=".urlencode(base64_encode($cal2));
   ?>
    <a href="<?php echo$url2; ?>" class="card-link btn btn-primary">View List</a>
    
  </div>
</div>
			<?php
		}
	}
}

else{
	echo"
	<div style='text-align:center;'>
	<h1>No Category Searched </h1> <p>(Please Search Some Keyword)</p>

</div>
	";
}


  ?>

</div>
</div>