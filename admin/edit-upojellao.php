<?php
session_start();
if ($_SESSION["role"] == 0) {
    header('location:http://anjumanehefajoth.com/admin?error=loginfirs');
    exit();
}
?>
<?php include "header.php";?>
<?php
require_once '../includes/dbh.inc.php';
$id = $_GET['id'];
$sqli = "select * from upojella where upojella_id='$id'";
$result = mysqli_query($conn, $sqli) or die('query failed');
$row = mysqli_fetch_assoc($result);
?>
  <div class="admin-content">
  <div class="contact__form">
        <form action="../includes/updateupojella.inc.php?id=<?=$row['upojella_id']?>" method="post" autocomplete="off">
             <div class="add-user-header">
                 <h4 class="admin-heading">Edit upojella</h4>
             </div>
          <div class="from-control paragraph">
            <input type="text" placeholder="upojella_name" name="upojella_name" value="<?=$row['upojella_name']?>"/>
          </div>
          <?php $sqli="select * from district ";
         $resultdistrict=mysqli_query($conn,$sqli) or die('query failed');
          ?>
          <div class="from-control paragraph">
            <select name="district_id" id="" required>
            <?php while($row4=mysqli_fetch_assoc($resultdistrict)){?>
              <option selected value="<?=$row4['id']?>" ><?=$row4['district_name']?></option>
            <option value="<?=$row4['id']?>"><?=$row4['district_name']?></option>
              <?php }?>
            </select>
          </div>
           

           <div class="from-control">
            <input type="submit" value="Update upojella" name="submit" class="btn" />
          </div>
        </form>
   </div>
  <!--/Form -->


  </div>
<?php include "footer.php";?>

