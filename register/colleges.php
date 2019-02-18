<?php

    include_once 'db_operations.php';

    $dbobj = new DBConnect;
    
    $dbobj->connect();
    
    $result = $dbobj->search('anveshana_colleges',"*",1,1);
    $output = "";
    echo '<option value="">---</option>';
    if($result){
        while($row = $result->fetch_assoc())
            echo '<option value="'.$row['NAME'].'">'.$row['NAME'].'</option>';
    }
?>