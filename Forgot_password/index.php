<?php
  
try {

session_start();

session_destroy();

} catch (Exception $e){

}
//-------------------data base-----------------------//

try {
  require_once('../includes/db.php');
  $a = new Database();
  
}catch (Exception $e){
  
}
  $email = "";
  $code = "";
  $status = 0;
  if (isset($_GET['email']) && isset($_GET['code']) ) {
    $email = $_GET['email'];
    $code = $_GET['code'];

    $status = 1;
  }

?>

<!DOCTYPE html><html class="menu">
<html>

<head>

 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php  echo SYSTEM_NAME; ?> </title>
<link rel="shortcut icon" href="">
 <link rel="stylesheet" href="../assets/css/font-awesome/css/font-awesome.min.css">
 <link rel="stylesheet" href="../assets/css/bootstrap.min.css" >
 <link rel="stylesheet" href="../assets/css/bootstrap-datepicker.min.css" >
 <link rel="stylesheet" href="../assets/css/select2.min.css">
 <link rel="stylesheet" href="../assets/css/intlTelInput.css">
<link rel="stylesheet" href="../assets/css/bootstrap-switch.min.css">
<link rel="stylesheet" href="../assets/lobibox/css/lobibox.min.css">
 <link rel="stylesheet" href="../assets/css/style_0.css?v={random number/string}">
 
</head>
</head>
<body>

 <div class="container">
     <div class="row">
       
       <div class="col-md-offset-3 col-md-6">
           
     

<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->
<div class="pen-title">
  <a href="../index.php" id="system_name_big_sw"><h1 ><?php  echo SYSTEM_NAME; ?> </h1></a><span>Reset Password Form</span>
</div>
<!-- Form Module-->
<div class="module form-module">

    <div class=" class_defalt_hidden" id="reser_pass_1" 
<?php 
    if( $status == 0)
        echo ' style="display: block;"';
    else 
        echo ' style="display: none;"';

 ?>
    >
        <form>
            <div class="form " >
            <h2>Find Your Account</h2>
           
              <input type="text" name="aa1" placeholder="email" id="my_email_id" />

            </div>
            <div class="cta">

              <a class="btn button_a " href="../index.php">Back</a>
              <button class="btn">Search</button>
            </div>
        </form>
    </div>
  

    <div class=" class_defalt_hidden" id="reser_pass_2" style="display: none;">
        <form>
            <div class="form " >
            <h2 style="padding-bottom: 10px;">Reset Your Password</h2>
           <div style="text-align: center;padding: 5px;">
               
            <img src=" " class="image_dynamic_here" />
           </div>


              <div class="option_rest"> <input class="rdo_bt" type="radio" name="options" id="option1" autocomplete="off" checked> <i class="fa fa-envelope" aria-hidden="true"></i>
              <h1>Email me a link to reset my password</h1></div>
            </div>
            <div class="cta">

              <a class="btn button_a " id="back_secin" href="#">Back</a>
              <button class="btn">Get Me</button>
            </div>
        </form>
    </div>





    <div class=" class_defalt_hidden" id="reser_pass_3" 
<?php 
    if( $status == 1) {
        echo ' style="display: block;"';

        echo 'email="'. $email.'" ';

        echo ' code="'. $code.'" ';


    }
    else 
        echo 'style="display: none;"';



 ?>
    >
        <form>
            <div class="form " >
            <h2>Change Password</h2>
           
            <input type="password" id="pass1" placeholder="Password" name="pass1" />
 <span id="passstrength"></span>
            <input type="password" id="pass2" placeholder="Confirm Password" name="pass2" />

            </div>
            <div class="cta">
 
              <button class="btn" style="width: 100%;">Change</button>
            </div>
        </form>
    </div>






    <div class=" class_defalt_hidden" id="reser_pass_4" style="display: none;">
        <form>
            <div class="form " >
            <h2 style="padding-bottom: 10px;">Verification Link Expired</h2>
           

              <div class="option_rest"> 
              <h1 style="color: red;">It's also possible that the verification link has expired. We set the expiration time to be relatively short for your protection. We still have the account information </h1><h1 style="color: green;">GO BACK</h1></div>
            </div>
            <div class="cta">

              <a class="btn button_a " style="width: 100%;" id="id94969371772" href=".">Back</a>
              
            </div>
        </form>
    </div>




    <div class=" class_defalt_hidden" id="reser_pass_5" style="display: none;">
        <form>
            <div class="form " >
            <h2 style="padding-bottom: 10px;">Check your mail </h2>
           

              <div class="option_rest"> 
              <h1 style="color: #178ab4;"> An email with a verification link was just sent to Registered Email Address.
              </h1></div>
            </div>
            <div class="cta">

              <button class="btn" style="width: 100%;">Resend Link <i class="fa fa-circle-o-notch no_dispay rotating" id="show_me_5" aria-hidden="true" style=" "></i></button>
            </div>
        </form>
    </div>








 


 
</div>
         
     </div>

  </div>

 </div>






<script type="text/javascript" src="../assets/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery.validate.js"></script>




    <script type="text/javascript" src="../assets/js/resizeable.js"></script>
     
 


<script type="text/javascript" src="../assets/js/javascript_0.js"></script>

</body>
</html>

