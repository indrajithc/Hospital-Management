
<?php include( 'header.php');  ?>


<?php //include_once('footer.php'); ?>






 
        <div class="content-wrapper" style="min-height: 390px;overflow: auto;">

            <!-- Content Header (Page header) -->





  <div class="  parent_cont" id="add_nurse_here_thiz_5" style="display:   ;">

            <section class="content-header">
                <h1>
            View Nurse
            <small>View Nurse </small>
          </h1>
                <ol class="breadcrumb">
                    <li><a href="#"   ><i class="fa fa-dashboard"></i> Nurse</a></li>
                    <li class="active">All</li>
                </ol>



  </section>


    <section class="content">
 


<div class="row">

  <div class="col-md-12">
   
                <div class="  head_notif2">
                         
  <table class="table table-bordered table-striped sortable miyazaki my_table_x4 my_table_x46"> 
    <thead>
      <tr>
        <th data-defaultsign="AZ">Name</th>
        <th data-defaultsign="AZ">Department</th>
        <th data-defaultsign="AZ">Email</th>
        <th data-defaultsign="_19">phone</th>
        <th data-defaultsign="_19">Age</th>
        <th  >Action</th>
      </tr>
    </thead>
    <tbody>


    <?php  
try {
  $query = "SELECT d.id AS id, CONCAT(d.fname,' ',d.lname) AS name, dp.name AS department, d.email AS email, d.mphone AS phone, YEAR(CURRENT_TIMESTAMP) - YEAR(dob) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(dob, 5)) AS age , d.delete_status FROM `nurse` d LEFT JOIN department dp ON d.department_id = dp.id WHERE dp.id = ".$dpid." ORDER BY d.date DESC";
                 if( $result = $a->display($query)) {
                  
                  
                    $sno =1 ;
                     foreach ( $result as $value) {
                      $delete_status = " green";
                      if($value['delete_status'] == 1)
                        $delete_status = "red";


                      echo ' <tr>
                            <td>'.$value['name'].'</td>
                            <td><p>'.$value['department'].'</p></td>
                            <td><p>'.$value['email'].'</p></td>
                            <td data-value="'.$value['phone'].'">'.$value['phone'].'</td>
                            <td data-value="'.$value['age'].'">'.$value['age'].'</td>
                            <td ><button type="button" id="'.$value['id'].'" class="btn btn-default btn-sm action_button_46">view<i class="fa fa-eye" aria-hidden="true" style="position: inherit;display: inline-block;font-size: 20px;color: '.$delete_status.';"></i>
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
 


            </section>


    </div>




  <div class="  parent_cont" id="dispaly_a_nurse_5" style="display:none  ;">

            <section class="content-header">
                <h1>
            View Nurse
            <small>View a Nurse details</small>
          </h1>
                <ol class="breadcrumb">
                    <li><a href="#"  id="nback_me_from_top"><i class="fa fa-dashboard"></i> Nurse</a></li>
                    <li class="active">One</li>
                </ol>



  </section>


                      <section class="content">
 

  

    <div class=" "> 
      <div class="col-md-4">

        <div class=" ">
           <div class="col-md-12 col-md-sub_my_4 back_white">

        <div class=" mu_row_status_samll_5">
          <h2> personal information</h2>
        </div>
             <div class="form-horizontal"> 
                <div class="form-group  image_form"> 
                  <img src= "" id="nshow_image_5" style="width: 200px !important;height: 200px !important;"> 
                </div> 

                <div class="form-group  ">  
                  <label  class="col-sm-5 control-label label_me_5">First Name</label>
                  <span  id="nvdfname" class="col-sm-7 ">name</span>
                </div> 
           
                <div class="form-group  ">  
                  <label  class="col-sm-5 control-label label_me_5">Last Name</label>
                  <span  id="nvdlname" class="col-sm-7 ">name</span>
                </div> 


                <div class="form-group  ">  
                  <label  class="col-sm-5 control-label label_me_5">Date of Birth</label>
                  <span  id="nvddob" class="col-sm-7 ">date of birth</span>
                </div> 



                <div class="form-group  ">  
                  <label  class="col-sm-5 control-label label_me_5">Sex</label>
                  <span  id="nvdsex" class="col-sm-7 " valz="">sex</span>
                </div> 



                




        </div>
     
        </div>

          

        </div>



      </div>
        

<div class="col-md-4">

        <div class=" ">
           <div class="col-md-12 col-md-sub_my_4 back_white">

        <div class=" mu_row_status_samll_5">
          <h2> contact information</h2>
        </div>
  <div class="form-horizontal"> 

                <div class="form-group  ">  
                  <label  class="col-sm-5 control-label label_me_5">Email</label>
                  <span  id="nvdemail" class="col-sm-7 ">email</span>
                </div> 
           
                <div class="form-group  ">  
                  <label  class="col-sm-5 control-label label_me_5">Mobile Phone</label>
                  <span  id="nvdmphone" class="col-sm-7 ">mobile phone</span>
                </div> 
 


                <div class="form-group  ">  
                  <label  class="col-sm-5 control-label label_me_5">Address</label>
                  <p  id="nvdaddress" class="col-sm-7 ">address</p>
                </div> 





        </div>
     
        </div>

          

        </div>



      </div>


<div class="col-md-4">

        <div class=" ">
           <div class="col-md-12 col-md-sub_my_4 back_white">

        <div class=" mu_row_status_samll_5">
          <h2> general information</h2>
        </div>
                        <div class="form-horizontal"> 

                <div class="form-group  ">  
                  <label  class="col-sm-5 control-label label_me_5">department</label>
                  <span  id="nvddepartment" class="col-sm-7 ">department</span>
                </div> 
           
                

                <div class="form-group  ">  
                  <label  class="col-sm-5 control-label label_me_5">join date</label>
                  <span  id="nvdljoindate" class="col-sm-7 ">join date</span>
                </div> 
 




        </div>
     
        </div>

          

        </div>


        <div class=" ">
           <div class="col-md-12 col-md-sub_my_4 back_white">

        <div class=" mu_row_status_samll_5">
          <h2> status information</h2>
        </div>
                        <div class="form-horizontal"> 

                <div class="form-group  ">  
                  <label  class="col-sm-5 control-label label_me_5">status</label>
                  <span  id="nvdstatus" class="col-sm-7 " status="">Active</span>
                </div> 
           
               





        </div>
     
        </div>

          

        </div>


      </div>





    </div>



            </section>


    </div>




        </div>














<?php include_once('footer.php'); ?>

