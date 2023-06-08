<!-- view complete details of movies (movie portfolio) -->
<style>
    .img {
        /* max-height: 0rem; */
        display: flex;
        justify-content: center;

    }
    img{
        max-width: 500px;
    }
    video{
        border: 4px solid black
    }

</style>
<?php
include 'db.php';
include 'header.php';
include 'ft.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];




    // to print the data description on the existing page wto view all uploaded data without opening database.
    $query = "SELECT * FROM movie where mv_id=$id";
    $run = mysqli_query($con, $query);

    if ($run) {
        while ($row = mysqli_fetch_assoc($run)) {
            // echo $row['mv_name'];
            // echo $row['meta_description'];
            ?>
            <!-- <br> -->
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-6 p-5">
                        <div class="px-5 h5">
                            <h1 class=fw-6>
                                <?php echo $row['mv_name']; ?>
                            </h1>
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
                                <div class="">

                                    <a class="btn btn-primary" href="<?php echo $row['link1'] ?>"> Download 1</a>
                                    <a class="btn btn-success" href="<?php echo $row['link2'] ?>"> Download 2</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 img my-4">
                        <img src="../thumb/<?php echo $row['img'] ?>"  alt="">
                    </div>
                </div>
                <div class="row d-flex justify-content-center my-5">
                    <h1>Stream movie online: </h1>
                    </div>
                <div class="row d-flex justify-content-center ">
                    <div class="justify-content-center ">
                        <video width="500" height="300" class="" controls src="../movie/<?php echo $row['vid'] ?>"><video>
                    </div>
                </div>

            </div>



            <!-- <div class="jumbotron h-50" >
                    tags:<?php //echo $row['mv_tag']; ?>
                </div> -->


            <!-- <div class="col-6">
<?php // echo "<img  class='w-50' style='border:2px solid' src='../thumb/".$row['img']."'>"; ?>
    
</div> -->



            <?php
        }
    }

}

?>