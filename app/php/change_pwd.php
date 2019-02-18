<?php
    session_start();

	include_once("db_operations.php");
	$dbobj = new DBConnect;

    $dbobj->connect();

    $result = $dbobj->search('anveshana_users',"*","username",'upper("'.$_SESSION['anveshana_username'].'")');

    if($result){
        $row = $result->fetch_assoc();
        if(md5($_POST['pwd']) == $row['password']){
                $result = $dbobj->update('anveshana_users',"password",'"'.md5($_POST['npwd']).'"',"username",'"'.$_SESSION['anveshana_username'].'"');
                echo '<script>alert("Password Changed Successfully");</script>';
        }else
        
            echo '<script>alert("Old Password Incorrect");</script>';
    }else{
        echo '<script>alert("Password Change Failed");</script>';
    }
    echo "<script>window.top.location='../home.php'</script>";

?>