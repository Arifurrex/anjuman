<?php
// session_start();
// if($_SESSION['role'] == 0){
//   header('location:../admin/index.php');
//   exit();
// }
?>
<?php include "header.php"; ?>
  <div class="admin-content">        
  <div class="contact__form"> 
    <form action="../includes/add-member.inc.php" method="post" enctype="multipart/form-data" autocomplete="off">
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
     }
      echo'<span class="closebtn" id="closebtn"onclick="this.parentElement.style.display='.'none'.';" >&times;</span>
     </div>';
    }
     ?>
             <div class="add-user-header">
             <a href="http://localhost:3000/admin/all-member.php">
             <h4 class="admin-heading">Add New Member</h4>
             </a>
                 
             </div>
          <div class="from-control paragraph">
            <input type="text" placeholder="frist-name" name="first_name"/>
          </div>
          <div class="from-control paragraph">
            <input type="text" placeholder="last-name"  name="last_name"/>
          </div>
          <div class="from-control paragraph">
            <input type="text" placeholder="father name"  name="father_name"/>
          </div>
          <div class="from-control paragraph">
            <input type="text" placeholder="phone"  name="phone"/>
          </div>
          <div class="from-control paragraph">
          <input type="text" placeholder="email"  name="email"/>
          </div>

          <!-- district  -->
          <?php $sqli="select * from district ";
          $resultdistrict=mysqli_query($conn,$sqli) or die('query failed');
          ?>
          <div class="from-control paragraph">
            <select name="district_id" id="district" required>
            <option selected value="" disabled>select district </option>
            <?php while($row4=mysqli_fetch_assoc($resultdistrict)){?>
            <option value="<?=$row4['id']?>"><?=$row4['district_name']?></option>
              <?php }?>
            </select>
          </div>
         
          
          <!-- upojella  -->
          <div class="from-control paragraph">
            <select name="upojella_id" id="upojella" required> 
            <option selected  disabled>select sub-district </option>
            
            </select>
          </div>

          
        <!-- posoffice or union  -->
          <div class="from-control paragraph">
            <select name="postoffice_id" id="postoffice" required>
            <option selected value="" disabled>select union </option>
           
            </select>
          </div>

          <?php $sqli="select * from village";
         $resultvillage=mysqli_query($conn,$sqli) or die('query failed');
        ?>
          <div class="from-control paragraph">
            <select name="village_id" id="" required>
            <option selected value="" disabled>select village </option>
            <?php while($row1=mysqli_fetch_assoc($resultvillage)){?>
            <option value="<?=$row1['village_id']?>"><?=$row1['village_name']?></option>
              <?php }?>
            </select>
          </div>

        
          
          <div class="from-control paragraph">
            <input type="text" placeholder="nid number"  name="nid"/>
          </div>
         
          <div class="from-control paragraph">
            <select name="blood_group_id" id="" required>
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
          <div class="from-control paragraph">
            <input type="file" placeholder="profile image"  name="avater"/>
          </div>
          <div class="from-control paragraph">
            <input type="hidden"  name="status" value="1"/>
          </div>
          <div class="from-control">
            <input type="submit" value="save" name="submit" class="btn" />
          </div>
        </form>
   </div>
                  <!--/Form -->
 
          
  </div>
<?php include "footer.php"; ?>
<script>

     $(document).ready(function(){
       // district on change hole upojella select hobe 
      $('#district').on('change',function(){
         var districtid=$(this).val();
         console.log(districtid);
            $.ajax({
               url:"admin/districtajax.php",
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
               url:"admin/districtajax.php",
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



