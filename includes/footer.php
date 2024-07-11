
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/dist/js/jquery-3.3.0.min.js"></script>
</body>
</html>

<!-- Modals -->



  <!-- User booklist modal-->

  <div class="modal fade" id="mybooklist">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold">
    <img src="assets/LMS Icons/2.png" width="32" height="30"> My Book List</h5>
        <a class="btn btn-sm btn-dark fw-bold" href="index.php?empty=1" onclick="return confirm('Are you sure you want to empty your booklist?')";>Empty List <i class="fas fa-book"></i></a>
 </div>
 <form action="" method="POST">
 <div class="modal-body">
 <table class="table table-striped table-bordered table-hover table-responsive" style="font-size:12px" cellspacing="0">
           <thead>
           <tr class="text-center">
             <th scope="col">Cover</th>
             <th scope="col">Name</th>
             <th scope="col">Author</th>
             <th scope="col">Category</th>
             <th scope="col">Status</th>
             <th scope="col">Remove</th>
           </tr>
           </thead>
           <tbody>
           <?php 
           error_reporting(0);
           foreach($_SESSION['booklist'] as $k => $booklist) :?>
               
           <tr class="text-center fw-bold">
             <th scope="row"><img src="../<?php echo $booklist['cover'];?>" width="42" height="42" class="rounded me-2"></th>
             <td><?php echo $booklist['title'];?></td>
             <td><?php echo $booklist['author'];?></td>
             <td><?php echo $booklist['bookcategory'];?></td>
             <td><?php echo $booklist['bookstatus'];?></td>
             <td><a href="index.php?removebook=<?php echo $booklist['bookid'];?>" onclick="return confirm('Are you sure you want to remove this book from your booklist?')";><i class="fas fa-times"></i></a></td>
           </tr>
           <?php endforeach ?>
           </tbody>
         </table>
 
 </div>
 <div class="modal-footer">
 <button type="button" class="btn btn-sm btn-danger fw-bold" data-bs-dismiss="modal">Close</button>
 </div>
 </form>
 </div>
 </div>
 </div>