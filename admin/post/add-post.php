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
                  <h4 class="card-title">Add post form</h4>
                  <p class="card-description">
                    add your post here
                  </p>
                  <form action="https://www.anjumanehefajoth.com/includes/add-pos.inc.php" method="post"  enctype="multipart/form-data" class="forms-sample" accept-charset="utf-8">
                    <?php
                    if(isset($_GET['msg'])){
                   echo'<div class="alert">';
                   if($_GET['msg'] =='emptyinpute'){
                   echo"please fill all input"; 
                   }else if($_GET['msg']=='invalidfirstname'){
                   echo"please fill valid firstname";
                   }else if($_GET['msg']=='invalidlastName'){
                  echo"please fill valid lastName";
                  }else if($_GET['msg']=='usernametaken'){
                  echo"username is taken";
                  }else if($_GET['msg']=='invalidpas'){
                   echo"password must be 8 character";
                    }
                  echo'<span class="closebtn" id="closebtn"onclick="this.parentElement.style.display='.'none'.';" >&times;</span>
                </div>';
                  }
                 ?>
                    <div class="form-group">
                      <label for="exampleInputName1">title</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="title" name="title"/>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">description</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="6"placeholder="description"  name="description"></textarea>
                    </div>
                    <!-- ====================== -->
                    <?php
                    require_once '../../includes/dbh.inc.php';
                    $sqli="SELECT * FROM category";
                    $resu=mysqli_query($conn,$sqli) or die("query failed.");
                    ?>
                        <div class="form-group row">
                          <label class="col-sm-12 col-form-label">Category</label>
                          <div class="col-sm-12">
                            <select class="form-control" name="category">
                              <option selected >select category option</option>
                              <?php
                              while($rowd=mysqli_fetch_assoc($resu)){ ?>
                              echo'<option  value="<?= $rowd['category_id']?>"><?= $rowd['category_name']?></option>' 
                              <?php
                              }?>
                            </select>
                          </div>
                        </div>
                      <!-- ================ -->
                    
                    <div class="form-group">
                      <div class="input-group col-xs-12">
                      <input type="file" placeholder="post_img"  name="post_img"/>
                      </div>
                    </div>
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
   