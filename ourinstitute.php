<?php
include 'header.php';
?>
<?php
include 'includes/dbh.inc.php';
$sql="select * from aboutus";
$resl=mysqli_query($conn,$sql) or die('quer failed'); 
?>

    <!-- ============================== -->
    <!-- worldclass card start from here  -->
    <!-- ============================== -->
   
    <!-- ============================== -->
    <!--worldclass card end here  -->
    <!-- ============================== -->
    <!-- ============================ -->
    <!-- whoweare section start from here  -->
    <!-- ============================ -->
    
    <!-- ============================ -->
    <!-- whoweare section end from here  -->
    <!-- ============================ -->
    <section class="aboutus">
      <div class="container flex-wrap">
      <img src="images/002.jpg" alt="" class="image aboutus__image" />
        <div class="aboutus__descrip-container">
          <h2 class="aboutus__title">বরুণা মাদ্রাসা</h2>
          <p class="aboutus__descrip paragraph">
            As strategic partners in our clients’ businesses, we are ready to
            take on any challenge as our own. Solving real problems require
            empathy and collaboration, and we strive to bring a fresh
            perspective to every opportunity. We make design and technology more
            accessible and give you tools to measure success.
          </p>
          
        </div>
        <!-- </div> -->
      </div>
    </section>


    
    <?php include 'footer.php'; ?>

