
<?php include( 'header.php');  ?>


<?php //include_once('footer.php'); ?>




 



<div class="content-wrapper" style="min-height: 300px;">

  <section class="content-header">
    <h1>
      Log
      <small> video calling</small>
    </h1>

  </section>

  <section class="content">
    <div class="row">

      <div class="col-md-3">
        <div class="main_log_">
          <div class="head_menu">
             Doctor 




                          <select class="form-control js-example-basic-single js-example-tokenizer"  id="new_doc_one" name="new_doc"         >
 <option value="" selected="selected"></option>


<?php

 $query = " SELECT *, CONCAT( fname,' ' , lname) AS name FROM doctor  WHERE id NOT IN (SELECT doctor_id FROM patient WHERE id =".$idd." )   ORDER BY  fname DESC" ;
             $result = $a->display($query);
                
 
        foreach($result as $value) {

          echo ' <option value="'.$value['id'].'" >"'.$value['name'].'" </option>';
          }

?>

                          </select>

          </div>
 


              <ul class="nav nav-pills nav-stacked my_menu log_contact" id="all_me_users">



<?php 


 $query = " SELECT * FROM doctor WHERE id IN (SELECT doctor_id FROM patient WHERE id =".$idd." ) OR id IN ( SELECT DISTINCT(doctor_id) FROM call_log WHERE patient_id = ".$idd.")  ORDER BY  fname DESC" ;
             $result = $a->display($query);
               
  $image_temp = "../assets/images/default.png";
 
        foreach($result as $value) {

       if(!is_null($value['image'])) 
             if(file_exists("../doctor/images_/".$value['image']) ) {
          $image_temp = "http://".$dir."doctor/images_/".$value['image'];

            }

 $query = "SELECT DATE_FORMAT(date,'%Y-%m-%dT%TZ') AS new_date, date  FROM call_log  WHERE doctor_id=".$value['id'].'  AND patient_doctor =0 ORDER BY  date DESC LIMIT 1 ' ;
 
             $result1 = $a->display($query);
               $this_ = "";

        foreach($result1 as $value1) {
               $this_ = ' <span  data-livestamp="'.$value1['new_date'].'"></span> ';

        }



echo '  <li class="each_of_u">
              <a href="#"   did="'.$value['id'].'"  class="clcik_for_show_logCall" >
                <img src="'.$image_temp.'" >
                <span class="name_lrft"> '.$value['fname'].' '.$value['lname'].'</span>
                <span class="rrignt"> '.$this_.'</span>
              </a>
            </li>

            ';

 


        }
 
           
?>


 


                                </ul>



        </div>

      </div>
      



      <div class="col-md-9">
        <div class="main_log_" id="he_re_is_thie_clik" style="display: none;">
          <div class="row head_menu_list">

            <div class="col-md-3">

              <img src="" class="here_the_new_main">
            </div>


            <div class="col-md-offset-4 col-md-5">
              <div class="actual_right_i">
                <h1 class="name_acto"> name</h1>
                <h1 class="name_nemx_depar"> department</h1>

                <div id="action_vutton_here_click">

                </div>
              </div>
            </div>


          </div>

          <div class="x_clas_menC ">
          <ul class="nav nav-tabs">

            <li><a href="#"  class="active" id="clcik_for1">all</a></li>
            <li><a href="#" id="clcik_for2">incoming</a></li>
            <li><a href="#" id="clcik_for3">outgoing</a></li>
            <li><a href="#" id="clcik_for4">missed</a></li>
          </ul>

            <ul class="nav nav-pills nav-stacked my_menu" id="new_details_desc">
                 <!--
         <li class="each_of_u_here" status="0">
                            <img src="" class="each_of_u_">
                            <span class="name_lrft"> hello worlsd</span>
                            <span class="manme_cio"> 
            <!-- <i class="fa fa-arrow-down color-green" aria-hidden="true"></i>
            <i class="fa fa-arrow-up color-blue" aria-hidden="true"></i> 
            <i class="fa fa-bolt color-red" aria-hidden="true"></i>
             - ->
                            <span style="padding-left: 20px;"> time total </span>
                            <span class="rrignt"> time</span>
                          </li>


                 -->



            </ul>
          </div>
        </div>

      </div>
      

    </div>
  </section>
</div>














<?php include_once('footer.php'); ?>

