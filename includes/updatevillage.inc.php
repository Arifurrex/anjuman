<?php
require_once '../includes/dbh.inc.php';
$ca=$_POST['village_name'];
$id=$_GET['id'];
$sqli="UPDATE `village` SET `village_name`= '$ca' WHERE village_id='$id'";
$result=mysqli_query($conn,$sqli) or die('query failed');
header('location:../admin/village/village.php?msg=updasuccess!!');
exit();
 