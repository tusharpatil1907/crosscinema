<?php
include 'db.php';
include 'header.php';
include 'ft.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];


    $query="DELETE FROM movie WHERE mv_id =$id";
    $run = mysqli_query($con,$query);

    if($run){
        header('location:movielist.php');
    }
    else{
        echo "<script>alert('something wrong.... '); window.location.href='adminlist.php';</script>";
    }


}
else{
    header('location:movielist.php');
}



?>