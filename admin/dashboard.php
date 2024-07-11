
<?php include 'dashboard-sidebar.php';?>
	  <!-- Dashboard Main --->
    <style type="text/css">
	.panel-body{
		min-height: 15px;
		text-align: center;
   		font-size: 20px; 
	}
</style>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>

<!-- Main Dashboard -->
<div class="row"> <!-- row 1 -->
<div class="col-md-3">
	<div class="panel panel-default">
		<div class="panel-heading">
    <div class="well well-sm text-center bg-dark py-2 text-light fw-bold">
			Books in Library
		</div>
    </div>
		<div class="panel-body" style="color:cyan">
    <span class="content-box-icon text-center text-dark"> <i class="fas fa-users"></i></span>
    <?php
                  require '../includes/config.php';
                   echo $conn->query("SELECT * FROM tblbook")->num_rows;
                    ?>
		</div>
<div class="panel-footer py-3 bg-dark"></div>
	</div>
</div>
 
<div class="col-md-3">
	<div class="panel panel-primary">
		<div class="panel-heading">
    <div class="well well-sm text-center bg-dark py-2 text-light fw-bold">
		Library	Category
		</div>
		<div class="panel-body" style="color:darkblue">
    <span class="content-box-icon text-dark"> <i class="fas fa-book"></i></span>
    <?php 
                   require '../includes/config.php';
                   echo $conn->query("SELECT * FROM tblbookcategory")->num_rows; ?>
				   </div>
           <div class="panel-footer py-3 bg-dark"></div>
		</div>
	</div>
</div>
<div class="col-md-3">
	<div class="panel panel-primary">
		<div class="panel-heading">
    <div class="well well-sm text-center bg-dark py-2 text-light fw-bold">
			Students
      </div>
		</div>
		<div class="panel-body" style="color:green">
    <span class="content-box-icon text-center"> <i class="fas fa-users text-dark"></i></span>
	  <?php
                  require '../includes/config.php';
                   echo $conn->query("SELECT * FROM tblstudent")->num_rows;
                    ?>
		</div>
    <div class="panel-footer py-3 bg-dark"></div>
	</div>
</div>  


<div class="col-md-3">
	<div class="panel panel-primary">
		<div class="panel-heading">
    <div class="well well-sm text-center bg-dark py-2 text-light fw-bold">
			Books Borrowed
		</div>
    </div>
		<div class="panel-body" style="color:red">
    <span class="content-box-icon text-center text-dark"> <i class="fas fa-th-list"></i></span>
    <?php 
                    require '../includes/config.php';
                    echo $conn->query("SELECT * FROM tblborrowing")->num_rows;
                     ?>
		</div>
    <div class="panel-footer py-3 bg-dark"></div>
	</div>
</div> <!-- col end -->

</div> <!-- row 1 ends -->

<div class="row my-3"> <!-- row 2 starts -->
<div class="col-md-3">
	<div class="panel panel-default">
		<div class="panel-heading">
    <div class="well well-sm text-center bg-dark py-2 text-light fw-bold">
			Books Returned
		</div>
    </div>
		<div class="panel-body" style="color:cyan">
    <span class="content-box-icon text-center text-dark"> <i class="fas fa-users"></i></span>
    <?php
                  require '../includes/config.php';
                   echo $conn->query("SELECT * FROM tblbookreturn")->num_rows;
                    ?>
		</div>
<div class="panel-footer py-3 bg-dark"></div>
	</div>
</div>
 
<div class="col-md-3">
	<div class="panel panel-primary">
		<div class="panel-heading">
    <div class="well well-sm text-center bg-dark py-2 text-light fw-bold">
Book Query
		</div>
		<div class="panel-body" style="color:darkblue">
    <span class="content-box-icon text-dark"> <i class="fas fa-book"></i></span>
    <?php 
                   require '../includes/config.php';
                   echo $conn->query("SELECT * FROM tblbookcategory")->num_rows; ?>
				   </div>
           <div class="panel-footer py-3 bg-dark"></div>
		</div>
	</div>
</div>
<div class="col-md-3">
	<div class="panel panel-primary">
		<div class="panel-heading">
    <div class="well well-sm text-center bg-dark py-2 text-light fw-bold">
			Message Board
      </div>
		</div>
		<div class="panel-body" style="color:green">
    <span class="content-box-icon text-center"> <i class="fas fa-comment text-dark"></i></span>
	  <?php
                  require '../includes/config.php';
                   echo $conn->query("SELECT * FROM tblstudent")->num_rows;
                    ?>
		</div>
    <div class="panel-footer py-3 bg-dark"></div>
	</div>
</div>  


<div class="col-md-3">
	<div class="panel panel-primary">
		<div class="panel-heading">
    <div class="well well-sm text-center bg-dark py-2 text-light fw-bold">
			Reports Summary
		</div>
    </div>
		<div class="panel-body" style="color:red">
    <span class="content-box-icon text-center text-dark"> <i class="fas fa-th-list"></i></span>
    <?php 
                    require '../includes/config.php';
                    echo $conn->query("SELECT * FROM tblborrowing")->num_rows;
                     ?>
		</div>
    <div class="panel-footer py-3 bg-dark"></div>
	</div>
</div> <!-- col end -->

</div> <!-- row 2 ends -->

      </div>
    </main>
  </div>
</div>


<?php include 'dashboard-footer.php';?>
  

