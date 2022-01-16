<?php
if(file_exists('./includes/dbh.inc.php')){
    include './includes/dbh.inc.php';
    $limit = 6;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $offset = ($page - 1) * $limit;
    $sql = "select * from post 
left join category on post.category=category.category_id
left join user on post.author=user.user_id 
order by post_id desc
limit $offset,$limit";
    $resl = mysqli_query($conn, $sql) or die('quer failed'); 
}else{
    echo "file not found";
} 

?>
<div class="container">

  <section class="news">
      <div class="title">
          <h1>সংবাদ</h1>
          <p class="subtitle">সত্য ও সুন্দরের পথে </p>
        </div>
    <main>
        <div class="lefside" style="--delay: 1s">
            <!-- == -->
            <?php
            while($row=mysqli_fetch_assoc($resl)){ ?>
             <div class="pos">
                <div class="pos__lefside">
                    <img src="images/<?=$row['post_img']?>" alt="" class="pos__image">
                </div>
                <div class="pos__righside">
                    <h4 class="pos__title"><a href="http://anjumanehefajoth.com/single.php?id=<?=$row['post_id']?>"> <?=$row['title']?></a></h4>
                    <div class="tagline "> 
                        <div class="category"><a href="http://anjumanehefajoth.com/category.php?catid=<?=$row['category']?>"><i class="fas fa-tags"></i><?=$row['category_name']?></a></div>
                        <div class="author"><a href="http://anjumanehefajoth.com/author.php?author=<?=$row['author']?>"><i class="fa fa-user" aria-hidden="true"></i><?=$row['username']?></a></div>
                        <div class="date"><i class="fa fa-calendar" aria-hidden="true"></i><?=$row['post_date']?></div>
                    </div>
                    <div class="pos__paragraph paragraph"><?=substr($row['description'],0,950)."...";?></div>
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
            $total_pa=$num/$limit;
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
                echo'<a href="https://www.anjumanehefajoth.com/index?page='.$i.'"><div class=" btn btn1 p1 '.$active.'">'.$i.'</div></a>'; 
            }
            ?>   
             </div>
             
        </div>
        <!-- ====================================== -->
        <?php
        // include 'sidebar.php';
        ?>

    </main>
    </section>
</div>