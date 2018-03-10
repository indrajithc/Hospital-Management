
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

      //echo '<span id="main_my_zxid" class="hidden" did="'.$org_id_pa.'" style="display: none ;"></span>';

      if(  $sz_st09 == 0 ) {

        
  echo '<script type="text/javascript">location.href = "first.php";</script>';
  
}



?>



<?php



 $query = "SELECT g.name AS gname, g.name AS gname, g.mphone AS gmphone, g.lphone AS glphone, g.relation ,g.address AS gaddress  , p.*, pd.*, d.department_id FROM `patient` p LEFT JOIN patient_details pd ON p.patient_details_id = pd.id LEFT JOIN doctor d ON p.doctor_id = d.id LEFT JOIN guardian g ON g.patient_id = p.id WHERE p.id = ".$idd ;
 $result_view_class = $a->display($query);
 $sz_st09 = 0;
      
   foreach($result_view_class as $value) {
   



  ?>







<div class="">
    <div class="row">
        
        <div class="col-md-12 headeerd" >
            <h1>
                 your profile.
            </h1>
            <p>
               
            </p>

        </div>

    </div>
 <div class="row element_for_rewo">
    <form role="form" id="pat_update_profile">

     <div class="col-md-4 jzt_margin_bott">
            <div class=" ">
                 <div class="form-horizontal new_edited_t" >  
         <div class="form-group has-feedback">  
                    <label for="firstName" class=" col-sm-12 control-label form-head">SELECT a Doctor</label>
                </div>



 
                <div class="form-group has-feedback"> 
                    <label for="firstName" class="col-sm-4 control-label">department</label>
                    <div class="col-sm-8">


                    <select class="form-control js-example-basic-single"  id="department_namea"  name="department_namea"    placeholder="department name"    >
                      <?php 
                         
                         $query = " SELECT * FROM department   WHERE delete_status=0   ORDER BY `department`.`date` DESC  ";
                         $result_view_class1 = $a->display($query);
                         
                               foreach($result_view_class1 as $value1) {
                                if($value['department_id'] == $value1['id'] )
                                    echo  ' <option value="'.$value1['id'].'" selected="selected">'.$value1['name'].'</option>'     ;   
                                else 
                                    echo  ' <option value="'.$value1['id'].'">'.$value1['name'].'</option>'     ;   

                             
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


                    <select doc_id="<?php echo $value['doctor_id']; ?>" class="form-control js-example-basic-single"  
                    id="doctor_namea"  name="doctor_namea"        >

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






                 </div>
            </div>

     </div>


     <div class="col-md-4 jzt_margin_bott">
            <div class=" ">
                 <div class="form-horizontal new_edited_t" >  



        <div class="form-group has-feedback">  
                    <label for="firstName" class=" col-sm-12 control-label form-head">insert basic details</label>
                </div>





    <div class="form-group has-feedback">  
                    <label for="firstName" class="col-sm-4 control-label">first name</label>
                    <div class="col-sm-8">
                   
                          <input id="pfname"  name="pfname" type="text" value="<?php echo $value['fname']; ?>" placeholder="first name"  class="form-control  "  >  
                        <span class="glyphicon   right--20" aria-hidden="true"></span> 
            <span class="and_user_msg sr-only"></span>  

                    </div>
                </div>




    <div class="form-group has-feedback">  
                    <label for="firstName" class="col-sm-4 control-label">last name</label>
                    <div class="col-sm-8">
                   
                          <input id="plname"  name="plname" type="text" value="<?php echo $value['lname']; ?>" placeholder="last name"  class="form-control  "  >  
                        <span class="glyphicon   right--20" aria-hidden="true"></span> 
            <span class="and_user_msg sr-only"></span>  

                    </div>
                </div>




    <div class="form-group has-feedback">  
                    <label for="firstName" class="col-sm-4 control-label">email</label>
                    <div class="col-sm-8">
                   
                          <input id="pemail" value="<?php echo $value['email']; ?>"  name="pemail" type="text"  placeholder="email id"  class="form-control  "  >  
                        <span class="glyphicon   right--20" aria-hidden="true"></span> 
            <span class="and_user_msg sr-only"></span>  

                    </div>
                </div>





    <div class="form-group has-feedback">  
                    <label for="firstName" class="col-sm-4 control-label">mobile phone</label>
                    <div class="col-sm-8">
                   
                          <input id="pmphone"  name="pmphone" type="tel" value="<?php echo $value['mphone']; ?>"  placeholder="mobile phone"  class="form-control  "  >  
                        <span class="glyphicon   right--20" aria-hidden="true"></span> 
            <span class="and_user_msg sr-only"></span>  

                    </div>
                </div>




    <div class="form-group has-feedback" >  
                    <label for="firstName" class="col-sm-4 control-label">landline</label>
                    <div class="col-sm-8">
                         <input id="plphone"  name="plphone" type="tel" value="<?php echo $value['lphone']; ?>" placeholder="landline"  class="form-control  "  >  
                        <span class="glyphicon  form-control-feedback  right--20" aria-hidden="true"></span> 
            <span class="and_user_msg sr-only"></span>  

                    </div>
                </div>




    <div class="form-group has-feedback">  
                    <label for="firstName" class="col-sm-4 control-label">sex</label>
                    <div class="col-sm-8">
                         <select class="form-control new_height" id="psex" name="dsex">

                        <option value="M" <?php if(strtoupper($value['sex'])=="M") echo'selected="selected"' ; ?> >MALE</option>
                        <option value="F"  <?php if(strtoupper($value['sex'])=="F") echo'selected="selected"' ; ?>>FEMALE</option>
                      </select>
                        <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span> 
            <span class="and_user_msg sr-only"></span>  

                    </div>
                </div>




    <div class="form-group has-feedback">  
                    <label for="firstName" class="col-sm-4 control-label">date of birth</label>
                    <div class="col-sm-8">
   
                      <div class="input-group date" dob="<?php 
                            echo date('d-m-Y', strtotime($value['dob']));
                        ?>" data-provide="datepicker" id="pdob" data-date-format="dd-mm-yyyy">
                        <input type="text" class="form-control  " value="<?php 
                            echo date('d-m-Y', strtotime($value['dob']));
                        ?>"  name="pdob"  placeholder="date of birth"  data-date-format="dd-mm-yyyy">
  
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
                        <textarea class="form-control"    name="paddress" rows="3" id="paddress" placeholder="address"><?php 
                        echo $value['address'];
                        ?></textarea>
                         <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--> <span class="and_user_msg sr-only"></span>  
                    </div>
                </div>
                 
      
          





    <div class="form-group has-feedback">  
                    <label for="firstName" class="col-sm-4 control-label">blood group</label>
                    <div class="col-sm-8">
                     

                          <select class="form-control js-example-basic-single js-example-tokenizer"  id="pblood_group" name="pblood_group"         >

                  <?php 
                         
                         $query = " SELECT * FROM `blood_group` ORDER BY `blood_group`.`group_name` ASC  ";
                         $result_view_class2 = $a->display($query);
                            
                               foreach($result_view_class2 as $value2) {
                                $selecte = "";
                                if($value['blood_group_id'] == $value2['id'])
                                  $selecte = ' selected = "selected" ';
                                echo  ' <option value="'.$value2['id'].'" '.$selecte.'>'.$value2['group_name'].'</option>'     ;       
                             
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
                                <span class="fileinput-filename"></span><span  path="NULL" class="fileinput-new"><?php echo $value['image']; ?></span>
                            </div>

                         <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span> 
            <span class="and_user_msg sr-only"></span>  

<div class="photome">                      
                                   <img src= "<?php  echo $image; ?>" id="display_my_image_in_prof"> <br>
                                </div>
                            </div>



                    </div>
                



                 </div>
            </div>

     </div>

      <div class="col-md-4 jzt_margin_bott">

      <div class="form-horizontal new_edited_t" >  


 

        <div class="form-group has-feedback">  
                    <label for="firstName" class=" col-sm-12 control-label form-head">insert guardian details</label>
                </div>





    <div class="form-group has-feedback">  
                    <label for="firstName" class="col-sm-4 control-label">guardian name</label>
                    <div class="col-sm-8">
                   
                          <input id="pgname" value="<?php echo $value['gname']; ?>" name="pgname" type="text"  placeholder="guardian name"  class="form-control  "  >  
                        <span class="glyphicon   right--20" aria-hidden="true"></span> 
            <span class="and_user_msg sr-only"></span>  

                    </div>
                </div>




    <div class="form-group has-feedback">  
                    <label for="firstName" class="col-sm-4 control-label">relation</label>
                    <div class="col-sm-8">
          
          <select class="form-control js-example-basic-single js-example-tokenizer"  id="pgrelation" name="pgrelation"         >
<option selected="selected" ="" ></option>


<option  <?php if($value['relation'] == "father"){ echo " selected = 'selected' ";} ?>  value="father">father</option>
<option  <?php if($value['relation'] == "mother"){ echo " selected = 'selected' ";} ?>  value="mother">mother</option>
<option  <?php if($value['relation'] == "son"){ echo " selected = 'selected' ";} ?>  value="son">son</option>
<option  <?php if($value['relation'] == "daughter"){ echo " selected = 'selected' ";} ?>  value="daughter">daughter</option>
<option  <?php if($value['relation'] == "husband"){ echo " selected = 'selected' ";} ?>  value="husband">husband</option>
<option  <?php if($value['relation'] == "wife"){ echo " selected = 'selected' ";} ?>  value="wife">wife</option>
<option  <?php if($value['relation'] == "brother"){ echo " selected = 'selected' ";} ?>  value="brother">brother</option>
<option  <?php if($value['relation'] == "grandfather"){ echo " selected = 'selected' ";} ?>  value="grandfather">grandfather</option>
<option  <?php if($value['relation'] == "grandmother"){ echo " selected = 'selected' ";} ?>  value="grandmother">grandmother</option>
<option  <?php if($value['relation'] == "grandson"){ echo " selected = 'selected' ";} ?>  value="grandson">grandson</option>
<option  <?php if($value['relation'] == "granddaughter"){ echo " selected = 'selected' ";} ?>  value="granddaughter">granddaughter</option>
<option  <?php if($value['relation'] == "uncle"){ echo " selected = 'selected' ";} ?>  value="uncle">uncle</option>
<option  <?php if($value['relation'] == "aunt"){ echo " selected = 'selected' ";} ?>  value="aunt">aunt</option>
<option  <?php if($value['relation'] == "nephew"){ echo " selected = 'selected' ";} ?>  value="nephew">nephew</option>
<option  <?php if($value['relation'] == "niece"){ echo " selected = 'selected' ";} ?>  value="niece">niece</option>
<option  <?php if($value['relation'] == "cousin"){ echo " selected = 'selected' ";} ?>  value="father">father</option> 



                          </select>


                        <span class="glyphicon   right--20" aria-hidden="true"></span> 
            <span class="and_user_msg sr-only"></span>  

                    </div>
                </div>


 




    <div class="form-group has-feedback">  
                    <label for="firstName" class="col-sm-4 control-label">mobile phone</label>
                    <div class="col-sm-8">
                   
                          <input id="pgmphone"  value="<?php echo $value['gmphone']; ?>"   name="pgmphone" type="tel"  placeholder="mobile phone"  class="form-control  "  >  
                        <span class="glyphicon   right--20" aria-hidden="true"></span> 
            <span class="and_user_msg sr-only"></span>  

                    </div>
                </div>




    <div class="form-group has-feedback" >  
                    <label for="firstName" class="col-sm-4 control-label">landline</label>
                    <div class="col-sm-8">
                         <input id="pglphone"  value="<?php echo $value['glphone']; ?>"   name="pglphone" type="tel"  placeholder="landline"  class="form-control  "  >  
                        <span class="glyphicon  form-control-feedback  right--20" aria-hidden="true"></span> 
            <span class="and_user_msg sr-only"></span>  

                    </div>
                </div>



 
 

          <div class="form-group">
          </div>





                <div class="form-group">
                    <label for="email" class="col-sm-4 control-label">address</label>
                    <div class="col-sm-8">
                        <textarea class="form-control"      name="pgaddress" rows="3" id="pgaddress" placeholder="address"><?php echo $value['gaddress']; ?></textarea>
                         <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--> <span class="and_user_msg sr-only"></span>  
                    </div>
                </div>
                 



          <div class="form-group">
          </div>

          <div class="form-group">
          </div>

          <div class="form-group">
          </div>


    <div class="form-group has-feedback" >  
                    <label for="firstName" class="col-sm-4 control-label">confirm password</label>
                    <div class="col-sm-8">
                         <input id="ppassword"    name="ppassword" type="password"  placeholder="password"  class="form-control  "  >  
                        <span class="glyphicon  form-control-feedback  right--20" aria-hidden="true"></span> 
            <span class="and_user_msg sr-only"></span>  

                    </div>
                </div>


      
          


          <div class="form-group">
                    <div class="col-sm-offset-9 col-sm-3" style="margin-top: 20px;">
                        <button type="submit" class="btn btn-default">   UPDATE   </button>
                    </div>
                </div>

          <div class="form-group">
          </div>

          <div class="form-group">
          </div>


          <div class="form-group">
                    <div class="col-sm-offset-7 col-sm-5" style="margin-top: 20px;">
                        <a href="password.php" class="btn btn-default"> update password</a>
                    </div>
                </div>


        </div>

      </div>


         </form> <!-- /form -->

         




    </div>
   
</div><!-- /main -->




<?php

  }

?>







   
    <form name="photo" action="../upladimage.php" method="post" enctype="multipart/form-data" id="upladimageprof">
        <input type="file" name="image" size="30" class="hidden" id="upladimageprofselectf" accept="image/x-png, image/gif, image/jpeg" />
        <input type="submit" name="upload" value="Upload" class="hidden" id="upladimagepfinalsub" />

    </form>






<?php include_once('footer.php'); ?>

