
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

    
      if(  $sz_st09 == 0 ) {

        
  echo '<script type="text/javascript">location.href = "first.php";</script>';
  
}



?>


<?php


$query = " SELECT * FROM  `appointment` WHERE  patient_id = ".$org_id_pa." AND  DATE(NOW()) <=  time_from   AND  ( status= 0 AND delete_status = 0 ) ";
$appo_id = 0;

$result_view_class = $a->display($query); 
       foreach($result_view_class as $value) {
 
             $appo_id = $value['id'];
      }



if($appo_id !=0 ){
  echo '<script type="text/javascript">location.href = "appointments.php";</script>';
}

?>








<div class="show_hide_here" id="show_hide_1">
    <div class="row">
        
        <div class="col-md-10 headeerd" >
			<h1>
               Appointment
            </h1>
            <p>
                Get an appointment.
            </p>

        </div>
           <div class=" col-md-2 element_history " >
		
           <a href="appointment_history.php" class="btn btn-default"> history </a>
        </div>

    </div>

    <div class="row back_white element_for_rewo">
        
        <div class="col-md-4 headeerd headeerd_step" >

        	<h1> 1 </h1>
        	<p> first step, select a doctor</p>
        </div>
  
        <div class="col-md-4 headeerd headeerd_step0" >

        	<h1> 2 </h1>
        	<p> Second step, select a schedule</p>
        </div>
  
        <div class="col-md-4 headeerd headeerd_step0" >

        	<h1> 3 </h1>
        	<p> Third step, finish</p>
        </div>

    </div>

    <div class="row back_white margin_to_10">
        
        <div class="col-md-offset-1 col-md-4 headeerd " >

        	

    <form role="form" id="add_appointment_1" class="add_appointment_">
      <div class="form-horizontal new_edited_t" >  
   
 
                <div class="form-group has-feedback"> 
                    <label for="firstName" class="col-sm-4 control-label">department</label>
                    <div class="col-sm-8">


                    <select class="form-control js-example-basic-single btn-lg"  id="xdepartment_name"  name="xdepartment_name"    placeholder="department name"    >
                      <?php 
                         
                         $query = " SELECT * FROM department   WHERE delete_status=0   ORDER BY `department`.`date` DESC  ";
                         $result_view_class = $a->display($query);
                         
                               foreach($result_view_class as $value) {

                                echo  ' <option value="'.$value['id'].'">'.$value['name'].'</option>'     ;       
                             
                            }
                  
                  ?>

                      </select>


                        <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span> 
                        <span class="and_user_msg sr-only"></span>  

                    </div>
                </div>



                <div class="form-group has-feedback"> 
                </div>
 
                <div class="form-group has-feedback"> 
                    <label for="firstName" class="col-sm-4 control-label">doctor</label>
                    <div class="col-sm-8">


                    <select class="form-control js-example-basic-single "  id="xdoctor_name"         >

                    </select>


                        <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span> 
                        <span class="and_user_msg sr-only"></span>  

                    </div>

                </div>



             </div>

        </form>
        </div>


        <div class="col-md-7">

        	       <div class="new_cla_cli">
        	       	<div class="col-md-10 xdoc_details ">

       
                        <img src="">
                        <h1> doc name</h1>
                        <h2> eamil@jkhfg.co</h2>
                        <h3> mno</h3>
                        <p>qualification</p>

                    </div>
                     <div class="col-md-2 next_base">
				        	<button class="btn btn-success next_button_man" did="" id="necy_appo_1"> next</button>
				     </div>

        	       </div>



        </div>
  

    </div>


</div>



<!--===============================================================================================================================-->




<div class="show_hide_here" did="" id="show_hide_2" style="display: none">
    <div class="row">
        
        <div class="col-md-12 headeerd" >
			<h1>
               Appointment
            </h1>
            <p>
                Get an appointment.
            </p>

        </div>

    </div>

    <div class="row back_white element_for_rewo">
        
        <div class="col-md-4 headeerd headeerd_step" >

        	<h1 class="click_id_d1"> 1 </h1>
        	<p> first step, select a doctor</p>
        </div>
  
        <div class="col-md-4 headeerd headeerd_step" >

        	<h1> 2 </h1>
        	<p> Second step, select a schedule</p>
        </div>
  
        <div class="col-md-4 headeerd headeerd_step0" >

        	<h1> 3 </h1>
        	<p> Third step, finish</p>
        </div>

    </div>

    <div class="row back_white margin_to_10 margin_to_10_">
        
        <div class=" col-md-11" >
  	<div class="head_deacja">
  		
   <div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%;'>
      <div class="dhx_cal_navline">
         <div class="dhx_cal_prev_button">&nbsp;</div>
         <div class="dhx_cal_next_button">&nbsp;</div>
         <div class="dhx_cal_today_button"></div>
         <div class="dhx_cal_date"></div>
         <div class="dhx_minical_icon" id="dhx_minical_icon" onclick="show_minical()">&nbsp;</div>
			<div class="dhx_cal_tab" name="workweek_tab" style="right:204px;"></div>
         <div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
         <div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
         <div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
      </div>
      <div class="dhx_cal_header">
      </div>
      <div class="dhx_cal_data">
      </div>
   </div>
  	</div>

  
        </div>
          <div class="col-md-1 next_base">
	        	<button class="btn btn-success next_button_man" did="" id="necy_appo_2"> next</button>
	     </div>



    </div>


</div>





<!--========================================================
+===================================================================================================-->




<div class="show_hide_here" id="show_hide_3"  style="display: none">
    <div class="row">
        
        <div class="col-md-12 headeerd" >
			<h1>
               Appointment
            </h1>
            <p>
                Get an appointment.
            </p>

        </div>

    </div>

    <div class="row back_white element_for_rewo">
        
        <div class="col-md-4 headeerd headeerd_step" >

        	<h1 class="click_id_d1"> 1 </h1>
        	<p> first step, select a doctor</p>
        </div>
  
        <div class="col-md-4 headeerd headeerd_step" >

        	<h1 class="click_id_d2"> 2 </h1>
        	<p> Second step, select a schedule</p>
        </div>
  
        <div class="col-md-4 headeerd headeerd_step" >

        	<h1> 3 </h1>
        	<p> Third step, finish</p>
        </div>

    </div>

    <div class="row back_white margin_to_10">
        
        <div class="col-md-offset-1 col-md-10 headeerd " >

        	

    <form  id="" class="add_appointment_">
      <div class="form-horizontal new_edited_t" >  
   
 
                <div class="form-group has-feedback"> 
                    <label  class="col-sm-4 control_lab_k">doctor</label>
                  
                    <label id="added_dco" did="" class="col-sm-8 ">nil</label>
 
                </div>

 
                <div class="form-group has-feedback"> 
                    <label  class="col-sm-4 control_lab_k">email</label>
                  
                    <label id="ademaild_dco" did="" class="col-sm-8 ">nil</label>
 
                </div>



                <div class="form-group has-feedback"> 
                </div>
 
                <div class="form-group has-feedback"> 
                    <label  class="col-sm-4 control_lab_k">date of appointment</label>
                  

                    <label id="dofappo" date="" class=" col-sm-8">nil</label>

                     

                </div>

   <div class="form-group has-feedback"> 
                    <label for="firstName" class="col-sm-4 control_lab_k">time from</label>
                      
                    <label id="dappo_t_fo" class="col-sm-8 ">nil</label>
 

                </div>
   <div class="form-group has-feedback"> 
                    <label  class="col-sm-4 control_lab_k">tome to</label>
                    
                    <label id="dotommetopo" class="col-sm-8">nil</label>

                   

                </div>

                </div>
   <div class="form-group has-feedback"> 
                    <label  class="col-sm-4 control_lab_k">description</label>
                    
                    <p id="docdescription" class="col-sm-8">nil</p>

                   

                </div>

   <div class="form-group has-feedback"> 
                  
                </div>
   <div class="form-group has-feedback"> 
                  
                </div>
   <div class="form-group has-feedback"> 
                  <button type="button" id="dave_theapp" class="col-sm-offset-10 col-sm-2 btn btn-" style="margin-bottom: 20px;"> confirm</button>
                </div>


   <div class="form-group has-feedback"> 
                  
                </div>
   <div class="form-group has-feedback"> 
                  
                </div>


             </div>

        </form>
        </div>





    </div>


</div>



<!--===============================================================================================================================-->









<?php include_once('footer.php'); ?>

