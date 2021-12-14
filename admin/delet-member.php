<?php
require_once "../includes/dbh.inc.php";
$id=$_GET['id'];
$que="SELECT * FROM members where member_id='$id'";
$res=mysqli_query($conn,$que) OR die('query failed'); 
$row=mysqli_fetch_assoc($res);
unlink("../images/".$row['avater']);

$query="DELETE FROM `members`
WHERE member_id='$id'";
mysqli_query($conn,$query) OR die('query failed');
header('location:http://anjumanehefajoth.com/admin/all-member.php?msg=sucessdele');