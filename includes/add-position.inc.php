<?php
if(isset($_POST['submit'])){
  $position_name=$_POST['position_name'];
 require_once '../includes/dbh.inc.php';
 require_once '../includes/funtcion.inc.php';
 if(emptyinputposition($position_name) == !false ){
      header('location:http://anjumanehefajoth.com/admin/add-position.php?error=emptyinput');
      exit();
 }
  inseposition($position_name,$conn);

}else{
  header('location:http://anjumanehefajoth.com/admin/add-position.php');
  exit();
}
 

