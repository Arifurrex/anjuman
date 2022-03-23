<?php
session_start();
if($_SESSION["role"]==0){
	header('location:http://anjumanehefajoth.com/admin?error=loginfirs');
	exit();
}
?>
<?php
   require_once "../../includes/dbh.inc.php";
   $id=$_GET['id'];
   $que="SELECT * FROM members 
   left join district on members.district_id=district.district_id
   left join upojella on members.upojella=upojella.upojella_id
   left join postoffice on members.post_office_id=postoffice.postoffice_id
   left join village on members.village_id=village.village_id
   left join position on members.position=position.position_id
   WHERE member_id='$id'";
   $resl=mysqli_query($conn,$que) or die("query failed");
   $row=mysqli_fetch_assoc($resl);
?>  
<?php
    include '../starheaderCopy.php';
    include '../starnavigationCopy.php';
    include '../starsidenavbarCopy.php';
 ?>
       <!-- partial -->
       <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <!-- ======================================= -->
            
            <!-- =================================== -->
            
            <!-- ====================================================== -->
            <!-- add members  -->
            <!-- ======================== -->
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit member</h4>
                  <!-- ====== -->
                  <form class="form-sample"  action="../../includes/update-member.inc.php?id=<?= $row['member_id'] ?>" method="post" enctype="multipart/form-data" autocomplete="on">
                   
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">First Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="frist-name" name="first_name" value="<?= $row['first_name'] ?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Last Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="last-name"  name="last_name" value="<?= $row['last_name'] ?>"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">father_name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="father name"  name="father_name" value="<?=$row['father_name']?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Phone</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="phone"  name="phone" value="<?=$row['phone']?>" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">email</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="email"  name="email" value="<?=$row['email']?>" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">NID Number</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="nid number"  name="nid" value="<?=$row['nid']?>" />
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                           <!-- district  -->
                          <label class="col-sm-3 col-form-label">District</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="district_id" id="district" >
                            <option selected value="<?=$row['district_id']?>"><?=$row['district_name']?> </option>
                            <?php 
                          $sqldistrict="SELECT * FROM district";
                          $qerydistrict=mysqli_query($conn,$sqldistrict);
                          while($rowdistrict=mysqli_fetch_assoc($qerydistrict)){ ?>
                          <option  value="<?=$rowdistrict['id']?>"><?=$rowdistrict['district_name']?></option>
                          <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Upojella</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="upojella_id" id="upojella" > 
                            <option selected value="<?=$row['upojella_id']?>"><?=$row['upojella_name']?> </option>
                            <!-- <option selected  disabled>select sub-district </option> -->
                            <?php 
                          $sqlupojella="SELECT * FROM upojella";
                          $qeryupojella=mysqli_query($conn,$sqlupojella);
                          while($rowupojella=mysqli_fetch_assoc($qeryupojella)){ ?>
                          <option  value="<?=$rowupojella['id']?>"><?=$rowupojella['upojella_name']?></option>
                          <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Post office</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="post_office_id" > 
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
                        </div>
                      </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Village</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="village_id" id="" >
                            <option selected value="" disabled>select village </option>
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
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Position</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="position" id="" >
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
                        </div>
                      </div>
                      <!-- ==== -->
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Blood</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="blood_group_id" id="" >
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
                        </div>
                      </div>
                      <!-- ===== -->
                      <!-- <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">profile Picture</label>
                          <div class="col-sm-9">
                          <input type="file" placeholder="profile image"  name="avater"/>
                          </div>
                        </div>
                      </div> -->
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                      <img src="../images/<?=$row['avater']?>" alt="">
                      </div>
                      <div class="col-md-12">
                          <input type="hidden" value="<?=$row['avater']?>"  name="old_avater" />
                          <input type="file" placeholder="profile image"  name="new_avater" />
                      </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success mr-2">Submit</button>
                  </form>
                  <!-- ======== -->
                </div>
              </div>
            </div> 
            <!-- ============================================ -->
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2021 <a href="" target="_blank">alinessa</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
    <?php
    include '../startscriptCopy.php';
    ?>
   <script>

$(document).ready(function(){
  // district on change hole upojella select hobe 
 $('#district').on('change',function(){
    var districtid=$(this).val();
    console.log(districtid);
       $.ajax({
          url:"districtajax.php",
          method:"POST",
          data:{disid:districtid},
          datatype:"html",
          success:function(data){
            $("#upojella").html(data);
          }

       });
  });
  //  upojella on change hole posvtoffice ba union change hobe
  $('#upojella').on('change',function(){
    var upojellaid=$(this).val();
    console.log(upojellaid);
       $.ajax({
          url:"districtajax.php",
          method:"POST",
          data:{id:upojellaid},
          datatype:"html",
          success:function(data){
            $("#postoffice").html(data);
          }

       });
  });
 
});
</script>



