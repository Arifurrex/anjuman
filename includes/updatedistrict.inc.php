<?php
require_once '../includes/dbh.inc.php';
$updistrictname=$_POST['district_name'];
$updivisionid=$_POST['division_id'];
$id=$_GET['id'];
$sqli="UPDATE `district` SET `district_name`='$updistrictname',division_id=$updivisionid  WHERE district_id = '$id' ";
$result=mysqli_query($conn,$sqli) or mysqli_error();
header('location:../admin/district/alldistrict.php?msg=update_successfull!!');
exit();
 