
<?php include( 'header.php');  ?>


<?php //include_once('footer.php'); ?>

<?php   
 
 if ($_POST) { 
    if(!empty($_POST['id'])){
        $_SESSION['postid'] = $_POST['id'];
    }
   header("Location: " . $_SERVER['REQUEST_URI']);
   exit();
}

 
$idd = 0; 
 
if(!empty($_SESSION['postid'])){


 $query = "SELECT * FROM prescription WHERE  id=".$_SESSION['postid'];
     if($a->display($query)) {
        $idd = $_SESSION['postid']; 
    }
} else {
    $idd=0;

}
 

 unset($_SESSION["postid"]);

?>



<?php
 if( $idd != 0) {

?>
 
 

  <div class="container show_hide" id="head_show_hide1">


    <div class="row ">

    
        <div class="col-md-12 bg_color_green">
           
            <h1 class="to_uppercase">
              History
            </h1>
            <p class="to_details_p">
            <?php 
      function show_name( $name) {
          echo $$name;
      }
            ?>
            </p>
           
        </div>
  </div>


    <div class="row">
      <div class="col-md-12">
 

 <!--========================================================================================================================================-->

<!--===================================================================================================================================-->

 




 <table class="table table-bordered table-striped sortable miyazaki my_table_x4" style="margin-top: 50px;"> 
    <thead>
      <tr>
        <th data-defaultsign="AZ">Patient</th>
        <th data-defaultsign="AZ">Email</th>
        <th data-defaultsign="_19">Price</th>
        <th data-defaultsign="DD-MM-YYYY hh:mm:ss a">Date</th> 
      </tr>
    </thead>
    <tbody>


    <?php  
try {
 
 $query = "SELECT pm.*, DATE_FORMAT(pm.date,'%d-%m-%Y %r') AS new_date , CONCAT( pd.fname, ' ',pd.lname) AS patient, pd.email AS email FROM `payment` pm LEFT JOIN prescription pr ON pm.prescription_id = pr.id LEFT JOIN  patient pa ON pr.patient_id = pa.id LEFT JOIN patient_details pd ON pa.patient_details_id = pd.id WHERE pa.id IN (SELECT patient_id FROM prescription WHERE id = ".$idd." ) ORDER BY pm.date DESC ";



$io = 0;

                 if( $result = $a->display($query)) {
                  

                  
                    $sno =1 ;
                     foreach ( $result as $value) {


                      


                      echo ' <tr>
                            <td>'.$value['patient'].'</td>
                            <td><p>'.$value['email'].'</p></td>
                            <td data-value="'.$value['amount'].'">'.$value['amount'].'</td>
                            <td  >'.$value['new_date'].'</td> 
                          </tr>';





                     }
                       
                    
                  }







} catch (Exception $e) {

}






     ?>
      
    </tbody>
  </table>    




 
      </div>

    </div>

  </div>

 

<?php

} else {
?>




 

  <div class="container show_hide" id="head_show_hide1">


    <div class="row ">

    
        <div class="col-md-12 bg_color_green">
           
            <h1 class="to_uppercase">
              History
            </h1>
            <p class="to_details_p">
            
            </p>
           
        </div>
  </div>


    <div class="row">
      <div class="col-md-12">
 

 <!--========================================================================================================================================-->

<!--===================================================================================================================================-->

 




 <table class="table table-bordered table-striped sortable miyazaki my_table_x4" style="margin-top: 50px;"> 
    <thead>
      <tr>
        <th data-defaultsign="AZ">Patient</th>
        <th data-defaultsign="AZ">Email</th>
        <th data-defaultsign="_19">Price</th>
        <th data-defaultsign="DD-MM-YYYY hh:mm:ss a">Date</th> 
      </tr>
    </thead>
    <tbody>


    <?php  
try {
 
 $query = "SELECT pm.*, DATE_FORMAT(pm.date,'%d-%m-%Y %r') AS new_date ,CONCAT( pd.fname, ' ',pd.lname) AS patient, pd.email AS email FROM `payment` pm LEFT JOIN prescription pr ON pm.prescription_id = pr.id LEFT JOIN patient pa ON pr.patient_id = pa.id LEFT JOIN patient_details pd ON pa.patient_details_id = pd.id WHERE pm.pharmacist_id = ".$idxd." ORDER BY pm.date DESC ";




                 if( $result = $a->display($query)) {
                  
                  
                    $sno =1 ;
                     foreach ( $result as $value) {
                      $delete_status = " green";
                     

                      echo ' <tr>
                            <td>'.$value['patient'].'</td>
                            <td><p>'.$value['email'].'</p></td>
                            <td data-value="'.$value['amount'].'">'.$value['amount'].'</td>
                            <td  >'.$value['new_date'].'</td> 
                          </tr>';





                     }
                       
                    
                  }







} catch (Exception $e) {

}






     ?>
      
    </tbody>
  </table>    




 
      </div>

    </div>

  </div>

 









<?php 

}
?>


<?php include_once('footer.php'); ?>

