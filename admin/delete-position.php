<?php
include "../includes/dbh.inc.php";
$id=$_GET['id'];
$sql="delete from position
 where position_id='$id';";
$resl=mysqli_query($conn,$sql) or die('query failed.');
header('location:http://anjumanehefajoth.com/admin/position.php?msg=delete');
