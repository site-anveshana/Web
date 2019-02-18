<?php
session_start(); 
	ob_start();

	include_once("DBConnect.php");

	$htno = $_POST['htno'];

	$_SESSION["htno"] = $htno;
	
	$fname = $_POST['fname'];

	$lname = $_POST['lname'];

	$gender = $_POST['gender'];

	$course = $_POST['courses'];

	
	$department = $_POST['department'];


	$year = $_POST['year'];

	$college = $_POST['college'];
	
	
	$email = $_POST['email'];

	$mobile = $_POST['mobile'];

	$plist = "";
	$ner = 0;
	
	if(isset($_POST['ev1']))
	{
		$event1 = $_POST['ev1'];
		$plist = $plist." ".$event1;
		$ner++;
	}
	else
	{ 
		$event1 = "NA";
		
	}

	if(isset($_POST['ev2']))
	{
		$event2 = $_POST['ev2'];
		$plist = $plist." ".$event2;
		$ner++;
	}
	else
	{ 
		$event2 = "NA";
	}
	
	if(isset($_POST['ev3']))
	{
		$event3 = $_POST['ev3'];
		$plist = $plist." ".$event3;
		$ner++;
	}
	else
	{ 
		$event3 = "NA";
	}
	if(isset($_POST['ev4']))
	{
		$event4 = $_POST['ev4'];
		$plist = $plist." ".$event4;
		$ner++;
	}
	else
	{ 
		$event4 = "NA";
	}
	if(isset($_POST['ev5']))
	{
		$event5 = $_POST['ev5'];
		$plist = $plist." ".$event5;
		$ner++;
	}
	else
	{ 
		$event5 = "NA";
	}
	if(isset($_POST['ev6']))
	{
		$event6 = $_POST['ev6'];
		$plist = $plist." ".$event6;
		$ner++;
	}
	else
	{ 
		$event6 = "NA";
	}
	if(isset($_POST['ev7']))
	{
		$event7 = $_POST['ev7'];
		$plist = $plist." ".$event7;
		$ner++;
	}
	else
	{ 
		$event7 = "NA";
	}

	if(isset($_POST['ev32']))
	{
		$event32 = $_POST['ev32'];
		$plist = $plist." ".$event32;
		$ner++;
	}
	else
	{ 
		$event32 = "NA";
	}

	if(isset($_POST['ev33']))
	{
		$event33 = $_POST['ev33'];
		$plist = $plist." ".$event33;
		$ner++;
	}
	else
	{ 
		$event33 = "NA";
	}

	if(isset($_POST['ev8']))
	{
		$event8 = $_POST['ev8'];
		$plist = $plist." ".$event8;
		$ner++;
	}
	else
	{ 
		$event8 = "NA";
	}
	if(isset($_POST['ev9']))
	{
		$event9 = $_POST['ev9'];
		$plist = $plist." ".$event9;
		$ner++;
	}
	else
	{ 
		$event9 = "NA";
	}
	if(isset($_POST['ev10']))
	{
		$event10 = $_POST['ev10'];
		$plist = $plist." ".$event10;
		$ner++;
	}
	else
	{ 
		$event10 = "NA";
	}
	
	if(isset($_POST['ev11']))
	{
		$event11 = $_POST['ev11'];
		$plist = $plist." ".$event11;
		$ner++;
	}
	else
	{ 
		$event11 = "NA";
	}
	
	
	if(isset($_POST['ev12']))
	{
		$event12 = $_POST['ev12'];
		$plist = $plist." ".$event12;
		$ner++;
	}
	else
	{ 
		$event12 = "NA";
	}
	if(isset($_POST['ev13']))
	{
		$event13 = $_POST['ev13'];
		$plist = $plist." ".$event13;
		$ner++;
	}
	else
	{ 
		$event13 = "NA";
	}
	if(isset($_POST['ev14']))
	{
		$event14 = $_POST['ev14'];
		$plist = $plist." ".$event14;
		$ner++;
	}
	else
	{ 
		$event14 = "NA";
	}
	if(isset($_POST['ev15']))
	{
		$event15 = $_POST['ev15'];
		$plist = $plist." ".$event15;
		$ner++;
	}
	else
	{ 
		$event15 = "NA";
	}	
	if(isset($_POST['ev16']))
	{
		$event16 = $_POST['ev16'];
		$plist = $plist." ".$event16;
		$ner++;
	}
	else
	{ 
		$event16 = "NA";
	}	
	if(isset($_POST['ev17']))
	{
		$event17 = $_POST['ev17'];
		$plist = $plist." ".$event17;
		$ner++;
	}
	else
	{ 
		$event17 = "NA";
	}
	if(isset($_POST['ev18']))
	{
		$event18 = $_POST['ev18'];
		$plist = $plist." ".$event18;
		$ner++;
	}
	else
	{ 
		$event18 = "NA";
	}	
	if(isset($_POST['ev19']))
	{
		$event19 = $_POST['ev19'];
		$plist = $plist." ".$event19;
		$ner++;
	}
	else
	{ 
		$event19 = "NA";
	}
	if(isset($_POST['ev20']))
	{
		$event20 = $_POST['ev20'];
		$plist = $plist." ".$event20;
		$ner++;
	}
	else
	{ 
		$event20 = "NA";
	}	
	if(isset($_POST['ev21']))
	{
		$event21 = $_POST['ev21'];
		$plist = $plist." ".$event21;
		$ner++;
	}
	else
	{ 
		$event21 = "NA";
	}	
	if(isset($_POST['ev22']))
	{
		$event22 = $_POST['ev22'];
		$plist = $plist." ".$event21;
		$ner++;
	}
	else
	{ 
		$event22 = "NA";
	}
	if(isset($_POST['ev23']))
	{
		$event23 = $_POST['ev23'];
		$plist = $plist." ".$event23;
		$ner++;
	}
	else
	{ 
		$event23 = "NA";
	}	
	if(isset($_POST['ev24']))
	{
		$event24 = $_POST['ev24'];
		$plist = $plist." ".$event24;
		$ner++;
	}
	else
	{ 
		$event24 = "NA";
	}	
	if(isset($_POST['ev25']))
	{
		$event25 = $_POST['ev25'];
		$plist = $plist." ".$event25;
		$ner++;
	}
	else
	{ 
		$event25 = "NA";
	}
	if(isset($_POST['ev26']))
	{
		$event26 = $_POST['ev26'];
		$plist = $plist." ".$event26;
		$ner++;
	}
	else
	{ 
		$event26 = "NA";
	}	
	if(isset($_POST['ev27']))
	{
		$event27 = $_POST['ev27'];
		$plist = $plist." ".$event27;
		$ner++;
	}
	else
	{ 
		$event27 = "NA";
	}	
	if(isset($_POST['ev28']))
	{
		$event28 = $_POST['ev28'];
		$plist = $plist." ".$event28;
		$ner++;
	}
	else
	{ 
		$event28 = "NA";
	}	
	if(isset($_POST['ev29']))
	{
		$event29 = $_POST['ev29'];
		$plist = $plist." ".$event29;
		$ner++;
	}
	else
	{ 
		$event29 = "NA";
	}
	if(isset($_POST['ev30']))
	{
		$event30 = $_POST['ev30'];
		$plist = $plist." ".$event30;
		$ner++;
	}
	else
	{ 
		$event30 = "NA";
	}
	if(isset($_POST['ev31']))
	{
		$event31 = $_POST['ev31'];
		$plist = $plist." ".$event31;
		$ner++;
	}
	else
	{ 
		$event31 = "NA";
	}
	if(isset($_POST['ev32']))
	{
		$event32 = $_POST['ev32'];
		$plist = $plist." ".$event32;
		$ner++;
	}
	else
	{ 
		$event32 = "NA";
	}
	if(isset($_POST['ev33']))
	{
		$event33 = $_POST['ev33'];
		$plist = $plist." ".$event33;
		$ner++;
	}
	else
	{ 
		$event33 = "NA";
	}
	
	//echo $event1;
	//echo $event11;
	//echo $college;
	$PAID=$ner*100;
	
	$dbc = new DBConnect();

	$dbc->connect();
	$sqld = "DELETE from prie where HTNO="."'".$htno."'";
	
	$t = $dbc->delete($sqld);	
	$sql = "INSERT INTO prie (HTNO, FIRSTNAME ,LASTNAME , GENDER , COURSE , DEPARTMENT , YEAR , COLLEGE , EMAIL , MOBILE , EVENT1,EVENT2,EVENT3,EVENT4,EVENT5,EVENT6,EVENT7,EVENT8,EVENT9,EVENT10,EVENT11,EVENT12,EVENT13,EVENT14,EVENT15,EVENT16,EVENT17,EVENT18,EVENT19,EVENT20,EVENT21,EVENT22,EVENT23,EVENT24,EVENT25,EVENT26,EVENT27,EVENT28,EVENT29,EVENT30,EVENT31,EVENT32,EVENT33,PAID)

	                 VALUES ('$htno' ,'$fname', '$lname' , '$gender' , '$course' , '$department' , '$year' , '$college' ,'$email' ,'$mobile' , '$event1', '$event2', '$event3', '$event4', '$event5', '$event6', '$event7', '$event8', '$event9', '$event10', '$event11', '$event12', '$event13', '$event14', '$event15', '$event16', '$event17', '$event18', '$event19', '$event20', '$event21', '$event22', '$event23', '$event24', '$event25', '$event26', '$event27', '$event28', '$event29','$event30','$event31','$event32','$event33','$PAID')";

	$data = $dbc->insert($sql);
	echo "data : ".$data." : data"."<br>";
		

		if ($data) {

			//Message Sending Code
			$username = "sasicollege";
			$password = "SITE2002";
			$numbers = $mobile; // mobile number
			$from = urlencode('INSITE'); // assigned Sender_ID
			$message = urlencode('You paid for '.$plist); // Message text required to deliver on mobile number
			$data = "username="."$username"."&password="."$password"."&to="."$numbers"."&from="."$from"."&msg="."$message"."&type=1&dnd_check=0";
			$data = "https://www.smsstriker.com/API/sms.php?".$data;

 
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL,$data);
			//$response = curl_exec($ch);
			curl_close($ch);

			
				
			//echo $plist;
		    echo "<script>alert(\"REGISTERED SUCCESFULLY\")</script>";
			echo '
			<script type="text/javascript" language="Javascript">window.open(\'receipt.php\')</script>';
			header("refresh:0;url=receipt.php");

			

		} else {

		    echo "<script>alert(\"Already Registered\")</script>";

			header("refresh:10;url=reg.php");

		}


?>

