<?php
if(isset($_POST['submit'])){
  $postoffice_name=$_POST['postoffice_name'];
  $upojella_id=$_POST['upojella_id'];
 require_once '../includes/dbh.inc.php';
 require_once '../includes/funtcion.inc.php';
 if(emptyinputpostoffice($postoffice_name) == !false ){
      header('location:http://anjumanehefajoth.com/admin/add-postoffice.php?error=emptyinput');
      exit();
 }
  insepostoffice($postoffice_name,$upojella_id,$conn);

}else{
  header('location:http://anjumanehefajoth.com/admin/add-postoffice.php');
  exit();
}
 
