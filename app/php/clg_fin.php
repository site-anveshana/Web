<form action="php/alert.php" name="events" method="post">
                        <div class="row" style="display:none">

                        <div class="col-md-4 col-lg-6 col-sm-6 form-group" >
							<label>Financial: </label>

							<input type="radio" class="form-control" name="type" onchange="" placeholder="Message">
</div><div class="col-md-4 col-lg-6 col-sm-6 form-group" >
                            <label>Event: </label>
							<input type="radio" class="form-control" name="type" onchange="" placeholder="Message">
                            </div>
                        </div><style>
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
								var dept = [];
							</script>

							<table>
								<tr>
									<th>COLLEGE NAME</th>
									<th>INCOME (₹)</th>
									<th>MEMEBERS</th>
								</tr>
								<?php
								include_once('db_operations.php');
$dbobj = new DBConnect;
$dbobj->connect();
										$result = $dbobj->search('anveshana_participants',"COLLEGE,COUNT(DISTINCT HTNO)",1,"1 GROUP BY COLLEGE");
										if($result)
										while($r = $result->fetch_assoc()){
												if($r["COLLEGE"]=="")
													continue;
												$sum = 0;	$inc = 0;
											$res = $dbobj->search('anveshana_participants',"HTNO","COLLEGE","'".$r["COLLEGE"]."'");
												if($res){
												while($rw = $res->fetch_assoc()){
													$x = 0;
													// if(isset($_GET["i"])){
													// 	if($_GET["i"]==1){$x = 1;
															// echo $_GET["i"];
															if($a = $dbobj->search('anveshana_registration',"*","HTNO","'".$rw["HTNO"]."' and status=1")){
																$sum += 1;
																$a = $dbobj->search('anveshana_registration',"SUM(amount)","HTNO","'".$rw["HTNO"]."' and status=1")->fetch_assoc();
																$inc += $a["SUM(amount)"];
																// echo $sum."--";
															}
													// 	}
													// }
													// if($x == 0){
													// 	$sum = $r["COUNT(DISTINCT HTNO)"];
													// 	$a = $dbobj->search('anveshana_registration',"SUM(amount)","HTNO","'".$rw["HTNO"]."'")->fetch_assoc();
													// 			$inc += $a["SUM(amount)"];
													// }
												}
											
										if($sum >0){
										echo "<tr>";
										echo "<td>".$r["COLLEGE"]."</td>";
										echo "<script>
										dept[dept.length]={name:'".$r["COLLEGE"]."',members:".$r["COUNT(DISTINCT HTNO)"]."}
										</script>";
										echo "<td>".$inc."</td>";
										
										echo "<td>".$sum."</td>";
										
										echo "</tr>";
									}
								}
								}
							
							?>

							</table>
                            
						</div>
                    </form>