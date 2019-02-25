<?php
    session_start();
	include_once("db_operations.php");
	$dbobj = new DBConnect;

    $dbobj->connect();

    if(isset($_POST['event_id']))
        $result = $dbobj->search('anveshana_events',"*","event_id",'"'.$_POST['event_id'].'"');
    else
        $result = $dbobj->search('anveshana_events',"*","event_name",'upper("'.$_POST['event_name'].'") and event_type like upper("'.$_POST['event_type'].'")');

    if($result){
        // $row = $result->fetch_assoc();
        // if(strtoupper($row['username']) == $_POST['htno']){
        //     if($row['role_id'] < $_POST['role_id'])
        //         $result = $dbobj->update('anveshana_users',"role_id",$_POST['role_id'],"username",'"'.$_POST['htno'].'"');
        // }
        // else{
            $result = $dbobj->insert('anveshana_events',"(`event_name`, `event_type`, `event_cost`, `created_by`)",
            '(upper("'.$_POST['event_name'].'"), "'.$_POST['event_type'].'", "'.$_POST['event_cost'].'","'.$_SESSION['anveshana_username'].'")');

            
            // echo '<script>alert("Event Creation Successful");</script>';
        // }

    }else{
        echo '<script>alert("Event Updation Failed");</script>';
    }
    $helper = array_keys($_SESSION);
        foreach ($helper as $key){
            if($key != "anveshana_username" && $key != "anveshana_role")
            unset($_SESSION[$key]);
        }
    echo "<script>window.top.location='../events.php'</script>";

?>