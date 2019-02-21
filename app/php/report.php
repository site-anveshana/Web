<form action="php/alert.php" name="events" method="post">
<style>
	#customers {
		font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
		border-collapse: collapse;
		width: 100%;
	}

	#customers td, #customers th {
		border: 1px solid #ddd;
		padding: 8px;
	}

	#customers tr{background-color: #f2f2f2;}

	#customers tr:hover {background-color: black;color:white;}

	#customers th {
		padding-top: 12px;
		padding-bottom: 12px;
		text-align: left;
		background-color: red;
		color: white;
	}
</style>
<div class="row" id="customers" align="center">
							<script>
								var events = [];
							</script>

							<table>
								<tr>
									<th>REG.NO</th>
									<th>NAME</th>
									<th>MOBILE</th>
								</tr>
								<?php
								include_once('db_operations.php');
								$dbobj = new DBConnect;
								$dbobj->connect();
								// print_r($_GET);
		$resu = false;
		// echo $_GET["event"];
		if(isset($_GET["event"]))
		if($_GET["event"]>=0){
			// echo $_GET["event"];
			$resu = $dbobj->search('anveshana_registration',"DISTINCT HTNO","event_id",$_GET["event"]." and status=1");
			if(!isset($_GET["clg"]) && !isset($_GET["dept"]) && !$resu){
				echo "<h1>NO DATA FOUND</h1>";
				die();
			}
		}
		if(!$resu)
			$resu = $dbobj->search('anveshana_registration',"DISTINCT HTNO","status",1);
		if(!$resu)
			die();
		while($r = $resu->fetch_assoc()){
			// print_r($r);
			$res = $dbobj->search('anveshana_participants',"*","HTNO","'".$r["HTNO"]."'");
			if(!$res)continue;
			$row = $res->fetch_assoc();
			

			if(isset($_GET["clg"])){
				if($_GET["clg"]!= ""){
					if($_GET["clg"] == $row["COLLEGE"]){
											echo "<tr>";
											echo "<td>".$row["HTNO"]."</td>";
											echo "<td>".$row["FIRSTNAME"]." ".$row["LASTNAME"]."</td>";
											echo "<td>".$row["MOBILE"]."</td>";
											echo "</tr>";
							}	
						}else if(isset($_GET["dept"])){
						if($_GET["dept"] != ""){
							if($_GET["dept"] == $row["DEPARTMENT"]){
											echo "<tr>";
											echo "<td>".$row["HTNO"]."</td>";
											echo "<td>".$row["FIRSTNAME"]." ".$row["LASTNAME"]."</td>";
											echo "<td>".$row["MOBILE"]."</td>";
											echo "</tr>";
							}	
						}
							else{
								echo "<tr>";
								echo "<td>".$row["HTNO"]."</td>";
								echo "<td>".$row["FIRSTNAME"]." ".$row["LASTNAME"]."</td>";
								echo "<td>".$row["MOBILE"]."</td>";
								echo "</tr>";
							}
					}else{
						echo "<tr>";
						echo "<td>".$row["HTNO"]."</td>";
						echo "<td>".$row["FIRSTNAME"]." ".$row["LASTNAME"]."</td>";
						echo "<td>".$row["MOBILE"]."</td>";
						echo "</tr>";
					}
				}else if(isset($_GET["dept"])){
						if($_GET["dept"] != ""){
							if($_GET["dept"] == $row["DEPARTMENT"]){
											echo "<tr>";
											echo "<td>".$row["HTNO"]."</td>";
											echo "<td>".$row["FIRSTNAME"]." ".$row["LASTNAME"]."</td>";
											echo "<td>".$row["MOBILE"]."</td>";
											echo "</tr>";
							}	
						}else{
						echo "<tr>";
						echo "<td>".$row["HTNO"]."</td>";
						echo "<td>".$row["FIRSTNAME"]." ".$row["LASTNAME"]."</td>";
						echo "<td>".$row["MOBILE"]."</td>";
						echo "</tr>";
					}
			}else if(isset($_GET["dept"])){
					if($_GET["dept"] != ""){
						if($_GET["dept"] == $row["DEPARTMENT"]){
										echo "<tr>";
										echo "<td>".$row["HTNO"]."</td>";
										echo "<td>".$row["FIRSTNAME"]." ".$row["LASTNAME"]."</td>";
										echo "<td>".$row["MOBILE"]."</td>";
										echo "</tr>";
						}	
					}
			}else{
				echo "<tr>";
				echo "<td>".$row["HTNO"]."</td>";
				echo "<td>".$row["FIRSTNAME"]." ".$row["LASTNAME"]."</td>";
				echo "<td>".$row["MOBILE"]."</td>";
				echo "</tr>";
			}

		}
								
							?>

							</table>
                            
						</div>
                    </form>