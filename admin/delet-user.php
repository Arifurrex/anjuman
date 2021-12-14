<?php
require_once "../includes/dbh.inc.php";
$id=$_GET['id'];
$query="DELETE FROM `user` WHERE user_id='$id'";
mysqli_query($conn,$query) OR die('query failed');
header('location:http://anjumanehefajoth.com/admin/all-users.php');