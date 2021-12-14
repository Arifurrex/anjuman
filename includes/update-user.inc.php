<?php
require_once "dbh.inc.php";
require_once "funtcion.inc.php";
$id=$_GET['id'];
if(isset($_POST['submit'])){
  $firstName=mysqli_real_escape_string($conn,$_POST['first_name']);
  $lastName=mysqli_real_escape_string($conn,$_POST['last_name']);
  $username=mysqli_real_escape_string($conn,$_POST['username']);
  $pas=mysqli_real_escape_string($conn,md5($_POST['password']));
  $role=mysqli_real_escape_string($conn,$_POST['role']);
  
  $sqll="UPDATE user SET first_name='$firstName',last_name='$lastName',username=' $username',password='$pas',role='$role' WHERE user_id='$id'";
  mysqli_query($conn,$sqll) or die("query failed");
  header('location:http://anjumanehefajoth.com/admin/all-users.php');
}