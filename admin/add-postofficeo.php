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
    <form action="../includes/add-postoffice.inc.php" method="post" autocomplete="on">
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
                 <h4 class="admin-heading">Add New union</h4>
             </div>
          <div class="from-control paragraph">
            <input type="text" placeholder="union_name" name="postoffice_name"/>
          </div>
          <?php $sqli="select * from upojella ";
         $resultupojella=mysqli_query($conn,$sqli) or die('query failed');
        ?>
          <div class="from-control paragraph">
            <select name="upojella_id" id="" required>
            <option selected value="" disabled>select upojella </option>
            <?php while($row4=mysqli_fetch_assoc($resultupojella)){?>
            <option value="<?=$row4['upojella_id']?>"><?=$row4['upojella_name']?></option>
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

