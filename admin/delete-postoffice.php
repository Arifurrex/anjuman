<?php
include "../includes/dbh.inc.php";
$id=$_GET['id'];
$sql="delete from postoffice where postoffice_id='$id';";
$resl=mysqli_query($conn,$sql) or die('query failed.');
header('location:postoffice.php?msg=delete');
