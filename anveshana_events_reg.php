<!DOCTYPE html>
<html>
<head>
	<title>.::Anveshana Registration::.</title>
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
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
	table {
    font-family: arial, sans-serif;
	font-size:12px;
    border-collapse: collapse;
    width:60%;

}

td, th {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
    
}
</style>

</head>
<body>

<form class="  well form-horizontal"  name="form1" action="anveshana_reg_com.php" method="post"  id="contact_form" onsubmit="return validate()">
 

	
 <table >
      	
		
<?php
session_start();
$dept = $_SESSION['dept'];
$htno = $_SESSION['htno'];
//echo $dept;

include_once 'db_operations.php';

$dbobj = new DBConnect;

$dbobj->connect();

echo '<tr><div class="form-group">      <label class="col-md-4    control-label"> College Events<sub style="color: red; font-size:20px;">&nbsp;*</sub></label></div>	<br/>	</div></td></tr class="checkbox-grid">';

//query
$result = $dbobj->search('events','*','event_type',"'Common'");

$event_details = '<table>';
if($result){
	$event_details = '<table>';
	while($rs = $result->fetch_assoc()){
      //$select.='<option >'.$rs['event_name'].'</option>';
	   $event_details .= '<tr><td><input type="checkbox" name='.$rs['event_id'].' id="" value='.$rs['event_id'].' >'.$rs['event_name'].'</td></tr>';
	}
}
$event_details .= '</table>';
echo $event_details; 

 $event_details="";
$event_details = '<table>';
echo '<tr><div class="form-group">      <label class="col-md-4    control-label"> Cultural Events<sub style="color: red; font-size:20px;">&nbsp;*</sub></label></div>	<br/>	</div></td></tr class="checkbox-grid">';
$result = $dbobj->search('events','*','event_type',"'Cultural'");
if($result){
	$event_details = '<table>';
	while($rs = $result->fetch_assoc()){
      //$select.='<option >'.$rs['event_name'].'</option>';
	   $event_details .= '<tr><td><input type="checkbox" name='.$rs['event_id'].' id="" value='.$rs['event_id'].' >'.$rs['event_name'].'</td></tr>';
	}
}
$event_details .= '</table>';

echo $event_details; 

$event_details="";
$event_details = '<table>';
echo '<tr><div class="form-group">      <label class="col-md-4    control-label"> Department Events<sub style="color: red; font-size:20px;">&nbsp;*</sub></label></div>	<br/>	</div></td></tr class="checkbox-grid">';

$result = $dbobj->search('events','*','event_type',"'".$dept."'");
if($result){
	$event_details = '<table>';
	while($rs = $result->fetch_assoc()){
      //$select.='<option >'.$rs['event_name'].'</option>';
	   $event_details .= '<tr><td><input type="checkbox" name='.$rs['event_id'].' id="" value='.$rs['event_id'].' >'.$rs['event_name'].'</td></tr>';
	}
}
$event_details .= '</table>';
echo $event_details; 
?>


    

</table>
<!-- Register  Button -->
      <div class="form-group">
        <label class="col-md-4    control-label"></label>
        <div class="col-md-4   "><br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-warning" >  &nbsp;
          REGISTER  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
        </div>
     
</body>
</html>