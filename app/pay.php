<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>

	<title>.::Form::.</title>

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

      

<script type="text/javascript">



function showfield(name) //college other option textbox

{

	if(name=='Other')document.getElementById('div1').innerHTML='<div class="form-group"><label class="col-md-0 col-sm-0 col-xs-0 control-label"></label><div class="col-md-12 inputGroupContainer"> <br/><div class="input-group"><span class="input-group-addon"><i class="fa fa-institution"></i></span> <input  placeholder="Enter Your College Name Here" class="form-control"  name="otc" type="text"></div> </div></div>';



}



 function validate()

{





  if (document.form1.dept.value=="Select your Department")

  {

      alert("select department");

      return false;

  }

  if (document.form1.mobile.value.length!=10)

  {

      alert("enter valid mobile number");

      return false;

  }

  if(document.form1.ev.value=="" && document.form1.ev1.value=="" && document.form1.ev2.value=="")

  {

    alert("please select any one event")

    return false;

  }

}

</script>

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

<?php




ob_start();





include_once("DBConnect.php");

$dbc = new DBConnect();



$dbc->connect();

$htno = $_POST['htno'];
$_SESSION["htno"] = $htno;

$sql="select * from  participants where HTNO="."'".$htno."'";

$result=$dbc->read($sql);

$row = $result->fetch_assoc();

if(!$row){

	//echo '<img src="img/reg.png" alt="" width="70%">';
	header( "refresh:0;url=reg.php" );

}	

?>

  <!--Registration Form-->

<div class="container-fluid" >

	<form class="  well form-horizontal"  name="form1" action="update.php" method="post"  id="contact_form" onsubmit="return validate()">

		<fieldset >

			<marquee behavior="alternate" style="color:red;">Student should carry their college ID cards during the events</marquee>

				<legend><center><h2 class="bold" style="color:red;">PAY YOUR EVENTS</h2></center></legend>



<!--  HallticketText input-->

	       <div class="form-group">

  				<label class="col-md-4     control-label">Hallticket Number<sub style="color: red; font-size:20px;">&nbsp;*</sub></label>  

  			 	<div class="col-md-4     inputGroupContainer">

  					<div class="input-group">

    					<span class="input-group-addon"><i class="fa fa-pencil"></i></span>

    					<input  name="htno" placeholder="Hallticket Number" class="form-control"  type="text" value="<?php echo $row["HTNO"]; ?>" required>

  					</div>

  				</div>

			</div>





<!--FName Text input-->

          <div class="form-group">

          	<label class="col-md-4    control-label">First Name<sub style="color: red; font-size:20px;">&nbsp;*</sub></label>  

            		<div class="col-md-4    inputGroupContainer">

            			<div class="input-group">

            				<span class="input-group-addon"><i class="fa fa-user"></i></span>

            				<input  name="fname" placeholder="First Name" class="form-control"  type="text" value="<?php echo $row["FIRSTNAME"]; ?>" required>

              		</div>

            		</div>

          </div>



<!-- LNameText input-->



          <div class="form-group">

            <label class="col-md-4    control-label" >Last Name<sub style="color: red; font-size:20px;">&nbsp;*</sub></label> 

              <div class="col-md-4    inputGroupContainer">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>

                  <input name="lname" placeholder="Last Name" class="form-control"  type="text" value="<?php echo $row["LASTNAME"]; ?>" required>

                </div>

              </div>

          </div>



<!-- Gender Radio input-->

          <div class="form-group">

            <label class="col-md-4    control-label" >Gender<sub style="color: red; font-size:20px;">&nbsp;*</sub></label> 

              <div class="col-md-4    inputGroupContainer">

                 <div class="input-group" >

                    

					<?php 

					$gender = $row["GENDER"];

					if($gender=="male")

					{

						echo "<input type='radio' name='gender' value='male' checked required>&nbsp;Male&nbsp;";

						echo "<input  type='radio' name='gender' value='female' >&nbsp;Female&nbsp; ";

					}

					else

					{

						echo "<input type='radio' name='gender' value='male'  required>&nbsp;Male&nbsp;";

						echo "<input  type='radio' name='gender' value='female' checked>&nbsp;Female&nbsp; ";

					}

					?>

                  </div>
              </div>

          </div>

               

    

<!-- Courses Radio input-->

            <div class="form-group">

             <label class="col-md-4    control-label" >Course<sub style="color: red; font-size:20px;">&nbsp;*</sub></label> 

              <div class="col-md-4    inputGroupContainer">

                  <div class="input-group">

                    

					

					<?php 

					$course = $row["COURSE"];

					if($course=="B.Tech")

					{

						echo "<input type='radio' name='courses'  value='B.Tech' id='rd' onclick='change()' checked required> B.Tech/ B.E &nbsp;";

						echo "<input  type='radio' name='courses' value='Diploma' id='rd1' onclick='change()' > Diploma&nbsp; ";

						echo "<input  type='radio' name='courses' value='MS' id='rd2' onclick='change()'> MS&nbsp; ";

					}

					else if($course=="Diploma")

					{

						echo "<input type='radio' name='courses'  value='B.Tech' id='rd' onclick='change()'  required> B.Tech/ B.E &nbsp;";

						echo "<input  type='radio' name='courses' value='Diploma' id='rd1' onclick='change()' checked> Diploma&nbsp; ";

						echo "<input  type='radio' name='courses' value='MS' id='rd2' onclick='change()'> MS&nbsp; ";

					}

					else

					{

						echo "<input type='radio' name='courses'  value='B.Tech' id='rd' onclick='change()' required> B.Tech/ B.E &nbsp;";

						echo "<input  type='radio' name='courses' value='Diploma' id='rd1' onclick='change()' > Diploma&nbsp; ";

						echo "<input  type='radio' name='courses' value='MS' id='rd2' onclick='change()' checked> MS&nbsp; ";

					}

					?>

                </div>

              </div>

          </div>





<!-- Department Select input-->

            <div class="form-group" > 

              <label class="col-md-4    control-label">Department<sub style="color: red; font-size:20px;">&nbsp;*</sub> </label>

              <div class="col-md-4    selectContainer">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-list"></i></span>

				  <input  name="department" placeholder="DEPARTMENT" class="form-control"  type="text" value="<?php echo $row["DEPARTMENT"]; ?>" required>

                  

                </div>

              </div>

          </div>



<!-- Year select input-->

            <div class="form-group"> 

              <label class="col-md-4    control-label"> Year<sub style="color: red; font-size:20px;">&nbsp;*</sub></label>

              <div class="col-md-4    selectContainer">

                <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-list"></i></span>

					<input  name="year" placeholder="Year" class="form-control"  type="text" value="<?php echo $row["YEAR"]; ?>" required>

                    

                </div>

              </div>

            </div>







<script type="text/javascript">

  function change() // courses events

  {

    var rd=document.getElementById("rd");

    document.getElementById("select").options.length=0;

     document.getElementById("dept").options.length=0;



        arr=["","CSE","IT","ECE","EEE","ME","CE","PE"];

        arr1 = ["","I","II","III","IV"];

        arr2=["","DCME","DECE","DEEE","DME","DCE"];

        arr3=["MS"]

    if(rd.checked) //Btech selected

    {

        //department

        var select = document.getElementById("dept");

        for(var i=0;i<arr.length;i++) 

        {

          var option = document.createElement("OPTION");

          txt= document.createTextNode(arr[i]);

          option.appendChild(txt);

          //OPTION.setAttribute("value",arr[i]);

          select.insertBefore(option,select.lastChild);

        }



        // Years

        var select1 = document.getElementById("select");

        for(var i=0;i<arr1.length;i++)

        {

          var option1 = document.createElement("OPTION");

          txt= document.createTextNode(arr1[i]);

          option1.appendChild(txt);

          //OPTION.setAttribute("value",arr[i]);

          select1.insertBefore(option1,select1.lastChild);

        }



        // Add technical events by clicking on Btech radio button

		    document.getElementById('d1').innerHTML='<table id="techevents"> <tr> <td colspan="3"><h4 style="color:red; font-weight: bold">Technical Events</h4> </td> </tr>   <tr>    <td><input type="checkbox" name="ev1" id="" value="Paper Presentation">Paper Presentation</td>     <td><input type="checkbox" name="ev2"  id="" value="Project Expo" >Project Expo<br/></td>     <td><input type="checkbox" name="ev3" id="" value="Quiz" >Quiz</td>  </tr>   <tr>     <td><input type="checkbox" name="ev4"  id="" value="CAD Contest" >CAD Contest(MEC,CE)</td>     <td><input type="checkbox" name="ev5" id="" value="Coding Contest">Coding Contest(CSE,IT,EEE,ECE)</td><td><input type="checkbox" name="ev6"  id="" value="Idea Bucket">Idea Bucket</td> <tr><td colspan="3"><input type="checkbox" name="ev7"  id="" value="Poster Presentation">Poster Presentation</td> </tr> </tr></table>';

		

    }

    else if(rd1.checked) //Diploma selected

    {

        // department

        var select = document.getElementById("select");

        for(var i=0;i<4;i++)

        {

          var option = document.createElement("OPTION"),

          txt= document.createTextNode(arr1[i]);

          option.appendChild(txt);

          //OPTION.setAttribute("value",arr[i]);

          select.insertBefore(option,select.lastChild);

        }



        //years

        var dept = document.getElementById("dept");

        for(var i=0;i<arr2.length;i++)

        {

          var option2 = document.createElement("OPTION");

          txt= document.createTextNode(arr2[i]);

          option2.appendChild(txt);

          //OPTION.setAttribute("value",arr[i]);

          dept.insertBefore(option2,dept.lastChild);

        }

          

          // Add technical events by clicking on Diploma radio button	

		    document.getElementById('d1').innerHTML='<table id="techevents"> <tr> <td colspan="3"><h4 style="color:red; font-weight: bold">Technical Events</h4> </td> </tr>   <tr>    <td><input type="checkbox" name="ev1" id="" value="Paper Presentation">Paper Presentation</td>     <td><input type="checkbox" name="ev2"  id="" value="Project Expo" >Project Expo<br/>(common to all Branches)</td>     <td><input type="checkbox" name="ev3" id="" value="Quiz" >Quiz</td>  </tr>   <tr>     <td><input type="checkbox" name="ev4"  id="" value="CAD Contest" >CAD Contest(MEC,CE)</td>     <td><input type="checkbox" name="ev5" id="" value="Coding Contest">Coding Contest(CSE,IT,EEE,ECE)</td><td><input type="checkbox" name="ev6"  id="" value="Idea Bucket">Idea Bucket</td> <tr><td colspan="3"><input type="checkbox" name="ev7"  id="" value="Poster Presentation">Poster Presentation</td> </tr>  </tr></table>';

    }

    else

    {

      // MBA selected

      var select = document.getElementById("select");

       for(var i=0;i<3;i++)

        {

          var option = document.createElement("OPTION"),

          txt= document.createTextNode(arr1[i]);

          option.appendChild(txt);

          //OPTION.setAttribute("value",arr[i]);

          select.insertBefore(option,select.lastChild);

        }

        //years

        var MS = document.getElementById("dept");

        for(var i=0;i<arr3.length;i++)

        {

          var option = document.createElement("OPTION");

          txt= document.createTextNode(arr3[i]);

          option.appendChild(txt);

          //OPTION.setAttribute("value",arr[i]);

          MS.insertBefore(option,MS.lastChild);

        }

		      

          //Add  MS events by clicking on MS radio button

		    document.getElementById('d1').innerHTML='<table id="MSevnts"> <tr> <td colspan="3"><h4 style="color:red; font-weight: bold">MS Events </h4></td></tr> <tr>    <td><input type="checkbox" name="ev26" id="" value="Young Manager" >Young Manager</td>    <td><input type="checkbox" name="ev27"  value="B-Quiz" >B-Quiz</td>	  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>    <tr>       <td><input type="checkbox" name="ev28" id=""   value="B-Plan" >B-Plan</td>	    <td><input type="checkbox" name="ev29" id="" value="Stock Game" >Stock game</td>        <td><input type="checkbox" name="ev30"  id="" value="Ad-Selfie" >Ad-Selfie</td>    </tr></table>';

    }

  }



 </script>





<!-- College select input-->

      <div class="form-group"> 

      	<label class="col-md-4    control-label">College<sub style="color: red; font-size:20px;">&nbsp;*</sub></label>

          <div class="col-md-4    selectContainer">

          	<div class="input-group">

              	<span class="input-group-addon"><i class="fa fa-institution"></i></span>

      					<input  name="college" placeholder="College" class="form-control"  type="text" value="<?php echo $row["COLLEGE"]; ?>" required>

					





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

  					   <input  name="email" placeholder="Email" class="form-control"  type="text" value="<?php echo $row["EMAIL"]; ?>" required>

    			   </div>

  			 </div>

  		</div>





<!-- Contact Text input-->       

      <div class="form-group">

        <label class="col-md-4    control-label">Contact No.<sub style="color: red; font-size:20px;">&nbsp;*</sub></label>  

        <div class="col-md-4    inputGroupContainer">

          <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-phone"></i></span>

              <input  name="mobile" placeholder="Mobile" class="form-control"  type="number" value="<?php echo $row["MOBILE"]; ?>" required>

          </div>

        </div>

      </div>





<!--Events Checkboxes input-->

    <div class="form-group"> 

      <label class="col-md-4    control-label"> Events<sub style="color: red; font-size:20px;">&nbsp;*</sub></label>

      <div class="container">         

        <div class="input-group">   

            <a href="img/Anveshana Event Schedule.pdf" target="_blank" ><b>Click here to check  events schedule before participate<br> </b></a>

            <div>

			<table id="techevents"> <tr> <td colspan="3"><h4 style="color:red; font-weight: bold">Technical Events</h4> </td> </tr> 

			<?php

				if($row["EVENT1"]!="NA")

					echo "<tr>    <td><input type='checkbox' name='ev1' id='' value='Paper Presentation' checked>Paper Presentation</td>"; 

				else

					echo "<tr>    <td><input type='checkbox' name='ev1' id='' value='Paper Presentation' >Paper Presentation</td>"; 

				

				if($row["EVENT2"]!="NA")

					echo "<td><input type='checkbox' name='ev2'  id='' value='Project Expo' checked>Project Expo<br/></td> ";

				else

					echo "<td><input type='checkbox' name='ev2'  id='' value='Project Expo' >Project Expo<br/></td> ";

				

				if($row["EVENT3"]!="NA")

					echo "<td><input type='checkbox' name='ev3'  id='' value='Quiz' checked>Quiz<br/></td> </tr>";

				else

					echo "<td><input type='checkbox' name='ev3'  id='' value='Quiz' >Quiz<br/></td> </tr>";

			

				if($row["EVENT4"]!="NA")

					echo "<tr>    <td><input type='checkbox' name='ev4' id='' value='CAD Contest' checked>CAD Contest(MEC,CE)</td>"; 

				else

					echo "<tr>    <td><input type='checkbox' name='ev4' id='' value='CAD Contest' >CAD Contest(MEC,CE)</td>"; 

				if($row["EVENT5"]!="NA")

					echo "<td><input type='checkbox' name='ev5'  id='' value='Coding Contest' checked>Coding Contest(CSE,IT,EEE,ECE)<br/></td> ";

				else

					echo "<td><input type='checkbox' name='ev5'  id='' value='Coding Contest'>Coding Contest(CSE,IT,EEE,ECE)<br/></td> ";

				if($row["EVENT6"]!="NA")

					echo "<td><input type='checkbox' name='ev6'  id='' value='Idea Bucket' checked>Idea Bucket<br/></td> </tr>";

				else

					echo "<td><input type='checkbox' name='ev6'  id='' value='Idea Bucket' >Idea Bucket<br/></td> </tr>";

				if($row["EVENT7"]!="NA")

					echo "<tr> <td><input type='checkbox' name='ev7'  id='' value='Poster Presentation' checked>Poster Presentation</td>";

				else

					echo "<tr> <td><input type='checkbox' name='ev7'  id='' value='Poster Presentation' >Poster Presentation</td> ";

				if($row["EVENT32"]!="NA")

					echo "<td><input type='checkbox' name='ev32'  id='' value='Machino' checked>Machino(ME)</td> ";

				else

					echo " <td><input type='checkbox' name='ev32'  id='' value='Machino' >Machino(ME)</td>  ";
				if($row["EVENT33"]!="NA")

					echo " <td><input type='checkbox' name='ev33'  id='' value='Bridge' checked>Bridge Building(CE)</td> </tr> ";

				else

					echo " <td><input type='checkbox' name='ev33'  id='' value='Bridge' >Bridge Building(CE)</td> </tr> ";


			?>

			      

			</table>

			</div><br/>

			

			

			<div>

			<table id="MSevnts"> <tr> <td colspan="3"><h4 style="color:red; font-weight: bold">MS Events </h4></td></tr>

			<?php

				if($row["EVENT27"]!="NA")

					echo "<tr>    <td><input type='checkbox' name='ev27' id='' value='Young Manager' checked>Young Manager</td>"; 

				else

					echo "<tr>    <td><input type='checkbox' name='ev27' id='' value='Young Manager' >Young Manager</td>"; 

				

				if($row["EVENT28"]!="NA")

					echo "<td colspan='2'><input type='checkbox' name='ev28'  id='' value='B-Quiz' checked>B-Quiz<br/></td> </tr>";

				else

					echo "<td colspan='2'><input type='checkbox' name='ev28'  id='' value='B-Quiz' >B-Quiz<br/></td> </tr>";

				

			

				if($row["EVENT29"]!="NA")

					echo "<tr>    <td><input type='checkbox' name='ev29' id='' value='B-Plan' checked>B-Plan</td>"; 

				else

					echo "<tr>    <td><input type='checkbox' name='ev29' id='' value='B-Plan' >B-Plan</td>"; 

				

				if($row["EVENT30"]!="NA")

					echo "<td><input type='checkbox' name='ev30'  id='' value='Stock Game' checked>Stock Game<br/></td> ";

				else

					echo "<td><input type='checkbox' name='ev30'  id='' value='Stock Game' >Stock Game<br/></td> ";

				if($row["EVENT31"]!="NA")

					echo "<td><input type='checkbox' name='ev31'  id='' value='Ad-Selfie' checked>Ad-Selfie<br/></td> </tr>";

				else

					echo "<td><input type='checkbox' name='ev31'  id='' value='Ad-Selfie' >Ad-Selfie<br/></td> </tr>";

			?>

			    

			

			</table>

			</div><br/>



	  

      <marquee  behavior="alternate"  width="450"><span style="color:red;font-size: 15px;">Participants should carry their college flag and sport dress</span></marquee>

      <!--Sports events-->

      <table>

      	<tr>

      		<td colspan="4" ><h4 style="color:red; font-weight: bold">Sports</h4></td>

      	</tr>

		<?php

				if($row["EVENT8"]!="NA")

					echo "<tr>    <td><input type='checkbox' name='ev8' id='' value='Volley Ball' checked>Volley Ball</td>"; 

				else

					echo "<tr>    <td><input type='checkbox' name='ev8' id='' value='Volley Ball' >Volley Ball</td>"; 

				

				if($row["EVENT9"]!="NA")

					echo "<td><input type='checkbox' name='ev9'  id='' value='Throw Ball' checked>Throw Ball<br/></td> ";

				else

					echo "<td><input type='checkbox' name='ev9'  id='' value='Throw Ball' >Throw Ball<br/></td> ";

				

				if($row["EVENT10"]!="NA")

					echo "<td><input type='checkbox' name='ev10'  id='' value='Chess' checked>Chess<br/></td> ";

				else

					echo "<td><input type='checkbox' name='ev10'  id='' value='Chess' >Chess<br/></td> ";

				

				

				if($row["EVENT11"]!="NA")

					echo "<td><input type='checkbox' name='ev11'  id='' value='Carroms' checked>Carroms<br/></td> </tr>";

				else

					echo "<td><input type='checkbox' name='ev11'  id='' value='Carroms' >Carroms<br/></td> </tr>";

				

			

				if($row["EVENT12"]!="NA")

					echo "<tr>    <td><input type='checkbox' name='ev12' id='' value='Table Tennis' checked>Table Tennis</td>"; 

				else

					echo "<tr>    <td><input type='checkbox' name='ev12' id='' value='Table Tennis' >Table Tennis</td>"; 

				if($row["EVENT13"]!="NA")

					echo "<td><input type='checkbox' name='ev13'  id='' value='Running' checked>Running<br/></td> ";

				else

					echo "<td><input type='checkbox' name='ev13'  id='' value='Running'>Running<br/></td> ";

				if($row["EVENT14"]!="NA")

					echo "<td><input type='checkbox' name='ev14'  id='' value='Relay' checked>Relay<br/></td> </tr>";

				else

					echo "<td><input type='checkbox' name='ev14'  id='' value='Relay' >Relay<br/></td> </tr>";

				

			?>

		

       

        

      </table>

      <br>



      <!--Cultural events-->

      <table >

      	<tr>

      		<td colspan="6" ><h4 style="color:red; font-weight: bold">Culturals</h4></td>

      	</tr class="checkbox-grid">

        <?php

				if($row["EVENT15"]!="NA")

					echo "<tr>    <td><input type='checkbox' name='ev15' id='' value='Short Film Contest' checked>Short Film Contest</td>"; 

				else

					echo "<tr>    <td><input type='checkbox' name='ev15' id='' value='Short Film Contest' > Short Film Contest</td>"; 

				

				if($row["EVENT16"]!="NA")

					echo "<td><input type='checkbox' name='ev16'  id='' value='I Got a Talent' checked>I Got a Talent<br/></td> ";

				else

					echo "<td><input type='checkbox' name='ev16'  id='' value='I Got a Talent' >I Got a Talent<br/></td> ";

				

				if($row["EVENT17"]!="NA")

					echo "<td><input type='checkbox' name='ev17'  id='' value='Ramp Walk' checked>Ramp Walk<br/></td> ";

				else

					echo "<td><input type='checkbox' name='ev17'  id='' value='Ramp Walk' >Ramp Walk<br/></td> ";

				

				if($row["EVENT18"]!="NA")

					echo "<td><input type='checkbox' name='ev18'  id='' value='Creative Writing' checked>Creative Writing<br/></td> ";

				else

					echo "<td><input type='checkbox' name='ev18'  id='' value='Creative Writing' >Creative Writing<br/></td> ";

				

				if($row["EVENT19"]!="NA")

					echo "<td><input type='checkbox' name='ev19'  id='' value='MakeOver' checked>MakeOver<br/></td> ";

				else

					echo "<td><input type='checkbox' name='ev19'  id='' value='MakeOver' >MakeOver<br/></td> ";

				

				if($row["EVENT20"]!="NA")

					echo "<td><input type='checkbox' name='ev20'  id='' value='Craft Fair' checked>Craft Fair<br/></td> </tr>";

				else

					echo "<td><input type='checkbox' name='ev20'  id='' value='Craft Fair' >Craft Fair<br/></td> </tr>";

				

				

			if($row["EVENT21"]!="NA")

					echo "<tr>    <td><input type='checkbox' name='ev21' id='' value='Photography' checked>Photography</td>"; 

				else

					echo "<tr>    <td><input type='checkbox' name='ev21' id='' value='Photography' > Photography</td>"; 

				

				if($row["EVENT22"]!="NA")

					echo "<td><input type='checkbox' name='ev22'  id='' value='Teasure Hunt' checked>Teasure Hunt<br/></td> ";

				else

					echo "<td><input type='checkbox' name='ev22'  id='' value='Teasure Hunt' >Teasure Hunt<br/></td> ";

				

				if($row["EVENT23"]!="NA")

					echo "<td><input type='checkbox' name='ev23'  id='' value='Race Your Moto' checked>Race Your Moto<br/></td> ";

				else

					echo "<td><input type='checkbox' name='ev23'  id='' value='Race Your Moto' >Race Your Moto<br/></td> ";

				

				if($row["EVENT24"]!="NA")

					echo "<td><input type='checkbox' name='ev24'  id='' value='Singing' checked>Singing<br/></td> ";

				else

					echo "<td><input type='checkbox' name='ev24'  id='' value='Singing' >Singing<br/></td> ";

				

				if($row["EVENT25"]!="NA")

					echo "<td><input type='checkbox' name='ev25'  id='' value='Dancing' checked>Dancing<br/></td> ";

				else

					echo "<td><input type='checkbox' name='ev25'  id='' value='Dancing' >Dancing<br/></td> ";

				

				if($row["EVENT26"]!="NA")

					echo "<td><input type='checkbox' name='ev26'  id='' value='Face Painting' checked>Face Painting<br/></td> </tr>";

				else

					echo "<td><input type='checkbox' name='ev26'  id='' value='Face Painting' >Face Painting<br/></td> </tr>";

				

				

				

			?>

		 

      </table>



    </div>

  </div>

</div>





<!-- Register  Button -->

      <div class="form-group">

        <label class="col-md-4    control-label"></label>

        <div class="col-md-4   "><br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-warning" >  &nbsp;

          REGISTER  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>

        </div>

      </div>



</fieldset>

</form>

</div>





</body>

</html>