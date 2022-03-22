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
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit upojella form</h4>
                  <?php
                  require_once '../../includes/dbh.inc.php';
                 $id = $_GET['id'];
                 $sqli = "select * from district 
                         left join division
                         ON district.division_id = division.id
                         where district_id = '$id'";
                 $result = mysqli_query($conn, $sqli) or die('query failed');
                 $row = mysqli_fetch_assoc($result);
                 ?>
                  <form action="../../includes/updatedistrict.inc.php?id=<?=$id?>" method="post"  enctype="multipart/form-data" class="forms-sample">
                    <?php
                     if (isset($_GET['msg'])) {
                     echo '<div class="alert">';
                     if ($_GET['msg'] == 'emptyinpute') {
                     echo "please fill all input";
                     } else if ($_GET['msg'] == 'invalidfirstname') {
                     echo "please fill valid firstname";
                     } else if ($_GET['msg'] == 'invalidlastName') {
                     echo "please fill valid lastName";
                     } else if ($_GET['msg'] == 'usernametaken') {
                     echo "username is taken";
                     } else if ($_GET['msg'] == 'invalidpas') {
                     echo "password must be 8 character";
                     }
                    echo '<span class="closebtn" id="closebtn"onclick="this.parentElement.style.display=' . 'none' . ';" >&times;</span>
                    </div>';
                    }
                    ?>
                    
                    <div class="form-group">
                      <label for="exampleInputName1">District Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="district_name" 
                      name="district_name" value="<?=$row['district_name']?>"/>
                    </div> 
                    <!-- ===================== -->
                    
                    <div class="form-group row">
                          <label class="col-sm-12 col-form-label">Division name</label>
                          <div class="col-sm-12">
                            <select class="form-control" name="division_id">
                             <option selected value="<?=$row['id']?>" ><?=$row['division_name']?></option>
                            <?php $sqli="select * from division";
                              $resultdivision=mysqli_query($conn,$sqli) or die('query failed');
                             ?>
                            <?php while($row4=mysqli_fetch_assoc($resultdivision)){?>
                              <option value="<?=$row4['id']?>"><?=$row4['division_name']?></option>
                            <?php }?>
                            </select>
                          </div>
                        </div>
                      <!-- ================ -->
                    <button type="submit" class="btn btn-success mr-2" name="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>
            <!-- =================================== -->
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
