
<?php 

include 'db.php';
include 'header.php';
include 'ft.php';

 ?>
 <div class="container-fluid">

   <!-- <div class="navbar">
     <h1 class="navbar-brand ">Admin dashboard</h1>
     </div> -->
     
     <!-- sidebar -->
     <div>
       <div class="sidebar">
         <div class="navbar">
           <h1 class="navbar-brand ">Admin dashboard</h1>
          </div>
          <a class="active" href="#home">Home</a>
          <a href="movielist.php">Movies list</a>
          <a href="adminlist.php">Our Admins</a>
          <a href="categorylist.php">Categories</a>
          <a href="genrelist.php">Genre.  </a>

        </div>
        
        <!-- <div class="content">
  <h2>Responsive Sidebar Example</h2>
  <p>This example use media queries to transform the sidebar to a top navigation bar when the screen size is 700px or less.</p>
  <p>We have also added a media query for screens that are 400px or less, which will vertically stack and center the navigation links.</p>
  <h3>Resize the browser window to see the effect.</h3>
</div> -->
</div>
<!-- sidebar end -->


<div class="content">
  <div class="row">


  
    <!-- movie -->
    <div class="col-sm-6">
      <div class="card bg-info" style="border: 1px solid #ccc;">
        <div class="card-body text-center">
          <h5 class="card-title">Total No. Of Post</h5>
          <p class="card-text"><?php 

$query = "SELECT count(*) as total_movie from movie";
$run = mysqli_query($con,$query);
if ($run) {
		while ($row = mysqli_fetch_assoc($run)) {
			echo $row['total_movie'];
		}
	}
	 ?></p>
        
      </div>
    </div>
  </div>
  <!-- ---category -->
  <div class="col-sm-6">
    <div class="card bg-success" style="border: 1px solid #ccc;">
      <div class="card-body text-center">
        <h5 class="card-title">Total No. Of Category</h5>
        <p class="card-text"><?php 

$query = "SELECT count(*) as total_category from category";
$run = mysqli_query($con,$query);
if ($run) {
  while ($row = mysqli_fetch_assoc($run)) {
    echo $row['total_category'];
  }
}
?></p>
        
      </div>
    </div>
  </div>
  
  <!-- admin -->
  <div class="col-sm-6">
    <div class="card bg-secondary" style="border: 1px solid #ccc;">
      <div class="card-body text-center">
        <h5 class="card-title">Total No. Of Admin</h5>
        <p class="card-text"><?php 

$query = "SELECT count(*) as total_admin from admin";
$run = mysqli_query($con,$query);
if ($run) {
  while ($row = mysqli_fetch_assoc($run)) {
			echo $row['total_admin'];
		}
	}
  ?></p>
        
      </div>
    </div>
  </div>
  <!-- ---genre -->
  <div class="col-sm-6">
    <div class="card" style="border: 1px solid #ccc; background-color: #99ad5a;">
      <div class="card-body text-center">
        <h5 class="card-title">Total No. Of Genre</h5>
        <p class="card-text"><?php 

$query = "SELECT count(*) as total_genre from genre";
$run = mysqli_query($con,$query);
if ($run) {
  while ($row = mysqli_fetch_assoc($run)) {
    echo $row['total_genre'];
  }
}
?></p>
        
      </div>
    </div>
  </div>
</div>
<div>
  </div>
  <br>
  <br>
  <!-- btn1 js -->
  <div class="sbtn text-center" id="hbtn">
    <button class="btn btn btn-lg" onclick="first()" style="background-color: #8ab593; width: 190px;">Category &#8681;&#8681;</button>
  </div>
  <div class="show" id="show" style="display: none;">
  	<hr>
    
    
  	<center><h1>Category</h1></center>
  	<div class="row">
      <!-- btn1 end js -->
      <?php 

$query1 = "SELECT * FROM category";
$run1 = mysqli_query($con,$query1);
if ($run1) {
  while ($row1=mysqli_fetch_assoc($run1)) {
    ?>
  <div class="col-sm-6">
  
    <div class="card text-center">
      <div class="card-body" style="background-color: #8ab593;">
        <h5 class="card-title">Total No. Of Post in <?php echo $row1['category_name']; ?></h5>
         <?php 
      $id = $row1['id'];
      // count query
      $query2 = "SELECT count(*) as total from movie,category where category.id=movie.cat_id and category.id=$id ";
      $run2 = mysqli_query($con,$query2);
      if ($run2) {
       while ($row2 = mysqli_fetch_assoc($run2)) {
               
         ?>
        <p class="card-text"><?php echo $row2['total']; ?></p>
        
        <?php
                }
              }
              ?>
        <a href="viewpost.php?id=<?php echo$row1['id'] ?>" class="btn btn-outline-info">View Posts</a>
      </div>
    </div>
  </div>
  <?php
  		}
  	}

    ?>
	
</div>

  </div>
  <br>
  <br>
  <div class="btngen text-center" id="genbtn1">
    <button class="btn btn- btn-lg" onclick="myfun1()" style="background-color: #a68e68; width: 190px;">Genre &#8681;&#8681;</button>
  </div>
  <div class="genshow" id="genshow" style="display: none;">
  	<hr>
  	<center><h1>Genre</h1></center>
  	<div class="row">
      <?php 

$query3 = "SELECT * FROM genre";
$run3 = mysqli_query($con,$query3);
if ($run3) {
  		while ($row3=mysqli_fetch_assoc($run3)) {
  			?>
  <div class="col-sm-6">
  
    <div class="card text-center">
      <div class="card-body" style="background-color: #a68e68;">
        <h5 class="card-title">Total Count <?php echo $row3['genre_name']; ?></h5>
        <?php 
      $id = $row3['id'];
      // count VARIABLE
      $query4 = "SELECT count(*) as total_category from category,genre where genre.id=category.genre_id and genre.id=$id";
      $run4 = mysqli_query($con,$query4);
      if ($run4) {
        while ($row4 = mysqli_fetch_assoc($run4)) {
          
          ?>
        <p class="card-text">No of category "<?php echo $row4['total_category']; ?>"</p>
        
        <?php
                }
              }
       ?>
           <?php 
      $id = $row3['id'];
      // count variable.
      $query5 = "SELECT count(*) as total_post from movie,genre where genre.id=movie.genre_id and genre.id=$id";
      $run5 = mysqli_query($con,$query5);
      if ($run5) {
       while ($row5 = mysqli_fetch_assoc($run5)) {
         
                  ?>
        <p class="card-text">No. of Post "<?php echo $row5['total_post']; ?>"</p>
        
        <?php
                }
              }
              ?>
        
      </div>
    </div>
  </div>
  <?php
  		}
  	}
    
    ?>
	
</div>
</div>

</div>
</div>
<!-- --see more -->

</div>
<!-- js hide and show -->

<script type="text/javascript">
  function first() {
    const a=document.getElementById('show');
    if (a.style.display=="block"){
      a.style.display="none";
    }
    else{
      a.style.display="block";
    }
  }
	</script>
	<script type="text/javascript">
    function myfun1(show,hide) {
      document.getElementById('genshow').style.display="block";
			document.getElementById('genbtn1').style.display="none";
		}
    </script>
	<!-- h & s end -->
  