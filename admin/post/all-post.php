<?php
session_start();
if($_SESSION["role"] === 0){  
	header('location:http://localhost/3.blog%20and%20newspapaper/anjumancopy/admin?error=loginfirst');
	exit();
}
?>
 <?php
  // var_dump(__DIR__);
    include '../starheaderCopy.php';
    include '../starnavigationCopy.php';
    include '../starsidenavbarCopy.php';
    ?>
   
 <!-- partiala -->
 <div class="main-panel">
        <div class="content-wrapper">
          <?php
require_once "../../includes/dbh.inc.php";
$limit_per_page=20;
if(isset($_GET['page'])){
   $page=$_GET['page'];
}else{
	$page=1;
}
$offset=($page-1)*$limit_per_page;
$sqli="select * from post
	left join category on post.category=category.category_id
	left join user on post.author=user.user_id
	ORDER BY post_id DESC LIMIT $offset,$limit_per_page";
	$resl=mysqli_query($conn,$sqli) or die('query failed.');
?>
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-4">post</h5>
                  <div class="table-responsive">
                    <table class="table center-aligned-table">
                      <thead>
                        <tr>
                          <th class="border-bottom-0">post No</th>
                          <th class="border-bottom-0">title</th>
                          <th class="border-bottom-0">category</th>
                          <th class="border-bottom-0">date</th>
                          <th class="border-bottom-0">author</th>
                          <th class="border-bottom-0">image</th>
                          <th class="border-bottom-0"></th>
                          <th class="border-bottom-0"></th>
                          <th class="border-bottom-0"></th>
                        </tr>
                      </thead>
                      <tbody>
 <!-- =================================== -->
                      <?php
	     if(mysqli_num_rows($resl)>0){
	    while($row=mysqli_fetch_assoc($resl)){ ?>
                        <tr>
                          <td>0<?= $row['post_id']?></td>
                          <td><?= $row['title']?></td>
                          <td><?= $row['category_name']?></td>
                          <td><?= $row['post_date']?></td>
                          <td><?= $row['username']?></td>
                          <td><img src="../../images/<?= $row['post_img']?>" alt="" style="width:50px;height:50px"></td>
                          <td><a href="https://www.anjumanehefajoth.com/admin/edit-post.php?id=<?= $row['post_id']?>" class="btn btn-success btn-sm">Edit</a></td>
                          <td><a href="https://www.anjumanehefajoth.com/admin/delete-post.php?poid=<?= $row['post_id']?>&caid=<?= $row['category_id']?>" class="btn btn-danger btn-sm">Delete</a></td>
                        </tr>
                        <?php
	    }
		}

	    ?>
     <!-- ====================================== -->
                        <!-- <tr>
                          <td>035</td>
                          <td>Galaxy S8</td>
                          <td>15 May 2017</td>
                          <td>Dispatched</td>
                          <td>Internet banking</td>
                          <td><label class="badge badge-warning">Pending</label></td>
                          <td><a href="#" class="btn btn-outline-success btn-sm">View Order</a></td>
                          <td><a href="#" class="btn btn-outline-danger btn-sm">Cancel</a></td>
                        </tr> -->
                        <!-- <tr>
                          <td>036</td>
                          <td>Amazon Echo</td>
                          <td>17 May 2017</td>
                          <td>Dispatched</td>
                          <td>Credit card</td>
                          <td><label class="badge badge-teal">Approved</label></td>
                          <td><a href="#" class="btn btn-outline-success btn-sm">View Order</a></td>
                          <td><a href="#" class="btn btn-outline-danger btn-sm">Cancel</a></td>
                        </tr> -->
                        <!-- <tr>
                          <td>037</td>
                          <td>Google Pixel</td>
                          <td>17 May 2017</td>
                          <td>Dispatched</td>
                          <td>Cash on delivery</td>
                          <td><label class="badge badge-danger">Rejected</label></td>
                          <td><a href="#" class="btn btn-outline-success btn-sm">View Order</a></td>
                          <td><a href="#" class="btn btn-outline-danger btn-sm">Cancel</a></td>
                        </tr> -->
                        <!-- <tr>
                          <td>038</td>
                          <td>Mac Mini</td>
                          <td>19 May 2017</td>
                          <td>Dispatched</td>
                          <td>Debit card</td>
                          <td><label class="badge badge-teal">Approved</label></td>
                          <td><a href="#" class="btn btn-outline-success btn-sm">View Order</a></td>
                          <td><a href="#" class="btn btn-outline-danger btn-sm">Cancel</a></td>
                        </tr> -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
      
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2021 <a href="" target="_blank">alinessa</a>. All rights reserved.</span>
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
   