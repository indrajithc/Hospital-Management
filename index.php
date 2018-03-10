
<?php 



try {

  session_start();
  if(! empty($_SESSION['ad'])){
    echo '<script type="text/javascript">location.href = "admin/";</script>';
  } else if(! empty($_SESSION['do'])){
    echo '<script type="text/javascript">location.href = "doctor/";</script>';

  }else if(! empty($_SESSION['ph'])){
    echo '<script type="text/javascript">location.href = "pharmacist/";</script>';

  }else if(! empty($_SESSION['pa'])){
    echo '<script type="text/javascript">location.href = "patient/";</script>';


  }
     

} catch(Exception $e) {
  
}





try {
  require_once('includes/db.php');
  $a = new Database();
  
}catch (Exception $e){
  
} 









  $email = "";
  $code = "";
  $codez = "";
  $status = 0;
try {

  if (isset($_GET['e']) && isset($_GET['c']) ) {
    $email = $_GET['e'];
    $code = $_GET['c'];
     $query = ' SELECT code FROM temp_verification   WHERE  email = :email and code=:code  ';
      if ( $result_view_class = $a->display($query, array(':email' => $email, ':code' => $code )  )) {
        $status = 9;   
          
           foreach($result_view_class as $value) {
              $codez = $value['code'];    
            }

            if($codez ==  $code) {

              $query = "UPDATE  `patient_details` SET `delete_status` = 0  WHERE `email` = :name_old AND `delete_status`= 1 ;";
              
              if ( $a->execute_data($query, array( ':name_old' => $email )  )) {
                
               

                
                $query = 'DELETE FROM `temp_verification` WHERE  email = :email ';
                if($a->display($query, array(':email' => $email   )  ) ) {

 
                } 

                    $status = 1; 
                do_this ( $status );


              } else {
                do_this ( $status );
              }

            }  else {
                do_this ( $status );
              }
                
        
          
      } else {
    
    do_this ( $status );
  }

    


     
                  

                    

 

  } else {

    do_this ( $status );
  }




} catch (Exception $e) {


}






function do_this ( $status ) {

?>
<!doctype html>
<html>
<head>

 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title><?php  echo SYSTEM_NAME; ?> </title>
 <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">


 <link rel="stylesheet" href="assets/css/font-awesome/css/font-awesome.min.css">
 <link rel="stylesheet" href="assets/css/bootstrap.min.css" >
 <link rel="stylesheet" href="assets/css/bootstrap-datepicker.min.css" >
 <link rel="stylesheet" href="assets/css/intlTelInput.css">
 <link rel="stylesheet" href="assets/css/style_001.css?v={random number/string}">
</head>

<body class=""> 

<?php if($status ==0) { ?>
  <div class="cover" id="i_am_the_body">
    <div class="jumbotron vertical-center back_transparent"> <!-- 
      ^--- Added class  -->
      <div class="container">

        <div class="row">
          <div class="col-md-5 ">
            <div class=" white_blur">
              <div class="row">
                <div class="col-md-offset-3 col-md-6">
                  <img  class="icon_image" src="assets/img/min-icon.png"   > 
                </div>
              </div>
              <div class="row basic_hedding">
                <h2>Our Medical Service</h2>
              </div>
              <div class="ro w banner-content">
                <ul class="banner-ico-list">
                  <li>
                    <div class="iconic color-primary"><i class="fa fa-user-md "></i></div>
                  </li>
                  <li>
                    <div class="iconic color-primary"><i class="fa fa-ambulance"></i></div>
                  </li>
                  <li>
                    <div class="iconic color-primary"><i class="fa fa-wheelchair"></i></div>
                  </li>
                  <li>
                    <div class="iconic color-primary"><i class="fa fa-medkit"></i></div>
                  </li>
                </ul>
              </div>
              <div class="row ">
                <p class="basic_para">DA Healthcare is a leading integrated healthcare delivery service provider in India. The healthcare verticals of the company primarily comprise hospitals, diagnostics and day care specialty facilities. Currently, the company operates its healthcare delivery services in India, Dubai, Mauritius and Sri Lanka with 45 healthcare facilities (including projects under development), approximately 10,000 potential beds and 314 diagnostic centres.
                </p>
              </div>


            </div>

            
          </div>
          <div class="col-md-offset-1 col-md-6 padding_top_100">


            <div class="login-page">
              <div class="reg_user">
               <div class="  div_bg_img">
                <p class="click_me_account scrollRegClick">new user  </p>
                <i class="fa fa-user-plus click_me_account_icon scrollRegClick" aria-hidden="true"></i>

              </div>
            </div>
            <div class="form">
              
              <form class="login-form" id="login_form">
                <input type="text" name="aa1" placeholder="username" id="user_name" />
                <input type="password" name="aa2" placeholder="password" id="user_password" />
                <button>login</button>
                <p class="message">Forgotten account? <a href="Forgot_password/">Reset password</a></p>


              </form>
            </div>
          </div>







        </div>


      </div>
      <div class="row div_register" id="dynamictabstrp">
        <div class="  col-md-6">
          <div class="reg_form">
            <div class="panel panel-primary">
              <div class="panel-body">
                <form  id="add_new_user_self">
                  <div class="form-group">
                    <h3 class="custom-hedder-3">Create account</h3>
                  </div>

                  <div class="form-group col-xs-6">
                    <label class="control-label" for="signupName">Your first name</label>
                    <input id="fname" name="fname" type="text" maxlength="50" class="form-control  input-lg">
                  </div>

                  <div class="form-group col-xs-6 has-feedback">
                    <label class="control-label"  for="signupName">Your last name</label>
                    <input id="lname" name="lname" type="text" maxlength="50" class="form-control  input-lg" aria-describedby="inputSuccess4Status">
          
</div>


<div class="form-group has-feedback col-xs-12">
  <label class="control-label" for="signupEmail">Email</label>
  <input id="signupEmail" name="signupEmail" type="email" maxlength="50" class="form-control input-lg">
   <span class="glyphicon  form-control-feedback" aria-hidden="true"></span>
   <span class="and_user_msg sr-only"></span>  

</div>



<div class="form-group  col-xs-12">
  <label class="control-label" for="signupPassword">Password</label>
  <input id="signupPassword" name="pass1" type="password" maxlength="25" class="form-control input-lg" placeholder="at least 6 characters" length="40"><span id="passstrength"></span>
</div>
<div class="form-group  col-xs-12">
  <label class="control-label" for="signupPasswordagain">Password again</label>
  <input id="signupPasswordagain" name="pass2" type="password" maxlength="25" class="form-control input-lg">
</div>

<div class="form-group  col-xs-12">
  <p class="form-group basic_para">By creating an account, you agree to our <a href="#">Terms of Use</a> and our <a href="#">Privacy Policy</a>.</p>
</div>

<div class="form-group  col-xs-12">
  <button id="signupSubmit" type="submit" class="btn btn-success btn-block btn-lg" id="hello_add_me">Create your account</button>

</div>
<div class="form-group  col-xs-12">
  <p class="form-group basic_para">If you are already a user , <a href="#" id="move_to_to_for_reg"> please login</a>  </p>
</div>

<hr> 
</form>
</div>
</div>

</div>

</div>



<div class="col-md-6">
 <img  class="selectvie_back_image" src="assets/img/img-1.png"   > 
</div>

</div>      





</div>





</div>
</div>





</div>



<div style="width:100%; height:100%; background: rgba(233,233,233, .5);color: #666666; min-height: 950px; padding-bottom: 100px; display: none;" id="actual_hidden_form"><div class="pen-title"> <h1  id="id94969377701" > Login Form</h1><span>Login to <?php  echo SYSTEM_NAME; ?></span> </div> <!-- Form Module--> <div id="id94969377771" class="module form-module" style="border-top: 5px solid green;"> <div class="toggle"  id="id94969377772"  style="background: green; z-index: 9 !important;"><i style="color: white;padding-top: 5px;font-size: 20px;" class="fa fa-home" aria-hidden="true"></i>
  </div> <div class="form" style="margin-bottom: 0px;"> <h2  id="id94969377773" style="color: green;">Login to your account</h2> 

<img src="assets/img/img-1.png" class="image_dynamic_here" />
<form id="login_form_dyn"> <input name="aa1" placeholder="Username" id="user_name_dyn" value="" type="text"> <input name="aa2" placeholder="Password" id="user_password_dyn" type="password"> <button id="id94969377774" style="background: green;">Login</button> </form> </div> <div class="cta"><a id="id94969377711" href="Forgot_password/">Forgot your password?</a></div> </div> </div>





<div style="width:100%; height:100%; background: rgba(233,233,233, .5);color: #666666; min-height: 950px; padding-bottom: 100px; display: none;" id="actual_hidden_form_success"><div class="pen-title"> <h1  id="id294969377701" > Thank you</h1><span><?php  echo SYSTEM_NAME; ?></span> </div> <!-- Form Module-->

<div class="row">
  
 <div id="id294969377771" class="col-md-offset-3 col-md-6  "  > <div class="form" style="margin-bottom: 0px;border-top: 5px solid #9d00ff;max-width: 100%;"> <h2  id="id294969377773" style="color: #9d00ff;">Verify your email address.</h2>  
<div>
  <p> If you don't verify your email address, you may not be able to access <?php  echo SYSTEM_NAME; ?>. verifying that address by signing. </p>
</div> <button id="id294969377774" style="background: #9d00ff;" mainl_dom="."> Go To Mail</button>   </div> </div>

</div>
 </div>






<div style="width:100%; height:100%; background: rgba(233,233,233, .5);color: #666666; min-height: 950px; padding-bottom: 100px; display: none;" id="actual_hidden_form_success00000"><div class="pen-title"> <h1  id="id294969377701" > Thank you</h1><span><?php  echo SYSTEM_NAME; ?></span> </div> <!-- Form Module-->
<div class="row">
  
  <div class="col-md-offset-5 col-md-3">
         <div class="loader"></div>
  </div>

</div>
 </div>

<?php  } else if( $status == 1 ) { ?>




<div style="width:100%; height:100%; background: rgba(233,233,233, .5);color: #666666; min-height: 950px; padding-bottom: 100px; display: block;" id="actual_hidden_form_success"><div class="pen-title"> <h1  id="id194969377701" > Thank you</h1><span><?php  echo SYSTEM_NAME; ?></span> </div> <!-- Form Module-->

<div class="row">
  
 <div id="id194969377771" class="col-md-offset-3 col-md-6  "  > <div class="form" style="margin-bottom: 0px;border-top: 5px solid green;max-width: 100%;"> <h2  id="id194969377773" style="color: green;">Your account has been successfully verified.</h2>  
<div>
  <p>You are very important to us, all information received will always remain confidential. </p>
</div> <button id="id194969377774" style="background: green;"> Login Page</button>   </div> </div>

</div>
 </div>



<?php } else { ?>




<div style="width:100%; height:100%; background: rgba(233,233,233, .5);color: #666666; min-height: 950px; padding-bottom: 100px; display: block;" id="actual_hidden_form_success"><div class="pen-title"> <h1  id="id294969377701" > Error Occurred</h1><span><?php  echo SYSTEM_NAME; ?></span> </div> <!-- Form Module-->

<div class="row">
  
 <div id="id294969377771" class="col-md-offset-3 col-md-6  "  > <div class="form" style="margin-bottom: 0px;border-top: 5px solid #FF0E0E;max-width: 100%;"> <h2  id="id294969377773" style="color: #FF0E0E;">something not right.</h2>  
<div>
  <p> These error messages are generated by the remote web server and sent to your browser. If you see these, double-check the web page address you typed. If you clicked a link, the link was in error – or the page it points to has been removed. </p>
</div>   </div> </div>

</div>
 </div>



<?php }   ?>


<script type="text/javascript" src="assets/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="assets/js/intlTelInput.min.js"></script>
<script type="text/javascript" src="assets/js/javascript_001.js"></script>

</body>
</html>

<?php } ?>