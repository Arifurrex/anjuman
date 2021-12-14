<?php
if(isset($_POST['submit'])){
  $category_name=$_POST['category_name'];
 require_once '../includes/dbh.inc.php';
 require_once '../includes/funtcion.inc.php';
 if(emptyinputcategory($category_name) == !false ){
      header('location:http://anjumanehefajoth.com/admin/add-category.php?error=emptyinput');
      exit();
 }
  insecategory($category_name,$conn);

}else{
  header('location:http://anjumanehefajoth.com/admin/add-category.php');
  exit();
}
 
