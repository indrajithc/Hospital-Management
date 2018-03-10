
<?php include( 'header.php');  ?>


<?php //include_once('footer.php'); ?>

 
        <div class="content-wrapper" style="min-height: 300px;">
 
            <section class="content-header">
                <h1>
           Schedule 
            <small>schedule your available dates</small>
          </h1>
                <ol class="breadcrumb">
                    <li><a href="."><i class="fa fa-dashboard"></i> Schedule</a></li>
                    <li class="active">Add Schedule</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

            <div class="row pading_5">
                <div class="col-md-12  pading_5">

                    <div class="   pading_5">

                    <div class="col-md-3 pading_5 back_white margin_both " id="col_motn">
                        <div class="form_singe_head">
                            <h1>select available moths</h1>
                        </div>

                        <form class="form-horizontal" id="dmothz">


                          <div class="form-group">
                            <label class="control-label col-sm-2" >January</label>
                            <div class="col-sm-offset-2 col-sm-5">
                                <input type="checkbox" id="ja"  class="form-control"  data-group-cls="btn-group-sm">
                            </div>
                          </div>



                          <div class="form-group">
                            <label class="control-label col-sm-2" >February</label>
                            <div class="col-sm-offset-2 col-sm-5">
                                <input type="checkbox"  id="fe" class="form-control"  data-group-cls="btn-group-sm">
                            </div>
                          </div>



                          <div class="form-group">
                            <label class="control-label col-sm-2" >March</label>
                            <div class="col-sm-offset-2 col-sm-5">
                                <input type="checkbox" id="ma" class="form-control"  data-group-cls="btn-group-sm">
                            </div>
                          </div>



                          <div class="form-group">
                            <label class="control-label col-sm-2" >April</label>
                            <div class="col-sm-offset-2 col-sm-5">
                                <input type="checkbox" id="ap"  class="form-control"  data-group-cls="btn-group-sm">
                            </div>
                          </div>



                          <div class="form-group">
                            <label class="control-label col-sm-2" >May</label>
                            <div class="col-sm-offset-2 col-sm-5">
                                <input type="checkbox" id="my"  class="form-control"  data-group-cls="btn-group-sm">
                            </div>
                          </div>



                          <div class="form-group">
                            <label class="control-label col-sm-2" >June</label>
                            <div class="col-sm-offset-2 col-sm-5">
                                <input type="checkbox"  id="ju" class="form-control"  data-group-cls="btn-group-sm">
                            </div>
                          </div>



                          <div class="form-group">
                            <label class="control-label col-sm-2" >July</label>
                            <div class="col-sm-offset-2 col-sm-5">
                                <input type="checkbox" id="jl" class="form-control"  data-group-cls="btn-group-sm">
                            </div>
                          </div>



                          <div class="form-group">
                            <label class="control-label col-sm-2" >August</label>
                            <div class="col-sm-offset-2 col-sm-5">
                                <input type="checkbox" id="au" class="form-control"  data-group-cls="btn-group-sm">
                            </div>
                          </div>



                          <div class="form-group">
                            <label class="control-label col-sm-2" >September</label>
                            <div class="col-sm-offset-2 col-sm-5">
                                <input type="checkbox" id="se" class="form-control"  data-group-cls="btn-group-sm">
                            </div>
                          </div>



                          <div class="form-group">
                            <label class="control-label col-sm-2" >October</label>
                            <div class="col-sm-offset-2 col-sm-5">
                                <input type="checkbox" id="oc" class="form-control"  data-group-cls="btn-group-sm">
                            </div>
                          </div>



                          <div class="form-group">
                            <label class="control-label col-sm-2" >November</label>
                            <div class="col-sm-offset-2 col-sm-5">
                                <input type="checkbox" id="no" class="form-control"  data-group-cls="btn-group-sm">
                            </div>
                          </div>



                          <div class="form-group">
                            <label class="control-label col-sm-2" >December</label>
                            <div class="col-sm-offset-2 col-sm-5">
                                <input type="checkbox"  id="de" class="form-control"  data-group-cls="btn-group-sm">
                            </div>
                          </div>




                          </form>


                    </div>



      <div class="col-md-3 pading_5 back_white margin_both" id="col_dayzs">
                        <div class="form_singe_head">
                            <h1>select day of week</h1>
                        </div>

                        <form class="form-horizontal" style="display: block;" id="mdayz">


                          <div class="form-group">
                            <label class="control-label col-sm-2" >Monday</label>
                            <div class="col-sm-offset-2 col-sm-5">
                                <input type="checkbox" id="mo"  class="form-control"  data-group-cls="btn-group-sm">
                            </div>
                          </div>



                          <div class="form-group">
                            <label class="control-label col-sm-2" > Tuesday</label>
                            <div class="col-sm-offset-2 col-sm-5">
                                <input type="checkbox"  id="tu" class="form-control"  data-group-cls="btn-group-sm">
                            </div>
                          </div>



                          <div class="form-group">
                            <label class="control-label col-sm-2" >Wednesday</label>
                            <div class="col-sm-offset-2 col-sm-5">
                                <input type="checkbox" id="we" class="form-control"  data-group-cls="btn-group-sm">
                            </div>
                          </div>



                          <div class="form-group">
                            <label class="control-label col-sm-2" >Thursday </label>
                            <div class="col-sm-offset-2 col-sm-5">
                                <input type="checkbox" id="th"  class="form-control"  data-group-cls="btn-group-sm">
                            </div>
                          </div>



                          <div class="form-group">
                            <label class="control-label col-sm-2" >Friday</label>
                            <div class="col-sm-offset-2 col-sm-5">
                                <input type="checkbox" id="fr"  class="form-control"  data-group-cls="btn-group-sm">
                            </div>
                          </div>



                          <div class="form-group">
                            <label class="control-label col-sm-2" > Saturday </label>
                            <div class="col-sm-offset-2 col-sm-5">
                                <input type="checkbox"  id="sa" class="form-control"  data-group-cls="btn-group-sm">
                            </div>
                          </div>



                          <div class="form-group">
                            <label class="control-label col-sm-2" >Sunday</label>
                            <div class="col-sm-offset-2 col-sm-5">
                                <input type="checkbox" id="su" class="form-control"  data-group-cls="btn-group-sm">
                            </div>
                          </div>




                          </form>


                    </div>








      <div class="col-md-5  margin_both" style="margin-right: 0px !important; ">
                        <div class="pading_5 back_white pading_bott20px">
                            
                            <div class="form_singe_head">
                            <h1>schedule day time</h1>
                        </div>

                        <div class="form-horizontal" style="display: block;" id="mdayza">


                          <div class="form-group">
                            <label class="control-label col-sm-4" >Time From</label>
                            <div class="col-sm-offset-2 col-sm-5">
                                <input type="text" id="time_from_"  class="form-control time_pi"  data-group-cls="btn-group-sm">
                            </div>
                          </div>



                          <div class="form-group">
                            <label class="control-label col-sm-4" >Time To</label>
                            <div class="col-sm-offset-2 col-sm-5">
                                <input type="text" id="time_to_"  class="form-control time_pi"  data-group-cls="btn-group-sm">
                            </div>
                          </div>


 

                          <div class="form-group"> 
                            <div class="col-sm-offset-4 col-sm-5">
                                <button class="btn btn-default form-control" id="add_regu_date">  Add  </button>
                            </div>
                          </div>




                          </div>

                        </div>


                 <div class="pading_5 back_white pading_bott20px">
                            
                            <div class="form_singe_head ">
                            <h1>schedule specific time</h1>
                        </div>

                        <div class="form-horizontal" style="display: block;" id="mdayzb">


                          <div class="form-group">
                            <label class="control-label col-sm-4" >From</label>
                            <div class="col-sm-offset-1 col-sm-4">
                                <input type="text" id="date_from_"  class="form-control"  data-group-cls="btn-group-sm">
                            </div>
                            <div class="col-sm-offset-0 col-sm-3">
                                <input type="text" id="date_time_from_"  class="form-control time_pi"  data-group-cls="btn-group-sm">
                            </div>
                          </div>



                          <div class="form-group">
                             <label class="control-label col-sm-4" > To</label>
                            <div class="col-sm-offset-1 col-sm-4">
                                <input type="text" id="date_to_"  class="form-control"  data-group-cls="btn-group-sm">
                            </div>
                            <div class="col-sm-offset-0 col-sm-3">
                                <input type="text" id="date_to_from_"  class="form-control time_pi"  data-group-cls="btn-group-sm">
                            </div>
                          </div>


 

                          <div class="form-group"> 
                            <div class="col-sm-offset-4 col-sm-5">
                                <button class="btn btn-default form-control" id="add_indu_dio">  Add  </button>
                            </div>
                          </div>




                          </div>

                        </div>




                    </div>







                    </div>
                </div>

            </div>

            </section>
            <!-- /.content -->


            <section class="content">

            <div class="row pading_5">
                <div class="col-md-12  pading_5">

<div>

<div class="col-md-3">
        


    <div class="form_singe_head ">
    <h1>month schedule</h1>
</div>

 <table class="table table-bordered table-striped sortable miyazaki my_table_x4 fo_nt back_white" id="the_display_table_7">
                        <thead>
                            <tr>

                                <th data-defaultsign="AZ">month</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php  
try {
  $query = "SELECT * FROM `month` WHERE delete_status =0 AND doctor_id=".$idxd."  ORDER BY `month`.`date` DESC ";
                 if( $result = $a->display($query)) {

                    $sno =1 ;
                     foreach ( $result as $value) {
                      $delete_status = " green";
                      if($value['delete_status'] == 0)
                        $delete_status = "red";

                      echo ' <tr> 
                            <td><p class="">'.return_name_number($value['month'], 0).'</p></td>
                            <td ><button type="button" id="'.$value['id'].'" class="btn btn-default btn-sm action_button_schedule_delet1">Delete<i class="fa fa-trash" aria-hidden="true" style="position: inherit;display: inline-block;font-size: 20px; color: '.$delete_status.';"></i>
</button> </td>
                          </tr>';

                     }

                  }

} catch (Exception $e) {

}

     ?>

                        </tbody>
                    </table>





    </div>
    <div class="col-md-4">
        
    <div class="form_singe_head ">
    <h1>Week schedule</h1>
</div>



 <table class="table table-bordered table-striped sortable miyazaki my_table_x4 fo_nt back_white" id="the_display_table_8">
                        <thead>
                            <tr>

                                <th data-defaultsign="_19">Days</th>
                                <th data-dateformat="HH-MM-SS">Time From</th>
                                <th data-defaultsign="HH-MM-SS">Time To</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php  
try {
  $query = "SELECT * FROM `week` WHERE delete_status =0 AND day !=0 AND doctor_id=".$idxd."  ORDER BY `week`.`date` DESC ";
                 if( $result = $a->display($query)) {

                    $sno =1 ;
                     foreach ( $result as $value) {
                      $delete_status = " green";
                      if($value['delete_status'] == 0)
                        $delete_status = "red";

                      echo ' <tr> 
                            <td data-value="'.$value['day'].'" ><p  >'.return_name_number($value['day'], 1).'</p></td>
                            <td data-value="'.$value['time_from'].'" ><p>'.date('h:i a', strtotime($value['time_from'])).'</p></td>
                             <td data-value="'.$value['time_to'].'" ><p>'.date('h:i a', strtotime($value['time_to'])).'</p></td>
                            <td ><button type="button" id="'.$value['id'].'" class="btn btn-default btn-sm action_button_schedule_delet2">Remove<i class="fa fa-trash" aria-hidden="true" style="position: inherit;display: inline-block;font-size: 20px; color: '.$delete_status.';"></i>
</button> </td>
                          </tr>';

                     }

                  }

} catch (Exception $e) {

}

     ?>

                        </tbody>
                    </table>





    </div>
    <div class="col-md-5">
        

    <div class="form_singe_head ">
    <h1>special schedule</h1>
</div>


 <table class="table table-bordered table-striped sortable miyazaki my_table_x4 fo_nt back_white" id="the_display_table_9">
                        <thead>
                            <tr>
 
                                <th data-defaultsign="DD-MM-YYYY">Date From</th>
                                <th data-defaultsign="DD-MM-YYYY">Date To</th>
                                <th data-dateformat="HH-MM-SS">Time From</th>
                                <th data-defaultsign="HH-MM-SS">Time To</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php  
try {
 $query = "SELECT * FROM `week` WHERE delete_status =0 AND day =0 AND doctor_id=".$idxd."  ORDER BY `week`.`date` DESC ";
                 if( $result = $a->display($query)) {

                    $sno =1 ;
                     foreach ( $result as $value) {
                      $delete_status = " green";
                      if($value['delete_status'] ==0)
                        $delete_status = "red";

              echo ' <tr>  
                            <td><p>'.date("d-m-Y", strtotime($value['date_from'])).'</p></td>
                            <td><p>'.date("d-m-Y", strtotime($value['date_to'])).'</p></td>
                            <td data-value="'.$value['time_from'].'" ><p>'.date('h:i a', strtotime($value['time_from'])).'</p></td>
                             <td data-value="'.$value['time_to'].'" ><p>'.date('h:i a', strtotime($value['time_to'])).'</p></td>
                            <td ><button type="button" id="'.$value['id'].'" class="btn btn-default btn-sm action_button_schedule_delet3">Remove<i class="fa fa-trash" aria-hidden="true" style="position: inherit;display: inline-block;font-size: 20px; color: '.$delete_status.';"></i>
</button> </td>
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

            </section>
 </div>









   <button type="button" id="show_the-popupzP_19" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong_16" style="display: none;"></button>

    <div class="modal fade" id="exampleModalLong_16" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="overflow: auto;">
        <div class="modal-dialog" role="document" style="">
            <div class="modal-content " style="border-top: 6px solid #F00; border-radius: 1px !important;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Confirm Schedule</h5>
                    <button type="button" id="ndizmiz_tizzzx" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div role="form" id="confirmsdchedule" style="padding: 0px 25px 0px 25px;">
                    <div class="modal-body">

                        <div class="row">
                        <!--==================================================================================================- -->

                        <div class="form-horizontal" style="display: block;" id="mdayzb">






                          <div class="form-group">
                             <label id="confirm_this_ac" class="control-label col-sm-12" month="" day="" time_from="" time_to="" day_from="" day_to=""> To</label>
                             
                          </div>


 





                          </div>
                           
                            <!--====================================================================================================================-->
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="action_ac_t" class="col-sm-offset-2 col-sm-3 btn btn-default " style="width: 24%;">NO</button>
                         <button id="actionj_perffvt" type="button" class="col-sm-offset-2 col-sm-3 btn btn-default btn-block" style="width: 24%;">YES</button>

                        </div>
                </div>
                <!-- /form -->

            </div>
        </div>
    </div>




<?php

function return_name_number( $ch, $dy) {
    if($dy == 1)
        switch ($ch) {
            case 1: return "Monday"; break; 
            case 2: return "Tuesday"; break;    
            case 3: return "Wednesday"; break;   
            case 4: return "Thursday "; break;   
            case 5: return "Friday"; break;  
            case 6: return "Saturday "; break;   
            case 7: return "Sunday"; break;  
        }
    if($dy == 0)
        switch ($ch) {
            case 1: return "January"; break;     
            case 2: return "February"; break;    
            case 3: return "March"; break;   
            case 4: return "April"; break;   
            case 5: return "May"; break;     
            case 6: return "June"; break;    
            case 7: return "July"; break;    
            case 8: return "August"; break;  
            case 9: return "September"; break;   
            case 10: return "October"; break;    
            case 11: return "November"; break;   
            case 12: return "December"; break;  
            default: return 0; break;
        }
}

?>

<?php include_once('footer.php'); ?>

