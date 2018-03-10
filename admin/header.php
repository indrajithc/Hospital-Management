<?php
ob_start();
session_start();
if( empty($_SESSION['ad']) ) {
  $_SESSION['loc'] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  echo '<script type="text/javascript">location.href = "../index.php";</script>';
  exit('Please login');
}

 define( 'master', $_SESSION['ad']);

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
 $query = " SELECT * FROM admin   WHERE email= '".$_SESSION['ad']."' ";
 $result_view_class = $a->display($query);
 
      
       foreach($result_view_class as $value) {
       
        $ma_name=$value['fname']." ".$value['lname'];       
        
        if(!is_null($value['image']))  {
          $image = "http://".$dir."admin/images_/".$value['image'];

        } 
    
          
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
        
 <link rel="stylesheet" href="../assets/css/style_002.css?v={random number/string}">



        
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
            <a href="department.php">
              <i class="fa fa-sitemap" aria-hidden="true"></i>
              <span class="nav-text">department</span>
            </a>
          </li>   


          <li>                                 
            <a href="doctor.php">
             <i class="fa fa-user-md" aria-hidden="true"></i>
             <span class="nav-text">doctor</span>
           </a>
         </li>   



         <li>                                 
          <a href="patient.php">
           <i class="fa fa-wheelchair-alt" aria-hidden="true"></i>
           <span class="nav-text">patient</span>
         </a>
       </li>   



       <li>                                 
        <a href="nurse.php">
          <i class="fa fa-plus-square" aria-hidden="true"></i>
          <span class="nav-text">nurse</span>
        </a>
      </li>   



      <li>                                 
        <a href="pharmacist.php">
         <i class="fa fa-medkit" aria-hidden="true"></i>
         <span class="nav-text">pharmacist</span>
       </a>
     </li>   


     <li>              
       <i class="fa fa-hospital-o color_green" aria-hidden="true"></i>
       <span class="nav-text color_green"> hospital</span>


     </li>   


     <li class="darkerlishadow">
      <a href="appointments.php">
        <i class="fa fa-clock-o fa-lg"></i>
        <span class="nav-text">appointments</span>
      </a>
    </li>

    <li class="darkerli">
      <a href="blood.php">
        <i class="fa fa-tint" aria-hidden="true"></i>
        <span class="nav-text">blood bank</span>
      </a>
    </li>

    <li class="darkerli">
      <a href="payment.php">
        <i class="fa fa-money" aria-hidden="true"></i>
        <span class="nav-text">payment</span>
      </a>
    </li>

 

    <li class="darkerlishadowdown">
      <a href="bed.php">
<i class="fa fa-bed" aria-hidden="true"></i>
        <span class="nav-text">bed</span>
      </a>
    </li>




  </ul>

</li>
<li>

  <ul> 
   <li class=" ">
    <a href="noticeboard.php">
      <i class="fa fa-bell-o" aria-hidden="true"></i>
      <span class="nav-text">noticeboard</span>
    </a>
  </li>

 

  <li class="hidden">
    <a href="profile.php" class="admin">
      <i class="fa fa-user" aria-hidden="true"></i>
      <span class="nav-text">profile</span>
    </a>
  </li>

</ul> 

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