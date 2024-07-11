<?php include 'dashboard-sidebar.php';?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h2 fst-italic fw-bold">Books issued out
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
              <th>Book Cover</th>
              <th>Title</th>
              <th>Student Profile</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Phone</th>
              <th>Date Borrowed</th>
            </tr>
          </thead>
          <tbody class="text-center">
          <?php
             $i = 1; // loops iteration in table numbering
            include '../includes/config.php';
            $datashowquery = "SELECT * FROM tblborrowing
            JOIN tblbook ON tblbook.bookid = tblborrowing.book_ID 
           JOIN tblstudent ON tblstudent.stud_ID = tblborrowing.stud_ID";
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
              <td><img src="../<?php echo $row['image'];?>" width="42" height="42" class="rounded me-2"></td>
              <td><?php echo $row['fname'];?></td>
              <td><?php echo $row['lname'];?></td>
              <td><?php echo $row['phone'];?></td>
              <td><?php echo $row['date_borrowed'];?></td>
              <td>
    
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
  
