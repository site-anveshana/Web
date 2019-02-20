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
									<th>DEPT NAME</th>
									<th>TOTAL INCOME(₹)</th>
									<th>MEMEBERS</th>
								</tr>
								<?php
										$result = $dbobj->search('anveshana_participants',"DEPARTMENT,COUNT(DISTINCT HTNO)",1,"1 GROUP BY DEPARTMENT");
										if($result)
										while($r = $result->fetch_assoc()){
												if($r["DEPARTMENT"]=="")
													continue;
												$sum = 0;	
											$res = $dbobj->search('anveshana_participants',"*","DEPARTMENT","'".$r["DEPARTMENT"]."'");
												if($res){
												while($rw = $res->fetch_assoc())
													if($a = $dbobj->search('anveshana_registration',"SUM(amount)","HTNO","'".$rw["HTNO"]."'"))
														$sum += $a->fetch_assoc()['SUM(amount)'];
										
										echo "<tr>";
										echo "<td>".$r["DEPARTMENT"]."</td>";
										echo "<script>
										dept[dept.length]={name:'".$r["DEPARTMENT"]."',cost:".$sum.",members:".$r["COUNT(DISTINCT HTNO)"]."}
										</script>";
										echo "<td>".$sum."</td>";
										
										echo "<td>".$r["COUNT(DISTINCT HTNO)"]."</td>";
										
										echo "</tr>";
									}else{
										echo "<script>
										dept[events.length]={name:'".$r["DEPARTMENT"]."',cost:0,members:0}
										</script>";
										// echo "<td>0</td>";
										
										// echo "<td>0</td>";
									}
								}
							
							?>

							</table>
                            
						</div>
                    </form>