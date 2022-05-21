<?php
session_start();
if(isset($_POST['submit'])){  
  $title=htmlspecialchars($_POST['title'], ENT_NOQUOTES, 'UTF-8');
  $descri= htmlspecialchars($_POST['description'], ENT_NOQUOTES, 'UTF-8');
  $category=$_POST['category'];
  $post_date=date('d M Y');
  $author=$_SESSION["user_id"];
     require_once '../includes/dbh.inc.php';
     require_once '../includes/funtcion.inc.php';
     if(emptyinput($title,$descri,$category) == !false ){
          header('location:http://anjumanehefajoth.com/admin/add-post.php?error=emptyinput');
          exit();
     }
     insertpost($title,$descri,$category,$post_date,$author,$imagename,$conn);
     }else{
     header('location:http://anjumanehefajoth.com/admin/add-post.php');
     exit();
     }
 