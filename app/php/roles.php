<?php

	include_once("db_operations.php");
	$dbobj = new DBConnect;

    $dbobj->connect();

    $result = $dbobj->search('anveshana_roles',"*",1,1);

    if(mysqli_num_rows($result) > 0){
        while($row = $result->fetch_assoc()){
            if($row['role_id'] > (int)$_SESSION['anveshana_role'])
            echo '
                <option value="'.$row['role_id'].'">
                    <label>'.$row['role_name'].'</label>
                </option>';
        }
    }

?>