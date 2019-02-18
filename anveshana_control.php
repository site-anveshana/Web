<?php

	session_start();

	ob_start();

	include_once("DBConnect.php");

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

	$sql = "INSERT INTO participants (HTNO, FIRSTNAME ,LASTNAME , GENDER , COURSE , DEPARTMENT , YEAR , COLLEGE , EMAIL , MOBILE )

	                 VALUES ('$htno' ,'$fname', '$lname' , '$gender' , '$course' , '$department' , '$year' , '$college' ,'$email' ,'$mobile' )";



		$data = $dbc->insert($sql);

		

		if ($data) {

			

		    //echo "<script>alert(\"REGISTERED SUCCESFULLY\")</script>";

			header("refresh:0;url=anveshana_events_reg.php");

			

		} else {

		    echo "<script>alert(\"Already Registered - Events participation can be updated during the program\")</script>";

			header("refresh:0;url=reg.php");

		}


?>

