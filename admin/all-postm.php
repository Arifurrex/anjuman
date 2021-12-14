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
$limit_per_page=10;
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
// if($_SESSION['role']==1){
// 	$sqli="select * from post
// 	left join category on post.category=category.category_id
// 	left join user on post.author=user.role
// 	ORDER BY post_id DESC LIMIT $offset,$limit_per_page";
// 	$resl=mysqli_query($conn,$sqli) or die('query failed.');
// }
// elseif($_SESSION['role']==2){
// 	$sqli="select * from post
// 	left join category on post.category=category.category_id
// 	left join user on post.author=user.role
// 	where post.author=2
// 	ORDER BY post_id DESC LIMIT $offset,$limit_per_page";
// 	$resl=mysqli_query($conn,$sqli) or die('query failed.');
// }
?>
<section class="table-wrapper">
<div class="postinsert__header">
    <h2 class="postinsert__title">all post </h2>
    <div class="postinsert__but"><a href="http://anjumanehefajoth.com/admin/add-post.php">add post</a></div>
</div>
<table class="table">
     <thead>
     	 <th>S.No</th>
     	 <th>title</th>
     	 <th>category</th>
     	 <th>date</th>
     	 <th>author</th>
     	 <th>image</th>
     	 <th>edit</th>
     	 <th>Delete</th>
     </thead>
     <tbody>
     	  
		   <?php
	     if(mysqli_num_rows($resl)>0){
	    while($row=mysqli_fetch_assoc($resl)){ ?>
		       <tr>   
     	  	  <td ><?= $row['post_id']?></td>
     	  	  <td ><?= $row['title']?></td>
     	  	  <td ><?= $row['category_name']?></td>
     	  	  <td ><?= $row['post_date']?></td>
     	  	  <td><?= $row['username']?></td>
     	  	  <td><img src="../images/<?= $row['post_img']?>" alt="" class="table_image"></td>
			  <td><a href="http://www.anjumanehefajoth.com/admin/edit-post.php?id=<?= $row['post_id']?>"><i class="fa fa-edit" aria-hidden="true" >edit</i></a></td>
     	  	  <td><a href="http://www.anjumanehefajoth.com/admin/delete-post.php?poid=<?= $row['post_id']?>&caid=<?= $row['category_id']?>"><i class="fa fa-trash" aria-hidden="true">delete</i></a></td>
     	  	  </tr>
		<?php
	    }
		}

	    ?>
     	  	  
     	 

     </tbody>
   </table>
   
</section>
<div class="paginatinon">
<?php 
$quep="SELECT * FROM post";
$resl1=mysqli_query($conn,$quep) or die("query failed");
$total_records=mysqli_num_rows($resl1);
$limit_per_page=10;
$total_pages=ceil($total_records/$limit_per_page);
for($i=1; $i <= $total_pages; $i++){
	if($i == $page){
		$active="active";
	}else{
		$active="";
	}
	echo '<div class=" btn btn1 p1 '.$active.'"> <a href="http://anjumanehefajoth.com/admin/all-post.php?page='.$i.'">'.$i.'</a></div>';
}
?>
</div>
<?php include "footer.php"; ?>
