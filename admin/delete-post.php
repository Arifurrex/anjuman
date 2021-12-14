<?php
include "../includes/dbh.inc.php";
$poid=$_GET['poid'];
$caid=$_GET['caid'];
$sqli="select * from post  where post_id='$poid'";
$resl=mysqli_query($conn,$sqli) or die('query failed.');
$row=mysqli_fetch_assoc($resl);
unlink("../images/".$row['post_img']);
$sql="delete from post where post_id='$poid';";
$sql.="update category set post=post-1 where category_id='$caid'";
if(mysqli_multi_query($conn,$sql)){
    header('location:http://anjumanehefajoth.com/admin/all-post.php?msg=delete');
}else{
    echo 'queri failed!!';
}