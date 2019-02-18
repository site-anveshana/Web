<?php

	include_once("db_operations.php");
	$dbobj = new DBConnect;

    $dbobj->connect();

    $result = $dbobj->search('anveshana_users',"*","username",'upper("'.$_POST['htno'].'")');

    if($result){
            $row = $result->fetch_assoc();
        if(strtoupper($row['username']) == $_POST['htno']){
            if((int)$row['role_id'] > (int)$_POST['role_id'])
                $result = $dbobj->update('anveshana_users',"role_id",$_POST['role_id'],"username",'"'.$_POST['htno'].'"');
            else
                echo '<script>alert("Higher roles cannot be decreased");</script>';
        }
        else{
            $result = $dbobj->insert('anveshana_users',"(username,role_id)",'("'.$_POST['htno'].'",'.$_POST['role_id'].')');
        }

        echo '<script>alert("Role Updation Successful");</script>';
    }else{
        echo '<script>alert("Role Updation Failed");</script>';
    }
    
    echo "<script>window.top.location='../home.php'</script>";

?>