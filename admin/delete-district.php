<?php
include "../includes/dbh.inc.php";
$id=$_GET['id'];
$sql="delete from district where district_id='$id';";
$resl=mysqli_query($conn,$sql) or die('query failed.');
header('location:alldistrict.php?msg=delete');
