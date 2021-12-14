<?php
session_start();
if($_SESSION['role'] == 0){
  header('location:../admin/index.php');
  exit();
}
?>
<?php include "header.php"; ?>
  <div class="admin-content">        
  <div class="contact__form"> 
    <form action="../includes/add-upojella.inc.php" method="post" autocomplete="on">
    <?php
    if(isset($_GET['msg'])){
      echo'<div class="alert">';
      if($_GET['msg'] =='emptyinpute'){
        echo"please fill all input"; 
     }else if($_GET['msg']=='invalidfirstname'){
       echo"please fill valid firstname";
     }else if($_GET['msg']=='invalidlastName'){
       echo"please fill valid lastName";
     }else if($_GET['msg']=='usernametaken'){
     echo"username is taken";
     }else if($_GET['msg']=='invalidpas'){
      echo"password must be 8 character";
      }
      echo'<span class="closebtn" id="closebtn"onclick="this.parentElement.style.display='.'none'.';" >&times;</span>
     </div>';
    }
     ?>
             <div class="add-user-header">
                 <h4 class="admin-heading">Add New upojella</h4>
             </div>
          <div class="from-control paragraph">
            <input type="text" placeholder="upojella_name" name="upojella_name"/>
          </div>

          <?php $sqli="select * from district ";
          $resultdistrict=mysqli_query($conn,$sqli) or die('query failed');
          ?>
          <div class="from-control paragraph">
            <select name="district_id" id="" required>
            <option selected value="" disabled>select district </option>
            <?php while($row4=mysqli_fetch_assoc($resultdistrict)){?>
            <option value="<?=$row4['id']?>"><?=$row4['district_name']?></option>
              <?php }?>
            </select>
          </div>
          <div class="from-control">
            <input type="submit" value="save" name="submit" class="btn" />
          </div>
        </form>
   </div>
                  <!--/Form -->
 
          
  </div>
<?php include "footer.php"; ?>

