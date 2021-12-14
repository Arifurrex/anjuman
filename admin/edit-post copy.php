<?php include "header.php"; ?>
<?php
   require_once "../includes/dbh.inc.php";
   $id=$_GET['id'];
   $que="SELECT * FROM post 
   left join category on post.category=category.category_id
   left join user on post.author=user.user_id
   WHERE post_id='$id'";
   $resl=mysqli_query($conn,$que) or die("query failed");
   $row=mysqli_fetch_assoc($resl);
?>
  <div class="admin-content">        
  <div class="contact__form">    
        <form action="../includes/update-post.inc.php?id=<?=$row['post_id'] ?>" method="post" autocomplete="off" enctype="multipart/form-data">
             <div class="add-user-header">
                 <h4 class="admin-heading">Edit Post</h4>
             </div>
          <div class="from-control paragraph">
            <input type="text" placeholder="title" name="title" value="<?= $row['title'] ?>"/>
          </div>
          <div class="from-control paragraph">
            <input type="text" placeholder="description"  name="description" value="<?= $row['description'] ?>"/>
          </div>
          <?php
          require_once '../includes/dbh.inc.php';
          $sqli="SELECT * FROM category";
          $resu=mysqli_query($conn,$sqli) or die("query failed.");
          ?>
          <div class="from-control paragraph">
            <select name="category" id="" required>
            <option selected ><?=$row['category_name']?></option>
            <?php
          while($rowd=mysqli_fetch_assoc($resu)){ ?>
            echo'<option  value="<?= $rowd['category_id']?>"><?= $rowd['category_name']?></option>' 
          <?php
          }?>
         </select>
          </div>
          <div class="from-control paragraph">
          <img src="../images/<?=$row['post_img']?>" alt="" style="height:220px">
            <input type="hidden"  name="old_post_img" value="<?=$row['post_img']?>"/>
          </div>
          <div class="from-control paragraph">
            <input type="file" placeholder="image" name="post_img" value="<?=$row['post_img']?>"/>
          </div>
          <div class="from-control">
            <input type="submit" name="submit" class="btn" />
          </div>
        </form>
   </div>
                  <!--/Form -->
 
          
  </div>
<?php include "footer.php"; ?>

