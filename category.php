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

				$dec1 = ((($data * 956783) / 54321) / 123456789);

				$query = "SELECT * from movie , category where category.category_id=movie.cat_id and category.category_id=$dec1";
				$run = mysqli_query($con, $query);
				if (mysqli_num_rows($run) > 0) {
					while ($row = mysqli_fetch_assoc($run)) {
						?>

						<div class="col">
							<div class="card" style="width: 18rem;text-align: center;">
								<img class="card-img-top" height="300px" width="100px" src="thumb/<?php echo $row['img']; ?>"
									alt="Card image cap">
								<div class="card-body">
									<h5 class="card-title">
										<?php echo $row['mv_name']; ?>
									</h5>
									<p class="card-text">
										<?php echo $row['director'] . "<br>" . $row['date']; ?>
									</p>
									<?php
									


									// foreach ($_GET as $key => $id) {
									// //  $query = "SELECT * FROM movie where movie.cat_id==";
									//  $run = mysqli_query($con, $query);
									//  if ($run) {
								 
									// while ($row = mysqli_fetch_($run)) {

// changes
									$id = $row['mv_id'];
									echo $id;
									// $cal = (($id * 123456789 * 54321) / 956783);
									$cal = (($id * 123456789 * 54321) / 956783);
									$url = "download.php?id=" . urlencode(base64_encode($cal));
						 			?>
									<a href="<?php echo $url; ?>" class="btn btn-"
										style="background-color:#726297; color: #fff;">Download</a>



									   <?php
									//    }}}
									   ?>




								</div>
							</div>
						</div>

						<?php
					}
				} else {
					echo "<h1>No Movie Found</h1>";
				}
			}
		}

	
		?>

	</div>
</div>