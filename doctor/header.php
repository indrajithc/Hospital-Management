<?php
ob_start();
session_start();
if( empty($_SESSION['do']) ) {
  $_SESSION['loc'] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  echo '<script type="text/javascript">location.href = "../index.php";</script>';
  exit('Please login');
}

 define( 'master', $_SESSION['do']);

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

 
 $ma_name = "doctor";
$idxd = "";
$dpid= 0;
  $image = "../assets/images/default.png";
 $query = " SELECT * FROM doctor   WHERE email= '".$_SESSION['do']."' ";
 $result_view_class = $a->display($query);
 
      
       foreach($result_view_class as $value) {
       
        $ma_name=$value['fname']." ".$value['lname'];    
      $ma_name=$value['fname']." ".$value['lname'];     


$dpid= $value['department_id'];
        
              if(!is_null($value['image']) && file_exists("../doctor/images_/".$value['image'] ))  {
          $image = "http://".$dir."doctor/images_/".$value['image'];

        
        } 
    $idxd = $value['id']; 
          
      }
      







 function returnNoOfappointments($idd){
            global $a; 
            $count = 0;
             $query = " SELECT COUNT(*) AS count FROM `appointment` WHERE     NOW()  <=  time_from  AND  delete_status = 0 AND status = 0 AND  doctor_id=".$idd;
             $result_returnNoOfappointments = $a->display($query);
             
                  
           foreach($result_returnNoOfappointments as $value) {
           
            $count = $value['count'];     
        
          }
          
          return  $count ;
 
}




 function returnmax9appointments($idd){
            global $a; 
            $count = 0;
             $query = "SELECT  CONCAT( pd.fname,' ',pd.lname) AS patient , p.id AS pid,a.id AS aid, pd.image AS image,  DATE_FORMAT(a.time_from,'%d-%m-%Y') AS appointment_date,  DATE_FORMAT(a.time_from,'%r') AS time_from ,  DATE_FORMAT(a.time_to,'%r') AS time_to  FROM `appointment`a LEFT JOIN patient p ON a.patient_id = p.id LEFT JOIN patient_details pd ON p.patient_details_id = pd.id WHERE    NOW() <=  a.time_from  AND  a.delete_status=0 AND a.status =0 AND a.doctor_id = ".$idd."  ORDER BY a.time_from ASC LIMIT 9";
             $result_returnNoOfappointments = $a->display($query);
             
          return  $result_returnNoOfappointments ;
 
}



      
      ?>


<!DOCTYPE html><html class="" style="height: auto;">
<html>

<head>

 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title><?php echo SYSTEM_NAME;?> </title>
 <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicon-32x32.png">
 <link rel="stylesheet" href="../assets/css/font-awesome/css/font-awesome.min.css">
 <link rel="stylesheet" href="../assets/css/font-awesome/css/font-awesome-animation.min.css">
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
        
 <link rel="stylesheet" href="../assets/css/new/AdminLTE.css?v={random number/string}">
 <link rel="stylesheet" href="../assets/css/new/skin-black-light.css?v={random number/string}">
 <link rel="stylesheet" href="../assets/css/style_003.css?v={random number/string}">




 
</head>
<body class="skin-black-light sidebar-mini sidebar-collapse" style="height: auto;">

    <div class="wrapper" style="height: auto;">
        <header class="main-header">

            <a href="." class="logo">

                <span class="logo-mini">
                <img src="../assets/img/min-icon.png">
                </span>
                <span class="logo-lg">
                  <img src="../assets/img/basic_ico.png">
                </span>
            </a>
 
            <nav class="navbar navbar-static-top" role="navigation"> 
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <li class="dropdown messages-menu">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="cjek893457sdhj">
                                <i class="fa fa-envelope-o"></i>
                                <span class="label label-success id_show_this_messages0" >0</span>
                            </a>
                            <ul class="dropdown-menu"  >
                                <li class="header" >You have <span class="id_show_this_messages0">0</span> messages</li>
                                <li>
                                    <!-- inner menu: contains the messages -->
                                    <ul class="menu" id="id_show_this_messages1">
                          
                                        <!-- end message -->
                                    </ul>
                                    <!-- /.menu -->
                                </li>
                                <li class="footer"><a href="message.php">See All Messages</a></li>
                            </ul>
                        </li>
                        <!-- /.call-menu -->
 
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o  " id="show_ringi"></i> <!-- faa-ring animated -->
                                <span class="label label-warning no_of_notifi"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have <span class="no_of_notifi"> </span> call</li>
                                <li>
                                    <ul class="menu" id="call_here_this">
                                        
                                    </ul>
                                </li>
                                <li class="footer"><a href="video.php">View all</a></li>
                            </ul>
                        </li>
 
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-flag-o"></i>
                                <span class="label label-danger"><?php echo returnNoOfappointments($idxd);  ?> </span>
                            </a>




                            <ul class="dropdown-menu">
                                <li class="header">You have <?php echo returnNoOfappointments($idxd);  ?> appointments</li>
                                <li>
                                    <!-- Inner menu: contains the tasks -->
                                    <ul class="menu">



<?php    


    $tem_result = returnmax9appointments($idxd);


        foreach($tem_result as $value) {
           
            
  $image_temp = "../assets/images/default.png";
 if(!is_null($value['image'])) 
             if(file_exists("../patient/images_/".$value['image']) ) {
          $image_temp = "http://".$dir."patient/images_/".$value['image'];

        
        } 

            echo '
                                        <li> 
                                            <a href="#" class="notificationappointments" did="'.$value['pid'].'">
                                               <img src="'.$image_temp.'" class="w_h_40" >
                                               <div class="deta_wi">
                                                <h3 class="inline_here">
                            '.$value['patient'].'
                           
                          </h3>
                           <p class="font_9">'.$value['time_from'].' to '.$value['time_to'].' </p>
                            <p class="pull-right new_date">'.$value['appointment_date'].'</p>
                            </div>
                                                


                                            </a>

        <form name="photo" action="prescription.php" method="post" enctype="multipart/form-data" id="patient_id" class="hidden">
        <input type="text" name="id" class="hidden" value="'.$value['pid'].'" id="passvaluePo" />
        <input type="submit" name="upload" value="Upload" class="hidden" id="pass_value_here" />

    </form>

                                        </li>  
                                         
'  ;

        
        }


          ?>






                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="appointments.php">View all appointments</a>
                                </li>
                            </ul>




                        </li> 
                        <li class="dropdown user user-menu"> 
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                                <img src="<?php echo $image; ?>" id="user_image" class="user-image" alt="User Image"> 
                                <span class="hidden-xs" id="my_name_yar"><?php echo  $ma_name;?></span>
                            </a>
                            <ul class="dropdown-menu"> 
                                <li class="user-header">
                                    <img src="<?php echo $image; ?>"  class="img-circle" alt="User Image">
                                    <p><?php echo  $ma_name;?> <small> Doctor</small>
                                    </p>
                                </li>
                           
 
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li> 
                        <li>
                            <span style="padding: 20px"></span>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>



<span id="my_zxid" class="hidden" did="<?php echo $idxd; ?>" style="display: none ;"></span>

        <aside class="main-sidebar">

            <section class="sidebar">

                <div class="user-panel">
                    <div class="pull-left image">
                        <img id="loged_in_image" src="<?php echo $image; ?>"  class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo  $ma_name;?> </p> 
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
 
                <form action="#" method="get" class="sidebar-form">
     
                </form>

                <ul class="sidebar-menu">
                    <li class="header">MENU</li>
                    <li><a href="index.php"><i class="fa fa-link"></i> <span>dashboard</span></a></li>
                    <li class="active"><a href="medicine.php"><i class="fa fa-link"></i> <span>medicine</span></a></li>
                    <li><a href="schedule.php"><i class="fa fa-link"></i> <span>schedule</span></a></li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-link"></i> <span>patients</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="patient.php">patient</a></li>
                            <li><a href="appointments.php">appointments</a></li>
                        </ul>
                    </li>
                    <li><a href="nurse.php"><i class="fa fa-link"></i> <span>nurse</span></a></li>
                    <li><a href="blood.php"><i class="fa fa-link"></i> <span>blood</span></a></li>

                </ul>
            </section>
        </aside>





