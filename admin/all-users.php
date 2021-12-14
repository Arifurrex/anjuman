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
                  <h4 class="card-title">All users</h4>
				  <?php
                   require_once "../includes/dbh.inc.php";
                   $limit_per_page=3;
                   if(isset($_GET['page'])){
                   $page=$_GET['page'];
                   }else{
	                $page=1;
                   }
                   $offset=($page-1)*$limit_per_page;
                   $que="SELECT * FROM user ORDER BY user_id DESC LIMIT $offset,$limit_per_page";
                   $resl=mysqli_query($conn,$que) or die("query failed");

                  ?>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>
                          User
                        </th>
                        <th>
                          First name
                        </th>
                        <th>
                          Last name
                        </th>
                        <th>
                          Username
                        </th>
                        <th>
                          role
                        </th>
						<th></th>
						<th></th>
                      </tr>
                    </thead>
                    <tbody>
					<?php 
			        while($row=mysqli_fetch_assoc($resl)){
			        ?>
                      <tr>
                        <td class="py-1">
                          <img src="images/faces-clipart/pic-1.png" alt="image"/>
                        </td>
                        <td><?= $row['first_name']?></td>
                        <td><?= $row['last_name']?></td>
                        <td><?=$row['username']?></td>
                        <td>
							<?php
				           if($row['role'] ==1){
					        echo "admin";
				           }else{
					        echo "normal user";
				            }
				           ?>
                        </td>
						<td><a href="https://www.anjumanehefajoth.com/admin/edit-user.php?id=<?= $row['user_id']?>" class="btn btn-outline-success btn-sm">Edit</a></td>
                          <td><a href="https://www.anjumanehefajoth.com/admin/delet-user.php?id=<?= $row['user_id']?>" class="btn btn-outline-danger btn-sm">Delete</a></td>
                 
					 
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
   