
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

 //     echo '<span id="main_my_zxid" class="hidden" did="'.$org_id_pa.'" style="display: none ;"></span>';

      if(  $sz_st09 == 0 ) {

        
  echo '<script type="text/javascript">location.href = "first.php";</script>';
  
}



?>







<div class="main clearfix">
     <div class="row">
        
        <div class="col-md-12 headeerd" >
			<h1>
               Notifications
            </h1>
            <p>
                 admin notifications.
            </p>

        </div> 

    </div>





<?php

 $query = " SELECT n.*,a.image AS image, a.*, n.description AS descriptionz FROM `notifications` n LEFT JOIN admin a ON n.admin_id = a.id  ORDER BY  n.date DESC LIMIT 20 ";
 $result_view_class = $a->display($query);
 
  $imagea = "../assets/images/default.png";
      
       foreach($result_view_class as $value) {
       
        $ma_name=$value['fname']." ".$value['lname'];    
      $ma_name=$value['fname']." ".$value['lname'];     
 
        
              if(!is_null($value['image']))  {
          $imagea = "http://".$dir."admin/images_/".$value['image'];
 
        } 

?>



                <div class="info-box">
                    <span class="info-box-icon bg-black">
                        <img src="<?php echo  $imagea; ?>" class="test_class_width_he" >
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text"><?php echo $value['subject']; ?></span>
                        <p class=""><?php echo  $value['descriptionz']; ?></p>
                    </div>
                </div>




<?php 

    }

?>



</div> 









<?php include_once('footer.php'); ?>

