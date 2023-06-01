<title>welcome admin</title>
<?php

include 'db.php';
include 'header.php';
include 'ft.php';
?>

<!-- below code will work if admin tried to acess the page directly from url bar then the else condition will executed -->
<!-- if and id of table row will fetch then only we can edit the row else we will be redirected back to category list   -->
<!-- meance when we click the edit button then only we can go to edit category page otherwise not  
for example  editcategory.php?id=1&forkey=1&catname=Action  without this type of url we cant acess-->


<?php
    if(isset($_GET['id'])){
        // to print in input bax
        $id= $_GET['id'];
        $catname= $_GET['catname'];
        $fk= $_GET['category_id'];

        if(isset($_POST['submit'])){
            // echo $catname;
            $cname=$_POST['category_name'];
            $frky=$_POST['frky'];
            // $pid=$_POST['pid'];

            $query="UPDATE `category` SET `category_id`=$frky,`category_name`='$cname' WHERE 'id'=$id";
            // $query="UPDATE `category` SET `id`=$pid,`category_id`=$frky,`category_name`='$cname' WHERE 'id'=$id";
            $run=mysqli_query($con,$query);

            if($run){
                echo "<script>alert('Category List Updated :) ; '); window.location.href='categorylist.php';</script>";
            }
            else{
                echo "<script>alert('Something wrong..!!'); window.location.href='editcategory.php';</script>";
            }

        }
        
    }
    else{
        header('location:categorylist.php');
    }
    ?>
    <!-- basically we got id through query string above -->
    <!-- just got values and printed on inputs by lines present in if condition -->

<div class="container">
    <div class="head" style="text-align:center; padding:10px 0px 10px 0px"><h1>Edit Category</h1></div>
    <hr>
    <form action="#" method="post">
        <div class="form-row">
            <div class="col-7">
                <small>Category name</small>
<!-- and pasted into inputs by using values -->
                <input type="text" name="categoryname"  class="form-control" value="<?php echo $catname?>" placeholder="Category name">
            </div>
            <div class="col">
            <small>foregin key</small>
                <input type="text" name="frky" class="form-control" value="<?php echo $fk?>" placeholder="foregin key">
            </div>
            <!-- <div class="col">
            <small>Primary ID</small>
                <input type="text" name="pid" class="form-control" value="<?php //echo $id;?>" placeholder="Primary ID">
            </div> -->
        </div>
        <br><br>
            <input type="submit" class="btn btn-outline-success btn-lg">
    </form>
</div>

