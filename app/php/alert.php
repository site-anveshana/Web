<?php
    session_start();
    print_r($_POST);

    function alert($row1,$msg,$event){
        $username = "sasicollege";
        $password = "SITE2002";
        $numbers = $row1["MOBILE"]; // mobile number
        $from = urlencode('INSITE'); // assigned Sender_ID
        $raw_msg = "All ".$event." participants a call for you\n' ".$msg." '";
        $message = urlencode($raw_msg); // Message text required to deliver on mobile number
        $data = "username="."$username"."&password="."$password"."&to="."$numbers"."&from="."$from"."&msg="."$message"."&type=1&dnd_check=0";
        $data = "https://www.smsstriker.com/API/sms.php?".$data;

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$data);
        $response = curl_exec($ch);
        curl_close($ch);
    }

	include_once("db_operations.php");
	$dbobj = new DBConnect;

    $dbobj->connect();

    $result = $dbobj->search('anveshana_registration',"HTNO","event_id",$_POST['event_id']." and status=1");

    if($result)
        while($row = $result->fetch_assoc()){
            $result2 = $dbobj->search('anveshana_participants',"*","HTNO",'upper("'.$row['HTNO'].'")');
            if($result2){
                if($row1 = $result2->fetch_assoc()){
                    $x = ($dbobj->search('anveshana_events',"event_name","event_id",$_POST['event_id']))->fetch_assoc()["event_name"];
                    alert($row1,$_POST['msg'],$x);
                }
            }

        }

    echo '<script>alert("Message Sent. ");</script>';
    echo "<script>window.top.location='../alert.php'</script>";

?>