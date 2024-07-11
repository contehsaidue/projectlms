<?php include 'dashboard-sidebar.php';?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h2 fst-italic fw-bold">Students
             <img src="../assets/LMS Icons/2.png" width="40" height="32"></h4>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-success fw-bold fst-italic" data-bs-toggle="modal" data-bs-target="#modaluserreg">Add Student <i class="fas fa-users"></i></button>
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
              <th>No.</th>
              <th>Image</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Program</th>
              <th>Certificate Type</th>
              <th>Phone</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="text-center">
          <?php
              $i = 1; // loops iteration in table numbering
            include '../includes/config.php';
            $datashowquery = "SELECT * FROM tblstudent JOIN tblcertificate
             ON tblstudent.certificatetype = tblcertificate.certificateid";
            $datashowqueryrun = mysqli_query($conn,  $datashowquery);
            $datashowqueryrowcount = mysqli_num_rows($datashowqueryrun);
            if( $datashowqueryrowcount > 0){
                while($row = mysqli_fetch_assoc($datashowqueryrun)){
                    $i;
            
            ?>
            <tr>
              <td><?php echo $i++;?></td>
              <td><img src="../<?php echo $row['image'];?>" width="42" height="42" class="rounded me-2"></td>
              <td><?php echo $row['fname'];?></td>
              <td><?php echo $row['lname'];?></td>
              <td><?php echo $row['program'];?></td>
              <td><?php echo $row['certificate_name'];?></td>
              <td><?php echo $row['phone'];?></td>
              <td>
                <a class="btn btn-danger btn-sm" href="controller.php?removestudent=<?php echo $row['stud_ID'];?>"  onclick="return confirm('Do you want to remove this student?')";> <i class="fas fa-trash"></i></a>
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
  

<!-- Student Registration Modal -->
<div class="modal fade" id="modaluserreg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title"> 
    <img src="../assets/LMS Icons/225932.png" width="40" height="32"> Student Registration Portal</h5>
      </div>
      <!-- Modal Body -->
      <form action="controller.php" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
      <div class="row"> <!-- row starts -->
          <div class="col-md-6"> <!-- column 1 starts -->
          <div class="form-group mb-3">
            <input type="text" class="form-control" name="fname" placeholder="First Name" required>
          </div>
         <div class="form-group mb-3">
            <input type="text" class="form-control" name="lname" placeholder="Last Name" required>
          </div>
          <div class="form-group mb-3">
          <select name="gender"  class="form-select" required>
          <option selected>Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          </select>
          </div>
          <div class="form-group mb-3">
          <input type="text" class="form-control" name="studentage" placeholder="Age" required>
          </div>
          <div class="form-group mb-3">
          <input type="text" class="form-control" name="studentid" placeholder="Student ID" required>
          </div>
          <div class="form-group mb-3">
          <input type="text" class="form-control" name="program" placeholder="Program" required>
          </div>
          </div> <!-- column 1 ends -->

          <div class="col-md-6"> <!-- column 2 starts -->
          <div class="form-group mb-3">
          <select name="certificatetype" class="form-select" required>
          <option selected>Certificate Type</option>
         <?php
         include 'includes/config.php';
         $datashowquery = "SELECT * FROM tblcertificate";
         $datashowqueryrun = mysqli_query($conn,  $datashowquery);
         $datashowqueryrowcount = mysqli_num_rows($datashowqueryrun);
         if( $datashowqueryrowcount > 0){
             while($row = mysqli_fetch_assoc($datashowqueryrun)){
         ?>
            <option value="<?php echo $row['certificateid'];?>"><?php echo $row['certificate_name'];?></option>
            <?php
             }
         }?>
          </select>
          </div>
          <div class="form-group mb-3">
            <input type="tel" class="form-control" name="contact_no" placeholder="Phone" required>
          </div>
          <div class="form-group mb-3">
            <input type="email" class="form-control" name="student_email" placeholder="Email" required>
          </div>
         <div class="form-group mb-3">
            <input type="password" class="form-control" name="student_pass" placeholder="Password">
          </div>
        <div class="form-group mb-3">
            <input type="file" class="form-control" name="student_image" required>
          </div>
          </div> <!-- column 2 ends -->
      </div> <!--row ends --->

      </div>
      <div class="modal-footer">
        <button class="btn btn-success btn-sm fw-bold" type="submit" name="studentregister">Add Student <i class="fas fa-users"></i> </button>
        <button type="button" class="btn btn-danger btn-sm fw-bold" data-bs-dismiss="modal">Close</button>
      </div>
</form>

    </div>
  </div>
</div>