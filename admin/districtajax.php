
<?php       
require_once "../includes/dbh.inc.php";
 // district on change hole upojella select hobe 
    $disid=$_POST['disid'];
    $sqli="SELECT * FROM `upojella` WHERE `district_id`='$disid'";
    $result=mysqli_query($conn,$sqli) or die('query failed');  
    
    while($rowupo=mysqli_fetch_assoc($result)){
        echo '<option value="'.$rowupo["upojella_id"].'">'.$rowupo["upojella_name"].'</option>';
      }

     //  upojella on change hole posvtoffice ba union change hobe 
      if(isset( $_POST['id'])){
        $id=$_POST['id'];
        $sqlp="SELECT * FROM `postoffice` WHERE `upojella_id`='$id'";
        
        $resultpostoffice=mysqli_query($conn,$sqlp) or die('query failed');
               
        while($row3=mysqli_fetch_assoc($resultpostoffice)){
                  echo '<option value="'.$row3["postoffice_id"].'">'.$row3["postoffice_name"].'</option>';
         }
    }
    
   