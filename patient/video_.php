
<?php 




ob_start();
session_start();

if(empty($_SESSION['pa'])   ) {

	do_exit();

}


function do_exit() {
	
	echo '<script type="text/javascript">location.href = "index.php";</script>';
	exit;
}







try {
	require_once('../includes/db.php');
	$a = new Database();

}catch (Exception $e){

} 

  
           $url = $_SERVER['REQUEST_URI']; //returns the current URL
    $parts = explode('/',$url);
    $dir = $_SERVER['SERVER_NAME'];
    for ($i = 0; $i < count($parts) - 2; $i++) {
     $dir .= $parts[$i] . "/";
    } 

 
 

  $ma_name = "patient";
 $idxd = "";
   $image = "../assets/images/default.png";

  $query = " SELECT p.*,pd.fname, pd.lname, pd.image, pd.email FROM patient_details pd LEFT JOIN patient p ON p.patient_details_id = pd.id WHERE pd.email= '".$_SESSION['pa']."' ";
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
<!doctype html>
<html>
<head>


	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php  echo SYSTEM_NAME; ?> </title>
	<link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicon-32x32.png">


	<link rel="stylesheet" href="../assets/css/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css" >

	<link rel="stylesheet" href="../assets/css/intlTelInput.css">

	<style type="text/css">

		html {
               /*height: 100%;
               */
               overflow: hidden;
           }


           html { 
             background: url('../assets/img/bg-9-full.jpg') no-repeat center center fixed; 
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
            	background-color: #12acef;
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
            	max-height: 525px;
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


        <script type="text/javascript" src="../assets/js/jquery-1.11.3.min.js"></script>


 
    </head>

    <body  > 
    	<!-- body ====================================== -->
    	<!-- body ====================================== -->
    	<!-- body ====================================== -->

    	<div class="div_wait_call" id="div_wait_call" path=""  >



    		
    	<center> 
    	    <section class="content">
    	    	<div class="meain_shob">
    	     		<div class='angrytext' ><img class="image_show_c"  id="iser_id_tr" src=""></div>
    	    		
    	     		<div class="col-md-" style="width: 300px;">
    	     			<center>
    	     				
                  <button class="col-sm-offset-2 col-sm-4 btn btn-danger btn-lg id_end_th" id="" path="" > end </button>
    	     				<button class="col-sm-offset-2 com-m=sm-4 btn btn-success btn-lg id_answr_th" id="" path="" > answer </button>

    	     			</center>
    	     		</div>

    	    	</div>
    	    </section>


         <form name="photo" action="../video.php" method="post" enctype="multipart/form-data"   class="hidden ">


                      <input type="text" name="did" class="hidden" value="" id="passvaluePo" />
                     <input type="text" name="id" class="hidden" value="<?php echo $idxd ; ?>" id="passvaluePo1" />
                     <input type="text" name="user" class="hidden" value="d" id="passvaluePo2" />
                     <input type="text" name="path" class="hidden" value="http://192.168.1.103/Bproject/patient/video.php" id="passvaluePo3" />
                     <input type="text" name="key" class="hidden" value="0" id="passvaluePo4" />
                   
            <button class="btn"   id="submint_me_broi"><i class="fa fa-video-camera " aria-hidden="true"></i>    </button> 
           </form>

       


    	  </center>




    	</div>





    	<!-- body ====================================== -->
    	<!-- body ====================================== -->
    	<!-- body ====================================== -->

<audio id="audio1" style="display:none;"  loop>
<source src="../assets/audio/MI.ogg" type="audio/mpeg">
<source src="../assets/audio/MI.ogg" type="audio/ogg">
<embed height="50" width="100" src="../assets/audio/MI.ogg">
</audio>




    	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script> 

    	<script type="text/javascript" src="../assets/js/jquery.validate.js"></script> 


    	<script type="text/javascript">
    		$(document).ready( function (e) {

           


              $('.id_end_th').click( function() {


                $.post('../ajax.php',{action:'endTheVidoCall',
                  did:$('#passvaluePo1').attr('value'), 
                  id:$('#passvaluePo').attr('value'), 
                  table:'d',
                  key:$('#passvaluePo4').attr('value')

                },function(response){
                  console.log('rrrrrrrrrrrr'+response);

                });


                  window.location = "video.php";

              });



              $('.id_answr_th').click( function() {

                  $('#submint_me_broi').click();

              });









              ( function sech_call(){
                 
                      $didd = $('#passvaluePo1').attr('value');

                       //   console.log($didd,$tid , $last_time); 
               


                 $.post('../ajax.php',{action:'get-new-call-for-doc', id:$didd,  status:0 },function(response){
                //        console.log(response); 
                    if(response.substring(0, 6) == "Error: "){

                                console.log("error");
                                  
                setTimeout(sech_call, 100)
                return;
                                } 
                                if (response.trim().length > 1) {
                         
                                      
                                  response =$.parseJSON(response); 
                                   console.log(response);
                                  response = response.success;
 

                                  if(response.success > 0  &&  response.message.length>0  &&  response.message != null) {

               

                                  $message = response.message ;
              oo =0;

              oo =$message.length;

 

              if($message.length <1)
   window.location = "video.php";
               
                else {

                    $('#passvaluePo4').attr('value', $message[0].description);
                    $('#passvaluePo').attr('value', $message[0].id);



                    url = window.location.href;  
                     url = url.substring(0, url.lastIndexOf('/'));
                    url = url.substring(0, url.lastIndexOf('/'));
                      url = url+"/doctor/images_/"+$message[0].image;
                    console.log(url);
                      set_image_('#iser_id_tr', url) ;





                }


 

               } else {

                   window.location = "video.php";
console.log('ddd');

               }



              }

                setTimeout(sech_call, 100)
                               
                    });
               
               


              })()
























              function set_image_($this, $url) {

                url= window.location.href;  
                 url = url.substring(0, url.lastIndexOf('/'));
                url = url.substring(0, url.lastIndexOf('/'));
                $string_trturn = url+"/assets/images/default.png";


                $.ajax({
                    url:$url,
                    type:'HEAD',
                    error: function()
                    {
                      $($this).attr("src",$string_trturn);
                    },
                    success: function()
                    { 
                      $($this).attr("src",$url);
                    }
                });

              }





              function play()            {
              var audio=document.getElementById('audio1');
              audio.play();
                             }



                      play();
                                           

		        });

		    </script>

		</body>
		</html>
