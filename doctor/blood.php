
<?php include( 'header.php');  ?>


<?php //include_once('footer.php'); ?>








        <div class="content-wrapper" style="min-height: 300px;">

            <section class="content-header">
                <h1>
            Blood
            <small>manage blood bank</small>
          </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Blood</a></li>
                    <li class="active">Add</li>
                </ol>
            </section>

            <section class="content">




                <div class="row"  id="added_grpz">
                




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




            </section>
        </div>







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
                    <label for="firstName" class="col-sm-5 control-label"><strong>+</strong> quantity</label>
                                    <div class="col-sm-7 for_span_wdth">
                          <input type="text" id="quantity"  name="quantity" old=""  placeholder="quantity" class="form-control"    aria-describedby="inputSuccess5Status">
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










<?php include_once('footer.php'); ?>

