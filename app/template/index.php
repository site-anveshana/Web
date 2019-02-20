
<?php
    session_start();

    if(!isset($_SESSION["anveshana_username"]))
        header("Location: index.html");
    else
        $username = $_SESSION["anveshana_username"];

    if(empty($username))
        header( "refresh:0;url=index.html" );

?>
<!DOCTYPE html>
<html>

<head>

    <script>
        
        // console.log(sessionStorage.getItem('anveshana_username') != <?php echo "'".$username."'"; ?>)
        if(sessionStorage.getItem('anveshana_username') != <?php echo "'".$username."'"; ?>)
            // console.log(sessionStorage.getItem('anveshana_username') )//!= <?php echo "'".$username."'"; ?>)
            window.top.location = 'index.html';

    </script>

    <!-- Latest compiled and minified CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    

    <!-- jQuery library -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    

    <!-- Latest compiled JavaScript -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" type="text/css" media="screen" href="template/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <script src="template/script.js"></script>

</head>

<body>
	
    <nav class="navbar navbar-default change-nav" style="margin-bottom:3%;">
        <style>
            li{
                margin-bottom:10px;
            }
        
        </style>

        <div class="container-fluid">

            <div class="navbar-header">

                <a class="navbar-brand" href="#"><img src="img/sasi.png" alt="" width="20%"></a>

            </div>

			<ul class="nav navbar-nav navbar-right">
			
			<li class=" hello"><a href="home.php"><span class="glyphicon glyphicon-user"></span><?php echo ' HELLO '.$username;?></a></li>

            <?php
                include('php/services.php');

            ?>
	
			<li class=" hello"><a href="change_password.php"><span class="glyphicon glyphicon-lock "></span> Change password</a></li>

			<li class=" hello"><a href="php/logout.php"><span class="glyphicon glyphicon-log-out "></span> Logout</a></li>

			</ul>

        </div>

    </nav>

</body>

</html>





