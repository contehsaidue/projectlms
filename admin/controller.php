<?php
session_start();
include '../includes/config.php';

// Admin Registration handler
if (isset($_POST['adminregister']))
{
    $fname = mysqli_real_escape_string($conn,$_POST['fname']);
    $lname = mysqli_real_escape_string($conn,$_POST['lname']);
    $gender = mysqli_real_escape_string($conn,$_POST['gender']);
    $age = mysqli_real_escape_string($conn,$_POST['age']);
    $contact_no = mysqli_real_escape_string($conn,$_POST['contact_no']);
    $user_email = mysqli_real_escape_string($conn,$_POST['user_email']);
    $user_pass = mysqli_real_escape_string($conn,$_POST['user_pass']);

    // image file name & tmp name
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmpname = $_FILES['user_image']['tmp_name'];

    // checking image file type
    $user_image_type = strtolower(pathinfo($user_image, PATHINFO_EXTENSION));
     // valid file extensions
     $extensions_arr = array("jpg","jpeg","png");
     $user_image_Rootpath = "../assets/adminregisteruploads/".$user_image; // Image path in root directory
     $user_image_DBpath = "assets/adminregisteruploads/".$user_image; // Image path in DB

    if(in_array($user_image_type, $extensions_arr)){

    $userinsertquery = "INSERT INTO tbladmin (fname,lname,gender,age,contact_no,user_email,user_pass,user_image) VALUES
     ('$fname','$lname','$gender','$age','$contact_no','$user_email','$user_pass','$user_image_DBpath')";
    $userinsertqueryrun = mysqli_query($conn,$userinsertquery);

         // Moving image to uploaded folder in root directory
    move_uploaded_file( $user_image_tmpname,  $user_image_Rootpath);

    if ($userinsertqueryrun){
        $_SESSION['status'] = "Successfully registered as an admin!";
        $_SESSION['type'] = "success";
        header("Location: ../index.php");
    }else{
        $_SESSION['status'] = "Failed to register as an admin!";
        $_SESSION['type'] = "error";
        header("Location: ../index.php");

    }


    } else{
        $_SESSION['status'] = "Image type not supported - Supported image type (jpg, jpeg, png)!";
        header("Location: ../index.php");
    }

}

// Admin Login Handler

if(isset($_POST['adminlogin'])){
    $user_email = mysqli_real_escape_string($conn,$_POST['user_email']);
    $user_pass = mysqli_real_escape_string($conn,$_POST['user_pass']);

$userlogincheck = "SELECT * FROM tbladmin WHERE user_email = '$user_email' AND user_pass = '$user_pass'";
$userlogincheckrun = mysqli_query($conn, $userlogincheck);
$loginrow = mysqli_fetch_assoc($userlogincheckrun);

if($loginrow['user_email'] === $user_email && $loginrow['user_pass'] === $user_pass){
     // creating session variables from Database
     $_SESSION['adminid'] = $loginrow['admin_ID'];
     $_SESSION['fname'] = $loginrow['fname'];
     $_SESSION['lname'] = $loginrow['lname'];
     $_SESSION['gender'] = $loginrow['gender'];
     $_SESSION['age'] = $loginrow['age'];
     $_SESSION['contact_no'] = $loginrow['contact_no'];
     $_SESSION['user_email'] = $loginrow['user_email'];
     $_SESSION['user_image'] = $loginrow['user_image'];
     
     header('Location:dashboard.php');
     exit();
   }else {
 
    $_SESSION['status'] = "Details doesn't match records in Database";
    $_SESSION['type'] = "error";
    header('Location:../index.php');
}

}

// Student Registration handler
if (isset($_POST['studentregister']))
{
    $fname = mysqli_real_escape_string($conn,$_POST['fname']);
    $lname = mysqli_real_escape_string($conn,$_POST['lname']);
    $gender = mysqli_real_escape_string($conn,$_POST['gender']);
    $studentage = mysqli_real_escape_string($conn,$_POST['studentage']);
    $studentid = mysqli_real_escape_string($conn,$_POST['studentid']);
    $program = mysqli_real_escape_string($conn,$_POST['program']);
    $certificatetype = mysqli_real_escape_string($conn,$_POST['certificatetype']);
    $contact_no = mysqli_real_escape_string($conn,$_POST['contact_no']);
    $student_email = mysqli_real_escape_string($conn,$_POST['student_email']);
    $student_pass = mysqli_real_escape_string($conn,$_POST['student_pass']);

    // image file name & tmp name
   $student_image = $_FILES['student_image']['name'];
   $student_image_tmpname = $_FILES['student_image']['tmp_name'];

    // checking image file type
   $student_image_type = strtolower(pathinfo($student_image, PATHINFO_EXTENSION));
     // valid file extensions
    $extensions_arr = array("jpg","jpeg","png");
    $student_image_Rootpath = "../assets/studentregisteruploads/".$student_image; // Image path in root directory
    $student_image_DBpath = "assets/studentregisteruploads/".$student_image; // Image path in DB

    if(in_array($student_image_type, $extensions_arr)){

    $studentinsertquery = "INSERT INTO tblstudent (fname,lname,gender,age,studentid,program,certificatetype,phone,email,password,image) VALUES
     ('$fname','$lname','$gender','$studentage','$studentid','$program','$certificatetype','$contact_no','$student_email','$student_pass','$student_image_DBpath')";
    $studentinsertqueryrun = mysqli_query($conn, $studentinsertquery);

         // Moving image to uploaded folder in root directory
    move_uploaded_file($student_image_tmpname, $student_image_Rootpath);

    if ($studentinsertqueryrun){
        $_SESSION['status'] = "Student successfully registered!";
        $_SESSION['type'] = "success";
        header("Location: add-student.php");
    }else{
        $_SESSION['status'] = "Failed to register student!";
        $_SESSION['type'] = "error";
        header("Location: add-student.php");

    }


    } else{
        $_SESSION['status'] = "Image type not supported - Supported image type (jpg, jpeg, png)!";
        header("Location: add-student.php");
    }

}

// Admin remove student handler
if (isset($_GET['removestudent']))
{
    $id = $_GET['removestudent'];
    $removequery = "DELETE FROM tblstudent WHERE stud_ID = '$id'";
    $removequeryrun = mysqli_query($conn, $removequery);

    if ($removequeryrun){
        $_SESSION['status'] = "Student successfully removed!";
        $_SESSION['type'] = "success";
        header("Location: add-student.php");
    }else{
        $_SESSION['status'] = "Failed to remove student!";
        $_SESSION['type'] = "error";
        header("Location: add-student.php");

    }

}

// Admin insert book category handler
if (isset($_POST['addbookcategory']))
{
    $bookcatname = mysqli_real_escape_string($conn,$_POST['bookcatname']);
 
    $bookcatnameinsertquery = "INSERT INTO tblbookcategory (bookcatname) VALUES ('$bookcatname')";
    $bookcatnameinsertqueryrun = mysqli_query($conn, $bookcatnameinsertquery);

    if ($bookcatnameinsertqueryrun){
        $_SESSION['status'] = "Book category successfully added!";
        $_SESSION['type'] = "success";
        header("Location: add-book-category.php");
    }else{
        $_SESSION['status'] = "Failed to add book category!";
        $_SESSION['type'] = "error";
        header("Location: add-book-category.php");

    }

}

// Admin remove book category handler
if (isset($_GET['removecategory']))
{
    $id = $_GET['removecategory'];
    $removequery = "DELETE FROM tblbookcategory WHERE bookcatid = '$id'";
    $removequeryrun = mysqli_query($conn, $removequery);

    if ($removequeryrun){
        $_SESSION['status'] = "Book category successfully removed!";
        $_SESSION['type'] = "success";
        header("Location: add-book-category.php");
    }else{
        $_SESSION['status'] = "Failed to remove book category!";
        $_SESSION['type'] = "error";
        header("Location: add-book-category.php");

    }

}


// Admin insert book handler
if (isset($_POST['adminaddbook']))
{
    // image file name & tmp name
    $cover = $_FILES['cover']['name'];
    $cover_tmpname = $_FILES['cover']['tmp_name'];
    
    // checking image file type extension
    $cover_type = strtolower(pathinfo($cover, PATHINFO_EXTENSION));
    // valid file extensions
    $extensions_arr = array("jpg","jpeg","png");
    $cover_Rootpath = "../assets/bookcovers/".$cover; // Image path in root directory
    $cover_DBpath = "assets/bookcovers/".$cover; // Image path in DB

    $title = mysqli_real_escape_string($conn,$_POST['title']);
    $author = mysqli_real_escape_string($conn,$_POST['author']);
    $bookcategory = mysqli_real_escape_string($conn,$_POST['bookcategory']);
    $bookstatus = mysqli_real_escape_string($conn,$_POST['bookstatus']);
    $bookpublisher = mysqli_real_escape_string($conn,$_POST['bookpublisher']);
    $bookdateadded = date("Y-m-d");

    if(in_array($cover_type , $extensions_arr)){

    $bookinsertquery = "INSERT INTO tblbook (bookcover,booktitle,bookauthor,bookcategoryid,bookstatusid,bookpublisher,bookdateadded) VALUES
     ('$cover_DBpath','$title','$author','$bookcategory','$bookstatus','$bookpublisher','$bookdateadded')";
  $bookinsertqueryrun = mysqli_query($conn, $bookinsertquery);

         // Moving image to uploaded folder in root directory
    move_uploaded_file($cover_tmpname, $cover_Rootpath);

    if ($bookinsertqueryrun){
        $_SESSION['status'] = "Book successfully added!";
        $_SESSION['type'] = "success";
        header("Location: add-books.php");
    }else{
        $_SESSION['status'] = "Failed to add book!";
        $_SESSION['type'] = "error";
        header("Location: add-books.php");

    }


    } else{
        $_SESSION['status'] = "Image type not supported - Supported image type (jpg, jpeg, png)!";
        $_SESSION['type'] = "error";
        header("Location: add-books.php");
    }

}


// Admin update book handler
if (isset($_POST['adminupdatebook']))
{
    $bookid = $_POST['bookid'];
    // image file name & tmp name
    $cover = $_FILES['cover']['name'];
    $cover_tmpname = $_FILES['cover']['tmp_name'];
    
    // checking image file type extension
    $cover_type = strtolower(pathinfo($cover, PATHINFO_EXTENSION));
    // valid file extensions
    $extensions_arr = array("jpg","jpeg","png");
    $cover_Rootpath = "../assets/bookcovers/".$cover; // Image path in root directory
    $cover_DBpath = "assets/bookcovers/".$cover; // Image path in DB

    $title = mysqli_real_escape_string($conn,$_POST['title']);
    $author = mysqli_real_escape_string($conn,$_POST['author']);
    $bookcategory = mysqli_real_escape_string($conn,$_POST['bookcategory']);
    $bookstatus = mysqli_real_escape_string($conn,$_POST['bookstatus']);
    $bookpublisher = mysqli_real_escape_string($conn,$_POST['bookpublisher']);
    $bookdateadded = date("Y-m-d");

    if(in_array($cover_type , $extensions_arr)){

    $bookupdatequery = "UPDATE tblbook SET bookcover = '$cover_DBpath',booktitle = '$title',
    bookauthor = '$author',bookcategoryid = '$bookcategory',
    bookstatusid = '$bookstatus', bookpublisher = '$bookpublisher',
    bookdateadded = '$bookdateadded' WHERE bookid = '$bookid'";
    $bookupdatequeryrun = mysqli_query($conn, $bookupdatequery);

  // Moving image to uploaded folder in root directory
    move_uploaded_file($cover_tmpname, $cover_Rootpath);

    if ( $bookupdatequeryrun){
        $_SESSION['status'] = "Book successfully updated!";
        $_SESSION['type'] = "success";
        header("Location: edit-books.php");
    }else{
        $_SESSION['status'] = "Failed to update book!";
        $_SESSION['type'] = "error";
        header("Location: edit-books.php");

    }


    } else{
        $_SESSION['status'] = "Image type not supported - Supported image type (jpg, jpeg, png)!";
        $_SESSION['type'] = "error";
        header("Location: edit-books.php");
    }

}


// Admin remove book handler
if (isset($_GET['removebook']))
{
    $id = $_GET['removebook'];
    $removequery = "DELETE FROM tblbook WHERE bookid = '$id'";
    $removequeryrun = mysqli_query($conn, $removequery);

    if ($removequeryrun){
        $_SESSION['status'] = "Book successfully removed from shelf!";
        $_SESSION['type'] = "success";
        header("Location: add-books.php");
    }else{
        $_SESSION['status'] = "Failed to remove book from shelf!";
        $_SESSION['type'] = "error";
        header("Location: add-books.php");

    }

}

// Book search query handler
if (isset($_POST['booksearch']))
{
    $searchquery = mysqli_real_escape_string($conn,$_POST['searchquery']);
    $searchquery = "SELECT * FROM tblbook JOIN tblbookcategory 
    ON tblbookcategory.bookcatid = tblbook.bookcategoryid 
    JOIN tblbookstatus ON tblbookstatus.bookstatusid = tblbook.bookstatusid 
    WHERE tblbook.booktitle LIKE '%$searchquery%' OR tblbook.bookauthor LIKE '%$searchquery%' 
    OR tblbook.bookpublisher LIKE '%$searchquery%'";
    $searchqueryrun = mysqli_query($conn, $searchquery);
if( $searchqueryrun){
            $_SESSION['status'] = "Book available in Library Database!";
            $_SESSION['type'] = "success";
            // Storing database values in session variable
        while($rowsearch = mysqli_fetch_assoc($searchqueryrun)) {
            $_SESSION['bookcover'] = $rowsearch['bookcover'];
            $_SESSION['bookid'] = $rowsearch['bookid'];
            $_SESSION['booktitle'] = $rowsearch['booktitle'];
            $_SESSION['bookauthor'] = $rowsearch['bookauthor'];
            $_SESSION['bookcatname'] = $rowsearch['bookcatname'];
            $_SESSION['bookstatusname'] = $rowsearch['bookstatusname'];
            header("Location: ../search-result.php");
 } 
}else{
        $_SESSION['status'] = "Book is not the library Database";
        $_SESSION['type'] = "error";
        header("Location: ../search-result.php");

    }

}



?>