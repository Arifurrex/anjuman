<?php
require_once "dbh.inc.php";
function emptyInputadduser($firstName,$lastName,$username,$pas,$role){
    if(empty($lastName) || empty($firstName) || empty($username) || empty($pas) || empty($role)){
       $result=true;
    }else{
        $result=false;
    }
    return $result;
    }

function invalidfirstname($firstName){
    $pattern='/^[a-zA-Z0-9]*$/';
    if(!preg_match($pattern,$firstName)){
      $result=true;
    }else{
        $result=false;
    }
   return $result;
}
function invalidlastName($lastName){
    $pattern='/^[a-zA-Z0-9]*$/';
    if(!preg_match($pattern,$lastName)){
      $result=true;
    }else{
        $result=false;
    }
   return $result;
}
function usernametaken($username,$conn)
{
    $sqli="SELECT * FROM user WHERE username = '$username'";
    $resu=mysqli_query($conn,$sqli) or die("query failed.");
    if($row=mysqli_fetch_assoc($resu)){
        return $row;
    }else{
        $result=false;
        return $result;
    }
    
} 
function invalidpas($pas)
{
    if( !preg_match( '/^[A-Za-z0-9]+/', $pas) || strlen( $pas) < 8)
    {
      $result=true;
    }else{
        $result=false;
    }
    return $result;
}  
// function createUser($conn,$firstName,$lastName,$username,$pas,$role)
// {
//    $quer = "INSERT INTO `user`(`first_name`, `last_name`, `username`, `password`, `role`) 
//    VALUES ('$firstName','$lastName','$username','$pas','$role')";
//    mysqli_query($conn,$quer) OR die('query failed.');
//    header('location:http://localhost:3000/admin/all-users.php?msg=success');
// }


function createUser($conn,$firstName,$lastName,$username,$pas,$role)
{
   $quer = "INSERT INTO `user`(`first_name`, `last_name`, `username`, `password`, `role`) 
   VALUES (?,?,?,?,?)";
   $stmt=mysqli_stmt_init($conn);
//    $hashpwd=$pas;
   $hashpwd=password_hash($pas,PASSWORD_DEFAULT);
   if(!mysqli_stmt_prepare($stmt,$quer)){
     header('location:https://www.anjumanehefajoth.com/admin/add-user.php?error=stmtfailed!!');
   }
   mysqli_stmt_bind_param($stmt,"sssss",$firstName,$lastName,$username,$hashpwd,$role);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);
   header('location:https://www.anjumanehefajoth.com/admin/all-users.php?msg=success');
   exit();
}

// function emptyInputlogin($loginusername,$loginpass){
//     if(empty($loginusername) || empty($loginpass)){
//         $result=true;
//     }else{
//         $result=false;
//     }
//     return $result;
// }
//  function loginuser($conn,$loginusername){
//     $sqlie="SELECT * FROM user WHERE username ='$loginusername' ";
//     mysqli_query($conn,$sqlie) OR die('query failed.');
//     session_start();
//     $_SESSION['username']='$loginusername';
//     $_SESSION['password']='$loginpass';
//     header('location:http://localhost:3000/admin/add-user.php?msg=loginsuccess');
//  }

// pos 
function emptyinput($title,$descri,$category){
    if(empty($title) || empty($descri) || empty($category)){
       $result=true;
    }else{
        $result=false;
    }
    return $result;
    }
    function inserpos($title,$descri,$category,$post_date,$author,$imagename,$conn){
         $qu="INSERT INTO `post`(`title`, `description`, `category`, `post_date`, `author`, `post_img`) 
         VALUES ('$title','$descri','$category','$post_date',$author,'$imagename');";
         $qu .="UPDATE `category` SET `post`= post + 1 WHERE `category_id`='$category'";
         mysqli_multi_query($conn,$qu);
         header('location:https://www.anjumanehefajoth.com/admin/all-post.php?msg=success');
    }
//     function inserpos($title,$descri,$category,$post_date,$author,$imagename,$conn){
//         $qu="INSERT INTO `post`(`title`, `description`, `category`, `post_date`, `author`, `post_img`) 
//         VALUES (?,?,?,?,?,?)";
//         $stmt=mysqli_stmt_init($conn);
//         if(!mysqli_stmt_prepare($stmt,$qu)){
//             header('location:http://localhost:3000/admin/add-user.php?error=stmtfailed!!');
//           }
//         mysqli_stmt_bind_param($stmt,"ssssis",$title,$descri,$category,$post_date,$author,$imagename);
//         mysqli_stmt_execute($stmt);
//         mysqli_stmt_close($stmt);
//         header('location:http://localhost:3000/admin/all-post.php?msg=success');
//    }
// function inserpos($title,$descri,$category,$post_date,$author,$imagename,$conn){
//     $qu="INSERT INTO `post`(`title`, `description`, `category`, `post_date`, `author`, `post_img`) 
//     VALUES (?,?,?,?,?,?);";
//     $qu .="UPDATE `category` SET `post`=post+1 WHERE `category_id`=$category";
//     $stmt=mysqli_stmt_init($conn);
//     if(!mysqli_stmt_prepare($stmt,$qu)){
//         header('location:http://localhost:3000/admin/add-user.php?error=stmtfailed!!');
//       }
//     mysqli_stmt_bind_param($stmt,"ssssis",$title,$descri,$category,$post_date,$author,$imagename);
//     mysqli_stmt_execute($stmt);
//     mysqli_stmt_close($stmt);
//     header('location:http://localhost:3000/admin/all-post.php?msg=success');
// }
    // category
    function emptyinputcategory($category_name){
        if(empty($category_name)){
           $result=true;
        }else{
            $result=false;
        }
        return $result;
        }
        function insecategory($category_name,$conn){
             $qur="INSERT INTO `category`( `category_name`) 
             VALUES (?)";
             $stmt=mysqli_stmt_init($conn);
             if(!mysqli_stmt_prepare($stmt,$qur)){
                header('location:https://www.anjumanehefajoth.com/admin/category.php?msg=success');
                exit(); 
             }
             mysqli_stmt_bind_param($stmt,"s",$category_name);
             mysqli_stmt_execute($stmt);
             mysqli_stmt_close($stmt);
             header('location:https://www.anjumanehefajoth.com/admin/category.php?msg=success');
             exit();
        }
    //   edi caegory 

    // member
    // function emptyInputaddmember($firstName,$lastName,$fathername,$phone,$villageid,$postofficeid,$upojellaid,$districtid,$position){
    //     if(empty($lastName) || empty($firstName) || empty($fathername) || empty($phone) || empty($villageid) || empty($postofficeid) || empty($upojellaid) || empty($districtid) || empty($position)){
    //        $result=true;
    //     }else{
    //         $result=false;
    //     }
    //     return $result;
    //     }
        function createmember($conn,$firstName,$lastName,$username,$fathername,$phone,$email,$villageid,$postofficeid,$upojellaid,$districtid,$divisionid,$ip,$avater,$position,$nid,$blood){
                $sqlmem="INSERT INTO `members`(`first_name`, `last_name`, `username`, `father_name`, `phone`, `email`, `village_id`, `post_office_id`, `upojella`, `district_id`,`division_id`,`ip_address`, `avater`,`position`, `nid`,`blood_group_id`)
                 VALUES ('$firstName','$lastName','$username','$fathername','$phone','$email','$villageid','$postofficeid','$upojellaid','$districtid','$divisionid','$ip','$avater','$position','$nid','$blood')";
                // echo $sqlmem;
                mysqli_query($conn,$sqlmem) or die('query failed.');
                header('location:../admin/member/all-member.php?msg=success');
    }    
    // setting 
    function emptyinputsetting($websitename,$description){
        if(empty($websitename)||empty($description)){
            $result=true;
        }else{
            $result=false;
        }
        return $result;
    }
    // function insertsetting($websitename,$description,$imagename,$conn){
    //     $sqlsetting="INSERT INTO `setting`(`websitename`, `logo`, `description`) VALUES ('$websitename','$description','$imagename')";
    //     mysqli_query($conn,$sqlsetting) or die('query failed');
    // }

       function insertsetting($websitename,$description,$imagename,$conn){
        $sqlsetting="INSERT INTO `setting`(`websitename`, `logo`, `description`) VALUES ('?','?','?')";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sqlsetting)){
           header('location:https://www.anjumanehefajoth.com/admin/setting.php?msg=stmterror');
        }
        mysqli_stmt_bind_param($stmt,"sss",$websitename,$description,$imagename);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header('location:https://www.anjumanehefajoth.com/admin/setting.php?msg=success');
    }
    // district
    function insedistrict($district_name,$division_id,$conn){
        $qur="INSERT INTO `district`( `district_name`,`division_id`) VALUES (?,?)";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$qur)){
           header('location:add-district.php?msg=stmt_error');
           exit(); 
        }
        mysqli_stmt_bind_param($stmt,"si",$district_name,$division_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header('location:../admin/district/alldistrict.php?msg=success');
        exit();
   }
       // upojella
       function emptyinputupojella($upojella_name){
           if(!empty($upojella_name)){
               $result=false;
           }else{
               $result=true;
           }
           return $result;
       }
       function inseupojella($upojella_name,$district_id,$conn){
        // $upoque="INSERT INTO `upojella`(`upojella_name`,`district_id`) VALUES ([value-1],[value-2])";
        $upoque="INSERT INTO `upojella`(`upojella_name`,`district_id`)VALUES (?,?)";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$upoque)){
           header('location:https://www.anjumanehefajoth.com/admin/upojella.php?msg=stmt_failed');
           exit(); 
        }
        mysqli_stmt_bind_param($stmt,"si",$upojella_name,$district_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header('location:../admin/upojella/upojella.php?msg=success');
        exit();
   }
   
       // postoffice
       function emptyinputpostoffice($postoffice_name){
        if(!empty($postoffice_name)){
            $result=false;
        }else{
            $result=true;
        }
        return $result;
    }
    function insepostoffice($postoffice_name,$upojella_id,$conn){
     $upoque="INSERT INTO `postoffice`(`postoffice_name`,`upojella_id`)VALUES (?,?)";
     $stmt=mysqli_stmt_init($conn);
     if(!mysqli_stmt_prepare($stmt,$upoque)){
        header('location:https://www.anjumanehefajoth.com/admin/postoffice.php?msg=stmt_failed');
        exit(); 
     }
     mysqli_stmt_bind_param($stmt,"si",$postoffice_name,$upojella_id);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_close($stmt);
     header('location:../admin/union/postoffice.php?msg=success');
     exit();
}
 // postoffice
 function emptyinputvillage($village_name){
    if(!empty($village_name)){
        $result=false;
    }else{
        $result=true;
    }
    return $result;
}
// village
function insertvillage($village_name,$conn){
 $queryvillage="INSERT INTO `village`(`village_name`) VALUES (?)";
 $stmt=mysqli_stmt_init($conn);
 if(!mysqli_stmt_prepare($stmt,$queryvillage)){
    header('location:../admin/village/village.php?msg=stmt_failed');
    exit(); 
 }
 mysqli_stmt_bind_param($stmt,"s",$village_name);
 mysqli_stmt_execute($stmt);
 mysqli_stmt_close($stmt);
 header('location:../admin/village/village.php?msg=success');
 exit();
 
}
// posiion 
function emptyinputposition($position_name){
    if(!empty($position_name)){
        $result=false;
    }else{
        $result=true;
    }
    return $result;
}
// position
function inseposition($position_name,$conn){
    $queryposition="INSERT INTO `position`(`position_name`) VALUES (?)";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$queryposition)){
       header('location:https://www.anjumanehefajoth.com/admin/position.php?msg=stmt_failed');
       exit(); 
    }
    mysqli_stmt_bind_param($stmt,"s",$position_name);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('location:https://www.anjumanehefajoth.com/admin/position.php?msg=success');
    exit();
   }
// aboutus 
function emptyinputabout($title,$descri){
    if(empty($title) || empty($descri)){
       $result=true;
    }else{
        $result=false;
    }
    return $result;
    }
    function inserabout($title,$descri,$imagename,$conn){
         $qua="INSERT INTO `aboutus`(`title`, `description`,`post_img`) 
         VALUES ('$title','$descri','$imagename');";
         mysqli_query($conn,$qua);
         header('location:https://www.anjumanehefajoth.com/aboutus.php?msg=success');
    }
// ====
// ourinstitute 
function emptyinputourinstitute($title,$descri){
    if(empty($title) || empty($descri)){
       $result=true;
    }else{
        $result=false;
    }
    return $result;
    }
    function inserourinstitute($title,$descri,$imagename,$conn){
         $qua="INSERT INTO `ourinstitute`(`title`, `description`,`post_img`) 
         VALUES ('$title','$descri','$imagename');";
         mysqli_query($conn,$qua);
         header('location:https://www.anjumanehefajoth.com/ourinstitute.php?msg=success');
    }
// ====