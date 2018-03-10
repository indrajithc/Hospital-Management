
<?php include( 'header.php');  ?>


<?php //include_once('footer.php'); ?>

<?php   
 
 if ($_POST) { 
    if(!empty($_POST['id'])){
        $_SESSION['postid'] = $_POST['id'];
    }
   header("Location: " . $_SERVER['REQUEST_URI'] . "?result='success' ");
   exit();
}


if (isset($_GET['result'])) {
  echo $_GET['result'];
}
 
$idd = 0; 
 
if(!empty($_SESSION['postid'])){


 $query = "SELECT * FROM patient WHERE  id=".$_SESSION['postid'];
     if($a->display($query)) {
        $idd = $_SESSION['postid']; 
    }
} else {
    $idd=0;

}
 

 unset($_SESSION["postid"]);

?>

        <div class="content-wrapper show_hide <?php if($idd == 0) { echo "hidden";} ?> " style="min-height: 300px;   <?php if($idd == 0) { echo "display: none";} ?> " id="davko_jnako_0934000">
 


 <?php 


 $query = "SELECT pd.*,p.*, g.name AS gname,g.address AS gaddress, g.mphone AS gmphone, g.lphone AS glphone, g.relation AS grelation ,p.delete_status AS status_delete , b.group_name AS group_name, DATE_FORMAT(p.dob,'%d-%m-%Y') AS fdob, DATE_FORMAT(p.start_date,'%d-%m-%Y') AS fstart_date,   CONCAT( d.fname,' ',d.lname) AS doctor ,dp.name AS department, d.email AS demail FROM patient p LEFT JOIN patient_details pd ON p.patient_details_id = pd.id LEFT JOIN guardian g ON g.patient_id = p.id LEFT JOIN blood_group b ON p.blood_group_id = b.id LEFT JOIN doctor d ON p.doctor_id = d.id LEFT JOIN department dp ON d.department_id = dp.id  WHERE p.id=".$idd." ORDER BY p.date";

             $result = $a->display($query);
             

 $id = "";    $fname = "";    $lname = "";    $email = "";    $password = "";    $image = "";    $delete_status = "";    $date = "";    $id = "";    $doctor_id = "";    $patient_details_id = "";    $mphone = "";    $lphone = "";    $sex = "";    $dob = "";    $blood_group_id = "";    $address = "";    $start_date = "";    $colour = "";    $description = "";    $valid_status = "";    $delete_status = "";    $date = "";    $gname = "";    $gaddress = "";    $gmphone = "";    $glphone = "";    $grelation = "";    $status_delete  = ""; 


 $grelation = ""; 
 $grelation = ""; 
 $demail = "";

  $image_temp = "../assets/images/default.png";

        foreach($result as $value) {
           
             if(!is_null($value['image'])) 
             if(file_exists("../patient/images_/".$value['image']) ) {
          $image_temp = "http://".$dir."patient/images_/".$value['image'];

        
        } 


$statu = "accomplish";
$stat_color ="green";
// if($value['status'] == 0){
//     $statu = "incompetent";
//     $stat_color ="blue";

// }

 $fname = $value['fname']; 
 $lname = $value['lname']; 
 $email = $value['email'];  
 $image =  $image_temp;     
 $mphone = $value['mphone']; 
 $lphone = $value['lphone']; 
 $sex = $value['sex']; 
 $dob = $value['fdob']; 
 $blood_group_id = $value['group_name']; 
 $address = $value['address']; 
 $start_date = $value['fstart_date']; 
 $colour = $value['colour']; 
 $description = $value['description']; 
 $valid_status = $value['valid_status'];   
 $gname = $value['gname']; 
 $gaddress = $value['gaddress']; 
 $gmphone = $value['gmphone']; 
 $glphone = $value['glphone']; 
 $grelation = $value['grelation']; 


 $doctor = $value['doctor']; 
 $department = $value['department']; 
 $demail = $value['demail']; 


 $status_delete  = 'deleted' ; 
 if($value['status_delete'] == 0)
 $status_delete  = 'Active' ; 

}


 ?>
            <section class="content-header">
                <h1 id="192168001">
            <?php  echo $fname.' '.$lname; ?>
            <small><?php echo $description; ?></small>
          </h1>
                <ol class="breadcrumb">
                    <li><a href="#" id="viewAll_djrh3ki4"><i class="fa fa-dashboard"></i>all patients</a></li>
                    <li class="active">View a patient</li>
                </ol>
            </section>



     
  

              <section class="content" style="min-height: 65px;">
 
                <div class="col-md-12   pading_5">

                    <div class="row  pading_5">
                        <div class="col-md-12 ">



   <form name="photo" action="prescription.php" method="post" enctype="multipart/form-data" id="patient_id_new"  >
           <input type="text" name="id" class="hidden" id="prescribe_this" value="<?php echo $idd; ?>"  />
                                      

<button  type="submit"  class="btn btn-success xobutton" style="width: 99.6%;margin-left: -15px;"> prescribe </button>


    </form>


                        </div>
                    </div>
                </div>


            </section>



 


            <section class="content">
 
                <div class="col-md-12 back_white pading_5">

                    <div class="row  pading_5">
                        <div class="col-md-12 ">

 
      <div class="col-md-4  ">

        <div class="row">
           <div class="col-md-12 col-md-sub_my_4">

        <div class=" mu_row_status_samll_5" style="background-color: <?php echo $colour ;?>">
          <h2> personal information</h2>
        </div>
             <div class="form-horizontal"> 
                <div class="form-group  image_form"> 
                  <img src= "<?php echo $image; ?>" id="show_image_5" style="width: 200px !important;height: 200px !important;"> 
                </div> 

                <div class="form-group  ">  
                  <label  class="col-sm-5 control-label label_me_5">First Name</label>
                  <span  id="vdfname" class="col-sm-7 "><?php echo $fname; ?></span>
                </div> 
           
                <div class="form-group  ">  
                  <label  class="col-sm-5 control-label label_me_5">Last Name</label>
                  <span  id="vdlname" class="col-sm-7 "><?php echo $lname; ?></span>
                </div> 


                <div class="form-group  ">  
                  <label  class="col-sm-5 control-label label_me_5">Date of Birth</label>
                  <span  id="vddob" class="col-sm-7 "><?php echo $dob; ?></span>
                </div> 



                <div class="form-group  ">  
                  <label  class="col-sm-5 control-label label_me_5">Sex</label>
                  <span  id="vdsex" class="col-sm-7 " valz=""><?php echo $sex; ?></span>
                </div> 



                




        </div>
     
        </div>

          

        </div>



      </div>
        

<div class="col-md-4">

        <div class=" ">
           <div class="col-md-12 col-md-sub_my_4">

        <div class=" mu_row_status_samll_5"  style="background-color: <?php echo $colour ;?>">
          <h2> contact information</h2>
        </div>
  <div class="form-horizontal"> 

                <div class="form-group  ">  
                  <label  class="col-sm-5 control-label label_me_5">Email</label>
                  <span  id="vdemail" class="col-sm-7 "><?php echo $email; ?></span>
                </div> 
           
                <div class="form-group  ">  
                  <label  class="col-sm-5 control-label label_me_5">Mobile Phone</label>
                  <span  id="vdmphone" class="col-sm-7 ">+<?php echo $mphone; ?></span>
                </div> 


                <div class="form-group  ">  
                  <label  class="col-sm-5 control-label label_me_5">landline</label>
                  <span  id="vdlphone" class="col-sm-7 ">+<?php echo $lphone; ?></span>
                </div> 



                <div class="form-group  ">  
                  <label  class="col-sm-5 control-label label_me_5">Address</label>
                  <p  id="vdaddress" class="col-sm-7 "><?php echo $address; ?></p>
                </div> 





        </div>
     
        </div>

          

        </div>




 

        <div class=" ">
           <div class="col-md-12 col-md-sub_my_4">

        <div class=" mu_row_status_samll_5" style="background-color: <?php echo $colour ;?>">
          <h2> Head doctor information</h2>
        </div>
                        <div class="form-horizontal"> 


                <div class="form-group  ">  
                  <label  class="col-sm-5 control-label label_me_5">Doctor</label>
                  <span  id="vddoctor" class="col-sm-7 "><?php echo $doctor; ?></span>
                </div> 
           
               
 
                <div class="form-group  ">  
                  <label  class="col-sm-5 control-label label_me_5">department</label>
                  <span  id="vddepartment" class="col-sm-7 "><?php echo $department; ?></span>
                </div> 
           
                <div class="form-group  ">  
                  <label  class="col-sm-5 control-label label_me_5">Email</label>
                  <span  id="vddemail" class="col-sm-7 "><?php echo $demail; ?></span>
                </div> 


              




        </div>
     
        </div>

          

        </div>





      </div>


<div class="col-md-4">

        <div class=" ">
           <div class="col-md-12 col-md-sub_my_4">

        <div class=" mu_row_status_samll_5" style="background-color: <?php echo $colour ;?>">
          <h2> general information</h2>
        </div>
                        <div class="form-horizontal"> 

                <div class="form-group  ">  
                  <label  class="col-sm-5 control-label label_me_5">blood group</label>
                  <span  id="vdblood_group_id" class="col-sm-7 "><?php echo $blood_group_id; ?></span>
                </div> 
           
                <div class="form-group  ">  
                  <label  class="col-sm-5 control-label label_me_5">start date</label>
                  <p  id="vdstart_date" class="col-sm-7 "><?php echo $start_date; ?></p>
                </div> 


               
                <div class="form-group  ">  
                  <label  class="col-sm-5 control-label label_me_5">description</label>
                  <p  id="vddescription" class="col-sm-7 "><?php echo $description; ?></p>
                </div> 


                <div class="form-group  ">  
                  <label  class="col-sm-5 control-label label_me_5">status</label>
                  <span  id="vdstatus" class="col-sm-7 " status=""><?php echo $status_delete; ?></span>
                </div> 
           



        </div>
     
        </div>

          

        </div>


 


        <div class=" ">
           <div class="col-md-12 col-md-sub_my_4">

        <div class=" mu_row_status_samll_5" style="background-color: <?php echo $colour ;?>">
          <h2> guardian information</h2>
        </div>
                        <div class="form-horizontal"> 


                <div class="form-group  ">  
                  <label  class="col-sm-5 control-label label_me_5">Relation</label>
                  <span  id="vdgrelation" class="col-sm-7 "><?php echo $grelation; ?></span>
                </div> 
           
               
 
                <div class="form-group  ">  
                  <label  class="col-sm-5 control-label label_me_5">Name</label>
                  <span  id="vdgname" class="col-sm-7 "><?php echo $gname; ?></span>
                </div> 
           
                <div class="form-group  ">  
                  <label  class="col-sm-5 control-label label_me_5">Mobile Phone</label>
                  <span  id="vdgmphone" class="col-sm-7 "><?php echo $gmphone; ?></span>
                </div> 


                <div class="form-group  ">  
                  <label  class="col-sm-5 control-label label_me_5">landline</label>
                  <span  id="vdglphone" class="col-sm-7 "><?php echo $glphone; ?></span>
                </div> 



                <div class="form-group  ">  
                  <label  class="col-sm-5 control-label label_me_5">Address</label>
                  <p  id="vdgaddress" class="col-sm-7 "><?php echo $gaddress; ?></p>
                </div> 







        </div>
     
        </div>

          

        </div>
 





    </div>


 


                        </div>
                    </div>
                </div>


            </section>

             <section class="content">
 
                <div class="col-md-12 back_white pading_5">

                    <div class="row  pading_5">
                        <div class="col-md-12 ">

<!--========================================================================================================================================-->

<!--===================================================================================================================================-->


<?php 


 $query = "SELECT *, DATE_FORMAT(date,'%d-%m-%Y %r') AS new_date FROM `prescription` WHERE patient_id =".$idd."  ORDER BY  date DESC" ;

             $result = $a->display($query);
               

        foreach($result as $value) {
 
           
?>











<div class="row main_head_br" <?php  if( $value['delete_status'] !=0 ) { echo 'style="background-color: #ff00004d;"';} ?> >
  <h1 class="col-sm-10 clls_head1"> <?php echo $value['new_date']; ?></h1>

<?php  if( $value['doctor_id'] == $idxd AND $value['delete_status'] ==0 ) {?>
  <button class="col-sm-1 btn btn-default delete_tis_prisc" style="margin-top: 20px;" did=" <?php echo $value['id']; ?>"> delete</button>
<?php  } ?>


  <p class="col-sm-12 marg_lef" ><strong>subject :</strong> <?php echo $value['subject']; ?></p>
  <div class="col-md-5">
    <div class="desc_sc">
        <?php echo $value['description']; ?>
    </div>
    

  </div>
  <div class="col-md-4 sub_head_desc" >
    <h1 class="col-sm-10"> medicines</h1>

    <form>



<?php 


 $query1 = "SELECT p.*,m.name AS mname, DATE_FORMAT(p.date_from,'%d-%m-%Y') AS d_from, DATE_FORMAT(p.date_to,'%d-%m-%Y') AS d_to  FROM `prescribe` p LEFT JOIN medicines m ON m.id = p.medicines_id WHERE p.prescription_id =".$value['id']." AND p.delete_status =0  ORDER BY `date` DESC" ;

             $result1 = $a->display($query1);
               

        foreach($result1 as $value1) {
 
         //  echo $value1['id'];
  


?>
 


      <div>
                   <div class="form-group" style="margin-left: 5px;"  > 
                        <div class=" col-sm-12 "><p class="main_medic_name" ><?php  echo $value1['mname']; ?></p> </div> 
                   </div>
                    <div class="form-group" style="margin-left: 5px;"  > 
                       <div class=" col-sm-6 "><p class=" "><?php  echo $value1['time']; ?></p> </div> 
                       <div class=" col-sm-6 "><p class=" "><?php  echo $value1['amount']; ?>/time</p> </div> 
                   </div>
                  <div class="form-group" style="margin-left: 5px;"  > 
                       <div class=" col-sm-6 "><p class=" "><strong>From :</strong><?php  echo $value1['d_from']; ?></p> </div> 
                       <div class=" col-sm-6 "><p class=" "><strong>To :</strong><?php  echo $value1['d_to']; ?></p> </div> 
                   </div>
                    <div class="form-group " style="margin-left: 5px;"  > 
                        <div class=" col-sm-12  show_border"><p ><strong>description :</strong><?php  echo $value1['description']; ?></p> </div> 
                   </div>
      </div>



<?php

}

?>


</form>





  </div>
      
  <div class="col-md-3">



    <div class="sub_head_desc">
     <h1 class="col-sm-10"> admit section</h1>
      
      <div class="form-group" style="margin-left: 5px;"  > 
      <?php 


 $query3 = "SELECT b.id AS bid, DATE_FORMAT( p.discharge ,'%d-%m-%Y %r') AS discharge, b.type AS type, b.room_description AS room FROM `prescription` p LEFT JOIN bed b ON p.bed_id=b.id WHERE p.patient_id =".$idd."  AND p.id =".$value['id']." AND p.bed_id !=0 AND p.delete_status =0 "  ;

             $result3 = $a->display($query3);
               

        foreach($result3 as $value3) {
 
         //  echo $value1['id'];
?>



                         <div class=" col-sm-8 "><p class=" "><?php  echo '('.$value3['bid'].')  '.$value3['type'].','.$value3['room']; ?></p> </div> 
                         <div class=" col-sm-4 "><p class=" "><strong>discharge at </strong> <?php  echo $value3['discharge']; ?></p> </div> 
                         

<?php 


}

?>
 </div>



    </div>


    <div class="sub_head_desc">
      <h1 class="col-sm-10"> blood</h1>
      
      <div class="form-group" style="margin-left: 5px;"  > 

      <?php 


 $query2 = "SELECT * FROM `blood_manage`bm LEFT JOIN blood_group bg ON bm.blood_group_id = bg.id WHERE bm.prescription_id =".$value['id']." LIMIT 1 "  ;

             $result2 = $a->display($query2);
               

        foreach($result2 as $value2) {
 
         //  echo $value1['id'];
?>
                         <div class=" col-sm-8 "><p class=" "><?php  echo $value2['group_name']; ?></p> </div> 
                         <div class=" col-sm-4 "><p class=" "><?php  echo $value2['amount']; ?> ml</p> </div> 
                        

                         <?php
  }



                         ?>
                   </div>
      
    </div>





  </div>
      <?php

            $query8 = "SELECT dp.name AS department , CONCAT(d.fname,' ',d.lname) AS name FROM `doctor`d LEFT JOIN department dp ON d.department_id = dp.id WHERE d.id =".$value['doctor_id']." LIMIT 1 "  ;

             $result8 = $a->display($query8);
         $doc_ar = "";      

        foreach($result8 as $value8) {
            $doc_ar = '<p class="col-sm-12" style="text-align: right;color: green;"> <strong>prescribed by </strong>'.$value8['name'].' -('.$value8['department'].') </p>';
        }
          echo $doc_ar;
      ?>


</div>

<?php 


}

?>
 

<!--===================================================================================================================================-->



<!---========================================================================================================================================-->

                        </div>
                    </div>
                </div>


            </section>








        </div>






        <div class="content-wrapper show_hide <?php if($idd != 0) { echo "hidden";} ?> " style="min-height: 300px;   <?php if($idd != 0) { echo "display: none";} ?> " id="davko_jnako_0934001">
 
            <section class="content-header">
                <h1>
            Patients
            <small>All Patients</small>
          </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> patients</a></li>
                    <li class="active">all patients</li>
                </ol>
            </section>





 


            <section class="content">
 
                <div class="col-md-12 back_white pading_5">

                    <div class="row  pading_5">
                        <div class="col-md-12 ">



      


       
                            <table class="table table-bordered table-striped sortable miyazaki my_table_y8" id="the_display_table_1">
                                <thead>
                                    <tr>

                                        <th data-defaultsign="AZ">Name</th>
                                        <th data-defaultsign="AZ">email</th>
                                        <th data-defaultsign="_19">mobile</th>
                                        <th data-defaultsign="AZ">gender</th>
                                        <th data-dateformat="dd-mm-yyyy">Date of Birth</th>
                                        <th data-defaultsign="AZ">blood group</th>
                                        <th data-defaultsign="AZ">Description</th>
                                        <th data-defaultsign="AZ">status</th>
                                        <th >Action</th>


                                    </tr>
                                </thead>
                                <tbody>

                                    <?php  
try {
 


 $query = "SELECT p.id AS ppid, pd.*,p.*, g.name AS gname,g.address AS gaddress, g.mphone AS gmphone, g.lphone AS glphone, g.relation AS grelation ,p.delete_status AS status_delete , b.group_name AS group_name, DATE_FORMAT(p.dob,'%d-%m-%Y') AS fdob, DATE_FORMAT(p.start_date,'%d-%m-%Y') AS fstart_date,   CONCAT( d.fname,' ',d.lname) AS doctor ,dp.name AS department FROM patient p LEFT JOIN patient_details pd ON p.patient_details_id = pd.id LEFT JOIN guardian g ON g.patient_id = p.id LEFT JOIN blood_group b ON p.blood_group_id = b.id LEFT JOIN doctor d ON p.doctor_id = d.id LEFT JOIN department dp ON d.department_id = dp.id  WHERE p.doctor_id =".$idxd." OR p.id IN( SELECT DISTINCT(patient_id) FROM appointment WHERE doctor_id =".$idxd." ) ORDER BY p.date ";
             $result = $a->display($query);
             

 $pid = "";            
 $fname = ""; 
 $lname = ""; 
 $email = ""; 
 $mphone = ""; 
 $sex = "";
 $dob = ""; 
 $blood_group_id = ""; 
 $description =  ""; 
 $status_delete = "";

 
 
        foreach($result as $value) {

$pid = $value['ppid']; 

 $fname = $value['fname']; 
 $lname = $value['lname']; 
 $email = $value['email'];   


 $mphone = $value['mphone'];

 $sex = $value['sex']; 
 $dob = $value['fdob']; 
 $blood_group_id = $value['group_name']; 

 $description = $value['description']; 






 $status_delete  = 'deleted' ; 
 if($value['status_delete'] == 0)
 $status_delete  = 'Active' ; 





$delete_status = "";
if($value['delete_status'] == 1){
    $delete_status = ' class="tabledeleted" data-toggle="tooltip" title="deleted" '; 

}


echo '  <tr '.$delete_status.'  >  
                  <td><p>'.$fname.' '.$lname.'</p></td>
                  <td><p>'.$email.'</p></td>
                  <td data-value="'.$mphone.'" ><p  >'.$mphone.'</p></td>
                  <td><p>'.$sex.'</p></td>
<td data-value="'.$dob.'" ><p>'.$dob.'</p></td>
                  <td><p>'.$blood_group_id.'</p></td>
                  <td><p>'.$description.'</p></td>
                  <td ><p   >'.$status_delete.'</p> </td>
                  <td>          
 <button type="button" name="upload" did="'.$pid.'"  class="col-sm-12 btn btn-default button_view_patn45" id="" >view</button>
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





<?php   



?>








<?php include_once('footer.php'); ?>

