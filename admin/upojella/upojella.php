<?php
session_start();
if($_SESSION['role'] === 0){
  header('location:../admin/index.php');
  exit();
}
?>
<?php
    include '../starheaderCopy.php';
    include '../starnavigationCopy.php';
    include '../starsidenavbarCopy.php';
    ?>
  <!-- partial -->
  <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Upojella</h4>
                  <?php
                   require_once '../../includes/dbh.inc.php';
                    $limi=20;
                  if(isset($_GET['id'])){
                    $page=$_GET['id'];
                   }else{
                  $page=1;
                      }

               $offser=($page-1)*$limi;
               $sqi="select * from upojella
               left join district 
               on upojella.district_id=district.district_id 
               limit $offser,$limi";
               $result=mysqli_query($conn,$sqi) or die('query failed'.mysqli_error(''));
               ?>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>
                          S.No
                        </th>
                        <th>upojella_name</th>
                        <th>district_name</th>
                        <th></th>
						             <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    while($row=mysqli_fetch_assoc($result)){ ?>
                      <tr>
                        <td><?=$row['upojella_id']?></td>
                        <td><?=$row['upojella_name']?></td>
                        <td><?=$row['district_name']?></td>
                        <td><a href="edit-upojella.php?id=<?=$row['upojella_id']?>" class="btn btn-outline-success btn-sm">Edit</a></td>
                        <td><a href="delete-upojella.php?id=<?=$row['upojella_id']?>" class="btn btn-outline-danger btn-sm">Delete</a></td>
                 
					 
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
    include '../startscriptCopy.php';
?>
   