<?php
include "../../includes/dbh.inc.php";
$id=$_GET['id'];
$sql="delete from upojella where upojella_id='$id';";
$resl=mysqli_query($conn,$sql) or die('query failed.');
header('location:upojella.php?msg=delete');
