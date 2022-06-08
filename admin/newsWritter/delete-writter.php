<?php
require_once "../../includes/dbh.inc.php";
$writterid_id=$_GET['id'];
$sql="DELETE FROM `writter` WHERE writter_id ='$writterid_id'"; 
mysqli_query($conn,$sql) or die('query failed.');
header('location:writter.php?msg=delete');   