<?php
session_start(); 


$events = array("", 

                "Paper Presentation", "Project Expo","Quiz","CAD Contest","Coding Contest","Idea Bucket","Poster Presentation","Volley Ball","Throw Ball","Chess",

				 "Carroms","Table Tennis","Running","Relay","Short Film Contest","I Got a Talent","Ramp Walk","Creative Writing","MakeOver", "Craft Fair",

				 "Photography","Teasure Hunt","Race Your Moto","Singing","Dancing","Face Painting","Young Manager","B-Quiz","B-Plan","Stock Game","Ad-Selfie","Machino","Bridge");

?>
<!DOCTYPE html>
<html>

<head>

    <!-- Latest compiled and minified CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    

    <!-- jQuery library -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    

    <!-- Latest compiled JavaScript -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Page Title</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />

    <script src="main.js"></script>

    <script>

        function val(){

            if (log.user.value == "") {

                alert("Please enter username");

            }

            else if (log.pwd.value == "") {

                alert("Please enter password");

            }        

        }

        </script>

        <style>

            body{

                background: url(img/bg.jpg)no-repeat;

                background-size: cover; 

                width: auto;

                height: auto;

            }

            .change-nav{

                background-color: rgba(0,0,0,0);

                border: 0px;

            }

            .imgbox{

                background: rgba(0, 0, 0, 0);

                padding-left: 3%;

                margin-right: 10%;

                margin-top: 15%;

                margin-left: 30%;

            }

            .loginbox{

                background: rgba(0, 0, 0, 0);

                padding: 3%;

                margin-top: 30%;

                margin-left: 30%;

                margin-right: 70%;

            }

            .loginbox p {

                font-family: "Comic Sans MS";

                color: rgb(0, 0, 0);

                font-weight: bold;

                font-size: 25px;

            }

            .loginbox input[type="text"],

            .loginbox input[type="password"]{

                border: none;

                border-bottom: 1px solid black;

                background: transparent;

                outline: none;

                height: 20px;

                size: 15px;

            }

            .btn{

                font-family: "Comic Sans MS";

                color: black;

                font-weight: bold;

                font-size: 25px;

            }

			.db{

				font-family:"Comic Sans MS";

				font-weight:bold;

				border: 2px solid black;

				font-size:20px;

			}

        </style>

</head>

<body>

    <nav class="navbar navbar-default change-nav">

        <div class="container-fluid">

            <div class="navbar-header">

                <a class="navbar-brand" href="#"><img src="img/sasi.png" alt="" width="20%"></a>

            </div>

        </div>

    </nav>

    <div class="row">

        <div class="col-lg-4 col-md-4">

            <div class="loginbox">

                <form action="report.php" method="POST">

					<select class="db" name="event" >

					<?php



						for( $i = 1; $i<=33 ; $i++ )

						{

							echo '

								<option value="'.$i.'">'.$events[$i].'</option>

							';

						}



					?>  

					</select>

					<br><br><button type="submit" class="btn"> submit</button>

				</form>

            </div>

        </div>

        <div class="col-lg-8 col-md-8">

            <div class="imgbox">

                <img src="img/logo1.png" alt="" width="110%"> 

            </div>

            

        </div>

    </div>    

</body>

</html>





