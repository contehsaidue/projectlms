<?php session_start();?>

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
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/dist/css/dashboard.css" rel="stylesheet">
<script src="../assets/dist/js/all.js"></script>
<style>
  .account-section{
  padding:.5rem;
  color:#fff;
}
</style>
  </head>
  <body>
<form action="" method="POST">   
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
<a class="navbar-brand fw-bold" href="#">
      <img src="../assets/LMS Icons/225932.png" width="40" height="32"> Library Management System
    </a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-sm fw-bold rounded w-100 fst-italic" type="text" placeholder="Query database..." aria-label="Search">
 <button class="btn btn-success btn-sm me-2 fw-bold p-2" name="searchdb">Search</button>
  <div class="dropdown bg-success account-section rounded me-2">
      <a href="#" class="d-flex align-items-center link-light text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="../<?php echo $_SESSION['user_image'];?>" alt="<?php echo $_SESSION['adminid'];?>" width="32" height="32" class="rounded-circle me-2">
        <strong class="text-white"><?php echo $_SESSION['fname'].' '.$_SESSION['lname'];?></strong>
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
        <li><a class="dropdown-item" href="../users/user-profile.php">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="logout.php"  onclick="return confirm('Are you sure you want to logout?')";>Sign out</a></li>
      </ul>
    </div>
</header>
</form>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link bg-success py-3 text-uppercase fw-bold" aria-current="page" href="dashboard.php">
              <i class="fas fa-building"></i> Library Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add-books.php">
              <i class="fas fa-file"></i> Books Shelf
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add-book-category.php">
              <i class="fas fa-th-list"></i> Books Category 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add-student.php">
              <i class="fas fa-users"></i> Students
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="issused-books.php">
              <i class="fas fa-th-list"></i> Books Issued Out
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="returned-books.php">
              <i class="fas fa-blog"></i> Books Returned
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="returned-books.php">
              <i class="fas fa-comment"></i> Message Board
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <i class="fas fa-users"></i> Librarians
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Library reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
          </li>
        </ul>
      </div>
    </nav>
