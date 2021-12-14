<?php
session_start();
if($_SESSION["role"]==0){
	header('location:http://anjumanehefajoth.com/admin?error=loginfirs');
	exit();
}
?>
<?php include "header.php" ?>
<?php
require_once "../includes/dbh.inc.php";
if(isset($_GET['search'])){
    $search=mysqli_real_escape_string($conn,$_GET['search']) ;

}
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
where first_name like '%$search%' OR
last_name like '%$search%' OR
district_name like '%$search%' OR 
upojella_name like '%$search%' OR 
postoffice_name like '%$search%' OR 
village_name like '%$search%' 
ORDER BY member_id DESC LIMIT $offset,$limit_per_page";
$resl=mysqli_query($conn,$que) or die("query failed".mysqli_error());

?>
<section class="table-wrapper">
<div class="postinsert__header">
    <h2 class="postinsert__title">search member here</h2>
	<div class="search">
                <h4 class="search__title">search</h4>
                <form class="fromcontrol" action="http://anjumanehefajoth.com/admin/search.php" method="get">
                    <input type="search" placeholder="search" name="search" class="seachinp" >
                    <input type="submit" class="btn1" value="search here">
                </form>
                
            </div>
    <div class="postinsert__but"><a href="http://anjumanehefajoth.com/admin/add-members.php">add member</a> </div>
</div>
<table class="table">
     <thead>
     	 <th>S.No</th>
     	 <th>Username</th>
     	 <th>Father name</th>
     	 <th>phone</th>
     	 <th>email</th>
		 <th>address</th>
		 <th>ip</th>
		 <th>avater</th>
		 <th>position</th>
		 <th>nid</th>
		 <th>blood</th>
		 <th>edit</th>
		 <th>delete</th>

		  
     </thead>
     <tbody>
		  <?php 
			 while($row=mysqli_fetch_assoc($resl)){?>
     	  <tr>
     	  	  <td data-label="S.No"><?= $row['member_id']?></td>
     	  	  <td data-label="username"><?=$row['username']?></td>
     	  	  <td data-label="father_name"><?=$row['father_name']?></td>
     	  	  <td data-label="phone"><?=$row['phone']?></td>
     	  	  <td data-label="email"><?=$row['email']?></td>
     	  	  <td data-label="village_name"><?=$row['village_name']." ".$row['postoffice_name']." ".$row['upojella_name']." ".$row['district_name']?></td>
			  <td data-label="ip_address"><?=$row['ip_address']?></td> 
     	  	  <td data-label="image"><img src="../images/<?=$row['avater']?>" alt=""> </td> 
     	  	  <td data-label="posion">
				 <?php
				 if($row['position']==1){
					 echo'amir/sobapoti';
				 }elseif($row['position']==2){
					 echo'sohosobapoti';
				 }
				 ?>
				 
				 
				 </td> 
     	  	  <td data-label="username"><?=$row['nid']?></td> 
     	  	  <td data-label="BLOOD">
				 <?php
				 if($row['blood_group_id']==1){
					 echo'A';
				 }elseif($row['blood_group_id']==2){
					 echo'A+';
				 }
				 ?>
				 </td> 
     	  	 
     	  	  
     	  	  <td data-label="Staus">
				 <a href="http://anjumanehefajoth.com/admin/edit-member.php?id=<?= $row['member_id']?>"><i class="fa fa-edit" aria-hidden="true"></i></a> 
			 </td>
			  <td data-label="Staus">
			  <a href="http://anjumanehefajoth.com/admin/delet-member.php?id=<?= $row['member_id']?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
				</td>
     	  </tr>
		   <?php
			    } 
			?>
     </tbody>
   </table>
   
</section>
<div class="paginatinon">
<?php 
$que="SELECT * FROM user";
$resl1=mysqli_query($conn,$que) or die("query failed");
$total_records=mysqli_num_rows($resl1);
$limit_per_page=3;
$total_pages=ceil($total_records/$limit_per_page);
for($i=1; $i <= $total_pages; $i++){
	if($i == $page){
		$active="active";
	}else{
		$active="";
	}
	echo '<div class=" btn btn1 p1 '.$active.'"> <a href="http://anjumanehefajoth.com/admin/all-users.php?page='.$i.'">'.$i.'</a></div>';
}
?>
</div>
<?php include "footer.php"; ?>
