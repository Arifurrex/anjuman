<?php
session_start();
if(isset($_FILES['post_img'])){
     $errors=array();

     $imagename=$_FILES['post_img']['name'];
     $imagetype=$_FILES['post_img']['type'];
     $imagetmp_name=$_FILES['post_img']['tmp_name'];
     $imageerror=$_FILES['post_img']['error'];
     $imagesize=$_FILES['post_img']['size'];
     $fi_ext=explode('.',$imagename);
     $file_ext=end($fi_ext);
     $extensions=array("jpeg","jpg","png","bmp");
     if(in_array($file_ext,$extensions) === false){
          $errors[]="this extension file not allowed, please choose jpg or png";
     }

     // if($imagesize > 2097152){
     //        $errors[]="file size must be 2mb or lower";
     // }
    }
    if(empty($errors)){
         move_uploaded_file($imagetmp_name,"../images/".$imagename);
    }else{
         print_r($errors);
         die();
    }
if(isset($_POST['submit'])){  
  $title=htmlspecialchars($_POST['title'], ENT_NOQUOTES, 'UTF-8');
  $descri=htmlspecialchars($_POST['description'], ENT_NOQUOTES, 'UTF-8');
 require_once '../includes/dbh.inc.php';
 require_once '../includes/funtcion.inc.php';
 if(emptyinputabout($title,$descri) == !false ){
      header('location:http://anjumanehefajoth.com/admin/add-about.php?error=emptyinput');
      exit();
 }
  inserabout($title,$descri,$imagename,$conn);
 }else{
  header('location:http://anjumanehefajoth.com/admin/add-about.php');
  exit();
 }
 