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
								var events = [];
							</script>

							<table>
								<tr>
									<th>EVENT NAME</th>
									<th>TOTAL INCOME(₹)</th>
									<th>MEMEBERS</th>
								</tr>
								<?php

								
$result = $dbobj->search('anveshana_events',"*",1,1);

while($r = $result->fetch_assoc()){
    $res = $dbobj->search('anveshana_registration',"SUM(amount)","event_id",$r["event_id"])->fetch_assoc()['SUM(amount)'];
    $res2 = $dbobj->search('anveshana_registration',"COUNT(DISTINCT HTNO)","event_id",$r["event_id"])->fetch_assoc()['COUNT(DISTINCT HTNO)'];
									if($res){
										
										echo "<tr>";
										echo "<td>".$r["event_name"]."</td>";
										echo "<script>
										events[events.length]={name:'".$r["event_name"]."',cost:".$res.",members:".$res2."}
										</script>";
										echo "<td>".$res."</td>";
										
										echo "<td>".$res2."</td>";
										
										echo "</tr>";
									}else{
										echo "<script>
										events[events.length]={name:'".$r["event_name"]."',cost:0,members:0}
										</script>";
										// echo "<td>0</td>";
										
										// echo "<td>0</td>";
									}
								}
							
							?>

							</table>
                            
						</div>
                    </form>