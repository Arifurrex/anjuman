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
$sqli = "select * from postoffice 
left join upojella on postoffice.upojella_id=upojella.upojella_id
where postoffice_id='$id'";
$result = mysqli_query($conn, $sqli) or die('query failed');
$row = mysqli_fetch_assoc($result);
?>
  <div class="admin-content">
  <div class="contact__form">
        <form action="../includes/updatepostoffice.inc.php?id=<?=$row['postoffice_id']?>" method="post" autocomplete="off">
             <div class="add-user-header">
                 <h4 class="admin-heading">Edit postoffice</h4>
             </div>
          <div class="from-control paragraph">
            <input type="text" placeholder="postoffice_name" name="postoffice_name" value="<?=$row['postoffice_name']?>"/>
          </div>
          <?php
          $sqli="select * from upojella";
          $resultupojella=mysqli_query($conn,$sqli) or die('query failed');

        ?>
          <div class="from-control paragraph">
            <select name="upojella_id" id="" required>
            <option selected ><?=$row['upojella_name']?></option>
            <?php while($rowup=mysqli_fetch_assoc($resultupojella)){?>
              <option value="<?=$rowup['upojella_id']?>" ><?=$rowup['upojella_name']?></option>
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

