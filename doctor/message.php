
<?php include( 'header.php');  ?>


<?php //include_once('footer.php'); ?>

<?php   
 
 if ($_POST) { 
    if(!empty($_POST['id'])){
        $_SESSION['postid'] = $_POST['id'];
    }
   header("Location: " . $_SERVER['REQUEST_URI']);
   exit();
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


        <div class="content-wrapper" style="min-height: 300px;" id="helloacjofhiouyr5345897">

             
            <section class="content">
            <div class=" message1">
              <div class="row back_white aino3" >
                
                <div class="col-md-8">
                    

                     <div class="panel panel-info">
            <div class="panel-heading my_head_msg">
               <img class="col-sm-1 to_image" src="">
               <h1 class="col-sm-11"> RECENT CHAT HISTORY</h1>
            </div>
            <div class="panel-body scrollas pakoda_backo_etra ">

          
                                      
                                <ul class="media-list" id="displsy_mshd" did="<?php echo $idd; ?>"  <?php if($idd>0){ echo 'echo="not_now"'; } ?>>
 

 <?php if($idd>0){ echo '<li style=" text-align:center; width:100%;"><div class="col-sm-offset-5 col-md-4" style="   cursor: wait;  " > <div class="loader"></div></div></li>'; } ?>



                                </ul>    
                    </div>


            </div>
            <div class="panel-footer">
                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter Message"  id="text_area_oi" />
                                    <span class="input-group-btn">
                                        <button class="btn btn-info" type="button" id="send_this_message">SEND</button>
                                    </span>
                                </div>
            
        </div>
                </div> 

                <div class="col-md-4">
                       <div class="panel panel-primary">
            <div class="panel-heading" style="text-transform: uppercase;">
               patients
            </div>
                 <div class="panel-body scrollas pakoda_backo_etra ">

                <ul class="media-list" id="all_me_users">



<?php 


 $query = "SELECT *,p.id AS pid FROM `patient` p LEFT JOIN patient_details d ON p.patient_details_id = d.id WHERE p.doctor_id =".$idxd." OR p.id IN ( SELECT DISTINCT(patient_id) FROM message WHERE doctor_id =".$idxd." ) ORDER BY  d.fname DESC" ;

             $result = $a->display($query);
               
 
        foreach($result as $value) {
  $image_temp = "../assets/images/default.png";

       if(!is_null($value['image'])) 
             if(file_exists("../patient/images_/".$value['image']) ) {
          $image_temp = "http://".$dir."patient/images_/".$value['image'];

            }

 $query = "SELECT DATE_FORMAT(date,'%Y-%m-%dT%TZ') AS new_date, date  FROM `message` WHERE patient_id=".$value['pid']."  AND patient_doctor =1 ORDER BY date DESC LIMIT 1" ;
 
             $result1 = $a->display($query);
               $this_ = "";

        foreach($result1 as $value1) {
               $this_ = ' <span data-livestamp="'.$value1['new_date'].'"></span> ';

        }



echo '
                        <li class="media">
                            <div class="media-body">
                                <div class="media">
                                   <form name="photo" action="patient.php" method="post" enctype="multipart/form-data" class="hidden"  >
           <input type="text" name="id" class="hidden" value="'.$value['pid'].'" id="passvaluePo" />
 <input type="submit" name="upload" value="View" class="col-sm-12 btn btn-default clcik_fk hidden"   />
</form>
                                    <a class="pull-left clcik_for_these" href="#" >
                                        <img class="media-object img-circle" style="max-height:40px;" src="'.$image_temp.'" />
                                    </a>
                                    <div  did="'.$value['pid'].'"  class="media-body click_show" >
                                        <h5> '.$value['fname'].' '.$value['lname'].' </h5>
                                       <small class="text-muted">'.$this_.'</small><div class="nobershere"><p> </p></div>
                                    </div>
                                </div>
                            </div>
                        </li>';



        }
 
           
?>


 


                                </ul>
                </div>
            </div>
                </div> 


            </div>

            </div>
            </section>
        </div>














<?php include_once('footer.php'); ?>

