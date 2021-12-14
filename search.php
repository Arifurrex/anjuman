<?php include 'header.php'; ?>
<?php
include 'includes/dbh.inc.php';
$limit=3;
if(isset($_GET['search'])){
    $search=mysqli_real_escape_string($conn,$_GET['search']) ;

}
if(isset($_GET['page'])){
    $page=$_GET['page'];
}else{
    $page=1;
}

$offset=($page-1)*$limit;
$sql="select * from post 
      left join category on post.category=category.category_id
      left join user on post.author=user.user_id
      where title like '%$search%' OR
      description like '%$search%' OR
      user.username like '%$search%' OR
      category.category_name like '%$search%' 
      limit $limit";
$resl=mysqli_query($conn,$sql) or die('quer failed'); 
// $row=mysqli_fetch_assoc($resl);
?>
<section class="news">
     <div class="title">
     <?php 
        if(mysqli_num_rows($resl)){
            echo '<h3>search: '.$_GET['search'].'</h3>';
        }else{
            echo '<h1>search:not found</h1>';
        }
        ?>
    </div>
    <main>
        <div class="lefside">
            <!-- == -->
            <?php
            while($row=mysqli_fetch_assoc($resl)){ ?>
             <div class="pos">
                <div class="pos__lefside">
                    <img src="images/<?=$row['post_img']?>" alt="" class="pos__image">
                </div>
                <div class="pos__righside">
                    <h4 class="pos__title"><a href="http://anjumanehefajoth.com/single.php?id=<?=$row['post_id']?>"> <?=$row['title']?></a></h4>
                    <div class="tagline paragraph"> 
                        <div class="category"><a href="http://anjumanehefajoth.com/category.php?catid=<?=$row['category']?>"><i class="fas fa-tags"></i><?=$row['category_name']?></a></div>
                        <div class="author"><a href="http://anjumanehefajoth.com/author.php?author=<?=$row['author']?>"><i class="fa fa-user" aria-hidden="true"></i><?=$row['username']?></a></div>
                        <div class="date"><i class="fa fa-calendar" aria-hidden="true"></i><?=$row['post_date']?></div>
                    </div>
                    <div class="pos__paragraph paragraph"><?=substr($row['description'],0,150)."...";?></div>
                </div>
            </div>
 
            <?php      
              }
            ?>
            
            
           
            <!-- == -->
            <div class="paginatinon">
            <?php
            $sqlll="select * from post";
            $re=mysqli_query($conn,$sqlll) or die('query failed');
            $row=mysqli_fetch_assoc($re);
            $num=mysqli_num_rows($re);
            $total_pa=$num/5;
            $total_page=ceil($total_pa);
            for($i=1;$i<=$total_page;$i++){
                if(isset($_GET['page'])){
                    if($_GET['page']==$i){
                        $active='active';
                    }else{
                        $active="";
                    }
                }else{
                    $active="";
                }
                echo'<div class=" btn btn1 p1 '.$active.'"><a href="http://anjumanehefajoth.com/index?page='.$i.'">'.$i.'</a></div>'; 
            }
            ?>   
             </div>
             
        </div>
        <!-- ====================================== -->
        <?php
        include 'sidebar.php';
        ?>
    </main>
    </section>
<?php include 'footer.php'; ?>
