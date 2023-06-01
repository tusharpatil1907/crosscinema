<?php

include 'db.php';
include 'header.php';
include 'ft.php';
if(isset($_GET['id'])){

    $id = $_GET['id'];
    
    // deleting from database whose id matches the database id that we get id.
    $query="DELETE FROM genre WHERE id =$id";
    $run = mysqli_query($con,$query);
    if($run){
        echo "<script>alert('Genre has been deleted; '); window.location.href='genrelist.php';</script>";
    }
    else{
        echo "<script>alert('something wrong.... '); window.location.href='genrelist.php';</script>";
    }
}
else{
    header('location:genrelist.php');
}

?>

