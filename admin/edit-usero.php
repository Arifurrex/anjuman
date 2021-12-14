<?php include "header.php"; ?>
<?php
   require_once "../includes/dbh.inc.php";
   $id=$_GET['id'];
   $que="SELECT * FROM user WHERE user_id='$id'";
   $resl=mysqli_query($conn,$que) or die("query failed");
   $row=mysqli_fetch_assoc($resl);
?>
  <div class="admin-content">        
  <div class="contact__form">    
        <form action="../includes/update-user.inc.php?id=<?= $row['user_id'] ?>" method="post" autocomplete="off">
             <div class="add-user-header">
                 <h4 class="admin-heading">Edit user</h4>
             </div>
          <div class="from-control paragraph">
            <input type="text" placeholder="frist-name" name="first_name" value="<?= $row['first_name'] ?>"/>
          </div>
          <div class="from-control paragraph">
            <input type="text" placeholder="last-name"  name="last_name" value="<?= $row['last_name'] ?>"/>
          </div>
          <div class="from-control paragraph">
            <input type="text" placeholder="username"  name="username" value="<?=$row['username']?>"/>
          </div>
          <div class="from-control paragraph">
          <input type="text" placeholder="password"  name="password" value="<?=$row['password']?>"/>
          </div>
          <div class="from-control paragraph">
            <select name="role" id="" value="" required>
            <option selected value="" disabled><?=$row['role']?></option>
            <option value="1">admin</option>
            <option value="2">normal user</option>
            </select>
          </div>
          <div class="from-control">
            <input type="submit" value="Update post" name="submit" class="btn" />
          </div>
        </form>
   </div>
                  <!--/Form -->
 
          
  </div>
<?php include "footer.php"; ?>

