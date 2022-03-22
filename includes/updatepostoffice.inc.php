<?php
require_once '../includes/dbh.inc.php';
$id=$_GET['id'];
$postoffice_name=$_POST['postoffice_name'];
$upojella_id=$_POST['upojella_id'];
$sqli="UPDATE `postoffice` SET `postoffice_name`= '$postoffice_name',`upojella_id`='$upojella_id' WHERE `postoffice_id`='$id'";
$result=mysqli_query($conn,$sqli) or die('query failed');
header('location:../admin/union/postoffice.php?msg=updasuccess!!');
exit();
 