<?php
require_once "../../includes/dbh.inc.php";
$catid_id=$_GET['id'];
$sql="DELETE FROM `category` WHERE category_id ='$catid_id'"; 
mysqli_query($conn,$sql) or die('query failed.');
header('location:category.php?msg=dele');   