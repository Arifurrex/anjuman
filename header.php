<!DOCTYPE html>
<html lang="bn">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="stylesheet" href="src/owl.carousel.min.css" />
    <link rel="stylesheet" href="src/superslides.css" />
    <link rel="stylesheet" href="src/2-styles/main.css" />
    <link rel="stylesheet" href="src/2-styles/main.css">
    <link rel="shortcut icon" type="image/png" href="images/linkicon.png" sizes="32x32"/>
    <title>Anjumane Hefajothe Islam Bangladesh</title>
  </head>
  <body>
    <!-- ============================ -->
    <!-- header start from here  -->
    <!-- ============================ -->
    <header>
       
      <nav>
          <a href="https://www.anjumanehefajoth.com/index.php" class="logo-image lgohide">
            <img src="images/Only Logo.bmp" alt="logo-light" />
         </a>
         <a href="https://www.anjumanehefajoth.com/index.php" class="logo-image logohide2">
            <img src="images/Only Logo.bmp" alt="anjuman-e hefajoth-e islam " />
         </a>
         <a href="https://www.anjumanehefajoth.com" class="logo-image logohide">
         আঞ্জুমানে হেফাযত
         </a>
        <ul class="nav-list">
        <?php
include 'includes/dbh.inc.php';
$sql = "select * from category where post > 0";
$res = mysqli_query($conn, $sql) or die('query failed');
?>
        <?php
while ($row = mysqli_fetch_assoc($res)) {
    if (isset($_GET['catid'])) {
        if ($row['category_id'] == $_GET['catid']) {
            $active = "active";
        } else {
            $active = "";
        }
    } else {
        $active = "";
    }
    ?>

          <li class="nav-list-item ">
          <a class="<?=$active?>" href="http://anjumanehefajoth.com/category.php?catid=<?=$row['category_id']?>" class="black nav-links"
            ><?=$row['category_name']?></a
          >
        </li>
        <?php
}
?>
        </ul>

        <!-- this humburger button  -->
        <div class="menu-btn">
          <div class="menu-btn__burger"></div>
        </div>
        <!-- this id for mobile device  -->
        <div class="mobile-white-background">  </div>
        <div class="mobile-nav-block">
          <ul class="mobile-nav-list">
             <!-- ===== -->
             <?php
include 'includes/dbh.inc.php';
$sql = "select * from category where post > 0";
$res = mysqli_query($conn, $sql) or die('query failed');
?>
             <?php
while ($row = mysqli_fetch_assoc($res)) {
    if (isset($_GET['catid'])) {
        if ($row['category_id'] == $_GET['catid']) {
            $active = "active";
        } else {
            $active = "";
        }
    } else {
        $active = "";
    }
    ?>

           <li class="mobile-nav-list-item">
            <a href="http://anjumanehefajoth.com/category.php?catid=<?=$row['category_id']?>" class=""
            ><?=$row['category_name']?> </a>
            </li>
        <?php
}
?>
             <!-- ======= -->
          </ul>
        </div>
      </nav>
    </header>
    <!-- ============================ -->
    <!-- header end from here  -->
    <!-- ============================ -->
  