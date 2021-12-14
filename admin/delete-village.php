<?php
include "../includes/dbh.inc.php";
$id=$_GET['id'];
$sql="delete from village where village_id='$id';";
$resl=mysqli_query($conn,$sql) or die('query failed.');
header('location:../admin/village.php?msg=delete');
