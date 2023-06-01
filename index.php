<?php

include 'header.php';
include 'ft.php';
?>
<meta charset="UTF-8">
<meta name="description"
  content="Download Your Favourite Movie with CROSS CINEMA with Dual Audio and High Defination with One click and 'No pop-up Ads' ">
<meta name="keywords"
  content="movie,crosscinema,movies,hd movies,download movies,hindi movies,latest movies,tamil movies,hindi dubbed movies,dual audio movies">
<meta name="author" content="Talib Khan">
<div class="content container">
  <div class="row">


    <?php

    $query = "SELECT * FROM movie";
    $run = mysqli_query($con, $query);
    if ($run) {

      while ($row = mysqli_fetch_assoc($run)) {
        ?>

        <div class="col my-3">
          <div class="card" style="width: 18rem;text-align: center;">
            <img class="card-img-top" height="300px" width="100px" src="thumb/<?php echo $row['img']; ?>"
              alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">
                <?php echo $row['mv_name']; ?>
              </h5>
              <p class="card-text">
                <?php echo $row['director'] . "<br>" . $row['date']; ?>
              </p>
              <?php
              // include 'down.php'
              $id = $row['mv_id'];
              $cal = (($id * 123456789 * 54321) / 956783);
              $url_download = "download.php?id=" . urlencode(base64_encode($cal));
              ?>
              <a href="<?php echo $url_download; ?>" class="btn" style="background-color:#726297; color: #fff;">Download</a>
            </div>
          </div>
        </div>

        <?php

      }

    }

    ?>
  </div>
</div>