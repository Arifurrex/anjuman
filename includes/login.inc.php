<?php
if($_POST['login']){
    die("done");
    require_once 'dbh.inc.php';
    die("done");
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $pasi=mysqli_real_escape_string($conn,$_POST['password']);
    
    $loginquer="select * from user where username = ?; ";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$loginquer)){
        header('location:https://www.anjumanehefajoth.com/admin?error=stmt failed');
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$username);
    mysqli_stmt_execute($stmt);
    $resultda=mysqli_stmt_get_result($stmt);
    if($row=mysqli_fetch_assoc($resultda)){
           $dapas= $row['password'];
           $dausername= $row['username'];
           $darole= $row['role'];
           $dauser_id= $row['user_id'];

           if (password_verify($pasi, $dapas)) {
               session_start();
               $_SESSION["username"]=$dausername;
               $_SESSION["role"]=$darole;
               $_SESSION["user_id"]=$dauser_id;
                 header('location:../admin/post/all-post.php?success');
                 
           } else {
                header('location:https://www.anjumanehefajoth.com/admin?error=invalidpass');
                 exit();
           }

    }else{
        header('location:https://www.anjumanehefajoth.com/admin?error=invaliduser');
        exit();
    }
}else{
    header('location:https://www.anjumanehefajoth.com/admin?error=invalid');
                 exit();
}
