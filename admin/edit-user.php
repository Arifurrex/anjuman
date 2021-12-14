<?php
session_start();
if($_SESSION['role'] == 0){
  header('location:../admin/index.php');
  exit();
}
?>
<?php
@include '../admin/starheader.php';
@include '../admin/starnavigation.php';
@include '../admin/starsidenavbar.php';
?>
       <!-- partial -->
       <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <!-- ======================================= -->
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit User</h4>
                  <?php
                  require_once "../includes/dbh.inc.php";
                  $id = $_GET['id'];
                  $que = "SELECT * FROM user WHERE user_id='$id'";
                  $resl = mysqli_query($conn, $que) or die("query failed");
                  $row = mysqli_fetch_assoc($resl);
                  ?>
                  <form action="../includes/update-user.inc.php?id=<?=$row['user_id']?>" method="post"   class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputName1">first_name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="first_name" name="first_name" value="<?=$row['first_name']?>"/>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">last_name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="last_name" name="last_name" value="<?=$row['last_name']?>"/>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">username</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="username" name="username" value="<?=$row['username']?>"/>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">password</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="password" name="password" value="<?=$row['password']?>"/>
                    </div>

                    <!-- ====================== -->

                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label">role</label>
                          <div class="col-sm-12">
                          <select name="role" id="" value="" required>
                          <option selected value="" disabled><?=$row['role']?></option>
                          <option value="1">admin</option>
                          <option value="2">normal user</option>
                          </select>
                          </div>
                        </div>
                      <!-- ================ -->
                    <button type="submit" class="btn btn-success mr-2" name="submit">Submit</button>
                  </form>
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
@include '../admin/startscript.php';
?>
