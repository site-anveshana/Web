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
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      
	<script type="text/javascript" src="validate.js?3.0"></script>
	<link rel="stylesheet" href="index.css">
	<script type="text/javascript" src="index.js"></script>

</head>
<body>

  <!--Registration Form-->
<div class="container-fluid" >
	<form class="well form-horizontal"  name="form1" action="anveshana_control.php" method="POST"  id="contact_form" onsubmit="return validate()">
		<fieldset >
			<marquee behavior="alternate" style="color:red;">Student should carry their college ID cards during the events</marquee>
				<legend><center><h2 class="bold" style="color:red;">Event Registration</h2></center></legend>

<!--  HallticketText input-->
	       <div class="form-group">
  				<label class="col-md-4     control-label">Hallticket Number<sub style="color: red; font-size:20px;">&nbsp;*</sub></label>  
  			 	<div class="col-md-4     inputGroupContainer">
  					<div class="input-group">
    					<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
    					<input  name="htno" placeholder="Hallticket Number" class="form-control"  type="text"  required>
  					</div>
  				</div>
			</div>


<!--FName Text input-->
          <div class="form-group">
          	<label class="col-md-4    control-label">First Name<sub style="color: red; font-size:20px;">&nbsp;*</sub></label>  
            		<div class="col-md-4    inputGroupContainer">
            			<div class="input-group">
            				<span class="input-group-addon"><i class="fa fa-user"></i></span>
            				<input  name="fname" placeholder="First Name" class="form-control"  type="text" required>
              		</div>
            		</div>
          </div>

<!-- LNameText input-->

          <div class="form-group">
            <label class="col-md-4    control-label" >Last Name<sub style="color: red; font-size:20px;">&nbsp;*</sub></label> 
              <div class="col-md-4    inputGroupContainer">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input name="lname" placeholder="Last Name" class="form-control"  type="text" required>
                </div>
              </div>
          </div>

<!-- Gender Radio input-->
          <div class="form-group">
            <label class="col-md-4    control-label" >Gender<sub style="color: red; font-size:20px;">&nbsp;*</sub></label> 
              <div class="col-md-4    inputGroupContainer">
                 <div class="input-group" >
                    <input type="radio" name="gender" value="M" required>&nbsp;Male&nbsp;
                    <input  type="radio" name="gender" value="F" >&nbsp;Female&nbsp; 
                  </div>
              </div>
          </div>
               
    
<!-- Courses Radio input-->
            <div class="form-group">
             <label class="col-md-4    control-label" >Course<sub style="color: red; font-size:20px;">&nbsp;*</sub></label> 
              <div class="col-md-4    inputGroupContainer">
                  <div class="input-group">
                    <input type="radio" name="courses"  value="B.Tech" id="rd" onclick="change()" required> B.Tech/ B.E &nbsp;
                    <input  type="radio" name="courses" value="Diploma" id="rd1"onclick="change()" > Diploma&nbsp; 
                    <input  type="radio" name="courses" value="MS" id="rd2" onclick="change()"> MS&nbsp; 
                </div>
              </div>
          </div>


<!-- Department Select input-->
            <div class="form-group" > 
              <label class="col-md-4    control-label">Department<sub style="color: red; font-size:20px;">&nbsp;*</sub> </label>
              <div class="col-md-4    selectContainer">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-list"></i></span>
                  <select id="dept" name="department"  onclick = "dept_selection()" class="form-control selectpicker" required></select>
                </div>
              </div>
          </div>

<!-- Year select input-->
            <div class="form-group"> 
              <label class="col-md-4    control-label"> Year<sub style="color: red; font-size:20px;">&nbsp;*</sub></label>
              <div class="col-md-4    selectContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-list"></i></span>
                    <select id="select" name="year" class="form-control selectpicker" required></select>
                </div>
              </div>
            </div>


<!-- College select input-->
      <div class="form-group"> 
      	<label class="col-md-4    control-label">College<sub style="color: red; font-size:20px;">&nbsp;*</sub></label>
          <div class="col-md-4    selectContainer">
          	<div class="input-group">
              	<span class="input-group-addon"><i class="fa fa-institution"></i></span>
      					<select id="college" name="college" class="form-control selectpicker"  onchange="showfield(this.options[this.selectedIndex].value)">
                  <?php include('colleges.php');?>
    			</select>
  			</div>
  		<div id="div1"></div>
	</div> 
</div>
  

<!-- Email Text input-->
       <div class="form-group">
  			<label class="col-md-4    control-label">E-Mail<sub style="color: red; font-size:20px;">&nbsp;*</sub></label>  
    		  <div class="col-md-4    inputGroupContainer">
    			   <div class="input-group">
        			 <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
  					   <input name="email" placeholder="E-Mail Address" class="form-control"  type="email" required>
    			   </div>
  			 </div>
  		</div>


<!-- Contact Text input-->       
      <div class="form-group">
        <label class="col-md-4    control-label">Contact No.<sub style="color: red; font-size:20px;">&nbsp;*</sub></label>  
        <div class="col-md-4    inputGroupContainer">
          <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-phone"></i></span>
              <input name="mobile" placeholder="(+91)" class="form-control" id="phno" type="number" required >
          </div>
        </div>
      </div>

 


<!-- Register  Button -->
      <div class="form-group">
        <label class="col-md-4    control-label"></label>
        <div class="col-md-4   "><br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-warning" >  &nbsp;
          Next  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
        </div>
      </div>

</fieldset>
</form>
</div>

</body>
</html>