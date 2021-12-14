<?php
if(isset($_POST['districtsubmit'])){
  $district_name=$_POST['district_name'];
  $division_id=$_POST['division_id'];
 require_once '../includes/dbh.inc.php';
 require_once '../includes/funtcion.inc.php';
 if(emptyinputcategory($district_name) == !false ){
      header('location:http://anjumanehefajoth.com/admin/add-category.php?error=emptyinput');
      exit();
 }
  insedistrict($district_name,$division_id,$conn);

}else{
  header('location:http://anjumanehefajoth.com/admin/add-district.php');
  exit();
}
 
