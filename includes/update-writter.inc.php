<?php
require_once 'dbh.inc.php';
$cha=$_POST['writter_name'];
$id=$_GET['id'];
$sqlic="UPDATE `writter` SET `writter_name`='$cha' WHERE `writter_id`='$id'";
$result=mysqli_query($conn,$sqlic) or die('query failed');
header('location:../admin/newsWritter/writter.php?msg=updatesuccess!!');
exit();
