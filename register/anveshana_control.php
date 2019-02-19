<?php

	session_start();

	ob_start();

	include_once("db_operations.php");

	$htno = $_POST['htno'];

	$fname = $_POST['fname'];

	$lname = $_POST['lname'];

	$gender = $_POST['gender'];

	$course = $_POST['courses'];

		
	$department = $_POST['department'];
	if($department == "Select Your Department")
	{
		echo "<script>alert(\"Please select your Department\")</script>";
		header("refresh:0;url=index.php");
		exit(0);
	}

	$year = $_POST['year'];

	$college = $_POST['college'];
	if($college == "Other")
	{
		$college = $_POST['otc'];
	}
	if($college == "Select" || $college == "")
	{
		echo "<script>alert(\"College details must be provided\")</script>"; 
		header("refresh:0;url=index.php");
		exit(0);
	}

	
	$email = $_POST['email'];

	$mobile = $_POST['mobile'];

	$_SESSION['htno']=$htno;
	$_SESSION['dept']=$department;
	
	$dbc = new DBConnect();

	$dbc->connect();

	$data = $dbc->insert('anveshana_participants',"(HTNO, FIRSTNAME ,LASTNAME , GENDER , COURSE , DEPARTMENT , YEAR , COLLEGE , EMAIL , MOBILE )","('$htno' ,'$fname', '$lname' , '$gender' , '$course' , '$department' , '$year' , '$college' ,'$email' ,'$mobile')");

		

		if ($data) {

			$username = "sasicollege";
			$password = "SITE2002";
			$numbers = $mobile; // mobile number
			$from = urlencode('INSITE'); // assigned Sender_ID
			$raw_msg = $fname." ".$lname." , you have been successfully registered for SITE Anveshana 2K19\nCheck out sasi.ac.in/anveshana for more...";
			$message = urlencode($raw_msg); // Message text required to deliver on mobile number
			$data = "username="."$username"."&password="."$password"."&to="."$numbers"."&from="."$from"."&msg="."$message"."&type=1&dnd_check=0";
			$data = "https://www.smsstriker.com/API/sms.php?".$data;

			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL,$data);
			$response = curl_exec($ch);
			curl_close($ch);

			

		} else {

		    echo "<script>alert(\"Already Registered - Events participation can be updated Now\")</script>";

			// header("refresh:0;url=index.php");

		}

		header("refresh:0;url=anveshana_events_reg.php");
			

?>

