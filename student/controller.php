<?php
session_start();
include '../includes/config.php';

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
        $_SESSION['status'] = "Successfully registered as a student!";
        $_SESSION['type'] = "success";
        header("Location: ../index.php");
    }else{
        $_SESSION['status'] = "Failed to register as a student!";
        $_SESSION['type'] = "error";
        header("Location: ../index.php");

    }


    } else{
        $_SESSION['status'] = "Image type not supported - Supported image type (jpg, jpeg, png)!";
        header("Location: ../index.php");
    }

}

// Student Login Handler

if(isset($_POST['studentlogin'])){
    $studentid = mysqli_real_escape_string($conn,$_POST['studentid']);
    $student_pass = mysqli_real_escape_string($conn,$_POST['student_pass']);

$studentlogincheck = "SELECT * FROM tblstudent WHERE studentid = '$studentid' AND password = '$student_pass'";
$studentlogincheckrun = mysqli_query($conn, $studentlogincheck);
$loginrow = mysqli_fetch_assoc($studentlogincheckrun);

if($loginrow['studentid'] === $studentid && $loginrow['password'] === $student_pass ){
     // creating session variables from Database
     $_SESSION['stud_ID'] = $loginrow['stud_ID'];
     $_SESSION['fname'] = $loginrow['fname'];
     $_SESSION['lname'] = $loginrow['lname'];
     $_SESSION['gender'] = $loginrow['gender'];
     $_SESSION['age'] = $loginrow['age'];
     $_SESSION['studentid'] = $loginrow['studentid'];
     $_SESSION['program'] = $loginrow['program'];
     $_SESSION['certificatetype'] = $loginrow['certificatetype'];
     $_SESSION['phone'] = $loginrow['phone'];
     $_SESSION['email'] = $loginrow['email'];
     $_SESSION['image'] = $loginrow['image'];
     
     header('Location:dashboard.php');
     exit();
   }else {
 
    $_SESSION['status'] = "Details doesn't match records in Database";
    $_SESSION['type'] = "error";
    header('Location:../index.php');
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

//  Insert borrowed book handler
if (isset($_POST['borrowbook']))
{
    $book_ID = mysqli_real_escape_string($conn,$_POST['book_ID']);
    $stud_ID = mysqli_real_escape_string($conn,$_POST['stud_ID']);
    $date_borrowed = date("Y-m-d");
    
    $bookcheckquery = "SELECT * FROM tblborrowing WHERE book_ID = '$book_ID' AND stud_ID = '$stud_ID'";
    $bookcheckqueryrun =  mysqli_query($conn, $bookcheckquery);
    $bookcheckrowcount = mysqli_num_rows($bookcheckqueryrun);
    
    $bookrow = mysqli_fetch_assoc($bookcheckqueryrun);

    if ($bookrow['book_ID'] ==  $book_ID){
        $_SESSION['status'] = "Book already in your shelf!";
        $_SESSION['type'] = "error";
        header("Location: my-library.php");
 
}else{

    $bookborrowinsertquery = "INSERT INTO tblborrowing (book_ID,stud_ID,date_borrowed) VALUES ('$book_ID','$stud_ID','$date_borrowed')";
    $bookborrowinsertqueryrun = mysqli_query($conn, $bookborrowinsertquery);

    if ($bookborrowinsertqueryrun){
        $_SESSION['status'] = "Book successfully added to your shelf!";
        $_SESSION['type'] = "success";
        header("Location: my-library.php");
    }else{
        $_SESSION['status'] = "Failed to add book to your shelf!";
        $_SESSION['type'] = "error";
        header("Location: my-library.php");

    }
}

}



// Return book handler
if (isset($_POST['returnbook'])) 
{

    $book_ID = mysqli_real_escape_string($conn,$_POST['book_ID']);
    $stud_ID = mysqli_real_escape_string($conn,$_POST['stud_ID']);
    $date_returned = date("Y-m-d");


    $bookreturninsertquery = "INSERT INTO tblbookreturn (book_ID,stud_ID,date_returned) VALUES ('$book_ID','$stud_ID','$date_returned')";
    $bookreturninsertqueryrun = mysqli_query($conn, $bookreturninsertquery);

    $removequery = "DELETE FROM tblborrowing WHERE book_ID = '$book_ID'";
    $removequeryrun = mysqli_query($conn, $removequery);

    if ($removequeryrun){
        $_SESSION['status'] = "Book successfully removed from your shelf!";
        $_SESSION['type'] = "success";
        header("Location: my-books.php");
    }else{
        $_SESSION['status'] = "Failed to remove book from your shelf!";
        $_SESSION['type'] = "error";
        header("Location: my-books.php");

    }

}



// Vendor update product handler
if (isset($_POST['updateproduct']))
{
    $productid = mysqli_real_escape_string($conn,$_POST['productid']);
    $pname = mysqli_real_escape_string($conn,$_POST['pname']);
    $pprice = mysqli_real_escape_string($conn,$_POST['pprice']);
    $stock = mysqli_real_escape_string($conn,$_POST['stock']);
    $pstatus = mysqli_real_escape_string($conn,$_POST['pstatus']);
    $productcatid = mysqli_real_escape_string($conn,$_POST['productcatid']);

       // image file name & tmp name
    $pimage = $_FILES['pimage']['name'];
    $pimage_tmpname = $_FILES['pimage']['tmp_name'];
    
    // checking image file extension
    $pimage_type = strtolower(pathinfo($pimage, PATHINFO_EXTENSION));
     // valid file extensions
     $extensions_arr = array("jpg","jpeg","png");
     $pimage_Rootpath = "../assets/vendorproduct/".$pimage; // Image path in root directory
     $pimage_DBpath = "assets/vendorproduct/".$pimage; // Image path in DB


    $pdescription = mysqli_real_escape_string($conn,$_POST['pdescription']);

    if(in_array($pimage_type , $extensions_arr)){

    $productupdatequery = 
    "UPDATE tblvendorproduct SET 
    pname = '$pname',
    pprice = '$pprice',
    stock = '$stock',
    pstatus = '$pstatus',
    productcatid = '$productcatid',
    pimage = '$pimage_DBpath',
    pdescription = '$pdescription' WHERE productid = '$productid'";
    $productupdatequeryrun = mysqli_query($conn, $productupdatequery);

         // Moving image to uploaded folder in root directory after update
    move_uploaded_file($pimage_tmpname, $pimage_Rootpath);

    if ($productupdatequeryrun){
        $_SESSION['status'] = "Product successfully updated!";
        $_SESSION['type'] = "success";
        header("Location: dashboard-add-product.php");
    }else{
        $_SESSION['status'] = "Failed to update product!";
        $_SESSION['type'] = "error";
        header("Location: dashboard-add-product.php");

    }


    } else{
        $_SESSION['status'] = "Image type not supported - Supported image type (jpg, jpeg, png)!";
        $_SESSION['type'] = "error";
        header("Location: dashboard-add-product.php");
    }

}



// Vendor remove product

if(isset($_GET['removeproduct'])){
    $id = $_GET['removeproduct'];

    $productremovequery = "DELETE FROM tblvendorproduct WHERE productid = '$id'";
    $productremovequeryrun = mysqli_query($conn,  $productremovequery);

    if ( $productremovequeryrun){
        $_SESSION['status'] = "Product successfully removed";
        $_SESSION['type'] = "success";
        header("Location: dashboard-add-product.php");
    }else{
        $_SESSION['status'] = "Failed to remove product!";
        $_SESSION['type'] = "error";
        header("Location: dashboard-add-product.php");
    }


}


?>