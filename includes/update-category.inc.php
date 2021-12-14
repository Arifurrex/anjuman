<?php
require_once "dbh.inc.php";
$cha=$_POST['category_name'];
$id=$_GET['id'];
$sqlic="UPDATE `category` SET `category_name`='$cha' WHERE `category_id`='$id'";
$result=mysqli_query($conn,$sqlic) or die('query failed');
header('location:https://anjumanehefajoth.com/admin/category.php?msg=updasuccess!!');
exit();