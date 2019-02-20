<?php

    include('template/index.php');
    
?>

<html>

<title>Events - Anveshana</title>

<body>

		<div class="row" align="center"><div class="col-lg-1"></div>
		<div class="col-lg-10">
		<style>
#headings {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#headings td, #headings th {
  border: 1px solid #ddd;
  padding: 8px;
}

#headings tr{background-color: #f2f2f2;}

#headings tr:hover {background-color: black;color:white;}

#headings th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: purple;
  color: white;
}
</style>
		
		<table id="headings">
								<tr>
									<th>TOTAL REGISTRATIONS : <?php
												$result = $dbobj->search('anveshana_registration',"COUNT(DISTINCT HTNO)",1,1);
												if($result)
												echo $result->fetch_assoc()["COUNT(DISTINCT HTNO)"];
									?></th>
									<th>TOTAL INCOME : <?php
											$result = $dbobj->search('anveshana_registration',"SUM(amount)",1,1);
											if($result)
											echo $result->fetch_assoc()["SUM(amount)"];
									
									?></th>
								</tr>
		</table>
		</div><div class="col-lg-1"></div>
		</div>

    <div class="row">
			<div class="col-lg-4">
			<?php
				include("php/event_report.php");
			?>
			</div>
			<div class="col-lg-4">
			<?php
				include("php/dept_report.php");
			?>
			</div>
			<div class="col-lg-4">
			<?php
				include("php/clg_report.php");
			?>
			</div>

    </div>

</body>

</html>

