<?php
// session_start();
require_once ('../includes/dbh.inc.php');
$sqlf="select * from setting";
$rres=mysqli_query($conn,$sqlf);
if(isset($_GET['msg'])){
   if($_GET['msg']='member'){
    $active="active";
   }else{
    $active="active";
  }
}
?>
<!DOCTYPE html>
<html lang="bn">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700;900&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Heebo:wght@200;400;700;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/normalize.css" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
      integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../src/2-styles/main.css" />
    <?php
    $rrow=mysqli_fetch_all($rres);
    //  $d=$rrow['websitename'];
    //  echo $d;
    // echo'<title>'.$rrow['websitename'].'</title>';
    ?>
    
  </head>
  <body>
    <!-- ============================ -->
    <!-- header start from here  -->
    <!-- ============================ -->
    <header class="header">
      <nav class="nav">
      
        <a href="http://anjumanehefajoth.com/index.php" class="logo-image">
        <img src="../images/logi.png" alt="">
        </a>
        <ul class="nav-list">
          <li class="nav-list-item">
            <a href="http://anjumanehefajoth.com/profile.php" class="black nav-links"
              ><i class="fas fa-home"></i></a
            >
          </li>
          
          <?php
          if(isset($_SESSION['role'])){
            if($_SESSION['role']==1){
              
              echo'<li class="nav-list-item">
              <a href="http://anjumanehefajoth.com/admin/all-users.php" class="black nav-links"
                ><i class="fa fa-user-plus" aria-hidden="true"></i></a>
              </li>';
              
              echo'<li class="nav-list-item" >
              <a  href="http://anjumanehefajoth.com/admin/all-member.php?msg=members" class="black nav-links"
                ><i class="fa fa-users" aria-hidden="true"></i></a>
              </li>';
              echo'<li class="nav-list-item" class="active">
              <a href="http://anjumanehefajoth.com/admin/all-post.php" class="black nav-links"
              ><i class="fa fa-clipboard" aria-hidden="true"></i></a>
              </li>';
             echo'<li class="nav-list-item">
              <a href="http://anjumanehefajoth.com/admin/category.php" class="black nav-links"
                ><i class="fa fa-list-alt" aria-hidden="true"></i></a>
              </li>';
              echo'<li class="nav-list-item">
              <a href="../profile.php" class="black nav-links"
                ><i class="fas fa-user"></i>'." ". $_SESSION['username'].'</a>
            </li>';
            echo'<li class="nav-list-item">
              <a href="http://anjumanehefajoth.com/admin/upojella.php" class="black nav-links"
                ><i class="fas fa-globe-asia"></i></i></a>
            </li>';
            echo'<li class="nav-list-item">
              <a href="setting.php" class="black nav-links"
                ><i class="fa fa-cogs" aria-hidden="true"></i></a>
            </li>';
            echo'<li class="nav-list-item">
            <a href="../includes/logout.inc.php" class="black nav-links"
              ><i class="fas fa-sign-out-alt"></i></a
            >
          </li>';
            }else{
             
              echo'<li class="nav-list-item">
              <a href="../profile.php" class="black nav-links"
                ><i class="fas fa-user"></i>'." ". $_SESSION['username'].'</a
              >
            </li>';
            echo'<li class="nav-list-item">
            <a href="../includes/logout.inc.php" class="black nav-links"
              ><i class="fas fa-sign-out-alt"></i>LOGOU</a
            >
          </li>';
            }
          
          }else{
            echo'<li class="nav-list-item">
            <a href="/src/3-pages/contact.html" class="black nav-links"
              >SIGNUP</a
            >
          </li>';
          echo' <li class="nav-list-item">
          <a href="http://anjumanehefajoth.com/admin" class="black nav-links"
            >LOGIN</a
          >
        </li>';
          }
          ?> 
        </ul>
        <div class="menu-btn">
          <div class="menu-btn__burger"></div>
        </div>
        <div class="mobile-white-background"></div>
        <div class="mobile-nav-block">
          <ul class="mobile-nav-list">
            <li class="mobile-nav-list-item">
              <a href="/src/3-pages/aboutus.html" class="nav-links-mobile"
                >OUR COMPANY</a
              >
            </li>
            <li class="mobile-nav-list-item">
              <a href="/src/3-pages/location.html" class="nav-links-mobile"
                >LOCATIONS</a
              >
            </li>
            <li class="mobile-nav-list-item">
              <a href="/src/3-pages/contact.html" class="nav-links-mobile"
                >CONTACT</a
              >
            </li>
            <li class="mobile-nav-list-item">
              <a href="/src/3-pages/contact.html" class="nav-links-mobile"
                >SIGNUP</a
              >
            </li>
            <li class="mobile-nav-list-item">
              <a href="/src/3-pages/contact.html" class="nav-links-mobile"
                >LOGIN</a
              >
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- ============================ -->
    <!-- header end from here  -->
    <!-- ============================ -->
