<?php
ob_start();
session_start();
if( empty($_SESSION['ph']) ) {
  $_SESSION['loc'] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  echo '<script type="text/javascript">location.href = "../index.php";</script>';
  exit('Please login');
}

 define( 'master', $_SESSION['ph']);

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

 
 $ma_name = "user";
  $image = "../assets/images/default.png";
 $query = " SELECT * FROM pharmacist  WHERE email= '".$_SESSION['ph']."' ";
 $result_view_class = $a->display($query);
 
      $idxd = 0; 
       foreach($result_view_class as $value) {
       
        $ma_name=$value['fname']." ".$value['lname'];       
        $image=$value['image']; 
        if(!is_null($image))  {
          $image = "http://".$dir."pharmacist/images_/".$image;

        }  
          $idxd = $value['id'];
      }
      
      
      ?>


<!DOCTYPE html><html class="menu">
<html>

<head>

 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>DASystem </title>
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
        
 <link rel="stylesheet" href="../assets/css/style_005.css?v={random number/string}">



        
</head>
</head>
<body class="">

 <div class="one_clas_hover_mob toched_movbile"></div>

  <nav class="main-menu overflow_scrol db_s_child">



    <div>
      <a class="logo" href="#">
      </a> 
    </div> 
    <div class="settings">

    </div>

    <ul>
      <li>
        <ul>

          <li>                                   
            <a href="index.php">
              <i class="fa fa-tachometer" aria-hidden="true"></i>

              <span class="nav-text">Dashboard</span>
            </a>
          </li>   





      <li>                                 
        <a href="medicine.php">
         <i class="fa fa-medkit" aria-hidden="true"></i>
         <span class="nav-text">Medicines</span>
       </a>
     </li>   

 
 


      <li>                                 
        <a href="prescriptions.php">
         <i class="fa fa-file-text" aria-hidden="true"></i>
         <span class="nav-text">Prescriptions</span>
       </a>
     </li>   

 
 
   
      <li>                                 
        <a href="history.php">
        <i class="fa fa-history" aria-hidden="true"></i>
         <span class="nav-text">History</span>
       </a>
     </li>   

  
   
      <li>                                 
        <a href="password.php">
      <i class="fa fa-unlock-alt" aria-hidden="true"></i>
         <span class="nav-text">Password</span>
       </a>
     </li>   

 
 
   
    
    

<span id="my_zxid" class="hidden" did="<?php echo $idxd; ?>" style="display: none ;"></span>


  </ul>

</li>
<li>
 

</li>
<li>
  <ul class="logout">
    <li class="darkerlishadow">
     <a href="logout.php">
       <i class="fa fa-sign-out" aria-hidden="true"></i>
       <span class="nav-text">
        sign-out 
      </span>

    </a>
  </li>  
</ul>
</li>

</ul>
</nav>

<div class="margin_top_staus_bar">

  <div class=" ">


    <div class="row_my">
      <div class="col-md-offset-8 col-md-4 base_here_x " id="cick_hover_he">
       <div class="image_base_image">
        <img id="loged_in_image" class="img-circle_logd" src="<?php echo $image ;?>">
      </div>
      <div class="  class_name_logd">
      
        <h1><?php  echo $ma_name; ?> </h1>
      </div>
    </div>
    <div class="col-md-offset-8 col-md-4 admin_main" id="cick_hover_me">


    </div>



  </div>

</div>

</div>
<div class="main_container_user">