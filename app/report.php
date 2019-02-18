<?php
session_start();
include_once("DBConnect.php");

$dbc = new DBConnect();



$dbc->connect();



$events = array("", 

                "Paper Presentation", "Project Expo","Quiz","CAD Contest","Coding Contest","Idea Bucket","Poster Presentation","Volley Ball","Throw Ball","Chess",

				 "Carroms","Table Tennis","Running","Relay","Short Film Contest","I Got a Talent","Ramp Walk","Creative Writing","MakeOver", "Craft Fair",

				 "Photography","Teasure Hunt","Race Your Moto","Singing","Dancing","Face Painting","Young Manager","B-Quiz","B-Plan","Stock Game","Ad-Selfie","Machino","Bridge");



	$event = $_POST['event'];



	$eno = "EVENT".$event;



 



$sql = "SELECT * FROM prie WHERE $eno="."'".$events[$event]."'";

		

$query = $dbc->read($sql);

?>

<html>

<head>

	<title>Displaying MySQL Data in HTML Table</title>

	<style type="text/css">

		body {

			font-size: 15px;

			color: #000000;

			font-family: "segoe-ui", "open-sans", tahoma, arial;

			padding: 0;

			margin: 0;

		}

		table {

			margin: auto;

			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";

			font-size: 12px;

		}



		h1 {

			margin: 25px auto 0;

			text-align: center;

			text-transform: uppercase;

			font-size: 17px;

		}



		table td {

			transition: all .5s;

		}

		

		/* Table */

		.data-table {

			border-collapse: collapse;

			font-size: 14px;

			min-width: 537px;

		}



		.data-table th, 

		.data-table td {

			border: 1px solid #e1edff;

			padding: 7px 17px;

		}

		.data-table caption {

			margin: 7px;

		}



		/* Table Header */

		.data-table thead th {

			background-color: #FFFFFF;

			color: #508abb;

			border-color: #6ea1cc !important;

			text-transform: uppercase;

		}



		/* Table Body */

		.data-table tbody td {

			color: #353535;

		}

		.data-table tbody td:first-child,

		.data-table tbody td:nth-child(4),

		.data-table tbody td:last-child {

			text-align: right;

		}



		.data-table tbody tr:nth-child(odd) td {

			background-color: #f4fbff;

		}

		.data-table tbody tr:hover td {

			background-color: #ffffa2;

			border-color: #ffff0f;

		}



		/* Table Footer */

		.data-table tfoot th {

			background-color: #e5f5ff;

			text-align: right;

		}

		.data-table tfoot th:first-child {

			text-align: left;

		}

		.data-table tbody td:empty

		{

			background-color: #ffcccc;

		}

		.myfont{

			font-family:"Comic Sans MS";

			font-size: 40px;

			

		}

		.img{

			margin-left:38%;

		}

	</style>

</head>

<body>

	<img src="img/logo1.png" width="25%;" class="img">



	<table class="data-table">

	

	<?php

		echo '

			<h1 class="myfont">'.$events[$event].'</h1>

		';

	?>

	



		<thead>

			<tr>

				<th>Receipt Number</th>

				<th>HallTicket number</th>

				<th>Name</th>

				<th>College</th>

				<th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>

				<th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>

				<th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>

				<th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>

				<th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>

				<th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>

				<th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>

				<th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th></tr>

		</thead>

		<tbody>

		<?php

		$no 	= 1;

		$total 	= 0;

		while ($row = mysqli_fetch_array($query))

		{

			

			echo '<tr>

					<td>'.$row['rno'].'</td>

					<td>'.$row['HTNO'].'</td>

					<td>'.$row['FIRSTNAME'].' '.$row['LASTNAME'].'</td>

					<td>'.$row['COLLEGE'].'</td>

					<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>

					<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>

					<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>

					<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>

					<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>

					<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>

					<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>

					<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>

					

					

					

				</tr>';

			$total=$total+1;

		}?>

		</tbody>

		<tfoot>

			<tr>

				<th colspan="1">TOTAL</th>

				<th><?=number_format($total)?></th>

			</tr>

		</tfoot>

	</table>

</body>

</html>