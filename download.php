<?php 

include 'header.php';
include 'ft.php';

 ?>
<style>
 html{
 	scroll-behavior:smooth ;
 }
#btn1{
	padding: 10px 20px;
	background-color:#726297;
	border: 1px solid #726297;
	text-decoration: none;
	color:#fff;
}
#btn2{
	padding: 10px 20px;
	background-color: none;

	text-decoration: none;
	color:  #726297;
}
#btn1:hover{
	background-color:#fff;
	color: #726297;
	border-radius: 10px;
	
}
#btn2:hover{
	background-color:#726297;
	color: #fff;
	border-radius: 10px;

	
}
</style>

 <?php 

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	foreach ($_GET as $key => $id) {
		// code...
	
	$dec = $_GET[$key] = base64_decode(urldecode($id));
	$uncal = ((($dec*956783)/54321)/123456789);
	
	$query = "SELECT * FROM movie where mv_id=$uncal";
	$run = mysqli_query($con,$query);
	if ($run) {
		while($row = mysqli_fetch_assoc($run)){
			?>
  <meta charset="UTF-8">
  <meta name="description" content="<?php echo$row['meta_description']; ?>" >
  <meta name="keywords" content="<?php echo$row['mv_tag']; ?>" >
  <meta name="author" >
			<div class="container text-center">
				<div class="">
					<h1>Download <b><?php echo$row['mv_name'] ?></h1></b>
				</div>
				<div class="img">
					<img src="thumb/<?php echo$row['img']; ?>" height='400px' width='300px' style="max-width: 100%;">
				</div>
				<br>
				<div id='but'>
				<a href="#download" onclick="myfun()" class="btn btn-" style="background-color: #726297; color: #fff;">Download</a>
				<!-- <a id="" href=""?>"class="btn btn" style="background-color: #726297; color: #fff;">Stream link</a> -->
                

			</div>
           
				<div class="container">
					<h2><?php echo$row['mv_name']; ?></h2>
					<p>Movie Language:- <b><i><?php echo$row['lang'] ?></i></b></p>
					<p>Directed By <b><i><?php echo$row['director']; ?></b></i></p>
					<p>Release Date :- <b><i><?php echo$row['date']; ?></i></b></p>
					<div class="jumbotron">
						<p><?php echo $row['mv_des']; ?></p>
					</div>
					<!-- stream video tag -->
					<div class="container">
						<h1>stream here.</h1>
						<video controls src="movie/<?php echo $row['vid']  ?>"></video>
					</div>
				</div>

<div id="download" style="display:none;">

<a id="btn1" href="<?php echo$row['link2']; ?>">server1</a>
<a id="btn2" href="<?php echo$row['link2']; ?>">server2 </a>


	</div>


			</div>
<script>

function myfun(show,hide) {
	document.getElementById('download').style.display='block';
	document.getElementById('but').style.display='none';
}


</script>
			<?php
		}
	}
}
}
else{
	echo "<script>window.location.href='index.php';</script>";
}

  ?>
  