<?php
require_once '../includes/dbh.inc.php';
$id=$_GET['id'];
$ca=$_POST['upojella_name'];
$district_id=$_POST['district_id'];

$sqli="UPDATE `upojella` SET `upojella_name`= '$ca',district_id=$district_id WHERE upojella_id=$id";
$result=mysqli_query($conn,$sqli) or die('query failed');
header('location:../admin/upojella/upojella.php?msg=updasuccess!!');
exit();
 