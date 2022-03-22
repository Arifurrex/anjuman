<?php
session_start();
if($_SESSION["role"]===0){
	header('location:http://www.anjumanehefajoth.com/admin?error=loginfirs');
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
		<?php
require_once "../../includes/dbh.inc.php";
$limit_per_page=10;
if(isset($_GET['page'])){
   $page=$_GET['page'];
}else{
	$page=1;
}
$offset=($page-1)*$limit_per_page;
$que="SELECT * FROM members 
left join district on members.district_id=district.id
left join upojella on members.upojella=upojella.upojella_id
left join postoffice on members.post_office_id=postoffice.postoffice_id
left join village on members.village_id=village.village_id
left join position on members.position=position.position_id
ORDER BY member_id DESC LIMIT $offset,$limit_per_page";
$resl=mysqli_query($conn,$que) or die("query failed");
// $row=mysqli_fetch_assoc($resl);

?>
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-4">All Members</h5>
                  <!-- =========== -->
                  <div class="search">
                <h4 class="search__title">search</h4>
                <form class="fromcontrol" action="https://www.anjumanehefajoth.com/admin/search.php" method="get">
                    <input type="search" placeholder="search" name="search" class="seachinp" >
                    <input type="submit" class="btn1" value="search here">
                </form>
                </div>
            <!-- ======== -->
                  <div class="table-responsive">
                    <table class="table center-aligned-table">
                      <thead>
                        <tr>
                          <th class="border-bottom-0">S.No</th>
                          <th class="border-bottom-0">Name</th>
                          <th class="border-bottom-0">Father name</th>
                          <th class="border-bottom-0">Phone</th>
                          <th class="border-bottom-0">Email</th>
                          <th class="border-bottom-0">Address</th>
                          <th class="border-bottom-0">Image</th>
                          <th class="border-bottom-0">ip</th>
                          <th class="border-bottom-0">position</th>
                          <th class="border-bottom-0">NID</th>
                          <th class="border-bottom-0">Blood</th>
						  <th class="border-bottom-0">Status</th>
                          <th class="border-bottom-0"></th>
                          <th class="border-bottom-0"></th>
                          <th class="border-bottom-0"></th>
                        </tr>
                      </thead>
                      <tbody>
 <!-- =================================== -->
 <?php   $i=0;
			 while($row=mysqli_fetch_assoc($resl)){?>
     	  <tr>
                        <tr>
                          <td>0<?= ++$i ?></td>
                          <td><?=$row['username']?></td>
                          <td><?=$row['father_name']?></td>
                          <td><?=$row['phone']?></td>
                          <td><?=$row['email']?></td>
                          <td><?=$row['village_name']." ".$row['postoffice_name']." ".$row['upojella_name']." ".$row['district_name']?></td>
                          <td><img src="../images/<?=$row['avater']?>" alt=""></td>
                          <td><?=$row['ip_address']?></td>
                          <td><?=$row['position_name']?></td>
                          <td><?=$row['nid']?></td>
                          <td> <?php
				 if($row['blood_group_id']==1){
					 echo'A+';
				 }elseif($row['blood_group_id']==2){
					 echo'A-';
				 }elseif($row['blood_group_id']==3){
					echo'B+';
				}elseif($row['blood_group_id']==4){
					echo'B-';
				}elseif($row['blood_group_id']==5){
					echo'O+';
				}elseif($row['blood_group_id']==6){
					echo'O-';
				}elseif($row['blood_group_id']==7){
					echo'AB+';
				}elseif($row['blood_group_id']==8){
					echo'AB-';
				}
				 ?></td>
						  <td><label class="badge badge-teal">Approved</label></td>
                          <td><a href="http://www.anjumanehefajoth.com/admin/edit-member.php?id=<?= $row['member_id']?>" class="btn btn-outline-success btn-sm">Edit</a></td>
                          <td><a href="http://www.anjumanehefajoth.com/admin/delet-member.php?id=<?= $row['member_id']?>" class="btn btn-outline-danger btn-sm">Delete</a></td>
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
   