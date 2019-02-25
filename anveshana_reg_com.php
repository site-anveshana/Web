	<?php

	session_start();

	ob_start();

	include_once("DBConnect.php");
	
	$htno = $_SESSION['htno'];
		
	$dbc = new DBConnect();

	$dbc->connect();
	$flag=0;
	$ecost = 100;
	$status = 'no';
	//echo $htno;
	for ($x = 0; $x <= 68; $x++) {
		//echo $_POST[$x];
			if(isset($_POST[$x]))
			{
				$eid = $_POST[$x];
				//echo $eid;
				
				
				$sql = "INSERT INTO  registration (HTNO, event_id, amount, status)

	                 VALUES ('$htno' ,'$eid','$ecost','$status' )";

				$data = $dbc->insert($sql);

				
				
			}
	} 
	 if ($data) {			

					echo "<script>alert(\"REGISTERED SUCCESFULLY\")</script>";

					header("refresh:0;url=reg.php");

			

				} else {

					echo "<script>alert(\"Already Registered\")</script>";

					header("refresh:0;url=reg.php");

		}
	//header("refresh:0;url=anveshana_registration.php");


	
?>
