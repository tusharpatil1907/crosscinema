<!-- view complete details of movies (movie portfolio) -->
<?php 
    include 'db.php';
include 'header.php';
include 'ft.php';

    if(isset($_GET['id'])){
        $id=$_GET['id'];




// to print the data description on the existing page wto view all uploaded data without opening database.
        $query= "SELECT * FROM movie where mv_id=$id";
        $run= mysqli_query($con,$query);

        if($run){
            while($row=mysqli_fetch_assoc($run)){
                // echo $row['mv_name'];
                // echo $row['meta_description'];
                ?>
                <br>
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <?php echo "<img  class='w-100' style='border:2px solid' src='../thumb/".$row['img']."'>"; ?>
                        <video controls src="../movie/<?php echo $row['vid']  ?>"></video>
                    </div>
                    <div class="col-6" style="">

                        <h1 class="text-center"><?php echo $row['mv_name']; ?></h1>
                        <p class="ml-4"><?php echo $row['mv_des']; ?></p>
                        <div  class="date " style="background-color=#bbbb">
                            <pre class="ml-4"><?php echo $row['date']; ?></pre>
                                <p class="ml-4"><span style="font-size: medium; font-weight: bolder;">Directed by: </span><?php echo $row['director']; ?></p>
                            <p class="ml-4"><span style="font-size: medium; font-weight: bolder;">Language type:</span> <?php echo $row['lang']; ?></p>
                        </div>
                    </div>
                </div>
                <div class=m-3 class="">
                    <div class="">
                        <a class="btn btn-primary" href="<?php echo $row['link1']?>"> Download 1</a>
                        <a class="btn btn-success" href="<?php echo $row['link2']?>"> Download 2</a>
                        
                    </div>
                <p class="" style=""><?php echo $row['meta_description']; ?></p>
                </div>
                <div class="jumbotron h-50" >
                    <?php echo $row['mv_tag']; ?>
                </div>
            </div>





            <?php    
            }
        }

    }

?>