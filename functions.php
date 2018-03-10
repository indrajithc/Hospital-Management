<?php
try {
	require_once ('includes/db.php');
	global $a;
	$a = new Database();

} catch (Exception $e) {

}

define("ENCRYPTION_KEY", "!@#$%^&*");
/*----------------------admin-----------------------*/
function adminlogin($username, $password) {
	global $a;
	$query = 'SELECT * FROM `admin` where user_name = :username and password = :password';
	if ($a->display($query, array(':username' => $username, ':password' => $password))) {

		return true;

	} else {
		return false;
	}

}

/*
 *
 *user login
 *
 *
 */
function user_login($user_name, $user_password) {
	global $a;
	$status = 0;
	$image  = "";
	$query  = 'SELECT `email` FROM `admin` where email = :username and delete_status = 0 ';
	if ($a->display($query, array(':username' => $user_name))) {
		$status = 1;
	}
	if ($status == 0) {
		$query = 'SELECT `email` FROM `doctor` where email = :username and delete_status = 0 ';
		if ($a->display($query, array(':username' => $user_name))) {
			$status = 2;
		}
	}

	if ($status == 0) {
		$query = 'SELECT `email` FROM `pharmacist` where email = :username and delete_status = 0 ';
		if ($a->display($query, array(':username' => $user_name))) {
			$status = 3;
		}
	}

	if ($status == 0) {
		$query = 'SELECT `email` FROM `patient_details` where email = :username and delete_status = 0 ';
		if ($a->display($query, array(':username' => $user_name))) {
			$status = 4;
		}
	}
	switch ($status) {
		case 1:
		$query = 'SELECT `email` FROM `admin` where email = :username and password = :password and delete_status = 0 ';
		if ($a->display($query, array(':username' => $user_name, ':password' => $user_password))) {
			return (array('status'                   => $status,
				'valid'                                => 1));
		} else {
			$query = 'SELECT `image` FROM `admin` where email = :username  and delete_status = 0 ';
			if ($result = $a->display($query, array(':username' => $user_name))) {
				foreach ($result as $value) {
					if (is_null($value['image'])) {
						$image = "img.xx";
					} else {

						$image = $value['image'];
					}
				}
			}
		}

		break;
		case 2:
		$query = 'SELECT `email` FROM `doctor` where email = :username and password = :password  and delete_status = 0 ';
		if ($a->display($query, array(':username' => $user_name, ':password' => $user_password))) {
			return (array('status'                   => $status,
				'valid'                                => 1));
		} else {
			$query = 'SELECT `image` FROM `doctor` where email = :username  and delete_status = 0 ';
			if ($result = $a->display($query, array(':username' => $user_name))) {
				foreach ($result as $value) {
					if (is_null($value['image'])) {
						$image = "img.xx";
					} else {

						$image = $value['image'];
					}
				}
			}
		}

		break;
		case 3:
		$query = 'SELECT `email` FROM `pharmacist` where email = :username and password = :password  and delete_status = 0 ';
		if ($a->display($query, array(':username' => $user_name, ':password' => $user_password))) {
			return (array('status'                   => $status,
				'valid'                                => 1));
		} else {
			$query = 'SELECT `image` FROM `pharmacist` where email = :username  and delete_status = 0 ';
			if ($result = $a->display($query, array(':username' => $user_name))) {
				foreach ($result as $value) {
					if (is_null($value['image'])) {
						$image = "img.xx";
					} else {

						$image = $value['image'];
					}
				}
			}
		}

		break;
		case 4:
		$query = 'SELECT `email` FROM `patient_details` where email = :username and password = :password  and  delete_status = 0 ';
		if ($a->display($query, array(':username' => $user_name, ':password' => $user_password))) {
			return (array('status'                   => $status,
				'valid'                                => 1));
		} else {
			$query = 'SELECT `image` FROM `patient_details` where email = :username  and delete_status = 0 ';
			if ($result = $a->display($query, array(':username' => $user_name))) {
				foreach ($result as $value) {
					if (is_null($value['image'])) {
						$image = "img.xx";
					} else {

						$image = $value['image'];
					}
				}
			}
		}

		break;

		default:
		return (array('status' => $status,
			'valid'              => 0,
			'image'              => $image));
		break;
	}

	return (array('status' => $status,
		'valid'              => 0,
		'image'              => $image));

}

/*
 *
 * reset pasword
 *
 */
function reset_password($user_name) {

	global $a;
	$status = 0;
	$image  = "img.xx";
	$query  = 'SELECT `email` FROM `admin` where email = :username and delete_status = 0 ';
	if ($a->display($query, array(':username' => $user_name))) {
		$status = 1;
	}
	if ($status == 0) {
		$query = 'SELECT `email` FROM `doctor` where email = :username and delete_status = 0 ';
		if ($a->display($query, array(':username' => $user_name))) {
			$status = 2;
		}
	}

	if ($status == 0) {
		$query = 'SELECT `email` FROM `pharmacist` where email = :username and delete_status = 0 ';
		if ($a->display($query, array(':username' => $user_name))) {
			$status = 3;
		}
	}

	if ($status == 0) {
		$query = 'SELECT `email` FROM `patient_details` where email = :username and delete_status = 0 ';
		if ($a->display($query, array(':username' => $user_name))) {
			$status = 4;
		}
	}
	switch ($status) {
		case 1:
		$query = 'SELECT `image` FROM `admin` where email = :username  and delete_status = 0 ';
		if ($result = $a->display($query, array(':username' => $user_name))) {
			foreach ($result as $value) {
				if (is_null($value['image'])) {
					$image = "img.xx";
				} else {

					$image = $value['image'];
				}
			}
		}

		break;
		case 2:

		$query = 'SELECT `image` FROM `doctor` where email = :username  and delete_status = 0 ';
		if ($result = $a->display($query, array(':username' => $user_name))) {
			foreach ($result as $value) {
				if (is_null($value['image'])) {
					$image = "img.xx";
				} else {

					$image = $value['image'];
				}
			}
		}

		break;
		case 3:

		$query = 'SELECT `image` FROM `pharmacist` where email = :username  and delete_status = 0 ';
		if ($result = $a->display($query, array(':username' => $user_name))) {
			foreach ($result as $value) {
				if (is_null($value['image'])) {
					$image = "img.xx";
				} else {

					$image = $value['image'];
				}
			}
		}

		break;
		case 4:

		$query = 'SELECT `image` FROM `patient_details` where email = :username  and delete_status = 0 ';
		if ($result = $a->display($query, array(':username' => $user_name))) {
			foreach ($result as $value) {
				if (is_null($value['image'])) {
					$image = "img.xx";
				} else {

					$image = $value['image'];
				}
			}
		}

		break;

		default:
		return (array('status' => $status,
			'image'              => $image));
		break;
	}

	return (array('status' => $status,
		'image'              => $image));

}

function return_name($user_name) {
	$name = "user";

	global $a;
	$status = 0;
	$query  = 'SELECT `email` FROM `admin` where email = :username   ';
	if ($a->display($query, array(':username' => $user_name))) {
		$status = 1;
	}
	if ($status == 0) {
		$query = 'SELECT `email` FROM `doctor` where email = :username   ';
		if ($a->display($query, array(':username' => $user_name))) {
			$status = 2;
		}
	}

	if ($status == 0) {
		$query = 'SELECT `email` FROM `pharmacist` where email = :username  ';
		if ($a->display($query, array(':username' => $user_name))) {
			$status = 3;
		}
	}

	if ($status == 0) {
		$query = 'SELECT `email` FROM `patient_details` where email = :username  ';
		if ($a->display($query, array(':username' => $user_name))) {
			$status = 4;
		}
	}
	switch ($status) {
		case 1:
		$query = 'SELECT * FROM `admin` where email = :username   ';
		if ($result = $a->display($query, array(':username' => $user_name))) {
			foreach ($result as $value) {
				$name = $value['fname'];
				$name = $name." ".$value['lname'];
			}
		}

		break;
		case 2:

		$query = 'SELECT * FROM `doctor` where email = :username   ';
		if ($result = $a->display($query, array(':username' => $user_name))) {
			foreach ($result as $value) {
				$name = $value['fname'];
				$name = $name." ".$value['lname'];
			}
		}

		break;
		case 3:

		$query = 'SELECT * FROM `pharmacist` where email = :username  ';
		if ($result = $a->display($query, array(':username' => $user_name))) {
			foreach ($result as $value) {
				$name = $value['fname'];
				$name = $name." ".$value['lname'];
			}
		}

		break;
		case 4:

		$query = 'SELECT * FROM `patient_details` where email = :username  ';
		if ($result = $a->display($query, array(':username' => $user_name))) {
			foreach ($result as $value) {
				$name = $value['fname'];
				$name = $name." ".$value['lname'];
			}
		}

		break;

	}

	return $name;

}

function email_password($user_name) {
	global $a;
	$code     = rand(100000, 999999);
	$aemail   = "admin@admin.com";
	$return_x = 0;
	$result   = get_a_value_from_db("admin", "id", "delete_status=0 ");

	foreach ($result as $value) {
		$aemail = $value['id'];

	}

	try {

		$statuz_resent = 0;
		$result        = get_a_value_from_db("temp_verification", "*", " email= '".$user_name."'  AND  `date` > NOW() - INTERVAL 2 HOUR  ORDER BY `temp_verification`.`date` DESC  LIMIT 1");
		foreach ($result as $value) {
			$statuz_resent = 1;

		}

		if ($statuz_resent == 1) {

			return re_email_password($user_name);
		}

	} catch (Exception $e) {

	}

	//INSERT INTO `` (`id`, ``, ``, ``, `date`) VALUES (NULL, 'mai', '3333', '1', CURRENT_TIMESTAMP);
	$query = "INSERT INTO `DASystem`.`temp_verification` ( `email`, `code`, `admin_id`, `date`) VALUES (:email, :code, :admin_id ,:datee );";

	if ($a->execute_data($query, array(':email' => $user_name, ':code' => $code, ':admin_id' => $aemail, ':datee' => date("Y-m-d H:i:s")))) {

		$return_x = reset_password_x($user_name, $code, return_name($user_name));

	} else {
		$return_x = 0;
	}

	if ($return_x == 0 || is_null($return_x)) {
		return $code;
	} else {

		return 1;

	}
}

function re_email_password($user_name) {

	global $a;
	$code     = rand(100000, 999999);
	$aemail   = "admin@admin.com";
	$return_x = 0;

	//SELECT * FROM ``
	$result = get_a_value_from_db("temp_verification", "*", " email= '".$user_name."'  AND  `date` > NOW() - INTERVAL 2 HOUR  ORDER BY `temp_verification`.`date` DESC  LIMIT 1");
	foreach ($result as $value) {
		$code = $value['code'];

	}

	$return_x = reset_password_x($user_name, $code, return_name($user_name));

	if ($return_x == 0 || is_null($return_x)) {
		return $code;
	} else {

		return 1;

	}
}

function new_password_x($email, $code, $password) {
	global $a;
	$final_status = 0;

	$query = 'SELECT * FROM `temp_verification` WHERE  email = :email and code=:code  and `date` > NOW() - INTERVAL 2 HOUR  ';
	if ($a->display($query, array(':email' => $email, ':code' => $code))) {

		$query = 'DELETE FROM `temp_verification` WHERE  email = :email    ';
		$a->display($query, array(':email' => $email));

		$array_to = reset_password($email);

		if ($array_to['status'] !== 0 && !is_null($array_to)) {
			$table_name = "";
			switch ($array_to['status']) {
				case 1:
				$table_name = "admin";
				break;
				case 2:
				$table_name = "doctor";
				break;
				case 3:
				$table_name = "pharmacist";
				break;
				case 4:
				$table_name = "patient_details";
				break;

			}

			$query = "UPDATE ".$table_name." SET `password` = :password  WHERE `email` = :name_old AND `delete_status`= 0 ;";

			if ($a->execute_data($query, array(':password' => $password
				, ':name_old'                               => $email))) {

				$final_status = 1;

		} else {
			$final_status = 0;
		}
	}

}

if ($final_status == 1) {
	return user_login($email, $password);
}

return (array('status' => 0,
	'valid'              => 0,
	'image'              => $image));
}

/*
 *
 * create a mail for welcome
 *
 *
 */

function reset_password_z($to, $action_url, $name, $admin_e) {
	$url   = $_SERVER['REQUEST_URI'];//returns the current URL
	$parts = explode('/', $url);
	$dir   = $_SERVER['SERVER_NAME'];
	for ($i = 0; $i < count($parts)-1; $i++) {
		$dir .= $parts[$i]."/";
	}

	$login_url = $dir;

	$subject          = "Account Creation Successful ".SYSTEM_NAME."  , user name and password ";
	$operating_system = DISPLAY_NAME;
	$browser_name     = " chrome";
	$Company_Name     = DISPLAY_NAME ."Enterpricers";
	$message          = retun_first_welcome($name, SYSTEM_NAME, $action_url, $login_url, $to, date("d-m-Y H:i:s"), $admin_e, $operating_system, $Company_Name);

	$return_me = send_mail($to, $subject, $message);
	return $return_me;
}

/*
 *
 * create a mail for welcome
 *
 *
 */

function reset_password_y($to, $code, $name, $admin_e) {
	$url   = $_SERVER['REQUEST_URI'];//returns the current URL
	$parts = explode('/', $url);
	$dir   = $_SERVER['SERVER_NAME'];
	for ($i = 0; $i < count($parts)-1; $i++) {
		$dir .= $parts[$i]."/";
	}

	$action_url = $dir."index.php?e=".$to."&c=".$code;
	$login_url  = $dir;

	$subject          = "Account Creation Successful ".SYSTEM_NAME."  ,Verify email ";
	$operating_system = "ABC system ";
	$browser_name     = " chrome";
	$Company_Name     = "DAS Enterpricers";
	$message          = retun_body_welcome($name, SYSTEM_NAME, $action_url, $login_url, $to, date("d-m-Y H:i:s"), $admin_e, $operating_system, $Company_Name);

	$return_me = send_mail($to, $subject, $message);
	return $return_me;
}

/*
 *
 * create a mail for password
 *
 *
 */

function reset_password_x($to, $code, $name) {
	$url   = $_SERVER['REQUEST_URI'];//returns the current URL
	$parts = explode('/', $url);
	$dir   = $_SERVER['SERVER_NAME'];
	for ($i = 0; $i < count($parts)-1; $i++) {
		$dir .= $parts[$i]."/";
	}

	$action_url = $dir."Forgot_password/index.php?email=".$to."&code=".$code;

	$subject          = "Reset Your ".SYSTEM_NAME." Login Password";
	$operating_system = "ABC system ";
	$browser_name     = " chrome";
	$support_url      = "";
	$Company_Name     = "DAS Enterpricers";
	$message          = retun_body($name, SYSTEM_NAME, $action_url, $operating_system, $browser_name, $support_url, $Company_Name);

	$return_me = send_mail($to, $subject, $message);
	return $return_me;
}

/*
 *
 * basic mail send
 *
 *
 */

function send_mail($to, $subject, $message) {

	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0"."\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

	// More headers
	$headers .= 'From: <webmaster@example.com>'."\r\n";

	if (mail($to, $subject, $message, $headers)) {
		return 1;
	} else {
		return 0;
	}

}

/*
 *
 * add a value
 *
 *
 */

function get_a_value_from_db($table, $column, $where) {
	global $a;
	$result = array();
	$query  = 'SELECT '.$column.' FROM '.$table.' where '.$where;

	$result = $a->display($query);
	//echo $result[0] ;

	return $result;
}

/*
 *
 * add department
 *
 *
 */

function add_department($name, $description) {
	global $a;

	$query = "SELECT * FROM  `department` WHERE name = :name";
	if (!$a->display($query, array(':name' => $name))) {

		$query = "INSERT INTO `DASystem`.`department` ( `name`, `description` , `date`) VALUES ".
		"(:name, :description ,:date );";

		if ($a->execute_data($query, array(':name' => $name, ':description' => $description
			, ':date'                               => date("Y-m-d H:i:s")))) {

			return 1;

	} else {
		return 0;
	}

} else {

	return -1;
}

}

/*
 *
 *check
 *
 */
function check_department($name) {
	global $a;

	$query = "SELECT * FROM  `department` WHERE name = :name";
	if (!$a->display($query, array(':name' => $name))) {

		return 0;

	} else {

		return 1;
	}

}
/*
 *
 * edit department
 *
 *
 */

function edit_department($name, $name_old, $description) {
	global $a;

	$query = "SELECT * FROM  `department` WHERE name = :name_old";
	if ($a->display($query, array(':name_old' => $name_old))) {

		$query = "UPDATE `department` SET `name` = :name , `description` = :description WHERE `name` = :name_old;";

		if ($a->execute_data($query, array(':name' => $name, ':description' => $description
			, ':name_old'                           => $name_old))) {

			return 1;

	} else {
		return 0;
	}

} else {

	return -1;
}

}

/*
 *
 * delete department
 *
 *
 */

function delete_department($name) {
	global $a;

	$query = "SELECT * FROM  `department` WHERE name = :name";
	if ($a->display($query, array(':name' => $name))) {

		$description = 1;
		$query       = "UPDATE `department` SET  `delete_status` = :description, `name` = :name1  WHERE `name` = :name ;";

		if ($a->execute_data($query, array(':description' => $description, ':name' => $name, ':name1' => $name."_old"))) {

			return 1;

		} else {
			return 0;
		}

	} else {

		return -1;
	}

}
/*
 *
 *
 * check_email
 *
 *
 */
function check_email($user_name) {
	global $a;
	$status = 0;
	$query  = 'SELECT `email` FROM `admin` where email = :username and delete_status = 0 ';
	if ($a->display($query, array(':username' => $user_name))) {
		$status = 1;
	}
	if ($status == 0) {
		$query = 'SELECT `email` FROM `doctor` where email = :username and delete_status = 0 ';
		if ($a->display($query, array(':username' => $user_name))) {
			$status = 2;
		}
	}

	if ($status == 0) {
		$query = 'SELECT `email` FROM `pharmacist` where email = :username and delete_status = 0 ';
		if ($a->display($query, array(':username' => $user_name))) {
			$status = 3;
		}
	}

	if ($status == 0) {
		$query = 'SELECT `email` FROM `patient_details` where email = :username and delete_status = 0 ';
		if ($a->display($query, array(':username' => $user_name))) {
			$status = 4;
		}
	}

	return $status;

}/*
 *
 *
 * check_mobile
 *
 *
 */
function chk_mobile($mobile) {
	global $a;
	$status = 0;
	$query  = 'SELECT `mphone` FROM `admin` where mphone = :username and delete_status = 0 ';
	if ($a->display($query, array(':username' => $mobile))) {
		$status = 1;
	}
	if ($status == 0) {
		$query = 'SELECT `mphone` FROM `doctor` where mphone = :username and delete_status = 0 ';
		if ($a->display($query, array(':username' => $mobile))) {
			$status = 2;
		}
	}

	if ($status == 0) {
		$query = 'SELECT `mphone` FROM `pharmacist` where mphone = :username and delete_status = 0 ';
		if ($a->display($query, array(':username' => $mobile))) {
			$status = 3;
		}
	}

	if ($status == 0) {
		$query = 'SELECT `mphone` FROM `patient` where mphone = :username and delete_status = 0 ';
		if ($a->display($query, array(':username' => $mobile))) {
			$status = 4;
		}
	}

	return $status;

}
/*
 *
 *add patient
 *
 *
 */
function add_patient($fname, $lname, $email, $password) {
	global $a;

	if (check_email($email) == 0) {
		$query = "SELECT * FROM  `patient_details` WHERE email = :email";
		if (!$a->display($query, array(':email' => $email))) {

			$query = "INSERT INTO `DASystem`.`patient_details` ( `fname`, `lname`, `email` , `password`, `date`) VALUES ".
			"(:fname, :lname, :email, :password, :date );";

			if ($a->execute_data($query, array(':fname' => $fname, ':lname' => $lname, ':email' => $email, ':password' => $password, ':date' => date("Y-m-d H:i:s")))) {

				return add_patient_confirm($email);

			} else {
				return 0;
			}

		} else {

			return -1;
		}
	}
	return 0;

}

function add_patient_confirm($user_name) {
	global $a;
	$code     = rand(100000, 999999);
	$aemail   = "admin@admin.com";
	$return_x = 0;
	$result   = get_a_value_from_db("admin", "id", "delete_status=0 ");

	foreach ($result as $value) {
		$aemail = $value['id'];

	}

	try {

		$statuz_resent = 0;
		$result        = get_a_value_from_db("temp_verification", "*", " email= '".$user_name."'  AND  `date` > NOW() - INTERVAL 2 HOUR  ORDER BY `temp_verification`.`date` DESC  LIMIT 1");
		foreach ($result as $value) {
			$code = $value['code'];

		}

	} catch (Exception $e) {

	}

	//INSERT INTO table (id, name, age) VALUES(1, "A", 19) ON DUPLICATE KEY UPDATE  name="A", age=19
	$query = "INSERT INTO `DASystem`.`temp_verification` ( `email`, `code`, `admin_id`, `date`) VALUES (:email, :code, :admin_id ,:datee )  ON DUPLICATE KEY UPDATE  email= :email1, code=:code1 ;";

	if ($a->execute_data($query, array(':email' => $user_name, ':code' => $code, ':admin_id' => $aemail, ':datee' => date("Y-m-d H:i:s"), ':email1' => $user_name, ':code1' => $code))) {

		$return_x = reset_password_y($user_name, $code, return_name($user_name), $aemail);

	} else {
		$return_x = 0;
	}

	if ($return_x == 0 || is_null($return_x)) {
		return $code;
	} else {

		return 1;

	}
}

/*
 *
 *
 *add_doctor
 *
 */

function add_doctor($department_name, $dfname, $dlname, $demail, $dmphone, $dlphone, $dsex, $ddob, $daddress, $dqualification, $dprev_experiencez, $djoin_date, $dpassword, $upadanimage) {
	global $a;

	if (!$dlphone) {
		$dlphone = NULL;
	}

	if (chk_mobile($dmphone) != 0 || check_email($demail) != 0) {

		return -1;
	}

	$aemail = "admin";
	$result = get_a_value_from_db("admin", "id", "delete_status=0 ");
	foreach ($result as $value) {
		$aemail = $value['id'];

	}

	$query = "SELECT * FROM  `doctor` WHERE email = :email OR mphone = :phone";
	if (!$a->display($query, array(':email' => $demail, ':phone' => $dmphone))) {

		$query = "INSERT INTO `doctor` (  `department_id`, `fname`, `lname`, `email`, `mphone`, `lphone`, `sex`, `address`, `dob`, `qualification`, `prev_experience`, `join_date`, `password`, `image`,  `date`) VALUES (  :department_id, :fname, :lname, :email, :mphone, :lphone, :sex, :address, :dob, :qualification, :prev_experience, :join_date, :password, :image,  :date );";

		if ($a->execute_data($query, array(':department_id' => $department_name, ':fname' => $dfname, ':lname' => $dlname, ':email' => $demail, ':mphone' => $dmphone, ':lphone' => $dlphone, ':sex' => $dsex, ':address' => $daddress, ':dob' => date('Y-m-d', strtotime($ddob)), ':qualification' => $dqualification, ':prev_experience' => $dprev_experiencez, ':join_date' => date('Y-m-d', strtotime($djoin_date)), ':password' => $dpassword, ':image' => $upadanimage, ':date' => date("Y-m-d H:i:s")))) {

			$result = get_a_value_from_db("doctor", "id", "email= '".$demail."'");

			$re_rerun = 1;
			foreach ($result as $value) {
				$re_rerun = $value['id'];

			}

			$return_x = reset_password_z($demail, $dpassword, return_name($demail), $aemail);

			return $re_rerun;

		} else {
			return 0;
		}

	} else {

		return -1;
	}

}

/*
 *
 * return a name
 *
 */
function return_main_name($table_name, $id) {
	$re_rerun = 0;
	$result   = get_a_value_from_db($table_name, "name", "id=".$id);
	foreach ($result as $value) {
		$re_rerun = $value['name'];

	}
	return $re_rerun;
}

/*
 *
 *return doctor details
 *
 *
 */
function return_doctor_details($id) {
	$status = 0;
	$result = get_a_value_from_db("`doctor` d LEFT JOIN department dp ON d.department_id = dp.id ", "d.* , dp.name AS department, YEAR(CURRENT_TIMESTAMP) - YEAR(dob) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(dob, 5)) AS age ", " d.id=  ".$id."    ");

	if ($result) {
		$status = 1;
	}

	return (array('success' => $status,
		'value'               => $result));
}

/*
 *
 *
 *edit_doctor
 *
 */

function edit_doctor($id, $department_name, $dfname, $dlname, $demail, $dmphone, $dlphone, $dsex, $ddob, $daddress, $dqualification, $dprev_experiencez, $djoin_date, $upadanimage) {
	global $a;
	if (!$dlphone) {
		$dlphone = NULL;
	}

	$stak = 1;
	if (chk_mobile($dmphone) != 0) {
		$query = "SELECT * FROM  `doctor` WHERE mphone = :phone";
		if ($a->display($query, array(':phone' => $dmphone))) {
			$stak = 1;
		} else {
			$stak = 0;
		}

	}
	if (check_email($demail) != 0 && $stak == 1) {
		$query = "SELECT * FROM  `doctor` WHERE email = :email";
		if ($a->display($query, array(':email' => $demail))) {
			$stak = 1;
		} else {
			$stak = 0;
		}

	}

	if ($stak == 1) {

		$query = "UPDATE  `doctor` SET  `department_id`= :department_id,  `fname` = :fname,  `lname` =  :lname, `email` =  :email, `mphone`=  :mphone ,`lphone` =  :lphone , `sex` =  :sex ,  `address` =  :address ,  `dob` =  :dob,  `qualification`=:qualification ,  `prev_experience` =  :prev_experience , `join_date` =  :join_date , `image` = :image WHERE id= :id ";

		if ($a->execute_data($query, array(':id' => $id, ':department_id' => $department_name, ':fname' => $dfname, ':lname' => $dlname, ':email' => $demail, ':mphone' => $dmphone, ':lphone' => $dlphone, ':sex' => $dsex, ':address' => $daddress, ':dob' => date('Y-m-d', strtotime($ddob)), ':qualification' => $dqualification, ':prev_experience' => $dprev_experiencez, ':join_date' => date('Y-m-d', strtotime($djoin_date)), ':image' => $upadanimage))) {

			$result = get_a_value_from_db("doctor", "id", "email= '".$demail."'");

			$re_rerun = 1;
			foreach ($result as $value) {
				$re_rerun = $value['id'];

			}

			return $re_rerun;

		} else {
			return 0;
		}

	} else {

		return -1;
	}

}

/*
 *
 * delete doctor
 *
 *
 */

function delete_doctor($id, $status) {
	global $a;

	$query = "SELECT * FROM  `doctor` WHERE id = :name";
	if ($a->display($query, array(':name' => $id))) {

		$description = $status;
		$query       = "UPDATE `doctor` SET  `delete_status` = :description, `id` = :name1  WHERE `id` = :name ;";

		if ($a->execute_data($query, array(':description' => $description, ':name' => $id, ':name1' => $id))) {

			return 1;

		} else {
			return 0;
		}

	} else {

		return -1;
	}

}

/*================================================================================================*/

/*
 *
 *
 *add_doctor
 *
 */

function add_nurse($nepartment_name, $nfname, $nlname, $nemail, $nmphone, $nsex, $ndob, $naddress, $njoin_date, $npadanimage) {
	global $a;


	if (chk_mobile($nmphone) != 0 || check_email($nemail) != 0) {

		return -1;
	}

	$query = "SELECT * FROM  `nurse` WHERE email = :email OR mphone = :phone";
	if (!$a->display($query, array(':email' => $nemail, ':phone' => $nmphone))) {

		$query = "INSERT INTO `nurse` (  `department_id`, `fname`, `lname`, `email`, `mphone`, `sex`, `address`, `dob`, `join_date`, `image`,  `date`) VALUES (  :department_id, :fname, :lname, :email, :mphone, :sex, :address, :dob, :join_date, :image,  :date );";

		if ($a->execute_data($query, array(':department_id' => $nepartment_name, ':fname' => $nfname, ':lname' => $nlname, ':email' => $nemail, ':mphone' => $nmphone, ':sex' => $nsex, ':address' => $naddress, ':dob' => date('Y-m-d', strtotime($ndob)), ':join_date' => date('Y-m-d', strtotime($njoin_date)), ':image' => $npadanimage, ':date' => date("Y-m-d H:i:s")))) {

			$result = get_a_value_from_db("nurse", "id", "email= '".$nemail."'");

			$re_rerun = 1;
			foreach ($result as $value) {
				$re_rerun = $value['id'];

			}

			return $re_rerun;

		} else {
			return 0;
		}

	} else {

		return -1;
	}

}

/*
 *
 *return nurse details
 *
 *
 */
function return_nurse_details($id) {
	$status = 0;
	$result = get_a_value_from_db("`nurse` d LEFT JOIN department dp ON d.department_id = dp.id ", "d.* , dp.name AS department, YEAR(CURRENT_TIMESTAMP) - YEAR(dob) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(dob, 5)) AS age ", " d.id=  ".$id."    ");

	if ($result) {
		$status = 1;
	}

	return (array('success' => $status,
		'value'               => $result));
}

/*
 *
 *
 *edit_nurse
 *
 */

function edit_nurse($nid, $ndepartment_name, $ndfname, $ndlname, $ndemail, $ndmphone, $ndsex, $nddob, $ndaddress, $ndjoin_date, $nupadanimage) {
	global $a;

	$stak = 1;
	if (chk_mobile($ndmphone) != 0) {
		$query = "SELECT * FROM  `nurse` WHERE mphone = :phone";
		if ($a->display($query, array(':phone' => $ndmphone))) {
			$stak = 1;
		} else {
			$stak = 0;
		}

	}
	if (check_email($ndemail) != 0 && $stak == 1) {
		$query = "SELECT * FROM  `nurse` WHERE email = :email";
		if ($a->display($query, array(':email' => $ndemail))) {
			$stak = 1;
		} else {
			$stak = 0;
		}

	}

	if ($stak == 1) {

		$query = "UPDATE  `nurse` SET  `department_id`= :department_id,  `fname` = :fname,  `lname` =  :lname, `email` =  :email, `mphone`=  :mphone  , `sex` =  :sex ,  `address` =  :address ,  `dob` =  :dob, `join_date` =  :join_date , `image` = :image WHERE id= :id ";

		if ($a->execute_data($query, array(':id' => $nid, ':department_id' => $ndepartment_name, ':fname' => $ndfname, ':lname' => $ndlname, ':email' => $ndemail, ':mphone' => $ndmphone, ':sex' => $ndsex, ':address' => $ndaddress, ':dob' => date('Y-m-d', strtotime($nddob)), ':join_date' => date('Y-m-d', strtotime($ndjoin_date)), ':image' => $nupadanimage))) {

			$result = get_a_value_from_db("nurse", "id", "email= '".$ndemail."'");

			$re_rerun = 1;
			foreach ($result as $value) {
				$re_rerun = $value['id'];

			}

			return $re_rerun;

		} else {
			return 0;
		}

	} else {

		return -1;
	}

}

/*
 *
 * delete nurse
 *
 *
 */

function delete_nurse($id, $status) {
	global $a;

	$query = "SELECT * FROM  `nurse` WHERE id = :name";
	if ($a->display($query, array(':name' => $id))) {

		$description = $status;
		$query       = "UPDATE `nurse` SET  `delete_status` = :description, `id` = :name1  WHERE `id` = :name ;";

		if ($a->execute_data($query, array(':description' => $description, ':name' => $id, ':name1' => $id))) {

			return 1;

		} else {
			return 0;
		}

	} else {

		return -1;
	}

}

/*
 *
 *
 *add_pharmacist
 *
 */

function add_pharmacist($pfname, $plname, $pemail, $pmphone, $plphone, $pduty, $paddress, $ppassword, $ppadanimage) {
	global $a;

	if (!$plphone) {
		$plphone = NULL;
	}

	if (chk_mobile($pmphone) != 0 || check_email($pemail) != 0) {

		return -1;
	}

	$aemail = "admin";
	$result = get_a_value_from_db("admin", "id", "delete_status=0 ");
	foreach ($result as $value) {
		$aemail = $value['id'];

	}

	$query = "SELECT * FROM  `pharmacist` WHERE email = :email OR mphone = :phone";
	if (!$a->display($query, array(':email' => $pemail, ':phone' => $pmphone))) {

		$query = "INSERT INTO `pharmacist` ( `fname`, `lname`, `email`, `mphone`, `lphone`, `duty`, `address`, `password`, `image`,  `date`) VALUES (  :fname, :lname, :email, :mphone, :lphone, :duty, :address, :password, :image,  :date );";

		if ($a->execute_data($query, array(':fname' => $pfname, ':lname' => $plname, ':email' => $pemail, ':mphone' => $pmphone, ':lphone' => $plphone, ':duty' => $pduty, ':address' => $paddress, ':password' => $ppassword, ':image' => $ppadanimage, ':date' => date("Y-m-d H:i:s")))) {

			$result = get_a_value_from_db("pharmacist", "id", "email= '".$pemail."'");

			$re_rerun = 1;
			foreach ($result as $value) {
				$re_rerun = $value['id'];

			}

			$return_x = reset_password_z($pemail, $ppassword, return_name($pemail), $aemail);

			return $re_rerun;

		} else {
			return 0;
		}

	} else {

		return -1;
	}

}

/*
 *
 *return pharmacist details
 *
 *
 */
function return_pharmacist_details($id) {
	$status = 0;
	$result = get_a_value_from_db(" pharmacist  ", " * ", " id= ".$id."    ");

	if ($result) {
		$status = 1;
	}

	return (array('success' => $status,
		'value'               => $result));
}

/*
 *
 *
 *edit_pharmacist
 *
 */

function edit_pharmacist($id, $pfname, $plname, $pemail, $pmphone, $plphone, $pduty, $paddress, $ppadanimage) {
	global $a;

	if (!$plphone) {
		$plphone = NULL;
	}

	if (chk_mobile($pmphone) != 0) {
		$query = "SELECT * FROM  `pharmacist` WHERE mphone = :phone";
		if ($a->display($query, array(':phone' => $pmphone))) {
			$stak = 1;
		} else {
			$stak = 0;
		}

	}
	if (check_email($pemail) != 0 && $stak == 1) {
		$query = "SELECT * FROM  `pharmacist` WHERE email = :email";
		if ($a->display($query, array(':email' => $pemail))) {
			$stak = 1;
		} else {
			$stak = 0;
		}

	}

	if ($stak == 1) {

		$query = "UPDATE `pharmacist` SET `fname` =  :fname, `lname` =  :lname, `email` = :email, `mphone` = :mphone, `lphone` = :lphone, `duty` = :duty, `address` =  :address, `image` = :image,  `date` = :date WHERE id = :id   ";

		if ($a->execute_data($query, array(':fname' => $pfname, ':lname' => $plname, ':email' => $pemail, ':mphone' => $pmphone, ':lphone' => $plphone, ':duty' => $pduty, ':address' => $paddress, ':image' => $ppadanimage, ':date' => date("Y-m-d H:i:s"), ':id' => $id))) {

			$result = get_a_value_from_db("pharmacist", "id", "id= ".$id);

			$re_rerun = 1;
			foreach ($result as $value) {
				$re_rerun = $value['id'];

			}

			return $re_rerun;

		} else {
			return 0;
		}

	} else {
		# code...
		return -1;
	}

}

/*
 *
 * delete pharmacist
 *
 *
 */

function delete_pharmacist($id, $status) {
	global $a;

	$query = "SELECT * FROM  `pharmacist` WHERE id = :name";
	if ($a->display($query, array(':name' => $id))) {

		$description = $status;
		$query       = "UPDATE `pharmacist` SET  `delete_status` = :description, `id` = :name1  WHERE `id` = :name ;";

		if ($a->execute_data($query, array(':description' => $description, ':name' => $id, ':name1' => $id))) {

			return 1;

		} else {
			return 0;
		}

	} else {

		return -1;
	}

}

function return_blood_gp() {
	$status = 1;
	$result = get_a_value_from_db("blood_group", " *", " id > 0");

	$re_rerun = 1;
	foreach ($result as $value) {
		$status = 1;
	}

	return (array('success' => $status,
		'value'               => $result));

}

function add_blood_group($group, $description) {
	global $a;

	$query = "SELECT * FROM  `blood_group` WHERE group_name = :group_name ";
	if (!$a->display($query, array(':group_name' => $group))) {

		$query = "INSERT INTO `blood_group` ( `group_name`, `last_in`, `quantity`, `description`, `date`) VALUES (  :group_name, :last_in, :quantity, :description,  :date );";

		if ($a->execute_data($query, array(':group_name' => $group, ':last_in' => date("Y-m-d H:i:s"), ':quantity' => 0, ':description' => $description, ':date' => date("Y-m-d H:i:s")))) {

			$result = get_a_value_from_db("blood_group", "id", "group_name= '".$group."'");

			$re_rerun = 1;
			foreach ($result as $value) {
				$re_rerun = $value['id'];

			}

			return $re_rerun;

		} else {
			return 0;
		}

	} else {

		return -1;
	}

}

function edit_blood($name, $quantity, $ebdescription) {
	global $a;
	$query = "UPDATE `blood_group` SET  `quantity` = :quantity , `description` = :description  WHERE  group_name = :group_name  ";

	if ($a->execute_data($query, array(':group_name' => $name, ':quantity' => $quantity, ':description' => $ebdescription))) {

		$result = get_a_value_from_db("blood_group", "id", "group_name= '".$name."'");

		foreach ($result as $value) {
			$re_rerun = $value['id'];

		}

		return $re_rerun;

	} else {
		return 0;
	}

	return 0;

}

function return_admin_details() {

	$status = 0;
	$result = get_a_value_from_db("admin", " *", " id > 0");

	$re_rerun = 1;
	foreach ($result as $value) {
		$status = 1;
	}

	return (array('success' => $status,
		'value'               => $result));

}

function edit_admin($nefname, $nelname, $neemail, $nemphone, $alphone, $nesex, $neaddress, $adescription, $nepadanimage, $apassword) {

	global $a;

	$query = "SELECT * FROM  `admin` WHERE id = :id AND password = :password";
	if (!$a->display($query, array(':id' => 1, ':password' => $apassword))) {
		return -2;
	}

	$stak = 1;
	if (chk_mobile($ndmphone) != 0) {
		$query = "SELECT * FROM  `admin` WHERE mphone = :phone";
		if ($a->display($query, array(':phone' => $nemphone))) {
			$stak = 1;
		} else {
			$stak = 0;
		}

	}
	if (check_email($ndemail) != 0 && $stak == 1) {
		$query = "SELECT * FROM  `admin` WHERE email = :email";
		if ($a->display($query, array(':email' => $neemail))) {
			$stak = 1;
		} else {
			$stak = 0;
		}

	}
	if ($stak == 1) {

		$query = "UPDATE  `admin` SET  `fname` = :fname,  `lname` =  :lname, `email` =  :email, `mphone`=  :mphone  , `lphone`=  :lphone  , `sex` =  :sex ,  `address` =  :address ,  `description` =  :description, `image` = :image WHERE id= :id ";

		if ($a->execute_data($query, array(':id' => 1, ':fname' => $nefname, ':lname' => $nelname, ':email' => $neemail, ':mphone' => $nemphone, ':lphone' => $alphone, ':sex' => $nesex, ':address' => $neaddress, ':description' => $adescription, ':image' => $nepadanimage))) {

			$result = get_a_value_from_db("admin", "id", "email= '".$neemail."'");

			$re_rerun = 1;
			foreach ($result as $value) {
				$re_rerun = $value['id'];

			}

			return $re_rerun;

		} else {
			return 0;
		}

	} else {

		return -1;
	}

}

function admin_pass_new($password0, $password1) {

	global $a;

	$query = "SELECT * FROM  `admin` WHERE id = :id AND password = :password";
	if (!$a->display($query, array(':id' => 1, ':password' => $password0))) {
		return -2;
	}

	$query = "UPDATE  `admin` SET  `password` = :password WHERE id= :id ";

	if ($a->execute_data($query, array(':id' => 1, ':password' => $password1))) {

		return 1;

	} else {
		return 0;
	}

}

/*================================================================================================================*/

function check_medicine_c_name($medicine_c_name) {
	global $a;
	$status = 0;
	$query  = 'SELECT `name` FROM `medicine_category` where name = :name  ';
	if ($a->display($query, array(':name' => $medicine_c_name))) {
		$status = 1;
	}

	return $status;

}
function add_medicine_c($name, $description) {

	global $a;

	$query = "SELECT * FROM  `medicine_category` WHERE name = :name";
	if (!$a->display($query, array(':name' => $name))) {

		$query = "INSERT INTO `DASystem`.`medicine_category` ( `name`, `description` , `date`) VALUES ".
		"(:name, :description ,:date );";

		if ($a->execute_data($query, array(':name' => $name, ':description' => $description
			, ':date'                               => date("Y-m-d H:i:s")))) {

			$result = get_a_value_from_db("medicine_category", "id", "name= '".$name."'");

		$re_rerun = 1;
		foreach ($result as $value) {
			$re_rerun = $value['id'];

		}
		return $re_rerun;

	} else {
		return 0;
	}

} else {

	return -1;
}

}

function get_medicine_c($id) {
	$result = get_a_value_from_db("medicine_category", "*", " id=".$id);

	return $result;
}

function get_medicine_c_all() {

	$result = get_a_value_from_db("medicine_category", "*", " id>0 "." ORDER BY `medicine_category`.`name` ASC");

	return $result;
}

function edit_medicine_c($id, $name, $description) {

	global $a;
	$stak = 1;

	if ($stak == 1) {

		$query = "UPDATE`DASystem`.`medicine_category` SET `name` = :name, `description` =:description WHERE id= :id ;";

		if ($a->execute_data($query, array(':name' => $name, ':description' => $description, ':id' => $id,
			))) {

			$result = get_a_value_from_db("medicine_category", "id", "name= '".$name."'");

		$re_rerun = 1;
		foreach ($result as $value) {
			$re_rerun = $value['id'];

		}
		return $re_rerun;

	} else {
		return 0;
	}

} else {

	return -1;
}

}

function check_medicine_name($medicine_c_name) {
	global $a;
	$status = 0;
	$query  = 'SELECT `name` FROM `medicines` where name = :name  ';
	if ($a->display($query, array(':name' => $medicine_c_name))) {
		$status = 1;
	}

	return $status;

}

function add_medicine($emedicine_category, $m_name, $mdescription, $npadanimage, $m_unit_price, $m_type) {

	global $a;

	$query = "SELECT * FROM  `medicines` WHERE  name = :m_name";
	if (!$a->display($query, array(':m_name' => $m_name))) {

		$query = "INSERT INTO `medicines`  (  `medicine_category_id`, `name`, `description`, `type`, `unit_price`, `image`,   `date`) VALUES  ( :medicine_category_id , :name , :description , :type , :unit_price , :image ,   :date );";

		if ($a->execute_data($query, array(':medicine_category_id' => $emedicine_category, ':name' => $m_name, ':description' => $mdescription, ':type' => $m_type, ':unit_price' => $m_unit_price, ':image' => $npadanimage, ':date' => date("Y-m-d H:i:s")))) {

			$result = get_a_value_from_db("medicines", "id", "name= '".$m_name."'");

			$re_rerun = 1;
			foreach ($result as $value) {
				$re_rerun = $value['id'];

			}

			return $re_rerun;

		} else {
			return 0;
		}

	} else {

		return -1;
	}

}

function get_medicine_d($id) {
	$result = get_a_value_from_db("medicines", "*", " id=".$id);

	return $result;
}

function edit_medicine($id, $emedicine_category, $m_name, $mdescription, $npadanimage, $m_unit_price, $mmnstatus, $m_type) {

	global $a;

	$query = "SELECT * FROM  `medicines` WHERE  name = :m_name AND id != ".$id;
	if (!$a->display($query, array(':m_name' => $m_name))) {

		$query = "UPDATE `medicines` SET  `medicine_category_id` = :medicine_category_id , `name` =:name  , `description` = :description, `type`= :type, `unit_price` =  :unit_price , `image` = :image,   `status` =  :status WHERE id = :id;";

		if ($a->execute_data($query, array(':medicine_category_id' => $emedicine_category, ':name' => $m_name, ':description' => $mdescription, ':type' => $m_type, ':unit_price' => $m_unit_price, ':image' => $npadanimage, ':status' => $mmnstatus, ':id' => $id))) {

			$result = get_a_value_from_db("medicines", "id", "id= ".$id);

			$re_rerun = 1;
			foreach ($result as $value) {
				$re_rerun = $value['id'];

			}

			return $re_rerun;

		} else {
			return 0;
		}

	} else {

		return -1;
	}

}

function delete_medicine($id, $status) {

	global $a;

	$query = "SELECT * FROM  `medicines` WHERE id = :name";
	if ($a->display($query, array(':name' => $id))) {

		$description = $status;
		$query       = "UPDATE `medicines` SET  `delete_status` = :description, `id` = :name1  WHERE `id` = :name ;";

		if ($a->execute_data($query, array(':description' => $description, ':name' => $id, ':name1' => $id))) {

			return 1;

		} else {
			return 0;
		}

	} else {

		return -1;
	}
}

function return_id_number($ch) {
	switch ($ch) {
		case 'ja':return 1;
		break;

		case 'fe':return 2;
		break;

		case 'ma':return 3;
		break;

		case 'ap':return 4;
		break;

		case 'my':return 5;
		break;

		case 'ju':return 6;
		break;

		case 'jl':return 7;
		break;

		case 'au':return 8;
		break;

		case 'se':return 9;
		break;

		case 'oc':return 10;
		break;

		case 'no':return 11;
		break;

		case 'de':return 12;
		break;

		case 'mo':return 1;
		break;

		case 'tu':return 2;
		break;

		case 'we':return 3;
		break;

		case 'th':return 4;
		break;

		case 'fr':return 5;
		break;

		case 'sa':return 6;
		break;

		case 'su':return 7;
		break;

		default:return 0;
		break;

	}
}

function return_name_number($ch, $dy) {
	if ($dy == 1) {
		switch ($ch) {
			case 1:return "Monday";
			break;

			case 2:return "Tuesday";
			break;

			case 3:return "Wednesday";
			break;

			case 4:return "Thursday ";
			break;

			case 5:return "Friday";
			break;

			case 6:return "Saturday ";
			break;

			case 7:return "Sunday";
			break;

		}
	}

	if ($dy == 0) {
		switch ($ch) {
			case 1:return "January";
			break;

			case 2:return "February";
			break;

			case 3:return "March";
			break;

			case 4:return "April";
			break;

			case 5:return "May";
			break;

			case 6:return "June";
			break;

			case 7:return "July";
			break;

			case 8:return "August";
			break;

			case 9:return "September";
			break;

			case 10:return "October";
			break;

			case 11:return "November";
			break;

			case 12:return "December";
			break;

			default:return 0;
			break;

		}
	}
}

function insert_into_moth($doctor_id, $month, $delete_status) {
	global $a;

	$query = "SELECT * FROM  `month` WHERE `doctor_id`= :doctor_id AND `month`=:month  AND delete_status=0 ;";

	if (!$a->display($query, array(':doctor_id' => $doctor_id, ':month' => $month))) {

		$query = "INSERT INTO `month` ( `doctor_id`, `month`, `delete_status`, `date`) VALUES (:doctor_id, :month, :delete_status, :date);";

		if ($a->execute_data($query, array(':doctor_id' => $doctor_id, ':month' => $month, ':delete_status' => $delete_status, ':date' => date("Y-m-d H:i:s")))) {

			return 1;

		} else {
			return 0;
		}

	}
	return 0;

}

function insert_into_week($doctor_id, $day, $time_from, $time_to, $delete_status) {
	global $a;

	$query = "SELECT * FROM `week` WHERE `doctor_id`= :doctor_id AND `day`= :day AND `time_from`= :time_from AND `time_to`=:time_to  AND delete_status=0  ;";

	if (!$a->display($query, array(':doctor_id' => $doctor_id, ':day' => $day, ':time_from' => $time_from, ':time_to' => $time_to))) {

		$query = "INSERT INTO `week` ( `doctor_id`, `day`, `time_from`, `time_to`, `date_from`, `date_to`, `delete_status`, `date`) VALUES (  :doctor_id, :day, :time_from, :time_to, NULL, NULL, :delete_status, :date) ;";

		if ($a->execute_data($query, array(':doctor_id' => $doctor_id, ':day' => $day, ':time_from' => $time_from, ':time_to' => $time_to, ':delete_status' => $delete_status, ':date' => date("Y-m-d H:i:s")))) {

			return 1;

		} else {
			return 0;
		}

	} else {
		return 0;
	}

}

function insert_into_dayz($doctor_id, $day, $date_from, $date_to, $time_from, $time_to, $delete_status) {
	global $a;

	$query = "SELECT * FROM `week` WHERE `doctor_id`= :doctor_id AND `day`=:day AND `time_from`= :time_from AND `time_to`=:time_to AND`date_from`= :date_from AND `date_to`=:date_to  AND delete_status=0  ;";

	if (!$a->display($query, array(':doctor_id' => $doctor_id, ':day' => $day, ':date_from' => $date_from, ':date_to' => $date_to, ':time_from' => $time_from, ':time_to' => $time_to))) {

		$query = "INSERT INTO `week` ( `doctor_id`, `day`, `time_from`, `time_to`, `date_from`, `date_to`, `delete_status`, `date`) VALUES (  :doctor_id, :day, :time_from, :time_to, :date_from, :date_to, :delete_status, :date) ;";

		if ($a->execute_data($query, array(':doctor_id' => $doctor_id, ':day' => $day, ':date_from' => $date_from, ':date_to' => $date_to, ':time_from' => $time_from, ':time_to' => $time_to, ':delete_status' => $delete_status, ':date' => date("Y-m-d H:i:s")))) {

			return 1;

		} else {
			return 0;
		}

		return 1;

	} else {
		return 0;
	}

}

function add_schedule($id, $varmonthz, $vardayz, $time_from, $time_to, $day_from, $day_to) {

	if (strlen($varmonthz) > 0 && strlen($vardayz) > 0) {

		$re    = "0";
		$month = explode("-", $varmonthz);

		for ($i = 0;sizeof($month) > $i; $i++) {
			$re = return_id_number($month[$i]);
			$re = insert_into_moth($id, $re, '0');

		}

		$days = explode("-", $vardayz);

		for ($i = 0;sizeof($days) > $i; $i++) {
			$re = return_id_number($days[$i]);
			$re = insert_into_week($id, $re, $time_from, $time_to, '0');

		}

		return 1;

	} else if (strlen($day_from) > 0 && strlen($day_to) > 0) {
		$col = insert_into_dayz($id, '0', $day_from, $day_to, $time_from, $time_to, '0');
		return $col;

	}

}

function get_month($id) {

	$result = get_a_value_from_db("month", "*", "delete_status =0 AND doctor_id=".$id."  ORDER BY `month`.`date` DESC");

	return $result;
}

function get_week1($id) {
	/*SELECT TIME_FORMAT('15:02:28', '%h:%i:%s %p');
	Result: '03:02:28 PM'*/
	/**/
	$result = get_a_value_from_db("week", " doctor_id,day,TIME_FORMAT(time_from, '%h:%i %p') AS time_from, time_from AS tf ,TIME_FORMAT(time_to, '%h:%i %p') AS time_to, time_to AS tt,DATE_FORMAT(date_from,'%d-%m-%Y') AS date_from,DATE_FORMAT(date_to,'%d-%m-%Y') AS date_to ,	delete_status,id,	date ", " delete_status =0 AND day !=0 AND doctor_id=".$id."  ORDER BY `week`.`date` DESC");

	return $result;
}

function get_week2($id) {

	$result = get_a_value_from_db("week", " doctor_id,day,TIME_FORMAT(time_from, '%h:%i %p') AS time_from ,TIME_FORMAT(time_to, '%h:%i %p') AS time_to,DATE_FORMAT(date_from,'%d-%m-%Y') AS date_from,DATE_FORMAT(date_to,'%d-%m-%Y') AS date_to ,	delete_status,id,	date ", "delete_status =0 AND day =0 AND doctor_id=".$id."  ORDER BY `week`.`date` DESC");

	return $result;
}

function delete_doc_schedule($id, $table) {

	global $a;

	$query = "UPDATE ".$table." SET  `delete_status` = 1    WHERE `id` = :name ;";

	if ($a->execute_data($query, array(':name' => $id))) {

		return 1;

	} else {
		return 0;
	}

}

function get_add_doc($id) {
	if (is_null($id)) {
		$id = 0;
	}

	$result = get_a_value_from_db("doctor", " * ", "department_id =".$id."  ORDER BY `doctor`.`fname` ASC");

	return $result;

}

function get_one_doc($id) {
	if (is_null($id)) {
		$id = 0;
	}

	$result = get_a_value_from_db("doctor", " * ", "id =".$id."  ORDER BY `doctor`.`fname` ASC");

	return $result;
}

function add_profile($id, $doctor_name, $dmphone, $dlphone, $dsex, $ddob, $daddress, $pblood_group, $upadanimage) {
	global $a;

	if (!$dlphone) {
		$dlphone = NULL;
	}

	if (chk_mobile($dmphone) != 0) {

		return -1;
	}

	$query = "SELECT * FROM  `patient` WHERE  mphone = :phone";
	if (!$a->display($query, array(':phone' => $dmphone))) {

		$query = "INSERT INTO `patient` ( `doctor_id`, `patient_details_id`, `mphone`, `lphone`, `sex`, `dob`, `blood_group_id`, `address`, `start_date`, `date`) VALUES (  :doctor_id, :patient_details_id, :mphone, :lphone, :sex, :dob, :blood_group_id, :address, :start_date, :date );";

		if ($a->execute_data($query, array(':doctor_id' => $doctor_name, ':patient_details_id' => $id, ':mphone' => $dmphone, ':lphone' => $dlphone, ':sex' => $dsex, ':address' => $daddress, ':dob' => date('Y-m-d', strtotime($ddob)), ':blood_group_id' => $pblood_group, ':start_date' => date("Y-m-d H:i:s"), ':date' => date("Y-m-d H:i:s")))) {

			$result = get_a_value_from_db("patient", "id", "patient_details_id= '".$id."'");

			$re_rerun = 1;
			foreach ($result as $value) {
				$re_rerun = $value['id'];

			}

			$query = "UPDATE patient_details SET `image` = :image    WHERE `id` = :name ;";

			if ($a->execute_data($query, array(':image' => $upadanimage, ':name' => $id))) {

			} else {

			}

			return $re_rerun;

		} else {
			return 0;
		}

	} else {

		return -1;
	}

}

function doctor_schedule($id) {
	if (is_null($id)) {
		$id = 0;
	}

	$result1 = get_a_value_from_db("doctor d LEFT JOIN month m ON m.doctor_id = d.id ", " DISTINCT(m.month) AS month ", " d.id = ".$id." AND d.delete_status =0 AND m.delete_status =0");

	$result2 = get_a_value_from_db("doctor d LEFT JOIN week w ON w.doctor_id = d.id ", "  DISTINCT(w.day) AS day  ", "d.id = ".$id." AND d.delete_status = 0 AND w.delete_status = 0");

	$result4 = get_a_value_from_db(" doctor d LEFT JOIN week w ON w.doctor_id = d.id ", " w.*  ", " d.id = ".$id." AND d.delete_status = 0 AND w.delete_status = 0 AND w.day = 0");

	$result3 = get_a_value_from_db(" doctor d LEFT JOIN week w ON w.doctor_id = d.id ", "  w.* ", " d.id = ".$id." AND d.delete_status = 0 AND w.delete_status = 0 AND w.day != 0");

	return (array('success' => $id,

		'month' => $result1,
		'day'   => $result2,
		'week1' => $result3,
		'week2' => $result4,
		));

}

function add_appointment($id, $did, $date, $time_from, $time_to, $description) {
	global $a;

	$query = " SELECT * FROM  `appointment` WHERE  patient_id = :patient_id AND doctor_id = :doctor_id  AND DATE_FORMAT(time_from,'%Y-%m-%d') = :fdate AND ( status= 0 OR delete_status = 0) ";

	if (!$a->display($query, array(':patient_id' => $id, ':doctor_id' => $did, ':fdate' => $date))) {

		$query = " INSERT INTO `appointment` (  `patient_id`, `doctor_id`, `time_from`, `time_to` , `description` , `date`) VALUES ( :patient_id ,:doctor_id ,:time_from ,:time_to  ,:description  ,:date  );";

		$datse = date("Y-m-d H:i:s");

		if ($a->execute_data($query, array(
			':patient_id'  => $id,
			':doctor_id'   => $did,
			':time_from'   => $date.' '.$time_from,
			':time_to'     => $date.' '.$time_to,
			':description' => $description,
			':date'        => $datse,
			))) {

			$result = get_a_value_from_db("appointment", "id", "date= '".$datse."' AND patient_id=".$id);

		$re_rerun = 1;
		foreach ($result as $value) {
			$re_rerun = $value['id'];

		}

		return $re_rerun;

	} else {
		return 0;
	}

} else {

	return -1;
}

}

function delete_appointment($id) {

	global $a;
	$query = "SELECT * FROM  `appointment` WHERE id = :name";
	if ($a->display($query, array(':name' => $id))) {

	//	$description = $status;
		$query       = "UPDATE `appointment` SET  `delete_status` = 1  WHERE `id` = :name ;";

		if ($a->execute_data($query, array(':name' => $id))) {

			return 1;

		} else {
			return 0;
		}

	} else {

		return -1;
	}

}

function return_department($id) {
	if (is_null($id)) {
		$id = 0;
	}

	$result1 = get_a_value_from_db(" appointment ", " id, DATE_FORMAT(time_from,'%Y-%m-%d %H:%i') AS date_from , DATE_FORMAT(time_to,'%Y-%m-%d %H:%i') AS date_to , description, patient_id  ", " delete_status =0 AND doctor_id =".$id);

	return (array('success' => $id,

		'events' => $result1,
		));

}

function return_patient_e($id) {
	if (is_null($id)) {
		$id = 0;
	}

	$result1 = get_a_value_from_db(" patient p LEFT JOIN patient_details pd ON p.patient_details_id = pd.id LEFT JOIN guardian g ON g.patient_id = p.id LEFT JOIN blood_group b ON p.blood_group_id = b.id LEFT JOIN doctor d ON p.doctor_id = d.id LEFT JOIN department dp ON d.department_id = dp.id   ", " pd.*,p.*, g.name AS gname,g.address AS gaddress, g.mphone AS gmphone, g.lphone AS glphone, g.relation AS grelation ,p.delete_status AS status_delete , b.group_name AS group_name, DATE_FORMAT(p.dob,'%d-%m-%Y') AS fdob, DATE_FORMAT(p.start_date,'%d-%m-%Y') AS fstart_date,   CONCAT( d.fname,' ',d.lname) AS doctor ,dp.name AS department, d.email AS demail  ", "  p.id=".$id." ORDER BY p.date");

	return (array('success' => $id,

		'patient' => $result1,
		));

}

function add_bed($name, $description) {
	global $a;

	$query = "INSERT INTO `DASystem`.`bed` ( `type`, `room_description` , `date`) VALUES ".
	"(:name, :description ,:date );";

	$datse = date("Y-m-d H:i:s");
	if ($a->execute_data($query, array(':name' => $name, ':description' => $description
		, ':date'                               => $datse))) {

		$result = get_a_value_from_db("bed", "id", "date= '".$datse."'");

	$re_rerun = 1;
	foreach ($result as $value) {
		$re_rerun = $value['id'];

	}

	return $re_rerun;

} else {
	return 0;
}

}

function edit_bed($name, $id, $description) {
	global $a;

	$query = "SELECT * FROM  `bed` WHERE id = :name_old";
	if ($a->display($query, array(':name_old' => $id))) {

		$query = "UPDATE `bed` SET `type` = :name , `room_description` = :description WHERE `id` = :name_old;";

		if ($a->execute_data($query, array(':name' => $name, ':description' => $description
			, ':name_old'                           => $id))) {

			return 1;

	} else {
		return 0;
	}

} else {

	return -1;
}

}

function delete_bed($id) {
	global $a;
	$query = "SELECT * FROM  `bed` WHERE id = :name";
	if ($a->display($query, array(':name' => $id))) {

		// $description = $status;
		$query       = "UPDATE `bed` SET  `delete_status` = 1  WHERE `id` = :name ;";

		if ($a->execute_data($query, array(':name' => $id))) {

			return 1;

		} else {
			return 0;
		}

	} else {

		return -1;
	}
}

function return_bed() {
	$result1 = get_a_value_from_db(" bed  ", " * ", " id NOT IN ( SELECT DISTINCT(bed_id) FROM prescription WHERE delete_status=0 AND NOW() <= discharge )");
	return (array('success' => 1,
		'patient'             => $result1,
		));
}

function return_medicines5($id) {
	$result1 = get_a_value_from_db(" medicines  ", " * ", " medicine_category_id =".$id." ORDER BY `name` ASC ");

	return (array('success' => 1,
		'patient'             => $result1,
		));

}

//echo $encrypted = encrypt($string, ENCRYPTION_KEY);
//echo $decrypted = decrypt($encrypted, ENCRYPTION_KEY);
function add_prescription($pid, $did, $subject, $description, $bed_id, $discharge) {
	global $a;

	if ($bed_id == NULL) {
		$bed_id = 0;
	}

	$query = "INSERT INTO `DASystem`.`prescription` ( `patient_id`, `doctor_id`, `subject`, `description`, `bed_id`, `discharge`, `date`) VALUES ".
	"( :patient_id, :doctor_id, :subject, :description, :bed_id, :discharge, :date );";

	$datse = date("Y-m-d H:i:s");

	if ($a->execute_data($query, array(':patient_id' => $pid,
		':doctor_id'                                  => $did,
		':subject'                                    => $subject,
		':description'                                => $description,
		':bed_id'                                     => $bed_id,
		':discharge'                                  => date('Y-m-d H:i:s', strtotime($discharge)),
		':date'                                       => $datse))) {

		$result = get_a_value_from_db("prescription", "id", "date= '".$datse."'");

	$re_rerun = 1;
	foreach ($result as $value) {
		$re_rerun = $value['id'];

	}

	$co = update_appo_Status($did, $pid);
	return $re_rerun;

} else {
	return 0;
}

}

function add_prescribe($id, $medicines_id, $time, $amount, $description, $date_from, $date_to) {

	global $a;

	$query = "INSERT INTO `DASystem`.`prescribe` ( `prescription_id`, `medicines_id`, `time`, `amount`, `description`, `date_from`, `date_to`, `date`) VALUES ".
	"( :prescription_id, :medicines_id, :time, :amount, :description, :date_from, :date_to, :date );";

	$datse = date("Y-m-d H:i:s");

	if ($a->execute_data($query, array(
		':prescription_id' => $id,
		':medicines_id'    => $medicines_id,
		':time'            => $time,
		':amount'          => $amount,
		':description'     => $description,
		':date_from'       => date('Y-m-d', strtotime($date_from)),
		':date_to'         => date('Y-m-d', strtotime($date_to)),
		':date'            => $datse))) {

		$re_rerun = 1;

	return $re_rerun;

} else {
	return 0;
}

}

function check_blood($id, $amount) {
	$result = get_a_value_from_db("blood_group", " * ", " id=".$id);

	$re_rerun = 0;
	foreach ($result as $value) {
		$re_rerun = $value['quantity'];

	}
	if ($amount <= $re_rerun) {
		return 1;
	} else {

		return 0;

	}
}

function add_blood_mang($id, $amount, $group) {
	global $a;

	if (check_blood($group, $amount) == 1) {

		$now_Av = 0;
		$result = get_a_value_from_db("blood_group", " * ", " id=".$group);

		$re_rerun = 0;
		foreach ($result as $value) {
			$re_rerun = $value['quantity'];

		}
		$now_Av = $re_rerun-$amount;

		if ($now_Av < 0) {
			return 0;
		}

		$query = "INSERT INTO `DASystem`.`blood_manage` ( `blood_group_id`, `prescription_id`, `amount`, `date`) VALUES ".
		"( :blood_group_id, :prescription_id, :amount, :date );";

		$datse = date("Y-m-d H:i:s");

		if ($a->execute_data($query, array(
			':blood_group_id'  => $group,
			':prescription_id' => $id,
			':amount'          => $amount,
			':date'            => $datse))) {

			$query = "UPDATE `blood_group` SET  `quantity` = :quantity ,`last_out` = :last_out WHERE `id` = :name ;";

		if ($a->execute_data($query, array(':quantity' => $now_Av, ':last_out' => date("Y-m-d H:i:s"), ':name' => $group))) {

			return 1;

		} else {
			return 0;
		}

	} else {
		return 0;
	}

} else {
	return 0;
}

}

function update_appo_Status($doctor_id, $patient_id) {
	global $a;

	$query = "UPDATE `appointment` SET `status` = '1' WHERE doctor_id = :doctor_id AND patient_id = :patient_id";

	if ($a->execute_data($query, array(':doctor_id' => $doctor_id, ':patient_id' => $patient_id))) {

		return 1;

	} else {
		return 0;
	}

}

function delete_prescription($id) {
	global $a;

	$query = "UPDATE `prescription` SET `delete_status` = '1' WHERE id = :id";

	if ($a->execute_data($query, array(':id' => $id))) {

		return 1;

	} else {
		return 0;
	}

}

function update_profile($id, $dfname, $dlname, $demail, $dmphone, $daddress, $dpassword, $upadanimage) {
	global $a;


	$query = "SELECT * FROM  `doctor` WHERE id = :id AND password = :password";
	if ($a->display($query, array(':id' => $id, ':password' => $dpassword))) {

	} else {
		return -2;
	}

	$stak = 1;
	if (chk_mobile($dmphone) != 0) {
		$query = "SELECT * FROM  `doctor` WHERE mphone = :phone";
		if ($a->display($query, array(':phone' => $dmphone))) {
			$stak = 1;
		} else {
			$stak = 0;
		}

	}
	if (check_email($demail) != 0 && $stak == 1) {
		$query = "SELECT * FROM  `doctor` WHERE email = :email";
		if ($a->display($query, array(':email' => $demail))) {
			$stak = 1;
		} else {
			$stak = 0;
		}

	}

	if ($stak == 1) {

		$query = "UPDATE  `doctor` SET   `fname` = :fname,  `lname` =  :lname, `email` =  :email, `mphone`=  :mphone , `address` =  :address ,  `image` = :image WHERE id= :id ";

		if ($a->execute_data($query, array(':id' => $id,
			':fname'                              => $dfname,
			':lname'                              => $dlname,
			':email'                              => $demail,
			':mphone'                             => $dmphone,
			':address'                            => $daddress,
			':image'                              => $upadanimage))) {

			$result = get_a_value_from_db("doctor", "id", "email='".$demail."'");

		$re_rerun = 1;
		foreach ($result as $value) {
			$re_rerun = $value['id'];

		}

		return $re_rerun;

	} else {
		return 0;
	}

} else {

	return -1;
}

}

function doc_pass_new($id, $password0, $password1) {

	global $a;

	$query = "SELECT * FROM  `doctor` WHERE id = :id AND password = :password";
	if (!$a->display($query, array(':id' => $id, ':password' => $password0))) {
		return -2;
	}

	$query = "UPDATE  `doctor` SET  `password` = :password WHERE id= :id ";

	if ($a->execute_data($query, array(':id' => $id, ':password' => $password1))) {

		return 1;

	} else {
		return 0;
	}

}

function pat_update_profile($my_zxid, $pfname, $plname, $pemail, $id, $doctor_name, $dmphone, $dlphone, $dsex, $ddob, $daddress, $pblood_group, $upadanimage, $pgname, $pgrelation, $pgmphone, $pglphone, $pgaddress, $ppassword) {

	global $a;
	if (!$dlphone) {
		$dlphone = NULL;
	}

	$query = "SELECT * FROM  `patient_details` WHERE id = :id AND password = :password";
	if ($a->display($query, array(':id' => $my_zxid, ':password' => $ppassword))) {

	} else {
		return -2;
	}

	$stak = 1;
	if (chk_mobile($dmphone) != 0) {
		$query = "SELECT * FROM  `patient` WHERE mphone = :phone AND id =:id";
		if ($a->display($query, array(':phone' => $dmphone, ':id' => $id))) {
			$stak = 1;
		} else {
			$stak = 0;
		}

	}
	if (check_email($pemail) != 0 && $stak == 1) {
		$query = "SELECT * FROM  `patient_details` WHERE email = :email AND id = :id";
		if ($a->display($query, array(':email' => $pemail, ':id' => $my_zxid))) {
			$stak = 1;
		} else {
			$stak = 0;
		}

	}

	if ($stak == 1) {

		$query = "UPDATE  `patient_details` SET   `fname` = :fname,  `lname` =  :lname, `email` =  :email,  `image` = :image WHERE id= :id ";

		if ($a->execute_data($query, array(':id' => $my_zxid,
			':fname'                              => $pfname,
			':lname'                              => $plname,
			':email'                              => $pemail,
			':image'                              => $upadanimage))) {

			$re_rerun = 1;

			//$re_rerun;

	} else {
		return 0;
	}

	$query = "UPDATE  `patient` SET  `doctor_id`= :doctor_id, `mphone` = :mphone,  `lphone` =  :lphone, `sex` =  :sex ,  `dob` =  :dob ,  `blood_group_id` =  :blood_group_id ,  `address` =  :address , `date` = :date  WHERE id= :id ";

	if ($a->execute_data($query, array(':id' => $id,
		':mphone'                             => $dmphone,
		':lphone'                             => $dlphone,
		':sex'                                => $dsex,
		':dob'                                => date('Y-m-d', strtotime($ddob)),
		':blood_group_id'                     => $pblood_group,
		':address'                            => $daddress,
		':doctor_id'                          => $doctor_name,
		':date'                               => date("Y-m-d H:i:s")
		))) {

		$re_rerun = 1;

			//$re_rerun;

} else {
	return 0;
}

$result = get_a_value_from_db("guardian", "id", "patient_id='".$id."'");

$re_rerunzz = 0;
foreach ($result as $value) {
	$re_rerunzz = $value['id'];

}

if ($re_rerunzz > 0) {
	$query = "UPDATE  `guardian` SET  `name`= :name, `address` = :address,  `lphone` =  :lphone, `mphone` =  :mphone ,  `relation` =  :relation  WHERE  	patient_id= :id ";
	if ($a->execute_data($query, array(':id' => $id,
		':mphone'                             => $pgmphone,
		':lphone'                             => $pglphone,
		':name'                               => $pgname,
		':address'                            => $pgaddress,
		':relation'                           => $pgrelation,
		))) {

		$re_rerun = 1;

	return $re_rerun;
				//$re_rerun;

} else {
	return 0;
}

} else {
	$query = "INSERT INTO  `guardian`  (  `patient_id`, `name`, `address`, `mphone`, `lphone`, `relation`,  `date`) VALUES (  :patient_id ,  :name ,  :address ,  :mphone ,  :lphone ,  :relation, :date ) ";

	if ($a->execute_data($query, array(':patient_id' => $id,
		':name'                                       => $pgname,
		':address'                                    => $pgaddress,
		':mphone'                                     => $pgmphone,
		':lphone'                                     => $pglphone,
		':relation'                                   => $pgrelation,
		':date'                                       => date("Y-m-d H:i:s")
		))) {

		$re_rerun = 1;

	return $re_rerun;

				//$re_rerun;

} else {
	return 0;
}
}

} else {

	return -1;
}

}

function pat_pass_new($id, $password0, $password1) {

	global $a;

	$query = "SELECT * FROM  `patient_details` WHERE id = :id AND password = :password";
	if (!$a->display($query, array(':id' => $id, ':password' => $password0))) {
		return -2;
	}

	$query = "UPDATE  `patient_details` SET  `password` = :password WHERE id= :id ";

	if ($a->execute_data($query, array(':id' => $id, ':password' => $password1))) {

		return 1;

	} else {
		return 0;
	}

}

function get_for_pamnt($id) {
	if (is_null($id)) {
		$id = 0;
	}

	$result  = get_a_value_from_db(" prescription ", " * ", "id =".$id."  ");
	$patient = 0;
	foreach ($result as $value) {
		$patient = $value['patient_id'];

	}

	$result1 = get_a_value_from_db("  `patient` p LEFT JOIN patient_details pd ON p.patient_details_id = pd.id  ", "  *  ", " p.id= ".$patient);

	$result4 = get_a_value_from_db("  `prescribe` p LEFT JOIN medicines m ON p.medicines_id = m.id  ", " * ", "  p.prescription_id = ".$id." ORDER BY m.name ");

	return (array('success' => $id,

		'patient'   => $result1,
		'prescribe' => $result4,
		));

}

function add_a_payment($xid, $did, $amount) {
	global $a;
	$query = "SELECT * FROM  `payment` WHERE prescription_id = :prescription_id AND amount = :amount";
	if (!$a->display($query, array(':prescription_id' => $xid, ':amount' => $amount))) {

		$query       = "INSERT INTO `payment` (  `pharmacist_id`, `prescription_id`, `amount`, `date`) VALUES (    :pharmacist_id  , :prescription_id  , :amount  , :date  );";

		if ($a->execute_data($query, array(':pharmacist_id' => $did, ':prescription_id' => $xid, ':amount' => $amount, ':date' => date("Y-m-d H:i:s")))) {

			return 1;

		} else {
			return 0;
		}

	} else {

		return -1;
	}

}

function add_noticeboard($name, $description) {
	global $a;

	$query = "INSERT INTO `notifications` (  `admin_id`, `subject`, `description`, `date`) VALUES (    :admin_id  , :subject  , :description  , :date  );";

	$dat = date("Y-m-d H:i:s");
	if ($a->execute_data($query, array(':admin_id' => 1, ':subject' => $name, ':description' => $description, ':date' => $dat))) {

		$result = get_a_value_from_db("notifications", "id", "date='".$dat."'");

		$re_rerunzz = 0;
		foreach ($result as $value) {
			$re_rerunzz = $value['id'];

		}

		return $re_rerunzz;

	} else {
		return 0;
	}

}

function delete_noticeboard($id) {

	global $a;

	$query = "SELECT * FROM  `notifications` WHERE id = :id ";
	if (!$a->display($query, array(':id' => $id, ))) {
		return 0;
	}

	$query = "UPDATE  `notifications` SET  `delete_status` = :password WHERE id= :id ";

	if ($a->execute_data($query, array(':id' => $id, ':password' => 1))) {

		return 1;

	} else {
		return 0;
	}

}

function pha_pass_new($id, $password0, $password1) {

	global $a;

	$query = "SELECT * FROM  `pharmacist` WHERE id = :id AND password = :password";
	if (!$a->display($query, array(':id' => $id, ':password' => $password0))) {
		return -2;
	}

	$query = "UPDATE  `pharmacist` SET  `password` = :password WHERE id= :id ";

	if ($a->execute_data($query, array(':id' => $id, ':password' => $password1))) {

		return 1;

	} else {
		return 0;
	}

}

function get_message_d($id, $pid, $status) {

	//DATE_FORMAT(date, '%Y-%m-%dT%TZ')
	$result = get_a_value_from_db("   `message` m LEFT JOIN doctor d ON m.doctor_id = d.id LEFT JOIN patient p ON m.patient_id = p.id LEFT JOIN patient_details pd ON p.patient_details_id = pd.id   ", " m.*,  CONCAT(pd.fname, ' ', pd.lname) AS patient, CONCAT(d.fname, ' ', d.lname) AS doctor, d.image AS dimage, pd.image AS pimage, m.message_description AS message ,DATE_FORMAT(m.date, '%Y-%m-%dT%TZ') AS xdate , DATE_FORMAT(m.read_at,'%d-%m-%Y %r')  AS read_ata ", "   m.doctor_id = ".$id."  AND m.patient_id =".$pid."  AND m.delete_status =0   ORDER BY m.date ");

	update_read($result, $status);

	return (array('success' => $id,
		'message'             => $result,
		));

}

function enter_message($id, $message, $to) {
	global $a;

	$query = "INSERT INTO `message` (  `doctor_id`, `patient_id`, `patient_doctor`, `message_description` , `date`) VALUES (    :doctor_id  , :patient_id  , :patient_doctor , :message_description , :date  );";

	$dat = date("Y-m-d H:i:s");
	if ($a->execute_data($query, array(':doctor_id' => $id, ':patient_id' => $to, ':patient_doctor' => 0, ':message_description' => $message, ':date' => $dat))) {

		$result = get_a_value_from_db("message", "id", "date='".$dat."'");

		$re_rerunzz = 0;
		foreach ($result as $value) {
			$re_rerunzz = $value['id'];

		}

		return $re_rerunzz;

	} else {
		return 0;
	}

}

function enter_message_repay($id, $message, $to) {
	global $a;

	$query = "INSERT INTO `message` (  `doctor_id`, `patient_id`, `patient_doctor`, `message_description` , `date`) VALUES (    :doctor_id  , :patient_id  , :patient_doctor , :message_description , :date  );";

	$dat = date("Y-m-d H:i:s");
	if ($a->execute_data($query, array(':doctor_id' => $to, ':patient_id' => $id, ':patient_doctor' => 1, ':message_description' => $message, ':date' => $dat))) {

		$result = get_a_value_from_db("message", "id", "date='".$dat."'");

		$re_rerunzz = 0;
		foreach ($result as $value) {
			$re_rerunzz = $value['id'];

		}

		return $re_rerunzz;

	} else {
		return 0;
	}

}

function get_new_one_doc($fid, $tid, $time, $status) {

	if ($time == null || $fid == null || $tid == null) {
		return (array('success' => $fid,
			'message'             => null
			));
	}

	$result = get_a_value_from_db("   `message` m LEFT JOIN doctor d ON m.doctor_id = d.id LEFT JOIN patient p ON m.patient_id = p.id LEFT JOIN patient_details pd ON p.patient_details_id = pd.id   ", " m.*,  CONCAT(pd.fname, ' ', pd.lname) AS patient, CONCAT(d.fname, ' ', d.lname) AS doctor, d.image AS dimage, pd.image AS pimage, m.message_description AS message ,DATE_FORMAT(m.date, '%Y-%m-%dT%TZ') AS xdate,  DATE_FORMAT(m.read_at,'%d-%m-%Y %r')  AS read_ata  ", "   m.doctor_id = ".$tid."  AND m.patient_id =".$fid." AND m.date> '".date('Y-m-d H:i:s', strtotime($time))."' AND  m.delete_status =0  AND m.patient_doctor =".$status."  ORDER BY m.date ");

	update_read($result, $status);

	return (array('success' => $fid,
		'message'             => $result,
		));

}

function update_read($message, $doc) {
	global $a;

	if ($message == null) {
		return;
	}

	foreach ($message as $value) {

		$re_rerunzz = $value['id'];

		if ($doc == 1) {
			$query = "UPDATE  `message` SET `readed` = 1 , `read_at` = :date  WHERE  patient_doctor = 1 AND readed =0 AND id = ".$re_rerunzz;
		} else if ($doc == 0) {
			$query = "UPDATE  `message` SET `readed` = 1 , `read_at` = :date  WHERE  patient_doctor = 0 AND readed = 0 AND id = ".$re_rerunzz;
		}

		if ($a->execute_data($query, array(':date' => date("Y-m-d H:i:s")))) {

		} else {

		}

	}

}

function delete_this_msg($id) {
	global $a;

	$query = "UPDATE  `message` SET `delete_status` = 1  WHERE   id = :id";

	if ($a->execute_data($query, array(':id' => $id))) {

		return 1;
	} else {
		return 0;
	}

}

function get_read_is_doc($id) {

	if ($id == null || $id == 0) {
		return (array('success' => 0,
			'message'             => null
			));
	}

	$result = get_a_value_from_db("  `message`  ", "   DATE_FORMAT(read_at,'%d-%m-%Y %r')  AS read_ata  ", "    id=".$id."  AND readed = 1  AND  delete_status =0  ");

	return (array('success' => $id,
		'message'             => $result,
		));

}

function get_msg_not_read_is_doc($id) {

	if ($id == null || $id == 0) {
		return (array('success' => 0,
			'message'             => null
			));
	}

	$result = get_a_value_from_db("  `message`  ", "   COUNT(*) AS number, doctor_id  ", "    patient_id=".$id."  AND readed = 0 AND patient_doctor=0 AND delete_status = 0 GROUP BY(doctor_id)");

	return (array('success' => $id,
		'message'             => $result,
		));

}

function get_msg_not_read_is_doc_1($id) {

	if ($id == null || $id == 0) {
		return (array('success' => 0,
			'message'             => null
			));
	}

	$result = get_a_value_from_db("  `message` m LEFT JOIN patient p ON m.patient_id = p.id LEFT JOIN patient_details pd ON p.patient_details_id = pd.id   ", " p.id AS pid,  COUNT(*) AS number , patient_id ,pd.image, CONCAT(pd.fname, ' ', pd.lname) AS name  ", "   m.doctor_id=".$id." AND m.readed = 0 AND m.patient_doctor=1 AND m.delete_status = 0 GROUP BY(m.patient_id)   ");

	return (array('success' => $id,
		'message'             => $result,
		));

}





function endTheVidoCall($id ,$did ,$table, $key ) {
	global $a;

	$va = 0;

	if($table == 'p')
		$va = 1;

	if($table == 'd')
		$va = 0;
 
	$query = "UPDATE `call_log` SET `date_to` =  CURRENT_TIMESTAMP  WHERE `call_log`.`description` = :key AND patient_doctor = :patient_doctor  AND doctor_id = :doctor_id AND patient_id = :patient_id ";

	if ($a->execute_data($query, array(':key' => $key, 
		':patient_doctor' => $va,
		':doctor_id' => $id,
		':patient_id' => $did

		))) {

		return 1;

} else {
	return 0;
}
}



function takTheVidoCall($id ,$did ,$table, $key ) {
	global $a;

	$va = 0;

	if($table == 'p')
		$va = 1;

	if($table == 'd')
		$va = 0;


	$query = "UPDATE `call_log` SET `missed` =  0  WHERE `call_log`.`description` = :key   AND doctor_id = :doctor_id AND patient_id = :patient_id ";

	if ($a->execute_data($query, array(':key' => $key, 
		':doctor_id' => $id,
		':patient_id' => $did

		))) {

		return 1;

} else {
	return 0;
}
}








function get_call_log_d($id, $pid, $status) {

	//DATE_FORMAT(date, '%Y-%m-%dT%TZ')
	$result = get_a_value_from_db("   `call_log` m LEFT JOIN doctor d ON m.doctor_id = d.id LEFT JOIN patient p ON m.patient_id = p.id LEFT JOIN patient_details pd ON p.patient_details_id = pd.id  ", "   m.*, CONCAT(pd.fname, ' ', pd.lname) AS patient, CONCAT(d.fname, ' ', d.lname) AS doctor, d.image AS dimage, pd.image AS pimage, m.description AS call_de ,DATE_FORMAT(m.date, '%Y-%m-%dT%TZ') AS xdate , DATE_FORMAT(m.date_from,'%d-%m-%Y %r') AS date_from , DATE_FORMAT(m.date_to,'%d-%m-%Y %r') AS date_to , m.date_from AS df , m.date_to AS dt ", "   m.doctor_id = ".$id."  AND m.patient_id =".$pid."  AND m.delete_status =0   ORDER BY m.date ");

	update_read($result, $status);

	return (array('success' => $id,
		'message'             => $result,
		));

}









function check_call_acept($id ,$did ,$table, $key ) {
	global $a;

	$va = 0;

	if($table == 'p')
		$va = 1;

	if($table == 'd')
		$va = 0;



	$result = get_a_value_from_db("call_log", "id", "`call_log`.`description` = '".$key."' AND patient_doctor = ".$va."  AND doctor_id = ".$id." AND patient_id = ".$did." AND missed =1 ");

	$re_rerunzz = 0;
	foreach ($result as $value) {
		$re_rerunzz = $value['id'];

	}

	return $re_rerunzz;

}





function get_new_call_for_doc( $id , $status) {
 
	if ( $id == null || $status == null) {
		return (array('success' => $id,
			'message'             => null
			));
	}
 	
 	if( $status == 1)
$result = get_a_value_from_db("  `call_log` c LEFT JOIN patient p ON c.patient_id = p.id LEFT JOIN patient_details pd ON p.patient_details_id = pd.id   ", " c.description, p.id, CONCAT(pd.fname,' ',pd.lname) AS name, DATE_FORMAT(c.date,'%d-%m-%Y %r') AS image,pd.image ,DATE_FORMAT(c.date, '%Y-%m-%dT%TZ') AS xdate  ", "c.doctor_id =".$id." AND c.patient_doctor = 1 AND c.missed = 1 AND c.date_to IS NULL  AND  c.date > NOW() - INTERVAL 1 MINUTE  

	ORDER BY c.date DESC ");

 	if( $status == 0)
$result = get_a_value_from_db("   `call_log` c LEFT JOIN doctor d ON c.doctor_id = d.id ", "  c.description, d.id, CONCAT( d.fname,' ', d.lname) AS name, DATE_FORMAT(c.date,'%d-%m-%Y %r') AS image, d.image, DATE_FORMAT(c.date, '%Y-%m-%dT%TZ') AS xdate  ", "c.patient_id =".$id." AND c.patient_doctor = 0 AND c.missed = 1 AND c.date_to IS NULL AND  c.date > NOW() - INTERVAL 1 MINUTE

	ORDER BY c.date DESC "); 


update_read($result, $status);

return (array('success' => $id,
	'message'             => $result,
	));



}






function check_call_acept_time_ou(  $key ) {

	global $a;

 
 


	$result = get_a_value_from_db("call_log", "id", "`call_log`.`description` = '".$key."'  AND missed =1 AND date_to IS NOT NULL ");

	$re_rerunzz = 0;
	foreach ($result as $value) {
		$re_rerunzz = $value['id'];

	}

	return $re_rerunzz;

}











function retun_body($user_name, $system_name, $action_url, $operating_system, $browser_name, $support_url, $Company_Name) {
	$avorll = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Set up a new password for '.$system_name.'</title> </head>
		<body style="-webkit-text-size-adjust: none; box-sizing: border-box; color: #74787E; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; height: 100%; line-height: 1.4; margin: 0; width: 100% !important;" bgcolor="#F2F4F6"><style type="text/css">
			body {
				width: 100% !important;
				height: 100%;
				margin: 0;
				line-height: 1.4;
				background-color: #F2F4F6;
				color: #74787E;
				-webkit-text-size-adjust: none;

			}
			@media only screen and (max-width: 600px) {
				.email-body_inner {
					width: 100% !important;
				}
				.email-footer {
					width: 100% !important;
				}
			}
			@media only screen and (max-width: 500px) {
				.button {
					width: 100% !important;
				}
			}
		</style>
		<span class="preheader" style="box-sizing: border-box; display: none !important; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">Use this link to reset your password. The link is only valid for 24 hours.</span>
		<table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; margin: 0; padding: 0; width: 100%;" bgcolor="#F2F4F6">
			<tr>
				<td align="center" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">
					<table class="email-content" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; margin: 0; padding: 0; width: 100%;">
						<tr>
							<td class="email-masthead" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; padding: 25px 0;" align="center">
								<a href="https://example.com" class="email-masthead_name" style="box-sizing: border-box; color: #bbbfc3; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 16px; font-weight: bold; text-decoration: none; text-shadow: 0 1px 0 white;">
									'.$system_name.'
								</a>
							</td>
						</tr>

						<tr>
							<td class="email-body" width="100%" cellpadding="0" cellspacing="0" style="-premailer-cellpadding: 0; -premailer-cellspacing: 0; border-bottom-color: #EDEFF2; border-bottom-style: solid; border-bottom-width: 1px; border-top-color: #EDEFF2; border-top-style: solid; border-top-width: 1px; box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; margin: 0; padding: 0; width: 100%;" bgcolor="#FFFFFF">
								<table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; margin: 0 auto; padding: 0; width: 570px;" bgcolor="#FFFFFF">

									<tr>
										<td class="content-cell" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; padding: 35px;">
											<h1 style="box-sizing: border-box; color: #2F3133; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 19px; font-weight: bold; margin-top: 0;" align="left">Hi '.$user_name.',</h1>
											<p style="box-sizing: border-box; color: #74787E; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;" align="left">You recently requested to reset your password for your '.$system_name.'account. Use the button below to reset it. <strong style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">This password reset is only valid for the next 2 hours.</strong></p>

											<table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; margin: 30px auto; padding: 0; text-align: center; width: 100%;">
												<tr>
													<td align="center" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">

														<table width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">
															<tr>
																<td align="center" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">
																	<table border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">
																		<tr>
																			<td style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">
																				<a href="'.$action_url.'" class="button button--green" target="_blank" style="-webkit-text-size-adjust: none; background: #22BC66; border-color: #22bc66; border-radius: 3px; border-style: solid; border-width: 10px 18px; box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16); box-sizing: border-box; color: #FFF; display: inline-block; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; text-decoration: none;">Reset your password</a>
																			</td>
																		</tr>
																	</table>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
											<p style="box-sizing: border-box; color: #74787E; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;" align="left">For security, this request was received from a '.$operating_system.' device using '.$browser_name.'. If you did not request a password reset, please ignore this email or <a href="'.$support_url.'" style="box-sizing: border-box; color: #3869D4; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">contact support</a> if you have questions.</p>
											<p style="box-sizing: border-box; color: #74787E; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;" align="left">Thanks,
												<br />The '.$system_name.' Team</p>

												<table class="body-sub" style="border-top-color: #EDEFF2; border-top-style: solid; border-top-width: 1px; box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; margin-top: 25px; padding-top: 25px;">
													<tr>
														<td style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">
															<p class="sub" style="box-sizing: border-box; color: #74787E; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;" align="left">If you’re having trouble with the button above, copy and paste the URL below into your web browser.</p>
															<p class="sub" style="box-sizing: border-box; color: #74787E; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;" align="left">'.$action_url.'</p>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">
									<table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; margin: 0 auto; padding: 0; text-align: center; width: 570px;">
										<tr>
											<td class="content-cell" align="center" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; padding: 35px;">
												<p class="sub align-center" style="box-sizing: border-box; color: #AEAEAE; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;" align="center">© 2016 '.$system_name.'. All rights reserved.</p>
												<p class="sub align-center" style="box-sizing: border-box; color: #AEAEAE; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;" align="center">
													'.$Company_Name.'
													<br />1234 Street Rd.
													<br />Suite 1234
												</p>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</body>
		</html>
		';
		return $avorll;
	}

	function retun_body_welcome($user_name, $system_name, $action_url, $login_url, $username, $trial_start_date, $support_email, $Sender_Name, $Company_Name) {
		$avorll = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<title>Welcome to '.$system_name.', '.$user_name.'!</title>


		</head>
		<body style="-webkit-text-size-adjust: none; box-sizing: border-box; color: #74787E; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; height: 100%; line-height: 1.4; margin: 0; width: 100% !important;" bgcolor="#F2F4F6"><style type="text/css">
			body {
				width: 100% !important;
				height: 100%;
				margin: 0;
				line-height: 1.4;
				background-color: #F2F4F6;
				color: #74787E;
				-webkit-text-size-adjust: none;

			}
			@media only screen and (max-width: 600px) {
				.email-body_inner {
					width: 100% !important;
				}
				.email-footer {
					width: 100% !important;
				}
			}
			@media only screen and (max-width: 500px) {
				.button {
					width: 100% !important;
				}
			}
		</style>
		<span class="preheader" style="box-sizing: border-box; display: none !important; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">Thanks for trying out '.$system_name.'. We’ve pulled together some information and resources to help you get started.</span>
		<table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; margin: 0; padding: 0; width: 100%;" bgcolor="#F2F4F6">
			<tr>
				<td align="center" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">
					<table class="email-content" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; margin: 0; padding: 0; width: 100%;">
						<tr>
							<td class="email-masthead" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; padding: 25px 0;" align="center">
								<a href="https://example.com" class="email-masthead_name" style="box-sizing: border-box; color: #bbbfc3; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 16px; font-weight: bold; text-decoration: none; text-shadow: 0 1px 0 white;">
									'.$system_name.'
								</a>
							</td>
						</tr>

						<tr>
							<td class="email-body" width="100%" cellpadding="0" cellspacing="0" style="-premailer-cellpadding: 0; -premailer-cellspacing: 0; border-bottom-color: #EDEFF2; border-bottom-style: solid; border-bottom-width: 1px; border-top-color: #EDEFF2; border-top-style: solid; border-top-width: 1px; box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; margin: 0; padding: 0; width: 100%;" bgcolor="#FFFFFF">
								<table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; margin: 0 auto; padding: 0; width: 570px;" bgcolor="#FFFFFF">

									<tr>
										<td class="content-cell" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; padding: 35px;">
											<h1 style="box-sizing: border-box; color: #2F3133; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 19px; font-weight: bold; margin-top: 0;" align="left">Welcome,'.$user_name.'!</h1>
											<p style="box-sizing: border-box; color: #74787E; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;" align="left">Thanks for trying '.$system_name.'. We’re thrilled to have you on board.</p>
											<p style="box-sizing: border-box; color: #74787E; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;" align="left">To get the most out of '.$system_name.', do this primary next step:</p>

											<table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; margin: 30px auto; padding: 0; text-align: center; width: 100%;">
												<tr>
													<td align="center" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">

														<table width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">
															<tr>
																<td align="center" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">
																	<table border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">
																		<tr>
																			<td style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">
																				<a href="'.$action_url.'" class="button button--" target="_blank" style="-webkit-text-size-adjust: none; background: #3869D4; border-color: #3869d4; border-radius: 3px; border-style: solid; border-width: 10px 18px; box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16); box-sizing: border-box; color: #FFF; display: inline-block; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; text-decoration: none;">Confirm Your Email</a>
																			</td>
																		</tr>
																	</table>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
											<p style="box-sizing: border-box; color: #74787E; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;" align="left">For reference, here`s your login information:</p>
											<table class="attributes" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; margin: 0 0 21px;">
												<tr>
													<td class="attributes_content" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; padding: 16px;" bgcolor="#EDEFF2">
														<table width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">
															<tr>
																<td class="attributes_item" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; padding: 0;"><strong style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">Login Page:</strong> '.$login_url.'</td>
															</tr>
															<tr>
																<td class="attributes_item" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; padding: 0;"><strong style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">Username:</strong> '.$username.'</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>

											<table class="attributes" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; margin: 0 0 21px;">
												<tr>
													<td class="attributes_content" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; padding: 16px;" bgcolor="#EDEFF2">
														<table width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">
															<tr>
																<td class="attributes_item" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; padding: 0;"><strong style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;"> Start Date:</strong> '.$trial_start_date.'</td>
															</tr>

														</table>
													</td>
												</tr>
											</table>
											<p style="box-sizing: border-box; color: #74787E; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;" align="left">If you have any questions, feel free to <a href="mailto:'.$support_email.'" style="box-sizing: border-box; color: #3869D4; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">email our customer success team</a>. (We`re lightning quick at replying.) .</p>
											<p style="box-sizing: border-box; color: #74787E; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;" align="left">Thanks,
												<br />'.$Sender_Name.' and the '.$system_name.' Team</p>


												<table class="body-sub" style="border-top-color: #EDEFF2; border-top-style: solid; border-top-width: 1px; box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; margin-top: 25px; padding-top: 25px;">
													<tr>
														<td style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">
															<p class="sub" style="box-sizing: border-box; color: #74787E; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;" align="left">If you’re having trouble with the button above, copy and paste the URL below into your web browser.</p>
															<p class="sub" style="box-sizing: border-box; color: #74787E; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;" align="left">'.$action_url.'</p>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">
									<table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; margin: 0 auto; padding: 0; text-align: center; width: 570px;">
										<tr>
											<td class="content-cell" align="center" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; padding: 35px;">
												<p class="sub align-center" style="box-sizing: border-box; color: #AEAEAE; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;" align="center">© 2016 '.$system_name.'. All rights reserved.</p>
												<p class="sub align-center" style="box-sizing: border-box; color: #AEAEAE; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;" align="center">
													'.$Company_Name.'
													<br />1234 Street Rd.
													<br />Suite 1234
												</p>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</body>
		</html>
		';
		return $avorll;
	}

	function retun_first_welcome($user_name, $system_name, $password, $login_url, $username, $trial_start_date, $support_email, $Sender_Name, $Company_Name) {
		$avorll = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<title>Welcome to '.$system_name.', '.$user_name.'!</title>


		</head>
		<body style="-webkit-text-size-adjust: none; box-sizing: border-box; color: #74787E; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; height: 100%; line-height: 1.4; margin: 0; width: 100% !important;" bgcolor="#F2F4F6"><style type="text/css">
			body {
				width: 100% !important;
				height: 100%;
				margin: 0;
				line-height: 1.4;
				background-color: #F2F4F6;
				color: #74787E;
				-webkit-text-size-adjust: none;

			}
			@media only screen and (max-width: 600px) {
				.email-body_inner {
					width: 100% !important;
				}
				.email-footer {
					width: 100% !important;
				}
			}
			@media only screen and (max-width: 500px) {
				.button {
					width: 100% !important;
				}
			}
		</style>
		<span class="preheader" style="box-sizing: border-box; display: none !important; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">Thanks for trying out '.$system_name.'. We’ve pulled together some information and resources to help you get started.</span>
		<table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; margin: 0; padding: 0; width: 100%;" bgcolor="#F2F4F6">
			<tr>
				<td align="center" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">
					<table class="email-content" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; margin: 0; padding: 0; width: 100%;">
						<tr>
							<td class="email-masthead" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; padding: 25px 0;" align="center">
								<a href="https://example.com" class="email-masthead_name" style="box-sizing: border-box; color: #bbbfc3; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 16px; font-weight: bold; text-decoration: none; text-shadow: 0 1px 0 white;">
									'.$system_name.'
								</a>
							</td>
						</tr>

						<tr>
							<td class="email-body" width="100%" cellpadding="0" cellspacing="0" style="-premailer-cellpadding: 0; -premailer-cellspacing: 0; border-bottom-color: #EDEFF2; border-bottom-style: solid; border-bottom-width: 1px; border-top-color: #EDEFF2; border-top-style: solid; border-top-width: 1px; box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; margin: 0; padding: 0; width: 100%;" bgcolor="#FFFFFF">
								<table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; margin: 0 auto; padding: 0; width: 570px;" bgcolor="#FFFFFF">

									<tr>
										<td class="content-cell" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; padding: 35px;">
											<h1 style="box-sizing: border-box; color: #2F3133; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 19px; font-weight: bold; margin-top: 0;" align="left">Welcome,'.$user_name.'!</h1>
											<p style="box-sizing: border-box; color: #74787E; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;" align="left">Thanks for trying '.$system_name.'. We’re thrilled to have you on board.</p>

											<table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; margin: 30px auto; padding: 0; text-align: center; width: 100%;">
												<tr>
													<td align="center" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">

														<table width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">
															<tr>
																<td align="center" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">
																	<table border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">
																		<tr>

																		</tr>
																	</table>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
											<p style="box-sizing: border-box; color: #74787E; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;" align="left">For reference, here`s your login information:</p>

											<table class="attributes" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; margin: 0 0 21px;">
												<tr>
													<td class="attributes_content" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; padding: 16px;" bgcolor="#EDEFF2">
														<table width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">
															<tr>
																<td class="attributes_item" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; padding: 0;"><strong style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">Login Page:</strong> '.$login_url.'</td>
															</tr>
															<tr>
																<td class="attributes_item" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; padding: 0;"><strong style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">Username:</strong> '.$username.'</td>
															</tr>
															<tr>
																<td class="attributes_item" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; padding: 0;"><strong style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">Password:</strong> '.$password.' (change password after first login)</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
											<br/>
											<br/>
											<br/>
											<table class="attributes" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; margin: 0 0 21px;">
												<tr>
													<td class="attributes_content" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; padding: 16px;" bgcolor="#EDEFF2">
														<table width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">
															<tr>
																<td class="attributes_item" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; padding: 0;"><strong style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;"> Start Date:</strong> '.$trial_start_date.'</td>
															</tr>

														</table>
													</td>
												</tr>
											</table>
											<p style="box-sizing: border-box; color: #74787E; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;" align="left">If you have any questions, feel free to <a href="mailto:'.$support_email.'" style="box-sizing: border-box; color: #3869D4; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">email our customer success team</a>. (We`re lightning quick at replying.) .</p>
											<p style="box-sizing: border-box; color: #74787E; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;" align="left">Thanks,
												<br />'.$Sender_Name.' and the '.$system_name.' Team</p>


												<table class="body-sub" style="border-top-color: #EDEFF2; border-top-style: solid; border-top-width: 1px; box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; margin-top: 25px; padding-top: 25px;">
													<tr>
														<td style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">

														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">
									<table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; margin: 0 auto; padding: 0; text-align: center; width: 570px;">
										<tr>
											<td class="content-cell" align="center" style="box-sizing: border-box; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; padding: 35px;">
												<p class="sub align-center" style="box-sizing: border-box; color: #AEAEAE; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;" align="center">© 2016 '.$system_name.'. All rights reserved.</p>
												<p class="sub align-center" style="box-sizing: border-box; color: #AEAEAE; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;" align="center">
													'.$Company_Name.'
													<br />1234 Street Rd.
													<br />Suite 1234
												</p>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</body>
		</html>
		';
		return $avorll;
	}

	function encrypt($pure_string, $encryption_key) {
		$iv_size          = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
		$iv               = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		$encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $encryption_key, utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);
		return $encrypted_string;
	}

/**
 * Returns decrypted original string
 */
function decrypt($encrypted_string, $encryption_key) {
	$iv_size          = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
	$iv               = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	$decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $encryption_key, $encrypted_string, MCRYPT_MODE_ECB, $iv);
	return $decrypted_string;
}

?>
