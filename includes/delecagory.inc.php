<?php
require_once "../includes/dbh.inc.php";
$catid_id=$_GET['id'];
$sql="DELETE FROM `category` WHERE category_id ='$catid_id'"; 
mysqli_query($conn,$sql) or die('query failed.');
header('location:http://anjumanehefajoth.com/admin/category.php?msg=dele');   

// $sql="DELETE FROM `category` WHERE category_id ='?'"; 
// $stmt=mysqli_stmt_init($conn);
// if(!mysqli_stmt_prepare($stmt,$sql)){
//     header('location:http://localhost:3000/admin/category.php?msg=stmtfailed!!');  
//     exit() ;
// }
// mysqli_stmt_bind_param($stmt,"s",$catid_id);
// mysqli_stmt_execute($stmt);
// mysqli_stmt_close($stmt);
// header('location:http://localhost:3000/admin/category.php?msg=dele');   