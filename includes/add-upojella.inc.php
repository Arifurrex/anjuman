<?php
if(isset($_POST['submit'])){
  $upojella_name=$_POST['upojella_name'];
  $district_id=$_POST['district_id'];
 require_once '../includes/dbh.inc.php';
 require_once '../includes/funtcion.inc.php';
 if(emptyinputupojella($upojella_name) == !false ){
      header('location:http://anjumanehefajoth.com/admin/add-upojella.php?error=emptyinput');
      exit();
 }
  inseupojella($upojella_name,$district_id,$conn);

}else{
  header('location:http://anjumanehefajoth.com/admin/add-upojella.php');
  exit();
}
 
