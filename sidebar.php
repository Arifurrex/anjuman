
<div class="righside">
            <!-- search div start from here -->
            <div class="search">
                <h4 class="search__title">এখানে খোঁজ করুন </h4>
                <form class="fromcontrol" action="https://www.anjumanehefajoth.com/search.php" method="get">
                    <input type="search" placeholder="" name="search" class="seachinp" >
                    <input type="submit" class="btn1" value="খুঁজুন">
                </form>
                
            </div>
            <!-- recent post start from here  -->
 <?php
require_once 'includes/dbh.inc.php';
$sqlre="select * from post 
         left join category on post.category=category.category_id
         left join user on post.author=user.user_id 
         order by post_id desc
         limit 4";
        $resu=mysqli_query($conn,$sqlre) or die('query failed');       
        ?>
            <div class="recenpost">
                <h4 class="recenpost__title">সাম্প্রতিক পোস্ট</h4>
                <?php 
                while($ro=mysqli_fetch_assoc($resu)){
                    ?>
                  <div class="rpos">
                <div class="rpos__lefside">
                    <img src="images/<?=$ro['post_img']?> " alt="" class="rpos__image">
                </div>
                <div class="rpos__righside">
                    
                    <h4 class="pos__title paragraph"><?=$ro['title']?> </h4>
                    <div class="tagline">
                        <div class="category"><i class="fas fa-tags"></i><?=$ro['category_name']?></div>
                        <div class="date"><i class="fa fa-calendar" aria-hidden="true"></i><?=$ro['post_date']?></div>
                    </div>
                    
                </div>
               </div> 
                <?php    
                }
                ?>
                          
            </div>
             
 </div>