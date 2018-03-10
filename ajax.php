
<?php


	
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

include_once 'functions.php';



if( isset($_POST['action']) &&  IS_AJAX  ) {
 	
	switch( $_POST['action'] ) {
		
		// user login
		case 'user-login':
		
			$user_name = $_POST['username'];
			$user_password = $_POST['password'];

			$flag = user_login($user_name, $user_password);	

			if ($flag['status'] == 0) {
				 echo json_encode(array('success'=>$flag));	
			} else {
				switch ($flag['status']) {
					case 1:
						if ($flag['valid'] == 1) {
							session_start();
							$_SESSION['ad'] =  $user_name;
							

							if(!empty($_SESSION['loc'])){
								echo json_encode(array('success'=>$flag,'url'=>'<script type="text/javascript">window.location = "'.$_SESSION['loc'].'";</script>'));
							}else {
								echo json_encode(array('success'=>$flag, 'url'=>'<script type="text/javascript">window.location = "admin/index.php";</script>'));
							}

						} else{
							echo json_encode(array('success'=>$flag));
						}
						break;
					case 2:
						if ($flag['valid'] == 1) {
							session_start();
							$_SESSION['do'] =  $user_name;


							if(!empty($_SESSION['loc'])){
								echo json_encode(array('success'=>$flag,'url'=>'<script type="text/javascript">window.location = "'.$_SESSION['loc'].'";</script>'));
							}else {
								echo json_encode(array('success'=>$flag, 'url'=>'<script type="text/javascript">window.location = "doctor/index.php";</script>'));
							}

						}else{
							echo json_encode(array('success'=>$flag));
						}
						break;
					case 3:
						if ($flag['valid'] == 1) {
							session_start();
							$_SESSION['ph'] =  $user_name;


							if(!empty($_SESSION['loc'])){
								echo json_encode(array('success'=>$flag,'url'=>'<script type="text/javascript">window.location = "'.$_SESSION['loc'].'";</script>'));
							}else {
								echo json_encode(array('success'=>$flag, 'url'=>'<script type="text/javascript">window.location = "pharmacist/index.php";</script>'));
							}

						}else{
							echo json_encode(array('success'=>$flag));
						}
						break;
					case 4:
						if ($flag['valid'] == 1) {
							session_start();
							$_SESSION['pa'] =  $user_name;

							if(!empty($_SESSION['loc'])){
								echo json_encode(array('success'=>$flag,'url'=>'<script type="text/javascript">window.location = "'.$_SESSION['loc'].'";</script>'));
							}else {
								echo json_encode(array('success'=>$flag, 'url'=>'<script type="text/javascript">window.location = "patient/index.php";</script>'));
							}
						}else{
							echo json_encode(array('success'=>$flag));
						}
						break;

					default:
							echo json_encode(array('success'=>$flag));
						break;
				}
			}



			 
			
		/*	if( userlogin($id, $password) ) {
				session_start();
				$_SESSION['admin'] = 'admin@techteach.com';
				echo '<script type="text/javascript">window.location = "admin/index.php";</script>';
			} else {
				echo 'In currect password';
			}
			*/
		break;





		case 'reset-password':
		
			$user_name = $_POST['username'];

			$flag = reset_password($user_name );	
 
				 echo json_encode(array('success'=>$flag));	
			 
		/*	if( userlogin($id, $password) ) {
				session_start();
				$_SESSION['admin'] = 'admin@techteach.com';
				echo '<script type="text/javascript">window.location = "admin/index.php";</script>';
			} else {
				echo 'In currect password';
			}
			*/
		break;







	case 'confirm-email':
		
			$user_name = $_POST['email'];

			$flag = email_password($user_name );	
 
				 echo json_encode(array('success'=>$flag));	
			 
		/*	if( userlogin($id, $password) ) {
				session_start();
				$_SESSION['admin'] = 'admin@techteach.com';
				echo '<script type="text/javascript">window.location = "admin/index.php";</script>';
			} else {
				echo 'In currect password';
			}
			*/
		break;



		case 'new-password':
		
			$email = $_POST['email'];
			$code = $_POST['code'];
			$password = $_POST['password'];

			$flag = new_password_x($email, $code, $password );	
 			 $user_name =$email;
			if ($flag[status] == 0) {
				 echo json_encode(array('success'=>$flag));	
			} else {
				switch ($flag[status]) {
					case 1:
						if ($flag[valid] == 1) {
							session_start();
							$_SESSION['ad'] =  $user_name;
							echo json_encode(array('success'=>$flag,
													'url'=>'<script type="text/javascript">window.location = "../admin/index.php";</script>'));
						} else{
							echo json_encode(array('success'=>$flag));
						}
						break;
					case 2:
						if ($flag[valid] == 1) {
							session_start();
							$_SESSION['do'] =  $user_name;
							echo json_encode(array('success'=>$flag,
													'url'=>'<script type="text/javascript">window.location = "../doctor/index.php";</script>'));
						}else{
							echo json_encode(array('success'=>$flag));
						}
						break;
					case 3:
						if ($flag[valid] == 1) {
							session_start();
							$_SESSION['ph'] =  $user_name;
							echo json_encode(array('success'=>$flag,
													'url'=>'<script type="text/javascript">window.location = "../pharmacist/index.php";</script>'));
						}else{
							echo json_encode(array('success'=>$flag));
						}
						break;
					case 4:
						if ($flag[valid] == 1) {
							session_start();
							$_SESSION['pa'] =  $user_name;
							echo json_encode(array('success'=>$flag,
													'url'=>'<script type="text/javascript">window.location = "../patient/index.php";</script>'));
						}else{
							echo json_encode(array('success'=>$flag));
						}
						break;

					default:
							echo json_encode(array('success'=>$flag));
						break;
				}
			}



		break;




	case 're-confirm-email':
		
			$user_name = $_POST['email'];

			$flag = re_email_password($user_name );	
 
				 echo json_encode(array('success'=>$flag));	
			 
		/*	if( userlogin($id, $password) ) {
				session_start();
				$_SESSION['admin'] = 'admin@techteach.com';
				echo '<script type="text/javascript">window.location = "admin/index.php";</script>';
			} else {
				echo 'In currect password';
			}
			*/
		break;

























	 
	
		case 'add_department':
			$name = $_POST['name'];
			$description = $_POST['description'];
				$flag = add_department($name, $description );	
				echo json_encode(array('success'=>$flag));	
			
			
			break;

		case 'chk_department':
			$name = $_POST['name']; 
				$flag = check_department($name);	
				echo json_encode(array('success'=>$flag));	
			
		
			break;
			
		case 'edit_department':
			$name = $_POST['name'];
			$name_old = $_POST['name_old'];
			$description = $_POST['description'];
				$flag = edit_department($name, $name_old, $description );	
				echo json_encode(array('success'=>$flag));	
			
		
			break;

		case 'delete_department':
			$name = $_POST['name'];
				$flag = delete_department($name);	
				echo json_encode(array('success'=>$flag));	
			
		
			break;






		case 'chk_email':
			$email = $_POST['email'];
				$flag = check_email($email);	
				echo json_encode(array('success'=>$flag));	
			
		
			break;


		case 'chk_mobile':
			$mobile = $_POST['mobile'];
				$flag = chk_mobile($mobile);	
				echo json_encode(array('success'=>$flag));	
			
		
			break;

		case 'add-Patient':
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$flag = add_patient($fname, $lname, $email, $password );	
			echo json_encode(array('success'=>$flag));	
			
		
			break;




		case 'add-doctor':

			$department_name = $_POST['department_name'];
			$dfname = $_POST['dfname']; 
			$dlname = $_POST['dlname'];
			$demail  = $_POST['demail']; 
			$dmphone = $_POST['dmphone'];
			$dlphone = $_POST['dlphone'];
			$dsex = $_POST['dsex'];
			$ddob = $_POST['ddob']; 
			$daddress = $_POST['daddress']; 
			$dqualification = $_POST['dqualification']; 
			$dprev_experiencez = $_POST['dprev_experiencez'];
			$djoin_date = $_POST['djoin_date'];
			$dpassword = $_POST['dpassword'];
			$upadanimage  = $_POST['upadanimage'];




			$flag = add_doctor($department_name,$dfname,$dlname,$demail,$dmphone,$dlphone,$dsex,$ddob,$daddress,$dqualification,$dprev_experiencez,$djoin_date,$dpassword,$upadanimage );	

			echo json_encode(array('success'=>$flag));	
			
		
			break;


		case 'return_name':
			$table_name = $_POST['table_name'];
			$id = $_POST['id'];
			$flag = return_main_name($table_name, $id);	
			echo json_encode(array('success'=>$flag));	
			
		
			break; 

 		case 'return-doctor-details':
			$id = $_POST['id'];
			$flag = return_doctor_details( $id);	
			echo json_encode(array('success'=>$flag));	
			
		
			break;
	
		case 'edit-doctor':

			$id = $_POST['id'];
			$department_name = $_POST['eepartment_name'];
			$dfname = $_POST['efname']; 
			$dlname = $_POST['elname'];
			$demail  = $_POST['eemail']; 
			$dmphone = $_POST['emphone'];
			$dlphone = $_POST['elphone'];
			$dsex = $_POST['esex'];
			$ddob = $_POST['edob']; 
			$daddress = $_POST['eaddress']; 
			$dqualification = $_POST['equalification']; 
			$dprev_experiencez = $_POST['eprev_experiencez'];
			$djoin_date = $_POST['ejoin_date']; 
			$upadanimage  = $_POST['epadanimage'];
 

			$flag = edit_doctor($id,$department_name,$dfname,$dlname,$demail,$dmphone,$dlphone,$dsex,$ddob,$daddress,$dqualification,$dprev_experiencez,$djoin_date ,$upadanimage );	

			echo json_encode(array('success'=>$flag));	
			
		
			break;
 
 		case 'delete_doctor':
			$id = $_POST['id'];
			$status = $_POST['status'];
			$flag = delete_doctor( $id, $status);	
			echo json_encode(array('success'=>$flag));	
			
		
			break;

 
		case 'add-nurse':
			$nepartment_name = $_POST['nepartment_name'];
			$nfname = $_POST['nfname']; 
			$nlname = $_POST['nlname'];
			$nemail  = $_POST['nemail']; 
			$nmphone = $_POST['nmphone']; 
			$nsex = $_POST['nsex'];
			$ndob = $_POST['ndob']; 
			$naddress = $_POST['naddress']; 
			$njoin_date = $_POST['njoin_date']; 
			$npadanimage  = $_POST['npadanimage']; 



			$flag = add_nurse($nepartment_name,$nfname,$nlname ,$nemail,$nmphone,$nsex,$ndob,$naddress,$njoin_date,$npadanimage);	
			echo json_encode(array('success'=>$flag));	
			
		
			break; 


 		case 'return-nurse-details':
			$id = $_POST['id'];
			$flag = return_nurse_details( $id);	
			echo json_encode(array('success'=>$flag));	
			
			break;
	 

		case 'edit-nurse':

			$nid = $_POST['nid'];
			$ndepartment_name = $_POST['neepartment_name'];
			$ndfname = $_POST['nefname']; 
			$ndlname = $_POST['nelname'];
			$ndemail  = $_POST['neemail']; 
			$ndmphone = $_POST['nemphone']; 
			$ndsex = $_POST['nesex'];
			$nddob = $_POST['nedob']; 
			$ndaddress = $_POST['neaddress'];  
			$ndjoin_date = $_POST['nejoin_date']; 
			$nupadanimage  = $_POST['nepadanimage'];
 

			$flag = edit_nurse($nid,$ndepartment_name,$ndfname,$ndlname,$ndemail,$ndmphone ,$ndsex,$nddob,$ndaddress, $ndjoin_date ,$nupadanimage );	

			echo json_encode(array('success'=>$flag));	
			
		
			break;

 
 		case 'delete_nurse':
			$id = $_POST['id'];
			$status = $_POST['status'];
			$flag = delete_nurse( $id, $status);	
			echo json_encode(array('success'=>$flag));	
			
		
			break;
	
		case 'add-pharmacist':
 
			$pfname = $_POST['pfname']; 
			$plname = $_POST['plname'];
			$pemail  = $_POST['pemail']; 
			$pmphone = $_POST['pmphone'];
			$plphone = $_POST['plphone'];
			$pduty = $_POST['pduty']; 
			$paddress = $_POST['paddress']; 
			$ppassword = $_POST['ppassword'];  
			$ppadanimage  = $_POST['ppadanimage'];
 

			$flag = add_pharmacist($pfname ,$plname,$pemail,$pmphone ,$plphone ,$pduty ,$paddress,$ppassword, $ppadanimage );	

			echo json_encode(array('success'=>$flag));	
			
		
			break;



 		case 'return-pharmacist-details':
			$id = $_POST['id'];
			$flag = return_pharmacist_details( $id);	
			echo json_encode(array('success'=>$flag));	
			
		
			break;


		case 'edit-pharmacist':
 
			$id = $_POST['id']; 
			$pfname = $_POST['pfname']; 
			$plname = $_POST['plname'];
			$pemail  = $_POST['pemail']; 
			$pmphone = $_POST['pmphone'];
			$plphone = $_POST['plphone'];
			$pduty = $_POST['pduty']; 
			$paddress = $_POST['paddress']; 
			$ppadanimage  = $_POST['ppadanimage'];
 

			$flag = edit_pharmacist( $id, $pfname ,$plname,$pemail,$pmphone ,$plphone ,$pduty ,$paddress, $ppadanimage );	

			echo json_encode(array('success'=>$flag));	
			
		
			break;


 
 		case 'delete_pharmacist':
			$id = $_POST['id'];
			$status = $_POST['status'];
			$flag = delete_pharmacist( $id, $status);	
			echo json_encode(array('success'=>$flag));	
			
		
			break;

 		case 'return_blood_gp':
			$flag = return_blood_gp();	
			echo json_encode(array('success'=>$flag));	
			
		
			break;


		case 'add-blood-group':
			$group = $_POST['group'];
			$description = $_POST['description'];
			$flag = add_blood_group( $group, $description);	
			echo json_encode(array('success'=>$flag));	
			
		
			break;

 
		case 'edit-blood':
			$name = $_POST['name'];
			$quantity = $_POST['quantity'];
			$ebdescription = $_POST['ebdescription'];

			$flag = edit_blood( $name, $quantity, $ebdescription );	
			echo json_encode(array('success'=>$flag));	
			
		
			break;


 		case 'return-admin-details':
			$flag = return_admin_details();	
			echo json_encode(array('success'=>$flag));	
			
		
			break;


		case 'edit-admin':
			$nefname = $_POST['nefname']; 
			$nelname = $_POST['nelname'];
			$neemail  = $_POST['neemail']; 
			$nemphone = $_POST['nemphone'];
			$alphone = $_POST['alphone'];
			$nesex = $_POST['nesex']; 
			$neaddress = $_POST['neaddress']; 
			$adescription = $_POST['adescription']; 
			$nepadanimage  = $_POST['nepadanimage'];
			$apassword  = $_POST['apassword'];
 

			$flag = edit_admin( $nefname,$nelname,$neemail,$nemphone,$alphone,$nesex, $neaddress,$adescription,$nepadanimage  , $apassword);	

			echo json_encode(array('success'=>$flag));	
			
		
			break;

		case 'admin_pass_new':
			$password0 = $_POST['password0']; 
			$password1 = $_POST['password1'];  

			$flag = admin_pass_new( $password0,$password1);	
			
			echo json_encode(array('success'=>$flag));	
			
		
			break;







/*=================================================================================================================*/



 

		case 'check_medicine_c_name':
			$medicine_c_name = $_POST['medicine_c_name']; 

			$flag = check_medicine_c_name( $medicine_c_name);	
			
			echo json_encode(array('success'=>$flag));	
			
		
			break;



		case 'add_medicine_c':
			$name = $_POST['name']; 
			$description = $_POST['description']; 

			$flag = add_medicine_c( $name, $description);	
			
			echo json_encode(array('success'=>$flag));	
			
		
			break;


		case 'get_medicine_c':
			$id = $_POST['id']; 

			$flag = get_medicine_c( $id);	
			
			echo json_encode(array('success'=>$flag));	
			
		
			break;


		case 'edit_medicine_c':
			$id = $_POST['id']; 
			$name = $_POST['name']; 
			$description = $_POST['description']; 

			$flag = edit_medicine_c( $id, $name , $description);	
			
			echo json_encode(array('success'=>$flag));	
			
		
			break;


		case 'get_medicine_c_all': 

			$flag = get_medicine_c_all( );	
			
			echo json_encode(array('success'=>$flag));	
			
		
			break;


		case 'check_medicine_name':
			$medicine_c_name = $_POST['medicine_c_name']; 

			$flag = check_medicine_name( $medicine_c_name);	
			
			echo json_encode(array('success'=>$flag));	
			
		
			break;
 

		case 'add-medicine':

			$emedicine_category = $_POST['emedicine_category'];
			$m_name = $_POST['m_name']; 
			$mdescription = $_POST['mdescription'];
			$npadanimage  = $_POST['npadanimage']; 
			$m_unit_price = $_POST['m_unit_price'];
			$m_type = $_POST['m_type']; 



			$flag = add_medicine($emedicine_category,$m_name,$mdescription,$npadanimage,$m_unit_price,$m_type );	

			echo json_encode(array('success'=>$flag));	
			
		
			break;




		case 'get_medicine_d':
			$id = $_POST['id']; 

			$flag = get_medicine_d( $id);	
			
			echo json_encode(array('success'=>$flag));	
			
		
			break;

		case 'edit-medicine':

			$id = $_POST['id'];
			$emedicine_category = $_POST['emedicine_category'];
			$m_name = $_POST['m_name']; 
			$mdescription = $_POST['mdescription'];
			$npadanimage  = $_POST['npadanimage']; 
			$m_unit_price = $_POST['m_unit_price'];
			$mmnstatus = $_POST['mmnstatus']; 
			$m_type = $_POST['m_type']; 



			$flag = edit_medicine($id, $emedicine_category,$m_name,$mdescription,$npadanimage,$m_unit_price,$mmnstatus, $m_type );	

			echo json_encode(array('success'=>$flag));	
			
		
			break;

 
 		case 'delete_medicine':
			$id = $_POST['id'];
			$status = $_POST['status'];
			$flag = delete_medicine( $id, $status);	
			echo json_encode(array('success'=>$flag));	
			
		
			break;
 
 		case 'add-schedule':
			$id = $_POST['id'];
			$varmonthz = $_POST['varmonthz'];
			$vardayz = $_POST['vardayz'];
			$time_from = $_POST['time_from'];
			$time_to = $_POST['time_to'];

			$day_from = $_POST['day_from'];
			$day_to = $_POST['day_to'];


			$flag = add_schedule( $id,$varmonthz,$vardayz,$time_from ,$time_to, $day_from , $day_to );	
			echo json_encode(array('success'=>$flag));	
			
		
			break;


		case 'get_month':
			$id = $_POST['id']; 

			$flag = get_month( $id);	
			
			echo json_encode(array('success'=>$flag));	
			
			break;
		

		case 'get_week1':
			$id = $_POST['id']; 

			$flag = get_week1( $id);	
			
			echo json_encode(array('success'=>$flag));	
			
			break;
		

		case 'get_week2':
			$id = $_POST['id']; 

			$flag = get_week2( $id);	
			
			echo json_encode(array('success'=>$flag));	
			
			break;

		case 'delete_doc_schedule':
			$id = $_POST['id']; 
			$table = $_POST['table']; 

			$flag = delete_doc_schedule( $id, $table);	
			
			echo json_encode(array('success'=>$flag));	
			
			break;

		case 'get-add-doc':
			$id = $_POST['department_name']; 

			$flag = get_add_doc( $id);	
			
			echo json_encode(array('success'=>$flag));	
			
			break;

		case 'get-one-doc':
			$id = $_POST['doctor_name']; 

			$flag = get_one_doc( $id);	
			
			echo json_encode(array('success'=>$flag));	
			
			break;



		case 'add-profile':
			$id = $_POST['id']; 
			$doctor_name = $_POST['doctor_name']; 
			$dmphone = $_POST['dmphone']; 
			$dlphone = $_POST['dlphone']; 
			$dsex = $_POST['dsex']; 
			$ddob = $_POST['ddob']; 
			$daddress = $_POST['daddress']; 
			$pblood_group = $_POST['pblood_group']; 
			$upadanimage = $_POST['upadanimage']; 

			$flag = add_profile( $id , $doctor_name ,$dmphone,$dlphone,$dsex,$ddob,$daddress,$pblood_group,$upadanimage );	
			
			echo json_encode(array('success'=>$flag));	
			
			break;



		case 'doctor_schedule':
			$id = $_POST['doctor_name']; 

			$flag = doctor_schedule( $id);	
			
			echo json_encode(array('success'=>$flag));	
			
			break;
  
		case 'add-appointment':
			$id = $_POST['user_id']; 
			$did = $_POST['doc_id']; 
			$date = $_POST['date']; 
			$time_from = $_POST['time_from']; 
			$time_to = $_POST['time_to']; 
			$description = $_POST['description']; 

			$flag = add_appointment( $id ,$did ,$date ,$time_from  ,$time_to ,$description );	
			
			echo json_encode(array('success'=>$flag));	
			
			break; 

		case 'delete_appointment':
			$id = $_POST['id'];  

			$flag = delete_appointment($id);	
			
			echo json_encode(array('success'=>$flag));	
			
			break;
			

		case 'return-department':
			$id = $_POST['doctor_name'];  

			$flag = return_department($id);	
			
			echo json_encode(array('success'=>$flag));	
			
			break;
 
		case 'return-patient_e':
			$id = $_POST['id'];  

			$flag = return_patient_e($id);	
			
			echo json_encode(array('success'=>$flag));	
			
			break;
	
		case 'add_bed':
			$name = $_POST['name'];
			$description = $_POST['description'];
				$flag = add_bed($name, $description );	
				echo json_encode(array('success'=>$flag));	
			
			
			break;
			
		case 'edit_bed':
			$name = $_POST['name'];
			$id = $_POST['id'];
			$description = $_POST['description'];
				$flag = edit_bed($name, $id, $description );	
				echo json_encode(array('success'=>$flag));	
			
		
			break;

		case 'delete_bed':
			$id = $_POST['id'];  

			$flag = delete_bed($id);	
			
			echo json_encode(array('success'=>$flag));	
			
			break;
 
		case 'return-bed': 
			$flag = return_bed();	
			
			echo json_encode(array('success'=>$flag));	
			
			break; 
 
		case 'return-medicines5': 
			$id = $_POST['id'];  

			$flag = return_medicines5($id);	
			
			echo json_encode(array('success'=>$flag));	
			
			break;
 
		case 'add-prescription': 
			$pid = $_POST['pid'];  
			$did = $_POST['did'];  
			$subject = $_POST['subject'];  
			$description = $_POST['description'];  
			$bed_id = $_POST['bed_id'];  
			$discharge = $_POST['discharge'];  

			$flag = add_prescription( $pid,$did ,$subject ,$description ,$bed_id ,$discharge);	
			
			echo json_encode(array('success'=>$flag));	
			
			break;
 
 
		case 'add-prescribe': 
			$id = $_POST['id'];  
			$medicines_id = $_POST['medicines_id'];  
			$time = $_POST['time'];  
			$amount = $_POST['amount'];  
			$description = $_POST['description'];  
			$date_from = $_POST['date_from'];  
			$date_to = $_POST['date_to'];  

			$flag = add_prescribe( $id ,$medicines_id ,$time ,$amount ,$description ,$date_from ,$date_to);	
			
			echo json_encode(array('success'=>$flag));	
			
			break;

		case 'check-blood': 
			$id = $_POST['id'];  
			$amount = $_POST['amount'];  

			$flag = check_blood($id,$amount );	
			
			echo json_encode(array('success'=>$flag));	
			
			break;
 
		case 'add-blood-mang': 
			$id = $_POST['id'];  
			$amount = $_POST['amount'];  
			$group = $_POST['group'];  

			$flag = add_blood_mang($id,$amount, $group );	
			echo json_encode(array('success'=>$flag));	
			
			break;
 
		case 'delete-prescription': 
			$id = $_POST['id'];  
			$flag = delete_prescription($id);	
			echo json_encode(array('success'=>$flag));	
			
			break;

		case 'update-profile':

			$id = $_POST['id']; 
			$dfname = $_POST['dfname']; 
			$dlname = $_POST['dlname'];
			$demail  = $_POST['demail']; 
			$dmphone = $_POST['dmphone'];
			$daddress = $_POST['daddress']; 
			$dpassword = $_POST['dpassword'];
			$upadanimage  = $_POST['upadanimage'];




			$flag = update_profile( $id, $dfname,$dlname,$demail,$dmphone, $daddress, $dpassword,$upadanimage );	

			echo json_encode(array('success'=>$flag));	
			
		
			break;



		case 'doc_pass_new':
			$id = $_POST['id']; 
			$password0 = $_POST['password0']; 
			$password1 = $_POST['password1'];  

			$flag = doc_pass_new( $id, $password0,$password1);	
			
			echo json_encode(array('success'=>$flag));	
			
		
			break;
 
		case 'pat_update_profile':

			$my_zxid = $_POST['my_zxid']; 
			$pfname = $_POST['pfname']; 
			$plname = $_POST['plname']; 
			$pemail = $_POST['pemail']; 


			$id = $_POST['id']; 
			$doctor_name = $_POST['doctor_name']; 
			$dmphone = $_POST['dmphone']; 
			$dlphone = $_POST['dlphone']; 
			$dsex = $_POST['dsex']; 
			$ddob = $_POST['ddob']; 
			$daddress = $_POST['daddress']; 
			$pblood_group = $_POST['pblood_group']; 
			$upadanimage = $_POST['upadanimage']; 

			$pgname = $_POST['pgname']; 
			$pgrelation = $_POST['pgrelation']; 
			$pgmphone = $_POST['pgmphone']; 
			$pglphone = $_POST['pglphone']; 
			$pgaddress = $_POST['pgaddress']; 
			$ppassword = $_POST['ppassword'];  


			$flag = pat_update_profile($my_zxid ,$pfname,$plname,$pemail, $id , $doctor_name ,$dmphone,$dlphone,$dsex,$ddob,$daddress,$pblood_group,$upadanimage,$pgname ,$pgrelation ,$pgmphone ,$pglphone ,$pgaddress ,$ppassword );	
			
			echo json_encode(array('success'=>$flag));	
			
			break;


		case 'pat_pass_new':
			$id = $_POST['id']; 
			$password0 = $_POST['password0']; 
			$password1 = $_POST['password1'];  

			$flag = pat_pass_new( $id, $password0,$password1);	
			
			echo json_encode(array('success'=>$flag));	
			
		
			break; 


		case 'get_for_pamnt':
			$id = $_POST['id']; 

			$flag = get_for_pamnt( $id);	
			
			echo json_encode(array('success'=>$flag));	
			
		
			break;
 

		case 'add_a_payment':
			$xid = $_POST['xid']; 
			$did = $_POST['did']; 
			$amount = $_POST['amount']; 

			$flag = add_a_payment( $xid ,$did,$amount);	
			
			echo json_encode(array('success'=>$flag));	
			
		
			break; 

		case 'add_noticeboard':
			$name = $_POST['name']; 
			$description = $_POST['description']; 

			$flag = add_noticeboard( $name ,$description);	
			
			echo json_encode(array('success'=>$flag));	
			
		
			break;
 

		case 'delete_noticeboard':
			$id = $_POST['id'];  

			$flag = delete_noticeboard( $id);	
			
			echo json_encode(array('success'=>$flag));	
			
		
			break;

		case 'pha_pass_new':
			$id = $_POST['id']; 
			$password0 = $_POST['password0']; 
			$password1 = $_POST['password1'];  

			$flag = pha_pass_new( $id, $password0,$password1);	
			
			echo json_encode(array('success'=>$flag));	
			
		
			break;  


		case 'get_message_d':
			$id = $_POST['id'];   
			$status = $_POST['status'];   
			$pid = $_POST['pid'];   
			$flag = get_message_d( $id , $pid, $status);	
			
			echo json_encode(array('success'=>$flag));	
			
		
			break;  


		case 'enter_message':
			$id = $_POST['id'];  
			$message = $_POST['message'];  
			$to = $_POST['to'];  
			$flag = enter_message( $id , $message, $to);	
			
			echo json_encode(array('success'=>$flag));	
			
		
			break; 

		case 'enter_message_repay':
			$id = $_POST['id'];  
			$message = $_POST['message'];  
			$to = $_POST['to'];  
			$flag = enter_message_repay( $id , $message, $to);	
			
			echo json_encode(array('success'=>$flag));	
			
		
			break; 

		case 'get-new-one-doc':
			$fid = $_POST['fid'];  
			$tid = $_POST['tid'];  
			$status = $_POST['status'];  
			$time = $_POST['time'];  

			$flag = get_new_one_doc( $fid , $tid, $time, $status);	
			
			echo json_encode(array('success'=>$flag));	
			
		
			break; 


		case 'delete-this-msg':
			$id = $_POST['id'];   

			$flag = delete_this_msg( $id );	
			
			echo json_encode(array('success'=>$flag));	
			
		
			break;  

		case 'get-read-is-doc':
			$id = $_POST['id'];   

			$flag = get_read_is_doc( $id );	
			
			echo json_encode(array('success'=>$flag));	
			
		
			break; 

		case 'get-msg_not_read-is-doc':
		
			$id = $_POST['id'];   

			$flag = get_msg_not_read_is_doc( $id );	
			
			echo json_encode(array('success'=>$flag));	
			
		
			break; 

		case 'get-msg_not_read-is-doc-1':
			$id = $_POST['id'];   

			$flag = get_msg_not_read_is_doc_1( $id );	
			
			echo json_encode(array('success'=>$flag));	
			
		
			break; 




		case 'get_call_log_d':
			$id = $_POST['id'];   
			$status = $_POST['status'];   
			$pid = $_POST['pid'];   
			$flag = get_call_log_d( $id , $pid, $status);	
			
			echo json_encode(array('success'=>$flag));	
			
		
			break;  
 

		case 'endTheVidoCall':
			$id = $_POST['id'];   
			$did = $_POST['did'];   
			$table = $_POST['table'];   
			$key = $_POST['key'];   


			$flag = endTheVidoCall($id ,$did ,$table ,$key );	
			
			echo json_encode(array('success'=>$flag));	
			
			break;

 
		
		case 'takTheVidoCall':
			$id = $_POST['id'];   
			$did = $_POST['did'];   
			$table = $_POST['table'];   
			$key = $_POST['key'];   


			$flag = takTheVidoCall($id ,$did ,$table ,$key );	
			
			echo json_encode(array('success'=>$flag));	

			break;
			

		
		case 'check_call_acept':
			$id = $_POST['id'];   
			$did = $_POST['did'];   
			$table = $_POST['table'];   
			$key = $_POST['key'];   


			$flag = check_call_acept($id ,$did ,$table ,$key );	
			
			echo json_encode(array('success'=>$flag));	

			break;





		case 'get-new-call-for-doc':
			$fid = $_POST['id'];  
			$status = $_POST['status'];  

			$flag = get_new_call_for_doc( $fid , $status);	
			
			echo json_encode(array('success'=>$flag));	
			
		
			break; 



		
		case 'check_call_acept_time_out': 

			$key = $_POST['key'];   


			$flag = check_call_acept_time_ou($key );	
			
			echo json_encode(array('success'=>$flag));	

			break;




			
	}




}



?>