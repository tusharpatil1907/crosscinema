<?php
include 'header.php';
include 'ft.php';
include 'db.php';
?>

<!-- Table start -->
<div class="head container" style="padding-top:20px; padding-bottom: 20px; text-align: center;">
    <h1>Admins of cross cinema.</h1>
    <hr>
</div>

<table class="table table-striped container" style="text-align: center;">
  <thead >



    <tr>
      <th scope="col">#</th>
      <th scope="col">username</th>
      <th scope="col">Password</th>
      <!-- <th scope="col">Curd</th> -->
    </tr>
  </thead>
<!-- used inbetween to print the values from database into table insted of making table body in echo -->
  <?php
    $query= "select * from admin";
    $run=mysqli_query($con,$query);
    if($run){
        while($row = mysqli_fetch_assoc($run)){
            // echo $row['id'];

?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <td><?php echo $row['uname'];?></td>
      <td><pre>Password encryped</pre></td>
      <!-- if needed to print password in admin use bottom line-->
      <!-- <td> use php echo $row['pwd']; for getting encryptd password in table</td> -->
      <td>
          <!-- <a href="deleteadmin.php?unameid=<?php //echo $row['id'] ?>" class="btn btn-danger">Delete</a>  -->
        <!-- we puted the id of uname and pwd in link trough get function and now can be used to delete the row or exesting dara through website request is send through url request tthrough get function of php  -->
&nbsp;
        <!-- <a class="btn btn-success" href="registeradmin.php">New user</a></td> -->
    </tr>

    <!-- this closing brackets are of above while and for loops so that the complete table should work in loop -->
<?php
        }
    }
?>
  </tbody>
</table>

<!-- Table end -->