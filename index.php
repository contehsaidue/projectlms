<?php include 'includes/header.php';?>

<main class="container">
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

  <div class="bg-light p-1 mt-3 rounded">
    <h4 class="text-center text-uppercase bg-success rounded text-white py-3 fw-bold">Library Management System
      <span> <img src="assets/LMS Icons/225932.png" width="32" height="30"></span>
    </h4>
    <p class="lead fst-italic text-center fw-bold">easy read every where you go..</p>
  </div>
 
     <div class="row py-3">
<div class="col-md-8">
  <div id="carouselExampleCaptions" class="carousel slide mb-5 rounded" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets/bookcovers/course-3.jpg" alt="">

        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item">
      <img src="assets/LMS Icons/4.png" alt="">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/bookcovers/course-1.jpg" alt="">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
</div>
</div>
<div class="col-md-4">
<!-- Most borrowed book-->
<div class="card">
  <!-- Book Image -->
<img src="assets/bookcovers/course-1.jpg" class="card-img-top"  alt="">
<div class="card-body">
<!-- Book Details -->
<div class="text-center">
<h4 class="fw-bold">PHP - Courseware</h4>
<h6 class="fw-bold">SE - Conteh</h6>
<p class="btn btn-sm btn-dark fw-bold">Technology</p>

<div class="btn-block">
 <a class="btn btn-success btn-sm mb-2 fw-bold" href="">Borrow Book<i class="fas fa-shopping-cart text-white"></i></a>
</div>
</div>
     </div>
     </div>
     </div>
     <!-- end carousel-->

       <!-- book category-->
<section>
  <div class="row">
<div class="col-md-3 d-md-block d-none">
  <div class="list-group">
    <div class="btn-group  mb-2">
        <button class="btn btn-primary btn-md"> <i class="fas fa-building"></i></button>
        <button class="btn btn-success btn-md text-uppercase fw-bold"> Book Categories</button>
   </div>
   <?php
            include 'includes/config.php';
            $datashowquery = "SELECT * FROM tblbookcategory";
            $datashowqueryrun = mysqli_query($conn, $datashowquery);
            $datashowqueryrowcount = mysqli_num_rows($datashowqueryrun);
            if( $datashowqueryrowcount > 0){
                while($row = mysqli_fetch_assoc($datashowqueryrun)){ ?>

    <a href="index.php?getproductcategory=" class="list-group-item">
    <?php echo $row['bookcatname'];?></a>
    <?php
      }
  }?>
    </div>
    </div>
  
<div class="col-md-9">
 <div class="row">
 <?php
            include 'includes/config.php';
            $datashowquery = "SELECT * FROM tblbook 
            JOIN tblbookcategory ON  tblbookcategory.bookcatid = tblbook.bookcategoryid
            JOIN tblbookstatus ON tblbookstatus.bookstatusid = tblbook.bookstatusid";
            $datashowqueryrun = mysqli_query($conn,  $datashowquery);
            $datashowqueryrowcount = mysqli_num_rows($datashowqueryrun);
            if( $datashowqueryrowcount > 0){
                while($row = mysqli_fetch_assoc($datashowqueryrun)){ ?>

<div class="col-md-4">
  <div class="card">
    <!-- Book Image -->
  <img src="../<?php echo $row['bookcover'];?>" class="card-img-top"  alt="">
  <div class="card-body">
  <!-- Book Details -->
  <div class="text-center">
  <h4 class="fw-bold"><?php echo $row['booktitle'];?></h4>
  <h6 class="fw-bold"><?php echo $row['bookauthor'];?></h6>
  <p class="btn btn-sm btn-dark fw-bold"><?php echo $row['bookcatname'];?></p>
  <form action="index.php" method="POST">
    <input type="hidden" name="bookid" value="<?php echo $row['bookid'];?>">
    <input type="hidden" name="cover" value="<?php echo $row['bookcover'];?>">
    <input type="hidden" name="title" value="<?php echo $row['booktitle'];?>">
    <input type="hidden" name="author" value="<?php echo $row['bookauthor'];?>">
    <input type="hidden" name="bookcategory" value="<?php echo $row['bookcatname'];?>">
    <input type="hidden" name="bookstatus" value="<?php echo $row['bookstatusname'];?>">
  <div class="btn-block">
   <button class="btn btn-success btn-sm mb-2 fw-bold" name=addtobooklist>Borrow Book <i class="fas fa-book text-white"></i></button>
  </div>
  </form>
  </div>
       </div>
       </div>
       </div>
<?php
    }
  }?>

</div>
 </div>

  </div>
</section>
</main>

<?php include 'includes/footer.php';?>
<!-- Modals -->

<!-- Admin Registration Modal -->
<div class="modal fade" id="modaladminreg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title"> 
    <img src="assets/LMS Icons/225932.png" width="40" height="32"> Admin Registration Portal</h5>
      </div>
      <!-- Modal Body -->
      <form action="admin/controller.php" method="POST" enctype="multipart/form-data">
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
          <input type="text" class="form-control" name="age" placeholder="Age" required>
          </div>
          </div> <!-- column 1 ends -->

        

          <div class="col-md-6"> <!-- column 2 starts -->
          <div class="form-group mb-3">
            <input type="tel" class="form-control" name="contact_no" placeholder="Phone" required>
          </div>
          <div class="form-group mb-3">
            <input type="email" class="form-control" name="user_email" placeholder="User Email" required>
          </div>
         <div class="form-group mb-3">
            <input type="password" class="form-control" name="user_pass" placeholder="Password">
          </div>
        <div class="form-group mb-3">
            <input type="file" class="form-control" name="user_image" required>
          </div>
          </div> <!-- column 2 ends -->
      </div> <!--row ends --->

      </div>
      <div class="modal-footer">
        <button class="btn btn-success btn-sm fw-bold" type="submit" name="adminregister">Admin Register</button>
        <button type="button" class="btn btn-danger btn-sm fw-bold" data-bs-dismiss="modal">Close</button>
      </div>
</form>

    </div>
  </div>
</div>


<!-- Admin Login Modal -->
<div class="modal fade" id="modaladminlogin">
<div class="modal-dialog modal-sm">
<div class="modal-content">
<div class="modal-header">
  <h5 class="modal-title">Admin Login Portal</h5>
</div>
<form action="admin/controller.php" method="POST">
<div class="modal-body text-center">
<img src="assets/LMS Icons/225932.png" width="40"  height="57">
 <div class="form-group mb-3">
      <input type="email" class="form-control" name="user_email" placeholder="name@mail.com">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" name="user_pass" placeholder="Password">
    </div>

</div>
<div class="modal-footer">
  <button class="btn btn-success btn-sm fw-bold" type="submit"  name="adminlogin">Login</button>
  <button type="button" class="btn btn-danger btn-sm fw-bold" data-bs-dismiss="modal">Close</button>
</div>
</form>
</div>
</div>
</div>


<!-- Admin Login Modal -->
<div class="modal fade" id="modaluserlogin">
<div class="modal-dialog modal-sm">
<div class="modal-content">
<div class="modal-header">
  <h5 class="modal-title">Student Login Portal</h5>
</div>
<form action="student/controller.php" method="POST">
<div class="modal-body text-center">
<img src="assets/LMS Icons/225932.png" width="40"  height="57">
 <div class="form-group mb-3">
      <input type="text" class="form-control" name="studentid" placeholder="Student ID">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" name="student_pass" placeholder="Password">
    </div>

</div>
<div class="modal-footer">
  <button class="btn btn-success btn-sm fw-bold" type="submit"  name="studentlogin">Login</button>
  <button type="button" class="btn btn-danger btn-sm fw-bold" data-bs-dismiss="modal">Close</button>
</div>
</form>
</div>
</div>
</div>


<!-- Student Registration Modal -->
<div class="modal fade" id="modaluserreg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title"> 
    <img src="assets/LMS Icons/225932.png" width="40" height="32"> Student Registration Portal</h5>
      </div>
      <!-- Modal Body -->
      <form action="student/controller.php" method="POST" enctype="multipart/form-data">
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
        <button class="btn btn-success btn-sm fw-bold" type="submit" name="studentregister">Student Register</button>
        <button type="button" class="btn btn-danger btn-sm fw-bold" data-bs-dismiss="modal">Close</button>
      </div>
</form>

    </div>
  </div>
</div>