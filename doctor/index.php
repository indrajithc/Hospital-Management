
<?php include( 'header.php');  ?>


<?php //include_once('footer.php'); ?>








        <div class="content-wrapper" style="min-height: 300px;">

            <section class="content-header">
                <h1>
            dashboard
            <small>admin notifications</small>
          </h1>
             
            </section>

            <section class="content">


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




            </section>
        </div>














<?php include_once('footer.php'); ?>

