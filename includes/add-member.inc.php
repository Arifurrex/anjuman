<?php 
require_once "dbh.inc.php";
require_once "funtcion.inc.php";
if(isset($_FILES['avater'])){
  $errors=array();
  $imagename=$_FILES['avater']['name'];
  $imagetype=$_FILES['avater']['type'];
  $imagetmp_name=$_FILES['avater']['tmp_name'];
  $imageerror=$_FILES['avater']['error'];
  $imagesize=$_FILES['avater']['size'];
  $fi_ext=explode('.',$imagename);
  $file_ext=end($fi_ext);
  $extensions=array("jpeg","jpg","png");
  if(in_array($file_ext,$extensions) === false){
       $errors[]="this extension file not allowed, please choose jpg,jpeg or png";
  }
  if($imagesize > 2097152){
         $errors[]="file size must be 2mb or lower";
  }
 }
 if(empty($errors)){
      move_uploaded_file($imagetmp_name,"../images/".$imagename);
 }else{
      print_r($errors);
      die();
 }
if(isset($_POST['submit'])){
  $firstName=mysqli_real_escape_string($conn,$_POST['first_name']);
  $lastName=mysqli_real_escape_string($conn,$_POST['last_name']);
  $username=$firstName." ".$lastName;
  $fathername=mysqli_real_escape_string($conn,$_POST['father_name']);
  $phone=mysqli_real_escape_string($conn,$_POST['phone']);
  $email=mysqli_real_escape_string($conn,$_POST['email']);
  $villageid=mysqli_real_escape_string($conn,$_POST['village_id']);
  $postofficeid=mysqli_real_escape_string($conn,$_POST['postoffice_id']);
  $upojellaid=mysqli_real_escape_string($conn,$_POST['upojella_id']);
  $districtid=mysqli_real_escape_string($conn,$_POST['district_id']);
  $divisionid=mysqli_real_escape_string($conn,$_POST['id']);
  $ip=$_SERVER['REMOTE_ADDR'];
  $avater=$imagename;
  $position=mysqli_real_escape_string($conn,$_POST['position']);
  $nid=mysqli_real_escape_string($conn,$_POST['nid']);
  $blood=mysqli_real_escape_string($conn,$_POST['blood_group_id']);
  
  
  // if (emptyInputaddmember($firstName,$lastName,$fathername,$phone,$villageid,$postofficeid,$upojellaid,$districtid,$position) !== false){
  //   header('location:../admin/add-user.php?msg=emptyinpute');
  //   exit();
  // }
  // ====
  // if(invalidfirstname($firstName) !== false){
  //   header('location:../admin/add-user.php?msg=invalidfirstname');
  //   exit();
  // }
 
  // if(invalidlastName($lastName) !== false){
  //   header('location:../admin/add-user.php?msg=invalidlastName');
  //   exit();
  // }
 
  createmember($conn,$firstName,$lastName,$username,$fathername,$phone,$email,$villageid,$postofficeid,$upojellaid,$districtid,$divisionid,$ip,$avater,$position,$nid,$blood);

}else{
    header('../admin/add-user.php');
    exit();
}

