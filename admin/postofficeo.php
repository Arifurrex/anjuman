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
$limi=20;
if(isset($_GET['id'])){
  $page=$_GET['id'];
}else{
  $page=1;
}

$offser=($page-1)*$limi;
 $sqi="select * from postoffice 
 left join upojella on postoffice.upojella_id=upojella.upojella_id
 limit $offser,$limi";
 $result=mysqli_query($conn,$sqi);
?>

<section class="table-wrapper">
<div class="postinsert__header">
    <h2 class="postinsert__title">all union </h2>
    <div class="postinsert__but"><a href="http://anjumanehefajoth.com/admin/add-postoffice.php">add postoffice</a></div>
</div>
<table class="table">
     <thead>
     	 <th>S.No</th>
        <th>union_name</th>
        <th>upojella_name</th>
        <th>edit</th>                                                   
     	 <th>Delete</th>
     	
     </thead>
     <tbody>
     <?php 
     while($row=mysqli_fetch_assoc($result)){ ?>
         <tr>
     	  	  <td data-label="S.No"><?=$row['postoffice_id']?></td>
             <td data-label="postoffice_name"><?=$row['postoffice_name']?></td>
             <td data-label="postoffice_name"><?=$row['upojella_name']?></td>
             <td data-label="Staus"><a href="edit-postoffice.php?id=<?=$row['postoffice_id']?>"><i class="fa fa-edit" aria-hidden="true"></i></a> </td>
     	  	  <td data-label="Staus"><a href="delete-postoffice.php?id=<?=$row['postoffice_id']?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
     	  	  
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
