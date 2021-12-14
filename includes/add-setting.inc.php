<?php
session_start();

if(isset($_FILES['logo'])){
     $errors=array();

     $imagename=$_FILES['logo']['name'];
     $imagetype=$_FILES['logo']['type'];
     $imagetmp_name=$_FILES['logo']['tmp_name'];
     $imageerror=$_FILES['logo']['error'];
     $imagesize=$_FILES['logo']['size'];
     $fi_ext=explode('.',$imagename);
     $file_ext=end($fi_ext);
     $extensions=array("jpeg","jpg","png");
     if(in_array($file_ext,$extensions) === false){
          $errors[]="this extension file not allowed, please choose jpg or png";
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
     require_once '../includes/dbh.inc.php';
     require_once '../includes/funtcion.inc.php';
  $websitename=mysqli_real_escape_string($conn,$_POST['websitename']);
  $description=mysqli_real_escape_string($conn,$_POST['description']);

 if(emptyinputsetting($websitename,$description) == !false ){
      header('location:http://anjumanehefajoth.com/admin/setting.php?error=emptyinput');
      exit();
 }
  insertsetting($websitename,$description,$imagename,$conn);
 }else{
  header('location:http://anjumanehefajoth.com/admin/setting.php');
  exit();
 }
 