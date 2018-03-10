
<?php include( 'header.php');  ?>


<?php //include_once('footer.php'); ?>

 
<?php



 $query = " SELECT * FROM `patient` WHERE patient_details_id = ".$idxd;
 $result_view_class = $a->display($query);
 $sz_st09 = 0;
      
       foreach($result_view_class as $value) {
        $sz_st09 = 1;
      
      }

      if(  $sz_st09 != 0 ) {
  echo '<script type="text/javascript">location.href = "index.php";</script>';
  
}



?>








<div class="">
    <div class="row">
        
        <div class="col-md-12 headeerd" >
            <h1>
                complete your profile.
            </h1>
            <p>
                Please complete your profile.
            </p>

        </div>

    </div>
 <div class="row element_for_rewo">
 <div class="col-md-7">
        <div class="main_inage_bg">
            

        </div>

 </div>
      <div class="col-md-5 jzt_margin_bott">

    <form role="form" id="add_profile">
      <div class="form-horizontal new_edited_t" >  
         <div class="form-group has-feedback">  
                    <label for="firstName" class=" col-sm-12 control-label form-head">SELECT a Doctor</label>
                </div>



 
                <div class="form-group has-feedback"> 
                    <label for="firstName" class="col-sm-4 control-label">department</label>
                    <div class="col-sm-8">


                    <select class="form-control js-example-basic-single"  id="department_name"  name="department_name"    placeholder="department name"    >
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
                    <label for="firstName" class="col-sm-4 control-label">doctor</label>
                    <div class="col-sm-8">


                    <select class="form-control js-example-basic-single"  id="doctor_name"  name="department_name"        >

                    </select>


                        <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span> 
                        <span class="and_user_msg sr-only"></span>  

                    </div>
                    <div class="doc_details">
                        <img src="">
                        <h1> doc name</h1>
                        <h2> eamil@jkhfg.co</h2>
                        <p>mobile no</p>

                    </div>
                </div>





        <div class="form-group has-feedback">  
                    <label for="firstName" class=" col-sm-12 control-label form-head">insert basic details</label>
                </div>






    <div class="form-group has-feedback">  
                    <label for="firstName" class="col-sm-4 control-label">mobile phone</label>
                    <div class="col-sm-8">
                   
                          <input id="pmphone"  name="pmphone" type="tel"  placeholder="mobile phone"  class="form-control  "  >  
                        <span class="glyphicon   right--20" aria-hidden="true"></span> 
            <span class="and_user_msg sr-only"></span>  

                    </div>
                </div>




    <div class="form-group has-feedback" >  
                    <label for="firstName" class="col-sm-4 control-label">landline</label>
                    <div class="col-sm-8">
                         <input id="plphone"  name="plphone" type="tel"  placeholder="landline"  class="form-control  "  >  
                        <span class="glyphicon  form-control-feedback  right--20" aria-hidden="true"></span> 
            <span class="and_user_msg sr-only"></span>  

                    </div>
                </div>




    <div class="form-group has-feedback">  
                    <label for="firstName" class="col-sm-4 control-label">sex</label>
                    <div class="col-sm-8">
                         <select class="form-control new_height" id="psex" name="dsex">
                        <option value="M">MALE</option deleted>
                        <option value="F">FEMALE</option>
                      </select>
                        <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span> 
            <span class="and_user_msg sr-only"></span>  

                    </div>
                </div>




    <div class="form-group has-feedback">  
                    <label for="firstName" class="col-sm-4 control-label">date of birth</label>
                    <div class="col-sm-8">
   
                      <div class="input-group date" data-provide="datepicker" id="pdob" data-date-format="dd-mm-yyyy">
                        <input type="text" class="form-control  "  name="pdob"  placeholder="date of birth"  data-date-format="dd-mm-yyyy">
 
                        <div class="input-group-addon">
                          <i style="font-size: 16px; height: 18px; position: inherit;" class="fa fa-calendar" aria-hidden="true"></i>

                        </div>
                      </div>

                       <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span> 
            <span class="and_user_msg sr-only"></span>  


                    </div>
                </div>






          <div class="form-group">
          </div>





                <div class="form-group">
                    <label for="email" class="col-sm-4 control-label">address</label>
                    <div class="col-sm-8">
                        <textarea class="form-control"    name="paddress" rows="3" id="paddress" placeholder="address"></textarea>
                         <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--> <span class="and_user_msg sr-only"></span>  
                    </div>
                </div>
                 
      
          





    <div class="form-group has-feedback">  
                    <label for="firstName" class="col-sm-4 control-label">blood group</label>
                    <div class="col-sm-8">
                     

                          <select class="form-control js-example-basic-single js-example-tokenizer"  id="pblood_group" name="pblood_group"         >

                  <?php 
                         
                         $query = " SELECT * FROM `blood_group` ORDER BY `blood_group`.`group_name` ASC  ";
                         $result_view_class = $a->display($query);
                         
                               foreach($result_view_class as $value) {

                                echo  ' <option value="'.$value['id'].'">'.$value['group_name'].'</option>'     ;       
                             
                            }
                  
                  ?>

                          </select>

                        <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span> 
            <span class="and_user_msg sr-only"></span>  

                    </div>
                </div>


 


 

    <div class="form-group has-feedback"  id="pimage_base">  
                    <label for="firstName" class="col-sm-4 control-label">image</label>

                    <div class="col-sm-8">
               


                            <div class="fileinput fileinput-new" data-provides="fileinput" id="upadanimage" name="upadanimage">
                                <span class="btn btn-default btn-file"><span>Choose file</span><input type="file" class="hidden" /></span>
                                <span class="fileinput-filename"></span><span  path="NULL" class="fileinput-new">No file chosen</span>
                            </div>

                         <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span> 
            <span class="and_user_msg sr-only"></span>  

<div class="photome">                      
                                   <img src= "" id="display_my_image_in_prof"> <br>
                                </div>
                            </div>



                    </div>
                


 

          <div class="form-group">
                    <div class="col-sm-offset-9 col-sm-3" style="margin-top: 20px;">
                        <button type="submit" class="btn btn-default">   ADD   </button>
                    </div>
                </div>


        </div>

         </form> <!-- /form -->
      </div>





    </div>
   
</div><!-- /main -->











   
    <form name="photo" action="../upladimage.php" method="post" enctype="multipart/form-data" id="upladimageprof">
        <input type="file" name="image" size="30" class="hidden" id="upladimageprofselectf" accept="image/x-png, image/gif, image/jpeg" />
        <input type="submit" name="upload" value="Upload" class="hidden" id="upladimagepfinalsub" />

    </form>






<?php include_once('footer.php'); ?>

