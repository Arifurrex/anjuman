    <?php

    $ckdbh= 'includes/dbh.inc.php';
    if(file_exists($ckdbh)){
      echo "database connected";
    }else{
      echo "database not connected";
    }
    
    $t='frontend/support/bnTime.php';
    if (file_exists($t)) {
      echo "t connected";
    } else {
      echo "t not connected";
    }

    include 'frontend/support/bnTime.php';
    function BDdate($time)
    {
      $bn = new BanglaDate($time);
      $output = $bn->get_date();
      $ReadyDate = "$output[0] $output[1] $output[2]";
      return $ReadyDate;
    }
    $time = time();
    $Bdate = BDdate($time);
    // echo $Bdate;
    ?>
    <div class="container">

      <section class="hero-section">
        <!-- === -->
        <div class="slider" id="slides">
          <div class="slides-container">
            <!-- <img src="./images/hero/hero-bg.jpg" alt="this is baner image one" /> -->
            <!-- <img src="./images/image-390140-1612301073.jpg" alt="this is baner image one" /> -->
            <!-- <img src="./images/mustrad-flower.jpg" alt="this is banner image two" /> -->
          </div>
        </div>

        <!-- === -->
        <div class="glass-container">
          <div class="glass-date owl-carousel owl-theme">
            <p class="glass-date__item">আজ <?php setlocale(LC_ALL, 'bn_BD');
                                            echo strftime("%A - %e %B %Y"); ?> ইং</p>
            <p class="glass-date__item"><?php echo $Bdate; ?> বঙ্গাব্দ</p>
            <!-- <p class="glass-date__item">২২ শে জামাদিওস সামি ,১৪৪২ হিজরি</p> -->
          </div>
          <div class="glass-card">
            <div class="glassleft-side">
              <img src="images/Only Logo.bmp" alt="" class="">
            </div>
            <div class="right-side">
              <div class="right-side-header">
                <div class="search">
                  <form class="search-tag-wrapper" action="https://www.anjumanehefajoth.com/search.php" method="get">
                    <input type="search" placeholder="এখানে খোঁজ করুন ..." name="search" />
                    <button class="search__button" type="submit">
                      খুঁজুন
                    </button>
                  </form>
                </div>
              </div>

              <div class="counter-wraper">
                <!-- || member coundown  -->
                <div class="counterr">
                  <div class="counter__icon">
                    <i class="fas fa-user"></i>
                  </div>
                 

                  <div class="counter__name">সদস্য</div>
                </div>

                <!-- || location coundown  -->
                <div class="counterr">
                  <div class="counter__icon">
                    <i class="fas fa-map-marker-alt"></i>
                  </div>
                  <div class="number-count counter">64</div>
                  <div class="counter__name">স্থান</div>
                </div>

                <!-- || information coundown  -->
                <div class="counterr">
                  <div class="counter__icon">
                    <i class="fa fa-fire"></i>
                  </div>
                  <div class="number-count counter">98</div>
                  <div class="counter__name">তথ্য</div>
                </div>

                <!-- || question coundown  -->
                <div class="counterr">
                  <div class="counter__icon">
                    <i class="fas fa-question"></i>
                  </div>
                  <div class="number-count counter">598</div>
                  <div class="counter__name">প্রশ্ন</div>
                </div>

              </div>

              <!-- ||this is event massage -->
              <div class="eventMessage">
                <i class="far fa-calendar-alt"></i>
                <p class="sub typed"></p>
              </div>


            </div>
          </div>
        </div>
      </section>
    </div>