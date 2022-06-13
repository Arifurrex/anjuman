<?php
session_start();
if(isset($_POST['submit'])){  
  $title=htmlspecialchars($_POST['title'], ENT_NOQUOTES, 'UTF-8');
  $descri= htmlspecialchars($_POST['description'], ENT_NOQUOTES, 'UTF-8');
  $category=$_POST['category'];
  $post_date=date('d M Y');
  $writter = $_POST['writter_id'];
  $tag= $_POST['tag'];

     require_once '../includes/dbh.inc.php';
     require_once '../includes/funtcion.inc.php';

     if(emptyTitle($title) == !false){
          header('location:../admin/post/add-post.php?msg=emptytitle');
          exit();
     }
     if (emptyDescription($descri) == !false) {
          header('location:../admin/post/add-post.php?msg=emptydescription');
          exit();
     }
     if (emptyCategory($category) == !false) {
          header('location:../admin/post/add-post.php?msg=emptycategory');
          exit();
     }
     if(emptyinput($title,$descri,$category,$writter, $tag) == !false ){
          header('location:../admin/post/add-post.php?msg=emptyinput');
          exit();
     }

     insertpost($title,$descri,$category,$post_date,$writter,$tag,$imagename,$conn);
     }else{
     header('location:http://anjumanehefajoth.com/admin/add-post.php');
     exit();
     }
 