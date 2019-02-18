<?php

	include_once("db_operations.php");
	$dbobj = new DBConnect;

    $dbobj->connect();

    $result = $dbobj->search('anveshana_role_services',"service_id",'role_id',$_SESSION['anveshana_role']);

    if(mysqli_num_rows($result) > 0){
        while($row = $result->fetch_assoc()){
            $result2 = $dbobj->search('anveshana_services',"lower(service_name)",'service_id',$row['service_id']);
            if(mysqli_num_rows($result2) > 0){
                while($row2 = $result2->fetch_assoc()){
                    echo '
                        <li class=" hello">
                            <a href="'.$row2['lower(service_name)'].'.php">
                                <span class="glyphicon glyphicon-'.$row2['lower(service_name)'].'"></span> 
                                '.ucwords($row2['lower(service_name)']).'
                            </a>
                        </li>';
                }
            }
        }
    }

?>