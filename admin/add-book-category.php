<?php include 'dashboard-sidebar.php';?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h2 fst-italic fw-bold">Books Category
             <img src="../assets/LMS Icons/3.png" width="40" height="32"></h4>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-success fw-bold fst-italic" data-bs-toggle="modal" data-bs-target="#addcategorymodal">Add Book Category <i class="fas fa-th-list"></i> </button>
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
              <th>Category Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php
              $i = 1; // loops iteration in table numbering
            include '../includes/config.php';
            $datashowquery = "SELECT * FROM tblbookcategory";
            $datashowqueryrun = mysqli_query($conn,  $datashowquery);
            $datashowqueryrowcount = mysqli_num_rows($datashowqueryrun);
            if( $datashowqueryrowcount > 0){
                while($row = mysqli_fetch_assoc($datashowqueryrun)){
                    $i;
            
            ?>
            <tr>
              <td><?php echo $i++;?></td>
              <td><?php echo $row['bookcatname'];?></td>
              <td><a class="btn btn-sm btn-danger" href="controller.php?removecategory=<?php echo $row['bookcatid'];?>"  onclick="return confirm('Do you want to remove this book category?')";><i class="fas fa-trash"></i></a></td>
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

  <div class="modal fade" id="addcategorymodal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold">    
    <img src="../assets/LMS Icons/225932.png" width="40" height="32"> Add book Category</h5>     
 </div>
 <form action="controller.php" method="POST">
 <div class="modal-body">
<div class="form-group mb-3">
    <input type="text" class="form-control fst-italic" placeholder="Enter Category name" name="bookcatname">
</div>
 
 </div>
 <div class="modal-footer">
 <button class="btn btn-success btn-sm fw-bold fst-italic" name="addbookcategory">Add Category <i class="fas fa-th-list"></i> </button>
 <button type="button" class="btn btn-sm btn-danger fw-bold" data-bs-dismiss="modal">Close</button>
 </div>
 </form>
 </div>
 </div>
 </div>