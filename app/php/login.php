<?php
    $user = $_POST['user'];
    $password = $_POST['pwd'];

	include_once("db_operations.php");
	$dbobj = new DBConnect;

    $dbobj->connect();

    $result = $dbobj->search('anveshana_users',"*",'username','upper("'.$user.'")');
    
    if($result){
        if (mysqli_num_rows($result) > 0)
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            if($row['password'] == md5($password))  {
                session_start();

                $_SESSION['anveshana_username'] = $row['username'];
                echo "<script>sessionStorage.setItem('anveshana_username','".$row['username']."')</script>";

                
                $_SESSION['anveshana_role'] = $row['role_id'];
                echo "<script>sessionStorage.setItem('anveshana_role','".$row['role_id']."')</script>";

                header("Location: ../home.php");
            }
        }
    } else {
        echo '<img src="../img/wrong.png" alt="" width="70%">';
        header( "refresh:2;url=../index.html" );
    }

?>