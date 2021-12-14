<?php 
require_once "dbh.inc.php";
require_once "funtcion.inc.php";
if(isset($_POST['submit'])){
  $firstName=mysqli_real_escape_string($conn,$_POST['first_name']);
  $lastName=mysqli_real_escape_string($conn,$_POST['last_name']);
  $username=mysqli_real_escape_string($conn,$_POST['username']);
  $pas=mysqli_real_escape_string($conn,$_POST['password']);
  $role=mysqli_real_escape_string($conn,$_POST['role']);
  
  
  if (emptyInputadduser($firstName,$lastName,$username,$pas,$role) !== false){
    header('location:../admin/add-user.php?msg=emptyinpute');
    exit();
  }
  // ====
  if(invalidfirstname($firstName) !== false){
    header('location:../admin/add-user.php?msg=invalidfirstname');
    exit();
  }
 
  if(invalidlastName($lastName) !== false){
    header('location:../admin/add-user.php?msg=invalidlastName');
    exit();
  }
  if(usernametaken($username,$conn) !== false){
    header('location:../admin/add-user.php?msg=usernametaken');
    exit();
  }
  if(invalidpas($pas) !== false){
    header('location:../admin/add-user.php?msg=invalidpas');
    exit();
  }
 
  createUser($conn,$firstName,$lastName,$username,$pas,$role);

}else{
    header('../admin/add-user.php');
    exit();
}

