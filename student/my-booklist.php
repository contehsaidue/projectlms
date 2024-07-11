<?php include 'dashboard-sidebar.php';?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h2 fst-italic fw-bold">My Book List
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

      <table class="table table-striped table-bordered table-hover table-responsive" style="font-size:12px" cellspacing="0">
          <thead class="text-center">
            <tr>
              <th>#</th>
              <th>Cover</th>
              <th>Title</th>
              <th>Author</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="text-center">
          <?php 
          $i = 1;
          error_reporting(0);
          foreach($_SESSION['booklist'] as $k => $booklist) :?>
            <tr>
              <td><?php echo $i++;?></td>
              <td><img src="../<?php echo $booklist['cover'];?>" width="42" height="42" class="rounded me-2"></td>
              <td><?php echo $booklist['title'];?></td>
              <td><?php echo $booklist['author'];?></td>
              <td>
              <form action="controller.php" method="POST">
                      <input type="hidden" value="<?php echo $booklist['bookid'];?>" name="book_ID">
                      <input type="hidden" value="<?php echo $_SESSION['stud_ID'];?>" name="stud_ID">
                <button class="btn btn-dark btn-sm fw-bold fst-italic" name="borrowbook"> Borrow <img src="../assets/LMS Icons/2.png" width="35" height="25"></button>
                </form>
              </td>
            </tr>
            <?php endforeach ?>       
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<?php include 'dashboard-footer.php';?>
  