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
            <h4 class="card-title">পোস্ট সম্পাদনা করুন</h4>
            <?php
            require_once "../../includes/dbh.inc.php";
            $id = $_GET['id'];
            $que = "SELECT * FROM post 
                  left join category on post.category=category.category_id
                  left join writter on post.writter=writter.writter_id
                  WHERE post_id='$id'";
            $resl = mysqli_query($conn, $que) or die("query failed");
            $row = mysqli_fetch_assoc($resl);
            ?>
            <form action="../../includes/update-post.inc.php?id=<?= $row['post_id'] ?>" method="post" enctype="multipart/form-data" class="forms-sample">
              <div class="form-group">
                <label for="exampleInputName1">শিরোনাম</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="title" name="title" value="<?= $row['title'] ?>" />
              </div>
              <div class="form-group">
                <label for="exampleTextarea1">বর্ণনা</label>
                <textarea class="form-control" id="exampleTextarea1" rows="10" placeholder="description" name="description"><?= $row['description'] ?></textarea>
              </div>
              <!-- ====================== -->
              <?php
              require_once '../../includes/dbh.inc.php';
              $sqli = "SELECT * FROM category";
              $resu = mysqli_query($conn, $sqli) or die("query failed.");
              ?>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label class="col-sm-12 col-form-label">বিভাগ</label>
                  <div class="col-sm-12">
                    <select class="form-control" name="category">
                      <option selected value="<?= $row['category_name'] ?>"><?= $row['category_name'] ?></option>
                      <?php
                      while ($rowd = mysqli_fetch_assoc($resu)) { ?>
                        echo'<option value="<?= $rowd['category_id'] ?>"><?= $rowd['category_name'] ?></option>'
                      <?php
                      } ?>
                    </select>
                  </div>
                </div>
                <?php
                require_once '../../includes/dbh.inc.php';
                $sqli = "SELECT * FROM writter";
                $resu = mysqli_query($conn, $sqli) or die("query failed.");
                ?>
                <div class="form-group col-md-6">
                  <label class="col-sm-12 col-form-label">লেখক</label>
                  <div class="col-sm-12">
                    <select class="form-control" name="writter">
                      <option selected value="<?= $row['writter_name'] ?>"><?= $row['writter_name'] ?></option>
                      <?php
                      while ($rowd = mysqli_fetch_assoc($resu)) { ?>
                        echo'<option value="<?= $rowd['writter_id'] ?>"><?= $rowd['writter_name'] ?></option>'
                      <?php
                      } ?>
                    </select>
                  </div>
                </div>
              </div>
              <!-- ================ -->
              <!-- tag  -->
              <div class="form-group">
                <label for="exampleInputName1">প্রসঙ্গ</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="কমা দিয়ে প্রসঙ্গ ট্যাগ করুন (ex- রমজান, হজ)" name="tag" value=<?= $row['description'] ?>/>
              </div>
              <!-- <div class=" form-group">
                <img src="../images/<?= $row['post_img'] ?>" alt="" style="height:220px">
                <input type="hidden" name="old_post_img" value="<?= $row['post_img'] ?>" />
                <div class="input-group col-xs-12">
                  <input type="file" placeholder="image" name="post_img" value="<?= $row['post_img'] ?>" />
                </div>
              </div> -->
              <button type="submit" class="btn btn-success mr-2">Submit</button>
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