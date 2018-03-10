
<?php include( 'header.php');  ?>


<?php //include_once('footer.php'); ?>



  <div class="container show_hide" id="head_show_hide1">
    <div class="row">
      <div class="col-md-12">
 <div style="padding-bottom: 50px;">
   <button id="show_mr_few" class="col-sm-offset-9 col-sm-2  btn btn-default" status="0" style="margin-top: 10px;">pending</button>

 </div>

 <!--========================================================================================================================================-->

<!--===================================================================================================================================-->


<?php 


 $query = "SELECT *, DATE_FORMAT(date,'%d-%m-%Y %r') AS new_date FROM `prescription` WHERE delete_status =0 AND id NOT IN (SELECT prescription_id FROM payment ) ORDER BY date DESC " ;

             $result = $a->display($query);
               

        foreach($result as $value) {
 
             
$new_time = date('Y-m-d H:i:s', time()-7200);


$ddate = strtotime( $value['date'].'' ); 
$mysqldate = date( 'Y-m-d H:i:s', $ddate ); 
 
?>











<div class="row main_head_br  <?php 
 if ( strtotime($mysqldate) <= strtotime($new_time) ){

   echo 'varunam';

}  


 ?> "  <?php 
 if ( strtotime($mysqldate) <= strtotime($new_time) ){

   echo 'style="display: none;"   ';

} 


 ?>    did="<?php echo $value['id']; ?>" >
 
<div class="form-group"> 
<div class="col-sm-7 "> 
  <p class="marg_lef"   style="margin-top: 20px;" ><strong>subject :</strong> <?php echo $value['subject']; ?></p>
</div>
<div class="col-sm-3 ">
  <p class=" clls_head1" style=" font-size: 14px;"  style="margin-top: 20px;" > <?php echo $value['new_date']; ?></p>
</div>
<div class="col-sm-2 ">
 
  <button class=" btn btn-default payment_tis_prisc" style="margin-top: 10px;" did="<?php echo $value['id']; ?>"> payment</button>
  </div>
</div>
  <div class="col-md-3">



    <div class="sub_head_desc">
     <h1 class="col-sm-10"> patient </h1>
      
      <div class="form-group" style="margin-left: 5px;"  > 
      <?php 


  $image3 = "../assets/images/default.png";

 $query3 = "SELECT * FROM `patient` p LEFT JOIN patient_details pd ON p.patient_details_id = pd.id WHERE p.id =".$value['patient_id']  ;

             $result3 = $a->display($query3);
               

        foreach($result3 as $value3) {
 
         //  echo $value1['id'];

        if(!is_null($value3['image']))  {
          $image3 = "http://".$dir."patient/images_/".$value3['image'];

        } 


?>


<div class="form-group" style="margin-left: 5px;"  > 
                         <div class=" col-sm-12 " style="text-align: center;">
                         	<img src="<?php echo $image3; ?>" style="height: 200px; width: auto; padding: 5px;">
                         </div> 
                         </div>
                         <div class="form-group" style="margin-left: 5px;"  > 
                         <div class=" col-sm-12 "><p class=" " style="text-align: center;font-size: 14px;"><strong><?php  echo $value3['fname'].' '.$value3['lname']; ?></strong> </p> </div> 
                         </div> 
                         <div class="form-group" style="margin-left: 5px;"  > 
                         <div class=" col-sm-12 "><p class=" " style="text-align: center;font-size: 14px;"><?php  echo $value3['email']; ?> </p> </div> 
                         </div>
                         

<?php 


}

?>
 </div>



    </div>


 



  </div>




  <div class="col-md-5">
    <div class="desc_sc" style="min-height: 290px;">
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






  <div class="container show_hide" id="head_show_hide2" style="display: none;">
    <div class="row">
      <div class="col-md-12">
      <div>
        <div class="form-group">
         
          <div class="col-sm-11">
            <h1 id="echo0001"> name</h1>
          </div> 
           <div class="col-sm-1">
            <button class="btn btn-default" id="hello_do_this_back"> back</button>
          </div>
        </div>

      </div>






<div>
  

        <div class="col-md-3">
  
<div class="form-group" style="margin-left: 5px;"  > 
                         <div class=" col-sm-12 " style="text-align: center;">
                          <img  id="echo0002" src="image" style="height: 200px; width: auto; padding: 5px;">
                         </div> 
                         </div>

                         <div class="form-group" style="margin-left: 5px;"  > 
                         <div class=" col-sm-12 "><p class=" " style="text-align: center;font-size: 14px;"><strong   id="echo0003" >name</strong> </p> </div> 
                         </div> 

                         <div class="form-group" style="margin-left: 5px;"  > 
                         <div class=" col-sm-12 "><p   id="echo0004"  class=" " style="text-align: center;font-size: 14px;">email </p> </div> 
                         </div>
                         

      </div>
              <div class="col-md-9"   id="echo0005" >
  
                        <div class="form-group" style="margin-left: 5px;"  > 
                         <div class=" col-sm-7 " style="text-align: center;">
                          <p> <strong   id="echo0002" >medicines</strong></p>
                         </div> 
                        <div class=" col-sm-3 " style="text-align: center;">
                          <p> <strong>Time</strong></p>
                          
                         </div> 
                    <div class=" col-sm-1 " style="text-align: center;">
                          <p> <strong>quantity</strong></p>
                          
                         </div>              

                         <div class=" col-sm-1 " style="text-align: center;">
                          <p> <strong>price</strong></p>
                          
                         </div> 



                         </div>

                         

      </div>







</div>
<div class="col-md-12">
  
                         <div class="form-group" style="margin-left: 5px;border-top: 1px solid green;" > 
                          <div class=" col-sm-10 "><p class=" " style="text-align: left;font-size: 14px;">totoal </p> </div> 
                          <div class=" col-sm-2 "><p><strong class=" "   id="echo0006"  style="text-align: left;font-size: 14px;">0 </strong>  -NIR</p> </div> 
                         </div>



</div>

<div class="col-md-12">
  
                         <div class="form-group" style="margin-left: 5px;   " > 
      
   <div class="col-md-offset-1 col-sm-2 ">



        <form name="photoa" action="history.php" method="post" enctype="multipart/form-data" id="patient_id" class="">
        <input type="text" name="id" class="hidden" value="" id="echo00011" />
 
 <button type="submit" id="echo00020"  name="upload"  did="" class="btn btn-default"> history </button>
    </form>

                         
                          </div> 

                          <div class="col-md-offset-7 col-sm-2 ">
                          <button type="button" id="echo00010" did="" class="btn btn-success"> pay </button>
                          </div> 
                         </div>



</div>






 
      </div>

    </div>

  </div>






<?php include_once('footer.php'); ?>

