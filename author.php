<?php include 'header.php'; ?>
<?php
include 'includes/dbh.inc.php';

$author=$_GET['author'];
$limit=3;
if(isset($_GET['page'])){
    $page=$_GET['page'];
}else{
    $page=1;
}
// offset mane holo kotha thake soro korbo 
$offset=($page-1)*$limit;
$sql="select * from post 
      left join category on post.category=category.category_id
      left join user on post.author=user.user_id
      where author=$author
      limit $offset,$limit";
$resl=mysqli_query($conn,$sql) or die('quer failed'); 

?>
<section class="news">
     <div class="title">
     <h3><?=$row['username']?></h3>
    <p class="subtitle">সত্য ও সুন্দরের পথে </p>
    </div>
    <main>
        <div class="lefside">
        <!-- <div class="lefside__header">
        <h1>author</h1>
        </div> -->
            <!-- == -->
            <?php
            while($row=mysqli_fetch_assoc($resl)){
                $num1=$row['post']; ?>
             <div class="pos">
                <div class="pos__lefside">
                    <img src="images/<?=$row['post_img']?>" alt="" class="pos__image">
                </div>
                <div class="pos__righside">
                    <h4 class="pos__title"><a href="http://anjumanehefajoth.com/single.php?id=<?=$row['post_id']?>"> <?=$row['title']?></a></h4>
                    <div class="tagline paragraph"> 
                        <div class="category"><i class="fas fa-tags"></i><?=$row['category_name']?></div>
                        <div class="author"><i class="fa fa-user" aria-hidden="true"></i><?=$row['username']?></div>
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
            $sqlll="select * from post 
            left join user on post.author=user.user_id
            where author=$author";
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
                echo'<div class=" btn btn1 p1 '.$active.'"><a href="http://anjumanehefajoth.com/author.php?page='.$i.'&author='.$author.'">'.$i.'</a></div>'; 
            }
            ?>   
             </div>
             
        </div>
        <!-- ====================================== -->
        <div class="righside">
            <div class="search">
                <h4 class="search__title">search</h4>
                <div class="fromcontrol">
                <input type="search" placeholder="search" id="label">
                <input type="submit" class="btn1" value="button">
                </div>
            </div>

            <div class="recenpost">
                <h4 class="recenpost__title">RECEN POS</h4>
                <div class="rpos">
                <div class="rpos__lefside">
                    <img src="images/post_1.jpg" alt="" class="pos__image">
                </div>
                <div class="rpos__righside">
                    <h4 class="pos__title paragraph">Lorem ipsum dolor sit </h4>
                    <div class="tagline">
                        <div class="category"><i class="fas fa-tags"></i>php</div>
                        <div class="date"><i class="fa fa-calendar" aria-hidden="true"></i>01 nov 2010</div>
                    </div>
                    <button class="recenpost__but btn">read more</button>
                </div>
               </div>   
                <!-- == --> 
                <div class="rpos">
                <div class="rpos__lefside">
                    <img src="images/post_1.jpg" alt="" class="pos__image">
                </div>
                <div class="rpos__righside">
                    <h4 class="pos__title paragraph">Lorem ipsum dolor sit </h4>
                    <div class="tagline">
                        <div class="category"><i class="fas fa-tags"></i>php</div>
                        <div class="date"><i class="fa fa-calendar" aria-hidden="true"></i>01 nov 2010</div>
                    </div>
                    <button class="recenpost__but btn">read more</button>
                </div>
               </div>   
                <!-- == -->   
                <div class="rpos">
                <div class="rpos__lefside">
                    <img src="images/post_1.jpg" alt="" class="pos__image">
                </div>
                <div class="rpos__righside">
                    <h4 class="pos__title paragraph">Lorem ipsum dolor sit </h4>
                    <div class="tagline">
                        <div class="category"><i class="fas fa-tags"></i>php</div>
                        <div class="date"><i class="fa fa-calendar" aria-hidden="true"></i>01 nov 2010</div>
                    </div>
                    <button class="recenpost__but btn">read more</button>
                </div>
               </div>   
                <!-- == --> 
                <div class="rpos">
                <div class="rpos__lefside">
                    <img src="images/post_1.jpg" alt="" class="pos__image">
                </div>
                <div class="rpos__righside">
                    <h4 class="pos__title paragraph">Lorem ipsum dolor sit </h4>
                    <div class="tagline">
                        <div class="category"><i class="fas fa-tags"></i>php</div>
                        <div class="date"><i class="fa fa-calendar" aria-hidden="true"></i>01 nov 2010</div>
                    </div>
                    <button class="recenpost__but btn">read more</button>
                </div>
               </div>   
                <!-- == --> 
                          
            </div>
        </div>
    </main>
    </section>
<?php include 'footer.php'; ?>
