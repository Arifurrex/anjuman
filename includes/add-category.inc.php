<?php
if(isset($_POST['submit'])){
  $category_name=$_POST['category_name'];
 require_once 'dbh.inc.php';
 require_once 'funtcion.inc.php';
 if(emptyinputcategory($category_name) == !false ){
      header('location:../admin/category/add-category.php?error=emptyinput');
      exit();
 }
  insecategory($category_name,$conn);

}else{
  header('location:../admin/category/add-category.php');
  exit();
}
 
