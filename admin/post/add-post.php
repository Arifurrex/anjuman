<?php
session_start();
if ($_SESSION["role"] === 0) {
  header('location:http://localhost/3.blog%20and%20newspapaper/anjumancopy/admin?error=loginfirst');
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
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">পোস্ট যোগ করুন</h4>
            <form action="../../includes/add-pos.inc.php" method="post" enctype="multipart/form-data" class="forms-sample" accept-charset="utf-8">
              <?php
              if (isset($_GET['msg'])) {
                echo '<div class="alert">';
                if ($_GET['msg'] == 'emptyinput') {
                  echo "সব ইনপুট পূরণ করুন";
                } else if ($_GET['msg'] == 'emptytitle') {
                  echo "শিরোনাম পূরণ করুন";
                } else if ($_GET['msg'] == 'emptydescription') {
                  echo "বিবরণ পূরণ করুন";
                } else if ($_GET['msg'] == 'emptycategory') {
                  echo "বিভাগ নির্বাচন করুন";
                } else if ($_GET['msg'] == 'writter') {
                  echo "যারা এই বর্ণনা লিখেছেন";
                }
                echo '<span class="closebtn" id="closebtn"onclick="this.parentElement.style.display=' . 'none' . ';" >&times;</span>
                </div>';
              }
              ?>
              <div class="form-group">
                <label for="exampleInputName1">শিরোনাম</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="title" name="title" 
                value="<?= (isset($_POST['title'])) ? $_POST['title'] : '' ?>"/>
              </div>
              <div class="form-group">
                <label for="exampleTextarea1">বর্ণনা</label>
                <textarea class="form-control" id="exampleTextarea1 myTextarea" rows="15" placeholder="description" name="description"></textarea>
              </div>
              <!-- ====================== -->
              <?php
              require_once '../../includes/dbh.inc.php';
              $sqli = "SELECT * FROM category";
              $resu = mysqli_query($conn, $sqli) or die("query failed.");
              ?>
              <div class="form-row">
                <div class="form-group col-sm-6">
                  <label class="col-sm-12 col-form-label">বিভাগ</label>
                  <div class="col-sm-12">
                    <select class="form-control" name="category">
                      <option selected>বিভাগ নির্বাচন করুন</option>
                      <?php
                      while ($rowd = mysqli_fetch_assoc($resu)) { ?>
                        echo'<option value="<?= $rowd['category_id'] ?>"><?= $rowd['category_name'] ?></option>'
                      <?php
                      } ?>
                    </select>
                  </div>
                </div>
                <!-- ================ -->
                <?php
                require_once '../../includes/dbh.inc.php';
                $sqlw = "SELECT * FROM writter";
                $resw = mysqli_query($conn, $sqlw) or die("query failed.");
                ?>
                <div class="form-group col-sm-6">
                  <label class="col-sm-12 col-form-label"> লেখক</label>
                  <div class="col-sm-12">
                    <select class="form-control" name="category">
                      <?php
                      while ($roww = mysqli_fetch_assoc($resw)) { ?>
                        echo'<option value="<?= $roww['writter_id'] ?>"><?= $roww['writter_name'] ?></option>'
                      <?php
                      } ?>
                    </select>
                  </div>
                </div>
              </div>
              <!-- tag  -->
              <div class="form-group">
                <label for="exampleInputName1">প্রসঙ্গ</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="কমা দিয়ে প্রসঙ্গ ট্যাগ করুন (ex- রমজান, হজ)" name="tag" />
              </div>
              <!-- <div class="form-group">
                <div class="input-group col-xs-12">
                  <input type="file" placeholder="post_img" name="post_img" />
                </div>
              </div> -->
              <button type="submit" name="submit" class="btn btn-success mr-2">Submit</button>
            </form>
          </div>
        </div>
      </div>
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
</div>
</div>
</div>
<?php
include '../startscriptCopy.php';
?>