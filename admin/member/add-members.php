<?php
session_start();
if ($_SESSION['role'] === 0) {
    header('location:../admin/index.php');
    exit();
}
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
                  <h4 class="card-title">Add member</h4>
                  <!-- ====== -->
                  <form class="form-sample" action="../../includes/add-member.inc.php" method="post" enctype="multipart/form-data" autocomplete="on">
                    <!-- <p class="card-description">
                      Personal info
                    </p> -->
                    <?php
                   if(isset($_GET['msg'])){
                    echo'<div class="alert">';
                   if($_GET['msg'] =='emptyinpute'){
                   echo"please fill all input"; 
                   }else if($_GET['msg']=='invalidfirstname'){
                   echo"please fill valid first name";
                   }else if($_GET['msg']=='invalidlastName'){
                   echo"please fill valid lastName";
                   }else if($_GET['msg']=='invalidfathername'){
                    echo"please fill valid Father Name";
                   }else if($_GET['msg']=='invalidphone'){
                   echo"phone number should be 11 digit and and only number";
                  }else if($_GET['msg']=='invalidemail'){
                    echo"invaild email !! please input email correctly";
                   }
              echo'<span class="closebtn" id="closebtn" onclick="this.parentElement.style.display='.'none'.';" >&times;</span>
              </div>';
                 }
              ?>
              
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">First Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="frist-name" name="first_name" autocomplete="off" required
                            value="<?php echo isset($_POST["first_name"]) ? $_POST["first_name"] : ''; ?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Last Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="last-name"  name="last_name" autocomplete="off" required/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Father's name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="father name"  name="father_name"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Phone</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="phone"  name="phone" autocomplete="off" required value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''; ?>"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">email</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="email"  name="email"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">NID Number</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="nid number"  name="nid"/>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                           <!-- division  -->
                          <?php 
                          require_once '../../includes/dbh.inc.php';
                          $sqlidiv="select * from division ";
                          $resultdivision=mysqli_query($conn,$sqlidiv) or die('query failed');
                          ?>
                          <label class="col-sm-3 col-form-label">Division</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="id" id="division">
                            <option selected value="" disabled>select division </option>
                            <?php while($row8=mysqli_fetch_assoc($resultdivision)){?>
                              <option value="<?=$row8['id']?>"><?=$row8['division_name']?></option>
                              <?php }?>
                            </select>
                          </div>
                        </div>
                      </div>
                     
                      <!-- district  -->
                    <div class="col-md-6">
                        <div class="form-group row">
                          <?php 
                          require_once '../../includes/dbh.inc.php';
                          $sqli="select * from district ";
                          $resultdistrict=mysqli_query($conn,$sqli) or die('query failed');
                          ?>
                          <label class="col-sm-3 col-form-label">District</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="district_id" id="district">
                            <option selected value="" disabled>select district </option>
                            <?php while($row4=mysqli_fetch_assoc($resultdistrict)){?>
                              <option value="<?=$row4['district_id']?>"><?=$row4['district_name']?></option>
                              <?php }?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <!-- upojella  -->
                      <div class="col-md-6">
                        <div class="form-group row">
                        <?php
                        $sqlupo="select * from upojella ";
                          $resultupojella=mysqli_query($conn,$sqlupo) or die('query failed');
                          ?>
                          <label class="col-sm-3 col-form-label">Upojella</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="upojella_id" id="upojella" > 
                            <option selected  disabled>select sub-district </option>
                            <?php while($row5=mysqli_fetch_assoc($resultupojella)){?>
                              <option value="<?=$row5['upojella_id']?>"><?=$row5['upojella_name']?></option>
                              <?php }?>
                            </select>
                          </div>
                        </div>
                      </div>
                    
                    </div>
                    <div class="row">
                      <!-- union/postoffice  -->
                      <div class="col-md-6">
                        <div class="form-group row">
                        <?php
                        $sqlpostoffice="select * from postoffice";
                          $resultpostoffice=mysqli_query($conn,$sqlpostoffice) or die('query failed');
                          ?>
                          <label class="col-sm-3 col-form-label">Union</label>
                          <div class="col-sm-9">
                            <select class="form-control"  name="postoffice_id" id="postoffice" > 
                            <option selected value="" disabled>select union </option>
                            <?php while($row6=mysqli_fetch_assoc($resultpostoffice)){?>
                              <option value="<?=$row6['postoffice_id']?>"><?=$row6['postoffice_name']?></option>
                              <?php }?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <!-- village  -->
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Village</label>
                          <?php $sqli="select * from village";
                          $resultvillage=mysqli_query($conn,$sqli) or die('query failed');
                         ?>
                          <div class="col-sm-9">
                            <select class="form-control" name="village_id" id="" >
                            <option selected value="" disabled>select village </option>
                            <?php while($row1=mysqli_fetch_assoc($resultvillage)){?>
                            <option value="<?=$row1['village_id']?>"><?=$row1['village_name']?></option>
                            <?php }?>
                            </select>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Position</label>
                          <?php $sqli="select * from position";
                          $resultposition=mysqli_query($conn,$sqli) or die('query failed');
                          ?>
                          <div class="col-sm-9">
                            <select class="form-control" name="position" id="" >
                            <option selected value="" disabled>select position </option>
                             <?php while($row1=mysqli_fetch_assoc($resultposition)){?>
                            <option value="<?=$row1['position_id']?>"><?=$row1['position_name']?></option>
                            <?php }?>
                            </select>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Blood</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="blood_group_id" id="" >
                            <option selected value="" disabled>select blood group </option>
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
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">profile Picture</label>
                          <div class="col-sm-9">
                          <input type="file" placeholder="profile image"  name="avater"/>
                          </div>
                        </div>
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
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ?? <?php echo date("Y")?> <a href="" target="_blank">alinessa it solution</a> <i class="mdi mdi-heart text-danger"></i>. All rights reserved.</span>
            <!-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span> -->
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



