
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

   //   echo '<span id="main_my_zxid" class="hidden" did="'.$org_id_pa.'" style="display: none ;"></span>';

      if(  $sz_st09 == 0 ) {

        
  echo '<script type="text/javascript">location.href = "first.php";</script>';
  
}



?>







        <div class="content-wrapper" style="min-height: 300px;" id="helloacjofhiouyr5345897">

             
            <section class="content">
            <div class=" message1">
              <div class="row back_white aino3" >
                
                <div class="col-md-8">
                    

                     <div class="panel panel-info">
            <div class="panel-heading my_head_msg">
               <img class="col-sm-1 to_image" src="">
               <h1 class="col-sm-11"> RECENT CHAT HISTORY</h1>
            </div>
            <div class="panel-body scrollas pakoda_backo_etra ">

          
                                      
<ul class="media-list" id="displsy_mshd" did="0">

                                  

                                </ul>    
                    </div>


            </div>
            <div class="panel-footer">
                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter Message"  id="text_area_oi" />
                                    <span class="input-group-btn">
                                        <button class="btn btn-info" type="button" id="send_this_message" style="margin-right: 0px;margin-top: 0px;">SEND</button>
                                    </span>
                                </div>
            
        </div>
                </div> 

                <div class="col-md-4">
                       <div class="panel panel-primary">
            <div class="panel-heading" style="text-transform: uppercase;">
               Doctor 




                          <select class="form-control js-example-basic-single js-example-tokenizer"  id="new_doc" name="new_doc"         >
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
                 <div class="panel-body scrollas pakoda_backo_etra ">

                <ul class="media-list" id="all_me_users">



<?php 


 $query = " SELECT * FROM doctor WHERE id IN (SELECT doctor_id FROM patient WHERE id =".$idd." ) OR id IN ( SELECT DISTINCT(doctor_id) FROM message WHERE patient_id = ".$idd.")  ORDER BY  fname DESC" ;
             $result = $a->display($query);
               
  $image_temp = "../assets/images/default.png";
 
        foreach($result as $value) {

       if(!is_null($value['image'])) 
             if(file_exists("../doctor/images_/".$value['image']) ) {
          $image_temp = "http://".$dir."doctor/images_/".$value['image'];

            }

 $query = "SELECT DATE_FORMAT(date,'%Y-%m-%dT%TZ') AS new_date, date  FROM `message` WHERE doctor_id=".$value['id'].'  AND patient_doctor =0 ORDER BY date DESC LIMIT 1 ' ;

             $result1 = $a->display($query);
               $this_ = "";

        foreach($result1 as $value1) {
               $this_ = ' <span data-livestamp="'.$value1['new_date'].'"></span> ';

        }



echo '
                        <li class="media">
                            <div class="media-body">
                                <div class="media">
                                
                                   <form name="photo" action="patient.php" method="post" enctype="multipart/form-data" class="hidden"  >
           <input type="text" name="id" class="hidden" value="'.$value['id'].'" id="passvaluePo" />
 <input type="submit" name="upload" value="View" class="col-sm-12 btn btn-default clcik_fk hidden"   />
</form>
                                    <a class="pull-left clcik_for_these_" href="#" >
                                        <img class="media-object img-circle" style="max-height:40px;" src="'.$image_temp.'" />
                                    </a>
                                    <div  did="'.$value['id'].'"  class="media-body click_show" >
                                        <h5> '.$value['fname'].' '.$value['lname'].' </h5>
                                       <small class="text-muted">'.$this_.'</small><div class="nobershere"><p> </p></div>
                                    </div>
                                </div>
                            </div>
                        </li>';



        }
 
           
?>


 


                                </ul>
                </div>
            </div>
                </div> 


            </div>

            </div>
            </section>
        </div>














<?php include_once('footer.php'); ?>

