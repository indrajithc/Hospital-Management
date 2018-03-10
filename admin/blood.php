
<?php include( 'header.php');  ?>


<?php //include_once('footer.php');

              

 ?>


  <div class="container parent_cont" id="add_nurse_here_thiz_5">

	<div class="row ">

    
	      <div class="col-md-12 bg_color_green">
	      	<div class="col-md-6">
              <h1 class="to_uppercase">
              blood 
              </h1>
              <p class="to_details_p">
                 blood details
              </p>

          </div> 
	      	
                <div class="col-md-offset-3 col-md-3 add_back_button" ">
             <button class="btn  btn-default "  doc_id=""  id="nedit_blood_from_top"><i class="fa fa-plus-circle add_back_button_a" aria-hidden="true" style="color: red;" ></i> new blood groups  </button>
           </div>
	      	 
	      </div>
	</div>

    <div class="row">
    
<!-- ==========================================================================================================-->
      <div class="col-md-12" id="added_grpz">
        


              <?php 
                         
                         $query = " SELECT * FROM blood_group ORDER BY `blood_group`.`date` DESC  ";
                         $result_view_class = $a->display($query);
                         
                              
                               foreach($result_view_class as $value) {
                                $otd = "";
                                if(!is_null($value['last_out']))
                                  $otd = date("d-m-Y h:m:s", strtotime($value['last_out']));
                                echo  '
       <div class="col-md-3 main_blood_grpz" id="'.$value['id'].'">
        <i class="fa fa-pencil-square edit_div" aria-hidden="true"></i> 
          <div class="">
         
            <div class="col-md-5">
              <i class="fa fa-tint blood_dro" aria-hidden="true"></i>
            </div>
            <div class="col-md-7 main_blood_det"> 
                    <h1  data-toggle="tooltip" data-placement="top" title="'.$value['description'].'" >'.$value['group_name'].'</h1>
                    <label for="firstName" class="col-sm-12 control-label quantitysz">'.$value['quantity'].' ml</label>
                    <label for="firstName" class="col-sm-12 control-label thiz">in-'.date("d-m-Y h:m:s", strtotime($value['last_in'])).'</label>
                    <label for="firstName" class="col-sm-12 control-label thiz">out-'.$otd.'</label> 
            </div>
          </div>
      </div>
        '     ;       
                             
 

                                  
                            }
                  
                  
                  ?>














 



      </div>


<!-- ==========================================================================================================-->
  </div>

<div class="row">

  <div class="col-md-12">
   
                <div class="  head_notif2">
                         
  <table class="table table-bordered table-striped sortable miyazaki my_table_x4 my_table_x46"> 
    <thead>
      <tr>
        <th data-defaultsign="AZ">Group</th>
        <th data-defaultsign="_19">amount</th>
        <th data-defaultsign="AZ">Group</th>
        <th data-defaultsign="AZ">Email</th>
        <th data-defaultsign="DD-MM-YYYY">Date</th>
      </tr>
    </thead>
    <tbody>


    <?php  
try {
  $query = "SELECT bg.group_name, ppp.email, bm.amount, CONCAT(ppp.fname,' ',ppp.lname) AS name, DATE_FORMAT( bm.date,'%d-%m-%Y %r') AS date FROM `blood_manage` bm LEFT JOIN blood_group bg ON bm.blood_group_id = bg.id LEFT JOIN prescription p ON bm.prescription_id = p.id LEFT JOIN patient pp ON p.patient_id = pp.id LEFT JOIN patient_details ppp ON pp.patient_details_id = ppp.id ORDER BY bm.date DESC ";
                 if( $result = $a->display($query)) {
                  
                  
                    $sno =1 ;
                     foreach ( $result as $value) {
               


                      echo ' <tr>
                            <td>'.$value['group_name']. '</td>
                            <td data-value="'.$value['amount'].'">'.$value['amount'].'</td>
                            <td><p>'.$value['name'].'</p></td>
                            <td><p>'.$value['email'].'</p></td>
                            <td><p>'.$value['date'].'</p></td>

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
  


</div>




<!---===========================================================================================================-->






    </div>

  </div>




<!--

<select class="js-example-basic-single">
  <option value="AL">Alabama</option>
    ...
  <option value="WY">Wyoming</option>
</select>
-->






<!-- Button trigger modal -->
    <button type="button" id="setbg" class="btn btn-primary hidden" data-target="#bmodal" data-toggle="modal">
      Launch the demo
    </button>

    <!-- Modal -->
    <div class="modal fade dmodel" id="bmodal" role="dialog" aria-labelledby="modalLabel" tabindex="-1" to_this="" style="z-index: 1055;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Edit blood group</h5>
            <button type="button" class="close" id="close_meee" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body"> 


<form role="form"  id="update_blood"> 
    <div class="row">

      <div class="col-md-12 jzt_margin_bott" style="margin-bottom: 20px;">

      <div class="form-horizontal new_edited_t" >  
 
<!--------------------------  ---------------------------- -->
    <div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
                    <label for="firstName" class="col-sm-5 control-label">group</label>
                                    <div class="col-sm-7 for_span_wdth">
                        <h2 style="margin-top: 0px;padding-left: 20px;" class="" id="group_name_x"> A+ </h2>

                    </div>

                </div>
 

    <div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
                    <label for="firstName" class="col-sm-5 control-label">quantity</label>
                                    <div class="col-sm-7 for_span_wdth">
                          <input type="text" id="quantity"  name="quantity"   placeholder="quantity" class="form-control"    aria-describedby="inputSuccess5Status">
                        <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
            <span class="and_user_msg sr-only"></span> <!--help-inline -->


                </div></div>
 


                <div class="form-group">
                    <label for="email" class="col-sm-5 control-label">description</label>
                    <div class="col-sm-7 ">
                        <textarea class="form-control" id="ebdescription"  name="ebdescription" rows="3" placeholder="description"></textarea>
                         <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--> <span class="and_user_msg sr-only"></span> <!--help-inline -->
                    </div>
                </div>
                 
      
    


        </div>
      </div>

 
 


          </div>
          <div class="modal-footer"> 
 
            <button type="submit" id="crop_btn" class="btn btn-default"  >save</button>
              
          </div>

 </form>
        </div>
      </div>
    </div>
  

</div>



















<button type="button" id="show_the-popupzP_9" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong_6" style="display: none;"></button>



<div class="modal fade" id="exampleModalLong_6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"  style="overflow: auto;">
  <div class="modal-dialog" role="document" style="">
    <div class="modal-content " style="border-top: 6px solid #F00; border-radius: 1px !important;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit group</h5>
        <button type="button" id="ndizmiz_tizzzx" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form role="form" id="add_aBlood" style="padding: 0px 25px 0px 25px;">
      <div class="modal-body">
<!--==================================================================================================- -->


    <div class="row">

      <div class="col-md-12 jzt_margin_bott" style="margin-bottom: 20px;">

      <div class="form-horizontal new_edited_t" >  
 
<!--------------------------  ---------------------------- -->
    <div class="form-group has-feedback"> <!-- has-success ,has-warning, has-error -->
                    <label for="firstName" class="col-sm-5 control-label">group</label>
                                    <div class="col-sm-7 for_span_wdth">
                          <select class="form-control js-example-basic-single js-example-tokenizer"  id="select_blood" name="select_blood"  >
                          </select>

                        <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--><!--glyphicon-warning-sign --><!--glyphicon-remove -->
            <span class="and_user_msg sr-only"></span> <!--help-inline -->

                    </div>

                </div>
 

                <div class="form-group">
                    <label for="email" class="col-sm-5 control-label">description</label>
                    <div class="col-sm-7 ">
                        <textarea class="form-control" id="bdescription"  name="bdescription" rows="3" placeholder="description"></textarea>
                         <span class="glyphicon  form-control-feedback right--20" aria-hidden="true"></span><!--glyphicon-ok--> <span class="and_user_msg sr-only"></span> <!--help-inline -->
                    </div>
                </div>
                 
      
    


        </div>
      </div>


 

<!--====================================================================================================================-->
      </div>
      <div class="modal-footer">
         <button type="submit" class="col-sm-offset-3 col-sm-3 btn btn-default btn-block" style="width: 24%;" >ADD</button>
         <button type="button" class="col-md-3 btn btn-danger" status="" data-dismiss="modal" id="nedelete_this_item_here">delete</button>
      </div>
    </form> <!-- /form -->

      

    </div>
  </div>
</div>

















 





 

<?php include_once('footer.php'); ?>

