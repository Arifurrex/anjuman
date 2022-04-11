<?php include 'header.php'; 
include '../includes/dbh.inc.php';
$id=$_GET['id'];
   $sql="select * from post 
   left join category on post.category=category.category_id
   left join user on post.author=user.user_id
   where post_id=$id";
   $resl=mysqli_query($conn,$sql) or die('quer failed'); 
   
?>
<section class="news container">
     <div class="title">
     <h3>সংবাদ</h3>
    <p class="subtitle">সত্য ও সুন্দরের পথে </p>
    </div>
    <main>
        <div class="lefside">
        <?php
          while($row=mysqli_fetch_assoc($resl)){
              ?>
            <div class="single-pos">
            <div class="single-pos__lefside">
            <h3 class="single-pos__title"><?= $row['title']?></h3>
                <div class="tagline paragraph">
                    <div class="category"><i class="fas fa-tags"></i><?= $row['category_name']?></div>
                    <div class="author"><i class="fa fa-user" aria-hidden="true"></i><?= $row['username']?></div>
                    <div class="date"><i class="fa fa-calendar" aria-hidden="true"></i><?= $row['post_date']?></div>
                </div>
                
            </div>
            <div class="single-pos__righside">
            <img src="../images/<?=$row['post_img']?>" alt="" class="pos__image">
                <div class="pos__paragraph paragraph">
                    <p><?= $row['description']?></p>
                </div>
            </div>
        </div>
        <?php
          }
        ?>
          
            <!-- == -->
            
             
        </div>
        <!-- ====================================== -->
        <?php
        include 'sidebar.php';
        ?>
    </main>
</section>
<?php include 'footer.php'; ?>
