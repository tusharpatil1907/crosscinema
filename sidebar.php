 <!-- The sidebar -->
 <div class="sidebar navbar-nav row" >
    <div class="container d-flex justify-content-center">
  
      <form action="search.php" method="post" class="row">
       <input type="text" class="form-control ml-3 col-8" name="search" style=" "placeholder="search movie">
       &nbsp;
       <button name="submit" class="btn btn-outline-danger co-3"><ion-icon name="search" >hello</ion-icon></button>
      </form>
    </div>

    <div class="container" id=lp>
      <div>
        <div class="ml-4 lettet-post" id="h">
          <h5>Lettest posts...</h5>
        </div>
        
        <!-- <div class="" > -->
        <?php
        $query0 = "SELECT * FROM movie ORDER BY mv_name DESC limit 5";
        $run = mysqli_query($con, $query0);
            if($run){
          while($row0=mysqli_fetch_assoc($run)){
            ?>
          <ul>
            <li>
             <a href="#" id='a'class="nav
            -link"> <?php  echo $row0['mv_name']?></a>
            </li>
          </ul>
          <?php
         }
         }
         ?>

        </div>
      </div>
      <div class="ads">
        ad
      </div>
    </div>
    
  </div>
  <!-- <div class="main-body  col-9">
  
    
  </div> -->
</div>
