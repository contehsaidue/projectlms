<?php include 'dashboard-sidebar.php';
error_reporting(0);
?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h2 fst-italic fw-bold">Books Shelf Edit
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
     <?php
    include '../includes/config.php';
    if(isset($_GET['editbook'])){
        $id = $_GET['editbook'];
    
        $datashowquery = "SELECT * FROM tblbook 
        JOIN tblbookcategory ON  tblbookcategory.bookcatid = tblbook.bookcategoryid
        JOIN tblbookstatus ON tblbookstatus.bookstatusid = tblbook.bookstatusid
         WHERE tblbook.bookid = '$id'";
        $datashowqueryrun = mysqli_query($conn, $datashowquery);
        $row = mysqli_fetch_assoc($datashowqueryrun);
    }
?>
<form action="controller.php" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
      <div class="row"> <!-- row starts -->
          <div class="col-md-6"> <!-- column 1 starts -->
          <input type="hidden"  name="bookid" value="<?php echo $row['bookid'];?>">
          <div class="form-group mb-3">
            <input type="file" class="form-control" name="cover" value="<?php echo $row['bookcover'];?>">
          </div>
          <div class="form-group mb-3">
            <input type="text" class="form-control" name="title" value="<?php echo $row['booktitle'];?>">
          </div>
         <div class="form-group mb-3">
            <input type="text" class="form-control" name="author" value="<?php echo $row['bookauthor'];?>">
          </div>
          </div> <!-- column 1 ends -->

          <div class="col-md-6"> <!-- column 2 starts -->
          <div class="form-group mb-3">
          <select name="bookcategory"  class="form-select">
            <option value="<?php echo $row['bookcatid'];?>"><?php echo $row['bookcatname'];?></option>
        </select>
          </div>

          <div class="form-group mb-3">
          <select name="bookstatus" class="form-select">
            <option value="<?php echo $row['bookstatusid'];?>"><?php echo $row['bookstatusname'];?></option>
          </select>
          </div>
      
          <div class="form-group mb-3">
            <input type="text" class="form-control" name="bookpublisher" value="<?php echo $row['bookpublisher'];?>">
          </div>
          </div> <!-- column 2 ends -->
      </div> <!--row ends --->
      <button class="btn btn-success btn-sm fw-bold fst-italic" name="adminupdatebook">Update Book <i class="fas fa-scroll"></i></button>
        </form>
    </div>
    </main>
  </div>
</div>


<?php include 'dashboard-footer.php';?>
  
