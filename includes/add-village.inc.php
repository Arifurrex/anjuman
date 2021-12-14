<?php
if(isset($_POST['submit'])){
  $village_name=$_POST['village_name'];
 require_once '../includes/dbh.inc.php';
 require_once '../includes/funtcion.inc.php';
 if(emptyinputvillage($village_name) == !false ){
      header('location:http://anjumanehefajoth.com/admin/add-village.php?error=emptyinput');
      exit();
 }
  insertvillage($village_name,$conn);
  
}else{
  header('location:http://anjumanehefajoth.com/admin/add-village.php');
  exit();
}
 
