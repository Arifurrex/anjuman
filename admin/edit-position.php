<?php
session_start();
if($_SESSION["role"]==0){
	header('location:http://anjumanehefajoth.com/admin?error=loginfirs');
	exit();
}
?>
<?php include "header.php"; ?>
<?php
   require_once '../includes/dbh.inc.php';
   $id=$_GET['id'];
   $sqli="select * from position
     where position_id='$id'";
     $result=mysqli_query($conn,$sqli) or die('query failed');
     $row=mysqli_fetch_assoc($result);
?>
  <div class="admin-content">        
  <div class="contact__form">    
        <form action="../includes/updateposition.php?id=<?= $row['position_id'] ?>" method="post" autocomplete="off">
             <div class="add-user-header">
                 <h4 class="admin-heading">Edit position</h4>
             </div>
          <div class="from-control paragraph">
            <input type="text" placeholder="position_name" name="position_name" value="<?= $row['position_name'] ?>"/>
          </div>
          <!-- <div class="from-control paragraph">
            <select name="role" id="" value="" required>
            <option selected value="" disabled></option>
            <option value="1">admin</option>
            <option value="2">normal user</option>
            </select>
          </div> -->
           <div class="from-control">
            <input type="submit" value="Update position" name="submit" class="btn" />
          </div>
        </form>
   </div>
  <!--/Form -->
 
          
  </div>
<?php include "footer.php"; ?>

