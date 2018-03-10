
<?php include( 'header.php');  ?>


<?php //include_once('footer.php'); ?>





 

      <?php



 $query = " SELECT * FROM `patient` WHERE patient_details_id = ".$idxd;
 $result_view_class = $a->display($query);
 $sz_st09 = 0;
      $org_id_pa = 0;

       foreach($result_view_class as $value) {
        $sz_st09 = 1;
             $org_id_pa = $value['id'];

      }

$idd = $org_id_pa;

    //  echo '<span id="main_my_zxid" class="hidden" did="'.$org_id_pa.'" style="display: none ;"></span>';

      if(  $sz_st09 == 0 ) {

        
  echo '<script type="text/javascript">location.href = "first.php";</script>';
  
}



?>








<div class="show_hide_here" id="show_hide_1">
    <div class="row">
        
        <div class="col-md-10 headeerd" >
			<h1>
               Payment History
            </h1>
            <p>
                 your cash payment history.
            </p>

        </div>
         
    </div>

    <div class="row back_white element_for_rewo">
<!--========================================================================================================================================-->



        <div class="content-wrapper show_hide <?php if($idd == 0) { echo "hidden";} ?> " style="min-height: 300px;   <?php if($idd == 0) { echo "display: none";} ?> " id="davko_jnako_0934000">
 


 <?php 


 $query = "SELECT pd.*,p.*, g.name AS gname,g.address AS gaddress, g.mphone AS gmphone, g.lphone AS glphone, g.relation AS grelation ,p.delete_status AS status_delete , b.group_name AS group_name, DATE_FORMAT(p.dob,'%d-%m-%Y') AS fdob, DATE_FORMAT(p.start_date,'%d-%m-%Y') AS fstart_date,   CONCAT( d.fname,' ',d.lname) AS doctor ,dp.name AS department, d.email AS demail FROM patient p LEFT JOIN patient_details pd ON p.patient_details_id = pd.id LEFT JOIN guardian g ON g.patient_id = p.id LEFT JOIN blood_group b ON p.blood_group_id = b.id LEFT JOIN doctor d ON p.doctor_id = d.id LEFT JOIN department dp ON d.department_id = dp.id  WHERE p.id=".$idd." ORDER BY p.date";

             $result = $a->display($query);
             

 $id = "";    $fname = "";    $lname = "";    $email = "";    $password = "";    $image = "";    $delete_status = "";    $date = "";    $id = "";    $doctor_id = "";    $patient_details_id = "";    $mphone = "";    $lphone = "";    $sex = "";    $dob = "";    $blood_group_id = "";    $address = "";    $start_date = "";    $colour = "";    $description = "";    $valid_status = "";    $delete_status = "";    $date = "";    $gname = "";    $gaddress = "";    $gmphone = "";    $glphone = "";    $grelation = "";    $status_delete  = ""; 


 $grelation = ""; 
 $grelation = ""; 
 $demail = "";

  $image_temp = "../assets/images/default.png";

        foreach($result as $value) {
           
             if(!is_null($value['image'])) 
             if(file_exists("../patient/images_/".$value['image']) ) {
          $image_temp = "http://".$dir."patient/images_/".$value['image'];

        
        } 


$statu = "accomplish";
$stat_color ="green";
// if($value['status'] == 0){
//     $statu = "incompetent";
//     $stat_color ="blue";

// }

 $fname = $value['fname']; 
 $lname = $value['lname']; 
 $email = $value['email'];  
 $image =  $image_temp;     
 $mphone = $value['mphone']; 
 $lphone = $value['lphone']; 
 $sex = $value['sex']; 
 $dob = $value['fdob']; 
 $blood_group_id = $value['group_name']; 
 $address = $value['address']; 
 $start_date = $value['fstart_date']; 
 $colour = $value['colour']; 
 $description = $value['description']; 
 $valid_status = $value['valid_status'];   
 $gname = $value['gname']; 
 $gaddress = $value['gaddress']; 
 $gmphone = $value['gmphone']; 
 $glphone = $value['glphone']; 
 $grelation = $value['grelation']; 


 $doctor = $value['doctor']; 
 $department = $value['department']; 
 $demail = $value['demail']; 


 $status_delete  = 'deleted' ; 
 if($value['status_delete'] == 0)
 $status_delete  = 'Active' ; 

}


 ?> 

      

 
 

             <section class="content">
 
                <div class="col-md-12 back_white pading_5">

                    <div class="row  pading_5">
                        <div class="col-md-12 ">

<!--========================================================================================================================================-->

<!--===================================================================================================================================-->


<?php 

 $query = "SELECT p.*, py.pharmacist_id AS pharmacist,  DATE_FORMAT(py.date,'%d-%m-%Y %r') AS new_date FROM `prescription` p LEFT JOIN payment py ON py.prescription_id = p.id   WHERE p.patient_id =".$idd." AND p.delete_status =0 AND p.id IN (SELECT prescription_id FROM payment) ORDER BY  date DESC" ;

             $result = $a->display($query);
               

        foreach($result as $value) {
 
$tro_to = 0;
           
?>











<div class="row main_head_br" <?php  if( $value['delete_status'] !=0 ) { echo 'style="background-color: #ff00004d;"';} ?> >

<div class="col-md-12 elementxoc">
  <h1 class="col-sm-5 clls_head1 clasoo0978" ><strong>Time : </strong> <?php echo $value['new_date']; ?></h1>



<?php 


 $queryx = "SELECT * FROM `pharmacist` WHERE id = ".$value['pharmacist'] ;

             $resultx = $a->display($queryx);
               

        foreach($resultx as $valuex) {
?>

 <h1 class="col-sm-offset-2 col-sm-5 clls_head1 clasoo0978" ><strong>Pharmacist : </strong> <?php
  echo $valuex['fname'].' '.$valuex['lname'].' -('.$valuex['email'].') '; ?></h1>
  


<?php 


        }
 
?>

 
</div>

 
 
  <div class="col-md-12 sub_head_desc" >
    <h1 class="col-sm-10" style="border: none !important;"> medicines</h1>

    <form>



<?php 


 $query1 = "SELECT  m.unit_price AS price, p.*,m.name AS mname, DATE_FORMAT(p.date_from,'%d-%m-%Y') AS d_from, DATE_FORMAT(p.date_to,'%d-%m-%Y') AS d_to  FROM `prescribe` p LEFT JOIN medicines m ON m.id = p.medicines_id WHERE p.prescription_id =".$value['id']." AND p.delete_status =0  ORDER BY `date` DESC" ;

             $result1 = $a->display($query1);
               
$total = 0;
        foreach($result1 as $value1) {
 
         //  echo $value1['id'];
  

  $timmz =  retun_times_number ($value1['time']);
  $priz1 =  $value1['price'];

  $total =  ( $timmz * $priz1 );
 
$date_froma = strtotime( $value1['date_from']);
$date_toa = strtotime( $value1['date_to']);
$datediff = $date_toa - $date_froma;

$daz= floor($datediff / (60 * 60 * 24));
 
 $total = $total* $daz;
$tro_to = $tro_to+$total;

?>
 


      <div>
                   <div class="form-group" style="margin-left: 5px;"  > 
                        <div class=" col-sm-9 "><p class="main_medic_name" ><?php  echo $value1['mname']; ?></p> </div> 
                        <div class=" col-sm-3 "><p class="main_medic_name" ><strong> Price :- </strong> <?php  echo $value1['price']; ?> INR</p> </div> 
                   </div>
                    <div class="form-group" style="margin-left: 5px;"  > 
                       <div class=" col-sm-9 "><p class=" "><?php  echo $value1['time']; ?></p> </div> 
                       <div class=" col-sm-3 "><p class=" "><?php  echo $value1['amount']; ?>ml/gm</p> </div> 
                   </div>
                  <div class="form-group" style="margin-left: 5px;"  > 
                       <div class="col-md-offset-1 col-sm-11 "><p class=" "><strong>From :</strong><?php  echo $value1['d_from']; ?></p> </div> 
                   </div>
                  <div class="form-group" style="margin-left: 5px;"  > 
                       <div class="col-md-offset-1 col-sm-8 "><p class=" "><strong>To :</strong><?php  echo $value1['d_to']; ?></p> </div> 
                       <div class=" col-sm-3 "><p class=" "><strong></strong><?php  echo $daz; ?> days</p> </div> 
                   </div>
                    <div class="form-group " style="margin-left: 5px;"  > 
                        <div class=" col-sm-10  show_border"><p ><strong>description :</strong><?php  echo $value1['description']; ?></p> </div> 
                  <div class="  col-sm-2  show_border"><p ><strong>Total :</strong><?php  echo $total; ?>INR</p> </div> 
                   </div>                      
           
      </div>



<?php

}

?>


</form>





  </div>
  
      <?php

            $query8 = "SELECT dp.name AS department , CONCAT(d.fname,' ',d.lname) AS name FROM `doctor`d LEFT JOIN department dp ON d.department_id = dp.id WHERE d.id =".$value['doctor_id']." LIMIT 1 "  ;

             $result8 = $a->display($query8);
         $doc_ar = "";      

        foreach($result8 as $value8) {
            $doc_ar = '<p class="col-sm-10" style="text-align: left;color: #ed8151;"> <strong>prescribed by </strong>'.$value8['name'].' -('.$value8['department'].') </p>';
        }
          echo $doc_ar;
      ?>

                   <div class="form-group " style="margin-left: 5px;"  > 
                  <div class="col-sm-offset- 10  col-sm-2  "><p ><strong>G-Total :</strong><?php  echo $tro_to; ?>INR</p> </div> 
                   </div>  

</div>

<?php 


}

?>
 

<!--===================================================================================================================================-->



<!---========================================================================================================================================-->

                        </div>
                    </div>
                </div>


            </section>








        </div>





<!--=========================================================================================================================================-->
    </div>


 </div>


<?php

 function retun_times_number ( $time) {
    $retn =0;
 
    if(trim($time, ' ') == "morning and evening")
      $retn = 2; 
    if(trim($time, ' ') == "morning")
      $retn = 1; 
    if(trim($time, ' ') == "afternoon")
      $retn = 1; 
    if(trim($time, ' ') == "evening")
      $retn = 1; 
    if(trim($time, ' ') == "before sleep")
      $retn = 1; 
    if(trim($time, ' ') == "three times")
      $retn = 3; 
    if(trim($time, ' ') == "once")
      $retn = 1;
    if(trim($time, ' ') == "other")
      $retn = 5; 


    return $retn;
 }


?>




<?php include_once('footer.php'); ?>

