<?php include 'dashboard-sidebar.php';?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h2 fst-italic fw-bold">My Book Shelf
             <img src="../assets/LMS Icons/2.png" width="40" height="32"></h4>
      </div>
<!-- Feedback Message -->
<?php 
                    if(isset($_SESSION['status']) && ($_SESSION['type'] == "success"))
                    {
                        ?>
                            <div class="alert alert-success alert-dismissible fade show fw-bold fst-italic mt-3" role="alert">
                            <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                         unset($_SESSION['status']);
                    }else if (isset($_SESSION['status']) && ($_SESSION['type'] == "error")){
                        
                    ?>
                    
                    <div class="alert alert-danger alert-dismissible fade show fw-bold fst-italic" role="alert">
                            <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                    <?php
                         unset($_SESSION['status']);
                    }     
                ?>

      <table class="table table-striped table-bordered table-hover table-responsive" style="font-size:12px" cellspacing="0">
          <thead class="text-center">
            <tr>
              <th>#</th>
              <th>Cover</th>
              <th>Title</th>
              <th>Author</th>
              <th>Publisher</th>
              <th>Date Borrowed</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="text-center">
          <?php
             $userid = $_SESSION['stud_ID'];
              $i = 1; // loops iteration in table numbering
            include '../includes/config.php';
            $datashowquery = "SELECT * FROM tblborrowing 
            JOIN tblbook ON tblbook.bookid = tblborrowing.book_ID 
            WHERE tblborrowing.stud_ID = '$userid'";
            $datashowqueryrun = mysqli_query($conn,  $datashowquery);
            $datashowqueryrowcount = mysqli_num_rows($datashowqueryrun);
            if( $datashowqueryrowcount > 0){
                while($row = mysqli_fetch_assoc($datashowqueryrun)){
                    $i;
            
            ?>
            <tr>
              <td><?php echo $i++;?></td>
              <td><img src="../<?php echo $row['bookcover'];?>" width="42" height="42" class="rounded me-2"></td>
              <td><?php echo $row['booktitle'];?></td>
              <td><?php echo $row['bookauthor'];?></td>
              <td><?php echo $row['bookpublisher'];?></td>
              <td><?php echo $row['date_borrowed'];?></td>
              <td>
              <form action="controller.php" method="POST">
                      <input type="hidden" value="<?php echo $row['bookid'];?>" name="book_ID">
                      <input type="hidden" value="<?php echo $_SESSION['stud_ID'];?>" name="stud_ID">
                <button class="btn btn-success btn-sm fw-bold fst-italic" name="returnbook"> Return <img src="../assets/LMS Icons/2.png" width="35" height="25"></button>
                </form>
              </td>
            </tr>
            <?php
                }
            }?>
           
         
           
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<?php include 'dashboard-footer.php';?>
  