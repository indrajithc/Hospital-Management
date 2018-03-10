<?php
ob_start();
session_start();
if( empty($_SESSION['pa']) ) {
  $_SESSION['loc'] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

  echo '<script type="text/javascript">location.href = "../index.php";</script>';
  exit('Please login');
}
 

//-------------------data base-----------------------//

try {
  require_once('../includes/db.php');
  $a = new Database();
  
}catch (Exception $e){
  
}
  

?>


           <?php 

           $url = $_SERVER['REQUEST_URI']; //returns the current URL
    $parts = explode('/',$url);
    $dir = $_SERVER['SERVER_NAME'];
    for ($i = 0; $i < count($parts) - 2; $i++) {
     $dir .= $parts[$i] . "/";
    } 

 
 $ma_name = "patient";
$idxd = "";
  $image = "../assets/images/default.png";

 $query = " SELECT * FROM patient_details  WHERE email= '".$_SESSION['pa']."' ";
 $result_view_class = $a->display($query);
 
      
       foreach($result_view_class as $value) {
       
        $ma_name=$value['fname']." ".$value['lname'];    
      $ma_name=$value['fname']." ".$value['lname'];       
        $email = $value['email'];
        if(!is_null($value['image']))  {
          $image = "http://".$dir."patient/images_/".$value['image'];

        } 
    $idxd = $value['id']; 
          
      }
      
      
      ?>
 

<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo SYSTEM_NAME;?></title>
        
        <link rel="shortcut icon" href="../favicon.ico">
 

 <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicon-32x32.png">



 <link rel="stylesheet" href="../assets/css/font-awesome/css/font-awesome.min.css">
 <link rel="stylesheet" href="../assets/css/bootstrap.min.css" >
 <link rel="stylesheet" href="../assets/css/datepicker.css" >
 <link rel="stylesheet" href="../assets/css/select2.min.css">
 <link rel="stylesheet" href="../assets/css/intlTelInput.css">
<link rel="stylesheet" href="../assets/css/bootstrap-switch.min.css">


<link rel="stylesheet" href="../assets/css/css/css/cropper.min.css" type="text/css" />


        <link rel="stylesheet" href="../assets/lobibox/css/lobibox.css">  
        <link rel="stylesheet" href="../assets/lobibox/css/animate.css">    

<link rel="stylesheet" href="../assets/css/bootstrap-sortable.css">
<link rel="stylesheet" href="../assets/timedropper/css/timedropper.min.css"> 


        <link rel="stylesheet" type="text/css" href="../assets/Perspective/css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="../assets/Perspective/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="../assets/Perspective/css/component.css" /> 

  
 

<link rel="stylesheet" href="../assets/dhtmlx/css/dhtmlxscheduler.css">   

 <link rel="stylesheet" href="../assets/css/style_004.css?v={random number/string}">

        <script src="../assets/Perspective/js/modernizr.custom.25376.js"></script>
    </head>
    <body>

        <div id="perspective" class="perspective effect-airbnb">
            <div class="container cust_bk" style="width: 100%;">
                <div class="wrapper"> 

                 <div class="show_me_byad" id="show_this_s">
                             
                                <div class="form-group for_g_G" style="">
                                    <div  class="my_class" data-toggle=""> 
                                <img id="loged_in_image"  src="<?php echo $image; ?>"  class="user-image" alt="User Image"> 
                                <h1 class=" "><?php echo  $ma_name;?></h1>
                                <p class="  brts"><?php echo  $email;?></p>
                            </div>
                                </div>

                                <div class="form-group bor__top_" style="">
                                    <div class="col-sm-2 disp_c">
                                                                                  
                                           <a href="profile.php" class="btn btn-default btn-sm" id="hide_logoutphp_h"> profile </a>
                                    </div>
                                     <div class="col-sm-offset-6 col-sm-3 disp_c">
                                                                                  
                                           <a href="logout.php" class="btn btn-default btn-sm" id="hide_logoutphp_h"> logout </a>
                                           
                                    </div>
                                </div>
                                

  
                 </div>

<span id="my_zxid" class="hidden" did="<?php echo $idxd; ?>" style="display: none ;"></span>


                    <div class="codrops-top clearfix" show="0">
                    
                    <div class="row cust_top_menu">
                        <div class="col-md-1" style="text-align: left;"> <i class="fa fa-bars menu_ic"  id="showMenu"  aria-hidden="true"></i></div>
                        <div class="col-md-offset-9 col-md-2" show="0" id="show-prff"> 
                         <img src="<?php echo $image; ?>"  class="user-image-n" id="user_image" alt="User Image"> 
                                <span class="" id="my_name_yar"><?php echo  $ma_name;?></span>
                                <i class="fa fa-angle-left crossRotate" id="fodqwe" aria-hidden="true"></i>

                        </div>
                    </div>
                    </div>

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

      echo '<span id="main_my_zxid" class="hidden" did="'.$org_id_pa.'" style="display: none ;"></span>';

      if(  $sz_st09 == 0 ) {


        
  
}



?>
