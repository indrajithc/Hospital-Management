
<?php 

/*

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



*/


ob_start();
session_start();

if( !(empty($_SESSION['do']) || empty($_SESSION['pa']))   ) {

	do_exit();

}


function do_exit() {
	
	echo '<script type="text/javascript">location.href = "index.php";</script>';
	exit;
}







if(!isset($_POST['id'])){
	
	do_exit();
} 




if(!isset($_POST['did'])){
	
	do_exit();
}



if(!isset($_POST['user'])){
	
	do_exit();
}



if(!isset($_POST['path'])){
  
  do_exit();
}




if(!isset($_POST['key'])){
  
  do_exit();
}





try {
	require_once('includes/db.php');
	$a = new Database();

}catch (Exception $e){

} 


$id = $_POST['id'];
$did = $_POST['did'];
$table = $_POST['user'];
$path = $_POST['path'];


$in_ot = 0;
if($_POST['key'] == '0'){
  
  $key = uniqid('', true).'-'.time();
  $in_ot = 0;

} else {

  $key = $_POST['key'];
  $in_ot = 1;

}


// echo "$id <br> $did <br> $table <br> $path <br> $key";




       $url = $_SERVER['REQUEST_URI']; //returns the current URL
$parts = explode('/',$url);
$dir = $_SERVER['SERVER_NAME'];
for ($i = 0; $i < count($parts) - 1; $i++) {
 $dir .= $parts[$i] . "/";
} 




$ma_name = "patient";
$idxd = "";
$image = "assets/images/default.png";
$email = "";

if( $table == 'd')
	$query = " SELECT * FROM patient_details pd LEFT JOIN patient p ON p.patient_details_id= pd.id  WHERE p.id=  ".$did."  ";

if( $table == 'p')
	$query = " SELECT * FROM doctor WHERE id=  ".$id."  ";

 

$result_view_class = $a->display($query);


foreach($result_view_class as $value) {

	$ma_name=$value['fname']." ".$value['lname'];    
	$email = $value['email'];
 
		if(!is_null($value['image']) && $table == 'd' && file_exists("patient/images_/".$value['image']))
			$image = "http://".$dir."patient/images_/".$value['image'];
		if(!is_null($value['image']) && $table == 'p' && file_exists("doctor/images_/".$value['image']))
			$image = "http://".$dir."doctor/images_/".$value['image'];

	// echo  "http://".$dir."patient/images_/".$value['image'];
	$idxd = $value['id']; 

}





if($in_ot == 0)
if($table == 'p')
	$query = 'INSERT INTO `call_log` ( `doctor_id`, `patient_id`, `patient_doctor`, `description`,   `delete_status` ) VALUES (  "'.$id.'",  "'.$did.'", "1", "'.$key.'",     "0" )';




if($in_ot == 0)
if($table == 'd')
	$query = 'INSERT INTO `call_log` ( `doctor_id`, `patient_id`, `patient_doctor`, `description`,   `delete_status` ) VALUES (   "'.$id.'",  "'.$did.'", "0", "'.$key.'",     "0")';


 	if ($a->execute_data($query)) {
 		echo '<!-- success -->';
 	}





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

	<link rel="stylesheet" href="assets/css/intlTelInput.css">

	<style type="text/css">

		html {
               /*height: 100%;
               */
               overflow: hidden;
           }


           html { 
             background: url('assets/img/bg-9-full.jpg') no-repeat center center fixed; 
             -webkit-background-size: cover;
             -moz-background-size: cover;
             -o-background-size: cover;
             background-size: cover; 

             overflow-x: hidden;	
           }


           body{
           	height: 100%;
           	margin: 0;
           	padding: 0;
           	min-height: 100%;
           	font-family: 'Varela Round', sans-serif;

           	position: fixed;
           	left: 0px;
           	right: 0px;
           	top: 0px;
           	bottom: 0px;
           	background: transparent !important;
           }


           #localVideocontainer {
           	/* position: absolute;*/
           	top: 0;
           	bottom: 36px;
           	left: 0;
           	z-index: 20;
           	overflow: hidden;
           	border-right: 1px solid #e6eaed;
           }


           #remoteVideos, #localVideocontainer {
           	display: inline-block;
           }

           #localVideocontainer {
           	padding-top: 20px;
           }
           #localVideocontainer .name {
           	background: #1ee90066;
           	color: #005de9;
           	padding: 20px 20px;
           	text-align: center;
           }
           #localVideocontainer .name a {
           	color: #005de9;
           	font-family: 'Varela Round', sans-serif;
           	text-decoration: none;
           }
           #localVideocontainer .inner {
           	padding: 0px;
           }
            #remoteVideos { /*
                margin-left: 400px;
                margin-left: 270px;
                margin-top: 30px;*/
                margin-top: 1px;
                width: 100%;
                text-align: center;
            }
            #localVideo {
            	height: 155px;
            	padding-top: 10px;
            	z-index: 30px;
            }


            .options {
            	margin: 5px;
            	padding-bottom: 15px;
            	border-bottom: 1px solid #efefef;
            }
            .message {
            	background: #1ee90066 !important;

            	color: #005de9;
            	text-align: center;
            	font-weight: normal;
            }
            .message a {
            	text-decoration: none;
            	font-weight: bold;
            	color: #005de9;
            }
            .volume_bar {
            	position: absolute;
            	width: 5px;
            	height: 0px;
            	right: 0px;
            	bottom: 0px;
            	background-color: #FF6900;
            	z-index: 30;
            }

            #remoteVideos > video {
            	width: 100%;
            }

            .my_body {

            	margin-top: 80px !important;
            	/*padding: 0px 5px 0px 5px;*/
            	margin: 0px 5px 0px 5px;
            }

            .main_head {


            	position: absolute;
            	right: 0px;
            	left: 0px;
            	height: 60px;
            	top: 0px;

            	background-color: rgba(158, 255, 165, 0.44);
            }

            .name {
            	text-align: center;
            	padding: 20px;
            }

            .for_mob {
            	position: absolute;
            	border: none;
            	width: 100px;
            	height: 100px;
            	bottom: 75px !important;
            	top: inherit!important;
            	right: 45px;
            	left: inherit!important;
            }

            .nae_new_row {
            	margin: 1px !important;
            }

            #remoteVideos>video {
            	max-height: 500px;
            }

            .togg_class {
            	display: block;
            	position: absolute;
            	bottom: -20px;
            }

            .clas_green {
            	color: #1BFB00;
            }

            .clas_green_of {
            	color: #265E00;
            }


            .clas_green1 {
            	background-color: #1BFB00;
            }

            .clas_green_of1 {
            	background-color: #FF0010;
            }

            .clas_green1:hover {
            	background-color: #5EFF4B;
            }

            .clas_green_of1:hover {
            	background-color: #F9616A;
            }

          /*

            #remoteVideos video {
                height: 100%;
                display: inline-block;
                margin-left: 10px;
            }

 


            */










  div.angrytext {
 font-size:70px;
 font-weight:bold;
 color:#4794D3;
 width:300px;
 margin:90px auto;

 -webkit-animation: jump 1.5s ease 0s infinite normal ;
 animation: jump 1.5s ease 0s infinite normal ;
}

@-webkit-keyframes jump {
  0%{
	-webkit-transform: translateY(0);
	transform: translateY(0);
  }
  20%{
	-webkit-transform: translateY(0);
	transform: translateY(0);
  }
  40%{
	-webkit-transform: translateY(-30px);
	transform: translateY(-30px);
  }
  50%{
	-webkit-transform: translateY(0);
	transform: translateY(0);
  }
  60%{
	-webkit-transform: translateY(-15px);
	transform: translateY(-15px);
  }
  80%{
	-webkit-transform: translateY(0);
	transform: translateY(0);
  }
  100%{
	-webkit-transform: translateY(0);
	transform: translateY(0);
  }
}

@keyframes jump {
  0%{
	transform: translateY(0);
  }
  20%{
	transform: translateY(0);
  }
  40%{
	transform: translateY(-30px);
  }
  50%{
	transform: translateY(0);
  }
  60%{
	transform: translateY(-15px);
  }
  80%{
	transform: translateY(0);
  }
  100%{
	transform: translateY(0);
  }
}














	.image_show_c {
		width: 200px;
		height: 200px;
		border-radius: 50%;
	}

	.meain_shob {
		padding-top: 30px;
	}

        </style>


        <script type="text/javascript" src="assets/js/jquery-1.11.3.min.js"></script>



        <script src="https://simplewebrtc.com/latest-v2.js"></script> 
    </head>

    <body  > 
    	<!-- body ====================================== -->
    	<!-- body ====================================== -->
    	<!-- body ====================================== -->

    	<div class="div_wait_call" id="div_wait_call" path="<?php echo $path ; ?>"  >



    		
    	<center>
      <?php if($in_ot == '0') { ?>
    	    <section class="content">
    	    	<div class="meain_shob">
    	     		<div class='angrytext' ><img class="image_show_c" src="<?php echo $image; ?>"></div>
    	    		
    	     		<div class="col-md-" style="width: 300px;">
    	     			<center>
    	     				
    	     				<button class="col-sm-3 btn btn-danger btn-lg id_end_th" id="" path="<?php echo $path;?>" > end </button>
    	     				<button class="col-sm-offset-1 col-sm-3 btn btn-lg clas_green" id="mic1" status="1" > <i style="color: white;" class="fa fa-microphone  "></i>  </button>
    	     				<button class="col-sm-offset-1  col-sm-3 btn  btn-lg clas_green"  id="vid1"  status="1"> <i style="color: white;"  class="fa fa-video-camera "></i> </button>
    	     			</center>
    	     		</div>

    	    	</div>
    	    </section>

      <?php  } else if( $in_ot == '1') { ?>


          <section class="content">
           <!--  <div class="meain_shob">
              <div class='angrytext' ><img class="image_show_c" src="<?php echo $image; ?>"></div>
              
              <div class="col-md-" style="width: 400px;">
                  -->
                <center>
                  <button class="  btn btn-success btn-lg id_end_th" id="" style="margin-top: 30px;" path="<?php echo $path;?>" > end </button>
                  </center>

<!--
                  <button class="col-sm-offset-1 col-sm-3 btn btn-lg clas_green" id="mic1" status="1" > <i style="color: white;" class="fa fa-microphone  "></i>  </button>
                  <button class="col-sm-offset-1  col-sm-3 btn  btn-lg clas_green"  id="vid1"  status="1"> <i style="color: white;"  class="fa fa-video-camera "></i> </button>
                </center>
              </div>

            </div> -->
          </section>

      <?php }  ?>

    	  </center>




    	</div>
    	<div id="div_in_call"  style="display: none;">
    		

    		<div class="main_head" >

    			<div class="row">
    				<div class="col-md-2">
    					<div class="name">
    						<a href="index.php"><?php  echo SYSTEM_NAME; ?></a>
    					</div>


    				</div>
    				<div class="col-md-offset-8 col-md-2">

    	     				<button class="col-sm-4 btn btn-danger  id_end_th" id="" style="padding: 3px; margin: 3px;"  path="<?php echo $path;?>" > end </button>
    					


    				</div>
    			</div>

    		</div>

    		<div class="my_body">

    			<div class="row nae_new_row" id="myad_fot_this" user_name= <?php echo 'name'; ?>  user_id= <?php echo 'id'; ?> key="<?php echo $key; ?>">   
    				<div class="col-md-2" id="localVideocontainer">

    					<div class="inner">

    						<div id="localVolume" class="volume_bar">

    						</div>

    						<video id="localVideo">

    						</video>


    						<div class="options">
    							<a class="pure-button" href="#">
    								<i id="mic" status="1" class="fa fa-microphone clas_green"></i> 
    							</a>
    							<a class="pure-button" href="#" style="padding-left :20px">
    								<i id="vid"  status="1" class="fa fa-video-camera clas_green"></i>
    							</a>

    						</div>
    					</div>

    				</div>

    				<div class="  col-md-10">

    					<div class="message" id="medsageT0cnctthis"><p><samp style="padding:5px;"></samp><?php  echo "$ma_name"; ?> </p>
    						<!-- <p>You are now connected with  Anjana Mis </p>-->
    					</div>

    					<div class="" id="remoteVideos">


    						<div id="remoVolume" class="volume_bar"></div>

    					</div>



    				</div>
    			</div>






    		</div>



    	</div>



    	<!-- body ====================================== -->
    	<!-- body ====================================== -->
    	<!-- body ====================================== -->






    	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script> 

    	<script type="text/javascript" src="assets/js/jquery.validate.js"></script> 


    	<script type="text/javascript">
    		$(document).ready( function (e) {




    			/*  js =========================================*/
    			/*  js =========================================*/
    			/*  js =========================================*/

    			var room = $('#myad_fot_this').attr('key');



    			$user_details = {one:'one', 
    			user_name:$('#myad_fot_this').attr('user_name')

    		};


    		var webrtc = new SimpleWebRTC({
		                 // the id/element dom element that will hold "our" video
		                 localVideoEl: 'localVideo',
		                // the id/element dom element that will hold remote videos
		                remoteVideosEl: 'remoteVideos',
		                // immediately ask for camera access
		                autoRequestMedia: true,
		                debug: false,
		                detectSpeakingEvents: true,
		                autoAdjustMic: false,

		                nick: $user_details


		            });

    		webrtc.on('readyToCall', function () {

    			$('#remoteVideos').empty();
    			$('#remoteVideos').html('<div id="remoVolume" class="volume_bar"></div>');



    			webrtc.joinRoom(room);
    		});







    		webrtc.on('videoAdded', function (video, peer) {

          $('#div_wait_call').css('display','none');
          $('#div_in_call').css('display','block');

    			console.log('videoAdded', peer.nick);





    			call_taken ();
    		});




    		webrtc.on('videoRemoved', function (video, peer) {

    			console.log('video removed ', peer);
    			var remotes = document.getElementById('remotes');
    			var el = document.getElementById(peer ? 'container_' + webrtc.getDomId(peer) : 'localScreenContainer');
    			if (remotes && el) {
    				remotes.removeChild(el);


    			}
    			close_me (); 
    		});



    		window.onbeforeunload = closingCode;


    		function closingCode(){

    		
    			close_me (); 
    			webrtc.stop();
    			return null;

    		}



    		/******************************* cust *****************************/

    		webrtc.on('volumeChange', function (volume, treshold) {
    			showVolume($('#localVolume'), volume);
    		});
    		webrtc.on('channelMessage', function (peer, label, data) {
    			if (data.type == 'volume') {
    				showVolume($('#remoVolume'), data.volume);
    			}
    		});


    		function showVolume(el, volume) {
    			if (!el) return;
		                if (volume < -45) { // vary between -45 and -20
		                	el.css('height','0px');
		                } else if (volume > -20) {
		                	el.css('height','100%');
		                } else {
		                	el.css('height', '' + Math.floor((volume + 100) * 100 / 25 - 220) + '%');
		                }
		            }















		            $('#mic').click( function() {

		            	if($(this).attr('status') == '1') {


		            		webrtc.mute();

		            		$(this).attr('status', '0');
		            		$(this).removeClass('clas_green');
		            		$(this).addClass('clas_green_of');
		            	} else if($(this).attr('status') == '0') {


		            		webrtc.unmute();


		            		$(this).attr('status', '1');
		            		$(this).removeClass('clas_green_of');
		            		$(this).addClass('clas_green');

		            		
		            	}
		            }); 



		            $('#vid').click( function() {

		            	if($(this).attr('status') == '1') {


		            		webrtc.pauseVideo();
		            		

		            		$(this).attr('status', '0');
		            		$(this).removeClass('clas_green');
		            		$(this).addClass('clas_green_of');
		            	} else if($(this).attr('status') == '0') {


		            		webrtc.resumeVideo();


		            		$(this).attr('status', '1');
		            		$(this).removeClass('clas_green_of');
		            		$(this).addClass('clas_green');

		            		
		            	}
		            }); 



   $('#mic1').click( function() {

		            	if($(this).attr('status') == '1') {


		            		webrtc.mute();

		            		$(this).attr('status', '0');
		            		$(this).removeClass('clas_green1');
		            		$(this).addClass('clas_green_of1');
		            	} else if($(this).attr('status') == '0') {


		            		webrtc.unmute();


		            		$(this).attr('status', '1');
		            		$(this).removeClass('clas_green_of1');
		            		$(this).addClass('clas_green1');

		            		
		            	}
		            }); 



		            $('#vid1').click( function() {

		            	if($(this).attr('status') == '1') {


		            		webrtc.pauseVideo();
		            		

		            		$(this).attr('status', '0');
		            		$(this).removeClass('clas_green1');
		            		$(this).addClass('clas_green_of1');
		            	} else if($(this).attr('status') == '0') {


		            		webrtc.resumeVideo();


		            		$(this).attr('status', '1');
		            		$(this).removeClass('clas_green_of1');
		            		$(this).addClass('clas_green1');

		            		
		            	}
		            }); 



		            webrtc.on('audioOn', function () {

		            });
		            webrtc.on('audioOff', function () {

		            });
		            webrtc.on('videoOn', function () {

		            });
		            webrtc.on('videoOff', function () {

		            });




		            cnagne_wind();

		            $(window).on('resize', function () {
		            	cnagne_wind();
		            });

		            function cnagne_wind () {
		            	$('#localVideocontainer').toggleClass('for_mob', $(window).width() < 999);
		            	$('.options').toggleClass('togg_class', $(window).width() < 999);


		            }







		            $('.id_end_th').click( function() {

		            			close_me (); 
		            });


		            $(window).bind('beforeunload', function(){
		              close_me ();
		            });

		            function close_me () {

		            	$My_user_name = $('#myad_fot_this').attr('user_name');

		            	$.post('ajax.php',{action:'endTheVidoCall',
		            		id:<?php echo $id; ?>, 
		            		did:<?php echo $did; ?>,
		            		table: '<?php echo $table; ?>',
		            		key:'<?php echo $key; ?>'

		            	},function(response){
		            		console.log('rrrrrrrrrrrr'+response);

		            	});


		            	window.location = $('.id_end_th').attr('path');
		            }



		            function call_taken () {
		            	$.post('ajax.php',{action:'takTheVidoCall',
		            		id:<?php echo $id; ?>, 
		            		did:<?php echo $did; ?>,
		            		table: '<?php echo $table; ?>',
		            		key:'<?php echo $key; ?>'

		            	},function(response){
		            		console.log('success'+response);

		            	});

		            }



                setTimeout( function(){ 
                   $.post('ajax.php',{action:'check_call_acept',
                    id:<?php echo $id; ?>, 
                    did:<?php echo $did; ?>,
                    table: '<?php echo $table; ?>',
                    key:'<?php echo $key; ?>'

                   },function(response){
                    console.log('success'+response);

                    if(response.substring(0, 5) == "Error"){

                      console.log("error");
                      return;
                      
                    } else if (response.trim().length > 1) {
                     
                      response =$.parseJSON(response); 
                      // console.log(response);
                      response = response.success;
                      if (response > 1) {
                        close_me (); 

                      }
                       
                    }


                   });


                  }  , 60000 );




                ( function testCom() {

                  $.post('ajax.php',{action:'check_call_acept_time_out',
                   id:<?php echo $id; ?>, 
                   did:<?php echo $did; ?>,
                   table: '<?php echo $table; ?>',
                   key:'<?php echo $key; ?>'

                  },function(response){
                 //  console.log('success'+response);

                   if(response.substring(0, 5) == "Error"){

                     console.log("error");
                     return;
                     
                   } else if (response.trim().length > 1) {
                    
                     response =$.parseJSON(response); 
                     // console.log(response);
                     response = response.success;
                     if (response > 1) {
                       close_me (); 

                     }
                      
                   }


                    setTimeout(testCom, 100)


                  });


                })();
		            /*  js =========================================*/
		            /*  js =========================================*/
		            /*  js =========================================*/
		        });

		    </script>

		</body>
		</html>
