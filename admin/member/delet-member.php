<?php
require_once "../../includes/dbh.inc.php";
$id=$_GET['id'];
$que="SELECT * FROM members where member_id='$id'";
$res=mysqli_query($conn,$que) OR die('query failed'); 
$row=mysqli_fetch_assoc($res);
unlink("../../images/".$row['avater']);
$querydel="DELETE FROM `members`
WHERE member_id='$id'";
// die("heelo2");
mysqli_query($conn,$querydel) OR die('query failed');
header('location:all-member.php?msg=sucessdele');