
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

     // echo '<span id="main_my_zxid" class="hidden" did="'.$org_id_pa.'" style="display: none ;"></span>';

      if(  $sz_st09 == 0 ) {

        
  echo '<script type="text/javascript">location.href = "first.php";</script>';
  
}



?>




<?php


$query = " SELECT * FROM  `appointment` WHERE  patient_id = ".$org_id_pa." AND  DATE(NOW()) <= DATE_FORMAT(time_from,'%Y-%m-%d')  AND  ( status= 0 AND delete_status = 0 ) ";
$appo_id = 0;

$result_view_class = $a->display($query); 
       foreach($result_view_class as $value) {
 
             $appo_id = $value['id'];



  }



if($appo_id ==0 ){
  echo '<script type="text/javascript">location.href = "appointment.php";</script>';
} else {



           $url = $_SERVER['REQUEST_URI']; //returns the current URL
    $parts = explode('/',$url);
    $dir = $_SERVER['SERVER_NAME'];
    for ($i = 0; $i < count($parts) - 2; $i++) {
     $dir .= $parts[$i] . "/";
    } 

 

  $image = "../assets/images/default.png";
 
    
$query = "SELECT a.id AS id, CONCAT( d.fname,' ',d.lname) AS doctor ,d.email AS email, d.image AS image, d.mphone AS mphone, d.lphone AS lphone, dp.name AS department,  DATE_FORMAT(a.time_from,'%d-%m-%Y') AS appointment_date,  DATE_FORMAT(a.time_from,'%r') AS time_from ,  DATE_FORMAT(a.time_to,'%r') AS time_to, a.description AS description, a.date AS date_time  FROM  `appointment`a LEFT JOIN doctor d ON a.doctor_id = d.id LEFT JOIN department dp ON d.department_id = dp.id  WHERE  a.id =".$appo_id;
 

              $result_view_class = $a->display($query); 
                     foreach($result_view_class as $value) {
               
                           //$value['id'];

 if(!is_null($value['image']))  {
          $image = "http://".$dir."doctor/images_/".$value['image'];

        } 

?>



<div class="show_hide_heres" id="show_hide_s1">
    <div class="row">
        
        <div class="col-md-10 headeerd" >
			<h1>
               Appointment
            </h1>
            <p>
                 current appointment.
            </p>

        </div>
           <div class=" col-md-2 element_history " >
    
           <a href="appointment_history.php" class="btn btn-default"> history </a>
        </div>

    </div>

     

    <div class="row back_white margin_to_10">
        
        <div class="col-md-offset-1 col-md-4 headeerd " >

        	 

    <form  id="" class="add_appointment_">
      <div class="form-horizontal new_edited_t" >  
   
 
                <div class="form-group has-feedback"> 
                    <label  class="col-sm-4 control_lab_k">doctor</label>
                  
                    <label id="added_dco1" did="" class="col-sm-8 "><?php echo $value['doctor'] ?></label>
 
                </div>

 
                <div class="form-group has-feedback"> 
                    <label  class="col-sm-4 control_lab_k">email</label>
                  
                    <label id="ademaild_dco1" did="" class="col-sm-8 "><?php echo $value['email'] ?></label>
 
                </div>



                <div class="form-group has-feedback"> 
                </div>
 
                <div class="form-group has-feedback"> 
                    <label  class="col-sm-4 control_lab_k">date of appointment</label>
                  

                    <label id="dofappo1" date="" class=" col-sm-8"><?php echo $value['appointment_date'] ?></label>

                     

                </div>

   <div class="form-group has-feedback"> 
                    <label for="firstName" class="col-sm-4 control_lab_k">time from</label>
                      
                    <label id="dappo_t_fo" class="col-sm-8 "><?php echo $value['time_from'] ?></label>
 

                </div>
   <div class="form-group has-feedback"> 
                    <label  class="col-sm-4 control_lab_k">tome to</label>
                    
                    <label id="dotommetopo1" class="col-sm-8"><?php echo $value['time_to'] ?></label>

                   

                </div>

                </div>
   <div class="form-group has-feedback"> 
                    <label  class="col-sm-4 control_lab_k">description</label>
                    
                    <p id="docdescription1" class="col-sm-8"><?php echo $value['description'] ?></p>

                   

                </div>

   <div class="form-group has-feedback"> 
                  
                </div>
   <div class="form-group has-feedback"> 
                  
                </div>


   <div class="form-group has-feedback"> 
                  
                </div>
   <div class="form-group has-feedback"> 
                  
                </div>


             </div>




        </form>





  




        <div class="col-md-7">

                 <div class="">
                  <div class="col-md-10 xdoc_details ">

       
                        <img src="<?php echo $image; ?>">
                        <h1> department : <?php echo $value['department'] ?></h1>
                        <h2>mobile <?php echo $value['mphone'] ?> </h2>
                        <h3>landline  <?php echo $value['lphone'] ?> </h3>
                        <p>appointment created at :  <?php echo $value['date_time'] ?> </p>

                    </div>
                     <div class="col-md-2 next_base">
                      <button type="button" did="<?php echo $value['id']; ?>" id="dave_theapp1" class=" btn btn-danger" style="margin-bottom: 20px;"> delete</button>
             </div>

                 </div>



        </div>


        </div>





    </div>


</div>

<?php

}
}

?>

 

<?php include_once('footer.php'); ?>

