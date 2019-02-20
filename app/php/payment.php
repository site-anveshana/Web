<?php

	session_start();

	ob_start();

	include_once("db_operations.php");
    
    if(!isset($_SESSION['htno'])){
        header("refresh:0;url=../payment.php");
    }
	$htno = strtoupper($_SESSION['htno']);
		
	$dbc = new DBConnect();
	$dbc->connect();

    $total = 0;

    $dbc->insert('anveshana_transactions','(HTNO,transaction_id, amount)','("'.$htno.'","'.$_SESSION["anveshana_username"].'" ,"'.$_POST['req'].'")');

    $result = $dbc->search('anveshana_events','*',1,1);

	if($result){
		$arr = Array();
		while($row = $result->fetch_assoc()){
			
				if(isset($_POST[$row["event_id"]])){
					$data = $dbc->update('anveshana_registration','status',1,"htno","'".$htno."' and event_id=".$row["event_id"]."");
						
                    if(!$data){
                    	$data = $dbc->insert('anveshana_registration','(HTNO, event_id, amount, status)',"('".$htno."' ,".$row["event_id"].",".$row["event_cost"].",1)");
						if($data){
							$arr[$row["event_id"]] = $row["event_id"];
							echo "<script>console.log(\"..INSERTING..\")</script>";
						}else{
							
							echo "<script>console.log(\"..FAILED..\")</script>";
						}
					
					}else{
						$arr[$row["event_id"]] = $row["event_name"];
                        echo "<script>console.log(\"..UPDATED..\")</script>";
                    }
					
                }else
                 echo "<script>console.log(\"..ERROR..\")</script>";
		} 
	}
	 else {

					echo "<script>alert(\"TRANSACTION FAILED\")</script>";

					// header("refresh:0;url=index.php");

        }
    
    $result1 = $dbc->search('anveshana_participants','*',"HTNO","'".$htno."'");
    $row1 = $result1->fetch_assoc();
    $username = "sasicollege";
	$password = "SITE2002";
	$numbers = $row1["MOBILE"]; // mobile number
	$from = urlencode('INSITE'); // assigned Sender_ID
	$raw_msg = $row1["FIRSTNAME"]." ".$row1["LASTNAME"].", your payment of Rs.".$_POST['req']." at SITE Anveshana 2K19 is successful.";
	$message = urlencode($raw_msg); // Message text required to deliver on mobile number
	$data = "username="."$username"."&password="."$password"."&to="."$numbers"."&from="."$from"."&msg="."$message"."&type=1&dnd_check=0";
	$data = "https://www.smsstriker.com/API/sms.php?".$data;

	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$data);
	$response = curl_exec($ch);
	curl_close($ch);
	// echo "<script>alert(\"TRANSACTION COMPLETED\")</script>";

	$_SESSION["array"] = $arr;
	$helper = array_keys($_SESSION);
        foreach ($helper as $key){
			if($key != "array" && $key != "htno")
            	if($key != "anveshana_username" && $key != "anveshana_role"){
					unset($_SESSION[$key]);
					echo $key;
				}
        }
	header("refresh:0;url=../receipt.php");


	
?>
