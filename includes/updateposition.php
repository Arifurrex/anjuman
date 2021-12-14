<?php
require_once '../includes/dbh.inc.php';
$ca=$_POST['position_name'];
$id=$_GET['id'];
$sqli="UPDATE `position` SET `position_name`= '$ca' WHERE position_id='$id'";
$result=mysqli_query($conn,$sqli) or die('query failed');
header('location:http://anjumanehefajoth.com/admin/position.php?msg=updasuccess!!');
exit();
 