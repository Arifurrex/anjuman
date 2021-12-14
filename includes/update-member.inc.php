<?php
require_once "dbh.inc.php";
require_once "funtcion.inc.php";
$id=$_GET['id'];
// for image 
if(empty($_FILES['new_avater']['name'])){
     $imagename=$_POST['old_avater'];
}else{
     $errors=array();
  $imagename=$_FILES['new_avater']['name'];
  $imagetype=$_FILES['new_avater']['type'];
  $imagetmp_name=$_FILES['new_avater']['tmp_name'];
  $imageerror=$_FILES['new_avater']['error'];
  $imagesize=$_FILES['new_avater']['size'];
  $fi_ext=explode('.',$imagename);
  $file_ext=end($fi_ext);
  $extensions=array("jpeg","jpg","png");
  if(in_array($file_ext,$extensions) === false){
       $errors[]="this extension file not allowed, please choose jpg or png";
  }
  if($imagesize > 2097152){
         $errors[]="file size must be 2mb or lower";
  }
  if(empty($errors)){
     move_uploaded_file($imagetmp_name,"../images/".$imagename);
}else{
     print_r($errors);
     die();
}
}


// image end 

if(isset($_POST['submit'])){
  $firstName=mysqli_real_escape_string($conn,$_POST['first_name']);
  $lastName=mysqli_real_escape_string($conn,$_POST['last_name']);
  $username=$firstName.$lastName;
  $fathername=mysqli_real_escape_string($conn,$_POST['father_name']);
  $phone=mysqli_real_escape_string($conn,$_POST['phone']);
  $email=mysqli_real_escape_string($conn,$_POST['email']);
  $villageid=mysqli_real_escape_string($conn,$_POST['village_id']);
  $postofficeid=mysqli_real_escape_string($conn,$_POST['post_office_id']);
  $upojellaid=mysqli_real_escape_string($conn,$_POST['upojella']);
  $districtid=mysqli_real_escape_string($conn,$_POST['district_id']);
  $ip=$_SERVER['REMOTE_ADDR'];
  $avater=$imagename;
  $position=mysqli_real_escape_string($conn,$_POST['position']);
  $nid=mysqli_real_escape_string($conn,$_POST['nid']);
  $blood_group_id=mysqli_real_escape_string($conn,$_POST['blood_group_id']);

//   $sqllupmember="UPDATE `members` SET `first_name`='$firstName',`last_name`='$lastName',`username`='$username',`father_name`='$fathername',`phone`='$phone',`email`='$email',`village_id`='$villageid',`post_office_id`='$postofficeid',`upojella_id`='$upojellaid',`district_id`='$districtid',`ip_address`='$ip',`avater`='$avater',`position`='$position',`nid`='$nid',`blood_group_id`='$blood_group_id' where `member_id`='$id'";
  $sqllupmember="UPDATE `members` SET `first_name`='$firstName',`last_name`='$lastName',`username`='$username',`father_name`='$fathername',`phone`='$phone',`email`='$email',`district_id`='$districtid',`upojella`='$upojellaid',`post_office_id`='$postofficeid',`blood_group_id`='$blood_group_id',`ip_address`='$ip',`avater`='$imagename',`position`='$position' where `member_id`='$id'";
  

  mysqli_query($conn,$sqllupmember) or die("query failed");
  header('location:http://anjumanehefajoth.com/admin/all-member.php?msg=updamembers');                                
}