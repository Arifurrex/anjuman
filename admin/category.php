<?php
session_start();
if($_SESSION['role'] == 0){
  header('location:../admin/index.php');
  exit();
}
?>
<?php
    @include '../admin/starheader.php';
    @include '../admin/starnavigation.php';
    @include '../admin/starsidenavbar.php';
    ?>
  <!-- partial -->
  <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Category</h4>
                  <?php
                  require_once '../includes/dbh.inc.php';
                  $limi=3;
                  if(isset($_GET['id'])){
                  $page=$_GET['id'];
                  }else{
                  $page=1;
                  }

                  $offser=($page-1)*$limi;
                  $sqi="select * from category";
                  $result=mysqli_query($conn,$sqi);
                  ?>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>
                        S.No
                        </th>
                        <th>
                        Category_name
                        </th>
                        <th>
                        Post
                        </th>
						           <th></th>
						           <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                   while($row=mysqli_fetch_assoc($result)){ ?>
                      <tr>
                        <td >
                         <?=$row['category_id']?>
                        </td>
                        <td><?=$row['category_name']?></td>
                        <td><?=$row['post']?></td>
                        <td><?=$row['username']?></td>
                        
						             <td><a href="../includes/delecagory.inc.php?id=<?=$row['category_id']?>"  class="btn btn-outline-danger btn-sm">Delete</a></td>
                          <td><a href="https://www.anjumanehefajoth.com/admin/edit-category.php?id=<?=$row['category_id']?>" class="btn btn-outline-success btn-sm">Edit </a></td>
                 
					 
     	  </tr>
		   <?php
			    } 
			?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018 <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller --> 
 
<?php    
    @include '../admin/startscript.php';
?>
   