	<?php

	session_start();

	ob_start();

	include_once("db_operations.php");
	
	$htno = $_SESSION['htno'];
		
	$dbc = new DBConnect();
	$dbc->connect();
	$flag=0;
	$ecost = 100;
	$status = 'no';
	
	$data = "";

	$dbc->sqlQury("DELETE FROM `anveshana_registration` WHERE HTNO='$htno'");

	$result = $dbc->search('anveshana_events','*',1,1);

	if($result)

		while($row = $result->fetch_assoc()){
			
				if(isset($_POST[$row["event_id"]]))
				{
					$eid = $_POST[$row["event_id"]];
					//echo $eid;
					
					$ecost = $row["event_cost"];
					$sql = 'INSERT INTO  anveshana_registration (HTNO, event_id, amount, status) VALUES ("$htno" ,"$eid","$ecost","$status")';

					$data = $dbc->insert('anveshana_registration','(HTNO, event_id, amount, status)','("'.$htno.'" ,"'.$eid.'","'.$ecost.'","'.$status.'")');
					
				}
		} 
	 	if ($data) {			

					echo "<script>alert(\"EVENTS UPDATED SUCCESFULLY\")</script>";

					// header("refresh:0;url=../");

			

				} else {

					echo "<script>alert(\"EVENTS UPDATION FAILED TRY AGIAN....\")</script>";

					// header("refresh:0;url=index.php");

		}
	header("refresh:0;url=../");


	
?>
