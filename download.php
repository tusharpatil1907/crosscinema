<?php

include 'header.php';
include 'ft.php';

?>
<style>
	html {
		scroll-behavior: smooth;
	}

	.img {
		/* max-height: 30rem;
		max-width: 10rem; */
		display: flex;
		justify-content: center;
	}

	video {
		border: 4px solid black
	}
</style>

<?php

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	foreach ($_GET as $key => $id) {
		// code...

		$dec = $_GET[$key] = base64_decode(urldecode($id));
		$uncal = ((($dec * 956783) / 54321) / 123456789);

		$query = "SELECT * FROM movie where mv_id=$uncal";
		$run = mysqli_query($con, $query);
		if ($run) {
			while ($row = mysqli_fetch_assoc($run)) {
				?>
				<meta charset="UTF-8">
				<meta name="description" content="<?php echo $row['meta_description']; ?>">
				<meta name="keywords" content="<?php echo $row['mv_tag']; ?>">
				<meta name="author">
				<body>
					
	
					<div class="container">
						
						<div class="row">
							<div class="col-sm-6">
								<div class="px-5 h5">
									<h1>Download <b>
										<?php echo $row['mv_name'] ?>
									</b></h1>
									<p class="py-2">
										<b>Meta Description:</b>
										<?php echo $row['meta_description']; ?>
									</p>
									<div>
										<pre class=""><b>Uploaded on: </b><?php echo $row['date']; ?></pre>
										<p class=""><span style="font-size: medium; font-weight: bolder;">Directed by: </span>
										<?php echo $row['director']; ?>
									</p>
									<p class=""><span style="font-size: medium; font-weight: bolder;">Language type:</span>
									<?php echo $row['lang']; ?>
								</p>
								<p class="my-5">
									<B>Description : </B>
									<?php echo $row['mv_des']; ?>
								</p>
								<div class="down_btn1">
									<button onclick="myfun()">download</button>
									<button onclick="vid()">Stream</button>
								</div>
								<div id="download" style="display:none; color:" >
									
								<!-- <a id="btn btn-" href="<?php echo $row['link1']; ?>">server1</a> -->
								<!-- <a id="btn btn-secondary" href="<?php echo $row['link2']; ?>">server2 </a> -->
								<a id="btn btn-secondary" href="movie/<?php echo $row['vid'] ?>" download>download now</a>
								
								
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-sm-6 img my-4">
					<img height="400" width="400" src="thumb/<?php echo $row['img'] ?>" alt="">
				</div>
			</div>
			<div id="vid" style="display:none;" >
				
			<div class="row d-flex justify-content-center my-5">
				<h1>Stream movie online: </h1>
			</div>
			<div class="row d-flex justify-content-center ">
				<div class="justify-content-center " >
					<video width="500" height="300" class="" controls src="movie/<?php echo $row['vid'] ?>"><video>
						</div>
					</div>
				</div>
				
			</div>
			
			
			
			
			
			
			
			
			<script>
				
				function myfun() {
					const btn=document.getElementById('download')

					if(btn.style.display == 'none'){
						btn.style.display='block';
					}
					else{
						btn.style.display='none';
					}
				}
					// document.getElementById('but').style.display = 'none';
				function vid() {
					const btn2 = document.getElementById('vid')
					if(btn2.style.display == 'none'){
						btn2.style.display='block';
					}
					else{
						btn2.style.display='none';
					}
					// document.getElementById('but').style.display = 'none';
				}
				

				</script>
			</body>
				<?php
			}
		}
	}
} else {
	echo "<script>window.location.href='index.php';</script>";
}

?>