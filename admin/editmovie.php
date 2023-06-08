<?php

include 'db.php';
include 'header.php';
include 'ft.php';

?>

<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM movie WHERE mv_id=$id";
  $run = mysqli_query($con, $query);
  if ($run) {
    while ($row = mysqli_fetch_assoc($run)) {


      ?>





      <div class="container">
        <div class="jumbotron">

          <form action="movielist.php" method="post" enctype="multipart/form-data">
            <h1>

              <?php echo "Change details For:-", $row['mv_name']; ?>
            </h1>
            <div class="form-group">
              <input type="text" name="mv_name" class="form-control" placeholder="Enter Movie Name" value=<?php echo $row['mv_name']; ?>>
            </div>
            <div class="form-group">

              <input type="text" name="mv_m_desc" class="form-control" placeholder="Enter meta description" value=<?php echo $row['meta_description']; ?>>
            </div>
            <div class="form-group">

              <input type="text" name="mv_m_tag" class="form-control" placeholder="Enter Meta Tags" value=<?php echo $row['mv_tag']; ?>>
            </div>
            <div class="form-group">

              <input type="text" name="mv_link1" class="form-control" placeholder="Enter Link 1" value=<?php echo $row['link1']; ?>>
            </div>
            <div class="form-group">

              <input type="text" name="mv_link2" class="form-control" placeholder="Enter Link 2" value=<?php echo $row['link2']; ?>>
            </div>
            <div class="form-group">

              <input type="date" name="mv_date" class="form-control" placeholder="Enter Date" value=<?php echo $row['date']; ?>>
            </div>
            <div class="form-group">

              <input type="text" name="mv_lang" class="form-control" placeholder="Enter Movie Language" value=<?php echo $row['lang']; ?>>
            </div>
            <div class="form-group">

              <input type="text" name="mv_director" class="form-control" placeholder="Enter Movie Director" value=<?php echo $row['director']; ?>>
            </div>
            <div class="form-group">

              <input type="text" name="cat_id" class="form-control" placeholder="Enter Category ID" value=<?php echo $row['cat_id']; ?>>
            </div>
            <div class="form-group">

              <input type="text" name="genre_id" class="form-control" placeholder="Enter Genre ID" value=<?php echo $row['genre_id']; ?>>
            </div>

            <div class="custom-file">
              <label for="">enter image</label>
              <input type="file" name="img" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            <label for="">enter video</label>
            <div class="custom-file">
              <input type="file" name="vid" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Choose file</label>

              <!-- image hidden. -->
              <img src="<?php echo '../thumb/' . $row['img']; ?> " height="100px" alt="">

              <!-- image old hiden -->

              <input type=" hidden" value=" <?php echo $row['img']; ?>" name="old_img">
            </div>
            <br>
            <br>
            <div class="form-group">
              <input type="text" name="mv_desc" class="form-control" placeholder="Enter Movie description" rows="4"
                value=" <?php echo $row['mv_des']; ?> ">

            </div>


            <button type="submit" name="submit" class="btn btn-info btn-lg">Submit</button>
          </form>
        </div>
      </div>

      <?php

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
        $target = "../thumb/" . basename($_FILES['img']['name']);
        $target2 = "../thumb/" . basename($_FILES['vid']['name']);
        $newimg = $_FILES['img']['name'];
        $newimg = $_FILES['img']['name'];
        $newvid = $_FILES['vid']['name'];
        $old_img = $_POST['old_img'];
        // $old_vid= $_POST['old_vid'];

        if ($newimg != '') {
          // if ($newvid != '') {
          $update_filename = $newimg;
          // $vidname=$newvid;
          
        } else {
          
          $update_filename = $old_img;

        }
        if ($_FILES['img']['name'] != '') {
          // if ($_FILE['vid']['name'] != '') {
              if (file_exists("../thumb/" . $newimg )) {
                // if (file_exists("../thumb/" . $newvid )) {
            $filename = $newimg;
            echo "<script>alert('Image already added try another :)'   ); window.location.href='movielist.php'</script>";
          
        
      }
        } else {
          // $query1 = " UPDATE `movie` SET `cat_id`=$cat_id,`genre_id`=$genre_id,`mv_name`='$mv_name',`mv_des`='$mv_desc',`mv_tag`='$mv_m_tag',`link1`='$mv_link1',`link2`='$mv_link2',`img`='$update_filename',`date`='$mv_date',`lang`='$mv_lang',`director`='mv_director',`meta_description`='$mv_m_desc' id=$id";

          $query1 = " UPDATE `movie` SET `cat_id`=$cat_id,`genre_id`=$genre_id,`mv_name`='$mv_name',`mv_des`='$mv_desc',`mv_tag`='$mv_m_tag',`link1`='$mv_link1',`link2`='$mv_link2',`img`='$update_filename',`date`='$mv_date',`lang`='$mv_lang',`director`='$mv_director',`meta_description`='$mv_m_desc',`vid`='$newvid' WHERE mv_id = $id ";

          $qr = mysqli_query($con, $query1);
          if ($qr) {
            if ($newimg != '') {
              if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
                if (move_uploaded_file($_FILES['video']['tmp_name'], $target2)) {
                  echo "<script>alert('Movie Successfully updated.. :)');window.location.href='movielist.php';</script>";
                }
              } else {
                echo "<script>alert('Something Went Wrong!!.. :(');window.location.href='editmovie.php';</script>";
              }
            }
          }
        }


      }


      ?>









      <?php






      // // to validate that image is same or not if there is nothing new then it will not change the old image
      // if($newimg !=''){
      //                 $update_filename = $newimg;

      // }
      // else{
      //                 $update_filename = $old_img;
      // }




      // if (file_exists("../thumb/".$newimg)) {
      //     $filname = $newimg;

      //     echo "<script>alert('Image Already Added.. :)');window.location.href='updatemovie.php';</script>";


      //   }


      //   else{
      //     $query1 = " UPDATE `movie` SET `cat_id`=$cat_id,`genre_id`=$genre_id,`mv_name`='$mv_name',`mv_des`='$mv_desc',`mv_tag`='$mv_m_tag',`link1`='$mv_link1',`link2`='$mv_link2',`img`='$update_filename',`date`='$mv_date',`lang`='$mv_lang',`director`='$mv_director',`meta_description`='$mv_m_desc' WHERE id = $id ";
      //     $qr = mysqli_query($con,$query1);
      //     if ($qr) {
      //         if ($_FILES['img']['name'] !='') {
      //         if (move_uploaded_file($_FILES['img']['tmp_name'], "../thumb/".$_FILES['img']['name'])) {
      //           echo "<script>alert('Movie Succesfully Updated');window.location.href='movielist.php';</script>";

      // }
      // else{
      //      echo "<script>alert('Something Went Wrong!!.. :(');window.location.href='addmovie.php';</script>";
      //    }
      // }
      // }

      // }
      // }
      //    ?>


      <?php
    }
  }

} else {
  echo '<script>alert("something wrong")</script>';
  // header('location:movielist.php');
}

?>