<?php

	session_start();

	ob_start();

	include_once("db_operations.php");
	
	$htno = $_SESSION['htno'];
		
	$dbc = new DBConnect();
	$dbc->connect();
    $data = "";
    
    $data = $dbc->insert('anveshana_transactions','(HTNO, amount)','("'.$htno.'" ,"'.$ecost.'")');

	if($result)

		while($row = $result->fetch_assoc()){
			
				if(isset($_POST[$row["event_id"]]))
				{
					$eid = $_POST[$row["event_id"]];
					//echo $eid;
					
					$ecost = $row["event_cost"];

					
					
				}
		} 
	 	if ($data) {			

					echo "<script>alert(\"EVENTS UPDATED SUCCESFULLY\")</script>";

					// header("refresh:0;url=../");

			

				} else {

					echo "<script>alert(\"EVENTS UPDATION FAILED TRY AGIAN....\")</script>";

					// header("refresh:0;url=index.php");

		}
	// header("refresh:0;url=../");


	
?>
