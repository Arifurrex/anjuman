<?php
if(isset($_POST['submit'])){

 require_once 'dbh.inc.php';
 require_once 'funtcion.inc.php';

 $writter_name = $_POST['writter_name'];
 if(emptyinputwritter($writter_name) == !false ){
      header('location:../admin/newsWritter/add-writter.php?error=emptyinput');
      exit();
 }
  insewritter($writter_name,$conn);

}else{
  header('location:../admin/newsWritter/add-writter.php');
  exit();
}
 
