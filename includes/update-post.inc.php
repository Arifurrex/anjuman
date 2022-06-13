<?php
require_once "../includes/dbh.inc.php";
if(isset($_FILES['post_img'])){
   $name=$_FILES['post_img']['name'];
   $type=$_FILES['post_img']['type'];
   $tmp_name=$_FILES['post_img']['tmp_name'];
   $error=$_FILES['post_img']['error'];
   $size=$_FILES['post_img']['size'];
   move_uploaded_file($tmp_name,"../images/".$name);
}else{
    $name=$_POST['old_post_img'];
}
$id=$_GET['id'];
$title=$_POST['title'];
$description=$_POST['description'];
$category=$_POST['category'];
$writter = $_POST['writter'];
// $post_img=$_POST['post_img'];
$sql="UPDATE `post` SET `title`='$title',`description`='$description',`category`='$category',`writter`='$writter',`post_img`='$name' WHERE `post_id`='$id'";
mysqli_query($conn,$sql);
header('location:../admin/post/all-post.php?msg=update');
exit();