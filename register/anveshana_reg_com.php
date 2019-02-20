	<?php

	session_start();

	include_once("db_operations.php");

	if(!isset($_SESSION['htno'])){
		
		header("refresh:0;url=index.php");
		die();
	}
	
	$htno = $_SESSION['htno'];
		
	$dbc = new DBConnect();
	$dbc->connect();
	$flag=0;
	$ecost = 100;
	$status = 'no';
	
	$data = "";

	$dbc->delete("anveshana_registration","HTNO","'".$htno."'");

	$result = $dbc->search('anveshana_events','*',1,1);

	if($result)

		while($row = $result->fetch_assoc()){
			
				if(isset($_POST[$row["event_id"]]))
				{
					$eid = $row["event_id"];
					//echo $eid;
					
					$ecost = $row["event_cost"];
					$sql = 'INSERT INTO  anveshana_registration (HTNO, event_id, amount, status) VALUES ("$htno" ,"$eid","$ecost","$status")';

					$data = $dbc->insert('anveshana_registration','(HTNO, event_id, amount, status)','("'.$htno.'" ,"'.$eid.'","'.$ecost.'","'.$status.'")');
					
				}
				$dbc->insert('anveshana_registration','(HTNO, event_id, amount, status)',"('".$htno."' ,0,100,0)");
		} 
		// die();
	 	if ($data) {			

					// echo "<script>alert(\"EVENTS UPDATED SUCCESFULLY\")</script>";

					// header("refresh:0;url=../");
			$result = $dbc->search('anveshana_participants',"*",'htno','"'.$htno.'"');
			$row = $result->fetch_assoc();
			$mobile= $row["MOBILE"];
			$fname = $row["FIRSTNAME"];
			$lname = $row["LASTNAME"];
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

					// echo "<script>alert(\"EVENTS UPDATION FAILED TRY AGIAN....\")</script>";

					// header("refresh:0;url=index.php");

		}
	$helper = array_keys($_SESSION);
	foreach ($helper as $key){
		unset($_SESSION[$key]);
	}
	session_destroy();
	header("refresh:0;url=../");


	
?>
