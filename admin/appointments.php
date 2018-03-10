
<?php include( 'header.php');  ?>


<?php //include_once('footer.php'); ?>




 
        <div class="content-wrapper" style="min-height: 300px;">
 
            <section class="content-header" style="margin-bottom: 30px;">
                <h1 style="margin-left: 10px">
              Appointments
             
          </h1>
                
            </section>





            <section class="content" style="padding: 2px 20px 2px 20px;">



<?php   


 $query = "SELECT CONCAT(d.fname,' ',d.lname) AS dname, d.email AS demail, CONCAT( pd.fname,' ',pd.lname) AS patient, pd.email AS email,p.mphone AS mphone , p.id AS pid, pd.image AS image,  DATE_FORMAT(a.time_from,'%d-%m-%Y') AS appointment_date,  DATE_FORMAT(a.time_from,'%r') AS time_from ,  DATE_FORMAT(a.time_to,'%r') AS time_to , a.description AS description, DATE_FORMAT( a.date ,'%d-%m-%Y %r')AS date_time , a.status AS status, a.delete_status AS delete_status  FROM `appointment`a LEFT JOIN patient p ON a.patient_id = p.id LEFT JOIN patient_details pd ON p.patient_details_id = pd.id LEFT JOIN doctor d ON a.doctor_id = d.id WHERE        NOW() <=  a.time_from  AND a.delete_status=0   AND a.status =0 ORDER BY a.time_from";
             $result = $a->display($query);
             

  $image_temp = "../assets/images/default.png";

        foreach($result as $value) {
           
             if(!is_null($value['image'])) 
             if(file_exists("../patient/images_/".$value['image']) ) {
          $image_temp = "http://".$dir."patient/images_/".$value['image'];

        
        } 


$statu = "accomplish";
$stat_color ="green";
if($value['status'] == 0){
    $statu = "incompetent";
    $stat_color ="blue";

}


echo '

         <div class=" pading_5 one_bord ">

                <div class="row pading_5  back_white new_t_row1">

                    <div class="col-md-2 back_white pading_5">
                        <img src="'. $image_temp.'" class="image_pa_app">
                    </div>

                    <div class="col-md-3 back_white pading_5 personal_deta">
                        <h1 > personal details</h1>


<form class="form-horizontal  ">

                                <div class="form-group  ">
                                    <label class="col-sm-3 control-label ">Name</label>
                                    <label class="col-sm-7 control-label text-left">'.$value['patient'].'</label>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label ">email</label>
                                    <label class="col-sm-7 control-label text-left">'.$value['email'].'</label>
                                </div>


                                <div class="form-group  ">
                                    <label class="col-sm-3 control-label ">phone</label>
                                    <label class="col-sm-7 control-label text-left">'.$value['mphone'].'</label>
                                </div>


</form>

                    </div>



                    <div class="col-md-3 back_white pading_5 appointment_details">
                        <h1 > appointment details</h1>


<form class="form-horizontal  ">

                                <div class="form-group  ">
                                    <label class="col-sm-5 control-label ">Date</label>
                                    <label class="col-sm-7 control-label text-left">'.$value['appointment_date'].'</label>
                                </div>


                                <div class="form-group  ">
                                    <label class="col-sm-5 control-label ">Time From</label>
                                    <label class="col-sm-7 control-label text-left">'.$value['time_from'].'</label>
                                </div>


                                <div class="form-group  ">
                                    <label class="col-sm-5 control-label ">Time to</label>
                                    <label class="col-sm-7 control-label text-left">'.$value['time_to'].'</label>
                                </div>

                                <div class="form-group  ">
                                    <label class="col-sm-5 control-label ">description</label>
                                    <p class="col-sm-7 control-label text-left">'.$value['description'].'</p>
                                </div>


</form>

                    </div>




                    <div class="col-md-3 back_white pading_5 date_details">
                        <h1 > created</h1> 
                        <form class="form-horizontal  ">

                                <div class="form-group  ">
                                    <p class="col-sm-12 control-label text-left">'.$value['date_time'].'</p>
                                </div>

                                <div class="form-group  ">

                                   <p class="col-sm-12 control-label text-left" style="color:'.$stat_color.' !important;">'.$statu .'</p>
                                </div>

                        </form>

                <h1 > doctor</h1> 
                        <form class="form-horizontal  ">

                                <div class="form-group  ">
                                    <p class="col-sm-12 control-label text-left">'.$value['dname'].'</p>
                                </div>

                                <div class="form-group  ">

                                   <p class="col-sm-12 control-label text-left" ">'.$value['demail'].'</p>
                                </div>

                        </form>
                    </div>



                    <div class="col-md-1 back_white pading_5 action_buttons">
                        
 
<form name="photo" action="patient.php" method="post" enctype="multipart/form-data" id="patient_id" class="form-horizontal ">
        
                                <div class="form-group  ">
                                  
                                    
                                </div> 
                                <div class="form-group  ">
                                  <input type="text" name="id" class="hidden" value="'.$value['pid'].'" id="passvaluePo" />
                                     
 <input type="submit" name="upload" value="View" class="col-sm-12 btn btn-default" id="pass_value_here" />

                                </div>




        
        

</form>

                    </div>



                </div>

                </div>

'  ;

        
        }

 


?>



            </section>


            <section class="content" style="margin-top: 90px;">
 
                <div class="col-md-12 back_white pading_5">

                    <div class="row  pading_5">
                        <div class="col-md-12 ">




       
                            <table class="table table-bordered table-striped sortable miyazaki my_table_x4" id="the_display_table_1">
                                <thead>
                                    <tr>

                                        <th data-defaultsign="AZ">patient</th>
                                        <th data-defaultsign="AZ">doctor</th>
                                        <th data-defaultsign="AZ">doctor email</th>
                                        <th data-dateformat="dd-mm-yyyy">appointment date</th>
                                        <th data-dateformat="HH-MM-SS">Time From</th>
                                        <th data-defaultsign="HH-MM-SS">Time To</th>
                                        <th data-defaultsign="AZ">Description</th>
                                        <th data-defaultsign="AZ">status</th>
                                        <th data-dateformat="dd-mm-yyyy HH-MM-SS">created at</th>
                                        <th >Action</th>


                                    </tr>
                                </thead>
                                <tbody>

                                    <?php  
try {
 


 $query = "SELECT  CONCAT(d.fname,' ',d.lname) AS dname, d.email AS demail,  CONCAT( pd.fname,' ',pd.lname) AS patient, pd.email AS email,p.mphone AS mphone , p.id AS pid, pd.image AS image,  DATE_FORMAT(a.time_from,'%d-%m-%Y') AS appointment_date,  DATE_FORMAT(a.time_from,'%r') AS time_from ,  DATE_FORMAT(a.time_to,'%r') AS time_to , a.description AS description, DATE_FORMAT( a.date ,'%d-%m-%Y %r')AS date_time , a.status AS status, a.delete_status AS delete_status  FROM `appointment`a LEFT JOIN patient p ON a.patient_id = p.id LEFT JOIN patient_details pd ON p.patient_details_id = pd.id LEFT JOIN doctor d ON a.doctor_id = d.id  ORDER BY a.time_from ";
             $result = $a->display($query);
             

   
        foreach($result as $value) {

$statu = "accomplish";
$stat_color ="green";
if($value['status'] == 0){
    $statu = "incompetent";
    $stat_color ="blue";

}


$delete_status = "";
if($value['delete_status'] == 1){
    $delete_status = ' class="tabledeleted" data-toggle="tooltip" title="deleted" '; 

}


echo '  <tr '.$delete_status.'  >  
                  <td><p>'.$value['patient'].'</p></td>
                  <td><p>'.$value['dname'].'</p></td>
                  <td><p>'.$value['demail'].'</p></td>

<td data-value="'.$value['appointment_date'].'" ><p>'.$value['appointment_date'].'</p></td>
<td data-value="'.$value['time_from'].'" ><p>'.$value['time_from'].'</p></td>
<td data-value="'.$value['time_to'].'" ><p>'.$value['time_to'].'</p></td>
                  <td><p>'.$value['description'].'</p></td>

                  <td ><p   >'.$statu.'
</p> </td>
                  <td data-value="'.$value['date_time'].'" ><p>'.$value['date_time'].'</p></td>


                  <td> 
   <form name="photo" action="patient.php" method="post" enctype="multipart/form-data" id="patient_id"  >
           <input type="text" name="id" class="hidden" value="'.$value['pid'].'" id="passvaluePo" />
                                     
 <input type="submit" name="upload" value="View" class="col-sm-12 btn btn-default" id="pass_value_here" />

    </form>

                  </td>

                </tr>';


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














<?php include_once('footer.php'); ?>

