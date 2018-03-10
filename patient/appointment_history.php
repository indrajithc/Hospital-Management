
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

    //  echo '<span id="main_my_zxid" class="hidden" did="'.$org_id_pa.'" style="display: none ;"></span>';

      if(  $sz_st09 == 0 ) {

        
  echo '<script type="text/javascript">location.href = "first.php";</script>';
  
}



?>


<?php

 
 


           $url = $_SERVER['REQUEST_URI']; //returns the current URL
    $parts = explode('/',$url);
    $dir = $_SERVER['SERVER_NAME'];
    for ($i = 0; $i < count($parts) - 2; $i++) {
     $dir .= $parts[$i] . "/";
    } 

 


?>



<div class="show_hide_heres" id="show_hide_s1">
    <div class="row">
        
        <div class="col-md-10 headeerd" >
			<h1>
               Appointment
            </h1>
            <p>
                 your appointments.
            </p>

        </div>

           <div class=" col-md-2 element_history " >
    
           <a href="appointment.php" class="btn btn-default"> appointment </a>
        </div>

    </div>

     

    <div class="row back_white margin_to_10 tabe_head">
  
      <div class="col-md-12">
        
                            <table class="table table-bordered table-striped sortable miyazaki my_table_x7" id="the_display_table_1">
                                <thead>
                                    <tr>

                                        <th data-defaultsign="AZ">department</th>
                                        <th data-defaultsign="AZ">doctor</th>
                                        <th data-defaultsign="AZ">email</th>
                                        <th data-defaultsign="_19">mobile</th>
                                        <th data-dateformat="dd-mm-yyyy">date</th>
                                        <th data-dateformat="HH-MM-SS">Time From</th>
                                        <th data-defaultsign="HH-MM-SS">Time To</th>
                                        <th data-defaultsign="AZ">Description</th>
                                        <th>status</th>
                                        <th data-dateformat="dd-mm-yyyy HH-MM-SS">created at</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php  
try {
 

    
$query = "SELECT   CONCAT( d.fname,' ',d.lname) AS doctor ,d.email AS email, d.image AS image, d.mphone AS mphone, d.lphone AS lphone, dp.name AS department,  DATE_FORMAT(a.time_from,'%d-%m-%Y') AS appointment_date,  DATE_FORMAT(a.time_from,'%r') AS time_from ,  DATE_FORMAT(a.time_to,'%r') AS time_to, a.description AS description, a.date AS date_time , a.status AS status, a.delete_status AS delete_status  FROM  `appointment`a LEFT JOIN doctor d ON a.doctor_id = d.id LEFT JOIN department dp ON d.department_id = dp.id  WHERE  a.delete_status=0 AND a.patient_id  =".$org_id_pa;
 

      $result_view_class = $a->display($query); 
      foreach($result_view_class as $value) {

$statu = "accomplish";
if($value['status'] == 0)
$statu = "incompetent";

  


         echo ' <tr> 
                  <td><p>'.$value['department'].'</p></td>
                  <td><p>'.$value['doctor'].'</p></td>
                  <td><p>'.$value['email'].'</p></td>
                  <td data-value="'.$value['mphone'].'" ><p  >'.$value['mphone'].'</p></td>
<td data-value="'.$value['appointment_date'].'" ><p>'.$value['appointment_date'].'</p></td>
<td data-value="'.$value['time_from'].'" ><p>'.$value['time_from'].'</p></td>
<td data-value="'.$value['time_to'].'" ><p>'.$value['time_to'].'</p></td>
                  <td><p>'.$value['description'].'</p></td>

                  <td ><button type="button" id=" " class="btn btn-default btn-sm">'.$statu.'
</button> </td>
                  <td data-value="'.$value['date_time'].'" ><p>'.$value['date_time'].'</p></td>

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

<?php

 
?>

 

<?php include_once('footer.php'); ?>

