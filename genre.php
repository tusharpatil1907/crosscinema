<?php 
include 'header.php';
include 'ft.php';
 ?>
 <div class="content">
    <div class="row">
 <?php 

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	foreach ($_GET as $key => $id) {
		$data = $_GET[$key] = base64_decode(urldecode($id));
		
		// $dec1 = (($data*956783)/54321*123456789);
		$dec1 = ((($data*956783)/54321)/123456789);


		// get the data from  movie and genre when genre id and movie will be matching and the it is matching this encrypted id the n it can be seen 
		
		$query = "SELECT * from movie,genre where genre.id=movie.genre_id and genre.id=$dec1";
		$run = mysqli_query($con,$query);
		if (mysqli_num_rows($run)>0) {
			while ($row=mysqli_fetch_assoc($run)) {
				?>

<div class="col">
    <div class="card" style="width: 18rem;text-align: center;">
  <img class="card-img-top" height="300px" width="100px" src="thumb/<?php echo$row['img']; ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo$row['mv_name']; ?></h5>
    <p class="card-text"><?php echo$row['director']."<br>".$row['date']; ?></p>
    <?php 

    $id = $row['mv_id'];
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
		else{
			echo "<h1>No Movie Found</h1>";
		}
	}
}


  ?>
</div>
</div>