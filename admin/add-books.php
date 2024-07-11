<?php include 'dashboard-sidebar.php';?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h2 fst-italic fw-bold">Books Shelf
             <img src="../assets/LMS Icons/2.png" width="40" height="32"></h4>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-success fw-bold fst-italic" data-bs-toggle="modal" data-bs-target="#addbookmodal">Add New Book <i class="fas fa-file"></i></button>
          </div>
        </div>
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
              <th>Category</th>
              <th>Status</th>
              <th>Publisher</th>
              <th>Date Added</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="text-center">
          <?php
              $i = 1; // loops iteration in table numbering
            include '../includes/config.php';
            $datashowquery = "SELECT * FROM tblbook 
            JOIN tblbookcategory ON  tblbookcategory.bookcatid = tblbook.bookcategoryid
            JOIN tblbookstatus ON tblbookstatus.bookstatusid = tblbook.bookstatusid";
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
              <td><?php echo $row['bookcatname'];?></td>
              <td><?php echo $row['bookstatusname'];?></td>
              <td><?php echo $row['bookpublisher'];?></td>
              <td><?php echo $row['bookdateadded'];?></td>
              <td>
                <a class="btn btn-dark btn-sm" href="edit-books.php?editbook=<?php echo $row['bookid'];?>"> <i class="fas fa-marker"></i></a>
                <a class="btn btn-danger btn-sm" href="controller.php?removebook=<?php echo $row['bookid'];?>"  onclick="return confirm('Do you want to remove this book from shelf?')";> <i class="fas fa-trash"></i></a>
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
  


  <!-- User add book modal-->

  <div class="modal fade" id="addbookmodal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold">    
    <img src="../assets/LMS Icons/225932.png" width="40" height="32"> Add book</h5>
</div>
 <form action="controller.php" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
      <div class="row"> <!-- row starts -->
          <div class="col-md-6"> <!-- column 1 starts -->
          <div class="form-group mb-3">
            <input type="file" class="form-control" name="cover" required>
          </div>
          <div class="form-group mb-3">
            <input type="text" class="form-control" name="title" placeholder="Book Title" required>
          </div>
         <div class="form-group mb-3">
            <input type="text" class="form-control" name="author" placeholder="Book Author" required>
          </div>
          </div> <!-- column 1 ends -->

          <div class="col-md-6"> <!-- column 2 starts -->
          <div class="form-group mb-3">
          <select name="bookcategory"  class="form-select" required>
          <option selected>Book Category</option>
         <?php
         include '../includes/config.php';
         $datashowquery = "SELECT * FROM tblbookcategory";
         $datashowqueryrun = mysqli_query($conn,  $datashowquery);
         $datashowqueryrowcount = mysqli_num_rows($datashowqueryrun);
         if( $datashowqueryrowcount > 0){
             while($row = mysqli_fetch_assoc($datashowqueryrun)){
         ?>
            <option value="<?php echo $row['bookcatid'];?>"><?php echo $row['bookcatname'];?></option>
            <?php
             }
         }?>
          </select>
          </div>

          <div class="form-group mb-3">
          <select name="bookstatus"  class="form-select" required>
          <option selected>Book Status</option>
         <?php
         include '../includes/config.php';
         $datashowquery = "SELECT * FROM tblbookstatus";
         $datashowqueryrun = mysqli_query($conn,  $datashowquery);
         $datashowqueryrowcount = mysqli_num_rows($datashowqueryrun);
         if( $datashowqueryrowcount > 0){
             while($row = mysqli_fetch_assoc($datashowqueryrun)){
         ?>
            <option value="<?php echo $row['bookstatusid'];?>"><?php echo $row['bookstatusname'];?></option>
            <?php
             }
         }?>
          </select>
          </div>
      
          <div class="form-group mb-3">
            <input type="text" class="form-control" name="bookpublisher" placeholder="Book Publisher" required>
          </div>
          </div> <!-- column 2 ends -->
      </div> <!--row ends --->

      </div>
 <div class="modal-footer">
 <button class="btn btn-success btn-sm fw-bold fst-italic" name="adminaddbook">Add Book <i class="fas fa-scroll"></i></button>
 <button type="button" class="btn btn-sm btn-danger fw-bold" data-bs-dismiss="modal">Close</button>
 </div>
 </form>
 </div>
 </div>
 </div>