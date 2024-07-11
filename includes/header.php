<?php session_start();
// Book list Session handler
 
// To add book to book list
if(isset($_POST['addtobooklist'])){

$_SESSION['booklist'][] = array(
'bookid' => $_POST['bookid'],
'cover' => $_POST['cover'],
'title' => $_POST['title'],
'author' => $_POST['author'],
'bookcategory' => $_POST['bookcategory'],
'bookstatus' => $_POST['bookstatus']

  );
}

// to empty the book list

if(isset($_GET['empty'])){
  unset($_SESSION['booklist']);

}

// to remove a specific book from book list

if(isset($_GET['removebook'])){
  $pid = $_GET['removebook'];
  foreach($_SESSION['booklist'] as $k => $singleitem){
    if($pid == $singleitem['bookid']) {
      unset($_SESSION['booklist'][$k]);

    }
  }
 
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>Library Management System</title>
    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom core CSS -->
    <link href="assets/dist/css/index.css" rel="stylesheet">
    <!-- Fontawesome icons-->
    <script src="assets/dist/js/all.js"></script>

  </head>
  <body>
    
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="assets/LMS Icons/225932.png" width="40" height="32">
      <small class="fw-bold fst-italic d-md-none">Library Management System</small>
            <!-- books counter starts -->
            <button class="btn btn-success btn-sm d-md-none" data-bs-toggle="modal" data-bs-target="#mybooklist">
      <span class="badge pull-right bg-dark">
      <?php
         // Book list counter
if(isset($_SESSION['booklist'])){ 
  echo count($_SESSION['booklist']); 
  }else
   {echo '0';
   } ?>
      </span>

      <img src="assets/LMS Icons/2.png" width="32" height="30">
 </button>
 <!-- books counter ends -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php"> <i class="fas fa-home text-success"></i></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fas fa-blog"></i> Login</a>
          <ul class="dropdown-menu" aria-labelledby="dropdown10">
            <li><h6 class="dropdown-header">Login Panel</h6></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modaluserlogin">Student Login</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modaladminlogin">Admin Login</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-users"></i> Registration</a>
          <ul class="dropdown-menu" aria-labelledby="dropdown10">
            <li><h6 class="dropdown-header">Registration Panel</h6></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modaluserreg">Student Registration</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modaladminreg">Admin Registration</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-th-list"></i> Book Category</a>
          <ul class="dropdown-menu" aria-labelledby="dropdown10">
            <li><h6 class="dropdown-header">Read by Category</h6></li>
            <li><hr class="dropdown-divider"></li>
            <?php
            include 'includes/config.php';
            $datashowquery = "SELECT * FROM tblbookcategory";
            $datashowqueryrun = mysqli_query($conn, $datashowquery);
            $datashowqueryrowcount = mysqli_num_rows($datashowqueryrun);
            if( $datashowqueryrowcount > 0){
                while($row = mysqli_fetch_assoc($datashowqueryrun)){ ?>
            <li><a class="dropdown-item" href=""><?php echo $row['bookcatname'];?></a></li>
            <li><hr class="dropdown-divider"></li>
  <?php
        }
    }?>

          </ul>
        </li>
        
      </ul>
         <!-- book counter starts -->
      <button class="btn btn-success fw-bold btn-sm me-2 d-none d-md-block" data-bs-toggle="modal" data-bs-target="#mybooklist">
        <span class="badge pull-right bg-dark">
    <?php
         // Book list counter
if(isset($_SESSION['booklist'])){ 
  echo count($_SESSION['booklist']); 
  }else
   {echo '0';
   } ?>
    </span>
    <img src="assets/LMS Icons/2.png" width="32" height="30">
   </button>
        <a class="btn btn-success fw-bold me-2 fst-italic" href="../search-result.php" name="booksearch">Search Book <i class="fas fa-search"></i></a>
    </div>
  </div>
</nav>

