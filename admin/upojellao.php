<?php
session_start();
if($_SESSION["role"]==0){
	header('location:http://anjumanehefajoth.com/admin?error=loginfirs');
	exit();
}
?>
<?php include "header.php" ?>
<?php
require_once '../includes/dbh.inc.php';
$limi=10;
if(isset($_GET['id'])){
  $page=$_GET['id'];
}else{
  $page=1;
}

$offser=($page-1)*$limi;
 $sqi="select * from upojella
 left join district 
 on upojella.district_id=district.id 
 limit $offser,$limi";
 $result=mysqli_query($conn,$sqi) or die('query failed'.mysqli_error(''));
?>

<section class="table-wrapper">
<div class="postinsert__header">
    <h2 class="postinsert__title">all upojella </h2>
    <div class="postinsert__but"><a href="http://anjumanehefajoth.com/admin/add-upojella.php">add upojella</a></div>
</div>
<table class="table">
     <thead>
     	 <th>S.No</th>
        <th>upojella_name</th>
        <th>district_name</th>
        <th>edit</th>                                                   
     	 <th>Delete</th>
     	
     </thead>
     <tbody>
     <?php 
     while($row=mysqli_fetch_assoc($result)){ ?>
         <tr>
     	  	  <td data-label="S.No"><?=$row['upojella_id']?></td>
             <td data-label="upojella_name"><?=$row['upojella_name']?></td>
             <td data-label="district_id"><?=$row['district_name']?></td>
             <td data-label="Staus"><a href="edit-upojella.php?id=<?=$row['upojella_id']?>"><i class="fa fa-edit" aria-hidden="true"></i></a> </td>
     	  	  <td data-label="Staus"><a href="delete-upojella.php?id=<?=$row['upojella_id']?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
     	  	  
     	  </tr>

     <?php    
     }
     ?>
     	 

     </tbody>
   </table>
   
</section>


  <div class="paginatinon">
  <?php
 $sqlk="select * from category";
 $resl=mysqli_query($conn,$sqlk) or die('query falied') ;
 $totalrecord=mysqli_num_rows($resl);
 $totalpage=ceil($totalrecord/$limi);
for($i=1;$i <= $totalpage;$i++){
    echo '<div class=" btn btn1 p1"> <a href="http://anjumanehefajoth.com/admin/category.php?id='.$i .'">'.$i .'</a></div>';
}
   ?>
  </div>
<?php include "footer.php"; ?>
