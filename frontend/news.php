<?php
if (file_exists('includes/dbh.inc.php')) {
    include 'includes/dbh.inc.php';
    $sql = "select * from post 
            left join category on post.category=category.category_id
            left join user on post.author=user.user_id 
            where category_id IN (3)
            order by post_id desc";
    $resl = mysqli_query($conn, $sql) or die('quer failed');
    $row = mysqli_fetch_assoc($resl);

    $sqlAlQuran = "select * from post 
            left join category on post.category=category.category_id
            left join user on post.author=user.user_id 
            where category_id IN (20)
            order by post_id asc";
    $reslAlQuran = mysqli_query($conn, $sqlAlQuran) or die('quer failed');
    $rowAlQuran = mysqli_fetch_assoc($reslAlQuran);

    $sqlthird = "select * from post 
                    left join category on post.category=category.category_id
                    left join user on post.author=user.user_id 
                    where category_id IN (4)
                    order by post_id asc";
    $reslthird = mysqli_query($conn, $sqlthird) or die('quer failed');
    $rowthird = mysqli_fetch_assoc($reslthird);
} else {
    echo "file not found";
}
?>
<section class="news">
    <div class="newsPost__container">
        <?php if (!empty($row)) { ?>
            <div class="pos">
                <div class="pos__righside">
                    <div class="category"><a href="http://anjumanehefajoth.com/category.php?catid=<?= $row['category'] ?>"><?= $row['category_name'] ?></a></div>
                    <h4 class="pos__title"><a href="single.php?id=<?= $row['post_id'] ?>"> <?= $row['title'] ?></a></h4>
                    <div class="tagline">
                        <div class="author"><a href="http://anjumanehefajoth.com/author.php?author=<?= $row['author'] ?>"><?= $row['username'] ?></a></div>
                    </div>
                    <div class="pos__paragraph paragraph"><?= substr(htmlspecialchars_decode($row['description']), 0, 450) . "..."; ?></div>
                </div>
            </div>
        <?php } else {
            echo "";
        } ?>
        <?php if (!empty($rowAlQuran)) { ?>
            <div class="pos">
                <div class="pos__righside">
                    <div class="category"><a href="http://anjumanehefajoth.com/category.php?catid=<?= $rowAlQuran['category'] ?>"><?= $rowAlQuran['category_name'] ?></a></div>
                    <h4 class="pos__title"><a href="single.php?id=<?= $rowAlQuran['post_id'] ?>"> <?= $rowAlQuran['title'] ?></a></h4>
                    <div class="tagline">
                        <div class="author"><a href="http://anjumanehefajoth.com/author.php?author=<?= $rowAlQuran['author'] ?>"><?= $rowAlQuran['username'] ?></a></div>
                    </div>
                    <div class="pos__paragraph paragraph"><?= substr(htmlspecialchars_decode($row['description']), 0, 450) . "..."; ?></div>
                </div>
            </div>
        <?php } else {
            echo "";
        } ?>

        <?php if (!empty($rowthird)) { ?>
            <div class="pos">
                <div class="pos__righside">
                    <div class="category"><a href="http://anjumanehefajoth.com/category.php?catid=<?= $rowthird['category'] ?>"><?= $rowthird['category_name'] ?></a></div>
                    <h4 class="pos__title"><a href="single.php?id=<?= $rowthird['post_id'] ?>"> <?= $rowthird['title'] ?></a></h4>
                    <div class="tagline">
                        <div class="author"><a href="http://anjumanehefajoth.com/author.php?author=<?= $rowthird['author'] ?>"><?= $rowthird['username'] ?></a></div>
                    </div>
                    <div class="pos__paragraph paragraph"><?= substr(htmlspecialchars_decode($row['description']), 0, 450) . "..."; ?></div>
                </div>
            </div>
        <?php } else {
            echo "";
        } ?>

        <?php if (!empty($rowthird)) { ?>
            <div class="pos">
                <div class="pos__righside">
                    <div class="category"><a href="http://anjumanehefajoth.com/category.php?catid=<?= $rowthird['category'] ?>"><?= $rowthird['category_name'] ?></a></div>
                    <h4 class="pos__title"><a href="single.php?id=<?= $rowthird['post_id'] ?>"> <?= $rowthird['title'] ?></a></h4>
                    <div class="tagline">
                        <div class="author"><a href="http://anjumanehefajoth.com/author.php?author=<?= $rowthird['author'] ?>"><?= $rowthird['username'] ?></a></div>
                    </div>
                    <div class="pos__paragraph paragraph"><?= substr(htmlspecialchars_decode($row['description']), 0, 450) . "..."; ?></div>
                </div>
            </div>
        <?php } else {
            echo "";
        } ?>
    </div>
    <div class="newsPost__container newsPost__container--modifier">
        <?php if (!empty($row)) { ?>
            <div class="pos pos--modifier">
                <div class="pos__righside">
                    <div class="category category--modifier">অন্যান্য প্রবন্ধসমূহ</div>
                    <h4 class="pos__title"><a href="single.php?id=<?= $row['post_id'] ?>"> <?= $row['title'] ?></a></h4>
                    <div class="tagline">
                        <div class="author"><a href="http://anjumanehefajoth.com/author.php?author=<?= $row['author'] ?>"><?= $row['username'] ?></a></div>
                    </div>
                    <div class="pos__paragraph paragraph"><?= substr(htmlspecialchars_decode($row['description']), 0, 450) . "..."; ?></div>
                </div>
            </div>
        <?php } else {
            echo "";
        } ?>

        <div class="pos pos--modifier">
            <?php if (!empty($rowthird)) { ?>
                <div class="pos__righside">
                    <div class="category category--modifier"><a href="http://anjumanehefajoth.com/category.php?catid=<?= $rowthird['category'] ?>"><?= $rowthird['category_name'] ?></a></div>
                    <h4 class="pos__title pos__title--modifier"><i class="fa fa-chevron-right" aria-hidden="true"></i><a href="single.php?id=<?= $rowthird['post_id'] ?>"> <?= $rowthird['title'] ?></a></h4>
                    <h4 class="pos__title pos__title--modifier"><i class="fa fa-chevron-right" aria-hidden="true"></i><a href="single.php?id=<?= $rowthird['post_id'] ?>"> <?= $rowthird['title'] ?></a></h4>
                    <h4 class="pos__title pos__title--modifier"><i class="fa fa-chevron-right" aria-hidden="true"></i><a href="single.php?id=<?= $rowthird['post_id'] ?>"> <?= $rowthird['title'] ?></a></h4>
                </div>
            <?php } else {
                echo "";
            } ?>
            <?php if (!empty($rowAlQuran)) { ?>
                <div class="pos__righside">
                    <div class="category category--modifier"><a href="http://anjumanehefajoth.com/category.php?catid=<?= $rowAlQuran['category'] ?>"><?= $rowAlQuran['category_name'] ?></a></div>
                    <h4 class="pos__title pos__title--modifier"><i class="fa fa-chevron-right" aria-hidden="true"></i><a href="single.php?id=<?= $rowAlQuran['post_id'] ?>"> <?= $rowAlQuran['title'] ?></a></h4>
                    <h4 class="pos__title pos__title--modifier"><i class="fa fa-chevron-right" aria-hidden="true"></i><a href="single.php?id=<?= $rowAlQuran['post_id'] ?>"> <?= $rowAlQuran['title'] ?></a></h4>
                    <h4 class="pos__title pos__title--modifier"><i class="fa fa-chevron-right" aria-hidden="true"></i><a href="single.php?id=<?= $rowAlQuran['post_id'] ?>"> <?= $rowAlQuran['title'] ?></a></h4>
                </div>
            <?php } else {
                echo "";
            } ?>
        </div>


        <div class="pos pos--modifier">
            <div class="pos__righside">
                <div class="category category--modifier">প্রচ্ছদ</div>
                <img src="images/1.png" alt="cover">
            </div>
        </div>
       
    </div>
</section>
<!-- </div> -->