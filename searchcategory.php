<?php 

include 'header.php';
include 'ft.php';
// ---category

if (isset($_POST['submit'])) {
	$input1 = $_POST['search'];
	$search1 = preg_replace("#[^0-9a-z]#i","", $input1);
$query1 = "SELECT * FROM category where category_name LIKE '%$search1%'";


	$run1 = mysqli_query($con,$query1);
	$count1 = mysqli_num_rows($run1);
	if ($count1 == 0) {

		echo "<div style='text-align:center;'>
		<h1>No Result Found '".$input."'</h1></div>";
	}
	else{
		while($row1 = mysqli_fetch_assoc($run1)){


			?>

			<?php 

			echo $row1['category_name'];
			
			

			 ?>
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