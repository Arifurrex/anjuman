<?php
session_start();
if($_SESSION["role"]==0){
	header('location:http://anjumanehefajoth.com/admin?error=loginfirs');
	exit();
}
?>
<?php include "header.php"; ?>
<?php
   require_once "../includes/dbh.inc.php";
   $id=$_GET['id'];
   $que="SELECT * FROM members 
   left join district on members.district_id=district.id
left join upojella on members.upojella=upojella.upojella_id
left join postoffice on members.post_office_id=postoffice.postoffice_id
left join village on members.village_id=village.village_id
left join position on members.position=position.position_id
   WHERE member_id='$id'";
   $resl=mysqli_query($conn,$que) or die("query failed");
   $row=mysqli_fetch_assoc($resl);
?>
  <div class="admin-content">        
  <div class="contact__form">    
        <form action="../includes/update-member.inc.php?id=<?= $row['member_id'] ?>" method="post" autocomplete="off" enctype="multipart/form-data">
             <div class="add-user-header">
                 <h4 class="admin-heading">Edit member</h4>
             </div>
          <div class="from-control paragraph">
            <input type="text" placeholder="frist-name" name="first_name" value="<?= $row['first_name'] ?>"/>
          </div>
          <div class="from-control paragraph">
            <input type="text" placeholder="last-name"  name="last_name" value="<?= $row['last_name'] ?>"/>
          </div>
          
          <div class="from-control paragraph">
            <input type="text" placeholder="father_name"  name="father_name" value="<?=$row['father_name']?>"/>
          </div>
          <div class="from-control paragraph">
            <input type="text" placeholder="phone"  name="phone"value="<?=$row['phone']?>" />
          </div>
          <div class="from-control paragraph">
          <input type="text" placeholder="email"  name="email" value="<?=$row['email']?>" />
          </div>
          <!-- district  -->
          <div class="from-control paragraph">
            <select name="district_id" id="" required>
            <option  value="" disabled>select district </option>
            <option selected value="<?=$row['district_id']?>"><?=$row['district_name']?> </option>
            <?php 
              $sqldistrict="SELECT * FROM district";
              $qerydistrict=mysqli_query($conn,$sqldistrict);
              while($rowdistrict=mysqli_fetch_assoc($qerydistrict)){ ?>
                     <option  value="<?=$rowdistrict['id']?>"><?=$rowdistrict['district_name']?></option>
              <?php } ?>
            </select>
          </div>
          <!-- upojella  -->
          <div class="from-control paragraph">
            <select name="upojella" id="" required>
            <option  value="" disabled>select upojella </option>
            <option selected value="<?=$row['upojella_id']?>"><?=$row['upojella_name']?> </option>
            <?php 
              $sqlupojella="SELECT * FROM upojella";
              $qeryupojella=mysqli_query($conn,$sqlupojella);
              while($rowupojella=mysqli_fetch_assoc($qeryupojella)){ ?>
                     <option  value="<?=$rowupojella['upojella_id']?>"><?=$rowupojella['upojella_name']?></option>
              <?php } ?>
           
            </select>
          </div>
          <!-- postoffice  -->
          <div class="from-control paragraph">
            <select name="post_office_id" id="" required>
            <option selected value="" disabled>select post office </option>
            <option selected value="<?=$row['post_office_id']?>"><?=$row['postoffice_name']?> </option>
            <?php 
              $sqlpostoffice="SELECT * FROM postoffice";
              $qerypostoffice=mysqli_query($conn,$sqlpostoffice);
              while($rowpostoffice=mysqli_fetch_assoc($qerypostoffice)){ ?>
                     <option  value="<?=$rowpostoffice['postoffice_id']?>"><?=$rowpostoffice['postoffice_name']?></option>
              <?php } ?>
            
            
            </select>
          </div>
          <!-- village  -->
          <div class="from-control paragraph">
            <select name="village_id" id="" required>
            <option  value="" disabled>select village </option>
            <option selected value="<?=$row['village_id']?>"><?=$row['village_name']?></option>
            <?php 
              $sqlvill="SELECT * FROM village";
              $qeryvillage=mysqli_query($conn,$sqlvill);
              ?> 
              <?php
              while($rowvillage=mysqli_fetch_assoc($qeryvillage)){?>
              <option  value="<?=$rowvillage['village_id']?>"><?=$rowvillage['village_name']?></option>
              <?php
			         } 
			         ?>
             </select>
             </div>
          <!-- position  -->
          <div class="from-control paragraph">
            <select name="position" id="" required>
            <option selected value="" disabled>select position </option>
            <option selected value="<?=$row['position']?>"><?=$row['position_name']?> </option>
            <?php 
              $sqlposition="SELECT * FROM position";
              $qeryposition=mysqli_query($conn,$sqlposition);
              ?> 
              <?php
              while($rowposition=mysqli_fetch_assoc($qeryposition)){?>
              <option  value="<?=$rowposition['position_id']?>"><?=$rowposition['position_name']?></option>
              <?php
			         } 
			         ?>
            </select>
          </div>
          <div class="from-control paragraph">
            <input type="text" placeholder="nid number"  name="nid" value="<?=$row['nid']?>" />
          </div>
          <div class="from-control paragraph">
            <select name="blood_group_id" id="" required>
            <option selected value="<?php $row['blood_group_id'] ?>" > 
            <?php
				 if($row['blood_group_id']==1){
					 echo'A+';
				 }elseif($row['blood_group_id']==2){
					 echo'A-';
				 }elseif($row['blood_group_id']==3){
					echo'B+';
				}elseif($row['blood_group_id']==4){
					echo'B-';
				}elseif($row['blood_group_id']==5){
					echo'O+';
				}elseif($row['blood_group_id']==6){
					echo'O-';
				}elseif($row['blood_group_id']==7){
					echo'AB+';
				}elseif($row['blood_group_id']==8){
					echo'AB-';
				}
				 ?></option>
            <option value="1">A RhD positive (A+)</option>
            <option value="2">A RhD negative (A-)</option>
            <option value="3">B RhD positive (B+)</option>
            <option value="4">B RhD negative (B-)</option>
            <option value="5">O RhD positive (O+)</option>
            <option value="6">O RhD negative (O-)</option>
            <option value="7">AB RhD positive (AB+)</option>
            <option value="8">AB RhD negative (AB-)</option>
            </select>
          </div>
          <!-- image  -->
          <img src="../images/<?=$row['avater']?>" alt="">
          <div class="from-control paragraph">
            <input type="hidden" value="<?=$row['avater']?>"  name="old_avater" />
            <input type="file" placeholder="profile image"  name="new_avater" />
          </div>
          <div class="from-control">
            <input type="submit" value="Update member" name="submit" class="btn" />
          </div>
        </form>
   </div>
                  <!--/Form -->
 
          
  </div>
<?php include "footer.php"; ?>

