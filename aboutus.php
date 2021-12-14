<?php
include 'header.php';
?>
<?php
include 'includes/dbh.inc.php';
$sql="select * from aboutus";
$resl=mysqli_query($conn,$sql) or die('quer failed'); 
?>
<?php
            while($row=mysqli_fetch_assoc($resl)){ ?>
    <section class="aboutus">
      <div class="container flex-wrap">
        <img src="images/<?=$row['post_img']?>" alt="" class="image aboutus__image" />
        
        <!-- </div> -->
      </div>
    </section>
    <?php      
              }
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
      
        <div class="aboutus__descrip-container">
          <h2 class="aboutus__title">আমাদের সম্পর্কে</h2>
          <p><h4 class="">সংগঠনের নাম :</h4> আঞ্জুমানে হেফাজতে ইসলাম </p> 
          <p><h4 class="">প্রতিষ্ঠাকাল :</h4>১৯৪৪ খৃষ্টাব্দ </p>
          <p><h4 class="">প্রতিষ্ঠাতা: :</h4>কুতুবে দাওরান মুজাদ্দিদে যামান শায়খুল ইসলাম আল্লামা শায়খ লুৎফুর রহমান বর্ণভী রহ. </p>
          <p><h4 class="">লক্ষ্য-উদ্দ্যেশ্য : :</h4>আঞ্জুমানের লক্ষ্য ও উদ্দেশ্য হলো, কুরআন-সুন্নাহর আলোকে আলোকিত জাতি ও সমাজ গঠন করা এবং এই প্রয়াসের মধ্য দিয়ে আল্লাহ তা’আলার সন্তুষ্টি লাভ করা।</p>
          <p><h4 class="">পরিচালনা পদ্ধতি : :</h4>কুরআন-সুন্নাহ, খোলাফায়ে রাশেদীন ও সালাফে সালেহীনের অনুসৃত আদর্শের ভিত্তিতে আঞ্জুমানের সার্বিক কার্যক্রম পরিচালিত হয়। </p>
          <p><h4 class="">সংগঠনের বৈশিষ্ট্যসমূহ  :</h4> <ul>
            <li>* আল্লাহভীরু, নৈতিক জাতিগঠনে ভূমিকা রাখা।  </li>
            <li>* সর্বত্র জ্ঞানের আলো বিতরণপূর্বক সমাজ থেকে অজ্ঞতার অন্ধকার দূর করা।   </li>
            <li>* সুসংগঠিত, জ্ঞানালোকিত,  কল্যাণী সমাজ বিনির্মাণে ভূমিকা রাখা। </li>
            <li>* খোদাদ্রোহী ও বাতিল শক্তির মোকাবিলায় উপযুক্ত কর্মপন্থায় কার্যকর প্রতিবাদ ও প্রতিরোধ গড়ে তোলা, </li>
            <li>* আর্ত-মানবতার সেবা করা। </li>
            <li>* হক্কানি আলেম-উলামা, পীর-মাশায়েখ ও দ্বীনদার জ্ঞানী-বুদ্ধিজীবীদের অংশগ্রহণ, নেতৃত্ব ও তত্তাবধান গ্রহণ।  </li>
            <li>* হক্কানি আলেম-উলামা, পীর-মাশায়েখ ও দ্বীনদার জ্ঞানী-বুদ্ধিজীবীদের অংশগ্রহণ, নেতৃত্ব ও তত্তাবধান গ্রহণ।  </li>
            <li>* আর্ত-মানবতার সেবা করা। </li>
            <li>* যুগ চাহিদার চ্যালেঞ্জ মোকাবিলায় কার্যকর পরিকল্পনা ও পদক্ষেপ গ্রহণ। </li>
          </ul> 
        </p> 
        <p><h4 class="">সদস্য হওয়ার শর্ত ও নিয়মাবলী</h4> <ul>
             <li>* আঞ্জুমানের নির্ধারিত ফরম পূরণ করা।   </li>
            <li>* আঞ্জুমানের সকল সিদ্ধান্তের ব্যাপারে ইতিবাচক হওয়া।   </li>
            <li>* আঞ্জুমান কর্তৃক ঘোষিত সকল কর্মসূচী বাস্তবায়নে তৎপর থাকা। </li>
            <li>* আঞ্জুমানের কাজে প্রয়োজন অনুযায়ী সময় দেয়া।</li>
            <li>* জীবনের সকল ক্ষেত্রে উন্নত আমল-আখলাক সদাচারণের চেষ্টা করা।  </li>
            <li>* সকল প্রকার অনৈতিক, অনৈসলামিক ও রাষ্ট্রদোহী কার্যকলাপ থেকে দূরে থাকা। </li>
            <li>* শিরক-বিদআত ও গোমরাহি হতে মুক্ত থাকা। </li>
          </ul> 
        </p> 
        <p><h4 class="">ভবিষ্যৎ পরিকল্পনা</h4> <ul>
             <li>* দেশের সর্বত্র সংগঠনের সম্প্রসারণ।  </li>
            <li>* শায়খে বর্ণভী রহ. এর মিশনকে উম্মাহের মধ্যে ছড়িয়ে দেয়া।  </li>
            <li>* দ্বীন-ধর্ম পালনের অনুকুল পরিবেশ তৈরী করা।   </li>
            <li>* ইসলামের অবমাননা ও প্রিয়নবী সা.-এর শানে বেয়াদবি ও কটুক্তি তথা মুসলমানদের ধর্মানুভূতিতে আঘাত করার প্রতিবাদে সোচ্চার হওয়া এবং সময়োপযোগী কর্মসূচী গ্রহণ করা। </li>
            <li>* আহলুস সুন্নাহ ওয়াল জামা‘আতের আকিদা-বিশ্বাস সংরক্ষণে আকাবিরে উম্মতের অনুসরণে সময়োচিৎ বহুমুখী কার্যক্রম পরিচালনা করা।   </li>
            <li>* ইসলামবিষয়ক জাতীয় ও আন্তজাতিক ইস্যুতে উপযুক্ত পদক্ষেপ গ্রহণ করা। </li>
            <li>* দ্বীনের অত্যাবশ্যকীয় জ্ঞানের শিক্ষাকে সর্বস্তরের  মুসলমানের কাছে পৌঁছে দেয়া।</li>
          </ul> 
        </p> 
        <p><h4 class="">কর্মসূচী </h4> <ul>
             <li>১. দাওয়াত  </li>
             <li>২. সংগঠন </li>
             <li>৩. তালীম</li>
             <li>৪. তারবিয়াত ও তাজকিয়া</li>
             <li>৫. খেদমতে খালক তথা সৃষ্টির সেবা এবং </li>
             <li>৬. আন্দোলন। </li>
          </ul> 
        </p> 
        <p><li><h4 class="">নিবেদনে :</h4>মুফতি মুহা. রশীদুর রহমান ফারুক বর্ণভী</li></p>
        <p><li><h4 class="">আমীর :</h4>আঞ্জুমানে হেফাজতে ইসলাম বাংলাদেশ </li></p>
        <p><li><h4 class="">কেন্দ্রীয় কার্যালয়:</h4>হামিদনগর, বরুণা -৩২১১ শ্রীমঙ্গল, মৌলভীবাজার সিলেট।</li></p>
        <p><li><h4 class="">দূরালাপন: </h4>০১৭০১-৪৩৩৭৭০</li></p>
        </div>
        <!-- </div> -->
      </div>
    </section>


    
    <?php include 'footer.php'; ?>

