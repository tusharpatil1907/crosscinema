<?php
include 'db.php';
// unameid came from adminlist.php line 42 anchor tag of tablerow
$id = $_GET['unameid'];

// deleting from database whose id matches the database id that we get through line no 4.
$query="DELETE FROM admin WHERE id =$id";
$run = mysqli_query($con,$query);
if($run){
    echo "<script>alert('Admin has been deleted; '); window.location.href='adminlist.php';</script>";
}
else{
    echo "<script>alert('something wrong.... '); window.location.href='adminlist.php';</script>";
}
?>