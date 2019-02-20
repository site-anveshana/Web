
<!DOCTYPE html>
<html>
<head>
	<title>Anveshana Registration</title>
	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  

    <!-- favicon -->
    <link rel="icon" href="favicon.png" type="image/png" >

    <!-- web-fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,500' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Style CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
      </script>
<style type="text/css">
	table {
    font-family: arial, sans-serif;
	font-size:12px;
    border-collapse: collapse;
    width:60%;
    margin:0.5;

}

th{
    border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
}
td {
    border: 1px solid #dddddd;
    /* text-align: center; */
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
    
}
</style>

</head>
<body>

<form class="  well form-horizontal"  name="form2" action="anveshana_reg_com.php" method="post"  id="contact_form" onsubmit="return validate()">
<div class="form-group" id ="content">
<div class="row" id="content0">
		
<?php
session_start();
if(!isset($_SESSION['dept']) || !isset($_SESSION['htno'])){
    header("refresh:0;url=../reg.php");
}
$dept = $_SESSION['dept'];
$htno = $_SESSION['htno'];

include_once 'db_operations.php';

$dbobj = new DBConnect;

$dbobj->connect();

//query
$result = $dbobj->search('anveshana_events','*',1,1);

if($result){
    echo "<script>var a = 0;";
    while($row = $result->fetch_assoc()){
            echo "if(document.getElementById('".$row['event_type']."')){";
                echo 'document.getElementById("'.$row['event_type'].'").innerHTML += \'<tr><td><input type="checkbox" name='.$row['event_id'].' id="'.$row['event_id'].'"  value="'.$row['event_id'].'" >'.$row['event_name'].'</td></tr>\'';
            echo "}";
            if($dept == $row['event_type'] || $row['event_type'] == 'CENTRAL' || $row['event_type'] == 'CULTURAL' || $row['event_type'] == 'SPORTS'){
                echo "else{";
                    echo "var x = document.createElement('table');";
                    echo "x.id='".$row['event_type']."';";
                    echo "x.className ='col-lg-3 col-sm-6 col-md-12';";
                    echo "if((document.getElementsByTagName('table').length)%4 == 0){";
                        echo "a += 1;";
                        echo "var div = document.createElement('div');div.className = 'row';div.id='content'+a;";
                        echo "document.getElementById('content').appendChild(div);";
                    echo "}";
                    echo "document.getElementById('content'+a).appendChild(x);";
                    echo 'document.getElementById("'.$row['event_type'].'").innerHTML = \'<tr> <th colspan="6" ><h4 style="color:red; font-weight: bold"> '.$row['event_type'].' EVENTS	</h4></th></tr class="checkbox-grid">\';';
                    echo 'document.getElementById("'.$row['event_type'].'").innerHTML += \'<tr><td><input type="checkbox" name='.$row['event_id'].' id="'.$row['event_id'].'" value="'.$row['event_id'].'" >'.$row['event_name'].'</td></tr>\';';
                echo "}";
            }

        // $event_details .= '<tr><td><input type="checkbox" name='.$row['event_id'].' id="" value='.$row['event_id'].' >'.$row['event_name'].'</td></tr>';
    }
    
    echo "</script>";
}

?>
</div>
<div class="row form-group"></div>
<!-- Register  Button -->
      <div class="row form-group" align="center">
            <div class="col-lg-12 col-sm-12">
            <button type="submit" class="btn btn-warning">
            REGISTER NOW</button>
            </div>

            <!-- <div class="col-lg-2 col-sm-12">
            <button type="button" onclick="paynow()" class="btn btn-warning">
            REGISTER & PAY ONLINE</button>
            </div> -->

            <script>
                var input = document.createElement('input')
                input.name = "onlinepay"
                input.type = "hidden"
                input.value = false
                document.forms["form2"].appendChild(input);
                function paynow(){
                    document.forms["form2"]["onlinepay"].value = true;
                    console.log( document.forms["form2"])
                    document.forms["form2"].submit();
                }

                    
                
            </script>

            <!-- <div class="col-lg-2 col-sm-12">
            <button type="submit" class="btn btn-warning" >
                <a href="index.php" style="text-decoration:none;color:white;">
            CANCEL </a></button>
            </div> -->
        </div>

</form>

<div class="row" align="center">
<h4 style="color:blue; font-weight: bold"> PAID:	

                <?php
                    $result = $dbobj->search('anveshana_transactions','*',"HTNO","'".$htno."'");
                    $sum = 0;
                    if($result){
                        while($row = $result->fetch_assoc()){
                            $sum += $row["amount"];
                        }
                    }
                    echo "₹".$sum;
                
                ?>

</h4>
            </div>
<?php

    $result = $dbobj->search('anveshana_registration','*',"HTNO","'".$htno."'");

    if($result){
        echo "<script>";
        while($row = $result->fetch_assoc()){
            echo "if(document.getElementById('".$row['event_id']."')){";
                echo "document.getElementById('".$row['event_id']."').checked = true;";
                // echo $row["status"];
                if($row["status"]){   
                    echo "document.getElementById('".$row['event_id']."').disabled = true;";
                }
            echo "}";
        }
        echo "</script>";
    }
?>
     
     <!-- <marquee behavior="alternate" style="color:red;font-size:12px">Payment will not be refunded once done...</marquee> -->
</body>
</html>