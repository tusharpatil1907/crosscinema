<?php 
include 'header.php';
include 'db.php';

if (isset($_POST['submit'])) {
	$mv_name = $_POST['mv_name'];
	$mv_m_desc = $_POST['mv_m_desc'];
	$mv_m_tag = $_POST['mv_m_tag'];
	$mv_link1 = $_POST['mv_link1'];
	$mv_link2 = $_POST['mv_link2'];
	$mv_lang = $_POST['mv_lang'];
	$cat_id = $_POST['cat_id'];
	$genre_id = $_POST['genre_id'];
	$mv_desc = $_POST['mv_desc'];
	$mv_director = $_POST['mv_director'];
	$mv_date = date('Y-m-d', strtotime($_POST['mv_date']));
	$target = "../thumb/".basename($_FILES['img']['name']);
	$img = $_FILES['img']['name'];
	$vid = $_FILES['vid']['name'];
	$target2 = "../movie/" . $vid;
	// $target2 = "../movie/".basename($_FILES['vid']['name']);
	$query = "INSERT INTO movie (`cat_id`, `genre_id`, `mv_name`, `mv_des`, `mv_tag`, `link1`, `link2`, `img`, `date`, `lang`, `director`, `meta_description`,`vid`) VALUES ($cat_id,$genre_id,'$mv_name','$mv_desc','$mv_m_tag','$mv_link1','$mv_link2','$img','$mv_date','$mv_lang','$mv_director','$mv_m_desc','$vid')";

	$run = mysqli_query($con,$query);
	if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
	// 	echo "<script>alert('Movie Successfully Added.. :)');
	// // window.location.href='movielist.php';
	// 	</script>";
		// video logic
		if(move_uploaded_file($_FILES['vid']['tmp_name'],$target2)){
			echo "<script>alert('Movie Successfully Added.. :)');window.location.href='movielist.php';</script>";
			
		} 
		else {

			echo "movie not uploaded";
		}

	}
	else{
		// echo"not done";
		echo "<script>alert('Something Went Wrong!!.. :(');window.location.href='addmovie.php';</script>";
		
	
	}

}

 ?>